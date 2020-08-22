<?php
namespace App\Controller;

use App\Controller\Controller;

/**
 *
 */
class Login extends Controller
{
    public function index() {
        header('UNAUTHORIZED', true, 401);

        $this->show( 'controller/login/index.php' );
    }
}
