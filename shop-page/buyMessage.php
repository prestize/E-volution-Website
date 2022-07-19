<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(empty($_SESSION['buyMessages'])){
    return;
}

$buyMessages = $_SESSION['buyMessages'];
unset($_SESSION['buyMessages']);
?>

<ul>
    <?php foreach ($buyMessages as $buyMessages):?>
        <p style="color:#ff4848;"><?php echo $buyMessages;?></p>
    <?php endforeach; ?>
</ul>