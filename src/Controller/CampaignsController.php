<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Campaigns Controller
 *
 * @property \App\Model\Table\CampaignsTable $Campaigns
 */
class CampaignsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $campaigns = $this->paginate($this->Campaigns);

        $this->set(compact('campaigns'));
        $this->set('_serialize', ['campaigns']);
    }

    /**
     * View method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
            'contain' => []
        ]);

        $this->set('campaign', $campaign);
        $this->set('_serialize', ['campaign']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $campaign = $this->Campaigns->newEntity();
        if ($this->request->is('post')) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->getData());
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('La campaña se ha guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La campaña no se ha podido guardar. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('campaign'));
        $this->set('_serialize', ['campaign']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->getData());
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('La campaña se ha guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La campaña no se ha podido guardar. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('campaign'));
        $this->set('_serialize', ['campaign']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $campaign = $this->Campaigns->get($id);
        if ($this->Campaigns->delete($campaign)) {
            $this->Flash->success(__('La campaña ha sido eliminada.'));
        } else {
            $this->Flash->error(__('La campaña no se ha podido eliminar. Por favor, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
