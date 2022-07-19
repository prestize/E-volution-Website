<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(empty($_SESSION['messageAdmin'])){
    return;
}

$messageAdmin = $_SESSION['messageAdmin'];
unset($_SESSION['messageAdmin']);
?>

<ul>
    <?php foreach ($messageAdmin as $messageAdmin):?>
        <p style="color:#ff4848;"><?php echo $messageAdmin;?></p>
    <?php endforeach; ?>
</ul>