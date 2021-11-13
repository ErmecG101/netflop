<?php
session_start();
include '../config/conexao.php';

if(isset($_GET['excluir'])){
    $_SESSION['concod'] = $_GET['excluir'];
    $concod = $_SESSION['concod'];
    $querydelres = "delete from resenhas where codcon = '$concod'";
    $resultdelres = mysqli_query($connect, $querydelres);
    $querydelcongen = "delete from gencon where codcon = '$concod'";
    $resultdelcongen = mysqli_query($connect, $querydelcongen);
    $querydeldir = "delete from diretorios where codcon = '$concod'";
    $resultdeldir = mysqli_query($connect,$querydeldir);  
    $queryexcluir = "delete from conteudos where concod = '$concod'";
    $resultexcluir = mysqli_query($connect, $queryexcluir);
    header('location: ../index.php');

}else if(isset($_GET['editar'])){
    echo 'editou';
    $_SESSION['concod'] = $_GET['editar'];
    $concod = $_SESSION['concod'];    
    $_SESSION['acao']='editar';
    header('Location: ../admcadcont.php');
}else if(isset($_POST['assistir']))
{
    $dircod = $_POST['assistir'];
    $queryassistir = "select * from diretorios_de_conteudo where dircod = $dircod";
    $resultassistir = mysqli_query($connect,$queryassistir);
    $ln = mysqli_fetch_assoc($resultassistir);
    $_SESSION['concod'] = $ln['concod'];
    $_SESSION['contit'] = $ln['contit'];
    $_SESSION['direp'] = $ln['direp'];
    $_SESSION['dirtemp'] = $ln['dirtemp'];
    header("Location: ../assistir.php");
}

echo $_POST['editar'];
?>