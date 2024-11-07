<?php

namespace App\Models;

use PDO;

class OrderGuitarModel extends BaseModel {
    protected $table = "guitar_order"; 

    public function addGuitarToOrder($orderId, $guitarId) {
        $sql = 'INSERT INTO guitar_order (order_id, guitar_id) VALUES (:order_id, :guitar_id)';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':order_id' => $orderId,
            ':guitar_id' => $guitarId
        ]);
    }
}
