<?php 
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="Logo_shopping.ico" type="image/x-icon">
    <link rel="stylesheet" href="home_Page.css">
    <title>Principal</title>
</head>
<body>
    <div class="conteiner numero1">
        <div class="row">
            <div class="col-8">
                <div class="conteiner introduccion">
                    <div class="row">
                        <h1>Zorzal Centro Comercial!!</h1>
                    </div>
                    <div class="row">    
                        <div class="col-6 separadorVertical centrar">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia tenetur aut sed consectetur velit debitis blanditiis eaque. Unde optio, porro, consequatur similique vero cupiditate ea animi qui voluptate hic voluptas.
                            Facere rerum at consequatur. Nostrum pariatur provident deserunt natus dolorem recusandae ullam cum molestias, ipsam quod ex minus nemo velit accusantium in? Quam voluptas laborum neque, consequuntur blanditiis debitis nulla?</p>
                        </div>
                        <div class="col-6">
                            <div class="container">
                                <div class="row">
                                    <h3>Horarios de Apertura:</h3>
                                </div>
                                <div class="row">
                                    <div class="col">Lunes</div>
                                    <div class="col">8:00 AM - 18:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Martes</div>
                                    <div class="col">8:00 AM - 18:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Miércoles</div>
                                    <div class="col">8:00 AM - 18:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Jueves</div>
                                    <div class="col">8:00 AM - 18:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Viernes</div>
                                    <div class="col">8:00 AM - 18:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Sábado</div>
                                    <div class="col">9:00 AM - 17:00 PM</div>
                                </div>
                                <div class="row">
                                    <div class="col">Domingo</div>
                                    <div class="col" style="text-align: center;">Cerrado</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 " class="imagen-de-homePage">
                <img src="Zorzal_Imagen_Home_Page.jpg" alt="Imagen del shopping" class="img-fluid" title="Imagen del shopping">
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
    <div class="conteiner numero3" style="background-color: gray;" > <!--eliminar style -->
        <div class="row">
            <div class="col-4">Filtro <i class="fas fa-dove fa-2x"></i>
            <div class="col-8">
                <div class="card mb-3" style="width: 200px;" > <!--eliminar style -->
                    
                    <img style="height: 300px;" src="https://th.bing.com/th/id/OIP.gBcVrZheZDhus8BGgSKg8wHaHa?w=166&h=180&c=7&r=0&o=5&dpr=1.1&pid=1.7" class="card-img-top" alt="Imagen utn">
                    <div class="card-body">
                        <h5 class="card-title">Logo de la UTN</h5>
                        <p class="card-text">Universidad Tecnológica Nacional</p>
                        <a class="btn btn-primary" href="#" role="button">Link</a>  
                    </div>
                </div>
            </div>
        </div>
        <!-- <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav> -->
     
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php 
    include("footer.html");
?>

