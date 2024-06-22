<?php
$conex = mysqli_connect("localhost:3306", "root", "", "tam");

// Obtén el ID del trabajo desde la URL
$idTrabajo = $_GET['id'];

// Consulta para obtener detalles del trabajo específico
$consultaDetalles = "SELECT * FROM trabajos WHERE id = $idTrabajo";
$resultDetalles = mysqli_query($conex, $consultaDetalles);
$nombreTrabajo = "";
$descTrabajo = "";
$precioTrabajo = "";
$nombreEmpleador = "";

if ($resultDetalles && $rowDetalles = mysqli_fetch_array($resultDetalles)) {

    $nombreTrabajo = $rowDetalles["nombre"];
    $descTrabajo = $rowDetalles["descr"];
    $precioTrabajo = $rowDetalles["monto"];
    $nombreEmpleador = $rowDetalles["usuario"];

} else {
    echo "Trabajo no encontrado";
}

mysqli_close($conex);
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

            <div class="contDetalles flex-Col">
                <div class="detallesT flex-Cen">
                    <div class="detallesL flex-Col">
                        <img class="svgIconDetalles" src="../svg/profileWork.svg" alt="">
                        <h1 class="fontSize-MC">
                            <?php echo $nombreEmpleador ?>
                        </h1>
                    </div>
                    <div class="detallesR flex-Col">
                        <h1 class="fontSize-M">
                            <?php echo $nombreTrabajo ?>
                        </h1>
                        <h1>
                            <?php echo $precioTrabajo ?>
                        </h1>
                    </div>

                </div>
                <div class="detallesB flex-Col gap-G">

                    <p>
                        <?php echo $descTrabajo ?>
                    </p>

                    <button class="btn" onclick="verMas(<?php echo $idTrabajo ?>)">Solicitar</button>
                </div>


            </div>

        </section>

    </section>

    <script>
        function verMas(idTrabajo) {

            window.location.href = 'solicitarTrabajo.php?id=' + idTrabajo;

        }

    </script>
</body>

</html>