<?php 
/*

PARA WINDOWS:
=============

1) Servidor Local Http:
Instalar software servidor apache en equipo que tendrá conectada la impresora de tickets, se recomienda xamp
No se requiere mysql ni mail, solamente apache http

2) Instalar Api rescloud Tickets:
Copiar la carpeta mi_service dentro del servidor instalado localmente, por ej. c:\xamp\www\mi_service

3) Instalar driver de Impresora:
Instalar impresora de tickets vía USB y el driver a utilizar se recomienda Generico Generic
Además la impresora debe quedar compartida en red
Es muy importante el nombre a dar a la instancia de impresora instalada por ej. TICKETMESON1

4) Configurar Api
En ruta c:\xamp\www\mi_service\example\interface\config.php

# NOMBRE DEL SISTEMA OPERATIVO LINUX O WINDOWS
$VARIABLE["SISTEMAOPERATIVO"]="LINUX"; 

# NOMBRE DE LA IMPRESORA DENTRO DEL SISTEMA OPERATIVO
$VARIABLE["NOMBREIMPRESORA"]="TICKETMESON1"; 

5) REALIZAR PRUEBAS DE IMPRESION EN BRUTO:
Abrir navegador web e ir a la url:
http://192.168.0.22/mi_service/example/interface/index.php
Si todo va bien, se deberia imprimir un ticket en bruto sin datos de venta.

6) PRUEBAS DE FUNCIONAMIENTO:
Para enviar los datos al ticket se dejo configurado via POST en archivo c:\xamp\www\miservice/example/interface/recibe_datos.php
El envio de datos también puede ser vía GET aunque no se recomienda

7) INTEGRACIÓN CON SISTEMA DE VENTAS:
Para realizar la integración, al momento de generar la venta en su sistema de gestión, se debe abrir una nueva pagina apuntando a una url 
http://192.168.0.22/miservice/example/interface/index.php
al enviar a esa url se deben enviar los datos via post o get


*/
?>