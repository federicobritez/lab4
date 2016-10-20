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
      $menu = null;
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
          $_SESSION["Menu"] = $menu;
      }
      

    ?>
   <div class="container body">
      <div class="main_container">
          <div class="menu_section">
            <div class="col-lg-3">
              <h3>Menu Vertical</h3>
                  <?php
                    //Despliega el menu en forma Vertical
                    $_SESSION["Menu"]->getHTMLMenuVertical(); 
                  ?>
            </div>
          </div>

          <div class="menu_section">
            <div class="col-lg-12">
            <h3>Menu Horizontal</h3>
            <?php
                  //Pruebo borrar un item 
                  $_SESSION["Menu"]->borrarItem(3);

                  //Despliego el menu en forma Horizontal
                  $_SESSION["Menu"]->getHTMLMenuHorizantal(); 
            ?>
          </div>
      </div>  
      <hr>

      <div class="menu_section">
        <div class="col-lg-8">
          <div class="well bs-component">
            <form class="form-horizontal" action="formAbm.php?opcion=agregar" method="POST">
              <fieldset>
                <legend>Agregar</legend>
                <div class="form-group">
                  <label for="inputEtiqueta" class="col-lg-2 control-label">Etiqueta</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputEtiqueta" placeholder="Etiqueta">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputURL" class="col-lg-2 control-label">URL</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputURL" placeholder="URL">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
              </fieldset>

            </form>
          </div>
          <br>                    
          <hr>

           <div class="well bs-component">
            <form class="form-horizontal" action="formAbm.php?opcion=modificar" method="POST">
              <fieldset>
                <legend>Modificar</legend>

                  <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Selects</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select">
                        <?php
                          $Menu = $_SESSION["Menu"];

                          $i = 0;
                          foreach ($Menu->getItems() as  $itemMenu) {

                             echo '<option value="'.$i.'">'.$itemMenu->getNombre().'</option>';
                              $i++;
                          }

                        ?>
                    </select>
                    <br>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEtiqueta" class="col-lg-2 control-label">Nueva Etiqueta</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputEtiqueta" placeholder="Etiqueta">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputURL" class="col-lg-2 control-label">Nueva URL</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputURL" placeholder="URL">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
              </fieldset>

            </form>
          </div>

           <br>                    
          <hr>

           <div class="well bs-component">
            <form class="form-horizontal" action="formAbm.php?opcion=eliminar" method="POST">
              <fieldset>
                <legend>Eliminar</legend>

                  <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Selects</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select">
                         <?php
                          $Menu = $_SESSION["Menu"];

                          $i = 0;
                          foreach ($Menu->getItems() as  $itemMenu) {

                             echo '<option value="'.$i.'">'.$itemMenu->getNombre().'</option>';
                              $i++;
                          }

                        ?>
                    </select>
                    <br>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Eliminar</button>
              </fieldset>
            </form>
          </div>

        </div>
      </div>
      
      </div>
  </body>