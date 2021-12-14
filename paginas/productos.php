<?php
require_once('encabezado.php');
require_once('../inc/func/funciones.php');
$a_multi_asoc_productos = LeerArrayJson('../json', 'productos.json');
$a_multi_asoc_categorias =  LeerArrayJson('../json', 'categorias.json');
$id_cat = ObtenerCategoria();
?>
<main>
    <section class="container seccion">
        <h1 class="mt-md-3  mt-3 text-titulo">Productos</h1>
        <div class="izquierda">
            <h2 class="mt-md-3 mt-3">Categorias</h1>
                <?php
                foreach ($a_multi_asoc_categorias  as $a_multi_asoc_categoria) { 
                    $cat_nombre = $a_multi_asoc_categoria['nombre'];  
                    $cat_id = $a_multi_asoc_categoria['id_categoria']; 
                    echo '<a href="productos.php?pagina=productos&id_categoria=' . $cat_id . '" >' . $cat_nombre . '</a>';
                    echo '<br>';
                }
                ?>
        </div>
        <div class="row">
            <?php foreach ($a_multi_asoc_productos  as $a_multi_asoc_producto) { 
                if ($a_multi_asoc_producto['id_categoria'] == $id_cat  or $id_cat == 1) { ?>    

                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card">
                            <img class="card-img-top" src=<?php print("../" . $a_multi_asoc_producto['foto']) ?> alt="">  
                            <div class="card-body">
                                <h2 class="h4 card-title"><?php print($a_multi_asoc_producto['nombre']) ?></h2>  
                                <p class="card-text">
                                    <p>Descripcion:<?php $tex = $a_multi_asoc_producto['descripcion'];    
                                                    echo substr($tex, 0, 20); ?></p>      
                                    <p>Precio: <?php print($a_multi_asoc_producto['precio']) ?></p> 
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="detalleproducto.php?pagina=detalleproducto&variable=<?php echo $a_multi_asoc_producto['id_producto']; ?>">
                                    <p class="btn btn-gris">Mas detalles</p>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php }
            }
            ?>
        </div>
    </section>
</main>

<?php
require_once('pie.php');
?>