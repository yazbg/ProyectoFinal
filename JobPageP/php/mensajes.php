<?php
session_start();


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
    <link rel="stylesheet" href="../css/mensajes.css">
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

            <div class="contMensajes">
                <?php
                $conex = mysqli_connect("localhost:3306", "root", "", "tam");

                $consulta = "SELECT * FROM mensajes WHERE receptor = '{$_SESSION["userName"]}'";

                $result = mysqli_query($conex, $consulta);

                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>

                        <div class="mensajeItem flex-Cen">
                            <div class="mensajeL flex-Col">
                                <img class="svgIconMensaje" src="../svg/profileWork.svg" alt="">
                                <h1>
                                    <?php echo $row['emisor'] ?>
                                </h1>
                            </div>
                            <div class="mensajeR flex-Cen gap-G">
                                <h2>
                                    <?php echo $row['trabajo'] ?>
                                </h2>
                                <button class="btn" onclick="verMas(<?php echo $row['id_mensaje']; ?>)">ver Mas</button>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>

            </div>

        </section>

    </section>
    <script>
        function verMas(idTrabajo) {
            window.location.href = 'masInfoMensaje.php?id=' + idTrabajo;
        }
    </script>


</body>

</html>