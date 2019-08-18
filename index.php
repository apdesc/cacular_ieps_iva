<?php
##Creado por abimael Gutierrez @apdesc
##Funcion de formatos de números creado por Josué Jiménez @josumx
include("funcion.php");
if($_SERVER['REQUEST_METHOD'] =="POST")
{	

	$listroscombustible="0";
	$preciocombustible="0";
	$importeieps="0";
	$tasaiva="0";
	$importeflete="0";
	$ivaflete="0";

	$total_combustile="0";
	$importeieps="0";
	$importecombustible="0";
	$total_combustible="0";
	$ivaimportecombustible="0";

	$mostrar_resultado="";
		##calcular precio por listros de combustible
if (is_numeric($_POST['listroscombustible'])){
		##obtener listros combustible
		$listroscombustible=$_POST['listroscombustible'];
		##obtener precios combustible
		$preciocombustible=$_POST['preciocombustible'];
		##Obtener valor ieps
		$cuotaieps=$_POST['cuotaieps'];
		##Obtener condición comercial
		$condicioncomercial=$_POST['condicioncomercial'];
		##Obtener tasa iva
		$tasaiva=$_POST['tasaiva'];	
		##Obtener importe flete
		$importeflete=$_POST['importeflete'];
		##Obtener tasa iva flete
		$ivaflete=$_POST['ivaflete'];
		##Obtener tasa iva flete retención
		$ivarentecionflete=$_POST['ivarentecionflete'];

		##Resultado calcular precio por listros de combustible
		$total_combustible=$listroscombustible*$preciocombustible;
		$importeieps=$cuotaieps*$listroscombustible;
		$importecombustible=$total_combustible-$importeieps-$condicioncomercial;
		$ivaimportecombustible=$importecombustible*$tasaiva;
		$ivaimporteflete=$importeflete*$ivaflete;
		$ivaimportefleterentecion=$importeflete*$ivarentecionflete;
		$totalfactura=$importeieps+$importecombustible+$ivaimportecombustible+$importeflete+$ivaimporteflete-$ivaimportefleterentecion;


$mostrar_resultado="Litros de combustible:<br> <b>$listroscombustible</b>
<br>
Precio de combustible:<br>
<b>$preciocombustible</b><br>
Total combustible:<br>
<b>".decimales2($total_combustible)."</b>
<br>
Cuota Ieps<br>
<b>$cuotaieps</b>
<br>
Importe ieps:<br>
<b>".numeros2($importeieps)."</b>
<br>
Condición comercial<br>
<b>".decimales2($condicioncomercial)."</b>
<br>
Importe combustible
<br>
<b>".decimales2($importecombustible)."</b>
<br>
Tasa Iva
<b>$tasaiva</b>
<br>
IVA 16%
<br>
<b>".decimales2($ivaimportecombustible)."</b>
<br>
Importe flete
<br>
<b>".decimales2($importeflete)."</b>
<br>
Iva 16% de Flete
<b>".decimales2($ivaimporteflete)."</b>
<br>
4% Retención Iva
<b>".decimales2($ivaimportefleterentecion)."</b>
<br>
Total Factura
<br>
<b>".decimales2($totalfactura)."</b>
";
}
}
?>



<!DOCTYPE html>
<html lang="es">
<html>
<head>
	<title>IVA-IEPS-IMPORTE FLETE</title>


	<style>
		input{

			border: 1px solid #000;
			height: 20px;
			margin: 5px;
			display: block;
		}

		label{
			margin: 5px;
			color: gray;
		}
	.resultado{
		right: 200px;
		position: absolute;
		top: 30px;
		width: 400px;
		height: auto;
		padding: 10px;
		border: 1px dotted #000;
	}
	</style>

</head>
<body>

	<form method="post" action="index.php">
		<label for="listroscombustible"> Litros de combustible</label>
		<input type="number" step="any" name="listroscombustible" id="listroscombustible" autocomplete="on" value="<?php echo $listroscombustible; ?>">
		<label for="preciocombustible">Precio de combustible</label>
		<input type="number" step="any" name="preciocombustible" id="preciocombustible" autocomplete="on" value="<?php echo $preciocombustible; ?>">
		<label for="cuotaieps">Cuota Ieps</label>
		<input type="number" step="any" name="cuotaieps" id="cuotaieps" autocomplete="on">
		<label for="condicioncomercial"> Condición comercial</label>
		<input type="number" step="any" name="condicioncomercial" id="condicioncomercial" autocomplete="on">
		<label for="tasaiva">Tasa Iva</label>
		<input type="number" step="any" name="tasaiva" id="tasaiva" autocomplete="on">
		<label for="importeflete">Importe Flete</label>
		<input type="number" step="any" name="importeflete" name="importeflete" autocomplete="on">
		<label for="ivaflete">Iva Flete</label>
		<input type="number" step="any" name="ivaflete" id="ivaflete" autocomplete="on">
		<label for="ivarentecionflete">Iva Retencion Flete</label>
		<input type="number" step="any" name="ivarentecionflete" id="ivarentecionflete" autocomplete="on">

		<input type="submit" name="submit" value="Calcular">
	</form>


	<br>
	<div class="resultado">
	<form name="resultado" name="resultado">
	
		<?php echo $mostrar_resultado;?>

	</form>
	</div>
</body>
</html>