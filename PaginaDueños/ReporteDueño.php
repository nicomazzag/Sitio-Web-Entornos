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
    
    <title>Reporte</title>
</head>
<body>
    <?php
        include ('headerDueños.php');
    ?>
    <h1 class="text-center" id="Titulos" >Reporte de Descuentos</h1>
    <div class="conteiner">
        <table id="sinMargen" class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Código Locales</th>
                    <th scope="col">Nombre Locales</th>  
                    <th scope="col">Descuentos</th>
                    <th scope="col">Disponible</th>
                    <th scope="col">Cantidad de usos</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>Pancheri</td>
                    <td>2x1 en panchos</td>
                    <td>L-M-J</td>
                    <td>10</td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">2</th>
                    <td>Ropa Interior</td>
                    <td>2x1 en tangas</td>
                    <td>L-M-Mi-V</td>
                    <td>100</td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>Nike</td>
                    <td>Todo Free</td>
                    <td>S</td>
                    <td>12</td>
                </tr>
            </tbody>
        </table>
    </div>
        <nav aria-label="Page navigation example" id="paginacion">
        <ul class="pagination" id="enlaces">
            <li class="page-item "><a class="page-link" id="item" href="#">Anterior</a></li>
            <li class="page-item" ><a class="page-link" id="item" href="#">1</a></li>
            <li class="page-item" ><a class="page-link" id="item" href="#">2</a></li>
            <li class="page-item" ><a class="page-link" id="item" href="#">3</a></li>
            <li class="page-item" ><a class="page-link" id="item" href="#">Siguiente</a></li>
        </ul>
    </nav>
</body>
</html>