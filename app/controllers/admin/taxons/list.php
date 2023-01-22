<?php
require_once(__DIR__ . '/../../../models/taxon.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminTaxonsList {
    use TraitPageAdminAuth;

    public function index() {
        $title = 'Taxons';
        $taxons = ModelTaxon::getTaxons();

        include(__DIR__ . '/../../../views/admin/taxons/list.php');
    }

    public function remove () {
        $taxonId = $_POST['id'];
        $taxon = ModelTaxon::getTaxon($taxonId);
        $taxon->remove();
        header('Location: /admin/taxons');
    }
}
