<?php 
    include("../Include/Sesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../Include/librerias.php");?>
    <!-- Conexion con hojas de estilo -->
    <link rel="stylesheet" href="Promociones.css">
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
        include("headerClientes.php");
    ?>
    <div class="conteiner">
        <div class="contenedor1">
            <p id="Home"><a id="linkHome" href="home_Page.php">Principal</a> / Promociones</p>
            <h1 id="titulo">Nuestras Promociones</h1>
        </div>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid posicionar  mt-3 mb-3">
            <form id="agrandar" class="d-flex" role="search" method="get" action="Promociones.php">
                    <input class="form-control me-2" type="search" placeholder="Buscar por nombre o código del local" aria-label="Buscar" name="buscarTermino">
                    <button id="espaciar" class="btn btn-outline-primary" type="submit" style="opacity: 1; color: #0248B1;">Buscar</button>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="opacity: 1; color: #0248B1;">
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
                    
                    // Obtener el ID del cliente y la categoría 

                    $cliente_cod = $_SESSION['cod'];
                    $buscarTermino = isset($_GET['buscarTermino']) ? $_GET['buscarTermino'] : '';
                    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
                    


                    $sql = "SELECT tipoCliente FROM registracion WHERE codigo = $cliente_cod";
                    $res = $conn->query($sql);
                    $arr = $res->fetch_assoc();
                    $categoria_cliente = $arr['tipoCliente'];                    

                    date_default_timezone_set('America/Argentina/Buenos_Aires');
                    $dia_actual = date('w');
                    $sql = "SELECT promociones.id, promociones.nombre, promociones.descripcion, promociones.categoriaMin, locales.nombre AS local_nombre FROM promociones 
                    JOIN locales ON promociones.codLocal = locales.id WHERE SUBSTRING(diasValidos, $dia_actual + 1, 1) = '1' AND
                    fechaDesde <= CURDATE() AND fechaHasta >= CURDATE() AND promociones.estadoPromo = 'aprobada' AND
                    (promociones.categoriaMin = '$categoria_cliente' OR promociones.categoriaMin = 'inicial'
                    OR (promociones.categoriaMin = 'medium' AND '$categoria_cliente' != 'inicial')
                    OR (promociones.categoriaMin = 'premium' AND '$categoria_cliente' = 'premium'))
                    AND locales.estado = 1";

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
                                            <button class="botonPromo" aria-label="Solicitar uso promoción" onclick="openModal(' . $row["id"] . ')">
                                                <i class="fas fa-arrow-right iconoPromo"></i>
                                            </button>
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
    <!-- Modal -->
    <div class="modal fade" id="promoModal" tabindex="-1" aria-labelledby="promoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="promoModalLabel">Usar Promoción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Quieres solicitar esta promocion?
                </div>
                <div class="modal-footer">
                    <form id="promoForm" action="usarPromocion.php" method="post">
                        <input type="hidden" name="id" id="promoId" value="">
                        <button type="submit" class="btn btn-success">Aceptar</button>
                    </form> 
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>    
    </div>

    <script>
        function openModal(id) {
            document.getElementById('promoId').value = id;
            var myModal = new bootstrap.Modal(document.getElementById('promoModal'), {});
            myModal.show();
        }
    </script>

    <?php 
        //$conn->close();
        include("../Include/footer.php");
    ?>
</body>
</html>