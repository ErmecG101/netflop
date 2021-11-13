<?php
$select_diretorio = "select * from diretorios_de_conteudo where concod = '" . $concod . "' order by dirtemp";
$result_diretorio = mysqli_query($connect, $select_diretorio);
$a = 0;
$b = mysqli_num_rows($result_diretorio);
?>


<div class="btn-group">
    <p>
    <div>
        <?php
        if (($result_diretorio) && ($a < $b)) {
            while (($result_diretorio) && ($a < $b)) {
                $ln_dir = mysqli_fetch_assoc($result_diretorio);
                if (!$ln_dir) {
                    echo '<a class="dropdown-item" href="#">Teste</a>';
                } else {
                    $ln['contit'] = str_replace(' ', '_', $ln['contit']);
        ?><a type="button" name="assistir" href="javascript:popupDireClouse(<?php echo $ln_dir['dircod'] .
                                                                                ',' . $ln_dir['direp'] .
                                                                                ',' . $ln_dir['dirtemp'] .
                                                                                ',' . "'" . $ln['contit'] . "'" ?>)" value="<?php echo $ln_dir['dircod']; ?>" class="btn btn-success"> <?php echo 'Temporada ' . $ln_dir['dirtemp'] . ' Episódio: ' . $ln_dir['direp'] ?></a>
        <?php }
                mysqli_next_result($connect);
                $a++;
            }
        }else{
            echo '<div class="alert alert-warning" role="alert">Ainda não há registros de episódios dessa série ou filme.</div>';
        } ?>
    </div>
    </p>
</div>