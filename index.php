<?php
require_once('encabezado.php'); // encabezado
require_once('inc/func/funciones.php'); // funciones
$a_multi_asoc_productos = LeerArrayJson('json', 'productos.json'); 
$a_multi_asoc_Lanzamientos = LeerArrayJson('json', 'proximosLanzamientos.json'); 
$contador=0;
?>
    
    <main>
    

        <div class="container">
            <section class="seccion">   
                <h1 class="mt-md-3  mt-3 text-titulo">Próximos lanzamientos</h1>

                <?php
                for($i=count($a_multi_asoc_Lanzamientos); $i >= 1; $i--) { 
                    $contador++;
                    if($contador < 3 ){
                ?>

                <div class="col-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h2 class="text-center"><?php print($a_multi_asoc_Lanzamientos[$i]['nombre']);    ?></h2>
                            <p><?php print($a_multi_asoc_Lanzamientos[$i]['descripcion']);?></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <figure class="figure">
                                <img class="figure-img rounded d-block w-100" src=<?php print($a_multi_asoc_Lanzamientos[$i]['imagen']);?> alt="Juego">
                                <figcaption class="figure-caption">
                                    <p>Trailer del producto publicado en <a href=<?php print($a_multi_asoc_Lanzamientos[$i]['trailer']);?> target="new">Youtube</a></p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <?php
                }
                    }
                ?>

            </section>

            <section>
                <h2 class="pb-3 mt-4  text-titulo">Ultimos productos</h2>
                <div class="row">
                    <?php for($i=count($a_multi_asoc_productos)-2; $i<= count($a_multi_asoc_productos); $i++) { ?>
                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card">
                                <img class="card-img-top" src=<?php print($a_multi_asoc_productos[$i]['foto'] )?> alt="">
                                <div class="card-body">
                                    <h2 class="h4 card-title"><?php print($a_multi_asoc_productos[$i]['nombre'])?></h2>
                                    <p class="card-text">
                                        <p>Descripcion:<?php $tex=$a_multi_asoc_productos[$i]['descripcion']; 
                                        echo substr($tex, 0,20); ?></p>
                                         <p>Precio: <?php print($a_multi_asoc_productos[$i]['precio'])?></p>
                                    </p>
                                </div>
                                <div class="card-footer">
                                <a href="paginas/detalleproducto.php?pagina=detalleproducto&variable=<?php echo $a_multi_asoc_productos[$i]['id_producto'];?>"> <p class="btn btn-gris">Mas detalles</p></a>
                                </div>
                            </div>
                                </div>

                    <?php } ?>
                </div>

                      
            </div>
            </section>
        </div>


    </main>
    <?php
    require_once('pie.php');
    ?> 
