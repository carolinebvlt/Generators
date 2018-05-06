<?php
	include './config/config-db.php';
	include './config/autoloader.php';


	if($argv[1] == null)
		throw new \Exception("Missing argument : 'db_name'", 1);
	if($argv[2] == null)
		throw new \Exception("Missing argument : 'table_name' (can be '*' for all the tables)", 1);
	if($argv[3] == null)
		throw new \Exception("Missing argument : 'mode'
		Possibilities :
		\t Me  : Models-entities \n
		\t ME   : Models + Entities \n
		\t CMe : Controllers + Models-entities \n
		\t CME  : Controllers + Models + Entities \n", 1);


	foreach ($configs as $db_name => $command) {
		if($db_name == $argv[1])
			$cmd = $command;
	}
	if(!isset($cmd))
		throw new \Exception("Bad argument : 'db_name' => db not found", 2);
	else{
		eval($cmd);
		$args = ['table_name' => $argv[2], 'db' => $db];
		switch ($argv[3]) {
			case 'Me' :
				$Me_generator = new Model_entity_generator($args);
				$Me_generator->generate();
				break;
			case 'ME' :
				$M_generator = new Model_generator($args);
				$E_generator = new Entity_generator($args);
				$M_generator->generate();
				$E_generator->generate();
				break;
			case 'CMe' :
				$C_generator = new Controller_generator($args);
				$Me_generator = new Model_entity_generator($args);
				$C_generator->generate();
				$Me_generator->generate();
				break;
			case 'CME'  :
				$C_generator = new Controller_generator($args);
				$M_generator = new Model_generator($args);
				$E_generator = new Entity_generator($args);
				$C_generator->generate();
				$M_generator->generate();
				$E_generator->generate();
				break;

			default:
				throw new \Exception("Bad argument : 'mode'
				Possibilities :
				\t Me  : Models-entities \n
				\t ME   : Models + Entities \n
				\t CMe : Controllers + Models-entities \n
				\t CME  : Controllers + Models + Entities \n'", 2);
				break;
		}
	}
 ?>
