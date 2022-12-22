<?php

define('JSON_PATH', 'Users.json');

function insertUserJson($newUser): void
{
    $usersArray = getArrayFromJsonFile();
    $usersArray["users"][] = $newUser;
    file_put_contents(JSON_PATH, json_encode($usersArray));
}

function updateUserJson($userKey, $newUser): void
{
    $usersArray = getArrayFromJsonFile(JSON_PATH);
    $usersArray["users"][$userKey] = $newUser;
    file_put_contents(JSON_PATH, json_encode($usersArray));
}

function deleteUserJson($userKey): void
{
    $usersArray = getArrayFromJsonFile(JSON_PATH);
    array_splice($usersArray["users"], $userKey, 1);
    file_put_contents(JSON_PATH, json_encode($usersArray));
}

function getArrayFromJsonFile(): array
{
    checkFile();
    $jsonString = file_get_contents(JSON_PATH);
    return json_decode($jsonString, true);
}

function printInterface(): void
{
    echo PHP_EOL;
    echo "Введите 1, чтобы добавить", PHP_EOL;
    echo "Введите 2, чтобы изменить", PHP_EOL;
    echo "Введите 3, чтобы удалить", PHP_EOL;
    echo "Введите 4, чтобы завершить", PHP_EOL;
    echo PHP_EOL;
}

function getUserFromConsole($specificId = null): array
{
    $login = readline('Введите login: ');
    $password = readline('Введите password: ');
    $name = readline('Введите name: ');
    if ($specificId === null) {
        $id = getUniqueUserId();
    } else {
        $id = $specificId;
    }
    $newUser = array(
        "id" => $id,
        "login" => $login,
        "password" => $password,
        "name" => $name
    );
    return $newUser;
}

function findUserKey($usersArray, int $findId): ?int
{
    for ($i = 0; $i < count($usersArray["users"]); $i++) {
        $keyOfUser = array_search($findId, $usersArray["users"][$i]);
        if ($keyOfUser !== false) {
            return $i;
        }
    }
    return null;
}

function getUniqueUserId(): int
{
    $usersArray = getArrayFromJsonFile(JSON_PATH);
    if (count($usersArray["users"]) === 0) {
        return 1;
    } else {
        return $usersArray["users"][count($usersArray["users"]) - 1]["id"] + 1;
    }
}

function insertUserMySql($newUser): void
{
    $sqlQuery = "INSERT INTO users SET 
        id = {$newUser["id"]}, 
        login = '{$newUser["login"]}',
        password = '{$newUser["password"]}', 
        name = '{$newUser["name"]}'";
    if (!IsModifiedMySql($sqlQuery))
        print("Произошла ошибка при выполнении запроса");
}

function updateUserMySql($newUser): void
{
    $sqlQuery = "UPDATE users SET 
        login = '{$newUser["login"]}',
        password = '{$newUser["password"]}', 
        name = '{$newUser["name"]}'
        WHERE id = {$newUser["id"]}";
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
    $link = mysqli_connect("localhost", "root", "3306", "user_db");
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
    insertUserJson($newUser);
    insertUserMySql($newUser);
}

function updateAction(): void
{
    $usersArray = getArrayFromJsonFile(JSON_PATH);
    $inputUserId = readline("Введите id пользователя для изменения: ");
    $userKey = findUserKey($usersArray, $inputUserId);
    if ($userKey === null) {
        echo "\033[01;31mНесуществующий id\033[0m", PHP_EOL;
        return;
    }
    $newUser = getUserFromConsole($inputUserId);
    updateUserJson($userKey, $newUser);
    updateUserMySql($newUser);
}

function deleteAction(): void
{
    $usersArray = getArrayFromJsonFile(JSON_PATH);
    $inputUserId = readline("Введите id пользователя для удаления: ");
    $userKey = findUserKey($usersArray, $inputUserId);
    if ($userKey === null) {
        echo "\033[01;31mНесуществующий id\033[0m", PHP_EOL;
        return;
    }
    $userId = $usersArray["users"][$userKey]["id"];
    deleteUserJson($userKey);
    deleteUserMySql($userId);
}

function checkFile(): void
{
    if (!file_exists(JSON_PATH)) {
        fopen(JSON_PATH, "w");
        $jsonTemplate = '{"users": []}';
        file_put_contents(JSON_PATH, $jsonTemplate);
    }
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