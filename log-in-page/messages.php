<?php
session_start();

if(empty($_SESSION['messages'])){
    return;
}

$messages = $_SESSION['messages'];
unset($_SESSION['messages']);
?>

<ul>
    <?php foreach ($messages as $message):?>
        <p style="color:#ff4848;"><?php echo $message;?></p>
    <?php endforeach; ?>
</ul>