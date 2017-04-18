<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CampaignLeads Controller
 *
 * @property \App\Model\Table\CampaignLeadsTable $CampaignLeads
 */
class CampaignLeadsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $campaignLeads = $this->paginate($this->CampaignLeads);

        $this->set(compact('campaignLeads'));
        $this->set('_serialize', ['campaignLeads']);
    }

    /**
     * View method
     *
     * @param string|null $id Campaign Lead id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $campaignLead = $this->CampaignLeads->get($id, [
            'contain' => []
        ]);

        $this->set('campaignLead', $campaignLead);
        $this->set('_serialize', ['campaignLead']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $campaignLead = $this->CampaignLeads->newEntity();
        if ($this->request->is('post')) {
            $campaignLead = $this->CampaignLeads->patchEntity($campaignLead, $this->request->getData());
            if ($this->CampaignLeads->save($campaignLead)) {
                $this->Flash->success(__('The campaign lead has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campaign lead could not be saved. Please, try again.'));
        }
        $this->set(compact('campaignLead'));
        $this->set('_serialize', ['campaignLead']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Campaign Lead id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $campaignLead = $this->CampaignLeads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campaignLead = $this->CampaignLeads->patchEntity($campaignLead, $this->request->getData());
            if ($this->CampaignLeads->save($campaignLead)) {
                $this->Flash->success(__('The campaign lead has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campaign lead could not be saved. Please, try again.'));
        }
        $this->set(compact('campaignLead'));
        $this->set('_serialize', ['campaignLead']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Campaign Lead id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $campaignLead = $this->CampaignLeads->get($id);
        if ($this->CampaignLeads->delete($campaignLead)) {
            $this->Flash->success(__('The campaign lead has been deleted.'));
        } else {
            $this->Flash->error(__('The campaign lead could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
