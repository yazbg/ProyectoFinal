<?php

session_start();
$keywords = "";

if (!(isset($_SESSION['userName']))) {

    header('Location: ../index.php');

}


if (isset($_POST['search'])) {

    $keywords = $_POST['keywords'];

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
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>

    <section class="cont">

        <section class="contMenuT flex-Cen">

            <div class="menuL flex-Cen fontSize-M">
                <h1>TAM</h1>
            </div>

            <div class="menuC flex-Cen">
                <input id="search" type="text" class="search">
                <button class="btnSearch" onclick="buscar()"><img class="searchSvg" src="../svg/search.svg"></img></button>
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

            <div class="contItems">
                <?php
                $conex = mysqli_connect("localhost:3306", "root", "", "tam");

                $consulta = 'SELECT * FROM trabajos';
                $result = mysqli_query($conex, $consulta);

                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="trabajoItem flex-Cen">
                            <div class="itemL flex-Col">
                                <img class="svgIconWork" src="../svg/profileWork.svg" alt="">
                                <h1>
                                    <?php echo $row['usuario'] ?>
                                </h1>
                            </div>
                            <div class="itemR flex-Col">

                                <h1 class="fontSize-M">
                                    <?php echo $row['nombre'] ?>
                                </h1>
                                <p class="fontSize-MC">$
                                    <?php echo $row['monto'] ?>
                                </p>
                                <div class="contTxtWork gap-C">
                                    <p>
                                        <?php echo $row['descr'] ?>
                                    </p>
                                </div>


                                <button class="btn" onclick="verMas(<?php echo $row['id']; ?>)"> Ver Más </button>


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
        const keywords = document.getElementById("search");

        function verMas(idTrabajo) {
            window.location.href = 'detallesTrabajo.php?id=' + idTrabajo;
        }

        function buscar() {
            window.location.href = 'busqueda.php?keywords=' + keywords.value;
        }
    </script>

</body>

</html>