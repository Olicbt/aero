<?php
include "../classes/class_db.php";

$data = json_decode(file_get_contents("php://input"));
$table_name = $data[0]->table_name;
$pk_value = $data[0]->pk_value;

switch ($table_name){
	
	case "letovi":
	include "modelLetovi.php";
	$instanceModelLetovi = new modelLetovi();
	$instanceModelLetovi->deleteLetovi($pk_value);
	break;
	
	case "patnici":
	include "modelPatnici.php";
	$instanceModelPatnici = new modelPatnici();
	$instanceModelPatnici->deletePatnici($pk_value);
	break;
	
	case "rezervacii":
	include "modelRezervacii.php";
	$instanceModelRezervacii = new modelRezervacii();
	$instanceModelRezervacii->deleteRezervacii($pk_value);
	break;
}

?>