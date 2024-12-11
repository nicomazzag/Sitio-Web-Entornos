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
    <link rel="stylesheet" href="EstilosDeDueno.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Crear Descuentos</title>
</head>
<body>
    <?php 
        include("headerDuenos.php");
    ?>
    <h1 class="text-center" id="Titulos">Crear Descuentos</h1>
    <div class="conteiner">
        <table id="sinMargen" class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Código Descuento</th>
                    <th scope="col">Local</th>
                    <th scope="col">Nombre de Promocion</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Tipo de Usuario</th>
                    <th scope="col">Dias Disponible</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    $consulta = "SELECT * FROM registracion WHERE usuario = '".$_SESSION['usuario']."' ";
                    $resultado = mysqli_query($conn, $consulta);
                    $fila = mysqli_fetch_assoc($resultado);
                    $consulta2 = "SELECT * FROM locales WHERE codUsuario = '".$fila['codigo']."' ";
                    $resultado2 = mysqli_query($conn, $consulta2);
                    $haypromociones = false;
                    while ($fila2 = mysqli_fetch_assoc($resultado2)) {
                        $consulta3 = "SELECT * FROM promociones WHERE codLocal = '".$fila2['id']."' ";
                        $resultado3 = mysqli_query($conn, $consulta3);
                        while ($fila3 = mysqli_fetch_assoc($resultado3)) {
                            if ($fila3['estadoPromo'] == "aprobada") {
                                $haypromociones = true;
                                $diasBinario = $fila3['diasValidos'];
                                $diasTexto = ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"];
                                $diasResultado = [];
                                for ($i = 0; $i < 7; $i++) {
                                    if ($diasBinario[$i] === "1") {
                                        $diasResultado[] = $diasTexto[$i];
                                    }  }
                                echo '<tr>
                                <th scope="row" class="text-center">'. $fila3['id'].'</th>
                                <td> '. $fila2['nombre'] .'</td>
                                <td> '. $fila3['nombre'] .'</td>
                                <td> '. $fila3['descripcion'] .'</td>
                                <td>'. $fila3['categoriaMin'] .'</td>
                                <td> '. implode(" - ", $diasResultado) .'</td>';
                                echo '<form action="'. htmlspecialchars($_SERVER['PHP_SELF']).'" method="post">
                                    <td><button id="botonCesto" type="submit" class="btn"  name="id" value="'. $fila3['id'].'" data-bs-toggle="modal"><i class="fas fa-trash-alt icono-rojo"></i> Eliminar</button></td>
                                </form>';
                                echo '</tr>';
                            }
                        }
                    } if(!$haypromociones) {
                        echo '<tr><td colspan="7" class="text-center">No hay promociones aceptadas</td></tr>';
                    }
                ?>
            </tbody>
                        <?php  
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $consulta = "DELETE FROM promociones WHERE id = '$id' LIMIT 1";
                        $resultado = mysqli_query($conn, $consulta);
                        if ($resultado) {
                            echo '<script>
                            Swal.fire({
                                title: "¡Eliminado!",
                                text: "Se ha eliminado la promoción",
                                icon: "success",
                                confirmButtonText: "Aceptar"
                            }).then(() => {
                                window.location.href = "CrearDescuentos.php";
                            });
                            </script>';
                        } else {
                            echo '<script>
                            Swal.fire({
                                title: "¡Error!",
                                text: "No se ha podido eliminar la promoción",
                                icon: "error",
                                confirmButtonText: "Aceptar"
                            }).then(() => {
                                window.location.href = "CrearDescuentos.php";
                            });
                            </script>';
                        }
                    }
                    ?>
                    </table>
                    <div class="contenedorBoton">
                        <a href="AgregarDescuentos.php" class="links"><button id="botonPlus" class="btn" ><i class="fas fa-plus iconoVerde"></i> Agregar</button></a>  
                    </div>
                </div>
</body>
</html>