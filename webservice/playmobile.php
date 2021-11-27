<?php
session_start();
include '../config/conexao.php';

$dircod = $_GET['dircod'];
$contit = $_GET['contit'];
$contit = str_replace('_', ' ', $contit);
$query = "select * from diretorios where dircod = '$dircod';";
$result = mysqli_query($connect,$query);
$ln = mysqli_fetch_array($result);
$dirtemp = $ln['dirtemp'];
$direp = $ln['direp'];

echo $dircod;
echo $contit;
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body class="mainstyle">
<video autoplay width="100%" height="100%" controls> 
    <source src="<?php echo '../'.$ln['dirdir'] ?>" type="video/mp4">
    <!--<source src = "1.mp4" type="video/mp4">-->
</video>
</body>
</html>