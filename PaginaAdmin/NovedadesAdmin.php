<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstiloParaTablas.css">
    <link rel="stylesheet" href="EstiloParaTitulos.css">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Novedades</title>
</head>
<body>
    <?php 
      include("headerAdmin.php");
    ?>
    <div class="contenedor1">
      <p id="Home"><a id="linkHome" href="PrincipalAdmin.php">Principal</a> /Novedades</p>
      <h1 id="titulo">Novedades</h1>
    </div>
    <div class="conteiner table-responsive">
        <table id="sinMargen" class="table">
          <thead>
            <tr>
              <th scope="col" class="text-center">Código Novedad</th>
              <th scope="col">Texto</th>
              <th scope="col">Válida Desde</th>
              <th scope="col">Válida Hasta</th>
              <th scope="col" class="text-center">Para clientes</th>
              <th scope="col">&nbsp;</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr>
              <th scope="row" class="text-center">1</th>
              <td>10% OFF en calzados</td>
              <td>24/07/2024</td>
              <td>24/09/2024</td>
              <td class="text-center">Inicial</td>
              <td><button id="botonLapiz" class="btn"><i class="fas fa-pencil-alt iconoAmarillo"></i><a id="link" href="EditarNovedades.php"> Editar</a></button></td>
              <td><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Eliminar</button></td>
            </tr>
            <tr>
              <th scope="row" class="text-center">2</th>
              <td>Domingo cerrado por reformas</td>
              <td>24/09/2024</td>
              <td>25/09/2024</td>
              <td class="text-center">Inicial</td>
              <td><button id="botonLapiz" class="btn"><i class="fas fa-pencil-alt icono-rojo"></i><a id="link" href="EditarNovedades.php"> Editar</a></button></td>
              <td><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Eliminar</button></td>
            </tr>
            <tr>
              <th scope="row" class="text-center">3</th>
              <td>semana black friday</td>
              <td>23/09/2024</td>
              <td>30/09/2024</td>
              <td class="text-center">Premium</td>
              <td><button id="botonLapiz" class="btn"><i class="fas fa-pencil-alt icono-rojo"></i><a id="link" href="EditarNovedades.php"> Editar</a></button></td>
              <td><button id="botonCesto" class="btn botonCesto"><i class="fas fa-trash-alt icono-rojo"></i> Eliminar</button></td>
            </tr>
          </tbody>
        </table>
        <div class="contenedorBoton">
          <button id="botonPlus" class="btn"><i class="fas fa-plus iconoVerde"></i><a id="link" href="CrearNovedades.php"> Agregar</a></button>
        </div>
    </div>
</body>
</html>