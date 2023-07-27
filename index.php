<?php

require __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = json_decode(file_get_contents(__DIR__ . '/users.json'), 1);
    foreach ($users as $user) {
        if ($_POST['email'] == $user['email'] && md5($_POST['psw']) == $user['psw']) {
            $_SESSION['login'] = 1;
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            header('Location: ' . URL . 'main.php');
            die;
        }
    }
    header('Location: ' . URL . 'index.php');
    die;
}

if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
    header('Location: ' . URL . 'main.php');
    die;
}

$title = 'Login';
require __DIR__ . '/top.php';
?>

<?php $title = 'Login'; ?>
<div class="login-container">
    <div class="login">
        <form action="<?= URL ?>index.php" method="post">
            <div class="row">
                <label>Email</label>
                <input type="email" name="email">
            </div>
            <div class="row">
                <label>Password</label>
                <input type="password" name="psw">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</div>

<?php

require(__DIR__ . '/bottom.php');
