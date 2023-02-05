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
        $errorTitle = 500;
        $errorDescription = ServiceI18n::t('error.internal_server_error');

        if (!is_null($this->error) && isset($this->error['code'])) {
            $errorTitle = $this->error['code'];

            if ($this->error['code'] === 404) {
                $errorDescription = ServiceI18n::t('error.not_found');
            }
        }

        include(__DIR__ . '/../views/error.php');
    }
}
