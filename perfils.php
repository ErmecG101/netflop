<?php
include "./config/conexao.php";
include "./config/header.php";
include "./config/menu.php";

echo "<br><br>";


if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'erro') {
        echo '<br> <div class="container-fluid"><div class="alert alert-danger" role="alert">Ocorreu um erro na sua operação.</div></div>';
    } else if ($_SESSION['status'] == 'Gostos') {
        echo "<div class='container'>";
        echo "<div class='row'>";
        include_once './processos/genlistgost.php';
        echo "</div>";
        echo "</div>";
    }else if ($_SESSION['status'] == 'camposvazioz'){
        echo '<br> <div class="container-fluid"><div class="alert alert-warning" role="alert">Campo vazio detectado na sua operação.</div></div>';
    }
    unset($_SESSION['status']);
}
$query = "select * from perfils_usuario where usucod ='" . $_SESSION['autenticado'] . "'";
$result = mysqli_query($connect, $query);
$x = 0;
$y = mysqli_num_rows($result);

?>
<script type="text/javascript" src="./JS/perfilbtn.js"></script>
<div class="container">
    <div class="row">
        <?php
        include "./processos/listperfis.php";
        ?>
        <div class="card-dark" style="background-color: rgb(45, 51, 70); width: 15rem;"><br>
            <center><img src="./img/opa.png" class="perfbigicon card-img-top" alt="..."></center>
            <div class="card-body">
                <center>
                    <h5 class="card-title">Cadastrar</h5>
                </center>
            </div>
            <form action="./processos/resolvedorperfil.php" enctype="multipart/form-data" method="POST">
                <ul style="background-color: rgb(45, 51, 70);" class="list-group list-group-flush">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="perkid" value="" class="teste" aria-label="Chebox para permitir input text">
                            </div>
                        </div>
                        <input readonly type="text" value="Criança" style="background-color: rgb(39, 45, 59); color: white;" class="form-control" aria-label="Input text com checkbox">
                    </div>
                    <input type="text" name="pernom" placeholder="Nome Perfil" class="form-group">
                    <br>
                    <br>
                    <button name="btninsper" value="<?php echo $ln['usucod'] ?>" type="submit" class="btn btn-secondary">Cadastrar</button>
                </ul>
            </form>
        </div>
    </div>
</div>
</div>
<?php
include "./config/footer.php";
