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
        $tipoBusqueda = $this->request->data['optradio'];
        
        $campoBusqueda = $this->request->data['campoBusqueda'];
        $where = "";
        //Recogemos los checkbox de la request
        if (isset($campoBusqueda) and !empty($campoBusqueda)){
            $checkboxes = isset($this->request->data['checkbox']) ? $this->request->data['checkbox'] : array();
            $or = "or";
            $where = "(";
            $marcados = sizeof($checkboxes);
            $i=1;
            //Montamos el where de la consulta
            foreach($checkboxes as $value) {
                $where = $where . ' upper(' . $value . ') like ' . '\'%' . strtoupper($campoBusqueda) . '%\'';
                if($i < $marcados) {
                 $where = $where . $or;
                }
                $i++;
            }
            $where = $where . ")";
        }
        //Solo añadimos el tipo de búsqueda si hay etiquetas seleccionadas
        $inEtiquetas="";
        $inLeadId = "";
        if (sizeof($arrayetiquetas)>0){
            if (isset($campoBusqueda) and !empty($campoBusqueda)) $where = $where . $tipoBusqueda . " ("; 

            $contRegistros=1;
            foreach ($arrayetiquetas as $etiquetavalue){
                if ($contRegistros == 1){
                    $inEtiquetas = $etiquetavalue; 
                }else{
                    $inEtiquetas = $inEtiquetas . ',' . $etiquetavalue; 
                }
                $contRegistros++;
            }
            //montamos la subquery en la tabla relacional de leads labels
            $this->loadModel("LeadLabels");
            $queryLeadsId = $this->LeadLabels
                ->find()
                ->select(['id_lead']) 
                ->where(['id_label in (' . $inEtiquetas . ')']);
            $contRegistros=1;
            foreach ($queryLeadsId as $valueLeadId){
                if ($contRegistros == 1){
                    $inLeadId =  $valueLeadId['id_lead']; 
                }else{
                    $inLeadId = $inLeadId . ',' . $valueLeadId['id_lead']; 
                }
                $contRegistros++;
            }
            //Si no devuelve ningun resultado, no montamos la subquery
            if($contRegistros>1) {
                $inLeadId = ' id in (' . $inLeadId . ')';
                if (isset($campoBusqueda) and !empty($campoBusqueda)) $inLeadId = $inLeadId . ")"; 
            }else{
                if (isset($campoBusqueda) and empty($campoBusqueda)) $inLeadId = "1 = 0";
            }
        }
        $where = $where . $inLeadId;
        $this->log($where);
        $this->loadModel("Leads");
        //Usamos this->Leads porque estamos en controlador, si fuese la tabla seria $Leads
        $query = $this->Leads
            ->find()
            ->where([$where])
            ->order(['created' => 'DESC']);

        //Cargamos una lista de todos los Leads
        $leads = $this->paginate($query);

        $this->set(compact('leads'));
        $this->set('_serialize', ['leads']);

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

    public function export() 
    {
        $nombres = $this->request->data['nombres'];
        $apellidos = $this->request->data['apellidos'];
        foreach($nombres as $value ) {

        

                       $this->log($value);
                   $this->log($apellidos[0]); 
         }



       // $this->loadModel("Leads");
        // $this->response->download('export.csv');
        // $data = $LeadsExport;
        // $_header = ['ID', 'Nombre', 'Apellido', 'Correo electrónico', 'Cargo', 'Empresa', 'website', 'Region / País', 'Teléfono', 'LinkedIn', 'Industria', 'Fecha de creación', 'Fecha de modificación'];
        // $_serialize = 'data';
        // $this->set(compact('data', '_serialize', '_header'));
        // $this->viewBuilder()->className('CsvView.Csv');
        return  $this->redirect(['action' => 'index']);
    }

}
