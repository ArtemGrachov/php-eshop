<?php
require_once(__DIR__ . '/../../../models/user.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminUsersForm {
    use TraitPageAdminAuth;

    public function index() {
        $title = 'Create user';
        $formAction = '/admin/users/create';

        include(__DIR__ . '/../../../views/admin/users/form.php');
    }

    public function create() {
        $payload = [
            'email' => isset($_POST['email']) ? $_POST['email'] : null,
            'username' => isset($_POST['username']) ? $_POST['username'] : null,
            'password' => isset($_POST['password']) ? $_POST['password'] : null,
            'role' => 'admin'
        ];

        $user = new ModelUser($payload);
        $user->save();

        header('Location: /admin/users');
    }

    public function edit() {
        $title = 'Edit user';
        $userId = $_GET['id'];
        $formAction = "/admin/users/edit?id=$userId";

        $user = ModelUser::getUser($userId);

        include(__DIR__ . '/../../../views/admin/users/form.php');
    }

    public function save() {
        $userId = $_GET['id'];

        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        $user = ModelUser::getUser($userId);

        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();

        header('Location: /admin/users');
    }
}
