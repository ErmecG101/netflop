<?php
include 'config/conexao.php';
include 'config/header.php';
include 'config/menu.php';

$_SESSION['dircod'] =$dircod = $_GET['dircod'];
$_SESSION['direp'] =$direp = $_GET['direp'];
$_SESSION['dirtemp'] =$dirtemp = $_GET['dirtemp'];
$_SESSION['contit'] = $contit = $_GET['contit'];
$contit = str_replace('_', ' ', $contit);
$query = "select * from diretorios where dircod = $dircod";
$result = mysqli_query($connect,$query);
$ln = mysqli_fetch_assoc($result);

include './processos/epverify.php';

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.min.js"></script>
<script type="text/javascript" src="./JS/watchadditional.js"></script>
<div class="container">
    <h3><?php echo 'Episódio: '.$direp. ' Temporada: '.$dirtemp ?></h3>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="height: 720px;">
            <?php if(isset($_SESSION['status'])){
                if($_SESSION['status'] == 'Perfil'){
                    echo "<div class='alert alert-success' role='alert'>Resenha enviada com sucesso!</div>";
                }else if($_SESSION['status']== 'NA_Perfil'){
                    echo "<div class='alert alert-warning' role='alert'>Logue/Cadastre-se antes!</div>";
                }else if($_SESSION['status']== 'atualizado'){
                    echo "<div class='alert alert-success' role='alert'>Resenha atualizada com sucesso!</div>";
                }else if($_SESSION['status']== 'erro_campos_vazios'){
                    echo "<div class='alert alert-danger' role='alert'>Algo deu errado na sua interação com a resenha.</div>";
                }
            unset($_SESSION['status']);
            }?>
            <video autoplay id="myvid" width="100%" src="<?php echo './dir/' . $contit . '/' . $dirtemp . '/' . $direp . '.mp4' ?>" muted></video>
            <table class="table table-borderless table-dark">
                <input type="range" class="form-range" id="videoProg" oninput="setTime()">
                <thead>
                    <tr>
                        <th scope="col" class="col-md-1"><button class="btn btn-link" onclick=javascript:watchPrev(<?php echo $dircod.",".$dirtemp. ","."'".$_GET['contit']."'" ?>) <?php if(isset($_SESSION['prev'])){ echo 'disabled'; unset($_SESSION['prev']); } ?> id=""><img src="./img/IconesPlayer/botao_ep_anterior.png" class="controlicon"></button></th>
                        <th scope="col" class="col-md-1"><button class="btn btn-link" id="vidbutton"><img id="playPauseIMG" src="./img/IconesPlayer/botao_pause.png" class="controlicon"></button></th>
                        <th scope="col" class="col-md-1"><button class="btn btn-link" onclick=javascript:watchNext(<?php echo $dircod.",".$dirtemp. ","."'".$_GET['contit']."'" ?>) <?php if(isset($_SESSION['prox'])){ echo 'disabled'; unset($_SESSION['prox']); } ?> id=""><img src="./img/IconesPlayer/botao_ep_proximo.png" class="controlicon"></button></th>
                        <th scope="col" class="col-md-7"><button class="btn btn-link" id="mute"> <img id="muteButtonIMG" src="./img/IconesPlayer/botao_volume_mudo.png" class="controlicon"> </button><input id="vol-control" type="range" class="form-range" min="0" max="100" step="1" oninput="thisVolume(this.value)" style="width: 120px; height: 10px;"></th>
                        <th scope="col" class="col-md-1"><label id="timerText" style="background-color: #212529; color: white;" class="form-control">00:00</label></th>
                        <input type="hidden" id="vol">
                        <th scope="col" class="col-md-1"><button id="btnfullscreen" class="btn btn-link"><img src="./img/IconesPlayer/botao_tela_cheia.png" class="controlicon"></button></th>
                    </tr>
                </thead>
            </table>
            <?php if(isset($_SESSION['percod'])){ echo "<a href='./processos/checkres.php?codcon=".$ln['codcon']."' class='btn btn-primary'>Deixar sua opinião</a>"; }else{
                echo "<button class='btn btn-primary' disabled >Deixar sua opinião</button> Se você quer dar a sua opinião, crie uma conta.";
            } ?>
        </div>
    </div>
</div>
<?
include 'config/footer.php';
?>
<script>
    var ppbutton = document.getElementById("vidbutton");
    var volmute = document.getElementById("mute");
    var fsbutton = document.getElementById("btnfullscreen");
    var progBar = document.getElementById("videoProg");
    var progTime = document.getElementById("timerText");
    var barValue;
    $(document).ready(function() {
        $("#myvid").on(
            "timeupdate",
            function(event) {
                progVideo(this.currentTime, this.duration);
            }
        )
    })
    ppbutton.addEventListener("click", playPause);
    volmute.addEventListener("click", volumeMute);
    fsbutton.addEventListener("click", makeFullscreen);
    myVideo = document.getElementById("myvid");

    function setTime() {
        var time = progBar.value;
        myVideo.currentTime = time;
    }

    function progVideo(currentTime, duration) {
        progBar.max = duration;
        progBar.value = currentTime;
        val = Number(currentTime) * 1000;
        var d = moment.duration(val);
        var percentage = ((currentTime*100)/duration);


        progTime.innerHTML = d.hours() + ":" + d.minutes() + ":" + d.seconds();;

    }

    function playPause() {
        var ppbuttonimg = document.getElementById("playPauseIMG");
        if (myVideo.paused) {
            myVideo.play();
            ppbuttonimg.src = "./img/IconesPlayer/botao_pause.png";
            //ppbutton.innerHTML = ">";
        } else {
            myVideo.pause();
            ppbuttonimg.src = "./img/IconesPlayer/botao_play.png";
            //ppbutton.innerHTML = "II";
        }
    }

    function thisVolume(volume_value) {
        var mvbuttonimg = document.getElementById("muteButtonIMG");
        var myvideo = document.getElementById("myvid");
        document.getElementById("vol").innerHTML = volume_value;
        myvideo.volume = volume_value / 100;
        if (myvideo.muted == false) {
            if (myvideo.volume >= 0.5) {
                mvbuttonimg.src = "./img/IconesPlayer/botao_volume_alto.png";
            } else {
                mvbuttonimg.src = "./img/IconesPlayer/botao_volume_baixo.png";
            }
        }
    }

    function volumeMute() {
        var mvbuttonimg = document.getElementById("muteButtonIMG");
        volume_value = document.getElementById("vol").innerHTML;
        if (myVideo.muted == true) {
            myVideo.muted = false;
            if (myVideo.volume > 0.5) {
                mvbuttonimg.src = "./img/IconesPlayer/botao_volume_alto.png";
            } else {
                mvbuttonimg.src = "./img/IconesPlayer/botao_volume_baixo.png";
            }

        } else {
            myVideo.muted = true;
            mvbuttonimg.src = "./img/IconesPlayer/botao_volume_mudo.png";
        }
    }

    function makeFullscreen() {
        var elem = document.getElementsByTagName('video')[0];
        var fullscreen = elem.webkitRequestFullscreen || elem.mozRequestFullScreen || elem.msRequestFullscreen;
        fullscreen.call(elem); // bind the 'this' from the video object and instantiate the correct fullscreen method.
    }
</script>

