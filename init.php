<?php
require_once('app/config/config.php');
require_once('app/models/database.php');
require_once('app/services/auth.php');

$db = Database::getInstance()->db;

$query = 'INSERT INTO users (email, username, role, password) VALUES (:email, :username, :role, :password)';

$username = $config['admin']['username'] ?? 'admin';
$password = $config['admin']['password'] ?? 'admin';

$statement = $db->prepare($query);
$statement->bindValue(':email', 'admin@test.com');
$statement->bindValue(':username', $username);
$statement->bindValue(':role', 'admin');
$statement->bindValue(':password', ServiceAuth::generatePassword($password));
$statement->execute();

$statement->closeCursor();

echo "Admin user generated successfully \n Username: $username \n Password: $password \n";
