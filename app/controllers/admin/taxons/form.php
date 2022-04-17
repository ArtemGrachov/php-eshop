<?php
require_once(__DIR__ . '/../../../models/taxon.php');

class ControllerAdminTaxonsForm {
    public function index() {
        $title = 'Create taxon';
        $formAction = '/admin/taxons/create';

        include(__DIR__ . '/../../../views/admin/taxons/form.php');
    }

    public function create() {
        $payload = [
            'name' => $_POST['name'],
            'description' => $_POST['description']
        ];

        $taxon = new ModelTaxon($payload);
        $taxon->save();

        header('Location: /admin/taxons');
    }

    public function edit() {
        $title = 'Edit taxon';
        $taxonId = $_GET['id'];
        $formAction = "/admin/taxons/edit?id=$taxonId";

        $taxon = ModelTaxon::getTaxon($taxonId);

        include(__DIR__ . '/../../../views/admin/taxons/form.php');
    }

    public function save() {
        $taxonId = $_GET['id'];

        $name = $_POST['name'];
        $description = $_POST['description'];

        $taxon = ModelTaxon::getTaxon($taxonId);

        $taxon->name = $name;
        $taxon->description = $description;

        $taxon->save();

        header('Location: /admin/taxons');
    }
}
