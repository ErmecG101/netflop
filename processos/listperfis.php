<br><br><br><br><br><br><br>
<div class="row">
<script type="text/javascript" src="./JS/generic.js"></script>
<?php
while ($x < $y) {
    $ln = mysqli_fetch_assoc($result);

?>
    
        <div class="card-dark" style="background-color: rgb(45, 51, 70); width: 15rem;">
            <center><img src="<?php echo $ln['perpfp'] ?>" class="perfbigicon card-img-top" alt="..."></center>
            <div class="card-body">
                <center>
                    <h5 class="card-title"><?php echo $ln['pernom'] ?></h5>
                </center>
            </div>
            <form action="./processos/resolvedorperfil.php" method="POST" enctype="multipart/form-data">
                <?php if ((isset($_SESSION['perfil'])) && ($_SESSION['peredit'] == $ln['percod'])) { ?>
                    <ul style="background-color: rgb(45, 51, 70);" class="list-group list-group-flush">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="perkid" value="" class="teste" aria-label="Chebox para permitir input text" <?php if ($ln['perkid'] == 1) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                </div>
                            </div>
                            <input readonly type="text" value="Criança" style="background-color: rgb(39, 45, 59); color: white;" class="form-control" aria-label="Input text com checkbox">
                        </div>
                        <input type="text" value="<?php echo $ln['pernom'] ?>" name="pernom" placeholder="Nome Perfil" class="form-group">
                        <input type="file" name="perpfp" class="form-control fileinput" style="width: 13.5rem;">
                        <br>
                        <button name="btnfinedit" value="<?php echo $ln['percod'] ?>" type="submit" class="btn btn-secondary">Atualizar</button>
                    </ul>
                <?php } else { ?>
                    <ul style="background-color: rgb(45, 51, 70);" class="list-group list-group-flush">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="perkid" value="<?php echo $ln['percod'] ?>" class="teste" aria-label="Chebox para permitir input text" <?php if ($ln['perkid'] == 1) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?>>
                                </div>
                            </div>
                            <input readonly type="text" style="background-color: rgb(39, 45, 59); color: white;" value="Criança" class="form-control" aria-label="Input text com checkbox">
                        </div>

                        <button <?php if ($ln['percod'] == $_SESSION['percod']) {
                                    echo 'disabled';
                                } ?> name="btnselper" value="<?php echo $ln['percod'] ?>" onclick="<?php if($_GET){ echo 'javascript:popupClosePer()'; }?>" type="submit" class="btn btn-primary">Selecionar</button>
                        <button name="btngosper" value="<?php echo $ln['percod'] ?>" type="submit" class="btn btn-secondary">Gostos</button>
                        <button name="btneditper" value="<?php echo $ln['percod'] ?>" type="submit" class="btn btn-warning">Editar Perfil</button>
                        <button <?php if ($ln['percod'] == $_SESSION['percod']) {
                                    echo 'disabled';
                                } ?> name="btndelper" value="<?php echo $ln['percod'] ?>" type="submit" class="btn btn-danger">Delete</button>
                    </ul><?php } ?>
            </form>
        </div>

    &nbsp; &nbsp;
<?php
    mysqli_next_result($connect);
    $x++;
}?>
    
