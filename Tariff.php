<?php
    class Tariff{

        public function getIdTariff()
        {
            return $this->id_tariff;
        }


        public function setIdTariff($id_tariff)
        {
            $this->id_tariff = $id_tariff;
        }


        public function getName()
        {
            return $this->name;
        }


        public function setName($name)
        {
            $this->name = $name;
        }


        public function getIdTariffTerms()
        {
            return $this->id_tariff_terms;
        }

        public function setIdTariffTerms($id_tariff_terms)
        {
            $this->id_tariff_terms = $id_tariff_terms;
        }
        private $id_tariff;
        private $name;
        private $id_tariff_terms;

        public function __construct($id_tariff=null, $name=null, $id_tariff_terms=null)
        {
            $this->id_tariff = $id_tariff;
            $this->name = $name;
            $this->id_tariff_terms = $id_tariff_terms;
        }
    }
?>