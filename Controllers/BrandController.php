<?php

namespace App\Controllers;

class BrandController extends BaseController {

    public function index() {
        $this->loadView('/brands', [
            'title' => 'Brands'
        ]);
    } 
}