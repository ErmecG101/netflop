<?php
session_start();
include '../config/conexao.php';

$gennom = filter_input(INPUT_POST, 'gennom');

$queryinsert = "insert into generos(gennom) values('$gennom')";
$queryselect = "select * from generos where gennom = '$gennom'";

$resultselect = mysqli_query($connect, $queryselect);
$numrowselect = mysqli_num_rows($resultselect);


if ($_SESSION['acao'] == 'editar') {
    if (!$gennom) {
        $_SESSION['genero'] = 'campo-vazio';
        header("Location: ../admcadgen.php");
    } else {
        $gencod = $_SESSION['gencod'];
        $queryupdate = "update generos set gennom='$gennom' where gencod = '$gencod'";
        $_SESSION['genero'] = 'editado';
        $resultupdate = mysqli_query($connect, $queryupdate);
        unset($_SESSION['acao']);
        header("Location: ../admcadgen.php");
    }
} else {
    if (empty($numrowselect) == false) {
        //existe um registro já com o nome
        $ln = mysqli_fetch_assoc($resultselect);
        $_SESSION['genero'] = 'já-existe';
        $_SESSION['gencod'] = $ln['gencod'];
        header("Location: ../admcadgen.php");
    } else if (empty($gennom)) {
        $_SESSION['genero'] = 'campo-vazio';
        header("Location: ../admcadgen.php");
    } else {
        $resultinsert = mysqli_query($connect, $queryinsert);
        $_SESSION['genero'] = 'sucesso';
        header("Location: ../admcadgen.php");
    }
}
