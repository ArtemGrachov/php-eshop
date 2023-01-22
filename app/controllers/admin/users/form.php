<?php
require_once(__DIR__ . '/../../../models/user.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminUsersForm {
    use TraitPageAdminAuth;

    private function viewInit($data) {
        $title = $data['title'];
        $formAction = $data['formAction'];
        $formErrors = $data['formErrors'];
        $formValue = $data['formValue'];

        include(__DIR__ . '/../../../views/admin/users/form.php');
    }

    private function validateForm($formValue, $user = null) {
        $formErrors = [];

        $email = $_POST['email'] ?? null;
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$email) {
            $formErrors['email'] = ['required' => true];
        }

        if (!$username) {
            $formErrors['username'] = ['required' => true];
        }

        if (!$password && !$user) {
            $formErrors['password'] = ['required' => true];
        }

        return $formErrors;
    }

    public function index() {
        $this->viewInit([
            'title' => 'Create user',
            'formAction' => '/admin/users/create',
            'formErrors' => [],
            'formValue' => [
                'email' => '',
                'username' => '',
                'password' => ''
            ]
        ]);
    }

    public function create() {
        $payload = [
            'email' => $_POST['email'] ?? null,
            'username' => $_POST['username'] ?? null,
            'password' => $_POST['password'] ?? null,
            'role' => 'admin'
        ];

        $formErrors = $this->validateForm($_POST);

        if (count($formErrors)) {
            $this->viewInit([
                'title' => 'Create user',
                'formAction' => '/admin/users/create',
                'formErrors' => $formErrors,
                'formValue' => $_POST
            ]);
            return;
        }

        $user = new ModelUser($payload);
        $user->save();

        header('Location: /admin/users');
    }

    public function edit() {
        $userId = $_GET['id'];
        $user = ModelUser::getUser($userId);

        $this->viewInit([
            'title' => "Edit user $user->email",
            'formAction' => "/admin/users/edit?id=$userId",
            'formErrors' => [],
            'formValue' => [
                'email' => $user->email,
                'username' => $user->username,
                'password' => $user->password
            ]
        ]);
    }

    public function save() {
        $userId = $_GET['id'];

        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        $user = ModelUser::getUser($userId);

        $formErrors = $this->validateForm($_POST, $user);

        if (count($formErrors)) {
            $this->viewInit([
                'title' => "Edit user $user->email",
                'formAction' => "/admin/users/edit?id=$userId",
                'formErrors' => $formErrors,
                'formValue' => $_POST
            ]);
            return;
        }

        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();

        header('Location: /admin/users');
    }
}
