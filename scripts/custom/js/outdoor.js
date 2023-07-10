$(document).ready(function() {
  $.ajax({
    type: "POST",
    url: "controllers/OutdoorController.php",
    success: function(response) {
      // Atualiza o conteúdo do elemento HTML com os municípios correspondentes
      $('#cardOutdoors').append(response);
    }
  });
});
