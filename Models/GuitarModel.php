<?php

namespace App\Models;

use PDO;

class GuitarModel extends BaseModel {
    protected $table = "guitars";
    protected int $guitar_id;
    protected string $name;
    protected string $description;
    protected int $stock;
    protected int $brand_id;
    protected ?string $image;


    public function save() {
        $sql = 'INSERT INTO guitars (name, description, stock, brand_id, image) VALUES (:name, :description, :stock, :brandId, :image)';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':stock' => $this->stock,
            ':brandId' => $this->brand_id,
            ':image' => $this->image,
        ]);
    }

    public function delete() {
        $sql = 'DELETE FROM guitars WHERE guitar_id = :guitar_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':guitar_id' => $this->guitar_id]);
    }


    public function getAllGuitars() {
        return $this->all();
    }

    public function findById($guitarId) {
        $sql = 'SELECT * FROM guitars WHERE guitar_id = :guitar_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':guitar_id' => $guitarId]);
        $pdo_statement->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $pdo_statement->fetch();
    }

    public function update() {
        $sql = 'UPDATE guitars SET name = :name, description = :description, stock = :stock, brand_id = :brand_id, image = :image WHERE guitar_id = :guitar_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':stock' => $this->stock,
            ':brand_id' => $this->brand_id,
            ':image' => $this->image ?? '',
            ':guitar_id' => $this->guitar_id,
        ]);
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

    public function setGuitarId($guitar_id) {
        $this->guitar_id = $guitar_id;
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

    public function getBrandId() {
        return $this->brand_id;
    }

    public function setBrandId($brandId) {
        $this->brand_id = $brandId;
    }
    
    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }


}
