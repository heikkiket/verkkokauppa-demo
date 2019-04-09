<?php


namespace App\Model\Table;

use Cake\ORM\Table;


class KayttajatTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setEntityClass('App\Model\Entity\Kayttaja');

    }
}