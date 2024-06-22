<?php


session_start();
require "../components/dataBase.php";

$conex = mysqli_connect("localhost:3306", "root", "", "tam");

// Obtén el ID del trabajo desde la URL
$idTrabajo = $_GET['id'];

// Consulta para obtener detalles del trabajo específico
$consultaDetalles = "SELECT * FROM trabajos WHERE id = $idTrabajo";
$resultDetalles = mysqli_query($conex, $consultaDetalles);
$nombreReceptor = "";

if ($resultDetalles && $rowDetalles = mysqli_fetch_array($resultDetalles)) {

    $nombreReceptor = $rowDetalles["usuario"];

} else {
    echo "Trabajo no encontrado";
}

mysqli_close($conex);




if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["nameWorker"]) && !empty($_POST["numberWorker"]) && !empty($_POST["descWorker"])) {

    $userName = $_SESSION["userName"];

    $sql = "INSERT INTO mensajes (emisor,receptor,mensaje,numero,fecha,id_trabajo,trabajo) VALUES (:emisor,:receptor, :mensaje,:numero,:fecha,:trabajo,:nombre)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':emisor', $userName);
    $stmt->bindParam(':receptor', $nombreReceptor);
    $stmt->bindParam(':mensaje', $_POST['descWorker']);
    $stmt->bindParam(':numero', $_POST['numberWorker']);
    $stmt->bindParam(':nombre', $_POST['nameWorker']);
    $fechaActual = date("Y-m-d H:i:s");
    $stmt->bindParam(':fecha', $fechaActual);
    $stmt->bindParam(':trabajo', $idTrabajo);



    if ($stmt->execute()) {
        header('Location: ./main.php');
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
                <h1 class="fontSize-M">Solicitud de trabajo</h1>

                <h1 class="fontSize-MC">nombre completo</h1>
                <input name="nameWorker" class="input" type="text">

                <h1 class="fontSize-MC">numero de celular</h1>
                <input name="numberWorker" class="input" type="text">

                <h1 class="fontSize-MC">Danos una descripcion tuya</h1>
                <textarea name="descWorker" class="textArea" cols="30" rows="10"></textarea>

                <input class="btn" type="submit" value="Subir">
            </form>
        </section>

    </section>



</body>

</html>