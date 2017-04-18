<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CampaignLabels Controller
 *
 * @property \App\Model\Table\CampaignLabelsTable $CampaignLabels
 */
class CampaignLabelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $campaignLabels = $this->paginate($this->CampaignLabels);

        $this->set(compact('campaignLabels'));
        $this->set('_serialize', ['campaignLabels']);
    }

    /**
     * View method
     *
     * @param string|null $id Campaign Label id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $campaignLabel = $this->CampaignLabels->get($id, [
            'contain' => []
        ]);

        $this->set('campaignLabel', $campaignLabel);
        $this->set('_serialize', ['campaignLabel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $campaignLabel = $this->CampaignLabels->newEntity();
        if ($this->request->is('post')) {
            $campaignLabel = $this->CampaignLabels->patchEntity($campaignLabel, $this->request->getData());
            if ($this->CampaignLabels->save($campaignLabel)) {
                $this->Flash->success(__('The campaign label has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campaign label could not be saved. Please, try again.'));
        }
        $this->set(compact('campaignLabel'));
        $this->set('_serialize', ['campaignLabel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Campaign Label id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $campaignLabel = $this->CampaignLabels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campaignLabel = $this->CampaignLabels->patchEntity($campaignLabel, $this->request->getData());
            if ($this->CampaignLabels->save($campaignLabel)) {
                $this->Flash->success(__('The campaign label has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campaign label could not be saved. Please, try again.'));
        }
        $this->set(compact('campaignLabel'));
        $this->set('_serialize', ['campaignLabel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Campaign Label id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $campaignLabel = $this->CampaignLabels->get($id);
        if ($this->CampaignLabels->delete($campaignLabel)) {
            $this->Flash->success(__('The campaign label has been deleted.'));
        } else {
            $this->Flash->error(__('The campaign label could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
