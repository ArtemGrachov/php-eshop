<?php
require_once(__DIR__ . '/../../../models/taxon.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminTaxonsForm {
    use TraitPageAdminAuth;

    public function index() {
        $this->viewInit([
            'title' => ServiceI18n::t('admin.view_taxons_form.create_taxon'),
            'formAction' => '/admin/taxons/create',
            'formErrors' => [],
            'formValue' => [
                'name' => '',
                'description' => ''
            ]
        ]);
    }

    private function viewInit($data) {
        $title = $data['title'];
        $formAction = $data['formAction'];
        $formErrors = $data['formErrors'];
        $formValue = $data['formValue'];
        $taxon = $data['taxon'];

        include(__DIR__ . '/../../../views/admin/taxons/form.php');
    }

    private function validateForm($formValue) {
        $formErrors = [];

        $name = $_POST['name'];

        if (!$name) {
            $formErrors['name'] = ['required' => true];
        }

        return $formErrors;
    }

    public function create() {
        $payload = [
            'name' => $_POST['name'],
            'description' => $_POST['description']
        ];

        $formErrors = $this->validateForm($_POST);

        if (count($formErrors)) {
            $this->viewInit([
                'title' => ServiceI18n::t('admin.view_taxons_form.create_taxon'),
                'formAction' => '/admin/taxons/create',
                'formErrors' => $formErrors,
                'formValue' => $_POST
            ]);
            return;
        }

        $taxon = new ModelTaxon($payload);
        $taxon->save();

        header('Location: /admin/taxons');
    }

    public function edit() {
        $taxonId = $_GET['id'];

        $taxon = ModelTaxon::getTaxon($taxonId);

        if (is_null($taxon)) {
            throw new ExtendedException(
                'Not found',
                ['code' => 404]
            );
        }

        $this->viewInit([
            'title' => ServiceI18n::t('admin.view_taxons_form.edit_taxon'),
            'formAction' => "/admin/taxons/edit?id=$taxonId",
            'taxon' => $taxon,
            'formErrors' => [],
            'formValue' => [
                'name' => $taxon->name,
                'description' => $taxon->description
            ]
        ]);
    }

    public function save() {
        $taxonId = $_GET['id'];

        $name = $_POST['name'];
        $description = $_POST['description'];

        $taxon = ModelTaxon::getTaxon($taxonId);

        $formErrors = $this->validateForm($_POST);

        if (count($formErrors)) {
            $this->viewInit([
                'title' => ServiceI18n::t('admin.view_taxons_form.edit_taxon'),
                'formAction' => "/admin/taxons/edit?id=$taxonId",
                'taxon' => $taxon,
                'formErrors' => $formErrors,
                'formValue' => $_POST
            ]);
            return;
        }

        $taxon->name = $name;
        $taxon->description = $description;

        $taxon->save();

        header('Location: /admin/taxons');
    }
}
