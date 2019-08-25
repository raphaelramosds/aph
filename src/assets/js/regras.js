

// Verificação 

function minimoverdes(dias){
    turno = $('#turno').val();
    preenchidos = dias.length; 
    /* A quantidade de verdes deve ser de 60% do total preenchido
    para os casos de turnos mv, mn e vn */

    if(turno == 'mv' || turno == 'mn' || turno == 'vn'){
        percentual = preenchidos/60;
        if(percentual < 0.6){
            $('#alert').append(alerta("É necessário preencher no mínimo 36 h/a em verde"));
        }
    }
    else if(turno == 'n' || turno == 'v' || turno == 'm'){
        if(preenchidos < 30){
            $('#alert').append(alerta("É necessário preencher no mínimo 30 h/a em verde"));
        }

    }

}

function maximovermelhos(dias){
    //console.log(dias);
    if(dias.length > 12){
        $('#alert').append(alerta("É permitido até 12 h/a em vermelho"));
    }
}

// function minimoamarelos(dias){
//     if(dias.length < 12){
//         $('#alert').append(alerta('É permitido no mínimo 12 h/a em amarelo'));
//     }
//     else{
//         pontuacao++;
//     }
// }

function disponibilizarssq(dias){

    // Receba o vetor com todos os horários e verifique se há dias marcados na segunda ou sexta e quarta
    if( (dias.includes(2) == false && dias.includes(6) == false) || dias.includes(4) == false){
        $('#alert').append(alerta('Disponibilize a segunda ou a sexta, além da quarta em todos os turnos escolhidos'));
        return false;
    }
    else{ return true; }
}


function alerta(txt){
    retorno = "<div class='validacao'>"+
        "<b>Atenção:</b>"+"<p>"+txt+"</p>"+
        "</div>";
    return retorno; 
}