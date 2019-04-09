<?php


namespace App\Model\Entity;

use Cake\ORM\Entity;

class Tuote extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}

?>