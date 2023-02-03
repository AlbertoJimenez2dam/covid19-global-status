<?php
    require_once('model/country.php');
    
    class Covid {
        private $apiEndPoint = 'https://covid-19.dataflowkit.com/v1/';
        private $covidData = 'data/covid_retrieved.json';
        private $serializedCovidData = 'data/covid_serialized.json';
        
        /*
         * Rewrites the full local data JSON file using the API data objects.
         */
        public function rewriteAll() {
            $data = json_decode(file_get_contents($this->covidData), JSON_OBJECT_AS_ARRAY);
            
            $newCountries = array();
            
            foreach ($data as $thisCountry) {
                new Country($thisCountry);
                array_push($newCountries, new Country($thisCountry));
            }
            
            file_put_contents($covidData, json_encode($newCountries));
        }
        
        /*
         * Returns the specified country using data from the API.
         */
        public function read($countryName) {
            $url = $this->apiEndPoint . $countryName;
            
            $data = json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);
            
            if ($data['Country_text'] != null) {
                return new Country($data);
            } else {
                return null;
            }
        }
        
        /*
         * Returns the specified country using data from the local serialized JSON file.
         */
        public function readPrevious($countryName) {
            foreach ($this -> readAll() as $thisCountry) {
                if ($thisCountry -> getCountry() == $countryName) {
                    return $thisCountry;
                }
            }
        }
        
        /*
         * Rewrites the specified country data in the local serialized JSON file.
         * Returns the country if the country date does not match; null otherwise.
         */
        public function register($country) {
            $localData = $this->readAll();
            
            for ($i = 0; $i < sizeof($localData); $i++) {
                if ($localData[$i] -> getCountry() == $country -> getCountry()) {
                    if ($localData[$i] -> getLastModified() == $country -> getLastModified()) {
                        return;
                    }
                    
                    $localData[$i] = $country;
                    
                    file_put_contents($this->serializedCovidData, serialize($localData));
                    
                    return $country;
                }
            }
        }
        
        /*
         * Returns an array containing every country using data from the local serialized JSON file.
         */
        public function readAll() {
            return unserialize(file_get_contents($this->serializedCovidData));
        }
    }
?>
