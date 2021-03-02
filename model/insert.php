<?php
include "../classes/class_db.php";

$data = json_decode(file_get_contents("php://input"));
$table_name = $data[0] -> table_name;


switch ($table_name){
	
	case "letovi":
	include "modelLetovi.php";
	$instanceModelLetovi = new modelLetovi();
	$let_od    = $data[0] -> let_od;
	$let_preku = $data[0] -> let_preku;
	$let_do    = $data[0] -> let_do;
	$klasa     = $data[0] -> klasa;
	$instanceModelLetovi->insertLetovi($let_od, $let_preku, $let_do, $klasa);
	break;
	
	case "patnici":
	include "modelPatnici.php";
	$instanseModelPatnici = new modelPatnici();
	$ime     = $data[0] -> ime;
	$adresa  = $data[0] -> adresa;
	$vozrast = $data[0] -> vozrast;
	$email   = $data[0] -> email;
	$instanseModelPatnici->insertPatnici($ime, $adresa, $vozrast, $email);
	break;
	
	case "rezervacii":
	include "modelRezervacii.php";
	$instanceModelRezervacii = new modelRezervacii();
	$let_id       = $data[0] -> let_id;
	$patnik_id    = $data[0] -> patnik_id;
	$broj_patnici = $data[0] -> broj_patnici;
	$data         = $data[0] -> data;
	$instanceModelRezervacii->insertRezervacii($let_id, $patnik_id, $broj_patnici, $data);
	break;
	
	
}


?>