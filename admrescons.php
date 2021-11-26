<?php
include "./config/header.php";
include "./config/menu.php";
include_once './procadm/admcheck.php';
?>

<div class="container-fuild">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php include_once './procadm/respesqcon.php';?>
        </div>
    </div>
</div>
<?php
include "./config/footer.php";
?>