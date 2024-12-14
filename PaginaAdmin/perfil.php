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
        <link rel="stylesheet" href="../PaginaGeneral/Promociones.css">
        <title>Perfil</title>
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
            include_once("headerAdmin.php");


            include("../BasesDeDatos/UnicaBaseDeDatos.php");
                    
            $cliente_cod = $_SESSION['cod'];

            $sql = "SELECT * FROM registracion WHERE codigo = $cliente_cod";
            $res = $conn->query($sql);
            $cli = $res->fetch_assoc();
            //$categoria_cliente = $arr['tipoCliente'];

            echo '
                <div class="container mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-4 mb-3 justify-content-center">
                            <img src="../Imagenes/perfil.png" alt="Imagen de perfil" class="img-fluid">
                        </div>
                        <div class="col-md-8 mb-3">
                            <h1>' . $cli['usuario'] .'</h1>
                            <i> Usuario Administrador </i><br>
                        </div>
                    </div>
                </div>'
                ;

        include("../Include/footer.php");

        ?>

                        
    </body>
</html>
