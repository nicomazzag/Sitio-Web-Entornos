<?php 
    include('../BasesDeDatos/BaseDeDatos_Novedades.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstiloParaTablas.css">
    <!-- Conexion con font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Para modificar las alertas y no usar el estilo predeterminado -->
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Crear locales</title>
</head>
<body>
    <?php 
        include("headerAdmin.php");
    ?>
    <div class="container">
        <h1 class="display-2">Creando Nueva Novedad</h1>
        <form id="crearNovedad" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <div class="row">
                <div class="form-group col-md-4 mt-2">
                    <label for="textoNov">Descripcion de la novedad</label>
                    <input class="form-control" type="text" id="textoNov" name="textoNovedad" placeholder="Ingrese el texto de la novedad">
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="fechaDesde">Ingrese la fecha de inicio</label>
                    <input class="form-control" type="date" id="fechaDesde" name="fechaDesdeNov">
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="fechaHastaNov">Ingrese la fecha de fin</label>
                    <input class="form-control" type="date" id="fechaHastaNov" name="fechaHastaNov">
                </div>
            </div>
            <div class="row">
                <div class="form-group col mt-4">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" 
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" 
                                aria-expanded="false" aria-controls="collapseOne">Dirigido a usuarios del tipo</button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form action="home_Page.php" method="post">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="Premium" name="tipoClienteP" value="Premium">
                                            <label class="form-check-label reducirCategorias" for="Premium">Cliente Premium</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="Medium"  name="tipoClienteM" value="Medium">
                                            <label class="form-check-label reducirCategorias" for="Medium">Cliente Medium</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="Inicial" name="tipoClienteI" value="Inicial">
                                            <label class="form-check-label reducirCategorias" for="Inicial">Cliente Inicial</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 espaciarBotones">
                <button form="crearNovedad" id="botonPlus" class="btn" type="submit" style="border: 1px solid gray; height: 38px">Crear Novedad</button>
                <div class="conteiner m-0">
                    <a href="NovedadesAdmin.php"> 
                        <i class="fas fa-arrow-left" style="font-size: 30px;" title="Volver"></i>
                    </a>
                </div>
            </div> 
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $textoNovedad = filter_input(INPUT_POST, 'textoNovedad', FILTER_SANITIZE_STRING);
        $fechaDesde = $_POST['fechaDesdeNov']; 
        $fechaHasta = $_POST['fechaHastaNov'];
        $tipoClienteP = isset($_POST['tipoClienteP']) ? filter_input(INPUT_POST, 'tipoClienteP', FILTER_SANITIZE_STRING) : null;
        $tipoClienteM = isset($_POST['tipoClienteM']) ? filter_input(INPUT_POST, 'tipoClienteM', FILTER_SANITIZE_STRING) : null;
        $tipoClienteI = isset($_POST['tipoClienteI']) ? filter_input(INPUT_POST, 'tipoClienteI', FILTER_SANITIZE_STRING) : null;

        if(empty($tipoClienteP) && empty($tipoClienteM) && empty($tipoClienteI)){
            echo "
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debe seleccionar al menos un tipo de cliente'
            });
            </script>";
        }
        elseif(empty($textoNovedad) || empty($fechaDesde) || empty($fechaHasta)){
            echo "
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debe completar todos los campos'
            });
            </script>";
        }
        else{
            if(isset($tipoClienteI)){
                $tipoCliente = "Premium Medium Inicial";
            }elseif(isset($tipoClienteM)){
                $tipoCliente = "Premium Medium";
            }elseif(isset($tipoClienteP)){
                $tipoCliente = "Premium";
            }
            $sql = "INSERT INTO novedades (texto, fechaDesde, fechaHasta, tipoCliente) VALUES ('$textoNovedad', '$fechaDesde', '$fechaHasta', '$tipoCliente')";
            if(mysqli_query($conn, $sql)){
                echo "
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Novedad creada correctamente'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'NovedadesAdmin.php';
                }
                });    
                </script>";
                mysqli_close($conn);
            }
            else{
                echo "
                <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: 'Hubo un problema al crear la novedad'
                    });
                </script>";
            }
        }
    }
?>
