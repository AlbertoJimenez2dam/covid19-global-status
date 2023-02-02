<?php
    require_once('controller/covid.php');
    
    //var_dump((new Covid()) -> read('Spain'));
    
    //var_dump((new Covid()) -> readPrevious('Spain'));
    
    //var_dump((new Covid()) -> readAll());
    
    var_dump((new Covid()) -> register((new Covid()) -> read('Spain')));
    
    //(new Covid()) -> rewriteAll();
?>
