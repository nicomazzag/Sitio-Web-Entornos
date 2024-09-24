<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="LocalesAdmin.css">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Locales</title>
</head>
<body>
    <?php 
        include("headerAdmin.php");
    ?>
    <div class="conteiner">
        <table id="sinMargen" class="table">
          <thead>
            <tr>
              <th scope="col">Código Local</th>
              <th scope="col">Nombre</th>
              <th scope="col">Ubicación</th>
              <th scope="col">Rubro local</th>
              <th scope="col">&nbsp;</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr>
              <th scope="row">1</th>
              <td>Nike</td>
              <td>2do piso</td>
              <td>Indumentaria</td>
              <td><button id="botonLapiz" class="btn"><i class="fas fa-pencil-alt iconoAmarillo"></i> Editar</button></td>
              <td><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Eliminar</button></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Calvin Klein</td>
              <td>2do piso</td>
              <td>Indumentaria</td>
              <td><button id="botonLapiz" class="btn"><i class="fas fa-pencil-alt icono-rojo"></i> Editar</button></td>
              <td><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Eliminar</button></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Mc Donalds</td>
              <td>5to piso</td>
              <td>comida</td>
              <td><button id="botonLapiz" class="btn"><i class="fas fa-pencil-alt icono-rojo"></i> Editar</button></td>
              <td><button id="botonCesto" class="btn botonCesto"><i class="fas fa-trash-alt icono-rojo"></i> Eliminar</button></td>
            </tr>
          </tbody>
        </table>
        <div class="contenedorBoton">
          <button id="botonPlus" class="btn"><i class="fas fa-plus iconoVerde"></i> Agregar</button>
        </div>
    </div>
</body>
</html>