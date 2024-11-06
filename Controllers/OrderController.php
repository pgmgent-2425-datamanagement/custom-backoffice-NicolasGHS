<?php

namespace App\Controllers;

use App\Models\OrderModel;

class OrderController extends BaseController {

    public function index() {
        $orderModel = new OrderModel();
        $orders = $orderModel->getAllOrders();

        $this->loadView('/orders', [
            'title' => 'Orders',
            'orders' => $orders

        ]);
    } 

    public function addOrderForm() {
        $this->loadView('/add-order', [
            'title' => 'Nieuwe bestelling Toevoegen'
        ]);
    }

    public function storeOrder() {
        $user_id = $_POST['user_id'];
        $status = $_POST['status'];
        $price = $_POST['price'];
        $order_date = $_POST['order_date'];

        $order = new OrderModel();
        $order->setUserId($user_id);
        $order->setStatus($status);
        $order->setPrice($price);
        $order->setOrderDate($order_date);
        $order->save();

        header('Location: /orders');
        exit;
    }

    public function editOrderForm($orderId) {
        $orderModel = new OrderModel();
        $order = $orderModel->findById($orderId);

        if (!$order) {
            // Als order niet is gevonden -> terug naar lijst
            header('Location: /orders');
            exit;
        }

        $this->loadView('/edit-order', [
            'title' => 'Bestelling Bewerken',
            'order' => $order,
        ]);
    }

    public function updateOrder($orderId) {
        $user_id = $_POST['user_id'];
        $status = $_POST['status'];
        $price = $_POST['price'];
        $order_date = $_POST['order_date'];

    
        $order = new OrderModel();
        $order->setUserId($user_id);
        $order->setOrderId($orderId);
        $order->setStatus($status);
        $order->setPrice($price);
        $order->setOrderDate($order_date);
        $order->update();
    
        header('Location: /orders');
        exit;
    }

    public function deleteOrder($orderId) {
        $order = new OrderModel();
        $order->setOrderId($orderId);  
        $order->delete();
    
        header('Location: /orders');
        exit;
    }


}