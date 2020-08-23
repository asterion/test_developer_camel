<?php
namespace App\Controller;

use App\Controller\Controller;

/**
 *
 */
class Api extends Controller
{
    const VERSION = '0.1';

    public function show($data) {
        echo json_encode($data);
    }

    public function __call($name, $arguments) {
        header('Content-Type: application/json');

        switch ($this->config['server']['REQUEST_METHOD']) {
            case 'PUT':
                    $data = json_decode(file_get_contents('php://input'));
                    $data = $this->update($name, $data);
                break;
            default:
                    $sql = sprintf('SELECT id, email, name, role, last_access FROM users WHERE id <> %s', $_SESSION['user']['id']);
                    $data = $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
                break;
        }

        $this->show($data);
    }

    public function update($entity, $data) {
        if ( is_object($data) && isset($data->id) ) {
            $sql = sprintf("SELECT * FROM %s WHERE id = %s", $entity, $data->id);
            $data = $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $sql = "INSERT INTO users (name, email, password, last_access, role) VALUES (?, ?, ?, ?, ?)";

            $stmt= $this->db->prepare($sql);
            $r = $stmt->execute(array(
                $data->name,
                $data->email,
                'password',
                date('Y-m-d H:i:s'),
                $data->role,
            ));
        }

        return $data;
    }

    public function index() {
        header('Content-Type: application/json');

        echo json_encode(array(
            'version' => self::VERSION
        ));
    }
}
