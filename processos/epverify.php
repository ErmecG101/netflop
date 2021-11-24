<?php

// PRÓX. EP
$conquery = "select * from conteudos where contit = '$contit'";
$conresult = mysqli_query($connect, $conquery);
$ln_con = mysqli_fetch_assoc($conresult);
$concod = $ln_con['concod'];


$prox = $direp + 1;
$queryprox = "select * from diretorios where codcon = '$concod' and direp = '" . $prox . "' and dirtemp = '$dirtemp'";
$resultprox = mysqli_query($connect, $queryprox);
$numrowprox = mysqli_num_rows($resultprox);
if ($numrowprox == 0) {
    //echo 'não tem próximo ep';
    $prox = $dirtemp + 1;
    $queryprox = "select * from diretorios where codcon = '$concod' and direp = '" . 1 . "' and dirtemp = '$prox'";
    $resultprox = mysqli_query($connect, $queryprox);
    $numrowprox = mysqli_num_rows($resultprox);
    if ($numrowprox == 0) {
        //echo 'não tem próxima temp';
        $_SESSION['prox'] = 'no';
    } else {
        echo "<input type='hidden' id='avancar' name='avancar' value='temp'>";
        echo "<input type='hidden' id='valorprox' name='valor' value='$prox'>";
    }
} else {
    echo "<input type='hidden' id='avancar' name='avancar' value='ep'>";
    echo "<input type='hidden' id='valorprox' name='valor' value='$prox'>";
}

$prev = $direp - 1;
$queryprev = "select * from diretorios where codcon = '$concod' and direp = '" . $prev . "' and dirtemp = '$dirtemp'";
$resultprev = mysqli_query($connect, $queryprev);
$numrowprev = mysqli_num_rows($resultprev);
if ($numrowprev == 0) {
    //de quecho '<br>Não tem episódios ateriores';
    $prev = $dirtemp - 1;
    $maiorepquery = "select * from diretorios where codcon = '$concod' and dirtemp = '$prev' order by direp DESC";
    $maiorepresult = mysqli_query($connect, $maiorepquery);
    if (!$ln_me = mysqli_fetch_assoc($maiorepresult)) {
        $ln_me = '';
        //echo 'ln deu nada';
        $_SESSION['prev'] = 'no';
    } else {
        $queryprev = "select * from diretorios where codcon = '$concod' and direp = '" . $ln_me['direp'] . "' and dirtemp = '$prev'";
        $resultprev = mysqli_query($connect, $queryprev);
        $numrowprev = mysqli_num_rows($resultprev);
        if ($numrowprev == 0) {
            //echo ' não tem temporadas anteriores';
            $_SESSION['prev'] = 'no';
        } else {
            echo "<input type='hidden' id='retro' name='retro' value='temp'>";
            echo "<input type='hidden' id='valorprev' name='valor' value='$prev'>";
            echo "<input type='hidden' id='maiorep' name='valor' value='" . $ln_me['direp'] . "'>";
        }
    };
} else {

    echo "<input type='hidden' id='retro' name='retro' value='ep'>";
    echo "<input type='hidden' id='valorprev' name='valor' value='$prev'>";
}
