<?php
  include("../Include/Sesion.php");
  include("../BasesDeDatos/BaseDeDatos_Admin.php");
?>
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
    <!-- Para modificar las alertas y no usar el estilo predeterminado -->
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <?php
              $consulta = "SELECT * FROM novedades";
              $resultado = mysqli_query($conn, $consulta);
              while ($fila = mysqli_fetch_assoc($resultado)) {?>
            <tr>
              <th scope="row" class="text-center">
              <?php 
              if( $fila['estado'] == false){
                echo "<div style='color: red'>{$fila['codigo']}</div>";
              }else{
                echo $fila['codigo'];
              }
              ?></th>
              <td><?php echo $fila['texto']?></td>
              <td><?php echo $fila['fechaDesde']?></td>
              <td><?php echo $fila['fechaHasta']?></td>
              <td class="text-center"><?php echo $fila['tipoCliente']?></td>
              <td>
                <form action="EditarNovedades.php" method="get">
                  <button id="botonLapiz" class="btn" type="submit" name= "editar" value="<?php echo $fila['codigo'] ?>"> <i class="fas fa-pencil-alt "></i> Editar</button></td>
                </form>
              <td> 
              <?php 
              if($fila['estado'] == 1){?>
                <td>
                  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="get">
                    <button id="botonCesto" class="btn" type="submit" name="eliminar" value="<?php echo $fila['codigo'] ?>"> <i class="fas fa-trash-alt"></i> Eliminar</button>
                  </form>
                </td>
              <?php }else { ?>
              <td> 
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="get">
                  <button id="botonReactivar" class="btn" type="submit" name="reactivar" value="<?php echo $fila['codigo'] ?>"> <i class="fa-solid fa-check "></i>  Reactivar</button>
                </form>
              </td>
              <?php }?>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <div class="contenedorBoton">
          <button id="botonPlus" class="btn"><i class="fas fa-plus iconoVerde"></i><a id="link" href="CrearNovedades.php"> Agregar</a></button>
        </div>
    </div>
</body>
</html>
<?php
  if (isset($_GET['eliminar'])) {
    $eliminar = $_GET['eliminar'];
    $estado = 0;
    $sql = "UPDATE novedades SET estado = '$estado' WHERE codigo = $eliminar";
    if(mysqli_query($conn, $sql)){
      echo "
      <script>
        Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: 'Novedad eliminada correctamente'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'NovedadesAdmin.php';
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
          text: 'Hubo un problema al eliminar la novedad'
      });
      </script>";
    }
  }
  if (isset($_GET['reactivar'])) {
    $reactivar = $_GET['reactivar'];
    $estado = 1;
    $sql = "UPDATE novedades SET estado = '$estado' WHERE codigo = $reactivar";
    if(mysqli_query($conn, $sql)){
      echo "
      <script>
        Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: 'Novedad dada de alta nuevamente'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'NovedadesAdmin.php';
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
          text: 'Hubo un problema al dar de alta la novedad'
      });
      </script>";
    }
  }
?>
