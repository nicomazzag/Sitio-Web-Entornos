<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstilosDeDueño.css">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Agregar Descuentos</title>
</head>
<body>
    <?php  
        include("headerDueños.php");
    ?>
        <form action="" method="" >
            <fieldset class="border p-4 rounded">
                <legend>Agregar Descuentos</legend>
                    <label for="Descripcion" >Descripción:</label>
                    <input type="text" id="Desdcripcion" name="Descripcion">
                    <label for="Usuario">Tipo de Usuario:</label>
                    <input list="TipoUsuario" id="Usuario" name="TipoUsuario">
                    <datalist id="TipoUsuario">
                        <option>Inicial</option>
                        <option>Medium</option>
                        <option>Premium</option>
                    </datalist>
                    <label for="FechaDesde">Fecha Desde:</label>
                    <input type="date" id="FechaDesde" name="FechaDesde">
                    <label for="FehaHasta">Fecha Hasta:</label>
                    <input type="date" id="FechaHasta" name="FechaHasta">
            </fieldset>
            <div class="conteiner-espaciar">
                <a href="CrearDescuentos.php">
                    <button class="btn" id="BotonVolver" type="button" aria-label="Volver">Volver</button>
                </a>
                <button class="btn"  id="BotonCrearDescuentos" type="button" aria-label="Crear Descuento" tabindex="0">Crear Descuento</button>
            </div>
        </form>
</body>
</html>