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
    <title>Solicitudes</title>
</head>
<body>
    <?php
        include ('headerDueños.php');
    ?>
    <h1 class="text-center" id="Titulos">Solicitudes de Descuentos</h1>  
    <div class="conteiner">
        <table id="sinMargen" class="table">
            <tbody class="table-group-divider" >
                <tr style="text-align: center;">
                    <td>El usuario quiere adquirir la promocion</td>
                    <td><a href="#" class="links"><button id="botonTick" class="btn"><i class="fa-regular fa-circle-check"></i> Aceptar</button></a></td>
                    <td> <a href="#" class="links"><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button></a></td>
                </tr>
                <tr style="text-align: center;">
                    <td>El usuario quiere adquirir la promocion</td>
                    <td><a href="#" class="links"><button id="botonTick" class="btn"><i class="fa-regular fa-circle-check"></i> Aceptar</button></a></td>
                    <td> <a href="#" class="links"><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button></a></td>
                </tr>
                <tr style="text-align: center;">
                    <td>El usuario quiere adquirir la promocion</td>
                    <td><a href="#" class="links"><button id="botonTick" class="btn"><i class="fa-regular fa-circle-check"></i> Aceptar</button></a></td>
                    <td> <a href="#" class="links"><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>