<?php 

require "connection.php"; //подключение файла 

if (!isset($_GET['id'])) {
    echo "Товар не найден!";
    die();
}; // проверка на наличие id

$query = $connection->prepare("SELECT id, `name`, price, `description` FROM products WHERE id = :id"); // подготавливаю запрос

// создание массива и передача в него значениe переданного id

$params = [
    'id' => $_GET['id']
];

$query->execute($params); //вызываем запрос
$product = $query->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
                <div class="col-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <p class="card-text"><?= $product['price'] ?></p>
                            <p class="card-text"><?= $product['description'] ?></p>
                            <a href="delete_product.php?id=<?= $product['id']?>" class="btn btn-danger">Удалить</a>
                            <a href="edit_product.php?id=<?= $product['id']?>" class="btn btn-warning">Изменить</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
</body>
</html>