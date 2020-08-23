<?php
namespace App\Camel;

/**
 * Clase util como fake framework
 */
class Framework
{
    const SALT = 'pK,:0B{gDD&9Jf$b0j,s_c&,4!fS360>4t!OF,NkC31~fqyk@evD[bYZrN0]{aF';

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

    public static function encode($passText) {
        return password_hash($passText . self::SALT, PASSWORD_DEFAULT);
    }

    private function isRouteApi($path) {
        $parts = explode('api/', $path);

        if ( isset($parts[0]) && $parts[0] == '/' ) {
            return true;
        }

        return false;
    }

    public function route() {
        $index = parse_url( $this->config['server']['REQUEST_URI'], PHP_URL_PATH );
        $index = rtrim($index, '/');

        if ( $this->isRouteApi($index) ) {
            $parts = explode('/', $index);
            $method = sprintf('App\Controller\Api:%s', $parts[2]);

            $this->data['api'] = $parts;
        } else if ($index == "" && isset($this->config["route"]['home'])) {
            $method = $this->config["route"]['home'];
        } else {
            if ( ! isset( $this->config["route"][$index] ) ) {
                throw new \Exception(sprintf('Ruta desconocida: ' . $index), 404);
            }
            $method = $this->config["route"][$index];
        }

        list($controllerClass, $actionMethod) = explode(':', $method);

        $controller = new $controllerClass($this->config, $this->data);

        return $controller->$actionMethod();
    }
}
