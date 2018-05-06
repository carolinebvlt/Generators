<?php
class Model_entity_generator
{
	protected $table_name;

	public function __construct($argv){
		$this->table_name = $argv;
	}

	public function generate(){
		$handle = fopen('./generated_files/'.ucfirst($this->table_name).'_Model_entity.php', 'w+');
		$test = 'Hello';
		fwrite($handle, $test);
		fclose($handle);
	}
}
 ?>
