<?php
require_once "login.php";

try {
    $pdo= new PDO($attr, $user,$pass,$opt);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(),(int)$e->getCode());
}

$query="insert into cats values('NULL,'lion','leo',4)";
$result = $pdo->query($query);


?>
