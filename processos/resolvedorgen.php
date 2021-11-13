<?php
session_start();
include '../config/conexao.php';
$_SESSION['gencod'] = filter_input(INPUT_POST,'gencod');
$_SESSION['gennom'] = filter_input(INPUT_POST, 'gennom');
$gencod = $_SESSION['gencod'];
if(isset($_POST['btngendel'])){
    
    $querydelgencon = "delete from gencon where codgen = '$gencod'";
    $resultdelgencon = mysqli_query($connect, $querydelgencon);
    $querydelgengost = "delete from gengost where codgen = '$gencod'";
    $resultdelgengost = mysqli_query($connect, $querydelgengost);
    $queryexcluir = "delete from generos where gencod = '$gencod'";
    $resultexcluir = mysqli_query($connect, $queryexcluir);
    header('location: ../admcadgen.php');

}else if(isset($_POST['btngenalt'])){
    $_SESSION['acao']='editar';
    header('Location: ../admcadgen.php');
    echo $_SESSION['gencod'];
}

?>