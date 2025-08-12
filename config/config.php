<?php

try{
    
    $db = new PDO('mysql:host=localhost;dbname=prepaid;','root','');

}

catch(Exception $e){
    echo "Connection Failed" . $e->getMessage(); 
}