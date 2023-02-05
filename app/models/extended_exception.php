<?php

class ExtendedException extends Exception {
    private $_data = null;

    public function __construct($message, $data = null) {
        $this->_data = $data;
        parent::__construct($message);
    }

    public function getData() {
        return $this->_data;
    }
}
