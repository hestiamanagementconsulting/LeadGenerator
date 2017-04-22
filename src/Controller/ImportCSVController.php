<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

/**
 * ImportCSV Controller
 *
 * @property \App\Model\Table\ImportCSVTable $ImportCSV
 */
class ImportCSVController extends AppController
{
    /**
     * importView method
     *
     * @param nonw
     * @return \Cake\Network\Response|null Redirects to index.
     */
    public function importView()
    {
        //Rellenamos los campos de campañas para ser desplegables
        $this->loadModel("Campaigns");
        $query = $this->Campaigns->find('all');
        $data = $query->all();
        foreach ($data as $value) {
            $OpcionesCampana[$value['Campaigns']['id']] = $value['Campaigns']['nombre'];
        }
        $this->set(compact('OpcionesCampana'));
        //Rellenamos los campos de campañas para ser desplegables
        $this->loadModel("Labels");
        $query = $Labels->find('all');
        $data = $query->all();
        foreach ($data as $value) {
            $OpcionesEtiqueta[$value['Labels']['id']] = $value['Labels']['nombre'];
        }
        $this->set(compact('OpcionesEtiqueta'));
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
        //En caso de que el usuario haya escogido una o varias etiquetas para las campañas se le asignan
        //Este código se realiza fuera del bucle dado que la relación es con las campañas y no por cada Lead
        foreach ($arraycampana as $campanavalue){
            foreach ($arrayetiquetas as $etiquetavalue){
                $CampaignLabel = $CampaignLabelsTable->newEntity();
                $CampaignLabel->id_campaign = $campanavalue;
                $CampaignLabel->id_label = $etiquetavalue;
                $CampaignLabelsTable->save($CampaignLabel);
            } 
        }
        $this->Flash->success(__('Los leads se han importado correctamente.'));
        return $this->redirect(['action' => 'index']);
    }
}
