<?php
include '../config/conexao.php';
$op = $_GET['op'];
$percod = $_GET['percod'];
$pernom = $_GET['pernom'];
$perkid = $_GET['perkid'];
$perpfp = $_GET['perpfp'];
$codusu = $_GET['codusu'];

$queryi = "INSERT INTO perfil(pernom,perkid,perpfp,codusu)VALUES('$pernom','perkid','$perpfp','$codusu');";
$queryu = "UPDATE perfil SET pernom = '$pernom', perkid = '$perkid', perpfp = '$perpfp', codusu = 'codusu';";
$queryd = "DELETE FROM perfil WHERE percod='$percod'; DELETE FROM gengost WHERE codper='$percod'";
$querys = "SELECT * FROM perfil";
$querysl= "SELECT p.percod, gg.codper, FROM perfil AS p INNER JOIN gengost AS gg INNER JOIN usuarios AS u WHERE p.percod = gg.codper AND p.codusu = u.usucod;";
$queryp = "SELECT * FROM perfil WHERE codusu ='$codusu';";

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
} else if (($op == 'sl') || ($op == 'SL')) {
    $result = mysqli_query($connect, $querysl);
    $listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($listas);
} else if (($op == 'p') || ($op == 'P')) {
    $result = mysqli_query($connect, $queryp);
    $listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($listas);
}
?>