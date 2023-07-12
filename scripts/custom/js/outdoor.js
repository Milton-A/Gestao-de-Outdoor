$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "controllers/OutdoorController.php",
        success: function (response) {
            // Atualiza o conteúdo do elemento HTML com os municípios correspondentes
            $('#cardOutdoors').append(response);
        }
    });
    
    $(document).on('click', '#listarDados #ativar', function () {
        var idItem = document.getElementById('idItem').value;
        var precoItem = document.getElementById('precoItem').value;
        var dataInicio = document.getElementById('dataInicio').value;
        var dataFim = document.getElementById('dataFim').value;
        var cardData = {
            idItem: idItem,
            precoItem: precoItem,
            dataInicio: dataInicio,
            dataFim: dataFim
        };
        // Armazene o objeto em um array
        var listaItens = JSON.parse(localStorage.getItem('listaItens')) || [];
        listaItens.push(cardData);

        // Armazene o array atualizado no armazenamento local
        localStorage.setItem('listaItens', JSON.stringify(listaItens));

        console.log("TESSSSSSSTE");
    });
});
