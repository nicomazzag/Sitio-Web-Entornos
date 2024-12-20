<?php 
  include("../Include/Sesion.php");
  include('../BasesDeDatos/UnicaBaseDeDatos.php');?>
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
    <title>Locales</title>
</head>
<body>
  <?php 
      include("headerAdmin.php");
  ?>
  <div class="contenedor1">
    <p id="Home"><a id="linkHome" href="PrincipalAdmin.php">Principal</a> /Locales</p>
    <h1 id="titulo">Locales</h1>
  </div>
  <div class="conteiner">
     <table id="sinMargen" class="table">
        <thead>
          <tr>
           <th scope="col" class="text-center">Código Local</th>
            <th scope="col">Nombre</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Rubro local</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php
            $consulta = "SELECT * FROM locales";
            $resultado = mysqli_query($conn, $consulta);
            while ($fila = mysqli_fetch_assoc($resultado)) {?>
              <tr>
                <th scope="row" class="text-center">
              <?php 
            if( $fila['estado'] == false){
              echo "<div style='color: red'>{$fila['id']}</div>";
            }else{
              echo $fila['id'];
            }
                ?></th>
            <td><?php echo $fila['nombre']?></td>
            <td><?php echo $fila['ubicacionLocal']?></td>
            <td><?php echo $fila['rubroLocal']?></td>
            <td>
              <form action="EditarLocales.php" method="get">
                <button id="botonLapiz" class="btn" type="submit" name= "editar" value="<?php echo $fila['id'] ?>"> <i class="fas fa-pencil-alt "></i> Editar</button>
              </form>
            </td>
          <?php 
            if($fila['estado'] == 1){?>
          <td>
              <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="get">
                <button id="botonCesto" class="btn" type="submit" name="eliminar" value="<?php echo $fila['id'] ?>"> <i class="fas fa-trash-alt"></i> Eliminar</button>
              </form>              
            </td>
            <?php }else { ?>
            <td> 
              <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="get">
                <button id="botonReactivar" class="btn" type="submit" name="reactivar" value="<?php echo $fila['id'] ?>"> <i class="fa-solid fa-check "></i>  Reactivar</button>
              </form>
            </td>
            <?php }?>
          </tr>
        <?php } ?>
        </tbody>
      </table>
      <div class="contenedorBoton">
        <button id="botonPlus" class="btn"><i class="fas fa-plus iconoVerde"></i><a id="link" href="CrearLocales.php"> Agregar</a></button>
      </div>
  </div>  
</body>
</html>

<?php
  if (isset($_GET['eliminar'])) {
    $eliminar = $_GET['eliminar'];
    $estado = 0;
    $sql = "UPDATE locales SET estado = '$estado' WHERE id = $eliminar";
    if(mysqli_query($conn, $sql)){
      echo "
      <script>
        Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: 'Local eliminado correctamente'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'LocalesAdmin.php';
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
          text: 'Hubo un problema al eliminar el local'
      });
      </script>";
    }
  }
  if (isset($_GET['reactivar'])) {
    $reactivar = $_GET['reactivar'];
    $estado = 1;
    $sql = "UPDATE locales SET estado = '$estado' WHERE id = $reactivar";
    if(mysqli_query($conn, $sql)){
      echo "
      <script>
        Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: 'Local dado de alta nuevamente'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'LocalesAdmin.php';
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
          text: 'Hubo un problema al dar de alta el local'
      });
      </script>";
    }
  }
?>