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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Locales</title>
</head>
<body>
    <?php 
        include("headerAdmin.php");
    ?>
    <div class="conteiner table-responsive">
        <table id="sinMargen" class="table">
          <thead>
            <tr>
              <th scope="col" class="text-center">Código Promoción</th>
              <th scope="col">Texto</th>
              <th scope="col">Días Disponible</th>            
              <th scope="col" class="text-center">Cantidad de Usos</th>            
              <th scope="col">&nbsp;</th>
              <!--En caso de tocar el boton inspeccionar, desplegar modal con la siguiente información            
                                Válida Desde
                                Válida Hasta
                                Para clientes
                                Local Asociado -->
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr>
              <th scope="row" class="text-center">XXX</th>
              <td>20% OFF calzados</td>
              <td>L-M-Mi-J-V-S-D</td>
              <td class="text-center">4</td>
              <td><button id="botonLupa" class="btn"><i class="fas fa-search"></i> Inspeccionar</button></td>            
            </tr>
            <tr>
              <th scope="row" class="text-center">XXX</th>
              <td>2x1 Combos Hamburguesa</td>
              <td>L-M-Mi</td>
              <td class="text-center">10</td>
              <td><button id="botonLupa" class="btn"><i class="fas fa-search"></i> Inspeccionar</button></td>                 </tr>
            <tr>
              <th scope="row" class="text-center">XXX</th>
              <td>50% OFF Boxer</td>
              <td>J-V-S-D</td>
              <td class="text-center">2</td>
              <td><button id="botonLupa" class="btn"><i class="fas fa-search"></i> Inspeccionar</button></td>                 </tr>
          </tbody>
        </table>
    </div>
</body>
</html>