<?php
require 'Conexion.php';

$con = new Conexion();
$consulta ="SELECT * FROM preguntafrecuente where 1";
$resultado = $con->consultaRetorna($consulta);//Me devuelve un array con los datos obtenidos de la consulta 
echo "<table><tr><th>Pregunta</th><th>Respuesta</th></tr>";
foreach($resultado	as $result){ // Recorremos el array
	echo"<tr>";
	echo "<td>".$result['descripcion']."</td>";
	echo "<td>".$result['respuesta']."</td>";
	echo "</tr>";
}
echo "</table>";

?>