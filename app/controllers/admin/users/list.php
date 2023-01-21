<?php
require_once(__DIR__ . '/../../../models/user.php');

class ControllerAdminUsersList {
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
