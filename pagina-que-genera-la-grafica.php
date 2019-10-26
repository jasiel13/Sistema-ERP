<?php
	require_once ("src/jpgraph.php");
	require_once ("src/jpgraph_pie.php");
	// Se define el array de valores y el array de la leyenda
	$datos = array(40,60,21,33);
	$leyenda = array("Morenas","Rubias","Pelirrojas","Otras");
	//Se define el grafico
	$grafico = new PieGraph(450,300);
	//Definimos el titulo
	$grafico->title->Set("Mi primer grafico de tarta");
	$grafico->title->SetFont(FF_FONT1,FS_BOLD);
	//Añadimos el titulo y la leyenda
	$p2 = new PiePlot($datos);
	$p2->SetLegends($leyenda);
	$p2->SetCenter(0.4);
	//Se muestra el grafico
	$grafico->Add($p2);
	$grafico->Stroke();
?>