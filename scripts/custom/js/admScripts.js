$(document).ready(function () {
    $(document).on('click', '#listarDados #ativar', function () {
        var idCliente = $(this).closest('tr').find('td:first').text();
        $.ajax({
            url: 'controllers/clienteController.php',
            type: 'POST',
            data: {
                action: 'ativarcliente',
                idCliente: idCliente
            },
            success: function (response) {
                location.reload();
            }
        });
    });
    $(document).on('click', '#listarDados #bloquear', function () {
        var idCliente = $(this).closest('tr').find('td:first').text();
        $.ajax({
            url: 'controllers/clienteController.php',
            type: 'POST',
            data: {
                action: 'bloquear',
                idCliente: idCliente
            },
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    $(document).on('click', '#listarDados #desbloquear', function () {
        var idCliente = $(this).closest('tr').find('td:first').text();

        $.ajax({
            url: 'controllers/clienteController.php',
            type: 'POST',
            data: {
                action: 'desbloquear',
                idCliente: idCliente
            },
            success: function (response) {
                location.reload();
            }
        });
    });

    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "controllers/clienteController.php",
            success: function (response) {
                // Atualiza o conteúdo do elemento HTML com os municípios correspondentes
                $('#listarDados').append(response);
            }
        });
    });
    
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "controllers/gestorController.php",
            success: function (response) {
                // Atualiza o conteúdo do elemento HTML com os municípios correspondentes
                $('#listarDados').append(response);
            }
        });
    });
});