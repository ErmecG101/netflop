var telaPopup;
var concod;

function popupDire(concod, contit) {
    sessionStorage.contit = contit;
    telaPopup = window.open(
        './processos/viewsconteudos/popupdir.php?concod=' + concod,
        popup = true,
        "width=400, left=160, height=700, scrollbars=no, resizable=false,resizable=no",
    );
    popup.document.getElementById("concod").value = concod;
}
function popupDireClouse(dircod, direp, dirtemp, contit) {
    window.opener.location = '../../assistir.php?' + 'dircod=' + dircod +
        '&&direp=' + direp +
        '&&dirtemp=' + dirtemp +
        '&&contit=' + contit;
    window.open('', '_self').close();
}

function popupOpenCon() {
    window.open('formcongenerico.php',popup = true,"width=400, left=160, height=700, scrollbars=no, resizable=false,resizable=no",);
}

function popupCloseConCons(codcon,contit) {
    window.opener.location = "admcaddir.php?codcon="+codcon+"&&contit="+contit+""
    window.open('', '_self').close();
}

function popupOpenPer(){
    window.open('perfils.php?op=popup',popup = true,"width=400, left=160, height=700, scrollbars=no, resizable=false,resizable=no",);
}
function popupClosePer() {
    window.opener.reload();
    window.open('', '_self').close();
}

function tratarSQLInjec(value ,callback){
    var regex = /^([a-z]|[A-Z]|[0-9]|[ ])*$/g;
    if(regex.exec(value)){
        callback();
    }else{
        $('#toast').toast({animation : true, autohide : true, delay : 500});
    }
}

function pesqStart(){
    var contit = document.getElementById('pesqTex');
    var regex = /^([a-z]|[A-Z]|[0-9])*$/g;
    if(regex.exec(contit.value)){
        console.log(contit.value);
        document.location = 'pesqcon.php?pescontit='+contit.value;
        console.log('AÍ SIM ARROMBS');
    }else{
        contit.value='';
        $('.toast').toast({animation : true, autohide : true, delay : 500});
    }
}

function editarStart(concod){
    document.location='processos/resolvedorcon.php?editar='+concod;
}

function deletarStart(concod){
    document.location='processos/resolvedorcon.php?excluir='+concod;
}