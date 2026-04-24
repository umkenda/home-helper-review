<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * WorkExperiences Controller
 *
 * @property \App\Model\Table\WorkExperiencesTable $WorkExperiences
 * @property \Authorization\Controller\Component\AuthorizationComponent $Authorization
 */
class WorkExperiencesController extends AppController
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
        // Authorize user (if using Authorization plugin)
        $this->Authorization->authorize($this->WorkExperiences);

        // Build query with contain
        $query = $this->WorkExperiences->find()
            ->contain(['HelperProfiles'])
            ->order(['WorkExperiences.id' => 'DESC']);

        // Paginate the query
        $workExperiences = $this->paginate($query, [
            'limit' => 10, // number of records per page
            'maxLimit' => 50
        ]);

        // Pass to the view
        $this->set(compact('workExperiences'));
    }

    /**
     * View method
     *
     * @param string|null $id Work Experience id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workExperience = $this->WorkExperiences->get($id, contain: ['HelperProfiles']);
        $this->Authorization->authorize($workExperience);
        $this->set(compact('workExperience'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->authorize($this->WorkExperiences, 'add');
        $workExperience = $this->WorkExperiences->newEmptyEntity();
        //$this->Authorization->authorize($workExperience);
        if ($this->request->is('post')) {
            $workExperience = $this->WorkExperiences->patchEntity($workExperience, $this->request->getData());
            if ($this->WorkExperiences->save($workExperience)) {
                $this->Flash->success(__('The work experience has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The work experience could not be saved. Please, try again.'));
        }
        $helperProfiles = $this->WorkExperiences->HelperProfiles->find('list', limit: 200)->all();
        $this->set(compact('workExperience', 'helperProfiles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Work Experience id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workExperience = $this->WorkExperiences->get($id, contain: []);
        $this->Authorization->authorize($workExperience);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workExperience = $this->WorkExperiences->patchEntity($workExperience, $this->request->getData());
            if ($this->WorkExperiences->save($workExperience)) {
                $this->Flash->success(__('The work experience has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The work experience could not be saved. Please, try again.'));
        }
        $helperProfiles = $this->WorkExperiences->HelperProfiles->find('list', limit: 200)->all();
        $this->set(compact('workExperience', 'helperProfiles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Work Experience id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workExperience = $this->WorkExperiences->get($id);
        $this->Authorization->authorize($workExperience);
        if ($this->WorkExperiences->delete($workExperience)) {
            $this->Flash->success(__('The work experience has been deleted.'));
        } else {
            $this->Flash->error(__('The work experience could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
