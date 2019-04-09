<?php


namespace App\Controller;


use App\Controller\AppController;

class SoitintyypitController extends AppController
{

    public function index() {
        $soitintyypit = $this->Soitintyypit->find();
        $this->set(compact('soitintyypit'));
    }

    public function lisaa() {
        $soitintyyppi = $this->Soitintyypit->newEntity();
        if($this->request->is('post')) {
            $this->Soitintyypit->PatchEntity($soitintyyppi, $this->request->getData());

            if($this->Soitintyypit->save($soitintyyppi)) {
                $this->Flash->success(__("Soitintyyppi tallennettu."));
            }
        }
        $this->set('soitintyyppi', $soitintyyppi);

    }

    public function muokkaa($id) {
        $soitintyyppi = $this->Soitintyypit->findById($id)->FirstOrFail();

        if($this->request->is(['post', 'put'])) {
            $this->Soitintyypit->PatchEntity($soitintyyppi, $this->request->GetData());
            if($this->Soitintyypit->save($soitintyyppi)) {
                $this->Flash->success('Soitintyyppi tallennettu.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Soitintyypin päivitys ei onnistunut.');
        }
        $this->set('soitintyyppi', $soitintyyppi);
    }

    public function nayta($id) {
        $query = $this->Soitintyypit->Tuotteet->find('all')->where(['soitintyyppi' => $id]);
        $soittimet = $query->all();
        $soitintyyppi = $this->Soitintyypit->findById($id)->FirstOrFail();

        $this->set(compact('soittimet'));
        $this->set(compact('soitintyyppi'));

    }
}