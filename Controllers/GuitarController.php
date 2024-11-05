<?php

namespace App\Controllers;

use App\Models\GuitarModel;
use App\Models\BrandModel;

class GuitarController extends BaseController {

    public function index() {
        $guitarModel = new GuitarModel();
        $guitars = $guitarModel->getAllGuitars();

        $this->loadView('/guitars', [
            'title' => 'Guitars',
            'guitars' => $guitars
        ]);
    } 

    public function addGuitarForm() {
        $this->loadView('/add-guitar', [
            'title' => 'Nieuwe Gitaar Toevoegen'
        ]);
    }

    public function storeGuitar() {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = (int)$_POST['stock'];
        $brandName = $_POST['brand'];

        $brandModel = new BrandModel();
        $brand = $brandModel->findByName($brandName);

        if (!$brand) {
            // Voegt het merk toe als het nog niet bestaat
            $brandModel->setName($brandName);
            $brandModel->save();
            $brandId = $brandModel->getId();
        } else {
            $brandId = $brand->getId();
        }

        $guitar = new GuitarModel();
        $guitar->setName($name);
        $guitar->setDescription($description);
        $guitar->setStock($stock);
        $guitar->setBrandId($brandId);
        $guitar->save();

        header('Location: /guitars');
        exit;
    }

    public function deleteGuitar($guitarId) {
        $guitar = new GuitarModel();
        $guitar->setGuitarId($guitarId);  
        $guitar->delete();
    
        header('Location: /guitars');
        exit;
    }
    
}