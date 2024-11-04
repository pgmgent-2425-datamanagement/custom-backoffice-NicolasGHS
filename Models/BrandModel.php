<?php

namespace App\Models;

class BrandModel extends BaseModel {
    protected $table = "brands";
    protected int $brand_id;
    protected string $name;

    public function getAllBrands() {
        return $this->all();
    }

    public function getName() {
        return $this->name;
    }
    
    public function getBrandId() {
        return $this->brand_id;
    }
}
