<?php 
//esta conexion muy probable hay que cambairla
    include('BaseDeDatosPromociones.php');
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
    <title>Agregar Descuentos</title>
</head>
<body id="bodyAgregar">
    <form action="<?php htmlspecialchars(($_SERVER["PHP_SELF"])) ?>" method="post">
        <fieldset>
            <legend>Agregar Descuentos</legend>
            <label for="Usuario">Tipo de Usuario:</label>
            <select class="form-select" name="CategoriaUsuario" aria-label=" Default select example">
                <option selected>Seleccione una opción</option>
                <option value="Inicial" name="Inicial">Inicial</option>
                <option value="Medium" name="Medium" >Medium</option>
                <option value="Premium" name="Premium">Premium</option>
            </select>
            <label for="SusLocales">Sus Locales:</label>
            <select class="form-select" name="SusLocales" aria-label=" Default select example">
                <option selected>Seleccione un local</option>
                <option value="Inicial">Nike</option>
                <option value="Medium">Adidas</option>
                <option value="Premium">Puma</option>
            </select>
            <div class="select-checkbox">
                <label for="DiasDisponibles">Días Disponibles:</label>
                <div class="checkbox-list">
                    <label for="Lunes"><input type="checkbox" name="DiasDisponibles[]" value="opcion1"> Lunes</label>
                    <label for="Martes"><input type="checkbox" name="DiasDisponibles[]" value="opcion2"> Martes</label>
                    <label for="Miercoles"><input type="checkbox" name="DiasDisponibles[]" value="opcion3"> Miércoles</label>
                    <label for="Jueves"><input type="checkbox" name="DiasDisponibles[]" value="opcion4"> Jueves</label>
                    <label for="Viernes"><input type="checkbox" name="DiasDisponibles[]" value="opcion4"> Viernes</label>
                    <label for="Sabado"><input type="checkbox" name="DiasDisponibles[]" value="opcion4"> Sábado</label>
                    <label for="Domingo"><input type="checkbox" name="DiasDisponibles[]" value="opcion4"> Domingo</label>
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
    $falta=true;
    $sql = "SELECT * FROM promociones";
    $resultado= mysqli_query($conn, $sql);
    $CategoriaUsuario = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['TipoUsuario'])){
            if($_POST['Inicial']){
                $CategoriaUsuario = 0;
            }
            elseif($_POST['Medium']){
                $CategoriaUsuario = 1;
            }
            elseif($_POST['Premium']){
                $CategoriaUsuario = 2;
            }
            else {
                $falta = false; 
            }
        }
        $susLocales = '';
        if(isset($_POST['SusLocales'])){
            $susLocales = $_POST['SusLocales'];
        } else {
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
        if(isset($_POST['FechaDesde']) && isset($_POST['FechaDHasta'])){
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
        if (isset($_POST))
        $sql = "INSERT INTO () VALUES ('$CategoriaUsuario', '$susLocales', '$diasDisponibles', '$fechaDesde', '$fechaHasta', '$descripcion')";  
    if(!$falta){
        echo 'Falta completar campos';
    }
    else {
        echo 'Descuento creado con éxito';
    } 
}
    
    mysqli_close($conn);
?>