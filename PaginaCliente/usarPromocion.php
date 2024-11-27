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
        include("headerClientes.php");
    ?>
    
    <div class="conteiner">
        <div class="contenedor1 pb-3">
            <p id="Home"><a id="linkHome" href="home_Page.php">Principal</a> / <a id="linkHome" href="Promociones.php">Promociones</a> / Solicitud de Promoción</p>
            <h1 id="titulo">Solicitud de Promoción</h1>
            
            <?php
                // Obtener el ID del cliente
                $cliente_cod = '3'; // Ejemplo!

                $promocion_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

                if ($promocion_id > 0) {

                    //<!-- Abrir base de datos -->
                    include("../BasesDeDatos/BaseDeDatos_Locales.php");

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>