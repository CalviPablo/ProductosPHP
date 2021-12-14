<?php
$activo1 = 'style="color:orange;"';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ZonaGamer_Inicio</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link hASDASDref="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b1a4787b70.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top bg-negro">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="img/logos/logo-zonagamer.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" <?php echo $activo1 ?> href="index.php?pagina=inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paginas/productos.php?pagina=productos">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paginas/contacto.php?pagina=contacto">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>