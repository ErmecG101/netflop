<?php
 include '../config/conexao.php';
 $op = $_GET['op'];
 $concod = $_GET['concod'];
 $contit = $_GET['contit'];
 $conimg = $_GET['conimg'];
 $condur = $_GET['condur'];
 $coneps = $_GET['coneps'];
 $consip = $_GET['consip'];
 $conaut = $_GET['conaut'];
 $connotimdb = $_GET['connotimdb'];

 $queryi = "INSERT INTO conteudos(contit,conimg,condur,coneps,consip,conaut,connotimdb)VALUES('$contit','$conimg','$condur','$coneps','$consip','$conaut','$connotimdb');";
 $queryu = "UPDATE conteudos SET contit='$contit',conimg='$conimg',condur='$condur',coneps='$coneps',consip='$consip',conaut='$conaut',connotimdb='$connotimdb';";
 $queryd = "DELETE FROM conteudos WHERE concod='$concod'; DELETE FROM resenhas WHERE codcon='$concod';
             DELETE FROM diretorios WHERE codcon='$concod'; DELETE FROM gencon WHERE codcon='$concod';";
 $querys = "SELECT * FROM conteudos";
 $querysl = "SELECT * FROM conteudos WHERE contit LIKE '%$contit%';";

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