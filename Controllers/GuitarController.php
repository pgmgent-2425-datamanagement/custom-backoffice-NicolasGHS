<?php

namespace App\Controllers;

class GuitarController extends BaseController {

    public function index() {
        $this->loadView('/guitars', [
            'title' => 'Guitars'
        ]);
    } 
}