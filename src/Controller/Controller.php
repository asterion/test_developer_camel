<?php
namespace App\Controller;

class Controller {
    use \App\Camel\Debug;

    private $config;
    private $data;
    protected $db;

    public function __construct($config, $data) {
        $this->config = $config;
        $this->data = $data;

        $this->db = new \PDO($config['database']['dsn'], $config['database']['username'], $config['database']['password']);
    }

    public function getPost( $name ){
        $value = null;

        if ( isset($this->data['post'][$name]) ) {
            $value = filter_var($this->data['post'][$name], FILTER_SANITIZE_STRING);
        }

        return $value;
    }

    protected function show( $template ) {
        $layout = $this->config['framework']['views'] . '/layout.php';

        $template = $this->config['framework']['views'] . '/' . ltrim($template, '/');

        include( $layout );
    }
}
