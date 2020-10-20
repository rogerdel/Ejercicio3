<?php 
	$con = mysqli_connect("localhost", "ejemplo", "123456");
	mysqli_select_db($con, "academico");

	$sql = "Select lugarrsidencia ,count(lugarrsidencia)
	from nota n, identificador i 
	where n.ci = i.ci
	and nota >= 51
	group by lugarrsidencia";

	$res = mysqli_query($con,$sql);

	$labels = array();
	$cantidad = array();

	while ($row = mysqli_fetch_row($res)) {
		$labels[] = $row[0];
		$cantidad[] = $row[1];
	 }
	 
	 function obternerCiudad($i){
	 	if($i>0){
		$s = ["Sucre","La Paz","Cochabamba","Oruro","Potosi","Tarija","Santa Cruz","Beni", "Pando"];
	 	return $s[$i-1];	 		
	 	}
	 	return "Otro";
	 }
?>
<div style = "position: absolute; top:30%; left: 40%;">
<table border="1px">
	
<?php 
	echo "<tr>";	
	echo "<td><p style='font-weight: bold;'>Ciudad: </p></td>";
	for($i = 0; $i < sizeof($labels); $i++){
	 	echo "<td>".obternerCiudad($labels[$i])."</td>";
	 }
	 echo "</tr>";
	 echo "<tr>";
	 echo "<td><p style='font-weight: bold;'>Cantidad: </p></td>";
	 for($j = 0; $j < sizeof($cantidad); $j++){
	 	echo "<td>$cantidad[$j] </td>";
	 }
	 echo "</tr>";
?>
</table>
</div>