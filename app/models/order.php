<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/order_item.php');
require_once(__DIR__ . '/../models/address.php');
require_once(__DIR__ . '/../models/customer.php');

class ModelOrder {
    public $id = null;
    public $state = null;
    public $note = null;
    public $token = null;
    public $customerId = null;
    public $addressId = null;

    public static function getOrders($limit = 999, $offset = 0) {
        $db = Database::getInstance()->db;

        $query = 'SELECT * FROM orders LIMIT :limit OFFSET :offset';

        $statement = $db->prepare($query);
        $statement->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $statement->execute();

        $rawOrders = $statement->fetchAll();

        $statement->closeCursor();

        $orders = array_map(function($rawOrder) {
            return new ModelOrder($rawOrder);
        }, $rawOrders);

        return $orders;
    }

    public static function countOrders($params = null) {
        $db = Database::getInstance()->db;

        $query = 'SELECT COUNT(*) FROM orders';

        $statement = $db->prepare($query);

        $statement->execute();

        $count = $statement->fetchColumn();

        $statement->closeCursor();

        return $count;
    }

    public static function getOrder($orderId) {
        $db = Database::getInstance()->db;

        $query = 'SELECT * FROM orders WHERE id = :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $orderId);
        $statement->execute();

        $order = $statement->fetch();

        $statement->closeCursor();

        if (!$order) {
            return null;
        }

        return new ModelOrder($order);
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
        $this->customerId = isset($payload['customerId']) ? $payload['customerId'] : null;
        $this->addressId = isset($payload['addressId']) ? $payload['addressId'] : null;
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
            $query = 'INSERT INTO orders (state, note, token, customerId, addressId)
                      VALUES (:state, :note, :token, :customerId, :addressId)';

            $statement = $db->prepare($query);
            $statement->bindValue(':state', $this->state);
            $statement->bindValue(':note', $this->note);
            $statement->bindValue(':token', $this->token);
            $statement->bindValue(':customerId', $this->customerId);
            $statement->bindValue(':addressId', $this->addressId);
            $statement->execute();

            $statement->closeCursor();

            $this->id = (int) $db->lastInsertId();
        } else {
            $query = 'UPDATE orders SET state = :state, note = :note, token = :token,
                      customerId = :customerId, addressId = :addressId
                      WHERE id=:orderId';

            $statement = $db->prepare($query);
            $statement->bindValue(':orderId', $this->id);
            $statement->bindValue(':state', $this->state);
            $statement->bindValue(':note', $this->note);
            $statement->bindValue(':token', $this->token);
            $statement->bindValue(':customerId', $this->customerId);
            $statement->bindValue(':addressId', $this->addressId);
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
            throw new Exception('Order item not found');
        } else {
            $orderItem->updateQuantity($quantity);
        }

        $orderItem->save();
    }

    public function removeItem($productId) {
        $orderItems = ModelOrderItem::getOrderItemsByOrder($this->id);

        foreach ($orderItems as $item) {
            if ($item->productId === $productId) {
                $orderItem = $item;
                break;
            }
        }

        if (!isset($orderItem)) {
            throw new Exception('Order item not found');
        } else {
            $orderItem->remove();
        }
    }

    public function __get($property) {
        switch ($property) {
            case 'itemsCount':
                $orderItems = ModelOrderItem::getOrderItemsByOrder($this->id);

                $itemsCount = array_reduce($orderItems, function($acc, $curr) {
                    return $acc + $curr->quantity;
                }, 0);

                return $itemsCount;
            case 'totalPrice':
                $orderItems = ModelOrderItem::getOrderItemsByOrder($this->id);
                $totalPrice = array_reduce($orderItems, function ($acc, $curr) {
                    return $acc + $curr->total;
                }, 0);

                return $totalPrice;
            case 'address':
                if (is_null($this->addressId)) {
                    return null;
                }

                return ModelAddress::getAddress($this->addressId);
            case 'customer':
                if (is_null($this->customerId)) {
                    return null;
                }

                return ModelCustomer::getCustomer($this->customerId);
            default:
                return null;
        }
    }
}
