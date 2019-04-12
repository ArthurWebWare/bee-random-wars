<?php

	class DroneBee extends Bee {

        public function __construct() {
        	// We affect the starting life of the bee
        	$this->setLife(START_LIFE_DRONE);
        }

        /**
        *@return true if the bee is at 0 life if not false
        */
        public function attack() {
        	$this->setLife($this->getLife()-REMOVE_LIFE_DRONE);
        	echo 'You attack a drone bee (- '.REMOVE_LIFE_DRONE.').';
        	if($this->getLife() <= 0) {
        	     return true;
        	}
        	return false;
        }
    }

?>
