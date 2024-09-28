<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstilosDeDueño.css">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Crear Locales</title>
</head>
<body>
    <?php 
        include("headerDueños.php");
    ?>
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
                <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>2x1 en panchos</td>
                    <td>Premium</td>
                    <td>L-M-J</td>
                    <td><button id="botonCesto" class="btn" data-bs-target="#Eliminar" data-bs-toggle="modal"><i class="fas fa-trash-alt icono-rojo"></i> Eliminar</button></td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">2</th>
                    <td>2x1 en tangas</td>
                    <td>Inicial</td>
                    <td>L-M-Mi-V</td>
                    <td><button id="botonCesto" class="btn" data-bs-target="#Eliminar" data-bs-toggle="modal"><i class="fas fa-trash-alt icono-rojo" ></i> Eliminar</button></td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>Todo Free</td>
                    <td>Premium</td>
                    <td>S</td>
                    <td><button id="botonCesto" data-bs-target="#Eliminar" data-bs-toggle="modal" class="btn botonCesto"><i class="fas fa-trash-alt icono-rojo"></i> Eliminar</button></td>
                </tr>
            </tbody>
        </table>
        <div class="contenedorBoton">
            <button id="botonPlus" class="btn"><i class="fas fa-plus iconoVerde"></i><a id="link" href="AgregarDescuentos.php"> Agregar</a></button>    
        </div>
    </div>
        <!-- Modal -->
    <div class="modal fade" id="Eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">¿Seguro deseas eliminar esta promoción?</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" id="BotonCerrar" class="btn">Si</button>
                    <button type="button" id="BotonCancelar" class="btn" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>