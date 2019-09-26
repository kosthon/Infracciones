<?php
    //error_reporting(E_ALL ^ E_WARNING);  

	class ConexionPGSQL{

		//declaración de variables
		public $host; // para conectarnos a localhost o el ip del servidor de postgres
		public $db; // seleccionar la base de datos que vamos a utilizar
		public $user; // seleccionar el usuario con el que nos vamos a conectar
		public $pass; // la clave del usuario
		public $conexion;  //donde se guardara la conexión
		public $url; //dirección de la conexión que se usara para destruirla mas adelante

		public $totalinfracciones;

		function setTotalInfracciones($totalinfracciones){

			$this->totalinfracciones = $totalinfracciones;

		}

		//creación del constructor
		function __construct(){
			}

		//creación de la función para cargar los valores de la conexión.
		public function cargarValores(){
			$this->host='localhost';
			$this->db='Infracciones';
			$this->user='postgres';
			$this->pass='1234';
			$this->conexion="host='$this->host' dbname='$this->db' user='$this->user' password='$this->pass' ";
			}

			//función que se utilizara al momento de hacer la instancia de la clase
			function conectar(){
				$this->cargarValores();
				$cn = pg_connect("host='localhost' dbname='Infracciones' user='postgres' password='1234' ");
				return true;
            }
            


			//función para destruir la conexión.
			function destruir(){
				pg_close($this->url);
			}
			function consultas($sql){
				$resultados = pg_query($sql) or die("Error en la Consulta SQL");
				echo $resultados;
				return $resultados;
				}
			function getCountInfractions(){
				$query = "select count(*) from infracciones";
				$countParam = pg_query($query) or die("Error en la Consulta SQL");
				$countParam = pg_fetch_row($countParam);
				return $countParam[0];
              }
			function atraercolor($infraccion,$color){
				$query = "select count(*) from infracciones where tipo_infraccion='$infraccion' and color_vehiculo='$color'";
				$countParam = pg_query($query) or die("Error en la Consulta SQL");
				$countParam = pg_fetch_row($countParam);
				return $countParam[0];
			  }
			  function atraerraza($infraccion,$raza){
				$query = "select  count(*) from infracciones where tipo_infraccion = '$infraccion' and raza_conductor = '$raza'";
				$countParam = pg_query($query) or die("Error en la Consulta SQL");
				$countParam = pg_fetch_row($countParam);
				return $countParam[0];
			  }
			  function atraertipodecarro($infraccion,$tipocarro){
				$query = "select  count(*) from infracciones where tipo_infraccion = '$infraccion' and tipo_vehiculo  = '$tipocarro'";
				$countParam = pg_query($query) or die("Error en la Consulta SQL");
				$countParam = pg_fetch_row($countParam);
				return $countParam[0];
			  }
			  function atraergenero($infraccion,$genero){
				$query = "select  count(*) from infracciones where tipo_infraccion = '$infraccion' and genero_conductor  = '$genero'";
				$countParam = pg_query($query) or die("Error en la Consulta SQL");
				$countParam = pg_fetch_row($countParam);
				return $countParam[0];
			  }
			  function estadolicencia($infraccion,$licencia){
				$query = "select  count(*) from infracciones where tipo_infraccion = '$infraccion' and estado_licencia  = '$licencia'";
				$countParam = pg_query($query) or die("Error en la Consulta SQL");
				$countParam = pg_fetch_row($countParam);
				return $countParam[0];
			  } 

			  function cantidadInfracciones($infraccion){
				$query = "select  count(*) from infracciones where tipo_infraccion = '$infraccion'";
				$countParam = pg_query($query) or die("Error en la Consulta SQL");
				$countParam = pg_fetch_row($countParam);
				return $countParam[0];
			  }

			  function calcularalgo($color,$genero,$raza,$licencia,$tipocarro,$infraccion){
					$peso1 = $color/$infraccion;
					$peso2 = $genero/$infraccion;
					$peso3 = $raza/$infraccion;
					$peso4 = $licencia/$infraccion;
					$peso5 = $tipocarro/$infraccion;
					$peso6 = $infraccion/$this->totalinfracciones;
					$resultado = $peso1*$peso2*$peso3*$peso4*$peso5*$peso6*100;
					return $resultado;
			  }
		}
?>