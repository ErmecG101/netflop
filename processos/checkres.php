<?php
session_start();
include '../config/conexao.php';

$select = "select * from resenhas where codper = '" . $_SESSION['percod'] . "' and codcon = '". $_GET['codcon']."'";
$result = mysqli_query($connect, $select);
$_SESSION['concod'] = $_GET['codcon'];

if ($result) {
    $ln = mysqli_fetch_assoc($result);
    $_SESSION['rentit'] = $ln['rentit'];
    $_SESSION['rennot'] = $ln['rennota'];
    $_SESSION['rentex'] = $ln['rentex'];
    header("Location: ../cadres.php");
}
