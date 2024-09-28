<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstilosDeDueño.css">
    <!-- Conexion con font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Agregar Descuentos</title>
</head>
<body id="bodyAgregar">
        <form>
            <fieldset>
                <legend>Agregar Descuentos</legend>
                    <label for="Descripcion" >Descripción:</label>
                    <input type="text" id="Desdcripcion" name="Descripcion" required>
                    <label for="Usuario">Tipo de Usuario:</label>
                    <input list="TipoUsuario" id="Usuario" name="TipoUsuario" required>
                    <datalist id="TipoUsuario" required>
                        <option>Inicial</option>
                        <option>Medium</option>
                        <option>Premium</option>
                    </datalist>
                    <label for="FechaDesde">Fecha Desde:</label>
                    <input type="date" id="FechaDesde" name="FechaDesde" required>
                    <label for="FehaHasta">Fecha Hasta:</label>
                    <input type="date" id="FechaHasta" name="FechaHasta" required>
                </fieldset>
            <div class="conteiner-espaciar">
                <a href="CrearDescuentos.php">
                    <button class="btn" id="BotonVolver" type="button" aria-label="Volver">Volver</button>
                </a>
                <button class="btn"  id="BotonCrearDescuentos" type="button" aria-label="Crear Descuento">Crear Descuento</button>
            </div>
        </form>
</body>
</html>