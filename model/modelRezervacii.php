<?php
class modelRezervacii extends DB{
	
	public function insertRezervacii($let_id, $patnik_id, $broj_patnici, $data){
		$table_name = "rezervacii";
		$column_name = "let_id, patnik_id, broj_patnici, data";
		$column_value = "$let_id, $patnik_id, $broj_patnici, '$data'";
		parent::insertRow($table_name,$column_name,$column_value);
	}
	
	public function selectRezervacii(){
		return parent::selectRows("rezervacii INNER JOIN letovi ON rezervacii.let_id = letovi.let_id
		                                      INNER JOIN patnici ON rezervacii.patnik_id = patnici.patnik_id");
	}
	
	public function deleteRezervacii($pk_value){
		$table_name = "rezervacii";
		$condition = "rezervacija_id=$pk_value";
		parent::deleteRow($table_name,$condition);
	}
	
}

?>