<?php
$dsn = 'mysql:host=localhost;dbname=shop';
$user = 'root';

try {
    $db = new PDO($dsn, $user);
} catch (PDOException $e) {
    echo 'Database error';
    exit();
}
