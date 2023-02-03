<?php
    require_once('controller/covid.php');
    
    //var_dump((new Covid()) -> read('Spain'));
    
    var_dump((new Covid()) -> readPrevious('Spain'));
    
    //var_dump((new Covid()) -> readAll());
    
    //var_dump((new Covid()) -> register((new Covid()) -> read('Spain')));
	
	//echo explode(' ', (new Covid()) -> readPrevious('Spain') -> getLastModified())[0];
	//echo date('Y-m-d');
    
    //(new Covid()) -> rewriteAll();
?>
