<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

/**
 * Leads Controller
 *
 * @property \App\Model\Table\LeadsTable $Leads
 */
class LeadsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
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
        $this->request->allowMethod(['post', 'delete']);
        $lead = $this->Leads->get($id);
        if ($this->Leads->delete($lead)) {
            $this->Flash->success(__('El lead ha sido eliminado correctamente.'));
        } else {
            $this->Flash->error(__('El lead no ha podido ser eliminado. Por favor, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * importCSV method
     *
     * @param file|the CSV file.
     * @return \Cake\Network\Response|null Redirects to index.
     */
    public function importCSV($file = null)
    {
        //Recuperamos de la request el campo del formulario donde se encuentra el CSV
        $data = $this->request->data['csv'];
        //Recuperamos de la request el id de las campañas seleccionadas
        $arraycampana = array();
        $nav = $this->request->data['OpcionesCampana'];
        if($nav){
            foreach ($nav as $value){
                array_push($arraycampana,$value);
            }
        }
        //Recuperamos de la request el id de las etiquetas seleccionadas
        $arrayetiquetas = array();
        $nav = $this->request->data['OpcionesEtiqueta'];
        if($nav){
            foreach ($nav as $value){
                array_push($arrayetiquetas,$value);
            }
        }
        //Incializamos las tablas que vamos a utilizar en el proceso
        $CampaignLeadsTable = TableRegistry::get('CampaignLeads');
        $CampaignLabelsTable = TableRegistry::get('CampaignLabels');
        $LeadsTable = TableRegistry::get('Leads');
        //Se lo asignamos a una variable fichero con un nombre temporal
        $file = $data['tmp_name'];
        //Abrimos el fichero
        $handle = fopen($file, "r");
        //Por cada fila recuperada del fichero delimitadas por ; hacemos el tratamiento
        while (($row = fgetcsv($handle, 1950, ",")) !== FALSE) {
            //Si la primera fila contiene el literal nombre saltamos bucle ya que significa que es la cabecera del CSV
            if($row[1] == 'First Name') {
                continue;
            }
            //Creamos una nueva instancia de la entidad Lead para después asignar los valores 
            $lead = $this->Leads->newEntity();
            //Creamos un array con todos los valores de la fila, IMPORTANTE QUE LOS CAMPOS DEL ARRAY SE LLAMEN IGUAL QUE LAS COLUMNAS DE BBDD DE LA TABLA
            $columns = [
                'nombre' => $row[1],
                'apellido' => $row[2],
                'email' => $row[3],
                'cargo' => $row[4],
                'empresa' => $row[5],
                'website' => $row[8],
                'region_pais' => $row[6],
                'LinkedIn' => $row[7],
                'Industria' => $row[9]
            ];
            //Asignamos el array a la entidad que habiamos creado
            $lead = $this->Leads->patchEntity($lead, $columns);
            //Ejecutamos el comando de guardar para persistir en BBDD
            if ($this->Leads->save($lead)){
                //En caso de que el usuario haya escogido una o varias campañas para los Leads se le asignan
                foreach ($arraycampana as $campanavalue){
                    $CampaignLead = $CampaignLeadsTable->newEntity();
                    $CampaignLead->id_campaign = $campanavalue;
                    $CampaignLead->id_lead = $lead->id;
                    $CampaignLeadsTable->save($CampaignLead);
                    //En caso de que el usuario haya escogido una o varias etiquetas para las campañas se le asignan
                    foreach ($arrayetiquetas as $etiquetavalue){
                        $CampaignLabel = $CampaignLabelsTable->newEntity();
                        $CampaignLabel->id_campaign = $campanavalue;
                        $CampaignLabel->id_label = $etiquetavalue;
                        $CampaignLabelsTable->save($CampaignLabel);
                    }  
                }   
            }
            //else{
            //     //En caso de no insertar el Lead significa que ya existe el mail en BBDD con lo que se debe asociar el Lead existente a la nueva campaña
            //     // $query = $Leads->find('all', [
            //     //     'conditions' => ['Leads.email =' => ],
            //     //     'contain' => ['Authors', 'Comments'],
            //     //     'limit' => 10
            //     // ]);
            //     // $lead = $this->Leads->get($row[3], ['contain' => ['email']]);
            //     $lead = $LeadsTable->findByEmail($row[3]);
            //     $this->log ($lead);
            // }
        }
        fclose($handle);
        $this->Flash->success(__('Los leads se han importado correctamente.'));
        return $this->redirect(['action' => 'index']);
    }
}
