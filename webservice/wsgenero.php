<?php
include '../config/conexao.php';
$op = $_GET['op'];
$gencod = $_GET['gencod'];
$gennom = $_GET['gennom'];

$queryi = "INSERT INTO generos(gennom)VALUES('$gennom');";
$queryu = "UPDATE generos SET gennom = '$gennom' WHERE gencod = '$gencod';";
$queryd = "DELETE FROM gencon WHERE codgen = '$gencod'; DELETE FROM gengost WHERE codgen = '$gencod';
DELETE FROM generos WHERE gencod = '$gencod';";
$querys = "SELECT * FROM generos";
$querysl = "SELECT * FROM generos WHERE gennom = '$gennom';";

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
} else if (($op == 'sl')||($op == 'SL')) {
	 $result = mysqli_query($connect, $querysl);
     $listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
     echo json_encode($listas);
 }
?>