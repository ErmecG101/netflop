<?php
include '../config/conexao.php';
$op = $_GET['op'];
$dircod = $_GET['dircod'];
$dirdir = $_GET['dirdir'];
$direp = $_GET['direp'];
$dirtemp = $_GET['dirtemp'];
$codcon = $_GET['codcon'];

$queryi = "INSERT INTO diretorios(dirdir,direp,dirtemp,codcon)VALUES('$dirdir','$direp','$dirtemp','$codcon');";
$queryu = "UPDATE diretorios SET dirdir='$dirdir', direp='$direp', dirtemp='$dirtemp', codcon='$codcon' WHERE dircod='$dircod';";
$queryd = "DELETE FROM diretorios WHERE dircod='$dircod';";
$querys = "SELECT * FROM diretorios";
$querysl= "SELECT * FROM diretorios WHERE dirdir LIKE '%$dirdir%';";

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
} else if (($op == 'sl')||($op == 'SL')){
    $result = mysqli_query($connect, $querysl);
    $listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($listas);
}
?>