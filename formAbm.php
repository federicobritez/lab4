<!DOCTYPE html>

<?php
    include("clases.php"); // El archivo que contiene las clases
    session_start();  //Inicia la  session 
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISTEMA DE INTERNOS  03624.2.3 </title>

    <!-- Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
   
    <!-- PNotify -->
    <link href="pnotify.css" rel="stylesheet">
    <link href="pnotify.buttons.css" rel="stylesheet">
    <link href="pnotify.nonblock.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <div class="menu_section">
            <div class="col-lg-3">
              <h3>Menu Vertical</h3>
              </div>
            </div>
        </div>
    </div>

    <?php
        
        //Recupero mi menu desde la variable Global Session
        $menu =  $_SESSION["Menu"];

        // Si hay una opción de la trato
        if(! isset($_REQUEST["opcion"])){
                echo "bada";
        }
        else{

            //Agregar un menu
            if($_REQUEST["opcion"] == "agregar"){

                //Información enviada por el formulario
                $etiqueta = $_REQUEST["etiqueta"];  //Etiqueta
                $url =      $_REQUEST["url"];       //URL

                //El codEnlace se genera con un hash :ver http://php.net/manual/es/function.hash.php
                $item = new MenuItem(hash($etiqueta.$url), $etiqueta,$url);

                //Agrego el item al menu
                $menu->agregarItem($item);

            }
            //Eliminar un item del  menu
            else if ($_REQUEST["opcion"] == "eliminar"){
                var_dump($_REQUEST);
                //Requiere la posición en el arreglo
                $posicion = $_REQUEST["posicion"];
                $menu->borrarItem($posicion);

            }
            else if ($_REQUEST["opcion"] == "modificar"){
                $etiqueta = $_REQUEST["etiqueta"];  //Etiqueta
                $url =      $_REQUEST["url"];       //URL
                $posicion = $_REQUEST["posicion"];

                //El codEnlace se genera con un hash :ver http://php.net/manual/es/function.hash.php
                $item = new MenuItem(hash($etiqueta.$url), $etiqueta,$url);

                $menu->modificarItem($item,$posicion);

            }

        }

        $_SESSION["Menu"] = $menu;
    ?>
    <a href="index.php" class="btn btn-default" >Ver cambios</a>

  </body>
