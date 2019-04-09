<?php


namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;


class Kayttaja extends Entity
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'salasana']
                ]
            ]
        ]);
    }

    protected function _setSalasana($value) {
        if(strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}