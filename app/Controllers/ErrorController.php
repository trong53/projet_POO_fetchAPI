<?php
namespace App\Controllers;

class ErrorController {
    public function loadError($error = '404') {
        require './app/errors/404.php';
    }
}
