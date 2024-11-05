<?php

namespace App\Controllers;

use App\Models\GuitarModel;
use App\Models\BrandModel;

class GuitarController extends BaseController {

    public function index() {
        $guitarModel = new GuitarModel();
        $guitars = $guitarModel->getAllGuitars();

        $brandModel = new BrandModel();
        $brands = $brandModel->getAllBrands();

        $this->loadView('/guitars', [
            'title' => 'Guitars',
            'guitars' => $guitars
        ]);
    } 

    public function addGuitarForm() {
        $brandModel = new BrandModel();
        $brands = $brandModel->getAllBrands();

        $this->loadView('/add-guitar', [
            'title' => 'Nieuwe Gitaar Toevoegen',
            'brands' => $brands
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

    public function editGuitarForm($guitarId) {
        $guitarModel = new GuitarModel();
        $guitar = $guitarModel->findById($guitarId);

        $brandModel = new BrandModel();
        $brands = $brandModel->getAllBrands();
    
        if (!$guitar) {
            // Als de gitaar niet gevonden is, redirect terug naar de gitarenlijst
            header('Location: /guitars');
            exit;
        }
    
        $this->loadView('/edit-guitar', [
            'title' => 'Gitaar Bewerken',
            'guitar' => $guitar,
            'brands' => $brands
        ]);
    }

    public function updateGuitar($guitarId) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = (int)$_POST['stock'];
        $brandName = $_POST['brand'];
    
        $brandModel = new BrandModel();
        $brand = $brandModel->findByName($brandName);
    
        if (!$brand) {
            // Voeg het merk toe als het nog niet bestaat
            $brandModel->setName($brandName);
            $brandModel->save();
            $brandId = $brandModel->getId();
        } else {
            $brandId = $brand->getId();
        }
    
        $guitar = new GuitarModel();
        $guitar->setGuitarId($guitarId);  // Gebruik de setter hier
        $guitar->setName($name);
        $guitar->setDescription($description);
        $guitar->setStock($stock);
        $guitar->setBrandId($brandId);
        $guitar->update();
    
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