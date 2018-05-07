<?php
class Test_Model_entity
{ 
 	protected $id,
 		$word;

	public function populate($args) { 
		$this->setId($args['id']);
		$this->setWord($args['word']);
	}

	public function getId() {return $this->id;}
	public function setId($id) {
		$this->id = $id;
	}

	public function getWord() {return $this->word;}
	public function setWord($word) {
		$this->word = $word;
	}

