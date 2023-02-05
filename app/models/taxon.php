<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/product.php');

class ModelTaxon {
    public $id = null;
    public $name = null;
    public $description = null;

    public static function getTaxons($limit = 999, $offset = 0) {
        $db = Database::getInstance()->db;

        $query = 'SELECT T.id, T.name, T.description FROM taxons T ORDER BY T.id LIMIT :limit OFFSET :offset';

        $statement = $db->prepare($query);
        $statement->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $statement->execute();

        $rawTaxons = $statement->fetchAll();

        $statement->closeCursor();

        $taxons = array_map(function($rawTaxon) {
            return new ModelTaxon($rawTaxon);
        }, $rawTaxons);

        return $taxons;
    }

    public static function countTaxons($params = null) {
        $db = Database::getInstance()->db;

        $query = 'SELECT COUNT(*) FROM taxons';

        $statement = $db->prepare($query);

        $statement->execute();

        $count = $statement->fetchColumn();

        $statement->closeCursor();

        return $count;
    }

    public static function getTaxon($taxonId) {
        $db = Database::getInstance()->db;

        $query = 'SELECT * FROM taxons WHERE id = :taxonId';

        $statement = $db->prepare($query);
        $statement->bindValue(':taxonId', $taxonId);
        $statement->execute();

        $taxon = $statement->fetch();

        $statement->closeCursor();

        return new ModelTaxon($taxon);
    }

    public function __construct($payload) {
        $this->id = isset($payload['id']) ? $payload['id'] : null;
        $this->name = isset($payload['name']) ? $payload['name'] : null;
        $this->description = isset($payload['description']) ? $payload['description'] : null;
    }

    public function save() {
        $db = Database::getInstance()->db;

        if (is_null($this->id)) {
            $query = 'INSERT INTO taxons (name, description) VALUES (:name, :description)';

            $statement = $db->prepare($query);
            $statement->bindValue(':name', $this->name);
            $statement->bindValue(':description', $this->description);
            $statement->execute();

            $statement->closeCursor();
        } else {
            $query = 'UPDATE taxons SET name = :name, description = :description WHERE id=:taxonId';

            $statement = $db->prepare($query);
            $statement->bindValue(':taxonId', $this->id);
            $statement->bindValue(':name', $this->name);
            $statement->bindValue(':description', $this->description);
            $statement->execute();

            $statement->closeCursor();
        }
    }

    public function remove() {
        $db = Database::getInstance()->db;

        $query = 'DELETE FROM taxons WHERE ID = :taxonId';

        $statement = $db->prepare($query);
        $statement->bindValue(':taxonId', $this->id);
        $statement->execute();

        $statement->closeCursor();

        $this->id = null;
    }

    public function __get($property) {
        switch ($property) {
            case 'productsCount':
                $orderItems = ModelProduct::getProducts([ 'taxonId' => $this->id ]);

                return count($orderItems);
            default:
                return null;
        }
    }
}
