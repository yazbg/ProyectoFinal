<?php
session_start();
$conex = mysqli_connect("localhost:3306", "root", "", "tam");

// Obtén el ID del trabajo desde la URL
$idTrabajo = $_GET['id'];

// Consulta para obtener detalles del trabajo específico
$consultaDetalles = "SELECT * FROM mensajes WHERE id_mensaje = $idTrabajo";
$resultDetalles = mysqli_query($conex, $consultaDetalles);
$nombreEmisor = "";
$mensaje = "";
$numero = "";
$trabajo = "";
$nombreCompleto = "";


if ($resultDetalles && $rowDetalles = mysqli_fetch_array($resultDetalles)) {

    $nombreEmisor = $rowDetalles["emisor"];
    $mensaje = $rowDetalles["mensaje"];
    $numero = $rowDetalles["numero"];
    $trabajo = $rowDetalles["id_trabajo"];
    $nombreCompleto = $rowDetalles["trabajo"];

} else {
    echo "Trabajo no encontrado";
}
mysqli_close($conex);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST["contratar"]) || isset($_POST["descartar"]))) {




    if (isset($_POST["contratar"])) {
        $conex = mysqli_connect("localhost:3306", "root", "", "tam");
        $consultaEliminar = "DELETE FROM trabajos WHERE id = $trabajo";
        $resultEliminar = mysqli_query($conex, $consultaEliminar);
        mysqli_close($conex);
        $conex = mysqli_connect("localhost:3306", "root", "", "tam");
        $consultaEliminar = "DELETE FROM mensajes WHERE id_mensaje = $idTrabajo";
        $resultEliminar = mysqli_query($conex, $consultaEliminar);
        mysqli_close($conex);
        header("Location:  ./mensajes.php");
    }

    if (isset($_POST['descartar'])) {
        $conex = mysqli_connect("localhost:3306", "root", "", "tam");
        $consultaEliminar = "DELETE FROM mensajes WHERE id_mensaje = $idTrabajo";
        $resultEliminar = mysqli_query($conex, $consultaEliminar);
        mysqli_close($conex);
        header("Location:  ./mensajes.php");

    }



}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="../css/globals.css">
    <link rel="stylesheet" href="../css/globalsColors.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/detalles.css">
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

            <form method="post" class="contDetalles flex-Col">
                <div class="detallesT flex-Cen">
                    <div class="detallesL flex-Col">
                        <img class="svgIconDetalles" src="../svg/profileWork.svg" alt="">
                        <h1 class="fontSize-M">
                            <?php echo $nombreEmisor ?>
                        </h1>
                    </div>
                    <div class="detallesR flex-Col">
                        <h1 class="fontSize-M">Celular:
                            <?php echo $numero ?>
                        </h1>
                        <h1>
                            <?php echo $nombreCompleto ?>
                        </h1>
                    </div>

                </div>
                <div class="detallesB flex-Col gap-G">

                    <p>
                        <?php echo $mensaje ?>
                    </p>

                    <div class="contBtnMensajes flex-Cen gap-G">
                        <button name="contratar" class="btn">Contratar</button>
                        <button name="descartar" class="btn">Declinar</button>
                    </div>
                </div>


            </form>

        </section>

    </section>
</body>

</html>