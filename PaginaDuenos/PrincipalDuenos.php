<?php 
    include("../Include/Sesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../Include/librerias.php");?>
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="../PaginaGeneral/home_Page.css">    
    <title>Principal</title>
</head>
<body>
    <?php
        if (!defined('NO_HEADER')) {
            include 'headerDuenos.php';
        }
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
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page.jpg" alt="Imagen del shopping" id="imagenesShopping" class="img-fluid">
                        </div>
                        <div class="carousel-item">
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page_2.jpg" alt="Imagen del shopping" class="img-fluid imagen2">
                        </div>
                        <div class="carousel-item">
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page_3.jpg" alt="Imagen del shopping" class="img-fluid">
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
                <h2 class="titulo">No te pierdas de lo mejor!!!</h2>
                <?php
                    date_default_timezone_set('America/Argentina/Buenos_Aires');
                    $dia_actual = date('w');

                    include("../BasesDeDatos/UnicaBaseDeDatos.php");
                    $sql = "SELECT promociones.id, promociones.nombre, promociones.descripcion, promociones.categoriaMin, locales.nombre AS local_nombre FROM promociones 
                    JOIN locales ON promociones.codLocal = locales.id WHERE
                     SUBSTRING(diasValidos, $dia_actual + 1, 1) = '1' AND
                    fechaDesde <= CURDATE() AND fechaHasta >= CURDATE() AND promociones.estadoPromo = 'aprobada'
                    AND locales.estado=1
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

        $sql = "SELECT id, nombre, imagen_url, descripcion FROM locales WHERE estado=1";

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
                    <form action="PrincipalDuenos.php#locales" method="post" class="buscarNombre">
                        <button class="botonLupa" aria-label="Buscar local por nombre" type="submit">
                            <i class="fas fa-search iconoLupa"></i>
                        </button>
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
                                            <form action="PrincipalDuenos.php#locales" method="post">
                                                
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
                                                <button class="btn btn-primary botonLocales" type="submit" aria-label="Inspeccionar local">Conocer más</button> 
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
