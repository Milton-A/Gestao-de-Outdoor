$(document).ready(function () {
    $(document).on('click', '#listarDados #aprovar', function () {
        var idAluguer = $(this).closest('tr').find('td:first').text();
        $.ajax({
            url: 'controllers/SolicitarAluguerController.php',
            type: 'POST',
            data: {
                action: 'aprovar',
                idAluguer: idAluguer,
            },
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    $(document).on('click', '#listarDados #reprovar', function () {
        var idAluguer = $(this).closest('tr').find('td:first').text();
        $.ajax({
            url: 'controllers/SolicitarAluguerController.php',
            type: 'POST',
            data: {
                action: 'reprovar',
                idAluguer: idAluguer,
            },
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
});