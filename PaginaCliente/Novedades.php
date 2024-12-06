<?php
  include("../Include/Sesion.php");
  include('../BasesDeDatos/UnicaBaseDeDatos.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../Include/librerias.php");?>
    <!-- Conexion con hojas de estilo -->
    <link rel="stylesheet" href="Novedades.css">
    <title>Novedades</title>
    <style>
        /*Hoja de estilo del footer(En caso de usar el footer en otras paginas (agregar los estilos en la hoja de estilos correspondiente)*/
        .text-white a {
            color: white !important;
        }
        @media (max-width: 767px) {
            .sacar_borde_derecho {
                border-right: 1px solid white;
            }
            .sacar_borde_superior {
                border-top: 1px solid white;
            }
        }
    </style>
</head>
<body>
    <?php 
        include("headerClientes.php");
    ?>
    <div class="contenedor1">
        <p id="Home"><a id="linkHome" href="PrincipalCliente.php">Principal</a> /Novedades</p>
        <h1 id="titulo">Novedades</h1>
    </div>
    <div class="conteiner contenedor2">
        <div class="row">
        <?php //El while dentro del div row para que no se cree 1 columna nueva por cada iteración del mismo
            $tipoCliente = "";
            $consultaBase = "SELECT * FROM novedades WHERE estado = true";
            if ($_SESSION['categoria'] == 'inicial') {
                $tipoCliente = "tipoCliente = 'inicial'";
            } elseif ($_SESSION['categoria'] == 'medium') {
                $tipoCliente = "(tipoCliente = 'inicial' OR tipoCliente = 'medium')";
            } elseif ($_SESSION['categoria'] == 'premium') {
                $tipoCliente = "(tipoCliente = 'inicial' OR tipoCliente = 'medium' OR tipoCliente = 'premium')";
            }

            $consulta = $consultaBase . " AND " . $tipoCliente;
            $resultado = mysqli_query($conn, $consulta);

            while ($fila = mysqli_fetch_assoc($resultado)) {
                $fechaHasta = new DateTime($fila['fechaHasta']);
                $fechaActual = new DateTime();
                $intervalo = $fechaHasta->diff($fechaActual);
                $tiempoRestante = $intervalo->days;
        ?> 
            <div class="col-12 col-md-6">
                <div class="tarjeta">
                    <h3 class="subTitulo"><?php echo htmlspecialchars($fila['texto']); ?></h3>
                    <div class="contenedorEnunciado">
                        <p class="inicioEnunciado">Estreno:&nbsp;</p><p class="valorEnunciado"><?php echo htmlspecialchars($fila['fechaDesde']); ?></p>
                    </div>
                    <div class="contenedorEnunciado">
                        <p class="inicioEnunciado">Finalización:&nbsp;</p><p class="valorEnunciado"><?php echo htmlspecialchars($fila['fechaHasta']); ?></p>
                    </div>
                    <div class="contenedorEnunciado">
                        <p class="inicioEnunciado">Duración restante:&nbsp;</p><p class="valorEnunciado"><?php echo htmlspecialchars($tiempoRestante); ?>&nbsp;días</p>
                    </div>
                </div>
            </div>
        <?php
            }; //Cerrando while
            if (mysqli_num_rows($resultado) == 0) {
                echo "<div  style=' font-size: 1.5em;  width:100%; '> No hay nuevas novedades </div>";
            }
        ?>
        </div>
    </div>
    <?php 
    include("../Include/footer.php");
    ?>
</body>
</html>
<?php mysqli_close($conn);?>