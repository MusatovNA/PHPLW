<?php

function printInterface(): void
{
    echo PHP_EOL;
    echo "Введите 1, чтобы добавить пользователя", PHP_EOL;
    echo "Введите 2, чтобы изменить пользователя", PHP_EOL;
    echo "Введите 3, чтобы удалить пользователя", PHP_EOL;
    echo "Введите 4, чтобы завершить работу", PHP_EOL;
    echo PHP_EOL;
}

function getUserFromConsole(): array
{
    $login = readline('Введите логин: ');
    $password = readline('Введите пароль: ');
    $name = readline('Введите имя: ');

    $newUser = array(
        "login" => $login,
        "password" => $password,
        "name" => $name
    );
    return $newUser;
}

function insertUserMySql($newUser): void
{
    $sqlQuery = "INSERT INTO users SET 
        login = '{$newUser["login"]}',
        password = '{$newUser["password"]}', 
        name = '{$newUser["name"]}'";
    if (!IsModifiedMySql($sqlQuery))
        print("Произошла ошибка при выполнении запроса");
}

function updateUserMySql($userId, $newUser): void
{
    $sqlQuery = "UPDATE users SET 
        login = '{$newUser["login"]}',
        password = '{$newUser["password"]}', 
        name = '{$newUser["name"]}'
        WHERE id = {$userId}";
    if (!IsModifiedMySql($sqlQuery))
        print("Произошла ошибка при выполнении запроса");
}

function deleteUserMySql($userId): void
{
    $sqlQuery = "DELETE FROM users 
    WHERE id = {$userId}";
    if (!IsModifiedMySql($sqlQuery))
        print("Произошла ошибка при выполнении запроса");
}

function isModifiedMySql($sqlQuery): bool
{
    $link = mysqli_connect("localhost", "root", "3306", "site");
    if ($link === false) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        return false;
    }
    $result = mysqli_query($link, $sqlQuery);
    if ($result === false) {
        return false;
    }
    return true;
}

function insertAction(): void
{
    $newUser = getUserFromConsole();
    insertUserMySql($newUser);
}

function updateAction(): void
{
    $inputUserId = readline("Введите id пользователя для изменения: ");

    if (!isIdUserExists($inputUserId)) {
        echo "\033[01;31mНесуществующий id\033[0m", PHP_EOL;
        return;
    }
    $newUser = getUserFromConsole();
    updateUserMySql($inputUserId, $newUser);
}

function deleteAction(): void
{
    $inputUserId = readline("Введите id пользователя для удаления: ");

    if (!isIdUserExists($inputUserId)) {
        echo "\033[01;31mНесуществующий id\033[0m", PHP_EOL;
        return;
    }
    deleteUserMySql($inputUserId);
}

function isIdUserExists($inputId): bool
{
    $mysqli = mysqli_connect("localhost", "root", "3306", "site");

    $stmt = $mysqli->prepare("select id from users 
        where id =?");

    $stmt->bind_param("s", $inputId);
    $stmt->execute();
    $stmt->bind_result($foundId);
    $stmt->fetch();

    return (bool) $foundId;
}

while (true) {
    printInterface();
    $inputAction = readline();
    if ($inputAction === "1") {
        insertAction();
    } elseif ($inputAction === "2") {
        updateAction();
    } elseif ($inputAction === "3") {
        deleteAction();
    } elseif ($inputAction === "4") {
        return;
    }
}