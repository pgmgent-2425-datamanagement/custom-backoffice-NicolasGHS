<?php

namespace App\Controllers;

use App\Models\BrandModel;

class BrandController extends BaseController {

    public function index() {
        $brandModel = new BrandModel();
        $brands = $brandModel->getAllBrands();


        $this->loadView('/brands', [
            'title' => 'Brands',
            'brands' => $brands

        ]);
    } 
}