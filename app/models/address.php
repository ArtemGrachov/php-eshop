<?php
require_once(__DIR__ . '/../models/database.php');

class ModelAddress {
    public $id = null;
    public $country = null;
    public $region = null;
    public $city = null;
    public $street = null;
    public $houseNumber = null;
    public $appartmentNumber = null;
    public $notes = null;

    public static function getAddresses() {
        $db = Database::getInstance()->db;

        $query = 'SELECT A.country, A.region, A.city, A.street, A.houseNumber, A.appartmentNumber,
                  A.notes FROM addresses A ORDER BY A.id';

        $statement = $db->prepare($query);
        $statement->execute();

        $rawAddresses = $statement->fetchAll();

        $statement->closeCursor();

        $addresses = array_map(function($rawAddress) {
            return new ModelAddress($rawAddress);
        }, $rawAddresses);

        return $addresses;
    }

    public static function getAddress($addressId) {
        $db = Database::getInstance()->db;

        $query = 'SELECT * FROM addresses WHERE id = :addressId';

        $statement = $db->prepare($query);
        $statement->bindValue(':addressId', $addressId);
        $statement->execute();

        $address = $statement->fetch();

        $statement->closeCursor();

        return new ModelAddress($address);
    }

    public function __construct($payload) {
        $this->id = isset($payload['id']) ? $payload['id'] : null;
        $this->country = isset($payload['country']) ? $payload['country'] : null;
        $this->region = isset($payload['region']) ? $payload['region'] : null;
        $this->city = isset($payload['city']) ? $payload['city'] : null;
        $this->street = isset($payload['street']) ? $payload['street'] : null;
        $this->houseNumber = isset($payload['houseNumber']) ? $payload['houseNumber'] : null;
        $this->appartmentNumber = isset($payload['appartmentNumber']) ? $payload['appartmentNumber'] : null;
        $this->notes = isset($payload['notes']) ? $payload['notes'] : null;
    }

    public function save() {
        $db = Database::getInstance()->db;

        if (is_null($this->id)) {
            $query = 'INSERT INTO addresses (country, region, city, street, houseNumber, appartmentNumber, notes)
                      VALUES (:country, :region, :city, :street, :houseNumber, :appartmentNumber, :notes)';

            $statement = $db->prepare($query);
            $statement->bindValue(':country', $this->country);
            $statement->bindValue(':region', $this->region);
            $statement->bindValue(':city', $this->city);
            $statement->bindValue(':street', $this->street);
            $statement->bindValue(':houseNumber', $this->houseNumber);
            $statement->bindValue(':appartmentNumber', $this->appartmentNumber);
            $statement->bindValue(':notes', $this->notes);

            $statement->execute();

            $statement->closeCursor();

            $this->id = (int) $db->lastInsertId();
        } else {
            $query = 'UPDATE addresses SET country = :country, region = :region, city = :city,
                      street = :street, houseNumber = :houseNumber,
                      appartmentNumber = :appartmentNumber, notes = :notes
                      WHERE id=:addressId';

            $statement = $db->prepare($query);
            $statement->bindValue(':country', $this->country);
            $statement->bindValue(':region', $this->region);
            $statement->bindValue(':city', $this->city);
            $statement->bindValue(':street', $this->street);
            $statement->bindValue(':houseNumber', $this->houseNumber);
            $statement->bindValue(':appartmentNumber', $this->appartmentNumber);
            $statement->bindValue(':notes', $this->notes);
            $statement->execute();

            $statement->closeCursor();
        }
    }

    public function remove() {
        $db = Database::getInstance()->db;

        $query = 'DELETE FROM addresses WHERE ID = :addressId';

        $statement = $db->prepare($query);
        $statement->bindValue(':addressId', $this->id);
        $statement->execute();

        $statement->closeCursor();

        $this->id = null;
    }
}
