<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * HelperProfiles Controller
 *
 * @property \App\Model\Table\HelperProfilesTable $HelperProfiles
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class HelperProfilesController extends AppController
{
    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authorization.Authorization');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->HelperProfiles->find()
            ->contain(['Users', 'CreatedByUsers']);
        $query = $this->Authorization->applyScope($query);
        $helperProfiles = $this->paginate($query);

        $this->set(compact('helperProfiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Helper Profile id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $helperProfile = $this->HelperProfiles->get($id, contain: ['Users', 'CreatedByUsers', 'Educations', 'Services', 'Skills', 'WorkExperiences']);
        $this->Authorization->authorize($helperProfile);
        $this->set(compact('helperProfile'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($edited_user_id = null)
    {
        $this->Authorization->authorize($this->HelperProfiles, 'add');
        $helperProfile = $this->HelperProfiles->newEmptyEntity();

        if ($this->request->is('post')) {
            $helperProfile = $this->HelperProfiles->patchEntity($helperProfile, $this->request->getData());
            if ($this->HelperProfiles->save($helperProfile)) {
                $this->Flash->success(__('The helper profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The helper profile could not be saved. Please, try again.'));
        }

        $users = $this->HelperProfiles->Users->find('list', limit: 200)->all();
        //kamata id ya huyu user
        $editing_user_id = $this->Authentication->getIdentity()->getOriginalData()->id;
        $createdByUsers = $this->HelperProfiles->CreatedByUsers->find('list', limit: 200)->all();
        $educations = $this->HelperProfiles->Educations->find('list', limit: 200)->all();
        $services = $this->HelperProfiles->Services->find('list', limit: 200)->all();
        $skills = $this->HelperProfiles->Skills->find('list', limit: 200)->all();
        $this->set(compact('helperProfile', 'users', 'createdByUsers', 'educations', 'services', 'skills'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Helper Profile id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $helperProfile = $this->HelperProfiles->get($id, contain: ['Educations', 'Services', 'Skills']);
        $this->Authorization->authorize($helperProfile);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $helperProfile = $this->HelperProfiles->patchEntity($helperProfile, $this->request->getData());
            if ($this->HelperProfiles->save($helperProfile)) {
                $this->Flash->success(__('The helper profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The helper profile could not be saved. Please, try again.'));
        }
        $users = $this->HelperProfiles->Users->find('list', limit: 200)->all();
        $createdByUsers = $this->HelperProfiles->CreatedByUsers->find('list', limit: 200)->all();
        $educations = $this->HelperProfiles->Educations->find('list', limit: 200)->all();
        $services = $this->HelperProfiles->Services->find('list', limit: 200)->all();
        $skills = $this->HelperProfiles->Skills->find('list', limit: 200)->all();
        $this->set(compact('helperProfile', 'users', 'createdByUsers', 'educations', 'services', 'skills'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Helper Profile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $helperProfile = $this->HelperProfiles->get($id);
        $this->Authorization->authorize($helperProfile);
        if ($this->HelperProfiles->delete($helperProfile)) {
            $this->Flash->success(__('The helper profile has been deleted.'));
        } else {
            $this->Flash->error(__('The helper profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
