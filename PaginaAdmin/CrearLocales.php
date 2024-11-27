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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstiloParaTablas.css">
    <link rel="stylesheet" href="CrearLocales.css">
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
        <h1 class="display-2">Creando Nuevo Local</h1>
        <form id="crearLocal" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6 mt-2">
                    <label for="nombre">Nombre del local</label>
                    <input class="form-control" type="text" id="nombre" name="nombreLocal" placeholder="Ingrese el nombre del local">
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="ubi">Ubicación local</label>
                    <input class="form-control" type="text" id="ubi" name="ubicacionLocal" placeholder="Ingrese la ubicación">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mt-2" >
                    <label for="rubro">Rubro Local</label>
                    <select class="form-control" name="rubroLocal" id="rubro">
                        <option value="Otros">Otros</option>
                        <option value="Indumentaria">Indumentaria</option>
                        <option value="Comida">Comida</option>
                        <option value="Perfumería">Perfumería</option>
                        <option value="Óptica">Óptica</option>
                    </select>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="codUsuario">Código de Usuario del dueño</label> <!--validar con php que el mismo exista en la base de datos -->
                    <input class="form-control" type="text" id="codUsuario" name="codUsuario" placeholder="Ingrese el código">
                </div>
            </div>
            <div class="row">
                <div class="col-12 cargaImagenes">
                    <img src="../Imagenes/Logo_shopping.png" alt="Imagen del local" id="imagenLocal">
                    <label for="inputArchivo" id="labelArchivo">Subir imagen del local</label>
                    <input type="file" accept="image/jpeg, image/png, image/jpg" id="inputArchivo" name="imagenLocal">
                </div>
            </div>
            <div class="mt-3 espaciarBotones">
            <button form="crearLocal" id="botonPlus" class="btn" type="submit" style="border: 1px solid gray; height: 38px">Crear Local</button>
                    <div class="conteiner m-0">
                    <a href="LocalesAdmin.php"> 
                        <i class="fas fa-arrow-left" style="font-size: 30px;" title="Volver"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <script>
        let inputArchivo = document.getElementById("inputArchivo");
        let imagenLocal = document.getElementById("imagenLocal");

        inputArchivo.addEventListener("change", function(){
            let file = this.files[0];
            let reader = new FileReader();
            reader.onload = function(){
                imagenLocal.src = reader.result;
            }
            reader.readAsDataURL(file);
        });
    </script>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombreLocal = filter_input(INPUT_POST, 'nombreLocal', FILTER_SANITIZE_STRING);
        $ubicacionLocal = filter_input(INPUT_POST, 'ubicacionLocal', FILTER_SANITIZE_STRING);
        $rubroLocal = filter_input(INPUT_POST, 'rubroLocal', FILTER_SANITIZE_STRING);
        $codUsuario = filter_input(INPUT_POST, 'codUsuario', FILTER_SANITIZE_STRING);
        $estado = 1;
            if (isset($_FILES['imagenLocal']) && $_FILES['imagenLocal']['error'] == UPLOAD_ERR_OK) { 
                $rutaTemporal = $_FILES['imagenLocal']['tmp_name'];
                $imagenBinaria = addslashes(file_get_contents($rutaTemporal)); // contenido binario de la imagen (BLOB)
            }
            $consultaUsuario = "SELECT * FROM usuarios WHERE codUsuario = $codUsuario AND tipoUsuario = 'dueño de local'";
            $resultadoUsuario = mysqli_query($conn, $consultaUsuario);
    
        if(mysqli_num_rows($resultadoUsuario) > 0){  // El código de usuario existe
            if(empty($nombreLocal)){
                echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe ingresar un nombre para el local'
                });
                </script>";
            }
            elseif(empty($ubicacionLocal)){
                echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe ingresar una ubicación para el local'
                });
                </script>";
            }
            elseif(empty($rubroLocal)){
                echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe ingresar un rubro para el local'
                });
                </script>";
            }
            elseif(empty($codUsuario)){
                echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe ingresar un código de usuario para el local'
                });
                </script>";
            }
            else{ 
                $sql = "INSERT INTO locales (nombreLocal, ubicacionLocal, rubroLocal, imagen, codUsuario, estado) VALUES ('$nombreLocal', '$ubicacionLocal', '$rubroLocal','$imagenBinaria', '$codUsuario', '$estado')";
                if(mysqli_query($conn, $sql)){
                    echo "
                    <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Local creado correctamente'
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
                        text: 'Hubo un problema al crear el local'
                        });
                    </script>";
                }
            }
            
        }
        else {      // El código de usuario no existe
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