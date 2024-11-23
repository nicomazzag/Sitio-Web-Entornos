<?php 
    include("../Include/Sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstiloParaTablas.css">
    <!-- Conexion con font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Crear locales</title>
</head>
<body>
    <?php 
        include("headerAdmin.php");
    ?>
    <div class="container">
        <h1 class="display-2">Editando Local XXX</h1>
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-6 mt-2">
                    <label for="nombre">Nombre del local</label>
                    <input class="form-control" type="text" id="nombre" name="nombreLocal" placeholder="Ingrese el nombre" value="Nombre antes de editar">
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="ubi">Ubicación local</label>
                    <input class="form-control" type="text" id="ubi" name="ubiLocal" placeholder="Ingrese la ubicación" value="Ubicación antes de editar">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mt-2" >
                    <label for="rubro">Rubro Local</label>
                    <select class="form-control" name="rubroLocal" id="rubro"> 
                        <option value="Otros"selected>Otros</option><!-- colocar ya seleccionado el valor actual del local a editar -->
                        <option value="Indumentaria">Indumentaria</option>
                        <option value="Comida">Comida</option>
                        <option value="Perfumería">Perfumería</option>
                        <option value="Óptica">Óptica</option>
                    </select>
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="codUsuario">Código de Usuario del dueño</label> <!--validar con php que el mismo exista en la base de datos -->
                    <input class="form-control" type="text" id="codUsuario" name="codUsuarioLocal" placeholder="Ingrese el código" value="Código antes de editar">
                </div>
            </div>
            <div class="mt-3 espaciarBotones">
                <button id="botonLapiz" class="btn" type="submit" style="border: 1px solid gray;">Editar Local</button>
                <div class="conteiner m-0">
                    <a href="LocalesAdmin.php"> 
                        <i class="fas fa-arrow-left" style="font-size: 30px;" title="Volver"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>