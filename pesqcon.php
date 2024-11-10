<?php
session_start();
include './config/header.php';
include './config/menu.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row">
                <?php include './processos/viewsconteudos/pesqconproc.php' ?>
            </div>
        </div>
    </div>
</div>