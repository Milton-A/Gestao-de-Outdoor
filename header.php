
<?php
session_start();
// Verificar se o usuário está logado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Usuário logado
    $logado = true;
} else {
    // Usuário não logado
    $logado = false;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>XPTO Solutions</title>
        <link rel="stylesheet" href="content/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="content/css/style.css">
    </head>
    <body>