<html>
<head>
</head>
<body onload="javascript:window.close()">
<body>
<?php
include("recibe_datos.php");
require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
try {
	$connector = null;
	$connector = new WindowsPrintConnector($VARIABLE["NOMBREIMPRESORA"]);
	$printer = new Printer($connector); 
	#############################################
	############################################# INICIO DEL FORMATO DEL TICKET
	############################################# 	
	#################################################################################### INICIO HOJA 1
	$printer->selectPrintMode();
	$printer -> setFont(Printer::FONT_A);
	$printer -> setEmphasis(true);
	$printer -> setJustification(Printer::JUSTIFY_CENTER); 
	$printer -> text("========================================\n");
	$printer -> text($VARIABLE["EMISOR_RAZONSOCIAL"]."\n");	
	$printer -> text("========================================\n");
	$printer -> feed();
	$printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
	$printer->text("NOTA VENTA ".$VARIABLE["FOLIONV"]."\n");
	$printer->selectPrintMode();
	$printer -> text("FECHA: ".$VARIABLE["FECHAEMISION"]." - HORA: ".$VARIABLE["HORAEMISION"]."\n");
	$printer -> text("VENDEDOR: ".$VARIABLE["VENDEDOR"]."\n");
	$printer -> feed(); 	
	$printer -> text($VARIABLE["ITEMS"]." ITEMS\n");
	$printer -> feed(); 
	$printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
	$printer -> text("TOTAL $".number_format($VARIABLE["TOTALES_BRUTO"],0,",",".")."-.\n");
	$printer->selectPrintMode();
	$printer -> feed(); 
	$printer -> feed(); 	
	$printer -> setJustification(Printer::JUSTIFY_LEFT);
	for($i=1;$i<=$VARIABLE["ITEMS"];$i++){
		$printer -> text($_POST["ITEM_NOMBRE_$i"]."\n");
		$printer -> text(number_format($_POST["ITEM_CANTIDAD_$i"],1,",",".")." x $".number_format($_POST["ITEM_UNITARIO_$i"],0,",",".")."-. = $".number_format($_POST["ITEM_SUBTOTAL_$i"],0,",",".")."\n");
	}
	$printer -> setJustification(Printer::JUSTIFY_CENTER); 
	$printer -> feed(); 
	$printer -> feed();
	$printer -> feed(); 
	$printer -> feed(); 
	$printer -> feed(); 
	$printer -> cut(); 
	//#################################################################################### FINAL HOJA 1
	//#################################################################################### INICIO - HOJA 2
	$printer->selectPrintMode();
	$printer -> setFont(Printer::FONT_A);
	$printer -> setEmphasis(true);
	$printer -> setJustification(Printer::JUSTIFY_CENTER); 
	$printer -> text("========================================\n");
	$printer -> text($VARIABLE["EMISOR_RAZONSOCIAL"]."\n");	
	$printer -> text("========================================\n");
	$printer -> feed();
	$printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
	$printer->text("NOTA VENTA ".$VARIABLE["FOLIONV"]."\n");
	$printer->selectPrintMode();
	$printer -> text("FECHA: ".$VARIABLE["FECHAEMISION"]." - HORA: ".$VARIABLE["HORAEMISION"]."\n");
	$printer -> text("VENDEDOR: ".$VARIABLE["VENDEDOR"]."\n");
	$printer -> feed(); 	
	$printer -> text($VARIABLE["ITEMS"]." ITEMS\n");
	$printer -> feed(); 
	$printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
	$printer -> text("TOTAL $".number_format($VARIABLE["TOTALES_BRUTO"],0,",",".")."-.\n");
	$printer->selectPrintMode();
	$printer -> feed();
	$printer -> feed();	
	$printer -> cut();
	#################################################################################### FINAL HOJA 2
	#############################################
	############################################# FINAL DEL FORMATO DEL TICKET
	############################################# 
	$printer -> close();
	echo "<h1>Ticket OK</h1>";
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
?>