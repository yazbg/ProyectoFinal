<?php
session_start();
require "../components/database.php";

if (isset($_SESSION['userName'])) {

    header('Location: ./main.php');

}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['password'])) {

    $records = $conn->prepare('SELECT * FROM usuario WHERE correo = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if (is_array($results) && count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        $_SESSION['userName'] = $results['usuario'];
        $_SESSION['email'] = $results['correo'];

    } else {
        $messageError = 'Sorry, those credentials do not match';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/globals.css">
    <link rel="stylesheet" href="../css/globalsColors.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>


    <section class="cont flex-Cen">

        <form method="post" class="contLogin flex-Col gap-MC">
            <h1 class="fontSize-MG">Login</h1>
            <h1 class="fontSize-MC">Correo</h1>
            <input name="email" class="input" type="text">
            <h1 class="fontSize-MC">Contraseña</h1>
            <input name="password" class="input" type="password">
            <input class="btn" type="submit" value="Login">
            <p class="fontSize-C">¿no tienes una <a href="../php/register.php">cuenta</a>?</p>
        </form>

    </section>

</body>

</html>