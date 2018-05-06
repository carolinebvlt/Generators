<?php
	function loadClass($class_name){
		require './generators/' . $class_name . '.php';
	}

	spl_autoload_register('loadClass');
 ?>
