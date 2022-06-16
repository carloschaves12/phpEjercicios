<?php
namespace App\Controllers;

class BaseController {
    public function renderHTML($fileName, $data=[], $data2=[]) {
        include($fileName);
    }
}