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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
            $consulta = "SELECT * FROM locales WHERE codigo = $codigo";
            $resultado = mysqli_query($conn, $consulta);
            $fila = mysqli_fetch_assoc($resultado);
        ?>
        <h1 class="display-2">Editando Local <?php echo $fila['codigo'] ?></h1>
        <form id="editarLocal" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <div class="row">
                <div class="form-group col-md-6 mt-2">
                    <label for="nombre">Nombre del local</label>
                    <input class="form-control" type="text" id="nombre" name="nombreLocal" placeholder="Ingrese el nombre" value="<?php echo $fila['nombreLocal']?>">
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="ubi">Ubicación local</label>
                    <input class="form-control" type="text" id="ubi" name="ubiLocal" placeholder="Ingrese la ubicación" value="<?php echo $fila['ubicacionLocal']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mt-2" >
                    <label for="rubro">Rubro Local</label>
                    <select class="form-control" name="rubroLocal" id="rubro"> 
                        <option value="<?php echo $fila['rubroLocal']?>"selected><?php echo $fila['rubroLocal']?></option>
                        <option value="Indumentaria">Indumentaria</option>
                        <option value="Comida">Comida</option>
                        <option value="Perfumería">Perfumería</option>
                        <option value="Óptica">Óptica</option>
                    </select>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="codUsuario">Código de Usuario del dueño</label> <!--validar con php que el mismo exista en la base de datos -->
                    <input class="form-control" type="text" id="codUsuario" name="codUsuario" placeholder="Ingrese el código" value="<?php echo $fila['codUsuario']?>">
                </div>
            </div>
            <div class="mt-3 espaciarBotones">
                <button form="editarLocal" id="botonLapiz" class="btn" type="submit" style="border: 1px solid gray;">Editar Local</button>
                <div class="conteiner m-0">
                    <a href="LocalesAdmin.php"> 
                        <i class="fas fa-arrow-left" style="font-size: 30px;" title="Volver"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombreLocal = filter_input(INPUT_POST, 'nombreLocal', FILTER_SANITIZE_STRING);
        $ubiLocal = filter_input(INPUT_POST, 'ubiLocal', FILTER_SANITIZE_STRING);
        $rubroLocal = filter_input(INPUT_POST, 'rubroLocal', FILTER_SANITIZE_STRING);
        $codUsuario = filter_input(INPUT_POST, 'codUsuario', FILTER_SANITIZE_STRING);
        
        $consultaUsuario = "SELECT * FROM usuarios WHERE codUsuario = $codUsuario AND tipoUsuario = 'dueño de local'";
        $resultadoUsuario = mysqli_query($conn, $consultaUsuario);
        
        if(mysqli_num_rows($resultadoUsuario) > 0){  // El código de usuario existe
                if(!empty($nombreLocal) && $nombreLocal != $fila['nombreLocal'] ){
                $sql = "UPDATE locales SET nombreLocal = '$nombreLocal' WHERE codigo = $codigo";
                mysqli_query($conn, $sql);
            }
            if(!empty($ubiLocal) && $ubiLocal != $fila['ubicacionLocal'] ){
                $sql = "UPDATE locales SET ubicacionLocal = '$ubiLocal' WHERE codigo = $codigo";
                mysqli_query($conn, $sql);
            }
            if(!empty($codUsuario) && $codUsuario != $fila['codUsuario'] ){
                $sql = "UPDATE locales SET codUsuario = '$codUsuario' WHERE codigo = $codigo";
                mysqli_query($conn, $sql);
            }
            $sql = "UPDATE locales SET rubroLocal = '$rubroLocal' WHERE codigo = $codigo";
                mysqli_query($conn, $sql);
        
            if(mysqli_query($conn, $sql)){
                echo "
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Local editado correctamente'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'LocalesAdmin.php';
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
                    text: 'Hubo un problema al editar el Local'
                    });
                </script>";
            }
        }
            
        else {
            // El código de usuario no existe
            echo "
                <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: 'El codigo de usuario no existe'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'LocalesAdmin.php';
                }
                });    
                </script>";
                mysqli_close($conn);
    }
    }
?>