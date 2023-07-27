<?php

require __DIR__ . '/bootstrap.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {

    header('Location: ' . URL . 'index.php');
    die;
}

$title = 'Bank';
require __DIR__ . '/top.php';
?>
<?php require __DIR__ . '/menu.php' ?>


<div>HELLO :)</div>

<?php

require(__DIR__ . '/bottom.php');
