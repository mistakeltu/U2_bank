<?php

$msg = $_SESSION['message'] ?? null;
unset($_SESSION['message']);

?>

<?php if ($msg) : ?>

    <div class="msg" style="background: <?= $msg['type']; ?>">
        <?= $msg['text'] ?>
    </div>

<?php endif ?>