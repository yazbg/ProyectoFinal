<?php 
session_start();
require "../components/database.php";

$userName = $_SESSION["userName"];

// Consulta SQL para contar el número de trabajos del usuario
$sql = "SELECT COUNT(*) AS numTrabajos FROM trabajos WHERE usuario = :userName";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userName', $userName);
$stmt->execute();

// Obtener el resultado
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

// Mostrar el número de trabajos del usuario
$numTrabajos = $resultado['numTrabajos'];

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
    <link rel="stylesheet" href="../css/profile.css">

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

            <div class="contProfile flex-Cen gap-G">
                
                <div class="profileL">
                    <img class="svgIconWork" src="../svg/profileWork.svg" alt="">
                    <h1><?php echo $_SESSION['userName']; ?></h1>
                </div>
                <div class="profileR">

                    <h1><?php echo $_SESSION['email']; ?></h1>    
                    <h1>numero de Trabajos: <?php echo $numTrabajos; ?></h1>            
                    
                </div>                
            </div>







        </section>

    </section>

    <script src="../js/svgs.js"></script>

</body>

</html>