<?php

namespace App\Controllers;

class OrderController extends BaseController {

    public function index() {
        $this->loadView('/orders', [
            'title' => 'orders'
        ]);
    } 
}