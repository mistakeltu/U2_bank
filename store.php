<?php

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/msg.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    die;
}

$name = $_POST['name'] ?? '';
$accNumber = $_POST['accNumber'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$personalCode = $_POST['personalCode'] ?? '';

if ($name == '' || $accNumber == '' || $lastName == '' || $personalCode == '') {
    $_SESSION['message'] = [
        'text' => 'Laukeliai turi buti uzpildyti',
        'type' => 'red'
    ];
    $_SESSION['old_values'] = $_POST;
    header('Location: ' . URL . 'create.php');
    die;
}

if (strlen($name) < 4) {
    $_SESSION['message'] = [
        'text' => 'Name turi buti daugiau nei 4 raides',
        'type' => 'red'
    ];
    $_SESSION['old_values'] = $_POST;
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

usort($accounts, function ($a, $b) {
    return strcmp($a['lastName'], $b['lastName']);
});

file_put_contents(__DIR__ . '/accounts.json', json_encode($accounts));

$_SESSION['message'] = [
    'text' => 'Person account created',
    'type' => 'green'
];

header('Location: ' . URL . 'main.php');
die;
