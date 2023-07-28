<?php

require __DIR__ . '/bootstrap.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {

    header('Location: ' . URL . 'index.php');
    die;
}

$title = 'Delete Customer';
require __DIR__ . '/top.php';

?>

<?php require __DIR__ . '/menu.php' ?>

<div>
    <h3>
        Delete customer!
    </h3>
</div>

<?php require __DIR__ . '/bottom.php' ?>