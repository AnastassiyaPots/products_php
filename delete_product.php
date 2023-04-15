<?php 

require "connection.php"; //подключение файла 

$query = $connection->prepare("DELETE FROM `products` WHERE id = ?");
$query->execute([$_GET['id']]);

header("Location: /index.php");
?>