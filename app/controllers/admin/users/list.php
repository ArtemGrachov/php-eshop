<?php
require_once(__DIR__ . '/../../../models/user.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminUsersList {
    use TraitPageAdminAuth;

    public function index() {
        $title = 'Users';
        $users = ModelUser::getUsers();

        include(__DIR__ . '/../../../views/admin/users/list.php');
    }

    public function remove () {
        $userId = $_POST['id'];
        $user = ModelUser::getUser($userId);
        $user->remove();
        header('Location: /admin/users');
    }
}
