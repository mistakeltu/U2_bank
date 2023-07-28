<?php

require __DIR__ . '/bootstrap.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {

    header('Location: ' . URL . 'index.php');
    die;
}

$title = 'Add customer';
require __DIR__ . '/top.php';

?>

<?php require __DIR__ . '/menu.php' ?>

<div class="add">
    <form action="<?= URL ?>store.php" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="User name">
        </div>
        <div>
            <label for="lastName">Last name</label>
            <input type="text" name="lastName" placeholder="User last name">
        </div>
        <div>
            <div>
                <label for="personalCode">Personal code</label>
                <input type="number" name="personalCode" placeholder="Personal code">
            </div>
            <div>
                <label for="accNumber">Account number</label>
                <input type="number" name="accNumber" placeholder="Account number">
            </div>
            <button type="submit">Add</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/bottom.php' ?>