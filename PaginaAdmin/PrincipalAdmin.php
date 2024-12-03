<?php 
    include("../Include/Sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="../PaginaGeneral/home_Page.css">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con el google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&family=Protest+Guerrilla&display=swap" rel="stylesheet">
    
    <title>Principal</title>
</head>
<body>
    <?php 
        include_once("headerAdmin.php");
    ?>
    <!-- Introduccion -->
    <div class="conteiner numero1">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="conteiner introduccion">
                    <div class="row">
                        <h1 class="titulo">Zorzal Centro Comercial!!</h1>
                    </div>
                    <div class="row">    
                        <div class="col-12 col-md-6 centrar">
                            <p class="reducir"><b>Descubre lo mejor en Zorzal:</b> estilo, tendencia y experiencias únicas te esperan.</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="container separadorVertical reducir_horarios">
                                <div class="row">
                                    <h2 class="reducir">Horarios de Apertura:</h2>
                                </div>
                                <div class="row">
                                    <div class="col">Lunes</div>
                                    <div class="col">8:00 AM-18:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Martes</div>
                                        <div class="col">8:00 AM-18:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Miércoles</div>
                                    <div class="col">8:00 AM-18:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Jueves</div>
                                    <div class="col">8:00 AM-18:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Viernes</div>
                                    <div class="col">8:00 AM-18:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Sábado</div>
                                    <div class="col">9:00 AM-17:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Domingo</div>
                                    <div class="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cerrado</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page.jpg" alt="Vista exterior del centro comercial Zorzal" id="imagenesShopping" class="img-fluid">
                        </div>
                        <div class="carousel-item">
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page_2.jpg" alt="Interior del centro comercial mostrando tiendas" class="img-fluid imagen2">
                        </div>
                        <div class="carousel-item">
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page_3.jpg" alt="Zona de descanso en el centro comercial" class="img-fluid">
                        </div>
                    </div>
                    <button class="carousel-control-prev background-color-white" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
        
    <!--Promociones -->
    <div class="contenedorEspecial">
        <div class="conteiner numero2"> 
            <div class="row">
                <h1 class="titulo">Promociones destacadas</h1>
                <?php
                    date_default_timezone_set('America/Argentina/Buenos_Aires');
                    $dia_actual = date('w');

                    include("../BasesDeDatos/UnicaBaseDeDatos.php");
                    $sql = "SELECT promociones.id, promociones.nombre, promociones.descripcion, promociones.categoriaMin, locales.nombre AS local_nombre FROM promociones 
                    JOIN locales ON promociones.codLocal = locales.id WHERE
                     SUBSTRING(diasValidos, $dia_actual + 1, 1) = '1' AND
                    fechaDesde <= CURDATE() AND fechaHasta >= CURDATE() AND promociones.estadoPromo = 'aprobada'
                    ORDER BY promociones.id DESC LIMIT 4";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                        <div class="col-12 col-sm-6 col-md-3 mt-2 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                <h3 class="h5 card-title">' . $row["nombre"] . '</h3>
                                <strong><i>'. $row['categoriaMin'] . '</i></strong>
                                <p class="card-text">' . $row["descripcion"] . '</p>

                                </div>
                                <div class="card-footer">
                                    <div class="text-body-secondary small">
                                        <b> De: ' . $row["local_nombre"] .'</b>
                                        <form action="../Logeo/Iniciar_sesion.php" method="get">
                                            <button class="botonPromo" aria-label="Inspeccionar promocion"><i class="fas fa-arrow-right iconoPromo"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                        } 
                    } else { 
                        echo "No hay promociones disponibles.";
                        } 
                    //$conn->close();
                ?>
            </div>
        </div>
    </div>
    <!-- Nuestros locales -->
    <?php
        //include("../BasesDeDatos/UnicaBaseDeDatos.php");

        // Procesar el formulario de filtro
        $buscarLocal = isset($_POST['buscarLocal']) ? $_POST['buscarLocal'] : '';
        $filtros = isset($_POST['categorias']) ? $_POST['categorias'] : [];

        $sql = "SELECT id, nombre, imagen_url, descripcion FROM locales WHERE 1=1";

        // Agregar condición de búsqueda si se ha ingresado un nombre de local
        if (!empty($buscarLocal)) {
            $buscarLocal = $conn->real_escape_string($buscarLocal);
            $sql .= " AND nombre LIKE '%$buscarLocal%'";
        }

        
        // Agregar condición de filtro si hay categorías seleccionadas
        if (!empty($filtros) && !in_array('Todos', $filtros)) {
            $filtro_sql = implode("','", $filtros);
            $sql .= " AND rubroLocal IN ('$filtro_sql')";
        }

        $result = $conn->query($sql);

    ?>
    <div id="locales" class="conteiner numero3"> 
        <div class="row">
            <div class="col-12">
                <div class="inputContainer">
                    <form action="PrincipalAdmin.php#locales" method="post" class="buscarNombre">
                        <div role="alert" class="visually-hidden">Si no encuentra resultados, intente con otro nombre</div>
                        <button class="botonLupa" aria-label="Buscar local por nombre" type="submit">
                            <i class="fas fa-search iconoLupa"></i>
                        </button>
                        <label for="buscarLocal" class="visually-hidden">Buscar local por nombre</label>
                        <input class="inputGrande" type="text" placeholder="Ingrese nombre del local" 
                            name="buscarLocal" id="buscarLocal" aria-label="Ingrese nombre del local">
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" 
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" 
                                        aria-expanded="false" aria-controls="collapseOne">Filtrar por categoria</button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form action="PrincipalAdmin.php#locales" method="post">
                                                
                                                <fieldset> 
                                                    <legend>Rubro del Local</legend>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="Categorias" name="categorias[]" value="Todos">
                                                        <label class="form-check-label reducirCategorias" for="Categorias">Todos</label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="Categoria1" name="categorias[]" value="Indumentaria">
                                                        <label class="form-check-label reducirCategorias" for="Categoria1">Indumentaria</label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="Categoria2" name="categorias[]" value="Comida">
                                                        <label class="form-check-label reducirCategorias" for="Categoria2">Gastronomía</label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="Categoria3" name="categorias[]" value="Perfumeria">
                                                        <label class="form-check-label reducirCategorias" for="Categoria3">Perfumeria</label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="Categoria4" name="categorias[]" value="Óptica">
                                                        <label class="form-check-label reducirCategorias" for="Categoria4">Óptica</label>
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        <button class="btn btn-dark text-white w-100 w-md-50" type="submit" value="Filtro" name="Filtro" aria-label="Aplicar Filtro">Filtrar</button>
                                                    </div> 
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 mt-3">
                <div class="row">
                    <?php
                    /*<!-- Abrir base de datos -->
                    include("../BasesDeDatos/BaseDeDatos_Locales.php");
                    $sql = "SELECT id,nombre, imagen_url, descripcion FROM locales";
                    $result = $conn->query($sql);
                    */
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <div class="col-6 col-md-4 mb-3"> 
                                <div class="card mb-3 presentacionLocal  h-100"> 
                                    <div class="img-container">
                                        <img src="' . $row["imagen_url"] . '" class="card-img-top" alt="' . $row["nombre"] . '">
                                    </div>
                                    <div class="card-body d-flex flex-column"> 
                                        <h3 class="h5 card-title text-center">' . $row["nombre"] . '</h3> 
                                        <div class="flex-grow-1">
                                            <p class="text-center">' . truncar_cadena($row["descripcion"]) . '</p> 
                                        </div>
                                        <form action="detallesLocal.php" method="get">
                                        <div class="text-center mt-3"> 
                                                <input type="hidden" name="id" value="' . $row["id"] . '">
                                                <button class="btn btn-primary botonLocales" type="submit" aria-label="Conocer más detalles del local seleccionado">Conocer más</button> 
                                        </div> 
                                        </form>
                                    </div> 
                                </div> 
                            </div>';
                        } 
                    } else { 
                        echo "No hay locales disponibles.";
                        } 
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
        function truncar_cadena($cadena, $limite = 50) {
            if (strlen($cadena) <= $limite) {
                return $cadena;
            }
        
            $corte = strrpos(substr($cadena, 0, $limite), ' ');
        
            if ($corte !== false) {
                return substr($cadena, 0, $corte) . '...';
            }
            return substr($cadena, 0, $limite) . '...';
        }
        
        include("../Include/footer.php");
    ?>
</body>
</html>
