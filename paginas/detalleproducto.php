<?php 
require_once('encabezado.php');
require_once('../inc/func/funciones.php');

$a_multi_asoc_productos = LeerArrayJson('../json', 'productos.json');
$id_producto=$_REQUEST['variable'];
$a_multi_asoc_comentarios=[];
$a_multi_asoc_comentarios = LeerArrayJson('../json', 'comentarioproducto.json', $a_multi_asoc_comentarios);


?>

<main>
    <section class="container seccion">
        <h1 class="mt-md-3  mt-3 text-titulo">Detalles del producto</h1>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <img class="card-img-top" src=<?php print("../".$a_multi_asoc_productos[$id_producto]['foto']) ?> alt=""> 
                    <p> Nombre del producto: <?php print($a_multi_asoc_productos[$id_producto]['nombre']) ?></p>
                    <p> Precio: <?php print($a_multi_asoc_productos[$id_producto]['precio']) ?> </p>
                    <p> Descripcion: <?php print($a_multi_asoc_productos[$id_producto]['descripcion']) ?> </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div>
                    <h3 class="h2">Deja tu comentario</h3>
                    <form action="" <?php echo $_SERVER['PHP_SELF']; ?> method="post">
                        <p>Nombre: <input type="text" name="nombre" required></p>
                        <p>Mail: <input type="text" name="mail" required></p>
                        <p>Puntaje: 
                            <select name="puntaje">
                                <option value="1" selected="selected">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select> <br><br>
                        </p>
                        <p>Comentario: </p>
                        <textarea name="comentario" placeholder="Comentario" cols="40" rows="4" required></textarea><br><br>
                        <input type="submit" name="submit" value="Enviar">
                        
                    </form>              
                      
                </div>
                <?php
                    comprobar('../json', 'comentarioproducto.json', $a_multi_asoc_comentarios,$id_producto);
                ?>
            </div>
        </div>
    </section>
</main>



<?php
require_once('pie.php'); 
?>