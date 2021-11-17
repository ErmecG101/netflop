<?php
include '../config/conexao.php';
$op = $_GET['op'];
$gctcod = $_GET['gctcod'];
$codgen = $_GET['codgen'];
$codcon = $_GET['codcon'];

$queryi = "INSERT INTO gencon(codgen,codcon)VALUES('$codgen','$codcon');";
$queryu = "UPDATE gencon SET codgen='$codgen', codcon='$codcon' WHERE gctcod='$gctcod';";
$queryd = "DELETE FROM gencon WHERE gctcod = '$gctcod';";
$querys = "SELECT gc.gctcod, c.contit, gn.gennom, gn.gencod FROM gencon AS gc INNER JOIN generos AS gn INNER JOIN conteudos as c WHERE gc.codgen = gn.gencod AND gc.codcon = c.concod";

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