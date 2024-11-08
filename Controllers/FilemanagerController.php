<?php

namespace App\Controllers;

class FilemanagerController extends BaseController {
    public function list($folder = '') {
        $list = scandir(BASE_DIR . '/public/images/' . $folder);


        self::loadView('/filemanager', [
            'list' => $list
        ]);
    }

    public function delete($file) {
        $filePath = BASE_DIR . '/public/images/' . basename($file);

        if (file_exists($filePath)) {
            unlink($filePath);
            $message = 'Bestand succesvol verwijderd.';
        } else {
            $message = 'Bestand niet gevonden.';
        }

        header("Location: /filemanager?message=" . urlencode($message));
        exit();
    }
}