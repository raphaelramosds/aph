// Função para colorir as preferencias
function colorir(campos,index){
    if(clicks == 1){ 
        campos[index].classList.add('green'); 
        campos[index].classList.remove('red');
        campos[index].classList.remove('white'); 
    }
    else if(clicks == 2){ 
        campos[index].classList.add('yellow'); 
        campos[index].classList.remove('green'); 
    }
    else if(clicks == 3){ 
        campos[index].classList.add('red'); 
        campos[index].classList.remove('yellow');
    }
    else if(clicks == 4){ 
        campos[index].classList.add('white'); 
        campos[index].classList.remove('red');
    }
    else if(clicks == 5){
        clicks = 0;
    }

}
clicks = 0;

// Quando o mouse estive encima da manha mude para "#manha .normal"
// Quando estiver encima da tarde mude para "#tarde .normal"
// Quando estiver encima da noite mude para "#noite normal"

function mudarTurno(retorno){
    elements = document.querySelectorAll(retorno);

}



// Quando o mouse deixar o campo, zere os clicks

function zerar(){
    clicks = 0;
}

function preencher(id){
    clicks++;
    for(i = 0; i < elements.length; i++){
        if(id == 0 && elements[i].getAttribute('data-dia') == 2){
            colorir(elements,i);
        };
        if(id == 1 && elements[i].getAttribute('data-dia') == 3){
            colorir(elements,i);
        };
        if(id == 2 && elements[i].getAttribute('data-dia') == 4){
            colorir(elements,i);
        };
        if(id == 3 && elements[i].getAttribute('data-dia') == 5){
            colorir(elements,i);
        };
        if(id == 4 && elements[i].getAttribute('data-dia') == 6){
            colorir(elements,i);
        };
    };
};

function preencherum(horario){
    clicks++;
    for(i = 0; i < elements.length; i++){
        if(elements[i].getAttribute('data-horario') == horario){
            colorir(elements, i);
        }
    };
};

// Autenticação das preferências 