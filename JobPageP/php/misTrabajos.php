<?php

session_start();




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
    <link rel="stylesheet" href="../css/misTrabajos.css">
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
                <img class="logoutSvh" src="../svg/logout.svg" alt="">
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

                $consulta = "SELECT * FROM trabajos WHERE usuario ='{$_SESSION["userName"]}'";
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
                            <div class="itemR flex-Col gap-C">

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

                                <div class="contBtn flex-Cen gap-G">
                                    <input onclick="mostrar()" class="btn delete" type="submit" value="eliminar">
                                    <input onclick="editar(<?php echo $row['id'] ?>)" class="btn" type="submit" value="editar">
                                </div>



                            </div>

                        </div>

                        <div id="alerta" class="cont flex-Cen alertaEliminar flex-Cen hidden">

                            <div class="contAlerta flex-Col gap-G">
                                <h1>Estas seguro que deseas eliminar el trabajo?</h1>
                                <input onclick="borrar(<?php echo $row['id'] ?>)" name="btnElminar" id="finEliminar" class="btn"
                                    type="submit" value="eliminar">
                            </div>

                        </div>

                        <?php

                    }
                }
                ?>




            </div>




        </section>

    </section>



    <script src="../js/eliminar.js"></script>

</body>

</html>