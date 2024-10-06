<?php 
    include('../BasesDeDatos/BaseDeDatos_Novedades.php');
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
        <h1 class="display-2">Creando Nueva Novedad</h1>
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-4 mt-2">
                    <label for="textoNov">Descripcion de la novedad</label>
                    <input class="form-control" type="text" id="textoNov" name="textoNovedad" placeholder="Ingrese el texto de la novedad">
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="fechaDesde">Ingrese la fecha de inicio</label>
                    <input class="form-control" type="date" id="fechaDesde" name="fechaDesdeNov">
                </div>
                <div class="form-group col-md-4 mt-2">
                    <label for="fechaHastaNov">Ingrese la fecha de fin</label>
                    <input class="form-control" type="date" id="fechaHastaNov" name="fechaHastaNov">
                </div>
            </div>
            <div class="row">
                <div class="form-group col mt-4">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" 
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" 
                                aria-expanded="false" aria-controls="collapseOne">Dirigido a usuarios del tipo</button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form action="home_Page.php" method="post">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                            <label class="form-check-label reducirCategorias" for="flexSwitchCheckDefault">Cliente Premium</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                            <label class="form-check-label reducirCategorias" for="flexSwitchCheckDefault">Cliente Medium</label>
                                            <!-- utilizar lógica para que si se seleciona el checkbox de cliente medium, se carge el premium por php -->
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                            <label class="form-check-label reducirCategorias" for="flexSwitchCheckDefault">Cliente Inicial</label>
                                            <!-- utilizar lógica para que si se seleciona el checkbox de cliente inicial, se cargen el medium y el premium por php -->
                                        </div>
                                        <div class="text-center mt-2">
                                            <button class="btn btn-dark text-white w-100 w-md-50" type="submit" value="Filtro" name="Filtro" aria-label="Aplicar Filtro">Filtrar</button>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 espaciarBotones">
                <button id="botonPlus" class="btn" type="submit" style="border: 1px solid gray; height: 38px">Crear Novedad</button>
                <div class="conteiner m-0">
                    <a href="NovedadesAdmin.php"> 
                        <i class="fas fa-arrow-left" style="font-size: 30px;" title="Volver"></i>
                    </a>
                </div>
            </div>
            
        </form>
    </div>
</body>
</html>