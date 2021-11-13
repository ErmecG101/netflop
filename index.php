<?php
//include '#' futura conexão com o banco
include '../netflop/config/conexao.php';
include __DIR__ . "/config/header.php";
include __DIR__ . "/config/menu.php";
unset($_SESSION['acao']);
?>
<?php
if ((isset($_SESSION['popup'])) && ($_SESSION['popup'] == 'yes')) : ?>
    <script>
        function popupClosePer() {
            window.opener.location.reload();
            window.open('', '_self').close();
        }
        popupClosePer();
    </script>
<?php endif; ?>

<script type="text/javascript" src="./JS/indexbtn.js"></script>

<?php
if ($_GET) {
    if ($_GET['maxnum'] <= 5) {
        $maxnum = $_GET['maxnum'];
    } else {
        $maxnum = 3;
    }
} else {
    $maxnum = 3;
}
?>
<div class="container-fluid">
    <div class="row mt-4 pt-4">
        <div class="input-group mb-3 pl-5" id="listbuttongroup">
            <input class="<?php if ($maxnum == 1) {
                                echo 'btn btn-secondary';
                            } else {
                                echo 'btn btn-outline-secondary';
                            } ?>" onclick="javascript:buttonSelect(1)" class="" type="button" id="listbutton1" value="1">
            <input class="<?php if ($maxnum == 2) {
                                echo 'btn btn-secondary';
                            } else {
                                echo 'btn btn-outline-secondary';
                            } ?>" onclick="javascript:buttonSelect(2)" class="" type="button" id="listbutton2" value="2">
            <input class="<?php if ($maxnum == 3) {
                                echo 'btn btn-secondary';
                            } else {
                                echo 'btn btn-outline-secondary';
                            } ?>" onclick="javascript:buttonSelect(3)" class="" type="button" id="listbutton3" value="3">
            <input class="<?php if ($maxnum == 4) {
                                echo 'btn btn-secondary';
                            } else {
                                echo 'btn btn-outline-secondary';
                            } ?>" onclick="javascript:buttonSelect(4)" class="" type="button" id="listbutton4" value="4">
            <input class="<?php if ($maxnum == 5) {
                                echo 'btn btn-secondary';
                            } else {
                                echo 'btn btn-outline-secondary';
                            } ?>" onclick="javascript:buttonSelect(5)" class="" type="button" id="listbutton5" value="5">
        </div>
        <div class="row">
            <h1 style="text-align: center;">Descubra seus novos favoritos:</h1>
            <div id="carouselExampleControls1" data-interval="false" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="container-fluid  ml-5 mr-5">
                        <?php include './processos/Viewsconteudos/congenerico.php' ?>
                    </div>
                </div>
                <a class="carousel-control-prev"  href="#carouselExampleControls1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
        <div class="row">
            <h1 style="text-align: center;">De acordo com os seus gostos:</h1>
            <div id="carouselExampleControls" data-interval="false" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="container-fluid  ml-5 mr-5">
                        <?php if (isset($_SESSION['percod'])) {
                            include './processos/Viewsconteudos/congost.php';
                        } else {
                        ?>
                            <div class="carousel-item active">
                                <a href="accform.php"><img class="d-block w-100 " src="./img/nfbanner.png"></a>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
    </div>
</div>
</div>

<div aria-live="polite" id="toast" aria-atomic="true" style="position: relative; min-height: 200px;">
  <div class="toast" style="position: absolute; top: 0; right: 0;">
    <div class="toast-header">
      <img src="..." class="rounded mr-2" alt="...">
      <strong class="mr-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>

<?php
include __DIR__ . "/config/footer.php";
?>