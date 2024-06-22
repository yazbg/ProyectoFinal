<?php
session_start();
require "../components/dataBase.php";

$alertaPass = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST["user"]) || isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["confirmPass"]))) {

    if ($_POST["pass"] != $_POST["confirmPass"]) {
        $alertaPass = "<p class='alert'>Ingrese un valor valido</p>";
    }

    $userName = $_POST["user"];
    $email = $_POST["email"];
    $passwordSession = $_POST["pass"];

    $_SESSION["userName"] = $userName;
    $_SESSION["email"] = $email;  

    $sql = "INSERT INTO usuario (usuario,correo, password) VALUES (:user,:email,:password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $password = password_hash($passwordSession, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':user', $userName);    

    if ($stmt->execute()) {
        echo 'Successfully created new user';
    } else {
        echo 'Sorry there must have been an issue creating your account';
    }
    
    session_destroy();    

    header("Location: ./login.php");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/globals.css">
    <link rel="stylesheet" href="../css/globalsColors.css">
    <link rel="stylesheet" href="../css/register.css">
</head>

<body>


    <form method="post" class="contRegister cont">

        <div class="cont itemRegister flex-Col gap-MG">
            <div class="glass flex-Col  gap-MG">
                <p class="alert">Ingrese un valor valido</p>
                <h1 class="fontSize-M">Usuario</h1>
                <input name="user" class="input" type="text">                
                <div class="btn">Siguiente</div>
            </div>
        </div>

        <div class="cont itemRegister flex-Col gap-MG">
            <div class="glass flex-Col  gap-MG">
                <p class="alert">Ingrese un valor valido</p>
                <h1 class="fontSize-M">Correo</h1>
                <input name="email" class="input" type="email">
                <div class="btn">Siguiente</div>
            </div>
        </div>

        <div class="cont itemRegister flex-Col gap-MG">
            <div class="glass flex-Col  gap-MG">
                <p class="alert">Ingrese un valor valido</p>
                <h1 class="fontSize-M">Contraseña</h1>
                <input name="pass" class="input" type="password">
                <div class="btn">Siguiente</div>
            </div>
        </div>

        <div class="cont itemRegister flex-Col gap-MG">
            <div class="glass flex-Col  gap-MG">
                <p class="alert">Ingrese un valor valido</p>
                <h1 class="fontSize-M">Confirmar Contraseña</h1>
                <input name="confirmPass" class="input" type="password">
                <input class="btn" type="submit" value="Registrar">
            </div>
        </div>

    </form>

    <script src="../js/register.js"></script>

</body>

</html>