<?php

namespace App\Models;

class GuitarModel extends BaseModel {
    protected $table = "guitars";
    protected int $guitar_id;
    protected string $name;
    protected string $description;
    protected int $stock;
    protected int $brand_id;


    public function save() {
        $sql = 'INSERT INTO guitars (name, description, stock, brand_id) VALUES (:name, :description, :stock, :brandId)';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':stock' => $this->stock,
            ':brandId' => $this->brand_id,
        ]);
    }


    public function getAllGuitars() {
        return $this->all();
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function getGuitarId() {
        return $this->guitar_id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getBrandName(): ?string {
        $brandModel = new BrandModel();
        $brand = $brandModel->find($this->brand_id); 
        return $brand ? $brand->getName() : null;
    }

    // TODO: Gebruiker kan naam van brand ingeven, als het niet bestaat wordt er een brand aangemaakt, anders wordt er gekeken welk id het moet zijn op basis van de naam
    public function setBrandId($brandId) {
        $this->brand_id = $brandId;
    }

}
