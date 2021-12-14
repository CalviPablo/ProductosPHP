<?php


function MostrarArray($array)  // muestra un array
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function GrabarArrayJson($carpeta, $nombre_archivo, $array) // guarda un array en la carpeta deseada, si no existe se crea
{
    if (!file_exists($carpeta)) {
        mkdir($carpeta);
    }
    $fp  = fopen($carpeta . '\\' . $nombre_archivo, 'w');
    fwrite($fp, json_encode($array));
    fclose($fp);
}


function LeerArrayJson($carpeta, $nombre_archivo)  // lee arrays de formato json y devuelve un array
{

    $fp  = fopen($carpeta . '\\' . $nombre_archivo, 'r');
    $json =  fread($fp, filesize($carpeta . '\\' . $nombre_archivo));

    fclose($fp);
    $array = json_decode($json, true);
    return $array;
}

function Incremento($array)
{

    $num = count($array);
    $num = $num + 1;
    return $num;
}


function MandarMensaje($carpeta, $nombre_archivo, $array)  // mandar mensajes de contacto
{


    if (isset($_POST["submit"])) { // si isset submit existe  >> *1   >> *2

        if (!file_exists($carpeta)) {   // si no existe la carpeta la crea   *1
            GrabarArrayJson($carpeta, $nombre_archivo, $array);
        }
        $array = LeerArrayJson($carpeta, $nombre_archivo); // lee el json y devuelve un array
        $array[Incremento($array)] = // aumenta el array en 1 
            [
                'nombre' => $_POST["nombre"],  //define donde guarda cada dato en el json
                'apellido' => $_POST["apellido"],
                'mail' => $_POST["mail"],
                'telefono' => $_POST["telefono"],
                'mail_empresa' => $_POST["area_empresa"],
                'comentario' => $_POST["comentario"]
            ];
        GrabarArrayJson($carpeta, $nombre_archivo, $array);  // guarda los datos en el json
        echo "Mensaje enviado"; // devuelve un mensaje de enviado al apretar submit
    }
}


function ObtenerCategoria() // obtiene la categoria para mostrar el filtro de los productos.
{

    $id_cat = '1';
    if (isset($_GET['id_categoria'])) // si id categoria existe
        $id_cat = $_GET['id_categoria']; // id_cat es id_categoria

    return $id_cat;
}

function comprobar($carpeta, $nombre_archivo, $arrayComentarios, $id_producto) // comprueba si existe carpeta nombre comentario y producto  si no existe crea. metodo post para comeentar y guarda en json.
{

    if (isset($_POST["submit"])) { // si submit en post existe  >> *1   >> *2
        if (!file_exists($carpeta)) { //  *1 si no existe la carpeta la crea
            GrabarArrayJson($carpeta, $nombre_archivo, $arrayComentarios);
        }

        //*2 si existe la carpeta >> lee el Json de comentarios
        $arrayComentarios = LeerArrayJson($carpeta, $nombre_archivo);
        $arrayComentarios[incremento($arrayComentarios)] = //incrementa el comentario en 1
            [
                'nombre' => $_POST["nombre"],
                'mail' => $_POST["mail"],
                'puntaje' => $_POST["puntaje"],
                'comentario' => $_POST["comentario"],
                'producto' => $id_producto
            ];
        GrabarArrayJson($carpeta, $nombre_archivo, $arrayComentarios); // guarda el comentario
    }
    mostrarcomentario($carpeta, $nombre_archivo, $arrayComentarios, $id_producto); // muestra el comentario x
}

function mostrarcomentario($carpeta, $nombre_archivo, $arrayComentarios, $id_producto) // muestra los ultimos 3 comentarios creados con un for. hasta 3 comentarios, junto su p
{

    $contador = 0;
    if (!file_exists($carpeta)) { // si no existe la carpeta la crea
        GrabarArrayJson($carpeta, $nombre_archivo, $arrayComentarios);
    }

    for ($i = count($arrayComentarios); $i >= 1; $i--) { // mientras la cantidad de comentarios sea mayor o igual a 1 muestra los comentarios de ultimo a primero
        if ($arrayComentarios[$i]['producto'] == $id_producto and $contador < 3) { // un if para que solo muestre 3 comentarios.
            $contador = $contador + 1;
            echo "<br>";
?>
            <p> <b>Nombre:</b> <?php print($arrayComentarios[$i]['nombre']) ?> ||
                <b>Puntuacion:</b> <?php print($arrayComentarios[$i]['puntaje']) ?>
            </p>
            <p>
                <b> Comentario: </b><?php print($arrayComentarios[$i]['comentario']) ?>
            </p>

<?php
        }
    }
}

?>