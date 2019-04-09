<?php


namespace App\Controller;


class TuotteetController extends AppController
{

    public $paginate = [
        'limit' => 5
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        if ( in_array($action, ['lisaa', 'poista', 'muokkaa'])) {
            return true;
        }

        return false;
    }

    public function index()
    {
        $orderby = (string)$this->request->getQuery('Orderby', 'nimi');
        $asc = (string)$this->request->getQuery('Asc', 'ASC');
        $orderclause = [$orderby => $asc];


        $query = $this->Tuotteet->find()->order($orderclause);
        $tuotteet = $this->Paginator->paginate($query);

        $this->set(compact('tuotteet'));

        if($asc == 'DESC') {
            $asc = 'ASC';
        } else {
            $asc = 'DESC';
        }


        $this->set('orderby', $orderby);
        $this->set('asc', $asc);
    }

    public function etsi() {

        $orderby = (string)$this->request->getQuery('Orderby', 'nimi');
        $asc = (string)$this->request->getQuery('Asc', 'ASC');
        $orderclause = [$orderby => $asc];

        $hakusana = (string)$this->request->getQuery('Hakusana');

        $hakuehto = ['nimi LIKE' => "%$hakusana%"];
        try {
            if((int) $hakusana) {
                $hakuehto = ['OR' => [$hakuehto, ['tuotekoodi' => (int) $hakusana]]];
            }
        } catch (Exception $e) {
            echo $e;
        }

        $query = $this->Tuotteet->find('all')
            ->where($hakuehto)
            ->order($orderclause);

        $tuotteet = $this->Paginator->paginate($query);


        $this->set(compact('hakusana'));
        $this->set(compact('tuotteet'));

        if($asc == 'DESC') {
            $asc = 'ASC';
        } else {
            $asc = 'DESC';
        }

        $this->set('orderby', $orderby);
        $this->set('asc', $asc);
    }

    public function nayta($tuotekoodi = null) {

        $tuote = $this->Tuotteet->findByTuotekoodi($tuotekoodi)->firstOrFail();
        $this->set(compact('tuote'));
    }

    public function lisaa() {
        $this->set('otsikko', 'Lisää tuote');

        $tuote = $this->Tuotteet->newEntity();
        if($this->request->is('post')) {
            $tuote = $this->Tuotteet->patchEntity($tuote, $this->request->getData());


            if ($this->Tuotteet->save($tuote)) {
                $this->Flash->success(__('Tuote on tallennettu tietokantaan.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Tuotteen lisääminen ei onnistunut.'));
        }
        $soitintyypit = $this->Tuotteet->Soitintyypit->find('list');
        $this->set('soitintyypit', $soitintyypit);
        $this->set('tuote', $tuote);

        $this->render('lisaa_ja_muokkaa');
    }

    public function muokkaa($tuotekoodi) {
        $this->set('otsikko', 'Muokkaa tuotetta');

        $tuote = $this->Tuotteet->findByTuotekoodi($tuotekoodi)->FirstOrFail();
        if($this->request->is(['post', 'put'])) {
            $this->Tuotteet->patchEntity($tuote, $this->request->getData());
            if($this->Tuotteet->save($tuote)) {
                $this->Flash->success(__('Tuote on päivitetty.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Tuotteen päivitys ei onnistunut.'));
        }

        $soitintyypit = $this->Tuotteet->Soitintyypit->find('list');
        $this->set('soitintyypit', $soitintyypit);
        $this->set('tuote', $tuote);


        $this->render('lisaa_ja_muokkaa');

    }

    public function poista($tuotekoodi) {
        $this->render('index');

        $tuote = $this->Tuotteet->findByTuotekoodi($tuotekoodi) -> FirstOrFail();
        if($this->request->is(['post', 'put'])) {
            $nimi = $tuote->nimi;
            if($this->Tuotteet->delete($tuote)) {
                $this->Flash->success(__('Tuote $nimi on poistettu.'));
                return $this->redirect(['action' => 'index']);
            }
        }
    }

}

?>