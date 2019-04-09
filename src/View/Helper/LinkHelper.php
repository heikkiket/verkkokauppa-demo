<?php


namespace App\View\Helper;

use Cake\View\Helper;



class LinkHelper extends Helper
{
    public $helpers = ['Html'];

    public function makeOrder($title)
    {

        $title = urlencode($title);
        $asc = $this->_View->get('asc');

        $url = '';
        $class = '';
        $linkinLoppu = '';
        $nuoli = '';

        if ($this->_View->get('hakusana')) {
            $linkinLoppu = '&Hakusana=' . urlencode($this->_View->get('hakusana'));
        }

        if($this->_View->get('orderby') == $title) {
            if ($asc == "ASC") {
                $nuoli = '<span aria-hidden="true"><i class="fi-arrow-up"> </i></span>';
            } else {
                $nuoli = '<span aria-hidden="true"><i class="fi-arrow-down"> </i></span>';
            }
        }

        $url = '?Orderby=' . $title . '&Asc=' . $asc . $linkinLoppu;

        // Use the HTML helper to output
        // Formatted data:

        return '<a href="' . $url . '" class="' . $class . '">'. $nuoli .$title .'</a>';
    }

}