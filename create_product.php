<?php 

require "connection.php"; //подключение файла 

// запрос, который добавляет новый продукт

if(
    isset($_POST['name']) && $_POST['name'] &&
    isset($_POST['price']) && $_POST['price'] &&
    isset($_POST['description']) && $_POST['description']
) {
    $sql = "INSERT INTO `products` (`name`, price, `description`) VALUES (?, ?, ?)";
    $query = $connection->prepare($sql);
    $params = [
        $_POST['name'],
        $_POST['price'],
        $_POST['description'],
    ];
    $query->execute($params);

    $id = $connection->lastInsertId(); // получение id последнего вставленного товара

    header("Location: show_product.php?id={$id}"); // перенаправление пользователя на страницу просмотра созданного товара
    die();
};

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
            <form action="create_product.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Название товара</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $_POST['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Цена</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?= $_POST['price'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control" id="description" name="description" value="<?= $_POST['description'] ?>"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Отправить</button>
                    <a href="/index.php" class="btn btn-secondary">Вернуться назад</a>
                </form>
        </div>
    </div>
    
</body>
</html>