<nav>
    <ul>
        <li><a href="<?= URL ?>main.php">Home</a></li>
        <li><a href="<?= URL ?>create.php">Add account</a></li>
        <li><a href="<?= URL ?>edit.php">Subtract money from customer account</a></li>
        <li><a href="<?= URL ?>edit.php">Add money to customer account</a></li>
        <!-- <li><a href="<?= URL ?>delete.php">Delete customer</a></li> -->
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 1) : ?>
            <li>
                <form action="<?= URL ?>logout.php" method="post">
                    <button type="submit">Logout, <?= $_SESSION['name'] ?></button>
                </form>
            </li>
        <?php else : ?>
            <li><a href="<?= URL ?>login.php">Login</a></li>
        <?php endif ?>
    </ul>
</nav>