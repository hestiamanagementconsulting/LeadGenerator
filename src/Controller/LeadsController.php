<?php
namespace App\Controller;

use App\Controller\AppController;

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
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function importCSV($file = null)
    {
        $data = $this->request->data['csv'];
        $file = $data['tmp_name'];
        $handle = fopen($file, "r");
        while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {

            if($row[0] == 'nombre') {
                continue;
            }

            $lead = $this->Leads->newEntity();
            $columns = [
                'nombre' => $row[0],
                'apellido' => $row[1],
                'email' => $row[2],
                'cargo' => $row[3],
                'empresa' => $row[4],
                'website' => $row[5],
                'region_pais' => $row[6],
                'telefono' => $row[7]
            ];
            $lead = $this->Leads->patchEntity($lead, $columns);
            $this->Leads->save($lead);
        }

        fclose($handle);
        $this->Flash->success(__('Los leads se han importado correctamente.'));
        return $this->redirect(['action' => 'index']);
    }
}
