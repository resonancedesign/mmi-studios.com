<?php
    mysql_connect("localhost","mmistudioscom","DrJ0n3s1!") or die(mysql_error());
    mysql_select_db("mmistudioscom") or die(mysql_error());
?>

<div class="col-sm-3" id="shopping-cart">
    <?php include_once('app/modules/mini-cart.php'); ?>
    <?php include_once('app/modules/product-slider.php'); ?>
</div>