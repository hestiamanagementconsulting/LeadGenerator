<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Labels Controller
 *
 * @property \App\Model\Table\LabelsTable $Labels
 */
class LabelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $labels = $this->paginate($this->Labels);

        $this->set(compact('labels'));
        $this->set('_serialize', ['labels']);
    }

    /**
     * View method
     *
     * @param string|null $id Label id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $label = $this->Labels->get($id, [
            'contain' => []
        ]);

        $this->set('label', $label);
        $this->set('_serialize', ['label']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $label = $this->Labels->newEntity();
        if ($this->request->is('post')) {
            $label = $this->Labels->patchEntity($label, $this->request->getData());
            if ($this->Labels->save($label)) {
                $this->Flash->success(__('La etiqueta se ha guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La etiqueta no se ha podido guardar. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('label'));
        $this->set('_serialize', ['label']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Label id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $label = $this->Labels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $label = $this->Labels->patchEntity($label, $this->request->getData());
            if ($this->Labels->save($label)) {
                $this->Flash->success(__('La etiqueta se ha guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La etiqueta no se ha podido guardar. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('label'));
        $this->set('_serialize', ['label']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Label id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $label = $this->Labels->get($id);
        if ($this->Labels->delete($label)) {
            $this->Flash->success(__('La etiqueta se ha eliminado correctamente.'));
        } else {
            $this->Flash->error(__('La etiqueta no ha podido ser eliminada. Por favor, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
