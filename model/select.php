<?php
include "../classes/class_db.php";

$d = array();
$table_name = $_GET["table_name"];

switch ($table_name){
	
	case "letovi":
	include "modelLetovi.php";
	$instanceModelLetovi = new modelLetovi();
	$results = $instanceModelLetovi->selectLetovi();
	foreach ($results as $row){
		$d['records'][] = array ('let_id'   =>$row['let_id'],
		                         'let_od'   =>$row['let_od'],
								 'let_preku'=>$row['let_preku'],
								 'let_do'   =>$row['let_do'],
								 'klasa'    =>$row['klasa']);
	}
	echo json_encode($d);
	break;
	
	
	case "patnici":
	include "modelPatnici.php";
	$instanceModelPatnici = new modelPatnici();
	$results = $instanceModelPatnici->selectPatnici();
	foreach ($results as $row){
		$d['records'][] = array ('patnik_id'=>$row['patnik_id'],
		                         'ime'      =>$row['ime'],
								 'adresa'   =>$row['adresa'],
								 'vozrast'  =>$row['vozrast'],
								 'email'    =>$row['email']);
	}
	echo json_encode($d);
	break;
	
	case "rezervacii":
	include "modelRezervacii.php";
	$instanceModelRezervacii = new modelRezervacii();
	$results = $instanceModelRezervacii->selectRezervacii();
	foreach ($results as $row){
		$d['records'][] = array('rezervacija_id'=>$row['rezervacija_id'],
		                        'let_id'=>$row['let_id'],
								'patnik_id'=>$row['patnik_id'],
								'broj_patnici'=>$row['broj_patnici'],
								'data'=>$row['data'],
								'let_od'   =>$row['let_od'],
								 'let_preku'=>$row['let_preku'],
								 'let_do'   =>$row['let_do'],
								 'klasa'    =>$row['klasa'],
								 'ime'      =>$row['ime'],
								 'adresa'   =>$row['adresa'],
								 'vozrast'  =>$row['vozrast'],
								 'email'    =>$row['email']);
	}
	echo json_encode($d);
	break;
}

?>