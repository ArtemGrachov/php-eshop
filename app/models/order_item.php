<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/product.php');

class ModelOrderItem {
    public $id = null;
    public $name = null;
    public $price = null;
    public $quantity = null;
    public $productId = null;
    public $orderId = null;

    public static function getOrderItemsByOrder($orderId) {
        $db = Database::getInstance()->db;

        $query = 'SELECT * FROM order_items WHERE orderId = :orderId';

        $statement = $db->prepare($query);
        $statement->bindValue(':orderId', $orderId);
        $statement->execute();

        $rawOrderItems = $statement->fetchAll();

        $statement->closeCursor();

        $orders = array_map(function($rawOrderItem) {
            return new ModelOrderItem($rawOrderItem);
        }, $rawOrderItems);

        return $orders;
    }

    public static function createByProductAndQuantity ($productId, $quantity) {
        $product = ModelProduct::getProduct($productId);

        if (!$product) {
            throw 'Product not found';
        }

        return new ModelOrderItem([
            'name' => $product->name,
            'price' => (int) $product->price,
            'quantity' => (int) $quantity,
            'productId' => $productId
        ]);
    }

    public function __construct($payload) {
        $this->id = isset($payload['id']) ? $payload['id'] : null;
        $this->name = isset($payload['name']) ? $payload['name'] : null;
        $this->price = isset($payload['price']) ? $payload['price'] : null;
        $this->quantity = isset($payload['quantity']) ? $payload['quantity'] : null;
        $this->productId = isset($payload['productId']) ? $payload['productId'] : null;
        $this->orderId = isset($payload['orderId']) ? $payload['orderId'] : null;
    }

    public function remove() {
        $db = Database::getInstance()->db;

        $query = 'DELETE FROM order_items WHERE ID = :itemId';

        $statement = $db->prepare($query);
        $statement->bindValue(':itemId', $this->id);
        $statement->execute();

        $statement->closeCursor();

        $this->id = null;
    }

    public function save() {
        $db = Database::getInstance()->db;

        if (is_null($this->id)) {
            $query = 'INSERT INTO order_items (name, price, quantity, productId, orderId)
                      VALUES (:name, :price, :quantity, :productId, :orderId)';

            $statement = $db->prepare($query);
            $statement->bindValue(':name', $this->name);
            $statement->bindValue(':price', $this->price);
            $statement->bindValue(':quantity', $this->quantity);
            $statement->bindValue(':productId', $this->productId);
            $statement->bindValue(':orderId', $this->orderId);
            $statement->execute();

            $statement->closeCursor();
        } else {
            $query = 'UPDATE order_items
                      SET name = :name, price = :price, quantity = :quantity
                      WHERE id=:itemId';

            $statement = $db->prepare($query);

            $statement->bindValue(':itemId', $this->id);
            $statement->bindValue(':name', $this->name);
            $statement->bindValue(':price', $this->price);
            $statement->bindValue(':quantity', $this->quantity);
            $statement->execute();

            $statement->closeCursor();
        }
    }

    public function updateQuantity($quantity) {
        $product = ModelProduct::getProduct($this->productId);

        if (!$product) {
            return;
        }

        $actualPrice = $product->price;

        $this->quantity = $quantity;
        $this->price = $actualPrice;

        $this->save();
    }

    public function __get($property) {
        if ($property !== 'total') {
            return null;
        }

        return $this->quantity * $this->price;
    }
}
