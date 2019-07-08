
prefixo = "https://suap.ifrn.edu.br/api/v2";

// Recuperar dados quando o login for acionado

$('#entrar').click(function(e){
    e.preventDefault();

    matricula = $('#matricula').val();
    senha = $('#senha').val();

    // Colocar dados do usuário em um pacote para enviar à autenticação e transformá-los em JSON
    dados = JSON.stringify({"username":matricula, "password":senha});

    // Enviar dados para a API SUAP
    $.ajax({
        url: prefixo + "/autenticacao/token/", 
        dataType:'json',
        data: dados,
        type: 'POST',
        contentType:'application/json',
        success:function(data){
            sessionStorage.setItem("token", data.token); //Armazenando o token na seção
			meusDados();
        },
        error:function(){

        }
    });
});


// Recuperar dados do usuário após autenticação
 
 function meusDados(){

    $.ajax({
        headers:{
            "Authorization":"JWT " + sessionStorage.getItem("token")
        },
        url: prefixo + "/minhas-informacoes/meus-dados",
        contentType:'application/json',
        type:'POST',
        dataType:'json',
        success:function(data){
            console.log(data);
        },
        error:function(){

        }
    });
 }