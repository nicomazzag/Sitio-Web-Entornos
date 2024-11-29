<?php 
    include("../Logeo/BaseDeDatos_Usuario.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Conexión con JavaScript--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstilosDeDueño.css">
    <!-- Conexion con font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Agregar Descuentos</title>
</head>
<body id="bodyAgregar">
    <form class="agregarDescuentoForm" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <fieldset>
            <legend>Agregar Descuentos</legend>
            <label for="Usuario">Tipo de Usuario:</label>
            <select class="form-select" aria-label=" Default select example">
                <option selected >Seleccione una opción</option>
                <option value="Inicial" name="Inicial">Inicial</option>
                <option value="Medium" name="Medium" >Medium</option>
                <option value="Premium" name="Premium">Premium</option>
            </select>
            <label for="SusLocales">Sus Locales:</label>
            <select class="form-select" aria-label=" Default select example">
                <option selected >Seleccione un local</option>
                <option value="Nike" name="Nike">Nike</option>
                <option value="Adidas" name="Adidas">Adidas</option>
                <option value="Puma" name="Puma">Puma</option>
            </select>
            <div class="select-checkbox">
                <label for="DiasDisponibles">Días Disponibles:</label>
                <div class="checkbox-list">
                    <label for="Lunes"><input type="checkbox" name="DiasDisponibles[]" value="Lunes"> Lunes</label>
                    <label for="Martes"><input type="checkbox" name="DiasDisponibles[]" value="Martes"> Martes</label>
                    <label for="Miercoles"><input type="checkbox" name="DiasDisponibles[]" value="Miercoles"> Miércoles</label>
                    <label for="Jueves"><input type="checkbox" name="DiasDisponibles[]" value="Jueves"> Jueves</label>
                    <label for="Viernes"><input type="checkbox" name="DiasDisponibles[]" value="Viernes"> Viernes</label>
                    <label for="Sabado"><input type="checkbox" name="DiasDisponibles[]" value="Sabado"> Sábado</label>
                    <label for="Domingo"><input type="checkbox" name="DiasDisponibles[]" value="Domingo"> Domingo</label>
                </div>
            </div>
            <label for="FechaDesde">Fecha Desde:</label>
            <input type="date" id="FechaDesde" name="FechaDesde" required>
            <label for="FehaHasta">Fecha Hasta:</label>
            <input type="date" id="FechaHasta" name="FechaHasta" required>
            <label for="Descripcion" >Descripción:</label>
            <textarea rows="3" name="Descripcion" id="Descripcion"></textarea>
        </fieldset>

            <div class="conteiner-espaciar">
                <a href="CrearDescuentos.php">
                    <button class="btn" id="BotonVolver" type="button" aria-label="Volver">Volver</button>
                </a>
                <button class="btn"  id="BotonCrearDescuentos" type="submit" aria-label="Crear Descuento">Crear Descuento</button>
            </div>
        </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $CategoriaUsuario = '';
        $falta=true;
            if(isset($_POST['Inicial'])){
                $CategoriaUsuario = 'Inicial';
            }
            elseif(isset($_POST['Medium'])){
                $CategoriaUsuario = 'Medium';
            }
            elseif(isset($_POST['Premium'])){
                $CategoriaUsuario = 'Premium';
            }
            else {
                $falta = false; 
            }
        
        $susLocales = '';
        if(isset($_POST['Nike'])){
            $susLocales = 'Nike';
        }elseif(isset($_POST['Adidas'])){
            $susLocales = 'Adidas'; 
        }elseif(isset($_POST['Puma'])){
            $susLocales = 'Puma';
        }else {
            $falta = false;
        }

        $diasDisponibles = '';
        if(isset($_POST['DiasDisponibles']) && is_array($_POST['DiasDisponibles'])){
            $diasDisponibles = implode(',', $_POST['DiasDisponibles']);
        } else {
            $falta = false;
        }

        $fechaDesde = '';
        $fechaHasta = '';
        if(isset($_POST['FechaDesde']) && isset($_POST['FechaHasta'])){
            $fechaDesde = $_POST['FechaDesde'];
            $fechaHasta = $_POST['FechaHasta'];
        } else {
            $falta = false;
        }
        
        $descripcion = '';
        if(isset($_POST['Descripcion'])){
            $descripcion = $_POST['Descripcion'];
        } else {
            $falta = false;
        }
        if($falta){
            $sql = "INSERT INTO promociones (descripcion, categoriaMin, diasValidos, fechaDesde, fechaHasta, localid, estado) VALUES ('$descripcion', '$CategoriaUsuario', '$diasDisponibles', '$fechaDesde', '$fechaHasta', '$susLocales', 'Pendiente')";

                if(mysqli_query($conn, $sql)){
                echo "
                    <script>
                    Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Descuento creado correctamente'
                        });
                    </script>";
                } else {
                    echo "
                    <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al crear el descuento'
                        });
                    </script>";
                }
        } else {
            echo "
                <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia', 
                    text: 'Debe completar todos los campos'
                    });
                </script>";
            } 
}
    
    mysqli_close($conn);
?>