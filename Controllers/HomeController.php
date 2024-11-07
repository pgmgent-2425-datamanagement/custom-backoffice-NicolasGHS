<?php

namespace App\Controllers;

use App\Models\OrderModel;

class HomeController extends BaseController {

    public function index () {
        $orderModel = new OrderModel();

        $activeOrdersCount = $orderModel->countActiveOrders();
        $totalOrdersCount = $orderModel->countAllOrders();
        // $mostPopularGuitar = $orderModel->mostPopularGuitar();

        $this->loadView('/home', [
            'title' => 'Homepage',
            'activeOrdersCount' => $activeOrdersCount,
            'totalOrdersCount' => $totalOrdersCount,
            // 'mostPopularGuitar' => $mostPopularGuitar
        ]);
    }

}