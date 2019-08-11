        
$('#recuperar').click(function(){
    turno = $('#turno').val();
    pontuacao = 0; // O sistema só cadastrará as preferências se a pontuação chegar a um determinado valor
    // Resetar mensagens de validação
    $('#alert').html("");

    // Verificar se os dias segunda ou quarta e sexta foram marcados, por turno
    manha = [];
    tarde = [];
    noite = [];

    vermelhos = [];
    verdes = [];
    amarelos = [];
    
    // Verificar se a quantidade mínima de blocos em verde foi preenchida
    $('#manha .green, #tarde .green, #noite .green').each(function(){
        verdes.push($(this).data('dia'));
    })

    // Verificar se a quantidade mínima de blocos em amarelo foi preenchida
    $('#manha .yellow, #tarde .yellow, #noite .yellow').each(function(){
        amarelos.push($(this).data('dia'));
    })

    // Recuperar horários em vermelho de todos os turnos (se exceder 12, invalide)
    $('#manha .red, #tarde .red, #noite .red').each(function(){
        $(this).data('horario');
        vermelhos.push($(this).data('dia'));
    });     

    // Verificar se segunda ou sexta e quarta foram marcadas
    $('#manha .green, #manha .yellow').each(function(){
        manha.push($(this).data('dia'));
    });

    $('#tarde .green, #tarde .yellow').each(function(){
        tarde.push($(this).data('dia'));
    });

    $('#noite .green, #noite .yellow').each(function(){
        noite.push($(this).data('dia'));
    });
    
    if(turno == 'mv'){
        c4_manha = disponibilizarssq(manha);
        c4_tarde = disponibilizarssq(tarde);
        if(c4_manha == true && c4_tarde == true){
            pontuacao++;
        }
    }

    if(turno == 'mn'){
        /* Caso o turno escolhido for manhã-noite ou tarde-noite, verifique se 
        em algum dos dois a condição não é seguida */
        c4_manha = disponibilizarssq(manha);
        c4_noite = disponibilizarssq(noite);

        if(c4_manha == true && c4_noite == true){
            pontuacao++;
        }

    }
    
    if(turno == 'vn'){
        c4_tarde = disponibilizarssq(tarde);
        c4_noite = disponibilizarssq(noite);
        if(c4_tarde == true && c4_noite == true){
            pontuacao++;
        }
    }

    if(turno == 'n'){
        c4_noite = disponibilizarssq(noite);
    }

    c1 = minimoverdes(verdes);
    c2 = maximovermelhos(vermelhos);
    c3 = minimoamarelos(amarelos);

    // Preferencias já validadas
    preferencias = [];

    console.log(pontuacao);
    if(pontuacao == 4){
        // Recupere todos os horários preenchidos para cadastrá-los no banco conforme o turno escolhido
        // Possíveis turnos escolhidos: Tarde/Manha e Noite; Tarde e Manhã; Noite; 
        alert("Horários válidos");

        if(turno == 'mn'){

        }

        else if(turno == 'mv'){

        }

        else if(turno == 'vn'){

        }
        else{

        }
    }
});

// Verificação 

function minimoverdes(dias){
    turno = $('#turno').val();
    preenchidos = dias.length; 
    /* A quantidade de verdes deve ser de 60% do total preenchido
    não importando quais turnos foram escolhidos */

    if(turno == 'mv' || turno == 'mn' || turno == 'vn'){
        percentual = preenchidos/60;
        if(percentual < 0.6){
            $('#alert').append(alerta("É necessário preencher no mínimo 36 h/a em verde"));
        }
        else{
            pontuacao++;
        }
    }
    else if(turno == 'n'){
        // Como fica a regra da disponibilização de horários em verde para regime de 20h?
    }

}

function maximovermelhos(dias){
    //console.log(dias);
    if(dias.length > 12){
        $('#alert').append(alerta("É permitido até 12 h/a em vermelho"));
    }
    else{
        pontuacao++;
    }
}

function minimoamarelos(dias){
    if(dias.length < 12){
        $('#alert').append(alerta('É permitido no mínimo 12 h/a em amarelo'));
    }
    else{
        pontuacao++;
    }
}

function disponibilizarssq(dias){

    // Receba o vetor com todos os horários e verifique se há dias marcados na segunda ou sexta e quarta
    if( (dias.includes(2) == false && dias.includes(6) == false) || dias.includes(4) == false){
        $('#alert').append(alerta('Disponibilize a segunda ou a sexta, além da quarta'));
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