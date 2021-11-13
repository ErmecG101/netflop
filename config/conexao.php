<?php

define ('host','localhost');
define ('pass','');
define ('db','netflop');
define ('user','root');

$connect = mysqli_connect(host,user,pass,db) or die('Erro ao conectar-se com o banco.');
mysqli_set_charset($connect,'UTF8');