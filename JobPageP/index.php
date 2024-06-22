<?php

session_start();

if(isset($_SESSION["userName"])){
    header('Location: ./php/main.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
    header('Location: ./php/register.php');
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajo a la medida</title>
    <link rel="stylesheet" href="./css/globals.css">
    <link rel="stylesheet" href="./css/globalsColors.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <form method="post" class="cont flex-Col gap-C">

        <h1 class="fontDark fontSize-G">Trabajo a la medida</h1>
        <h2 class="fontSize-MC">Donde todos cuenta por igual</h2>
        <input class="btn" type="submit" value="Comenzar">
        <p class="fontSize-C">¿Ya tienes una <a href="./php/login.php">cuenta</a>?</p>

    </form>


</body>

</html>