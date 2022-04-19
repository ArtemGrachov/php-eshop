<?php
require_once(__DIR__ . '/../../../models/taxon.php');

class ControllerAdminTaxonsList {
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
