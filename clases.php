<?php

	Class MenuItem{

		public $codEnlace;
		public $nombre;
		public $url;

		public function __construct($cod, $nombre,$url ){

			$this->codEnlace = $cod;
			$this->nombre    = $nombre;
         	$this->url   	 = $url;
         	
		}

		public function getCodEnlace(){
			return $this->codEnlace;
		}


		public function getNombre(){
			return $this->nombre;
		}

		public function getUrl(){
			return $this->url;
		}

		public function getHTMLItem(){
			echo '<a href="'.$this->url.'" class="btn btn-default" >'.$this->nombre.'</a>';
			return;
		}


	}


	/*
		El menu tiene una coleccion de MenuItem
		Posee metodos para agregar e imprimir el menu
	*/
	Class Menu{
		public $aItems =array() ;

		public function __construct(){
		}

		public function agregarItem($item){
			array_push($this->aItems, $item);
		}

		public function getHTMLMenuVertical(){
			echo '<ul class="nav side-menu">

                  <li><a><i class="fa fa-edit"></i> Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
						foreach(  $this->aItems as $item){
							echo '<li>';
							$item->getHTMLItem();
							echo '</li>';
						}
			echo '</ul>
                  </li>
                </ul>';
		}

		public function getHTMLMenuHorizantal(){

			echo '<div class="btn-group btn-group-justified">';
  				foreach(  $this->aItems as $item){
					$item->getHTMLItem();
				}
			echo '</div>';
		}

		public function borrarItem($pos){	
			if($pos <= count($this->aItems) && $pos >=0){
				//Borro el elemento en el indice $pos
				unset($this->aItems[$pos]);
				//Como unset no me corre los indices, lo hago armando de nuevo el arreglo 
				// con los que quedaron.
				$this->aItems = array_values($this->aItems);

			}
		}

		public function modificarItem($nuevoItem,$pos){
			$this->aItems[$pos]= $nuevoItem;
		}

		public function getItems(){
			return $this->aItems;
		}

	}

	Class Internos{

		public $FechaIngresoUnidad;
		public $FechaEgresoUnidad;
		public $TipoDocumento;
		public $NumeroDoc;  // DNI - Pasaporte
		public $ApellidoYNombre;
		public $FAltaTalleres;
		public $FBajaTalleres;
		public $FechaNacimiento;
		public $Concepto; // Muy Buena, Buena, Regular
		public $Conducta; // Muy Buena, Buena, Regular
		public $Delito;
		public $Descripcion;

		public function __construct( ){	

		}




	}



?>