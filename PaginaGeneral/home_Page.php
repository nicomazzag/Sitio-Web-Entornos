<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="home_Page.css">
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
        include("../Include/header.php");
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
                            <h3 class="reducir">Horarios de Apertura:</h3>
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
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page.jpg" alt="Imagen del shopping" id="imagenesShopping" class="img-fluid" title="Imagen del shopping">
                        </div>
                        <div class="carousel-item"> <!--Cambiar imagenes -->
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page_2.jpg" alt="Imagen del shopping" id="imagenesShopping" class="img-fluid" title="Imagen del shopping">
                        </div>
                        <div class="carousel-item"> <!--Cambiar imagenes -->
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page.jpg" alt="Imagen del shopping" id="imagenesShopping" class="img-fluid" title="Imagen del shopping">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
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
    <!-- Promociones -->
    <div class="conteiner numero2 espacio"> 
        <div class="row">
            <div class="col-md-6">
                <div class="conteiner promociones">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="titulo">Promociones</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Descubre las mejores promociones de Zorzal Centro Comercial!!</p>
                            <p>Nuestras mejores promociones del momento. No dejes pasar la oportunidad!!</p>
                            <div class="centrar">
                                <i class="fas fa-arrow-right "></i>
                                <i class="fas fa-arrow-right "></i>
                                <i class="fas fa-arrow-right "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" >
                <div class="conteiner ">
                    <div class="row">
                        <div class="col-12">
                            <div id="carouselExampleCaptions" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://th.bing.com/th/id/OIP.BwLjKdv-fdzPs2vOwIzpBAHaJL?pid=ImgDet&w=202&h=250&c=7&dpr=1,1" class=" w-100 imgPromos" alt="promocion">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>First slide label</h5>
                                            <p>Some representative placeholder content for the first slide.</p>
                                        </div>
                                    </div>
                                <div class="carousel-item">
                                    <img src="https://th.bing.com/th/id/OIP.BwLjKdv-fdzPs2vOwIzpBAHaJL?pid=ImgDet&w=202&h=250&c=7&dpr=1,1" class=" w-100 imgPromos" alt="promocion">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                        <p>Some representative placeholder content for the second slide.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://th.bing.com/th/id/OIP.BwLjKdv-fdzPs2vOwIzpBAHaJL?pid=ImgDet&w=202&h=250&c=7&dpr=1,1" class=" w-100 imgPromos" alt="promocion">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                        p>Some representative placeholder content for the third slide.</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Nuestros locales -->
    <div id="locales" class="conteiner numero3"> 
        <div class="row">
            <div class="col-12">
                <div class="inputContainer">
                    <form action="home_Page.php" class="buscarNombre">
                        <button class="botonLupa" aria-labelledby="Ingrese nombre del local" 
                        for="buscarLocal"><i class="fas fa-search iconoLupa"></i></button> 
                        <input class="inputGrande" type="text" placeholder="Ingrese nombre del local" 
                        aria-placeholder="Ingrese nombre del local" 
                        name="buscarLocal" id="buscarLocal" required>
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
                                        aria-expanded="false" aria-controls="collapseOne">Filtrar por...</button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form action="home_Page.php" method="post">
                                                <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                  <label class="form-check-label reducirCategorias" for="flexSwitchCheckChecked">Todos</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label reducirCategorias" for="flexSwitchCheckDefault">Indumentaria</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label reducirCategorias" for="flexSwitchCheckDefault">Gastronomia</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label reducirCategorias" for="flexSwitchCheckDefault">Deportivo</label>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label reducirCategorias" for="flexSwitchCheckDefault">Otros</label>
                                                </div>
                                                <div class="text-center espacio">
                                                    <button class="btn btn-dark text-white w-100 w-md-50" type="submit" value="Filtro" name="Filtro" aria-label="Aplicar Filtro">Filtrar</button>
                                                </div> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 espacio">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center espacio">
                                    <button class="botonLocales" type="submit">Conocer más</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center espacio">
                                    <button class="botonLocales" type="submit">Conocer más</button>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 ">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center espacio">
                                    <button class="botonLocales" type="submit">Conocer más</button>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center espacio">
                                    <button class="botonLocales" type="submit">Conocer más</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center espacio">
                                    <button class="botonLocales" type="submit">Conocer más</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center espacio">
                                    <button class="botonLocales" type="submit">Conocer más</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        include("../Include/footer.php");
    ?>
</body>
</html>