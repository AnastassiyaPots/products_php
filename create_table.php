<?php 

require "connection.php";

$sql = "CREATE TABLE IF NOT EXISTS `products` (
        id INT PRIMARY KEY AUTO_INCREMENT,
        `name` VARCHAR(100) NOT NULL,
        price INT(100) NOT NULL,
        `description` TEXT NULL,
        stock INT(100) NOT NULL,
        )";

$connection->query($sql);

$sql = "INSERT INTO `products`(name, price, description, stock) 
        VALUES ('11', '222', '333', '444')";

$connection->query($sql);







?>