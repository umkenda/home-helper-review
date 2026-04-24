<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Educations Controller
 *
 * @property \App\Model\Table\EducationsTable $Educations
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class EducationsController extends AppController
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

        $this->Authorization->authorize($this->Educations, 'index');

        $educations = $this->paginate($this->Educations);
        $this->set(compact('educations'));
    }

    /**
     * View method
     *
     * @param string|null $id Education id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $education = $this->Educations->get($id, contain: ['HelperProfiles']);
        $this->Authorization->authorize($education);
        $this->set(compact('education'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->authorize($this->Educations, 'add');
        $education = $this->Educations->newEmptyEntity();
        //$this->Authorization->authorize($education);
        if ($this->request->is('post')) {
            $education = $this->Educations->patchEntity($education, $this->request->getData());
            if ($this->Educations->save($education)) {
                $this->Flash->success(__('The education has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The education could not be saved. Please, try again.'));
        }
        $helperProfiles = $this->Educations->HelperProfiles->find('list', limit: 200)->all();
        $this->set(compact('education', 'helperProfiles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Education id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $education = $this->Educations->get($id, contain: ['HelperProfiles']);
        $this->Authorization->authorize($education);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $education = $this->Educations->patchEntity($education, $this->request->getData());
            if ($this->Educations->save($education)) {
                $this->Flash->success(__('The education has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The education could not be saved. Please, try again.'));
        }
        $helperProfiles = $this->Educations->HelperProfiles->find('list', limit: 200)->all();
        $this->set(compact('education', 'helperProfiles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Education id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $education = $this->Educations->get($id);
        $this->Authorization->authorize($education);
        if ($this->Educations->delete($education)) {
            $this->Flash->success(__('The education has been deleted.'));
        } else {
            $this->Flash->error(__('The education could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
