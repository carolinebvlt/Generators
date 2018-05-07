<?php
class Model_entity_generator
{
	protected 	$db,
				$table_name;

	public function __construct($args){
		$this->db = $args['db'];
		$this->table_name = $args['table_name'];
	}

	public function generate(){

		$rq = $this->db->query('DESCRIBE '.$this->table_name);
		$data = $rq->fetchAll(PDO::FETCH_ASSOC);
		$rq->closeCursor();
		// var_dump($data);

		foreach ($data as $column) {
			$columns_names[] = $column["Field"];
			$columns_types[] = [$column["Field"] => $column["Type"]];
		}

		$header ="<?php\nclass ".ucfirst($this->table_name)."_Model_entity\n{ \n \t";

		$attributes = $this->generate_attributes($columns_names);
		$populate = $this->generate_populate($columns_names);
		
		$getters_setters = $this->generate_getters_setters($columns_types);

		$txt = $header.$attributes.$populate.$getters_setters;

		$handle = fopen('./generated_files/'.ucfirst($this->table_name).'_Model_entity.php', 'w+');
		fwrite($handle, $txt);
		fclose($handle);
	}

	private function generate_attributes($columns_names){
		$content = "protected ";
		foreach ($columns_names as $key => $field) {
			if($key != (count($columns_names) - 1))
				$content = $content."$".$field.",\n \t\t";
			else
				$content = $content."$".$field.";";
		}
		return $content;
	}

	private function generate_populate($columns_names){
		$content = "\n\n\tpublic function populate(\$args) { \n";
		foreach ($columns_names as $key => $value) {
			$content = $content."\t\t\$this->set".ucfirst($value)."(\$args['".$value."']);\n" ;
		}
		$content = $content."\t}\n";
		return $content;
	}

	private function generate_getters_setters($columns_types){
		$content = "\n";
		foreach ($columns_types as $row) {
			foreach ($row as $name => $type) {
				$content = $content."\tpublic function get".ucfirst($name)."() {return \$this->".$name.";}\n";
				$content = $content."\tpublic function set".ucfirst($name)."($".$name.") {\n\t\t\$this->".$name." = $".$name.";\n\t}\n\n";
			}
		}
		return $content;
	}
}
 ?>
