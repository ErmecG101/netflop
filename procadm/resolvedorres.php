<?php
    session_start();
    include '../config/conexao.php';

    $rescod = $_POST['btnresvis'];
    $select = "select * from resenhas where rencod = '$rescod'";
    $result = mysqli_query($connect,$select);
    $ln = mysqli_fetch_assoc($result);

    $_SESSION['rencod'] = $rescod;
    $_SESSION['rentit'] = $ln['rentit'];
    $_SESSION['rennot'] = $ln['rennota'];
    $_SESSION['rentex'] = $ln['rentex'];
    $_SESSION['status'] = 'visualizar';

    header("Location: ../cadres.php");