<footer>
    <div class="container-fluid" style="background-color: #111;">
        <div class="row" style="border: 1px solid white;"> 
            <!--IMP! d-none d-md-block combinados estamos estableciendo 
            un display-none para todos los tipos de pantalla pero un 
            display-block apartir de tamaños >md-->
            <div class="col-md-3 d-none d-md-block" 
            style="background-color: #111; color: white; padding-top: 5px; padding-bottom: 5px;">
                <div class="m-auto" style="width: 100%;">
                    <h4 id="mapa">Donde estamos</h4>
                    <p>Junín 501, S2000 Rosario, Santa Fe.</p>
                    <iframe class="w-100" aria-labelledby="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26788.706247067246!2d-60.68548326545409!3d-32.93547449898199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b654abc3ab1d5f%3A0x2f90ce97db2c5a6!2sAlto%20Rosario%20Shopping.!5e0!3m2!1ses-419!2sar!4v1726094911163!5m2!1ses-419!2sar"
                     height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div id="LinkGoogle" class="text-center" style="margin-top: 5px;">
                        <a aria-label="Link hacia mapa completo" style="text-decoration: none; border: 1px solid white; 
                        background-color: #111; color: white; padding: 0.2em 1em; border-radius: 0.5em;" 
                        href="https://maps.app.goo.gl/29xJiUwYj7yvUFw38">Ampliar Mapa</a>
                        <!-- <button class="btn btn-dark text-white" style="border: 1px solid white;">Ampliar mapa</button> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 text-white sacar_borde_derecho sacar_borde_superior">
                <h4>Página</h4>
                <ul>
                    <li><a aria-label="Link hacia inicio" href="../PaginaGeneral/home_Page.php">Inicio</a></li>
                    <li><a aria-label="Link hacia nuestros locales" href="#nuestrosLocales">Nuestros Locales</a></li>
                    <li><a aria-label="Link hacia promociones" href="../PaginaGeneral/Promociones.php">Promociones</a></li>
                    <li><a aria-label="Link hacia novedades" href="../PaginaGeneral/Novedades.php">Novedades</a></li>
                    <li><a aria-label="Link hacia resgistrarse" href="../Logeo/Iniciar_sesion.php">Registrarse</a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-3 text-white sacar_borde_superior">
                <h4>Sobre nosotros</h4>
                <ul> <!--Los iconos son usando Font awesome(página con miles de iconos)-->
                    <li><i class="fas fa-phone"></i> (+54) 341-233-4037</li>
                    <li><i class="fas fa-map-marker-alt"></i> Junín 501</li>
                    <li><i class="fas fa-envelope"></i>
                        <a aria-label="Correo electrónico" href="mailto:nicomazzaglia2005@gmail.com.ar"></a>
                            info.shop@gmail.com
                    </li> <!--Cambiar a mail de la pagina-->
                </ul>
                <div style="margin-bottom: 5px;">
                    <h5>Seguinos en</h5>
                    <i class="fab fa-instagram fa-2x"><a aria-label="Nuestro Instagram" href="https://maps.app.goo.gl/29xJiUwYj7yvUFw38"></a></i> 
                    <!--Cambiar a link de instagram-->
                </div>
            </div>
            <div class="col-12 col-md-3 sacar_borde_superior">
                <h4 id="contactanos" style="color: white;">Contáctanos</h4>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <label aria-labelledby="contactanos" for="mail" style="color: white;">Ingrese su mail:</label> 
                    <br>
                    <input class="w-100" type="email" placeholder="Ingrese su mail"  
                    name="mail" id="mail" required style="border: 2px solid gray;">
                    <label for="descripcion" style="color: white; width: 100%;">De una descripción de su problema/asunto:</label>
                    <br>
                    <textarea aria-labelledby="contactanos" class="w-100" name="descripcion" id="descripcion" 
                    placeholder="Ingrese una breve descripción" required style="height: 4em; border: 2px solid gray;"></textarea>
                    <br>
                    <br>
                    <div class="text-center">
                        <button class="btn btn-dark text-white w-100 w-md-50" style="border: 1px solid white;" type="submit" value="Enviar" name="enviar" aria-label="Enviar Formulario">Enviar</button>
                    </div>   
                </form>
                <?php
                    include("correo.php");
                ?>
            </div>
            <div class="container text-center text-white" style="margin-top: 5px;">
                <hr class="separator" style="border: 1px solid white; width: 95%; margin: 0 auto;">
                <p>Copyright © 2024 Zorzal. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>






