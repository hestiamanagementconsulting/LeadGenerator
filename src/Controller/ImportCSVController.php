<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

/**
 * ImportCSV Controller
 */
class ImportCSVController extends AppController
{
    /**
     * index method
     *
     * @param nonw
     * @return \Cake\Network\Response|null Redirects to index.
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
    }
    /**
     * importCSV method
     *
     * @param file|the CSV file.
     * @return \Cake\Network\Response|null Redirects to index.
     */
    public function import($file = null)
    {
        //Recuperamos de la request el campo del formulario donde se encuentra el CSV
        $data = $this->request->data['csv'];
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
        //Incializamos las tablas que vamos a utilizar en el proceso
        $CampaignLeadsTable = TableRegistry::get('CampaignLeads');
        $CampaignLabelsTable = TableRegistry::get('CampaignLabels');
        $LeadsTable = TableRegistry::get('Leads');
        $LeadLabelsTable = TableRegistry::get('LeadLabels');
        //Se lo asignamos a una variable fichero con un nombre temporal
        $file = $data['tmp_name'];
        //Abrimos el fichero
        $handle = fopen($file, "r");
        //Por cada fila recuperada del fichero delimitadas por ; hacemos el tratamiento
        while (($row = fgetcsv($handle, 1950, ",")) !== FALSE) {
            //$this->log("Dentro While!");
            //Si la primera fila contiene el literal nombre saltamos bucle ya que significa que es la cabecera del CSV
            if($row[1] == 'First Name') {
                //$this->log("Fichero correcto!");
                continue;
            }
            //Creamos una nueva instancia de la entidad Lead para después asignar los valores 
            $this->loadModel("Leads");
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
                //para cada Lead también lo asignamos a la etiqueta directamente sin pasar por la campaña
                //$this->loadModel("LeadLabels");
                //foreach ($arrayetiquetas as $etiquetavalue){
                //    $LeadLabel = $LeadLabelsTable->newEntity();
                //    $LeadLabel->Id_lead = $lead->id;
                //    $LeadLabel->id_label = $etiquetavalue;
                //    $LeadLabelsTable->save($LeadLabel);
                //} 
            }
            else{
                //En caso de no insertar el Lead significa que ya existe el mail en BBDD con lo que se debe asociar el Lead existente a la nueva campaña
                $query = $this->Leads->find()
                            ->select(['id'])
                            ->where(['email =' => $row[3] ]);
                $mirow = $query->first();
                $mirowid = $mirow['id'];

                $this->loadModel("CampaignLeads");
                $query2 = $this->CampaignLeads->find()
                            ->select(['id_lead', 'id_campaign'])
                            ->where(['id_lead =' => $mirowid ]);
          
                //TO DO cambiar el first por un all o algo...
                $mycampaignsleads = $query2->all();
                //$this->log($mycampaignsleads);
                foreach ($arraycampana as $campanavalue){
                    //Primero debemos buscar si la capaña que estamos intentando asociar ya existe en BASE DE DATOS para ese mismo LEAD
                    $insertarCampana=true;
                    foreach ($mycampaignsleads as $cmpLeadsValue){
                        if ($campanavalue == $cmpLeadsValue['id_campaign']){
                            $insertarCampana=false;
                        }
                    }
                    //si no existe insertamos en BBDD
                    if ($insertarCampana){
                        $CampaignLead = $CampaignLeadsTable->newEntity();
                        $CampaignLead->id_campaign = $campanavalue;
                        $CampaignLead->id_lead = $mirowid;
                        $CampaignLeadsTable->save($CampaignLead);
                    }
                }
                //para cada Lead también lo asignamos a la etiqueta directamente sin pasar por la campaña
                //$this->loadModel("LeadLabels");
                //foreach ($arrayetiquetas as $etiquetavalue){
                //    $LeadLabel = $LeadLabelsTable->newEntity();
                //    $LeadLabel->Id_lead = $mirowid;
                //    $LeadLabel->id_label = $etiquetavalue;
                //    $LeadLabelsTable->save($LeadLabel);
                //}                    
            }
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
        return $this->redirect(array('controller' => 'SearchLeads', 'action' => 'index')); 
        
    }
}
