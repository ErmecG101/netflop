<?php


$usucod = $_SESSION['autenticado'];
$queryperfilcons= "select * from usuarios as u inner join perfil as p where u.usucod = p.codusu and usucod = '$usucod'";
$resultperfil = mysqli_query($connect, $queryperfilcons);
$lnp = mysqli_fetch_assoc($resultperfil);

$queryperfilconfig= "select * from usuarios as u inner join perfil as p where u.usucod = p.codusu and p.percod = '".$_SESSION['percod']."'";
$resultperfilconfig = mysqli_query($connect, $queryperfilconfig);
$lnpc = mysqli_fetch_assoc($resultperfilconfig);