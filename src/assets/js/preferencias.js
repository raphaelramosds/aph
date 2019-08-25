// É necessário colocar as classes porque o sistema de preenchimento reconhece as cores pelas classes


// Função para colorir as preferencias
function colorir(campos,index){
    
    if(campos[index].style.backgroundColor == ''){
        campos[index].style.backgroundColor = 'green';
        campos[index].classList.add("green")
        
    }

    else if(campos[index].style.backgroundColor == 'green'){
        campos[index].style.backgroundColor = 'yellow';

        campos[index].classList.remove("green")
        campos[index].classList.add("yellow");
    }

    else if(campos[index].style.backgroundColor == 'yellow'){
        campos[index].style.backgroundColor = 'red';

        campos[index].classList.remove("yellow")
        campos[index].classList.add("red");
    }

    else if(campos[index].style.backgroundColor == 'red'){
        campos[index].style.backgroundColor = '';
        campos[index].classList.remove("red")
    }
}


// Quando o mouse estive encima da manha mude para "#manha .normal"
// Quando estiver encima da tarde mude para "#tarde .normal"
// Quando estiver encima da noite mude para "#noite .normal"

function mudarTurno(retorno){
    elements = document.querySelectorAll(retorno);

}


function preencher(id){
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
    for(i = 0; i < elements.length; i++){
        if(elements[i].getAttribute('data-horario') == horario){
            colorir(elements, i);
        }
    };
};

function horizontal(id,turno){
    for(i = 0; i < elements.length; i++){
        if(elements[i].getAttribute('data-horario') == '2'+turno+id){
            colorir(elements,i);
        }
        if(elements[i].getAttribute('data-horario') == '3'+turno+id){
            colorir(elements,i);
        }
        if(elements[i].getAttribute('data-horario') == '4'+turno+id){
            colorir(elements,i);
        }
        if(elements[i].getAttribute('data-horario') == '5'+turno+id){
            colorir(elements,i);
        }
        if(elements[i].getAttribute('data-horario') == '6'+turno+id){
            colorir(elements,i);
        }
    }
}
