<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once('controller/covid.php');
    
    $covid = new Covid();
    
    if (isset($_GET['country'])) {
        $currentCountry = $_GET['country'];
    }
    
    $countries = $covid -> readAll();
    
    require_once('view/header.php');
    
    if (isset($currentCountry)) {
        $country = $covid -> read($currentCountry);
        
        if ($country == null) {
            echo 'Country ' . $currentCountry . ' not found.';
        } else {
            $updatedCountry = $covid -> register($country);
            
            if ($updatedCountry != null) {
                $country == $updatedCountry;
            }
            
            require_once('view/country.php');
        }
    }
    
    require_once('view/footer.php');
?>
