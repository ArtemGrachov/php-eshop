<?php
require_once(__DIR__ . '/../models/database.php');

class ModelUser {
    public $id = null;
    public $email = null;
    public $username = null;
    public $password = null;
    public $role = null;

    public static function getUsers() {
        $db = Database::getInstance()->db;

        $query = 'SELECT U.id, U.email, U.username, U.role FROM users U ORDER BY U.id';

        $statement = $db->prepare($query);
        $statement->execute();

        $rawUsers = $statement->fetchAll();

        $statement->closeCursor();

        $users = array_map(function($rawUser) {
            return new ModelUser($rawUser);
        }, $rawUsers);

        return $users;
    }

    public static function getUser($userId) {
        $db = Database::getInstance()->db;

        $query = 'SELECT * FROM users WHERE id = :userId';

        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->execute();

        $user = $statement->fetch();

        $statement->closeCursor();

        return new ModelUser($user);
    }

    public function __construct($payload) {
        $this->id = isset($payload['id']) ? $payload['id'] : null;
        $this->email = isset($payload['email']) ? $payload['email'] : null;
        $this->username = isset($payload['username']) ? $payload['username'] : null;
        $this->role = isset($payload['role']) ? $payload['role'] : null;
        $this->password = isset($payload['password']) ? $payload['password'] : null;
    }

    public function save() {
        $db = Database::getInstance()->db;

        if (is_null($this->id)) {
            $query = 'INSERT INTO users (email, username, role, password) VALUES (:email, :username, :role, :password)';

            $statement = $db->prepare($query);
            $statement->bindValue(':email', $this->email);
            $statement->bindValue(':username', $this->username);
            $statement->bindValue(':role', $this->role);
            $statement->bindValue(':password', $this->generatePassword($this->password));
            $statement->execute();

            $statement->closeCursor();
        } else {
            $query = 'UPDATE users SET email = :email, username = :username' .
                ($this->password ? ', password = :password ' : ' ') .
                'WHERE id=:userId';

            $statement = $db->prepare($query);
            $statement->bindValue(':userId', $this->id);
            $statement->bindValue(':email', $this->email);
            $statement->bindValue(':username', $this->username);

            if ($this->password) {
                $statement->bindValue(':password', $this->generatePassword($this->password));
            }

            $statement->execute();

            $statement->closeCursor();
        }
    }

    public function remove() {
        $db = Database::getInstance()->db;

        $query = 'DELETE FROM users WHERE ID = :userId';

        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $this->id);
        $statement->execute();

        $statement->closeCursor();

        $this->id = null;
    }

    private function generatePassword($rawPassword) {
        return password_hash($rawPassword, PASSWORD_BCRYPT);
    }
}
