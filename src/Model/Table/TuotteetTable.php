<?php


namespace App\Model\Table;

use Cake\ORM\Table;


class TuotteetTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Soitintyypit');
    }
}

?>