<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LeadLabels Controller
 *
 * @property \App\Model\Table\LeadLabelsTable $LeadLabels
 */
class LeadLabelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $leadLabels = $this->paginate($this->LeadLabels);

        $this->set(compact('leadLabels'));
        $this->set('_serialize', ['leadLabels']);
    }

    /**
     * View method
     *
     * @param string|null $id Lead Label id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leadLabel = $this->LeadLabels->get($id, [
            'contain' => []
        ]);

        $this->set('leadLabel', $leadLabel);
        $this->set('_serialize', ['leadLabel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leadLabel = $this->LeadLabels->newEntity();
        if ($this->request->is('post')) {
            $leadLabel = $this->LeadLabels->patchEntity($leadLabel, $this->request->getData());
            if ($this->LeadLabels->save($leadLabel)) {
                $this->Flash->success(__('The lead label has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead label could not be saved. Please, try again.'));
        }
        $this->set(compact('leadLabel'));
        $this->set('_serialize', ['leadLabel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lead Label id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leadLabel = $this->LeadLabels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leadLabel = $this->LeadLabels->patchEntity($leadLabel, $this->request->getData());
            if ($this->LeadLabels->save($leadLabel)) {
                $this->Flash->success(__('The lead label has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead label could not be saved. Please, try again.'));
        }
        $this->set(compact('leadLabel'));
        $this->set('_serialize', ['leadLabel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lead Label id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leadLabel = $this->LeadLabels->get($id);
        if ($this->LeadLabels->delete($leadLabel)) {
            $this->Flash->success(__('The lead label has been deleted.'));
        } else {
            $this->Flash->error(__('The lead label could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
