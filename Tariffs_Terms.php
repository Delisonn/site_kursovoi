<?php
    class Tariffs_Terms
    {

        public function getIdTerm()
        {
            return $this->id_term;
        }


        public function setIdTerm($id_term)
        {
            $this->id_term = $id_term;
        }

        public function getNumOfChannel()
        {
            return $this->num_of_channel;
        }


        public function setNumOfChannel($num_of_channel)
        {
            $this->num_of_channel = $num_of_channel;
        }


        public function getCost()
        {
            return $this->cost;
        }


        public function setCost($cost)
        {
            $this->cost = $cost;
        }
        private $id_term;
        private $num_of_channel;
        private $cost;

        public function __construct($id_term=null, $num_of_channel=null, $cost=null)
        {
            $this->id_term = $id_term;
            $this->num_of_channel = $num_of_channel;
            $this->cost = $cost;
        }
    }
?>
