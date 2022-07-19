<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(empty($_SESSION['wishlistBuymessage'])){
    return;
}

$wishlistBuymessage = $_SESSION['wishlistBuymessage'];
unset($_SESSION['wishlistBuymessage']);
?>

<ul>
    <?php foreach ($wishlistBuymessage as $wishlistBuymessage):?>
        <p style="color:#ff4848;"><?php echo $wishlistBuymessage;?></p>
    <?php endforeach; ?>
</ul>