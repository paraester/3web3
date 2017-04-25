var eleitor;
function eleitorQueVotou(id){
    console.log("teste aqui no js interno");
    eleitor = prompt("Eleitor digite seu nome???");
    console.log("este é o eleitor: " + eleitor );
    var id_candidato = id.replace("eleitor", "");
    dadosEleitor = {};
    dadosEleitor.eleitor = eleitor;
    dadosEleitor.id = id_candidato;
    dadosEleitor._metodo = "PATCH";

    request = $.ajax({
        //url: 'URL_RAIZ . votos',
        type: "post",
        data: dadosEleitor,
        success: function(retorno) {
          console.log ("dados voltaram do ajax");
          console.log(retorno);
          try {
            var data = JSON.parse(retorno);
            //console.dir(data);
          } catch (e) {
            console.log(retorno + "Erro ao tentar bloquear disciplinas" + dados);
            return;
          };
          var novoTotal = document.getElementById('totalVotos' + data.id);
          if (novoTotal){
            novoTotal.innerHTML = data.total;
          }
        }

    });
};

//Variável para manter solicitação
/*var request;

// Vincular ao evento de envio do nosso formulário
$("#foo").submit(function(event){

    // Impedir o lançamento padrão do formulário - colocar aqui para funcionar em caso de erros
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // Configurar algumas variáveis locais
    var $form = $(this);

    // Vamos selecionar e armazenar em cache todos os campos
    var $inputs = $form.find("input, select, button, textarea, prompt, alert");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Vamos desativar as entradas para a duração do pedido Ajax.
    // Nota: desabilitamos os elementos APÓS os dados do formulário terem sido serializados.
    // Os elementos de formulário desabilitados não serão serializados.
    $inputs.prop("disabled", true);

    //Desligue o pedido para /form.php
    request = $.ajax({
        url: 'URL_RAIZ . votos',
        type: "post",
        data: serializedData + eleitor
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});
*/
