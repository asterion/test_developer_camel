<?php
namespace App\Camel;

/**
 * Clase util como fake framework
 */
class Framework
{
    private $config;
    private $data;

    public function __construct( $config, $data ) {
        $path = realpath($config['server']['DOCUMENT_ROOT'] . '/../');
        if ( isset($config['framework']['views']) ) {
            $config['framework']['views'] = preg_replace('/%path%/', $path, $config['framework']['views']);
        }

        $this->config = $config;
        $this->data = $data;
    }

    public function route() {
        $index = parse_url( $this->config['server']['REQUEST_URI'], PHP_URL_PATH );

        if ( ! isset( $this->config["route"][$index] ) ) {
            throw new \Exception(sprintf('Ruta desconocida: ' . $index), 404);
        }

        list($controllerClass, $actionMethod) = explode(':', $this->config["route"][$index]);

        $controller = new $controllerClass($this->config, $this->data);

        return $controller->$actionMethod();
    }
}
