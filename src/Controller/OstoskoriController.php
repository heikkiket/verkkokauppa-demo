<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ostoskori Controller
 *
 *
 * @method \App\Model\Entity\Ostoskori[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OstoskoriController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ostoskori = $this->paginate($this->Ostoskori);

        $this->set(compact('ostoskori'));
    }

    /**
     * View method
     *
     * @param string|null $id Ostoskori id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ostoskori = $this->Ostoskori->get($id, [
            'contain' => []
        ]);

        $this->set('ostoskori', $ostoskori);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ostoskori = $this->Ostoskori->newEntity();
        if ($this->request->is('post')) {
            $ostoskori = $this->Ostoskori->patchEntity($ostoskori, $this->request->getData());
            if ($this->Ostoskori->save($ostoskori)) {
                $this->Flash->success(__('The ostoskori has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ostoskori could not be saved. Please, try again.'));
        }
        $this->set(compact('ostoskori'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ostoskori id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ostoskori = $this->Ostoskori->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ostoskori = $this->Ostoskori->patchEntity($ostoskori, $this->request->getData());
            if ($this->Ostoskori->save($ostoskori)) {
                $this->Flash->success(__('The ostoskori has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ostoskori could not be saved. Please, try again.'));
        }
        $this->set(compact('ostoskori'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ostoskori id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ostoskori = $this->Ostoskori->get($id);
        if ($this->Ostoskori->delete($ostoskori)) {
            $this->Flash->success(__('The ostoskori has been deleted.'));
        } else {
            $this->Flash->error(__('The ostoskori could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
