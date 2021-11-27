<?php
include "./config/conexao.php";
include "./config/header.php";
include "./config/menu.php";

?>

<br><br>

<body class="mainstyle">
    <form id="formres" class="mt-3 pt-3" method="POST" action="./processos/resproc.php">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-9">
                            <label>Titulo Resenha</label>
                            <input type="text" value="<?php if(isset($_SESSION['rentit'])) {echo $_SESSION['rentit'];}?>" id="restit" name="rentit" class="form-control" style="background: rgb(39, 45, 59);color: rgb(240, 240, 240);" placeholder="Resuma a sua opinião em breves palavras" maxlength="64">
                        </div>
                        <div class="col-md-3">
                            <label>Nota</label>
                            <input type="text" onkeyup="formatNot(this)" value="<?php if(isset($_SESSION['rennot'])) {echo $_SESSION['rennot'];}?>" <?php if(isset($_SESSION['status'])){ echo "readonly"; }?> name="rennot" id="edtnota" class="form-control" style="background: rgb(39, 45, 59);color: rgb(240, 240, 240);"placeholder="X/10" maxlength="2">
                        </div>
                    </div><br>
                    <div class="row">
                        <label>Conteúdo da Resenha</label>
                        <label id="rentexcounter" style="color:gray; font-size: 11px;">(0/512)</label>
                        <textarea onfocus="updateRenTexCounter()" onblur="updateRenTexCounter()" onkeydown="updateRenTexCounter()" onkeyup="updateRenTexCounter()" type="text" name="rentex" id="rentex" class="form-control" style="background: rgb(39, 45, 59);color: rgb(240, 240, 240);" rows="5" placeholder="explique-nos o porque de sua opinião e nota" maxlength="512"><?php if(isset($_SESSION['rentex'])) {echo $_SESSION['rentex'];}?></textarea>
                    </div><br>
                    <div class="container">
                    <button type="submit" name="btnsendres" class="btn btn-primary">Enviar</button>
                        <?php if(isset($_SESSION['status'])){
                            echo "<button name='btndelres' type='submit' class='btn btn-danger'>Deletar</button>";
                        }else{
                            echo "<input type='button' class='btn btn-danger' onclick='javascript:clearAll()' value='Limpar Campos' >";
                            }?>
                    </div><br>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </form>
</body>

</html>

<script>
    var notaRes = document.getElementById('edtnota');
    document.getElementById('rentexcounter').innerHTML = '('+document.getElementById('rentex').value.length+'/512)';

    function formatarNum(obj){
    if (obj.value.toLowerCase() != obj.value.toUpperCase()){
        obj.value='';
    }  
};
    function formatNot(obj){
        formatarNum(obj);
        if(obj.value > 10){
        obj.value = '';
    }else if(obj.value == 1){

    }else if(obj.value < 10){
        if(obj.value.length == 1){
            if(event.keyCode !=8){
                obj.value = 0+obj.value;
            }
        }
    }
}

    function formatNot_old() {
        if (notaRes.value > 10) {
            notaRes.value = '';
        } else if (notaRes.value <= 9) {
            if(notaRes.value.length < 2){
                notaRes.value = '0' + notaRes.value;
            }
        } else if (notaRes.value.toLowerCase() != notaRes.value.toUpperCase()) {
            notaRes.value = '';
        } else if (notaRes.value = 10) {
            notaRes.value = '10';
        }
    }
    function updateRenTexCounter(){
        var rentex = document.getElementById('rentex');
        var rentexcounter = document.getElementById('rentexcounter');
        rentexcounter.innerHTML = '('+rentex.value.length+'/512)';
        if(rentex.value.length>=500){
            rentexcounter.innerHTML = '('+rentex.value.length+'/512) - Espaço de escrita acabando!';
        }
    }

    function clearAll(){
        restit = document.getElementById('restit');
        edtnota = document.getElementById('edtnota');
        rentex = document.getElementById('rentex');

        restit.value='';
        edtnota.value='';
        rentex.value='';
    }
</script>