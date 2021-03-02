<?php
class modelLetovi extends DB{
	
	public function insertLetovi($let_od, $let_preku, $let_do, $klasa){
		$table_name = "letovi";
		$column_name = "let_od, let_preku, let_do, klasa";
		$column_value = "'$let_od', '$let_preku', '$let_do', '$klasa'";
		parent::insertRow($table_name,$column_name,$column_value);
	}
	
	public function selectLetovi(){
		return parent::selectRows("letovi");
	}
	
	public function deleteLetovi($pk_value){
		$table_name = "letovi";
		$condition = "let_id=$pk_value";
		parent::deleteRow($table_name,$condition);
	}
	
	
}

?>