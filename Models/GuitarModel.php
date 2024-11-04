<?php

namespace App\Models;

class GuitarModel extends BaseModel {
    protected $table = "guitars";
    protected int $guitar_id;
    protected string $name;
    protected string $description;
    protected int $stock;
    protected int $brand_id;


    public function getAllGuitars() {
        return $this->all();
    }

    public function getName() {
        return $this->name;
    }
    
    public function getGuitarId() {
        return $this->guitar_id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getBrandName(): ?string {
        $brandModel = new BrandModel();
        $brand = $brandModel->find($this->brand_id); 
        return $brand ? $brand->getName() : null;
    }
}
