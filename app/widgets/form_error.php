<?php

class WidgetFormError {
    private $errors = [];
    private $customMessages = [];

    private function getErrorMessages() {
        $result = [];

        foreach ($this->errors as $errorKey => $errorValue) {
            $errorMessage = $this->getErrorMessage($errorKey);

            if (!is_null($errorMessage)) {
                array_push($result, $errorMessage);
            }
        }

        return $result;
    }

    private function getErrorMessage($errorCode) {
        $errorMessages = [
            'required' => 'This field is required',
            'minLength' => 'Minimum length is {minLength}',
            'lowerCase' => 'At least one lower case symbol is required',
            'upperCase' => 'At least one upper case symbol is required',
            'digits' => 'At least one digit is required'
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
