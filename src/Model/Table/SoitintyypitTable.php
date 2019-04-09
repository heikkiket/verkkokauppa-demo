<?php


namespace App\Model\Table;

use Cake\ORM\Table;


class SoitintyypitTable extends Table
{
    public function initialize(array $config) {
        $this->hasMany('Tuotteet');
        $this->setDisplayField('soitintyyppi');
    }
}