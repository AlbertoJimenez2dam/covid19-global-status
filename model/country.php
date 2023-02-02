<?php
    class Country implements JsonSerializable {
        private $activeCases;
        private $country;
        private $lastModified;
        private $newCases;
        private $deceased;
        private $totalCases;
        private $totalDeceased;
        private $totalRecovered;
        
        public function __construct($list) {
            if (isset($list['country'])) {
                foreach ($list as $k => $v) {
                    $this->$k = $v;
                }
            } else {
                $this->setApiData($list);
            }
        }
        
        public function setApiData($list) {
            $this->setActiveCases($list['Active Cases_text']);
            $this->setCountry($list['Country_text']);
            $this->setLastModified($list['Last Update']);
            $this->setNewCases($list['New Cases_text']);
            $this->setDeceased($list['New Deaths_text']);
            $this->setTotalCases($list['Total Cases_text']);
            $this->setTotalDeceased($list['Total Deaths_text']);
            $this->setTotalRecovered($list['Total Recovered_text']);
        }
        
        public function jsonSerialize(): mixed {
            return get_object_vars($this);
        }
        
        public function getActiveCases() {
            return $this->activeCases;
        }
        
        public function setActiveCases($activeCases) {
            if (empty($activeCases)) {
                $this->activeCases = 'No data';
            } else {
                $this->activeCases = $activeCases;
            }
        }
        
        public function getCountry() {
            return $this->country;
        }
        
        public function setCountry($country) {
            $this->country = $country;
        }
        
        public function getLastModified() {
            return $this->lastModified;
        }
        
        public function setLastModified($lastModified) {
            $this->lastModified = $lastModified;
        }
        
        public function getNewCases() {
            return $this->newCases;
        }
        
        public function setNewCases($newCases) {
            if (empty($newCases)) {
                $this->newCases = 'No data';
            } else {
                $this->newCases = $newCases;
            }
        }
        
        public function getDeceased() {
            return $this->deceased;
        }
        
        public function setDeceased($deceased) {
            if (empty($deceased)) {
                $this->deceased = 'No data';
            } else {
                $this->deceased = $deceased;
            }
        }
        
        public function getTotalCases() {
            return $this->totalCases;
        }
        
        public function setTotalCases($totalCases) {
            if (empty($totalCases)) {
                $this->totalCases = 'No data';
            } else {
                $this->totalCases = $totalCases;
            }
        }
        
        public function getTotalDeceased() {
            return $this->totalDeceased;
        }
        
        public function setTotalDeceased($totalDeceased) {
            if (empty($totalDeceased)) {
                $this->totalDeceased = 'No data';
            } else {
                $this->totalDeceased = $totalDeceased;
            }
        }
        
        public function getTotalRecovered() {
            return $this->totalRecovered;
        }
        
        public function setTotalRecovered($totalRecovered) {
            if (empty($totalRecovered)) {
                $this->totalRecovered = 'No data';
            } else {
                $this->totalRecovered = $totalRecovered;
            }
        }
    }
?>
