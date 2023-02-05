<?php
require_once(__DIR__ . '/../../../models/address.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');
require_once(__DIR__ . '/../../../constants/pagination.php');

class ControllerAdminAddressesList {
    use TraitPageAdminAuth;

    public function index() {
        global $PAGINATION_LIMIT;

        $title = 'Addresses';
        $currentPage = $_GET['page'] ?? 1;

        $addresses = ModelAddress::getAddresses(
            $PAGINATION_LIMIT,
            ($currentPage - 1) * $PAGINATION_LIMIT
        );

        $addressesTotal = ModelAddress::countAddresses();

        include(__DIR__ . '/../../../views/admin/addresses/list.php');
    }

    public function remove () {
        $addressId = $_POST['id'];
        $address = ModelAddress::getAddress($addressId);
        $address->remove();
        header('Location: /admin/addresses');
    }
}
