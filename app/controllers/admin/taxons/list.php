<?php
require_once(__DIR__ . '/../../../models/taxon.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');
require_once(__DIR__ . '/../../../constants/pagination.php');

class ControllerAdminTaxonsList {
    use TraitPageAdminAuth;

    public function index() {
        global $PAGINATION_LIMIT;

        $title = 'Taxons';
        $page = $_GET['page'] ?? 1;

        $taxons = ModelTaxon::getTaxons(
            $PAGINATION_LIMIT,
            ($page - 1) * $PAGINATION_LIMIT
        );

        include(__DIR__ . '/../../../views/admin/taxons/list.php');
    }

    public function remove () {
        $taxonId = $_POST['id'];
        $taxon = ModelTaxon::getTaxon($taxonId);
        $taxon->remove();
        header('Location: /admin/taxons');
    }
}
