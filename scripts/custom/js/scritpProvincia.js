$(document).ready(function () {
    $('#Provincia').change(function () {
        var selectedOption = $(this).val(); // Obtém o valor selecionado
        $.ajax({
            type: "GET",
            url: "../../controllers/MunicipioController.php",
            data: {id: selectedOption},
            success: function (response) {
                // Atualiza o conteúdo do elemento HTML com os municípios correspondentes
                $('#Municipio').html(response);
            }
        });
    });
});

$(document).ready(function () {
    $('#Municipio').change(function () {
        var selectedOption = $(this).val(); // Obtém o valor selecionado
        $.ajax({
            type: "GET",
            url: "../../controllers/ComunaController.php",
            data: {id: selectedOption},
            success: function (response) {
                // Atualiza o conteúdo do elemento HTML com os municípios correspondentes
                $('#Comuna').html(response);
            }
        });
    });
});