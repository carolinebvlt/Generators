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
		// $handle = fopen('./generated_files/'.ucfirst($this->table_name).'_Model_entity.php', 'w+');
		// $test = 'Hello';
		// fwrite($handle, $test);
		// fclose($handle);

		$rq = $this->db->query('DESCRIBE '.$this->table_name);
		$data = $rq->fetchAll(PDO::FETCH_ASSOC);
		$rq->closeCursor();
		var_dump($data);
	}
}
 ?>
