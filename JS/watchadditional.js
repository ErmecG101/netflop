function watchNext(dircod, dirtemp, contit){
    met = document.getElementById('avancar');
    val = document.getElementById('valorprox');

    if(met.value == 'ep'){
        window.location = './assistir.php?' + 'dircod=' + dircod +
        '&&direp=' + val.value +
        '&&dirtemp=' + dirtemp +
        '&&contit=' + contit;
    }else if(met.value == 'temp'){
        window.location = './assistir.php?' + 'dircod=' + dircod +
        '&&direp=' + 1 +
        '&&dirtemp=' + val.value +
        '&&contit=' + contit;
    }

}

function watchPrev(dircod, dirtemp, contit){
    met = document.getElementById('retro');
    val = document.getElementById('valorprev');
    me = document.getElementById('maiorep');

    if(met.value == 'ep'){
        window.location = './assistir.php?' + 'dircod=' + dircod +
        '&&direp=' + val.value +
        '&&dirtemp=' + dirtemp +
        '&&contit=' + contit;
    }else if(met.value == 'temp'){
        window.location = './assistir.php?' + 'dircod=' + dircod +
        '&&direp=' + me.value +
        '&&dirtemp=' + val.value +
        '&&contit=' + contit;
    }

}