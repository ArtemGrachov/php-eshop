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
    public $image = null;

    public static function getProducts($limit = 999) {
        $db = Database::getInstance()->db;

        $query = 'SELECT P.id, P.name, P.price, P.description, P.stock, P.tracking, P.taxonId, P.image
                  FROM products P ORDER BY P.id LIMIT :limit';

        $statement = $db->prepare($query);
        $statement->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $statement->execute();

        $rawProducts = $statement->fetchAll();

        $statement->closeCursor();

        $products = array_map(function($rawTaxon) {
            return new ModelProduct($rawTaxon);
        }, $rawProducts);

        return $products;
    }

    public static function getProductsByTaxon($taxonId, $limit = 999) {
        $db = Database::getInstance()->db;

        $query = 'SELECT P.id, P.name, P.price, P.description, P.stock, P.tracking, P.taxonId, P.image
                  FROM products P WHERE P.taxonId = :taxonId ORDER BY P.id LIMIT :limit';

        $statement = $db->prepare($query);
        $statement->bindValue(':taxonId', $taxonId, PDO::PARAM_INT);
        $statement->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $statement->execute();

        $rawProducts = $statement->fetchAll();

        $statement->closeCursor();

        $products = array_map(function($rawTaxon) {
            return new ModelProduct($rawTaxon);
        }, $rawProducts);

        return $products;
    }

    public static function getProductsBySearchQuery($searchQuery, $limit = 999) {
        $db = Database::getInstance()->db;

        $query = 'SELECT P.id, P.name, P.price, P.description, P.stock, P.tracking, P.taxonId, P.image
                  FROM products P WHERE (P.name LIKE :query) ORDER BY P.id LIMIT :limit';

        $statement = $db->prepare($query);
        $statement->bindValue(':query', "%$searchQuery%");
        $statement->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
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
        $this->price = isset($payload['price']) ? (int) $payload['price'] : null;
        $this->description = isset($payload['description']) ? $payload['description'] : null;
        $this->stock = isset($payload['stock']) ? (int) $payload['stock'] : null;
        $this->tracking = isset($payload['tracking']) ? (bool) $payload['tracking'] : null;
        $this->taxonId = isset($payload['taxonId']) ? $payload['taxonId'] : null;
        $this->image = isset($payload['image']) ? $payload['image'] : null;
    }

    public function save() {
        $db = Database::getInstance()->db;

        if (is_null($this->id)) {
            $query = 'INSERT INTO products (name, price, description, stock, tracking, taxonId, image)
                      VALUES (:name, :price, :description, :stock, :tracking, :taxonId, :image)';

            $statement = $db->prepare($query);
            $statement->bindValue(':name', $this->name);
            $statement->bindValue(':price', $this->price);
            $statement->bindValue(':description', $this->description);
            $statement->bindValue(':stock', $this->stock);
            $statement->bindValue(':tracking', $this->tracking === 'on' ? 1 : 0);
            $statement->bindValue(':taxonId', $this->taxonId);
            $statement->bindValue(':image', $this->image);
            $statement->execute();
    
            $statement->closeCursor();
        } else {
            $query = 'UPDATE products SET name = :name, price = :price, description = :description,
                      stock = :stock, tracking = :tracking, taxonId = :taxonId, image = :image WHERE id=:productId';
    
            $statement = $db->prepare($query);
            $statement->bindValue(':productId', $this->id);
            $statement->bindValue(':name', $this->name);
            $statement->bindValue(':price', $this->price);
            $statement->bindValue(':description', $this->description);
            $statement->bindValue(':stock', $this->stock);
            $statement->bindValue(':tracking', $this->tracking === 'on' ? 1 : 0);
            $statement->bindValue(':taxonId', $this->taxonId);
            $statement->bindValue(':image', $this->image);
            $statement->execute();
    
            $statement->closeCursor();
        }
    }

    public function remove() {
        $db = Database::getInstance()->db;

        $query = 'DELETE FROM products WHERE ID = :productId';

        $statement = $db->prepare($query);
        $statement->bindValue(':productId', $this->id);
        $statement->execute();

        $statement->closeCursor();

        $this->id = null;
    }

    public function __get($property) {
        switch ($property) {
            case 'isOutOfStock':
                return $this->tracking && $this->stock === 0;
            case 'runningOutOfStock':
                return $this->tracking && $this->stock <= 5;
            case 'taxon':
                if (is_null($this->taxonId)) {
                    return null;
                }

                return ModelTaxon::getTaxon($this->taxonId);
            default:
                return null;
        }
    }
}
