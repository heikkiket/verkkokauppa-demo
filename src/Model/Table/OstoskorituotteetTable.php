<?php


namespace App\Model\Table;

use Cake\ORM\Table;


class OstoskorituotteetTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->hasMany('Tuotteet')
            ->setForeignKey('tuotekoodi')
            ->setBindingKey('tuotekoodi');
        $this->belongsTo('Ostoskori')
            ->setForeignKey('ostoskori_id');
    }

    public function haeTuotteet($user_id) {

        /* SELECT ostoskorituotteet.ostoskori_id, tuotteet.tuotekoodi, tuotteet.nimi,
        ostoskori.kayttaja_id, kayttajat.nimi FROM ostoskorituotteet
        LEFT JOIN tuotteet ON ostoskorituotteet.tuotekoodi = tuotteet.tuotekoodi
        LEFT JOIN ostoskori ON ostoskorituotteet.ostoskori_id = ostoskori.id
        LEFT JOIN kayttajat ON ostoskori.kayttaja_id = kayttajat.id
        WHERE ostoskori.kayttaja_id = $ID; */

        $hakuehto = ['kayttaja_id' => $user_id];
        $tuotteet = $this->find()
            ->where($hakuehto)
            ->contain('Tuotteet')
            ->contain(['Ostoskori' => ['Kayttajat' => ['fields' => ['nimi']]]]);

        //echo $tuotteet;
        foreach ($tuotteet as $tuote) {

            $tuote['tuotteet'] = $tuote['tuotteet'][0];
        }



        return $tuotteet;
    }
}