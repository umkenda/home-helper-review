<?php
declare(strict_types=1);

namespace App\Controller;

use Authentication\Controller\Component\AuthenticationComponent;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
//    public function initialize(): void
//    {
//        parent::initialize();
//        $this->loadComponent('Authentication.Identity'); // Required for $this->Identity
//        $this->loadComponent('Authorization.Authorization'); // If using authorization checks
//    }

    public function beforeFilter(\Cake\Event\EventInterface $event): void
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login', 'logout']);
        // Actions that don’t require authorization
        $this->Authorization->skipAuthorization(['login', 'logout']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $limit = $this->request->getQuery('limit') ?? 10;
        $search = trim((string)$this->request->getQuery('search'));

        //get the identity
        $identity = $this->Authentication->getIdentity();
        $user = $identity->getOriginalData();

        $query = $this->Users->find()
            ->contain(['Roles'])
            ->where(function ($exp, $q) use ($search, $user) {
                $conditions = [];
                if ($search) {
                    return $exp->or_([
                        'Users.email LIKE' => "%$search%",
                        'Users.first_name LIKE' => "%$search%",
                        'Users.last_name LIKE' => "%$search%",
                    ]);
                }
                // 🔒 Restrict by created_by if Agent
                if ($user->role->name === 'Agent') {
                    return $exp->eq('Users.created_by', $user->id)->add(['Roles.name !=' => 'Administrator']);;
                }

                // ✅ For admin: just return whatever $exp has (maybe search, maybe empty)
                return [];
            });

        $users = $this->paginate($query, [
            'limit' => (int)$limit,
            'order' => ['Users.created' => 'desc']
        ]);

        $this->set(compact('users', 'limit', 'search'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);

        $identity = $this->Authentication->getIdentity();

        if (!$identity->canResult('view', $user)->getStatus()) {
            $this->Flash->error('You are not allowed to view this.');
            return $this->redirect(['action' => 'index']);
        }

        $user = $this->Users->get($id, contain: ['Roles', 'HelperProfiles']);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $identity = $this->Authentication->getIdentity();
        //user that is adding a user
        $userIdentity = $identity->getOriginalData();
        if (!$identity->can('add', $this->Users)) {
            $this->Flash->error('You are not allowed to register user.');
            return $this->redirect(['action' => 'index']);
        }

        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->created_by = $userIdentity->id;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        //Home Helper
        //$roles = $this->Users->Roles->find('list', limit: 200)->all();

        $rolesQuery = $this->Users->Roles->find('list', limit: 200);
        // Restrict roles for agents
        if ($userIdentity->role->name === 'Agent') {
            // Agents can only assign the "home helper" role
            $rolesQuery = $rolesQuery->where(['Roles.name' => 'Home Helper']);
        }

        $roles = $rolesQuery->all();

        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $identity = $this->Authentication->getIdentity();
        if (!$identity->can('edit', $this->Users)) {
            $this->Flash->error('You are not allowed to edit this user.');
            return $this->redirect(['action' => 'index']);
        }

        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $identity = $this->Authentication->getIdentity();
        if (!$identity->can('delete', $this->Users)) {
            $this->Flash->error('You are not allowed to delete this user.');
            return $this->redirect(['action' => 'index']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        $result = $this->Authentication->getResult();
       //dd($result);
        // If user is logged in, redirect to intended page or fallback
        if ($result && $result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/users/index';

            return $this->redirect($target);
        }

        // Show error if login fails
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect('/users/login');
    }

    public function unauthorized()
    {
        $this->Flash->error('You are not authorized to access that page.');
        return $this->redirect($this->referer() ?: '/');
    }

}
