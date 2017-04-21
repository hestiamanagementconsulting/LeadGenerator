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

    /**
     * campaignAssignLead method
     *
     * @param Int|the Id_Lead.
     * @param Int|the Id_Campaign.
     * @return \Cake\Network\Response|null
     */
    public function campaignAssignLead($id_Lead = null, $id_Campaign = null)
    {
        //Si los dos parametros recibidos son diferentes de null continuamos ejecución, en caso contrario no tenemos operaciones a realizar por este método y devolveremos ejecución.
        if(($id_lead != null && $id_Campaign !=null )) {
            //Creamos una nueva instancia de la entidad CampaignLeads para después asignar los valores 
            $campaignLead = $this->CampaignLeads->newEntity();
            //Creamos un array con todos los valores de la fila, IMPORTANTE QUE LOS CAMPOS DEL ARRAY SE LLAMEN IGUAL QUE LAS COLUMNAS DE BBDD DE LA TABLA
            $columns = [
                'id_campaign' => $id_Campaign,
                'id_lead' => $id_Lead
            ];
            //Asignamos el array a la entidad que habiamos creado
            $campaignLead = $this->CampaignLeads->patchEntity($campaignLead, $columns);
            //Ejecutamos el comando de guardar para persistir en BBDD
            $this->CampaignLeads->save($campaignLead);
        }
        // No se va a mostrar nada por pantalla, no renderizar vista. Esta operación se realizará en el controlador que invoca a esta acción
        $this->autoRender = false;
    }
}
