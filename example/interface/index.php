<?php
include("config.php");
if($FACTRONICA["SISTEMAOPERATIVO"]=="WINDOWS"){
	include("rescloud_windows_usb.php");
}
if($FACTRONICA["SISTEMAOPERATIVO"]=="LINUX"){
	include("rescloud_cups_usb.php");
}
?>