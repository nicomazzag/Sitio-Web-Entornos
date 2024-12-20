<?php 
    include("../Include/Sesion.php");
    include("../BasesDeDatos/UnicaBaseDeDatos.php");
    date_default_timezone_set('America/Argentina/Buenos_Aires');
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
    <link rel="stylesheet" href="EstilosDeDueno.css">
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
            <label for="nombre">Nombre de Promocion:</label>
            <input type="text" id="nombre" name="nombre" required>
            <legend>Agregar Descuentos</legend>
            <label for="TipoUsuario">Tipo de Usuario:</label>
            <select class="form-select" name="TipoUsuario" aria-label=" Default select example">
                <option value="Inicial">Inicial</option>
                <option value="Medium">Medium</option>
                <option value="Premium">Premium</option>
            </select>
            <label for="SusLocales">Sus Locales:</label>
            <select class="form-select" name="Suslocales" aria-label=" Default select example">
                <?php
                    $consulta = "SELECT * FROM registracion WHERE tipoUsuario = 'dueño' AND usuario = '".$_SESSION['usuario']."' ";
                    $resultado = mysqli_query($conn, $consulta);
                    $fila = mysqli_fetch_assoc($resultado);
                    $consulta2 = "SELECT * FROM locales WHERE codUsuario = '".$fila['codigo']."' ";
                    $resultado2 = mysqli_query($conn, $consulta2);
                    while($fila2 = mysqli_fetch_assoc($resultado2)){
                        ?>
                        
                        <option value="<?php echo $fila2['id'] ?>"><?php echo $fila2['nombre'] ?></option>;
                        <?php
                    }
                    ?>
            </select>
            <div class="select-checkbox">
                <label for="DiasDisponibles">Días Disponibles:</label>
                <div class="checkbox-list">
                    <label for="Lunes"><input type="checkbox" name="DiasDisponibles[]" value="Lunes" id="Lunes"> Lunes</label>
                    <label for="Martes"><input type="checkbox" name="DiasDisponibles[]" value="Martes" id="Martes"> Martes</label>
                    <label for="Miercoles"><input type="checkbox" name="DiasDisponibles[]" value="Miercoles" id="Miercoles"> Miércoles</label>
                    <label for="Jueves"><input type="checkbox" name="DiasDisponibles[]" value="Jueves" id="Jueves"> Jueves</label>
                    <label for="Viernes"><input type="checkbox" name="DiasDisponibles[]" value="Viernes" id="Viernes" > Viernes</label>
                    <label for="Sabado"><input type="checkbox" name="DiasDisponibles[]" value="Sabado" id="Sabado"> Sábado</label>
                    <label for="Domingo"><input type="checkbox" name="DiasDisponibles[]" value="Domingo" id="Domingo"> Domingo</label>
                </div>
            </div>
            <label for="FechaDesde">Fecha Desde:</label>
            <input type="date" min="<?php echo date('Y-m-d');?>" id="FechaDesde" name="FechaDesde" required>
            <label for="FehaHasta">Fecha Hasta:</label>
            <input type="date" min="<?php echo date('Y-m-d');?>" id="FechaHasta" name="FechaHasta" required>
            <label for="Descripcion" >Descripción:</label>
            <textarea rows="3" name="Descripcion" id="Descripcion"></textarea>
        </fieldset>

            <div class="conteiner-espaciar">
                <a href="CrearDescuentos.php"
                    class="btn" id="BotonVolver" type="button" aria-label="Volver">Volver
                </a>
                <button class="btn"  id="BotonCrearDescuentos" type="submit" aria-label="Crear Descuento">Crear Descuento</button>
            </div>
        </form>
</body>
</html>

<?php
//nota: me fallta comparar las fechas que no ponga las fechas ya pasadas
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $descricpcion = filter_input(INPUT_POST, 'Descripcion', FILTER_SANITIZE_STRING);
        $inicial = filter_input(INPUT_POST, 'TipoUsuario', FILTER_SANITIZE_STRING);
        $medium = filter_input(INPUT_POST, 'TipoUsuario', FILTER_SANITIZE_STRING);
        $premium = filter_input(INPUT_POST, 'TipoUsuario', FILTER_SANITIZE_STRING);
        $local = filter_input(INPUT_POST, 'Suslocales', FILTER_SANITIZE_STRING);
        $categoria = "";
        if($inicial != null){
            $categoria = $inicial;
        } elseif($medium != null){
            $categoria = $medium;
        } elseif($premium != null){
            $categoria = $premium;
        } else {
            echo '<script>
            Swal.fire({
                title: "Error al crear el descuento",
                text: "Debe seleccionar un tipo de usuario",
                icon: "error",
                confirmButtonText: "Aceptar"
            });
            </script>';
        }
        if($local == null){
            echo '<script>
            Swal.fire({
                title: "Error al crear el descuento",
                text: "Debe seleccionar un local",
                icon: "error",
                confirmButtonText: "Aceptar"
            });
            </script>';
        }
        $fechaDesde = filter_input(INPUT_POST, 'FechaDesde', FILTER_SANITIZE_STRING);
        $fechaHasta = filter_input(INPUT_POST, 'FechaHasta', FILTER_SANITIZE_STRING);
        $fechahoy = date("Y-m-d");
        if($fechaDesde < $fechahoy){
            echo '<script>
            Swal.fire({
                title: "Error al crear el descuento",
                text: "La fecha desde no puede ser menor a la fecha de hoy",
                icon: "error",
                confirmButtonText: "Aceptar"
            });
            </script>';
        }
        $estado = "pendiente";
        $diasDisponibles= $_POST['DiasDisponibles'];
        $dias = "0000000";
        foreach ($diasDisponibles as $dia) {
            switch ($dia){
                case 'Lunes':
                    $dias[1]='1';
                    break;
                case 'Martes':
                    $dias[2]='1';
                    break;
                case 'Miercoles':
                    $dias[3]='1';
                    break;
                case 'Jueves':
                    $dias[4]='1';
                    break;
                case 'Viernes':
                    $dias[5]='1';
                    break;
                case 'Sabado':
                    $dias[6]='1';
                    break;
                case 'Domingo':
                    $dias[0]='1';
                    break;
                }
            }
            $sql = "INSERT INTO promociones (nombre,descripcion, categoriaMin, diasValidos, fechaDesde, fechaHasta,estadoPromo, codLocal) VALUES ('$nombre','$descricpcion', '$categoria' , '$dias', '$fechaDesde', '$fechaHasta', '$estado', '$local')"; 


            if (($conn->query($sql) === TRUE)) {
                echo '<script>
                Swal.fire({
                    title: "Descuento creado",
                    text: "El descuento se ha creado correctamente",
                    icon: "success",
                    confirmButtonText: "Aceptar"
                });
                </script>';
            } else {
                echo '<script>
                Swal.fire({
                    title: "Error al crear el descuento",
                    text: "Ha ocurrido un error al crear el descuento",
                    icon: "error",
                    confirmButtonText: "Aceptar"
                });
                </script>';
            }
        } 
    mysqli_close($conn);
?>