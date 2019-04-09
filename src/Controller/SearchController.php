<?php


namespace App\Controller;

use Cake\Controller\Controller;


class SearchController extends Controller
{
    public function index() {
        $query = $this->request->getQuery('q');
        $this->set(compact('query'));
    }
}