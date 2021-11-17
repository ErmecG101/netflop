<?php
session_start();
include '../config/conexao.php';

$dircod = $_GET['dircod'];
$contit = $_GET['contit'];
$contit = str_replace('_', ' ', $contit);
$query = "select * from diretorios where dircod = $dircod";
$result = mysqli_query($connect,$query);
$ln = mysqli_fetch_assoc($result);
$dirtemp = $ln['dirtemp'];
$direp = $ln['direp']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<video width="100%" height="100%" controls> 
    <!--<source src="<//?php //echo './dir/' . $contit . '/' . $dirtemp . '/' . $direp . '.mp4' ?>">-->
    <source src = "1.mp4" type="video/mp4">
</video>
</body>
</html>