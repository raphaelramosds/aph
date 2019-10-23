seguidos = false;
// verde = (0,128,0)
// preto = (0,0,0)

// Colocar em preto os que ainda não foram seguidos
$("#regraSSQ,#regraVerdes,#regraVermelho").css('color','black')

regraVerdes = $("#regraVerdes")
regraVermelho = $("#regraVermelho")
regraSSQ = $("#regraSSQ")

// Verificação 

function minimoverdes(dias){
    turno = $('#turno').val();
    preenchidos = dias.length; 
    console.log(preenchidos);

    /* A quantidade de verdes deve ser de 60% do total preenchido
    para os casos de turnos mv, mn e vn */

    if(turno == 'mv' || turno == 'mn' || turno == 'vn' || turno == 'mvn'){
        percentual = preenchidos/60;
        if(percentual < 0.6){
           regraVerdes.css('color','red')
        }
        else{
            regraVerdes.css('color','green')
        }
    }

    if(turno == 'v' || turno == 'm'){
        if(preenchidos < 30){
            regraVerdes.css('color','red')

        }
        else{
            regraVerdes.css('color','green')
        
        }

    }

    if(turno == 'n'){
        if(preenchidos < 20){
            regraVerdes.css('color','red')

        }
        else{
            regraVerdes.css('color','green')
        
        }
    }


}

function maximovermelhos(dias){
    //console.log(dias);
    if(dias.length > 12){
        regraVermelho.css('color','red');
    }
    else{
        regraVermelho.css('color','green');
       
    }
}


function disponibilizarssq(dias){

    // Receba o vetor com todos os horários e verifique se há dias marcados na segunda ou sexta e quarta
    if( (dias.includes(2) == false && dias.includes(6) == false) || dias.includes(4) == false){
        regraSSQ.css('color','red');
    }
    else{ 
        regraSSQ.css('color','green');

    }
}

