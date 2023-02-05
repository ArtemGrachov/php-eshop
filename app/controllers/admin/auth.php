<?php
require_once(__DIR__ . '/../../services/auth.php');
require_once(__DIR__ . '/../../models/user.php');
require_once(__DIR__ . '/../../traits/page-admin-guest.php');

class ControllerAdminAuth {
    use TraitPageAdminGuest;

    public function index() {
        $title = ServiceI18n::t('admin.auth.title');
        $formAction = '/admin/auth';

        include(__DIR__ . '/../../views/admin/auth.php');
    }

    public function __construct() {
        $this->auth = ServiceAuth::getInstance();
    }

    public function signIn() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = ModelUser::getUserByUsername($username);

        if (!isset($user->id)) {
            echo 'Incorrect login or password'; // @todo
            return;
        }

        $authSuccess = password_verify($password, $user->password);

        if (!$authSuccess) {
            echo 'Incorrect login or password'; // @todo
            return;
        }

        session_start();
        $_SESSION = array();
        $_SESSION['userId'] = $user->id;

        header('Location: /admin');
    }
}