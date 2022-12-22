<?php

define('JSON_PATH', 'Users.json');

function addUser(): void
{
    $usersArray = getArrayFromJsonFile();
    if (count($usersArray["users"]) === 0) {
        $newId = 1;
    } else {
        $newId = $usersArray["users"][count($usersArray["users"]) - 1]["id"] + 1;
    }
    $usersArray["users"][] = getUserFromConsole($newId);
    file_put_contents(JSON_PATH, json_encode($usersArray));
}

function editUser(): void
{
    $usersArray = getArrayFromJsonFile();
    $inputUserId = readline("Введите id пользователя для изменения: ");
    $userKey = findUserKey($usersArray, $inputUserId);
    if ($userKey === null) {
        echo "\033[01;31mНесуществующий id\033[0m", PHP_EOL;
        return;
    }
    $usersArray["users"][$userKey] = getUserFromConsole($inputUserId);
    file_put_contents(JSON_PATH, json_encode($usersArray));
}

function deleteUser(): void
{
    $usersArray = getArrayFromJsonFile();
    $inputUserId = readline("Введите id пользователя для удаления: ");
    $userKey = findUserKey($usersArray, $inputUserId);
    if ($userKey === null) {
        echo "\033[01;31mНесуществующий id\033[0m", PHP_EOL;
        return;
    }
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

function getUserFromConsole(int $id): array
{
    $login = readline('Введите login: ');
    $password = readline('Введите password: ');
    $name = readline('Введите name: ');
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

function checkFile(): void
{
    if (!file_exists(JSON_PATH)){
        fopen(JSON_PATH, "w");
        $jsonTemplate = '{"users": []}';
        file_put_contents(JSON_PATH, $jsonTemplate);
    }
}

while (true) {
    printInterface();
    $inputAction = readline();
    if ($inputAction === "1") {
        addUser();
    } elseif ($inputAction === "2") {
        editUser();
    } elseif ($inputAction === "3") {
        deleteUser();
    } elseif ($inputAction === "4") {
        return;
    }
}