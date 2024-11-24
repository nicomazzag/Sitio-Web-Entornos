<?php 
    include("../Include/Sesion.php");
    include("../BasesDeDatos/BaseDeDatosPromos.php"); // Conexión con la base de datos del uso de las promociones
    // Conectando con la base de datos de Usuarios
    $db_server = "localhost";  
    $user = "root";            
    $password = "";            
    $database = "logeo";       // Nombre de la base de datos de los Usuarios 

    // Conectar a la base de datos
    $connUsuario = mysqli_connect($db_server, $user, $password, $database);

    // Verificar la conexión
    if (!$connUsuario) {
        die("Error en la conexión: " . mysqli_connect_error());
    }
    // Conectando con la base de datos de Promociones
    $db_server = "localhost";  
    $user = "root";            
    $password = "";            
    $database = "dueños";       // Nombre de la base de datos de las promociones

    // Conectar a la base de datos
    $connPromociones = mysqli_connect($db_server, $user, $password, $database);

    // Verificar la conexión
    if (!$connPromociones) {
        die("Error en la conexión: " . mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstilosDeDueño.css">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con el google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&family=Protest+Guerrilla&display=swap" rel="stylesheet">
    <!-- Para modificar las alertas y no usar el estilo predeterminado -->
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Solicitudes</title>
</head>
<body>
    <?php
        include ('headerDueños.php');
    ?>
    <h1 class="text-center" id="Titulos">Solicitudes de Descuentos</h1>  
    <div class="conteiner">
        <table id="sinMargen" class="table">
            <tbody class="table-group-divider">
                <?php
                $consulta = "SELECT * FROM usoPromociones WHERE estado = 'enviada'";
                $resultado = mysqli_query($conn, $consulta);
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $codUsuario = $fila['codCliente'];
                    $codPromo = $fila['codPromo'];
                    //Obteniendo el nombre del usuario  
                    $consultaUsuario = "SELECT usuario FROM registracion WHERE codigo = '$codUsuario'";
                    $resultadoUsuario = mysqli_query($connUsuario, $consultaUsuario);
                    $usuario = mysqli_fetch_assoc($resultadoUsuario);
                    //Obteniendo la descripción de la promoción
                    $consultaPromo = "SELECT descripcion FROM promociones WHERE id = '$codPromo'";
                    $resultadoPromo = mysqli_query($connPromociones, $consultaPromo);
                    $promo = mysqli_fetch_assoc($resultadoPromo);
                ?>
                <tr style="text-align: center;">
                    <td><?php echo $usuario['usuario']?> quiere adquirir <?php echo $promo['descripcion']?></td>
                    <td>
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="get">
                            <button id="botonTick" class="btn" type="submit" name="aceptar" value="<?php echo $fila['codCliente'] . '-' . $fila['codPromo'];?>"><i class="fa-regular fa-circle-check"></i> Aceptar</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="get">
                            <button id="botonCesto" class="btn" type="submit" name="rechazar" value="<?php echo $fila['codCliente'] . '-' . $fila['codPromo'];?>"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button>
                        </form>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
    if (isset($_GET['aceptar'])) {
        $valorConcatenado = $_GET['aceptar'];
    
        list($usuarioEsp, $promoEsp) = explode('-', $valorConcatenado); 

        $estado = "aceptada";
        $sql = "UPDATE usoPromociones SET estado = '$estado' WHERE codCliente = $usuarioEsp AND codPromo = $promoEsp";
        if(mysqli_query($conn, $sql)){
            echo "
            <script>
              Swal.fire({
                  icon: 'success',
                  title: 'Exito',
                  text: 'Promoción usada correctamente'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = 'SolicitudesDescuento.php';
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
                text: 'Hubo un problema al aceptar la promoción'
            });
            </script>";
          }
    }
    if (isset($_GET['rechazar'])) {
        $valorConcatenado = $_GET['rechazar'];
    
        list($usuarioEsp, $promoEsp) = explode('-', $valorConcatenado); 

        $estado = "rechazada";
        $sql = "UPDATE usoPromociones SET estado = '$estado' WHERE codCliente = $usuarioEsp AND codPromo = $promoEsp";
        if(mysqli_query($conn, $sql)){
            echo "
            <script>
              Swal.fire({
                  icon: 'success',
                  title: 'Exito',
                  text: 'Promoción rechazada correctamente'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = 'SolicitudesDescuento.php';
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
            text: 'Hubo un problema al rechazar la promoción'
        });
        </script>";
        }
    }
    mysqli_close($connUsuario);
    mysqli_close($connPromociones);
?>