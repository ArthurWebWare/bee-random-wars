<?php

    class Player {

        private $bee;

        public function __construct() {
        	// We initialize all the bees at the beginning of the game
        	$this->initBee();
        }

        /* Initialization of the bees */
        public function initBee() {
        	if(isset($this->bee)) unset($this->bee);
        	for($i = 0; $i < NBR_QUEEN; $i++) {
        	    $this->bee['queen'][] = new QueenBee();
        	}
        	for($i = 0; $i < NBR_WORKER; $i++) {
        	    $this->bee['worker'][] = new WorkerBee();
        	}
        	for($i = 0; $i < NBR_DRONE; $i++) {
        	    $this->bee['drone'][] = new DroneBee();
        	}
        }

        /**
        *@return an array of bees if false if there is none
        */
        public function getQueenBee() {
        	return isset($this->bee['queen']) ? $this->bee['queen'] : false;
        }

        /**
        *@return a worker bee chart or false if there is none
        */
        public function getWorkerBee() {
        	return isset($this->bee['worker']) ? $this->bee['worker'] : false;
        }

        /**
        *@return a drone bee board or false if there is none
        */
        public function getDroneBee() {
        	return isset($this->bee['drone']) ? $this->bee['drone'] : false;
        }

        /* Attack a random bee */
        public function attackBee() {
            $keyType = array_rand($this->bee);  			// Random selection of a bee type (queen, worker, drone)
            $keyBee = array_rand($this->bee[$keyType]);		// Random selection of a bee

            if($this->bee[$keyType][$keyBee]->attack()) {
            	unset($this->bee[$keyType][$keyBee]);
            	if($keyType == 'queen' && count($this->bee[$keyType]) <= 0) {    // If the reindeer is at 0 hp, reset the game
            		 echo '<br />The Queen is 0 points of life.';
            		 $this->resetGame();
            	}
            }
            if(count($this->bee[$keyType]) <= 0) unset($this->bee[$keyType]);
        }

        /* Reset the game */
        public function resetGame() {
            $this->initBee();
            echo '<br /><b>The game has been reset.</b>';
        }
    }

?>
