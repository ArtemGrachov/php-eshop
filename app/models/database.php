<?php

class Database {
    private static $instance = null;

    public $db = null;

    public static function getInstance() {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct() {
        global $config;

        $host = $config['host'];
        $dbname = $config['dbname'];
        $dbuser = $config['dbuser'];
        $dbpassword = $config['dbpassword'];

        $this->db = new PDO(
            "mysql:host=$host;dbname=$dbname",
            $dbuser,
            $dbpassword
        );

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
}
