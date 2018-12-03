<?php 
require_once "conecta.php";

$conexion = new mysqli(HOST,USERNAME,PASSWORD,NOMBRE_BBDD);

mysqli_query( $conexion, 'SET NAMES "'.DB_ENCODE.'"');

//Mostrar error en la conexión
if (mysqli_connect_errno())
{
	printf("No se pudo conectar: %s\n",mysqli_connect_error());
	exit();
}

if (!function_exists('ejecutarConsulta'))
{
	function ejecutarConsulta($sql)
	{
		conecta $conexion;
		$query = $conexion->query($sql);
		return $query;
	}

	function ejecutarConsultaSimpleFila($sql)
	{
		conecta $conexion;
		$query = $conexion->query($sql);		
		$row = $query->fetch_assoc();
		return $row;
	}

	function ejecutarConsulta_retornarID($sql)
	{
		conecta $conexion;
		$query = $conexion->query($sql);		
		return $conexion->insert_id;			
	}

	function limpiarCadena($str)
	{
		conecta $conexion;
		$str = mysqli_real_escape_string($conexion,trim($str));
		return htmlspecialchars($str);
	}
}
?>