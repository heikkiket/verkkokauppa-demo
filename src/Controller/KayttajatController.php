<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Kayttajat Controller
 *
 *
 * @method \App\Model\Entity\Kayttajat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KayttajatController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['kirjauduUlos']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        if ( in_array($action, ['add', 'edit', 'delete'])) {
            return true;
        }

        return false;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $kayttajat = $this->paginate($this->Kayttajat);

        $this->set(compact('kayttajat'));
    }

    /**
     * View method
     *
     * @param string|null $id Kayttajat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kayttajat = $this->Kayttajat->get($id, [
            'contain' => []
        ]);

        $this->set('kayttajat', $kayttajat);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kayttajat = $this->Kayttajat->newEntity();
        if ($this->request->is('post')) {
            $kayttajat = $this->Kayttajat->patchEntity($kayttajat, $this->request->getData());
            if ($this->Kayttajat->save($kayttajat)) {
                $this->Flash->success(__('Käyttäjä on tallennettu'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Käyttäjän tallentaminen ei onnistunut. Yritä uudestaan.'));
        }
        $this->set(compact('kayttajat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kayttajat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kayttajat = $this->Kayttajat->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kayttajat = $this->Kayttajat->patchEntity($kayttajat, $this->request->getData());
            if ($this->Kayttajat->save($kayttajat)) {
                $this->Flash->success(__('Käyttäjä on tallennettu.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Käyttäjän tallentaminen ei onnistunut. Yritä uudelleen.'));
        }
        $this->set(compact('kayttajat'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kayttajat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kayttajat = $this->Kayttajat->get($id);
        if ($this->Kayttajat->delete($kayttajat)) {
            $this->Flash->success(__('Käyttäjä on poistettu.'));
        } else {
            $this->Flash->error(__('Käyttäjän poistaminen ei onnistunut. Yritä uudelleen.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function kirjaudu() {
        if($this->request->is('post')) {
            $kayttaja = $this->Auth->identify();

            if ($kayttaja) {
                $this->Auth->setUser($kayttaja);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Käyttäjätunnus tai salasana on virheellinen.');
        }
    }

    public function kirjauduUlos() {

        $this->Flash->success('Olet kirjautunut ulos.');
        return $this->redirect($this->Auth->logout());
    }
}
