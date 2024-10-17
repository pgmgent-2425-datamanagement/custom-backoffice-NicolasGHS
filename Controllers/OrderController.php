<?php

namespace App\Controllers;

class OrderController extends BaseController {

    public static function index() {
        self::loadView('/order', [
            'title' => 'orders'
        ]);
    } 
}