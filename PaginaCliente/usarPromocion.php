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
    <title>Usar Promoción</title>
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
        <div class="contenedor1 pb-3">
            <p id="Home"><a id="linkHome" href="home_Page.php">Principal</a> / <a id="linkHome" href="Promociones.php">Promociones</a> / Solicitud de Promoción</p>
            <h1 id="titulo">Solicitud de Promoción</h1>
            
            <?php
                // Obtener el ID del cliente
                //$cliente_cod = '3'; // Ejemplo!
                $cliente_cod = $_SESSION['cod'];

                $promocion_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

                if ($promocion_id > 0) {

                    //<!-- Abrir base de datos -->
                    include("../BasesDeDatos/UnicaBaseDeDatos.php");

                    $sql= "SELECT nombre FROM promociones WHERE id=$promocion_id";
                    $res = $conn->query($sql);
                    $prom = $res->fetch_assoc();

                    echo '<h5> Has solicitado la promoción "'. $prom['nombre'] .'"<br></h5>';


                    $sql = "SELECT fechaUso, estado FROM usopromociones WHERE codCliente = $cliente_cod AND codPromo = $promocion_id";
                    $res = $conn->query($sql);

                    echo '<div class="ms-3">';
                    if($res->num_rows < 1){
                        $estado_inicial  = "enviada";
                        
                        $sql = "INSERT INTO usopromociones (codCliente, codPromo, estado) VALUES ($cliente_cod, $promocion_id, '$estado_inicial')";
                        if($conn->query($sql)){
                            echo '<i> Solicitud de promoción realizada con éxito.<br>
                                Estado: ' . $estado_inicial . '</i>';
                        }else{ 
                            echo "<i>Error al realizar la solicitud</i>";
                        }
                    }else{
                        $uso = $res->fetch_assoc();


                        echo '<i>   Solicitada el '. $uso['fechaUso'] .'<br>
                                Estado: '. $uso['estado'] .'</i>';
                    }
                    echo '</div>';

                } else {
                    echo "Id de promoción no válido.";
                }

                $conn->close();
            ?>
            <div class="col-12 text-center mt-4">
                <form action="Promociones.php" method="get">
                    <button class="btn btn-primary">
                        Seguir viendo promociones
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php 
        include("../Include/footer.php");
    ?>
</body>
</html>