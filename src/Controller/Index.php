<?php
namespace App\Controller;

use App\Controller\Controller;

/**
 *
 */
class Index extends Controller
{
    public function index() {
        $this->show( 'controller/index/index.php' );
    }
}
