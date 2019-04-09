<?php


namespace App\Model\Table;


use Cake\ORM\Table;

class OstoskoriTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->hasMany('Ostoskorituotteet');
        $this->belongsTo('Kayttajat')
            ->setForeignKey('kayttaja_id');
    }
}