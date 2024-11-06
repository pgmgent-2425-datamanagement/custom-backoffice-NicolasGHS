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
}