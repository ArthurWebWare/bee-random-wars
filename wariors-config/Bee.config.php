<?php

    abstract class Bee {

        private $life;

        public function setLife($life) {
        	$this->life = $life;
        }

        public function getLife() {
        	return $this->life;
        }

        abstract public function attack();

    }

?>
