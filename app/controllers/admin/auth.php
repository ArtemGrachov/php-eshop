<?php
require_once(__DIR__ . '/../../services/auth.php');
require_once(__DIR__ . '/../../models/user.php');
require_once(__DIR__ . '/../../traits/page-admin-guest.php');

class ControllerAdminAuth {
    use TraitPageAdminGuest;

    public static $_AUTH_ERROR_DEFAULT = 'DEFAULT';
    public static $_AUTH_ERROR_VALIDATION = 'VALIDATION';

    private function validateForm($formValue) {
        $formErrors = [];

        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$username) {
            $formErrors['username'] = ['required' => true];
        }

        if (!$password) {
            $formErrors['password'] = ['required' => true];
        }

        return $formErrors;
    }

    private function viewInit($data) {
        $title = ServiceI18n::t('admin.auth.title');
        $formAction = '/admin/auth';
        $formError = $data['formError'] ?? null;
        $formErrors = $data['formErrors'] ?? [];

        include(__DIR__ . '/../../views/admin/auth.php');
    }

    public function index() {
        $this->viewInit([]);
    }

    public function __construct() {
        $this->auth = ServiceAuth::getInstance();
    }

    public function signIn() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = ModelUser::getUserByUsername($username);

        try {
            $formErrors = $this->validateForm($_POST);

            if (count($formErrors) > 0) {
                throw new ExtendedException(
                    'Validation error',
                    [
                        'code' => 422,
                        'type' => ControllerAdminAuth::$_AUTH_ERROR_VALIDATION,
                        'formErrors' => $formErrors
                    ]
                );
            }

            if (!isset($user->id)) {
                throw new ExtendedException(
                    'User not found',
                    [
                        'code' => 401,
                        'type' => ControllerAdminAuth::$_AUTH_ERROR_DEFAULT
                    ]
                );
            }

            $authSuccess = password_verify($password, $user->password);

            if (!$authSuccess) {
                throw new ExtendedException(
                    'User not found',
                    [
                        'code' => 401,
                        'type' => ControllerAdminAuth::$_AUTH_ERROR_DEFAULT
                    ]
                );
            }

            session_start();

            $_SESSION = array();
            $_SESSION['userId'] = $user->id;

            header('Location: /admin');
        } catch (ExtendedException $e) {
            $errorData = $e->getData();

            switch ($errorData['type']) {
                case ControllerAdminAuth::$_AUTH_ERROR_VALIDATION: {
                    $this->viewInit([
                        'formErrors' => $formErrors
                    ]);
                    break;
                }
                case ControllerAdminAuth::$_AUTH_ERROR_DEFAULT: {
                    $this->viewInit([
                        'formError' => ServiceI18n::t('admin.auth.auth_error'),
                    ]);
                    break;
                }
                default: {
                    throw $e;
                }
            }
        }
    }
}