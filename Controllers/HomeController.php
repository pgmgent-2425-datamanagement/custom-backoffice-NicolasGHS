<?php

namespace App\Controllers;

class HomeController extends BaseController {

    public function index () {

        $this->loadView('/home', [
            'title' => 'Homepage'
        ]);
    }

}