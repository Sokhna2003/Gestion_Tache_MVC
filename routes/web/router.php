<?php
$controllers=[
    "tache"=>"tache",
    "dashboard"=>"dashboard",

];

 $controller=$_REQUEST["controller"]??"tache";
 
 if (array_key_exists($controller, $controllers)) {
     $path=ROOT."controller/".$controllers[$controller]."Controller.php";
     }
     else{
         echo "controller introuvable";
         exit();
}
         
 require_once($path);