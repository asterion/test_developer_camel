<?php
namespace App\Controller;

class Controller {
    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    protected function show( $template ) {
        $layout = $this->config['framework']['views'] . '/layout.php';

        $template = $this->config['framework']['views'] . '/' . ltrim($template, '/');

        include( $layout );
    }
}
