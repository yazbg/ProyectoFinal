<?php
session_start();
require "../components/database.php";

$idToUpdate = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["nameWork"]) && !empty($_POST["priceWork"]) && !empty($_POST["descWork"])) {

    $userName = $_SESSION["userName"];

    $sql = "UPDATE trabajos SET monto = :price, descr = :descWork, nombre = :nameWork WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nameWork', $_POST['nameWork']);
    $stmt->bindParam(':price', $_POST['priceWork']);
    $stmt->bindParam(':descWork', $_POST['descWork']);
    $stmt->bindParam(':id', $idToUpdate);


    if ($stmt->execute()) {
        header('Location: ./misTrabajos.php');
    } else {
        echo 'Sorry there must have been an issue creating your account';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nuevo</title>
    <link rel="stylesheet" href="../css/globals.css">
    <link rel="stylesheet" href="../css/globalsColors.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/nuevoTrabajo.css">
</head>

<body>

    <section class="cont">

        <section class="contMenuT flex-Cen">

            <div class="menuL flex-Cen fontSize-M">
                <h1>TAM</h1>
            </div>

            <div class="menuC flex-Cen">
                <input type="text" class="search">
                <img class="searchSvg" src="../svg/search.svg"></img>
            </div>

            <div class="menuR flex-Cen">
                <a href="./logout.php">

                    <img class="logoutSvh" src="../svg/logout.svg" alt="">

                </a>
            </div>

        </section>
        <section class="contMenuL flex-Cen">
            <ul class="flex-Col">
                <li class="flex-Cen">
                    <a href="./profile.php" class="MenuLA flex-Cen fontSize-MC gap-C">
                        <img class="svgIcon-C" src="../svg/profile.svg" alt="">
                        Perfil
                    </a>
                </li>
                <li class="flex-Cen">
                    <a href="./misTrabajos.php" class="MenuLA flex-Cen fontSize-MC gap-C">
                        <img class="svgIcon-C" src="../svg/work.svg" alt="">
                        Trabajos

                    </a>
                </li>
                <li class="flex-Cen">
                    <a href="./crearTrabajo.php" class="MenuLA flex-Cen fontSize-MC gap-C">
                        <img class="svgIcon-C" src="../svg/newWork.svg" alt="">
                        nuevo Trabajo
                    </a>
                </li>
                <li class="flex-Cen">
                    <a href="./main.php" class="MenuLA flex-Cen fontSize-MC gap-C">
                        <img class="svgIcon-C" src="../svg/explore.svg" alt="">
                        Explorar
                    </a>
                </li>
                <li class="flex-Cen">
                    <a href="./mensajes.php" class="MenuLA flex-Cen fontSize-MC gap-C">
                        <img class="svgIcon-C" src="../svg/mensajes.svg" alt="">
                        Mensajes
                    </a>
                </li>
            </ul>
        </section>

        <section class="contPage flex-Cen gap-C">

            <form method="post" class="contForm flex-Col">
                <h1 class="fontSize-M">Editar Trabajo</h1>
                <h1 class="fontSize-MC">Titulo del trabajo</h1>
                <input name="nameWork" class="input" type="text">
                <h1 class="fontSize-MC">Pago por el trabajo</h1>
                <input name="priceWork" class="input" type="text">
                <h1 class="fontSize-MC">Descripción del trabajo</h1>
                <textarea name="descWork" class="textArea" cols="30" rows="10"></textarea>
                <input class="btn" type="submit" value="Subir">



            </form>
        </section>

    </section>

    <script src="../js/svgs.js"></script>

</body>

</html>