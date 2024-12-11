<?php 
    include("../Include/Sesion.php");
    include('../BasesDeDatos/UnicaBaseDeDatos.php');
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
    <title>Dueños</title>
</head>
<body>
    <?php 
        include("headerAdmin.php");
    ?>
    <div class="contenedor1">
        <p id="Home"><a id="linkHome" href="PrincipalAdmin.php">Principal</a> /Dueños</p>
        <h1 id="titulo">Dueños</h1>
    </div>
    <div class="conteiner">
        <table id="sinMargen" class="table">
            <thead>
                <tr>
                    <th scope="col">Codigo de Dueño</th>
                    <th scope="col">Nombre de Dueño </th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <?php 
                        $consulta = "SELECT * FROM registracion WHERE estadoDueño = 'pendiente'";
                        $resultado = mysqli_query($conn, $consulta);
                        $haydueñosPendientes = false;
                        if($resultado) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $haydueñosPendientes = true;
                                echo "<tr>";
                                echo "<td>".$fila['codigo']."</td>";
                                echo "<td>".$fila['usuario']."</td>";
                                echo '<td>
                                    <form action="'. htmlspecialchars($_SERVER['PHP_SELF']).'" method="post">
                                        <button id="botonTick" type="submit" name="aceptado" value="'.$fila['codigo'].'"  class="btn"><i class="fa-regular fa-circle-check"></i> Aceptar</button>
                                        </td>
                                        <td>
                                            <button id="botonCesto" name="rechazado" value="'.$fila['codigo'].'" type="submit" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button>
                                        </td>
                                    </form>'; 
                                echo "</tr>";
                            }
                        } 
                        $consulta = "SELECT * FROM registracion WHERE estadoDueño != 'pendiente'";
                        $resultado = mysqli_query($conn, $consulta);
                        $haydueños = false;
                        if($resultado) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $haydueños = true;
                                echo "<tr>";
                                echo "<td>".$fila['codigo']."</td>";
                                echo "<td>".$fila['usuario']."</td>";
                                echo "<td colspan='2'>".$fila['estadoDueño']."</td>"; 
                                echo "</tr>";
                            }
                        } 
                        ?>
                </tr>
                <?php 
                    if(!$haydueñosPendientes) {
                                echo '<tr>
                                <td colspan="4" class="text-center">No hay dueños pendientes</td>
                                </tr>';
                            }
                ?>
            </tbody>
            <?php
                if(isset($_POST['aceptado'])) {
                    $id = $_POST['aceptado'];
                    $consulta = "UPDATE registracion SET estadoDueño = 'aceptado' WHERE codigo = '$id'";
                    $resultado = mysqli_query($conn, $consulta);
                    if($resultado) {
                        echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Dueño aceptado',
                            text: 'El dueño ha sido aceptado',
                            });
                        </script>";
                    } else {
                        echo "
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Advertencia',
                            text: 'Error al aceptar dueño',
                            });
                        </script>";
                    }
                }
                if(isset($_POST['rechazado'])) {
                    $id = $_POST['rechazado'];
                    $consulta = "UPDATE registracion SET estadoDueño = 'rechazado' WHERE codigo = '$id'";
                    $resultado = mysqli_query($conn, $consulta);
                    if($resultado) {
                        echo "
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Dueño rechazado',
                            text: 'El dueño ha sido rechazado',
                            });
                        </script>";
                    } else {
                        echo "
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Advertencia',
                            text: 'Error al rechazar dueño',
                            });
                        </script>";
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>
