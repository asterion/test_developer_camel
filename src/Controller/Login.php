<?php
namespace App\Controller;

use App\Controller\Controller;

/**
 *
 */
class Login extends Controller
{
    public function index() {
        // header('UNAUTHORIZED', true, 401);

        $user = $this->isUser($this->getPost('email'));

        if ( $user ) {
            $user = $this->getUser($this->getPost('email'));

            if ( password_verify($this->getPost('password') . \App\Camel\Framework::SALT, $user['password']) ) {
                $_SESSION['user'] = $user;

                $sql = sprintf("UPDATE users SET last_access = '%s' WHERE email = '%s'", date('Y-m-d H:i:s'), $_SESSION['user']['email']);
                $this->db->exec($sql);
                header('Location: /');
            }
        }

        $this->show( 'controller/login/index.php' );
    }

    public function logout() {
        unset($_SESSION['user']);

        header('Location: /login');
    }

    protected function getUser($email) {
        $sql = sprintf('SELECT * FROM users WHERE email = ?');

        $sth = $this->db->prepare($sql);
        $params = array(
            $email,
        );

        $sth->execute($params);

        $data = $sth->fetchAll();

        if ( isset($data[0]) ) {
            return $data[0];
        }

        return null;
    }

    protected function isUser($email) {
        $sql = sprintf('SELECT id FROM users WHERE email = ?');

        $sth = $this->db->prepare($sql);
        $params = array(
            $email
        );
        $sth->execute($params);

        $data = $sth->fetchAll();

        return isset($data[0]['id']);
    }
}
