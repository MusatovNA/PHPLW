<?php

$mysqli = mysqli_connect("localhost", "root", "3306", "site");

$stmt = $mysqli->prepare("select name from users 
where login =? and password =?");

$stmt->bind_param("ss", $_GET['login'], $_GET['pswd']);
$stmt->execute();
$stmt->bind_result($userName);
$stmt->fetch();

if (!$userName) {
    echo ("Введены неверные данные"), PHP_EOL;
} else {
    echo ("Вы успешно вошли под именем "), $userName, PHP_EOL;
}