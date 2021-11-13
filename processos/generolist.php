<?php

$querygeneros = "select * from generos order by gennom";
$resultgeneros = mysqli_query($connect, $querygeneros);
$x = 0;
$y = mysqli_num_rows($resultgeneros);
echo "<div class='row'>";





while (($x < $y)) {

    for ($i = 0; $i <= 2; $i++) {
        echo "<div class='col-md-4'>";
        $ln_gen = mysqli_fetch_assoc($resultgeneros);
        if(isset($concod) && (isset($ln_gen['gencod']))){
            $querygencon = "select * from gencon where codcon = '$concod' and codgen = '" . $ln_gen['gencod'] . "'";
            $resultgencon = mysqli_query($connect, $querygencon);
        }

        
        mysqli_next_result($connect);
        if ($ln_gen) {
            if (isset($resultgencon)) {
                $ln_gen_gencon = mysqli_fetch_assoc($resultgencon);
            }
?>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" name="checkboxgen<?php echo $ln_gen['gencod'] ?>" value="<?php echo $ln_gen['gencod'] ?>" class="teste" aria-label="Chebox para permitir input text" <?php if ((isset($_SESSION['acao'])) && ($_SESSION['acao'] == 'alt')) {
                                                                                                                                                                                                        if ((isset($ln_gen_gencon['codgen'])) && (isset($ln_gen['gencod']))) {
                                                                                                                                                                                                            if (($ln_gen_gencon['codgen'] == $ln_gen['gencod']) && ($ln_gen_gencon['codcon'] == $concod)) {
                                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                                            }
                                                                                                                                                                                                        }
                                                                                                                                                                                                    }

                                                                                                                                                                                                    ?>>
                    </div>
                </div>
                <input readonly type="text" style="background-color: rgb(39, 45, 59); color: white;" value="<?php echo $ln_gen['gennom'] ?> " class="form-control" aria-label="Input text com checkbox">
            </div>
            </div>

<?php }
        $x++;
    }
}
?>