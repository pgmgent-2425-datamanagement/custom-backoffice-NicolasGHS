<?php

namespace App\Controllers;

use App\Models\GuitarModel;

class GuitarController extends BaseController {

    public function index() {
        $guitarModel = new GuitarModel();
        $guitars = $guitarModel->getAllGuitars();

        $this->loadView('/guitars', [
            'title' => 'Guitars',
            'guitars' => $guitars
        ]);
    } 
}