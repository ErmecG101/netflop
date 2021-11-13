<?php
session_start();
include '../config/conexao.php';

$a = count($_POST);
$b = array_values($_POST);

echo "<br><br>";
$delete_gengost = "delete from gengost where codper = '" . $_SESSION['pergost'] . "'";
$result_gencon = mysqli_query($connect, $delete_gengost);
for ($i = 0; $i < $a; $i++) {
    print_r($b[$i] . ' ');
    $insert_gencon = "insert into gengost(codgen, codper) values (" . $b[$i] . "," . $_SESSION['pergost'] . ");";
    $result_gencon = mysqli_query($connect, $insert_gencon);
}
header('Location: ../perfils.php');
