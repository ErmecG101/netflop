<?php


$admcod = $_SESSION['autenticado'];
$queryadm = "select * from adm where admcod = '$admcod'";
$resultadm = mysqli_query($connect, $queryadm);
$lna = mysqli_fetch_assoc($resultadm);