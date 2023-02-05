<?php
require_once(__DIR__ . '/../../../models/user.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');
require_once(__DIR__ . '/../../../constants/pagination.php');

class ControllerAdminUsersList {
    use TraitPageAdminAuth;

    public function index() {
        global $PAGINATION_LIMIT;

        $title = ServiceI18n::t('admin.view_users_list.title');
        $currentPage = $_GET['page'] ?? 1;
        $totalPages = 99; // @todo

        $users = ModelUser::getUsers(
            $PAGINATION_LIMIT,
            ($currentPage - 1) * $PAGINATION_LIMIT
        );

        $usersTotal = ModelUser::countUsers();

        include(__DIR__ . '/../../../views/admin/users/list.php');
    }

    public function remove () {
        $userId = $_POST['id'];
        $user = ModelUser::getUser($userId);
        $user->remove();
        header('Location: /admin/users');
    }
}
