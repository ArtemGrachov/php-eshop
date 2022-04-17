<?php
require_once(__DIR__ . '/../models/database.php');

class ModelProduct {
    public $id = null;
    public $name = null;
    public $price = null;
    public $description = null;
    public $stock = null;
    public $tracking = null;
    public $taxonId = null;

    public static function getProducts() {
        $db = Database::getInstance()->db;

        $query = 'SELECT P.id, P.name, P.price, P.description, P.stock, P.tracking, P.taxonId
                  FROM products P ORDER BY P.id';

        $statement = $db->prepare($query);
        $statement->execute();

        $rawProducts = $statement->fetchAll();

        $statement->closeCursor();

        $products = array_map(function($rawTaxon) {
            return new ModelProduct($rawTaxon);
        }, $rawProducts);

        return $products;
    }

    public static function getProduct($productId) {
        $db = Database::getInstance()->db;

        $query = 'SELECT * FROM products WHERE id = :productId';

        $statement = $db->prepare($query);
        $statement->bindValue(':productId', $productId);
        $statement->execute();

        $product = $statement->fetch();

        $statement->closeCursor();

        return new ModelProduct($product);
    }

    public function __construct($payload) {
        $this->id = isset($payload['id']) ? $payload['id'] : null;
        $this->name = isset($payload['name']) ? $payload['name'] : null;
        $this->price = isset($payload['price']) ? $payload['price'] : null;
        $this->description = isset($payload['description']) ? $payload['description'] : null;
        $this->stock = isset($payload['stock']) ? $payload['stock'] : null;
        $this->tracking = isset($payload['tracking']) ? $payload['tracking'] : null;
        $this->taxonId = isset($payload['taxonId']) ? $payload['taxonId'] : null;
    }

    public function save() {
        $db = Database::getInstance()->db;

        if (is_null($this->id)) {
            $query = 'INSERT INTO products (name, price, description, stock, tracking, taxonId)
                      VALUES (:name, :price, :description, :stock, :tracking, :taxonId)';

            $statement = $db->prepare($query);
            $statement->bindValue(':name', $this->name);
            $statement->bindValue(':price', $this->price);
            $statement->bindValue(':description', $this->description);
            $statement->bindValue(':stock', $this->stock);
            $statement->bindValue(':tracking', $this->tracking === 'on' ? 1 : 0);
            $statement->bindValue(':taxonId', $this->taxonId);
            $statement->execute();
    
            $statement->closeCursor();
        } else {
            $query = 'UPDATE products SET name = :name, price = :price, description = :description,
                      stock = :stock, tracking = :tracking, taxonId = :taxonId WHERE id=:productId';
    
            $statement = $db->prepare($query);
            $statement->bindValue(':productId', $this->id);
            $statement->bindValue(':name', $this->name);
            $statement->bindValue(':price', $this->price);
            $statement->bindValue(':description', $this->description);
            $statement->bindValue(':stock', $this->stock);
            $statement->bindValue(':tracking', $this->tracking === 'on' ? 1 : 0);
            $statement->bindValue(':taxonId', $this->taxonId);
            $statement->execute();
    
            $statement->closeCursor();
        }
    }
}
