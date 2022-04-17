<?php
require_once(__DIR__ . '/../../../models/taxon.php');

class ControllerAdminTaxonsForm {
    public function index() {
        $title = 'Create taxon';
        include(__DIR__ . '/../../../views/admin/taxons/form.php');
    }

    public function create() {
        $payload = [
            'name' => $_POST['name'],
            'description' => $_POST['description']
        ];
        ModelTaxon::createTaxon($payload);
    }
}
