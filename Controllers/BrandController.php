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

    public function addBrandForm() {
        $this->loadView('/add-brand', [
            'title' => 'Nieuw Merk Toevoegen'
        ]);
    }

    public function storeBrand() {
        $name = $_POST['name'];

        $brand = new BrandModel();
        $brand->setName($name);
        $brand->save();

        header('Location: /brands');
        exit;
    }
}