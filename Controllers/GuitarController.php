<?php

namespace App\Controllers;

class GuitarController extends BaseController {

    public static function index() {
        self::loadView('/guitar', [
            'title' => 'Guitars'
        ]);
    } 
}