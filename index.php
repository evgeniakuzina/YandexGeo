<?php

require('functions.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Поиск по адресу</title>
</head>
<body>
    <h1>Введите адрес:</h1>
    <form action="map.php" method="POST">
        <input type="text" name="address">
        <input type="submit" name="search" value="Найти">
    </form>
</body>
</html>