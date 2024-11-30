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
    <link rel="stylesheet" href="EstilosDeDueño.css">
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
        include("headerDueños.php");
    ?>
    <h1 class="text-center" id="Titulos">Crear Descuentos</h1>
    <div class="conteiner">
        <table id="sinMargen" class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Código Descuento</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Tipo de Usuario</th>
                    <th scope="col">Disponible</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    $consulta = "SELECT * FROM promociones";
                    $resultado = mysqli_query($conn, $consulta);
                    while ($fila = mysqli_fetch_assoc($resultado)) {?>
                <?php  echo '<tr>
                            <th scope="row" class="text-center">'. $fila['id'].'</th>
                            <td> '. $fila['descripcion'] .'</td>
                            <td>'. $fila['categoriaMin'] .'</td>
                            <td> '. $fila['diasValidos'] .'</td>';
                            ?>
                            <td><a href="#" class="links"><button id="botonCesto" class="btn" data-bs-target="#Eliminar"  data-bs-toggle="modal"><i class="fas fa-trash-alt icono-rojo" data-id="<?php echo $fila['id'];?>"  data-descripcion="<?php echo htmlspecialchars($fila['descripcion']); ?>" ></i> Eliminar</button></a></td>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="contenedorBoton">
                        <a href="AgregarDescuentos.php" class="links"><button id="botonPlus" class="btn" ><i class="fas fa-plus iconoVerde"></i> Agregar</button></a>  
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="Eliminar" tabindex="-1" aria-labelledby="Modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="Modal">¿Seguro deseas eliminar la promocion?</h1></div>
                <div class="modal-footer">
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="get">
                        <button type="submit" id="BotonCerrar"  class="btn">Si</button>
                        <button type="button" id="BotonCancelar" class="btn" data-bs-dismiss="modal">No</button>
                        <?php
                        if(isset($_GET['eliminar'])){
                            $id = $_GET['eliminar'];
                            $consulta = "DELETE FROM promociones WHERE id = '$id'";
                            $resultado = mysqli_query($conn, $consulta);
                            if($resultado){
                                echo 'swal.fire({
                                    title: "Eliminado",
                                    text: "Se ha eliminado la promocion",
                                    icon: "success",
                                    confirmButtonText: "Aceptar"
                                })';
                            }else{
                                echo 'swal.fire({
                                    title: "Error",
                                    text: "No se ha podido eliminar la promocion",
                                    icon: "error",
                                    confirmButtonText: "Aceptar"
                                })';
                            }
                        } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>