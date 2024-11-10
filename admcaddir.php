<?php


include './config/header.php';
include './config/menu.php';
include_once './procadm/admcheck.php';
include './config/conexao.php';

if (!$_GET) {
    $codcon = '';
    $contit = '';
} else {
    $codcon = $_GET['codcon'];
    $contit = str_replace('_', ' ', $_GET['contit']);
}

?>
<form class="mt-3 pt-3" enctype="multipart/form-data" method="POST" action="./procadm/admcaddirproc.php">
    <script type="text/javascript" src="./JS/generic.js"></script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <img class="imglogin img-fluid mx-auto d-block" src="./img/loginlogoadm2.png">
                <label class="center">
                    <h2>Cadastrar Diretório</h2>
                </label><br>
                <?php
                if (isset($_SESSION['diretorio'])) {
                    if ($_SESSION['diretorio'] == 'existe') {
                        echo "<br> <div class='alert alert-success' role='alert'>Esse episódio já foi enviado.</div>";
                    } else if ($_SESSION['diretorio'] == 'falho') {
                        echo "<br> <div class='alert alert-success' role='alert'>O Cadastro falhou.</div>";
                    } else if ($_SESSION['diretorio'] == 'sucesso') {
                        echo "<br> <div class='alert alert-success' role='alert'>Cadastrado com sucesso.</div>";
                    }
                    unset($_SESSION['diretorio']);
                }
                if (isset($_SESSION['status'])) {
                    if ($_SESSION['status'] == 'camposvazios') {
                        echo '<br> <div class="container-fluid"><div class="alert alert-warning" role="alert">Campo vazio detectado na sua operação.</div></div>';
                    }
                    unset($_SESSION['status']);
                }
                ?>
                <label>Esse diretório refere ao conteudo:</label>
                <div class="input-group mb-3">
                    <input type="text" name="codconview" id="codconview" style="background-color:rgb(39, 45, 59); color: white;" readonly class="form-control" placeholder="Selecione o filme que você deseja adicionar um diretório" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $contit; ?>">
                    <input type="hidden" name="codcon" id="codcon" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $codcon; ?>">
                    <a src='img/dir' class="btn btn-danger" type="button" href="javascript:popupOpenCon();">Procurar</a>
                </div>
                <label>Diretório: </label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control fileinput" accept=".mp4,.mkv,.avi" name="dirdir">
                </div>
                
                <div class="input-group mb-3">
                <input type="text" style="background-color:rgb(39, 45, 59); color: white;" readonly class="form-control" value="Temporada:"></input>
                    <input type="text" class="form-control" onkeyup="formatarNum(this)" maxlength="3" placeholder="Escreva o número" name="dirtemp">
                    <input type="text" style="background-color:rgb(39, 45, 59); color: white;" readonly class="form-control" value="Episódio:"></input>
                    <input type="text" class="form-control" onkeyup="formatarNum(this)" maxlength="3" placeholder="Escreva o número" name="direp">
                </div>
                <div class="input-group mb-4 center">
                    <button type="submit" class="btn btn-danger">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>

function formatarNum(obj){
    if (obj.value.toLowerCase() != obj.value.toUpperCase()){
        obj.value='';
    }  
};

</script>
<?php
include './config/footer.php';
?>