<?php
require_once(__DIR__ . '/../models/database.php');

class ModelCustomer {
    public $id = null;
    public $firstName = null;
    public $lastName = null;
    public $email = null;
    public $phoneNumber = null;
    public $isCompany = false;
    public $companyName = null;
    public $companyVatNumber = null;

    public static function getCustomers() {
        $db = Database::getInstance()->db;

        $query = 'SELECT C.id, C.firstName, C.firstName, C.email, C.phoneNumber, C.isCompany,
                  C.companyName, C.companyVatNumber FROM customers C ORDER BY C.id';

        $statement = $db->prepare($query);
        $statement->execute();

        $rawCustomers = $statement->fetchAll();

        $statement->closeCursor();

        $customers = array_map(function($rawCustomer) {
            return new ModelCustomer($rawCustomer);
        }, $rawCustomers);

        return $customers;
    }

    public static function getCustomer($customerId) {
        $db = Database::getInstance()->db;

        $query = 'SELECT * FROM customers WHERE id = :customerId';

        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();

        $customer = $statement->fetch();

        $statement->closeCursor();

        return new ModelCustomer($customer);
    }

    public function __construct($payload) {
        $this->id = isset($payload['id']) ? $payload['id'] : null;
        $this->firstName = isset($payload['firstName']) ? $payload['firstName'] : null;
        $this->lastName = isset($payload['lastName']) ? $payload['lastName'] : null;
        $this->email = isset($payload['email']) ? $payload['email'] : null;
        $this->phoneNumber = isset($payload['phoneNumber']) ? $payload['phoneNumber'] : null;
        $this->isCompany = isset($payload['isCompany']) ? $payload['isCompany'] : null;
        $this->companyName = isset($payload['companyName']) ? $payload['companyName'] : null;
        $this->companyVatNumber = isset($payload['companyVatNumber']) ? $payload['companyVatNumber'] : null;
    }

    public function save() {
        $db = Database::getInstance()->db;

        if (is_null($this->id)) {
            $query = 'INSERT INTO customers (firstName, lastName, email, phoneNumber, isCompany, companyName, companyVatNumber)
                      VALUES (:firstName, :lastName, :email, :phoneNumber, :isCompany, :companyName, :companyVatNumber)';

            $statement = $db->prepare($query);
            $statement->bindValue(':firstName', $this->firstName);
            $statement->bindValue(':lastName', $this->lastName);
            $statement->bindValue(':email', $this->email);
            $statement->bindValue(':phoneNumber', $this->phoneNumber);
            $statement->bindValue(':isCompany', $this->isCompany);
            $statement->bindValue(':companyName', $this->companyName);
            $statement->bindValue(':companyVatNumber', $this->companyVatNumber);
            $statement->execute();

            $statement->closeCursor();

            $this->id = (int) $db->lastInsertId();
        } else {
            $query = 'UPDATE customers SET name = firstName = :firstName, lastName = :lastName,
                      email = :email, phoneNumber = :phoneNumber, isCompany = :isCompany,
                      companyName = :companyName, companyVatNumber = :companyVatNumber
                      WHERE id=:customerId';

            $statement = $db->prepare($query);
            $statement->bindValue(':customerId', $this->id);
            $statement->bindValue(':firstName', $this->firstName);
            $statement->bindValue(':lastName', $this->lastName);
            $statement->bindValue(':email', $this->email);
            $statement->bindValue(':phoneNumber', $this->phoneNumber);
            $statement->bindValue(':isCompany', $this->isCompany);
            $statement->bindValue(':companyName', $this->companyName);
            $statement->bindValue(':companyVatNumber', $this->companyVatNumber);
            $statement->execute();

            $statement->closeCursor();
        }
    }

    public function remove() {
        $db = Database::getInstance()->db;

        $query = 'DELETE FROM customers WHERE ID = :customerId';

        $statement = $db->prepare($query);
        $statement->bindValue(':customerId', $this->id);
        $statement->execute();

        $statement->closeCursor();

        $this->id = null;
    }

    public function toText() {
        $result = "$this->firstName $this->lastName <br /> $this->email <br /> $this->phoneNumber";

        if ($this->isCompany) {
            $result .= "<br />$this->companyName, $this->companyVatNumber";
        }

        return $result;
    }
}
