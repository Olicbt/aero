<?php
class modelPatnici extends DB{
	
	public function insertPatnici($ime, $adresa, $vozrast, $email){
		$table_name = "patnici";
		$column_name = "ime, adresa, vozrast, email";
		$column_value = "'$ime', '$adresa', '$vozrast', '$email'";
		parent::insertRow($table_name,$column_name,$column_value);
	}
	
	public function selectPatnici(){
		return parent::selectRows("patnici");
	}
	
	public function deletePatnici($pk_value){
		$table_name = "patnici";
		$condition = "patnik_id=$pk_value";
		parent::deleteRow($table_name,$condition);
	}
	
}

?>