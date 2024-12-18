<?php

namespace App\Models;

use PDO;

class BrandModel extends BaseModel {
    protected $table = "brands";
    protected int $brand_id;
    protected string $name;

    public function findByName(string $name) {
        $sql = "SELECT * FROM {$this->table} WHERE name = :name";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':name' => $name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // Hier halen we het resultaat als een associatief array
        
        if ($result) {
            // Vul de eigenschappen in met de waarden uit de database
            $this->brand_id = $result['brand_id']; // Gebruik de juiste array keys
            $this->name = $result['name'];
            return $this; // Geef de huidige instantie terug
        }
        
        return null; // Merk niet gevonden
    }

    public function findById($brandId) {
        $sql = 'SELECT * FROM brands WHERE brand_id = :brand_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':brand_id' => $brandId]);
        $pdo_statement->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $pdo_statement->fetch();
    }

    public function save() {
        if (isset($this->brand_id)) {
            // Update bestaand merk
            $sql = "UPDATE {$this->table} SET name = :name WHERE brand_id = :brand_id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':name' => $this->name, ':brand_id' => $this->brand_id]);
        } else {
            // Voeg nieuw merk toe
            $sql = "INSERT INTO {$this->table} (name) VALUES (:name)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':name' => $this->name]);
            $this->brand_id = $this->db->lastInsertId();
        }
    }

    public function update() {
        $sql = 'UPDATE brands SET name = :name WHERE brand_id = :brand_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':brand_id' => $this->brand_id, 
        ]);
    }

    public function delete() {
        $sql = 'DELETE FROM brands WHERE brand_id = :brand_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':brand_id' => $this->brand_id]);
    }

    public function getAllBrands() {
        return $this->all();
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }
    
    public function getBrandId() {
        return $this->brand_id;
    }

    public function setBrandId($brand_id) {
        $this->brand_id = $brand_id;
    }

    public function getId() {
        return $this->brand_id; 
    }
}
