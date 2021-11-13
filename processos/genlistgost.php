<?php

$querygeneros = "select * from generos order by gennom";
$resultgeneros = mysqli_query($connect, $querygeneros);
$x = 0;
$y = mysqli_num_rows($resultgeneros);

?>

<form action="./processos/gostoproc.php" class="divtable" method="POST">

    <div style="background-color: rgb(45, 51, 70);" class="row ">
        <?php

        while (($x < $y)) {
            for ($i = 0; $i <= 2; $i++) {
                echo "<div class='col-md-4'>";
                $ln_gen = mysqli_fetch_assoc($resultgeneros);
                if (isset($ln_gen['gencod'])) {
                    $querygengost = "select * from gengost where codper = '" . $_SESSION['pergost'] . "'and codgen = '" . $ln_gen['gencod'] . "'";
                    $resultgengost = mysqli_query($connect, $querygengost);
                }
                mysqli_next_result($connect);
                if ($ln_gen) {
                    if ($resultgengost) {
                        $ln_gen_gengost = mysqli_fetch_assoc($resultgengost);
                    }
        ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="checkboxgen<?php echo $ln_gen['gencod'] ?>" value="<?php echo $ln_gen['gencod'] ?>" class="teste" aria-label="Chebox para permitir input text" <?php
                                                                                                                                                                                                            if ((isset($ln_gen_gengost['codgen'])) && (isset($ln_gen['gencod']))) {
                                                                                                                                                                                                                if (($ln_gen_gengost['codgen'] == $ln_gen['gencod']) && ($ln_gen_gengost['codper'] == $_SESSION['pergost'])) {
                                                                                                                                                                                                                    echo 'checked';
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
</div>
<div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</div>
</div>
</form>