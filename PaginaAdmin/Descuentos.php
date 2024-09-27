<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstiloParaTablas.css">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Descuentos</title>
</head>
<body>
    <?php 
        include("headerAdmin.php");
    ?>
    <div class="conteiner">
        <table id="sinMargen" class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre de Dueño</th>
                    <th scope="col">Descripción de promoción</th>
                    <th scope="col">Rubro local</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>Franco</td>
                    <td>Muejres 2500USD</td>
                    <td>Indumentaria</td>
                    <td><button id="botonTick" class="btn"><i class="fa-regular fa-circle-check"></i> Aprobar</button></td>
                    <td><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button></td>
                </tr>
                <tr>
                    <td>Nico</td>
                    <td>Cero GLUTEN</td>
                    <td>Indumentaria</td>
                    <td><button id="botonTick" class="btn"><i class="fa-regular fa-circle-check"></i> Aprobar</button></td>
                    <td><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button></td>
                </tr>
                <tr>
                    <td>Pedro</td>
                    <td>2% de Laburo</td>
                    <td>comida</td>
                    <td><button id="botonTick" class="btn"><i class="fa-regular fa-circle-check"></i> Aprobar</button></td>
                    <td><button id="botonCesto" class="btn botonCesto"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>