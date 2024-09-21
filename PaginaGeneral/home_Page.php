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
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page.jpg" alt="Imagen del shopping" class="img-fluid" title="Imagen del shopping">
                        </div>
                        <div class="carousel-item"> <!--Cambiar imagenes -->
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page.jpg" alt="Imagen del shopping" class="img-fluid" title="Imagen del shopping">
                        </div>
                        <div class="carousel-item"> <!--Cambiar imagenes -->
                            <img src="../Imagenes/Zorzal_Imagen_Home_Page.jpg" alt="Imagen del shopping" class="img-fluid" title="Imagen del shopping">
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
    <!-- Parte de la paginación de promociones -->
    <div class="conteiner numero2" style="background-color: red;" > <!--eliminar style -->
        <div class="row">
            <h2>Promociones</h2>
        </div>
    </div>
    <!-- Nuestros locales -->
    <div id="locales" class="conteiner numero3" style="background-color: white;" > 
        <div class="row">
            <div class="col-12 col-md-3" style="background-color: blue;">Filtro <i class="fas fa-dove fa-2x"></i></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center">
                                    <button class="btn btn-dark text-white" style="border: 1px solid black;" type="submit">Conocer más</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center">
                                    <button class="btn btn-dark text-white" style="border: 1px solid black;" type="submit">Conocer más</button>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 ">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center">
                                    <button class="btn btn-dark text-white" style="border: 1px solid black;" type="submit">Conocer más</button>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center">
                                    <button class="btn btn-dark text-white" style="border: 1px solid black;" type="submit">Conocer más</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center">
                                    <button class="btn btn-dark text-white" style="border: 1px solid black;" type="submit">Conocer más</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="card mb-3 presentacionLocal">
                            <img src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                            <div class="card-body">
                                <h5 class="card-title text-center">Local Predeterminado</h5>
                                <div class="text-center">
                                    <button class="btn btn-dark text-white" style="border: 1px solid black;" type="submit">Conocer más</button>
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

        <!-- <div class="row">
            <div class="col-12 col-md-2" style="background-color: blue;">Filtro <i class="fas fa-dove fa-2x"></i></div>    
            <div class="col-12 col-md-10">
                <div class="conteiner">
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <div class="card mb-3 presentacionLocal"> 
                                <img style="height: 300px;" src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                                <div class="card-body">
                                    <h5 class="card-title">Local Predeterminado</h5>
                                    <p class="card-text">Breve descripcion local predeterminado</p>
                                    <a class="btn btn-primary" href="#" role="button">Conocer más</a>  
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="card mb-3 presentacionLocal"> 
                                <img style="height: 300px;" src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                                <div class="card-body">
                                    <h5 class="card-title">Local Predeterminado</h5>
                                    <p class="card-text">Breve descripcion local predeterminado</p>
                                    <a class="btn btn-primary" href="#" role="button">Conocer más</a>  
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="card mb-3 presentacionLocal"> 
                                <img style="height: 300px;" src="https://prd-contents.smsupermalls.com/data/2024/09/66de52a53ac991725846181.jpg" class="card-img-top" alt="Imagen utn">
                                <div class="card-body">
                                    <h5 class="card-title">Local Predeterminado</h5>
                                    <p class="card-text">Breve descripcion local predeterminado</p>
                                    <a class="btn btn-primary" href="#" role="button">Conocer más</a>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->