<?php

$database = "library";
$host = "127.0.0.1";
$port = "3306";
$user = "root";
$pass = "";
$dsn = "mysql:dbname={$database};host={$host};port={$port}";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$connection = new PDO($dsn, $user, $pass, $options);

// $connection->query("CREATE DATABASE `items`");

// $query = $connection->query("SELECT * FROM `books`");
// $query = $connection->query("SELECT id, title, price FROM `books`");
// $query = $connection->query("SELECT id, title, price FROM `books` WHERE id = 2");
// $books = $query->fetchAll();

// $column = $query->fetchColumn(1);
// echo $column;

// do {
//     $book = $query->fetch();
//     echo "<pre>";
//     print_r($book);
//     echo "</pre>";
// } while ($book);

// $id = '0 or 1 = 1';
$id = 1;
// $query = $connection->query("SELECT * FROM `books` WHERE id = " . $id);
// $query = $connection->prepare("SELECT * FROM `books` WHERE id = ? ? ?");
// $query->execute([$id]);
$query = $connection->prepare("SELECT * FROM `books` WHERE id = :i");
// $query->execute(['i' => $id]);
$query->bindParam('i', $id, PDO::PARAM_INT);
$query->execute();

echo "<pre>";
// print_r($books);
print_r($query->fetchAll());
echo "</pre>";