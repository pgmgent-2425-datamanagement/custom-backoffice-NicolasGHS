<?php

namespace App\Models;

use PDO;

class OrderModel extends BaseModel {
    protected $table = "orders";
    protected int $order_id;
    protected int $user_id;
    protected string $status;
    protected int $price;
    protected string $order_date;


    public function save() {
        $sql = 'INSERT INTO orders (user_id, status, price, order_date) VALUES (:user_id, :status, :price, :order_date)';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':user_id' => $this->user_id,
            ':status' => $this->status,
            ':price' => $this->price,
            ':order_date' => $this->order_date,
        ]);

        $this->order_id = $this->db->lastInsertId();
    }

    public function update() {
        $sql = 'UPDATE orders SET user_id = :user_id, status = :status, price = :price, order_date = :order_date WHERE order_id = :order_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':user_id' => $this->user_id,
            ':status' => $this->status,
            ':price' => $this->price,
            ':order_date' => $this->order_date,
            ':order_id' => $this->order_id
        ]);
    }

    public function delete() {
        $sql = 'DELETE FROM orders WHERE order_id = :order_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':order_id' => $this->order_id]);
    }

    public function getAllOrders() {
        return $this->all();
    }

    public function getOrdersByStatus($status) {
        if ($status) {
            $sql = 'SELECT * FROM orders WHERE status = :status';
            $pdo_statement = $this->db->prepare($sql);
            $pdo_statement->execute([':status' => $status]);
        } else {
            $sql = 'SELECT * FROM orders';
            $pdo_statement = $this->db->prepare($sql);
            $pdo_statement->execute();
        }
    
        $pdo_statement->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $pdo_statement->fetchAll();
    }

    public function getOrdersWithGuitars($status = '') {
        // Als er een status is, filter dan op status
        if ($status) {
            $sql = '
                SELECT o.*, g.name AS guitar_name
                FROM orders o
                LEFT JOIN guitar_order oi ON o.order_id = oi.order_id
                LEFT JOIN guitars g ON oi.guitar_id = g.guitar_id
                WHERE o.status = :status
            ';
            $pdo_statement = $this->db->prepare($sql);
            $pdo_statement->execute([':status' => $status]);
        } else {
            $sql = '
                SELECT o.*, g.name AS guitar_name
                FROM orders o
                LEFT JOIN guitar_order oi ON o.order_id = oi.order_id
                LEFT JOIN guitars g ON oi.guitar_id = g.guitar_id
            ';
            $pdo_statement = $this->db->prepare($sql);
            $pdo_statement->execute();
        }
    
        $pdo_statement->setFetchMode(PDO::FETCH_ASSOC);
        return $pdo_statement->fetchAll();
    }
    

    public function findById($orderId) {
        $sql = 'SELECT * FROM orders WHERE order_id = :order_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':order_id' => $orderId]);
        $pdo_statement->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $pdo_statement->fetch();
    }

    public function countActiveOrders(): int {
        $sql = 'SELECT COUNT(*) FROM orders WHERE status != :status';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':status' => 'delivered']);
        return (int) $pdo_statement->fetchColumn();
    }

    public function countAllOrders(): int {
        $sql = 'SELECT COUNT(*) FROM orders';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        return (int) $pdo_statement->fetchColumn();
    }

    public function getUserId(): int {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function setOrderId($order_id) {
        $this->order_id = $order_id;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getOrderDate(): string {
        return $this->order_date;
    }

    public function setOrderDate($order_date) {
        $this->order_date = $order_date;
    }
}