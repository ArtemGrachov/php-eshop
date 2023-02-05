<?php

class WidgetFormError {
    private $errors = [];
    private $customMessages = [];

    private function getErrorMessages() {
        $result = [];

        foreach ($this->errors as $errorKey => $errorValue) {
            $errorMessage = $this->getErrorMessage($errorKey);

            $param = null;

            if (is_array($errorValue)) {
                $param = $errorValue;
            } else {
                $param = ['param' => $errorValue];
            }

            $errorTranslation = ServiceI18n::t($errorMessage, $param);

            if (!is_null($errorMessage)) {
                array_push($result, $errorTranslation);
            }
        }

        return $result;
    }

    private function getErrorMessage($errorCode) {
        $errorMessages = [
            'required' => 'common.validation.required',
            'minLength' => 'common.validation.minLength',
            'lowerCase' => 'common.validation.lowerCase',
            'upperCase' => 'common.validation.upperCase',
            'digits' => 'common.validation.digits'
        ];

        return $this->customMessages[$errorCode] ??
            $errorMessages[$errorCode] ??
            null;
    }

    public function __construct($payload) {
        $this->errors = $payload ?? [];
    }

    public function render() {
        $errorMessages = $this->getErrorMessages();

        include(__DIR__ . '/../views/partials/form_errors.php');
    }
}
