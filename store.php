<?php

require __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    die;
}

$name = $_POST['name'] ?? '';
$accNumber = $_POST['accNumber'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$personalCode = $_POST['personalCode'] ?? '';

if ($name == '' || $accNumber == '' || $lastName == '' || $personalCode == '') {
    header('Location: ' . URL . 'create.php');
    die;
}

$accounts = json_decode(file_get_contents(__DIR__ . '/accounts.json'), 1);

$account = [
    'id' => uniqid(),
    'accNumber' => $accNumber,
    'name' => $name,
    'lastName' => $lastName,
    'personalCode' => $personalCode,
    'money' => 0
];

$accounts[] = $account;

file_put_contents(__DIR__ . '/accounts.json', json_encode($accounts));

header('Location: ' . URL . 'main.php');
die;
