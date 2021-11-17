<?php
include '../config/conexao.php';
$op = $_GET['op'];
$rencod = $_GET['rencod'];
$rentit = $_GET['rentit'];
$rentex = $_GET['rentex'];
$rennota = $_GET['rennota'];
$codper = $_GET['codper'];
$codcon = $_GET['codcon'];

$queryi = "INSERT INTO resenhas(rentit,rentex,rennota,codper,codcon)VALUES('$rentit','$rentex','$rennota','$codper','$codcon');";
$queryu = "UPDATE resenhas SET rentit='$rentit', rentex='$rentex', rennota='$rennota' WHERE rencod='$rencod';";
$queryd = "DELETE FROM resenhas WHERE rencod='$rencod';";
$querys = "SELECT * FROM consulta_resenhas WHERE usucod='$usucod';";

if (($op == 'i') || ($op == 'I')) {
    $result = mysqli_query($connect, $queryi);
    echo $result;
} else if (($op == 'u') || ($op == 'U')) {
    $result = mysqli_query($connect, $queryu);
    echo $result;
} else if (($op == 'd') || ($op == 'D')) {
    $result = mysqli_query($connect, $queryd);
    echo $result;
} else if (($op == 's') || ($op == 'S')) {
    $result = mysqli_query($connect, $querys);
    $listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($listas);
}
?>
