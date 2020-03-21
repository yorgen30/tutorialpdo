<?php
require 'Conexion.php';

$con = new Conexion();
$consulta ="SELECT * FROM preguntafrecuente where 1";
$resultado = $con->consultaRetorna($consulta);//Me devuelve un array con los datos obtenidos de la consulta 
echo "<center><b>MI PRIMERA CONEXION PDO</b></center>";
echo "<table><tr><th>Pregunta</th><th>Respuesta</th><th>Tipo</th></tr>";
foreach($resultado	as $result){ // Recorremos el array
	echo"<tr>";
	echo "<td>".$result['descripcion']."</td>";
	echo "<td>".$result['respuesta']."</td>";
	echo "<td>".$result['tipo']."</td>";
	echo "</tr>";
}
echo "</table>";

?>