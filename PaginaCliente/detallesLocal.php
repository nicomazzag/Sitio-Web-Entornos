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
    <title>Detalles de Local</title>
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
        if (!defined('NO_HEADER')) {
            include "headerClientes.php";
        }


        include("../BasesDeDatos/UnicaBaseDeDatos.php");

    // Obtener el id del local desde la URL
    $local_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($local_id > 0) {
        // Consultar los detalles del local
        $sql = "SELECT nombre, descripcion, imagen_url, rubroLocal, ubicacionLocal FROM locales WHERE id = " . $local_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $local = $result->fetch_assoc();
            echo 
                '<div class="container mt-3">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <img src="' . $local['imagen_url'] . '" alt="Logo del local ' . $local['nombre'] .'" class="img-fluid">
                        </div>
                        <div class="col-md-8 mb-3">
                            <h1>' . $local['nombre'] .'</h1>
                            <i> Categoria: ' . $local['rubroLocal'] . '<br>
                                Ubicacion: ' . $local['ubicacionLocal'] . '</i><br><br>
                            <p>' . $local['descripcion'] .'</p>                            
                            <div class = "ms-2">
                                <form action="PrincipalCliente.php#locales" method="get">
                                    <button class="btn btn-primary">
                                        Volver
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container mb-3">
                <div class="row">';
                
                    $cliente_cod = $_SESSION['cod'];

                    $sql = "SELECT tipoCliente FROM registracion WHERE codigo = $cliente_cod"; //tendremos q conectar a la otra base de datos
                    $res = $conn->query($sql);
                    $arr = $res->fetch_assoc();
                    $categoria_cliente = $arr['tipoCliente'];

                    $dia_actual = date('w');
                    $sql = "SELECT promociones.id, promociones.nombre, promociones.descripcion, promociones.categoriaMin, locales.nombre AS local_nombre FROM promociones 
                    JOIN locales ON promociones.codLocal = locales.id WHERE (promociones.categoriaMin = '$categoria_cliente' OR promociones.categoriaMin = 'inicial'
                    OR (promociones.categoriaMin = 'medium' AND '$categoria_cliente' != 'inicial')
                    OR (promociones.categoriaMin = 'premium' AND '$categoria_cliente' = 'premium')) 
                    AND SUBSTRING(diasValidos, $dia_actual + 1, 1) = '1' AND
                    fechaDesde <= CURDATE() AND fechaHasta >= CURDATE() AND locales.id = $local_id";

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
                        echo "No hay promociones disponibles para este local.";
                        } ;
                echo '  </div>
                    </div>';
                
        } else {
            echo "Local no encontrado.";
        }

    } else {
        echo "ID de local no válido.";
    }

    $conn->close();
    ?>
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
            include("../Include/footer.php");
        ?>
</body>
</html>
