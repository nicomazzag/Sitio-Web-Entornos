<?php 
    include("../Include/Sesion.php");
    include("../BasesDeDatos/UnicaBaseDeDatos.php");
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
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <div class="contenedor1">
        <p id="Home"><a id="linkHome" href="PrincipalAdmin.php">Principal</a> /Descuentos</p>
        <h1 id="titulo">Descuentos</h1>
    </div>
    <div class="conteiner">
        <table id="sinMargen" class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre de Dueño</th>
                    <th scope="col">Descripción de promoción</th>
                    <th scope="col">Fecha desde</th>
                    <th scope="col">Fecha hasta</th>
                    <th scope="col">Rubro local</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text-center">
                <?php
                    $haydescuento = false;
                    $consulta = "SELECT * FROM promociones WHERE estadoPromo = 'pendiente'";
                    $resultado = mysqli_query($conn, $consulta);
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        if($resultado) {
                            $haydescuento = true;
                        $haydescuentos = true;
                        $consulta2= "SELECT * FROM locales WHERE id = '".$fila['codLocal']."' ";
                        $resultado2 = mysqli_query($conn, $consulta2);
                        $fila2 = mysqli_fetch_assoc($resultado2);

                        $consulta3 = "SELECT * FROM registracion WHERE codigo = '".$fila2['codUsuario']."' ";
                        $resultado3 = mysqli_query($conn, $consulta3);
                        $fila3 = mysqli_fetch_assoc($resultado3);
                        echo '<tr>
                        <td>'. $fila3['usuario'] .'</td>
                        <td>'. $fila['descripcion'] .'</td>
                        <td>'. $fila['fechaDesde'] .'</td>
                        <td>'. $fila['fechaHasta'] .'</td>
                        <td>'. $fila2['rubroLocal'] .'</td>
                        <td>'. $fila['categoriaMin'] .'</td>
                        <td>                    
                            <form action="'. htmlspecialchars($_SERVER['PHP_SELF']).'" method="post">
                                <button id="botonTick" type="submit" name="aprobar" value="'.$fila['id'].'"  class="btn"><i class="fa-regular fa-circle-check"></i> Aprobar</button>
                                <td>
                                    <button id="botonCesto" name="denegada" value="'.$fila['id'].'" type="submit" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button>
                                </td>
                            </form> 
                        </td>
                        </tr>';
                    } 
                }
                if(!$haydescuentos){
                    echo '<tr>
                    <td colspan="8" style="text-align: center;">No hay descuentos pendientes</td>
                    </tr>';
                }
                ?>
            </tbody>
                <?php
                    if (isset($_POST['aprobar'])) {
                        $consulta = "UPDATE promociones SET estadoPromo = 'aprobada' WHERE id = '".$_POST['aprobar']."'";
                        $resultado = mysqli_query($conn, $consulta);
                        if ($resultado) {
                            echo '<script>
                            Swal.fire({
                                title: "Aprobado",
                                text: "Se ha aprobado la promoción",
                                icon: "success",
                                confirmButtonText: "Aceptar"
                            }).then(function() {
                                window.location = "Descuentos.php";
                            });
                            </script>';
                        } else {
                            echo '<script>
                            Swal.fire({
                                title: "Error",
                                text: "No se ha podido aprobar la promoción",
                                icon: "error",
                                confirmButtonText: "Aceptar"
                            }).then(function() {
                                window.location = "Descuentos.php";
                            });
                            </script>';
                        }
                    } elseif(isset($_POST['denegada'])) {
                        $consulta = "UPDATE promociones SET estadoPromo = 'denegada' WHERE id = '".$_POST['denegada']."'";
                        $resultado = mysqli_query($conn, $consulta);
                        if ($resultado) {
                            echo '<script>
                            Swal.fire({
                                title: "Rechazado",
                                text: "Se ha rechazado la promoción",
                                icon: "success",
                                confirmButtonText: "Aceptar"
                            }).then(function() {
                                window.location = "Descuentos.php";
                            });
                            </script>';
                        } else {
                            echo '<script>
                            Swal.fire({
                                title: "Error",
                                text: "No se ha podido rechazar la promoción",
                                icon: "error",
                                confirmButtonText: "Aceptar"
                            }).then(function() {
                                window.location = "Descuentos.php";
                            });
                            </script>';
                        }
                    }
                    mysqli_close($conn);
                ?>
        </table>
    </div>
</body>
</html>