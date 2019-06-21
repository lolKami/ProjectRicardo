<?php

class Project{
    private $ID;
    private $PROJECT_NAME;
    private $COST;
    private $CREATION_DATE;
    private $END_DATE;

public function getID(){
		return $this->ID;
	}

	public function setID($ID){
		$this->ID = $ID;
	}

	public function getPROJECT_NAME(){
		return $this->PROJECT_NAME;
	}

	public function setPROJECT_NAME($PROJECT_NAME){
		$this->PROJECT_NAME = $PROJECT_NAME;
	}

	public function getCOST(){
		return $this->COST;
	}

	public function setCOST($COST){
		$this->COST = $COST;
	}

	public function getCREATION_DATE(){
		return $this->CREATION_DATE;
	}

	public function setCREATION_DATE($CREATION_DATE){
		$this->CREATION_DATE = $CREATION_DATE;
	}

	public function getEND_DATE(){
		return $this->END_DATE;
	}

	public function setEND_DATE($END_DATE){
		$this->END_DATE = $END_DATE;
	}
}

?>
