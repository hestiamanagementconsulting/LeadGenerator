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

}
