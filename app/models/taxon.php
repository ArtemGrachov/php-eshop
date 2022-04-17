<?php
require_once(__DIR__ . '/../models/database.php');

class ModelTaxon {
    public function __construct()
    {
    }

    public static function createTaxon($payload) {
        $db = Database::getInstance()->db;

        $query = 'INSERT INTO taxons (name, description) VALUES (:name, :description)';

        $statement = $db->prepare($query);
        $statement->bindValue(':name', $payload['name']);
        $statement->bindValue(':description', $payload['description']);
        $statement->execute();

        $statement->closeCursor();
        echo 'done';
    }
}
