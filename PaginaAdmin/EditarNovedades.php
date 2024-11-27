<?php 
    include("../Include/Sesion.php");
    include('../BasesDeDatos/BaseDeDatos_Admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Conexion con hoja de estilo -->
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
        <?php
            $codigo = $_GET['editar'];
            $consulta = "SELECT * FROM novedades WHERE codigo = $codigo";
            $resultado = mysqli_query($conn, $consulta);
            $fila = mysqli_fetch_assoc($resultado);
        ?>
        <h1 class="display-2">Editando Novedad <?php echo $fila['codigo'] ?></h1>
        <form id="editarNovedad" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <div class="row">
                <div class="form-group col-md-4 mt-2">
                    <label for="textoNov">Descripcion de la novedad</label>
                    <input class="form-control" type="text" id="textoNov" name="textoNovedad" placeholder="Ingrese el texto de la novedad" value="<?php echo $fila['texto'] ?>">
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="fechaDesde">Ingrese la fecha de inicio</label>
                    <input class="form-control" type="date" id="fechaDesde" name="fechaDesdeNov" value="<?php echo $fila['fechaDesde'] ?>"> 
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="fechaHastaNov">Ingrese la fecha de fin</label>
                    <input class="form-control" type="date" id="fechaHastaNov" name="fechaHastaNov" value="<?php echo $fila['fechaHasta'] ?>">
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
                                            <input class="form-check-input" type="checkbox" role="switch" id="Premium" name="tipoClienteP" <?php if(strlen($fila['tipoCliente']) == 7) echo 'checked'?>>
                                            <label class="form-check-label reducirCategorias" for="Premium">Cliente Premium</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="Medium"  name="tipoClienteM" <?php if(strlen($fila['tipoCliente']) == 14) echo 'checked'?>>
                                            <label class="form-check-label reducirCategorias" for="Medium">Cliente Medium</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="Inicial" name="tipoClienteI" <?php if(strlen($fila['tipoCliente']) == 22) echo 'checked'?>>
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
                <button form="editarNovedad" id="botonLapiz" class="btn" type="submit" style="border: 1px solid gray;">Editar Local</button>
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


        if(!empty($textoNovedad) && $textoNovedad != $fila['texto'] ){
            $sql = "UPDATE novedades SET texto = '$textoNovedad' WHERE codigo = $codigo";
            mysqli_query($conn, $sql);
        }
        if(!empty($fechaDesde) && $fechaDesde != $fila['fechaDesde'] ){
            $sql = "UPDATE novedades SET fechaDesde = '$fechaDesde' WHERE codigo = $codigo";
            mysqli_query($conn, $sql);
        }
        if(!empty($fechaHasta) && $fechaHasta != $fila['fechaHasta'] ){
            $sql = "UPDATE novedades SET fechaHasta = '$fechaHasta' WHERE codigo = $codigo";
            mysqli_query($conn, $sql);
        }
        if(isset($tipoClienteI)){
            $tipoCliente = "Premium Medium Inicial";
            $sql = "UPDATE novedades SET tipoCliente = '$tipoCliente' WHERE codigo = $codigo";
            mysqli_query($conn, $sql);
        }elseif(isset($tipoClienteM)){
            $tipoCliente = "Premium Medium";
            $sql = "UPDATE novedades SET tipoCliente = '$tipoCliente' WHERE codigo = $codigo";
            mysqli_query($conn, $sql);
        }elseif(isset($tipoClienteP)){
            $tipoCliente = "Premium";
            $sql = "UPDATE novedades SET tipoCliente = '$tipoCliente' WHERE codigo = $codigo";
            mysqli_query($conn, $sql);
        }
        if(mysqli_query($conn, $sql)){
            echo "
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Exito',
                text: 'Novedad editada correctamente'
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
                text: 'Hubo un problema al editar la novedad'
                });
            </script>";
        }
        
    }
?>