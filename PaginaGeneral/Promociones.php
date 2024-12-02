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
    <link rel="stylesheet" href="Promociones.css">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con el google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&family=Protest+Guerrilla&display=swap" rel="stylesheet">
    <title>Promociones</title>
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
        include("../Include/header.php");
    ?>
    <div class="conteiner">
        <div class="contenedor1">
            <p id="Home"><a id="linkHome" href="home_Page.php">Principal</a> /Promociones</p>
            <h1 id="titulo">Nuestras Promociones</h1>
        </div>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid posicionar  mt-3 mb-3">
                <form id="agrandar" class="d-flex" role="search" method="get" action="Promociones.php">
                    <input class="form-control me-2" type="search" placeholder="Buscar por nombre o código del local" aria-label="Buscar" name="buscarTermino">
                    <button id="espaciar" class="btn btn-outline-primary" type="submit">Buscar</button>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filtrar por categoría
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?categoria=premium">Premium</a></li>
                            <li><a class="dropdown-item" href="?categoria=medium">Medium</a></li>
                            <li><a class="dropdown-item" href="?categoria=inicial">Inicial</a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    <div class="contenedorEspecial">
        <div class="conteiner numero2"> 
            <div class="row">
                <!-- Abrir base de datos -->
                <?php
                    include("../BasesDeDatos/UnicaBaseDeDatos.php");

                    date_default_timezone_set('America/Argentina/Buenos_Aires');
                    $dia_actual = date('w');

                    $buscarTermino = isset($_GET['buscarTermino']) ? $_GET['buscarTermino'] : '';
                    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
                    
                    $sql = "SELECT promociones.id, promociones.nombre, promociones.descripcion, promociones.categoriaMin, locales.nombre AS local_nombre FROM promociones 
                            JOIN locales ON promociones.codLocal = locales.id WHERE
                            SUBSTRING(diasValidos, $dia_actual + 1, 1) = '1' AND
                            fechaDesde <= CURDATE() AND fechaHasta >= CURDATE() AND promociones.estadoPromo = 'aprobada'
                            AND locales.estado = 1
                            ";
                    
                    // Agregar condición de búsqueda si se ha ingresado un término
                    if (!empty($buscarTermino)) {
                        $buscarTermino = $conn->real_escape_string($buscarTermino);
                        $sql .= " AND (locales.nombre LIKE '%$buscarTermino%' OR promociones.nombre LIKE '%$buscarTermino%')";
                    }
                    if(!empty($categoria)){
                        $sql .= " AND promociones.categoriaMin = '$categoria'";
                    }
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            
                            echo '
                        <div class="col-12 col-sm-6 col-md-3 mt-2 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                <h5 class="card-title">' . $row["nombre"] . '</h5>
                                <strong><i>'. $row['categoriaMin'] . '</i></strong>
                                <p class="card-text">' . $row["descripcion"] . '</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-body-secondary">
                                        <b> De: ' . $row["local_nombre"] .'</b>
                                        <form action="../Logeo/Iniciar_sesion.php" method="get">
                                            <button class="botonPromo" aria-label="Inspeccionar promoción"><i class="fas fa-arrow-right iconoPromo"></i></button>
                                        </form>
                                    </small>
                                </div>
                            </div>
                        </div>
                            ';
                        } 
                    } else { 
                        echo "No hay promociones disponibles.";
                        } 
                    $conn->close();
                    ?>
            </div>
        </div>
    </div>
    <?php 
        include("../Include/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>