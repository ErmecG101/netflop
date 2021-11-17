<?php
include '../config/conexao.php';
$op = $_GET['op'];
$gengcod = $_GET['gengcod'];
$codper = $_GET['codper'];
$codgen = $_GET['codgen'];

$queryi = "INSERT INTO gengost(codper,codgen)VALUES('$codper','$codgen');";
$queryu = "UPDATE gengost SET codper='$codper', codgen='$codgen' WHERE gengcod='$gengcod';";
$queryd = "DELETE FROM gengost WHERE gengcod='$gengcod';"; 
$querys = "SELECT p.pernom, g.gennom, g.gencod, gg.codgen FROM perfil AS p INNER JOIN generos AS g INNER JOIN gengost AS gg WHERE p.percod == gg.codper AND g.gencod == gg.codgen;";
$queryp = "SELECT * FROM gengost WHERE codgen = '$codgen' AND codper='$codper'";

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
} else if (($op == 'p')||($op == 'P')) {
	$result = mysqli_query($connect, $queryp);
	$listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($listas);
}
?>