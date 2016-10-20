<!DOCTYPE html>
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

    <?php
      include("clases.php"); // El archivo que contiene las clases
      session_start();  //Inicia la  session 
      //Si la session aun no tiene los menu , cargo algunos por default
      if(! array_key_exists("Menu", $_SESSION)){  
          //Creo un menu 
          $menu = new Menu();

          // Agrego items genéricos al menu .
          for ($i=0; $i < 5; $i++) { 
            //Primero creo una instancia de un menuItem
            $item = new MenuItem($i, "Menu".$i, "page_".$i.".php");
            //La agrego al menu
            $menu->agregarItem($item);
          }

      }
      

    ?>
   <div class="container body">
      <div class="main_container">
          <div class="menu_section">
            <div class="col-lg-3">
              <h3>Menu Vertical</h3>
                  <?php
                    //Despliega el menu en forma Vertical
                    $menu->getHTMLMenuVertical(); 
                  ?>
            </div>
          </div>

          <div class="menu_section">
            <div class="col-lg-12">
            <h3>Menu Horizontal</h3>
            <?php
                  //Pruebo borrar un item 
                  $menu->borrarItem(3);

                  //Despliego el menu en forma Horizontal
                  $menu->getHTMLMenuHorizantal(); 
            ?>
          </div>
      </div>  
      <hr>

      <div class="menu_section">
        <div class="col-lg-12">

          <a href="formAbm.php?opcion=agregar" class="btn btn-default">Agregar</a>
          <a href="formAbm.php?opcion=eliminar" class="btn btn-primary">Eliminar</a>
          <a href="formAbm.php?opcion=modificar" class="btn btn-success">Modificar</a>
        </div>
      </div>
      
      </div>
  </body>