<?php

namespace App\Controllers;

class FilemanagerController extends BaseController {
    public function list($folder = '') {
        $list = scandir(BASE_DIR . '/public/images/' . $folder);


        self::loadView('/filemanager', [
            'list' => $list
        ]);
    }
}