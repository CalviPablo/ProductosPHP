<?php  
require_once('..//inc\func\funciones.php');
require_once('encabezado.php');
$a_multi_asoc_contactos=[];
?>
    <main>
        <section class="container seccion">
            <h1 class="mt-md-3  mt-3 text-titulo">Contacto</h1>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div>
                        <h2>Datos del local</h2>
                        <p><i class="far fa-clock"></i> Horario: Lunes a Sábados de 10 a 20 hs</p>
                        <p><i class="fas fa-mobile-alt"></i> Teléfono: 0800-123-1234</p>
                        <p><i class="fas fa-map-marked"></i> Dirección: Florida 537, Galeria Jardin, Local 123 </p>
                        <div class="embed-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13136.412312619494!2d-58.3748054!3d-34.6015549!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x66ea6e648f46a49a!2zR2FsZXLDrWEgSmFyZMOtbg!5e0!3m2!1ses!2sar!4v1596148176816!5m2!1ses!2sar"  allowfullscreen="" aria-hidden="true" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div>
                        <h3 class="h2">Consultas Generales</h3>
                        <div class="row">
                        <form action="" <?php echo $_SERVER['PHP_SELF']; ?> method="post"> 
                            <p>Nombre: <input type="text" name="nombre"  required></p>
                            <p>Apellido: <input type="text" name="apellido" required></p>
                            <p>Mail: <input type="text" name="mail"  required></p>
                            <p>Telefono: <input type="text" name="telefono" ></p>
                            <p>Área de la empresa : <select name="area_empresa" >
                                    <option value="ventas@gmail.com" selected="selected">Ventas</option>  
                                    <option value="consultas@gmail.com">Consultas</option>
                                    <option value="reclamos@gmail.com">Reclamos</option>
                                </select> <br><br>
                            </p>
                            <p>Comentarios</p>
                            <textarea name="comentario" placeholder="Comentario" cols="40" rows="4" required></textarea><br><br>

                            <input type="submit" name="submit" value="Enviar">
                          
                        </form>
                        
                        </div>
                    </div>
                    <?php
                         MandarMensaje('../json','contactos.json', $a_multi_asoc_contactos);
                    ?>
                </div>
            
            </div>
        </section>
    </main>
    
<?php
require_once('pie.php');
?>
 