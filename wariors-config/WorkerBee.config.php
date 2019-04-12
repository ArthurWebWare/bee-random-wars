<?php

    class WorkerBee extends Bee {

        public function __construct() {
        	// We affect the starting life of the bee
        	$this->setLife(START_LIFE_WORKER);
        }

        /**
        *@return true if the bee is at 0 life if not false
        */
        public function attack() {
        	$this->setLife($this->getLife()-REMOVE_LIFE_WORKER);
        	echo 'You attack a worker bee (- '.REMOVE_LIFE_WORKER.').';
        	if($this->getLife() <= 0) {
        	     return true;
        	}
        	return false;
        }
    }

?>
