<?php

class ControllerError {
    private $error = null;

    public function __construct($payload) {
        if ($payload) {
            if (method_exists($payload, 'getData')) {
                $this->error = $payload->getData();
            }
        }
    }

    public function view() {
        $statusCode = 500;
        $errorTitle = 500;
        $errorDescription = ServiceI18n::t('error.internal_server_error');

        if (!is_null($this->error) && isset($this->error['code'])) {
            $errorTitle = $this->error['code'];
            $statusCode = $this->error['code'];

            if ($this->error['code'] === 404) {
                $errorDescription = ServiceI18n::t('error.not_found');
            }
        }

        $breadcrumbs = [
            [
                'link' => '/',
                'label' => ServiceI18n::t('customer.home')
            ],
            [
                'label' => $errorTitle
            ]
        ];

        http_response_code($statusCode);
        include(__DIR__ . '/../views/error.php');
    }
}
