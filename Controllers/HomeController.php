<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderGuitarModel;
use App\Models\GuitarModel;



class HomeController extends BaseController {

    public function index () {
        $orderModel = new OrderModel();
        $orderGuitarModel = new OrderGuitarModel();

        $activeOrdersCount = $orderModel->countActiveOrders();
        $totalOrdersCount = $orderModel->countAllOrders();
        $mostPopularGuitarId = $orderGuitarModel->getMostPopularGuitar();

        $guitarModel = new GuitarModel();
        $mostPopularGuitar = $guitarModel->findById($mostPopularGuitarId);

        $this->loadView('/home', [
            'title' => 'Homepage',
            'activeOrdersCount' => $activeOrdersCount,
            'totalOrdersCount' => $totalOrdersCount,
            'mostPopularGuitar' => $mostPopularGuitar
        ]);
    }

}