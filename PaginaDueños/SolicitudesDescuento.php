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
                    <td><button id="botonTick" class="btn"><i class="fa-regular fa-circle-check"></i> Aceptar</button></td>
                    <td><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button></td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">2</th>
                    <td>2x1 en tangas</td>
                    <td>Inicial</td>
                    <td>L-M-Mi-V</td>
                    <td><button id="botonTick" class="btn"><i class="fa-regular fa-circle-check"></i> Aceptar</button></td>
                    <td><button id="botonCesto" class="btn"><i class="fas fa-trash-alt icono-rojo" ></i> Rechazar</button></td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>Todo Free</td>
                    <td>Premium</td>
                    <td>S</td>
                    <td><button id="botonTick" class="btn"><i class="fa-regular fa-circle-check"></i> Aceptar</button></td>
                    <td><button class="btn" id="botonCesto"><i class="fas fa-trash-alt icono-rojo"></i> Rechazar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>