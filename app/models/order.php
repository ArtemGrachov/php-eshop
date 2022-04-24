<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/order_item.php');

class ModelOrder {
    public $id = null;
    public $state = null;
    public $note = null;
    public $token = null;

    public static function getOrders() {
        $db = Database::getInstance()->db;

        $query = 'SELECT * FROM orders';

        $statement = $db->prepare($query);
        $statement->execute();

        $rawOrders = $statement->fetchAll();

        $statement->closeCursor();

        $orders = array_map(function($rawOrder) {
            return new ModelOrder($rawOrder);
        }, $rawOrders);

        return $orders;
    }

    public static function getOrderByToken($token) {
        $db = Database::getInstance()->db;

        $query = 'SELECT * FROM orders WHERE token = :token';

        $statement = $db->prepare($query);
        $statement->bindValue(':token', $token);
        $statement->execute();

        $order = $statement->fetch();

        
        $statement->closeCursor();

        if (!$order) {
            return null;
        }

        return new ModelOrder($order);
    }

    public function __construct($payload) {
        $this->id = isset($payload['id']) ? $payload['id'] : null;
        $this->state = isset($payload['state']) ? $payload['state'] : null;
        $this->note = isset($payload['note']) ? $payload['note'] : null;
        $this->token = isset($payload['token']) ? $payload['token'] : null;
    }

    public function remove() {
        $db = Database::getInstance()->db;

        $query = 'DELETE FROM orders WHERE ID = :orderId';

        $statement = $db->prepare($query);
        $statement->bindValue(':orderId', $this->id);
        $statement->execute();

        $statement->closeCursor();

        $this->id = null;
    }

    public function save() {
        $db = Database::getInstance()->db;

        if (is_null($this->id)) {
            $query = 'INSERT INTO orders (state, note, token) VALUES (:state, :note, :token)';

            $statement = $db->prepare($query);
            $statement->bindValue(':state', $this->state);
            $statement->bindValue(':note', $this->note);
            $statement->bindValue(':token', $this->token);
            $statement->execute();

            $statement->closeCursor();
        } else {
            $query = 'UPDATE orders SET state = :state, note = :note, token = :token 
                      WHERE id=:orderId';

            $statement = $db->prepare($query);
            $statement->bindValue(':orderId', $this->id);
            $statement->bindValue(':state', $this->state);
            $statement->bindValue(':note', $this->note);
            $statement->bindValue(':token', $this->token);
            $statement->execute();

            $statement->closeCursor();
        }
    }

    public function addItem($productId, $quantity) {
        $orderItems = ModelOrderItem::getOrderItemsByOrder($this->id);

        foreach ($orderItems as $item) {
            if ($item->productId === $productId) {
                $orderItem = $item;
                break;
            }
        }

        if (!isset($orderItem)) {
            $orderItem = ModelOrderItem::createByProductAndQuantity($productId, (int) $quantity);
            $orderItem->orderId = $this->id;
        } else {
            $orderItem->updateQuantity($orderItem->quantity + $quantity);
        }

        $orderItem->save();
    }

    public function updateItem($productId, $quantity) {
        $orderItems = ModelOrderItem::getOrderItemsByOrder($this->id);

        foreach ($orderItems as $item) {
            if ($item->productId === $productId) {
                $orderItem = $item;
                break;
            }
        }

        if (!isset($orderItem)) {
            throw 'Order item not found';
        } else {
            $orderItem->updateQuantity($quantity);
        }

        $orderItem->save();
    }
}
