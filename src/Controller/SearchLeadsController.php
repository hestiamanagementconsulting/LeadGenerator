<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

/**
 * SearchLeadsController Controller
 */
class SearchLeadsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //Rellenamos los campos de campañas para ser desplegables
        $this->loadModel("Campaigns");
        $query = $this->Campaigns->find('all');
        $data = $query->all();

        foreach ($data as $value) {
            $OpcionesCampana[$value['id']] = $value['nombre'];
        }
        $this->set(compact('OpcionesCampana'));

        //Rellenamos los campos de campañas para ser desplegables
        $this->loadModel("Labels");
        $queryLabels = $this->Labels->find('all');
        $dataLabels = $queryLabels->all();

        foreach ($dataLabels as $valueLabel) {
            $OpcionesEtiqueta[$valueLabel['id']] = $valueLabel['nombre'];
        }
        $this->set(compact('OpcionesEtiqueta'));

        //Cargamos una lista de todos los Leads
        $this->loadModel("Leads");
        $leads = $this->paginate($this->Leads);

        $this->set(compact('leads'));
        $this->set('_serialize', ['leads']);
    }

    /**
     * searchLead method
     *
     * @return \Cake\Network\Response|null
     */
    public function searchLead()
    {
        //Recuperamos de la request el id de las campañas seleccionadas
        $arraycampana = array();
        $nav = $this->request->data['Campanas'];
        if($nav){
            foreach ($nav as $value){
                array_push($arraycampana,$value);
            }
        }
        //Recuperamos de la request el id de las etiquetas seleccionadas
        $arrayetiquetas = array();
        $nav = $this->request->data['Etiquetas'];
        if($nav){
            foreach ($nav as $value){
                array_push($arrayetiquetas,$value);
            }
        }
        //Cargamos un objeto Lead con todos los datos de la request
        $this->loadModel("Leads");
        $leadSearch = $this->Leads->newEntity();
        $leadSearch = $this->Leads->patchEntity($leadSearch, $this->request->getData());

        //Cargamos una lista de todos los Leads
        $this->loadModel("Leads");
        $leads = $this->paginate($this->Leads);

        $this->set(compact('leads'));
        $this->set('_serialize', ['leads']);
    }

    /**
     * View method
     *
     * @param string|null $id Lead id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel("Leads");
        $lead = $this->Leads->get($id, [
            'contain' => []
        ]);

        $this->set('lead', $lead);
        $this->set('_serialize', ['lead']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel("Leads");
        $lead = $this->Leads->newEntity();
        if ($this->request->is('post')) {
            $lead = $this->Leads->patchEntity($lead, $this->request->getData());
            if ($this->Leads->save($lead)) {
                $this->Flash->success(__('El lead se ha guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El lead no ha podido ser guardado. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('lead'));
        $this->set('_serialize', ['lead']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lead id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel("Leads");
        $lead = $this->Leads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lead = $this->Leads->patchEntity($lead, $this->request->getData());
            if ($this->Leads->save($lead)) {
                $this->Flash->success(__('El lead se ha guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El lead no ha podido ser guardado. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('lead'));
        $this->set('_serialize', ['lead']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lead id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel("Leads");
        $this->request->allowMethod(['post', 'delete']);
        $lead = $this->Leads->get($id);
        if ($this->Leads->delete($lead)) {
            $this->Flash->success(__('El lead ha sido eliminado correctamente.'));
        } else {
            $this->Flash->error(__('El lead no ha podido ser eliminado. Por favor, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
