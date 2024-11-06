<?php

namespace App\Models;

class OrderModel extends BaseModel {
    protected $table = "orders";
    protected int $user_id;
    protected string $status;
    protected int $price;
    protected string $order_date;

    public function getAllOrders() {
        return $this->all();
    }

    public function findById($orderId) {
        $sql = 'SELECT * FROM orders WHERE order_id = :order_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':order_id' => $orderId]);
        $pdo_statement->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $pdo_statement->fetch();
    }

    public function getUserId(): int {
        return $this->user_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function getOrderDate(): string {
        return $this->order_date;
    }
}