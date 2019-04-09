<?php


namespace App\Controller;
use App\Controller\Component\RequestHandlerComponent;


class OstoskorituotteetController extends AppController {


    public function initialize() {

        parent::initialize();
        $this->loadComponent('RequestHandler');

        $this->Auth->allow([ 'add', 'delete']);

        $this->RequestHandler->renderAs($this, 'json');

    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        $rivi = $this->Ostoskorituotteet->findById($id)->contain('Ostoskorit')->first();


        return $rivi->kayttaja_id === $user['id'];
    }

    public function index() {

        $user_id = $this->getRequest()->getSession()->read('Auth.User.id');

        $tuotteet = $this->Ostoskorituotteet->haeTuotteet($user_id);


        $this->set([
            'tuotteet' => $tuotteet,
            '_serialize'=> 'tuotteet']);
    }

    public function view($id) {

        $rivi = $this->Ostoskorituotteet->findById($id)->firstOrFail();

        $this->set([
            'tuote' => $rivi,
            '_serialize' => 'tuote'
        ]);
    }

    public function add() {


        $params = $this->request->getData();
        $user_id = $this->getRequest()->getSession()->read('Auth.User.id');


        $rivi = $this->Ostoskorituotteet->newEntity($params);

        $ostoskori = $this->Ostoskorituotteet->Ostoskori->find()
            ->where(['kayttaja_id' => $user_id])->firstOrFail();

        $rivi->set('ostoskori_id', $ostoskori->id);

        $viesti = "testi";

        if($this->Ostoskorituotteet->save($rivi)) {
            $viesti = 'onnistui';
        } else {
            //debug($rivi->getErrors());
            $viesti = 'virhe';
        }

        $this->set([
            'viesti' => $viesti,
            'rivi' => $rivi,
            'query' => $params,
            '_serialize' => ['viesti', 'rivi', 'query']
        ]);

    }

    public function delete($id) {
        $rivi = $this->Ostoskorituotteet->get($id);
        $viesti = 'Poistettu.';
        if (!$this->Ostoskorituotteet->delete($rivi)) {
            $viesti = 'Virhe';
        }

        $this->set([
            'viesti' => $viesti,
            'rivi' => $rivi,
            '_serialize' => ['viesti', 'rivi']
        ]);
    }
}