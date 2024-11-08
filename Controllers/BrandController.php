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

    public function editBrandForm($brandId) {
        $brandModel = new BrandModel();
        $brand = $brandModel->findById($brandId);
    
        if (!$brand) {
            // Als de gitaar niet gevonden is, redirect terug naar de gitarenlijst
            header('Location: /brands');
            exit;
        }
    
        $this->loadView('/edit-brand', [
            'title' => 'Merk Bewerken',
            'brand' => $brand
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

    public function updateBrand($brandId) {
        $name = $_POST['name'];
        
    
        $brand = new BrandModel();
        $brand->setBrandId($brandId);
        $brand->setName($name);
        $brand->update();
    
        header('Location: /brands');
        exit;
    }

    public function deleteBrand($brandId) {
        $brand = new BrandModel();
        $brand->setBrandId($brandId);  
        $brand->delete();
    
        header('Location: /brands');
        exit;
    }
}