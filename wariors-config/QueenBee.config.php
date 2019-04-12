<?php

	class QueenBee extends Bee {

	    public function __construct() {
	    	// We affect the starting life of the bee
	    	$this->setLife(START_LIFE_QUEEN);
	    }

	    /**
        *@return true if the bee is at 0 life if not false
        */
	    public function attack() {
        	$this->setLife($this->getLife()-REMOVE_LIFE_QUEEN);
        	echo 'You attack a Queen Bee (- '.REMOVE_LIFE_QUEEN.').';
        	if($this->getLife() <= 0) {
        	     return true;
        	}
        	return false;
        }
	}

?>
