<?php
  include("../Include/Sesion.php");
  include('../BasesDeDatos/UnicaBaseDeDatos.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Conexion con font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Conexion con hojas de estilo -->
    <link rel="stylesheet" href="Novedades.css">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con el google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&family=Protest+Guerrilla&display=swap" rel="stylesheet">
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
        <?php //El while dentro de el div row para que no se cree 1 columna nueva por cada iteración del while
            if($_SESSION['categoria'] == 'inicial'){
                $consulta = "SELECT * FROM novedades WHERE tipoCliente = 'Premium Medium Inicial'";
            }elseif($_SESSION['categoria'] == 'medium'){
                $consulta = "SELECT * FROM novedades WHERE tipoCliente = 'Premium Medium Inicial' OR tipoCliente = 'Premium Medium'";
            }elseif($_SESSION['categoria'] == 'premium'){
                $consulta = "SELECT * FROM novedades WHERE tipoCliente = 'Premium Medium Inicial' OR tipoCliente = 'Premium Medium' OR tipoCliente = 'Premium'";
            }
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
        ?>
        </div>
    </div>
    <?php 
    include("../Include/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php mysqli_close($conn);?>