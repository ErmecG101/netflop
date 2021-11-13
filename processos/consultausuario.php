<?php


$usucod = $_SESSION['autenticado'];
$query = "select * from usuarios where usucod = '$usucod'";
$result = mysqli_query($connect, $query);
$ln = mysqli_fetch_assoc($result);