<?php
require_once ROOT."/model/tacheModel.php";

$liste=function(){
$taches = getAllTaches();
$total_taches=countTable("taches");
    loadView("tache/liste",["taches"=>$taches,"total_taches"=>$total_taches]);


};

$ajout=function(){
    $errors=[];
    if (isset($_POST["ajout"])) {
        isEmpty("libelle",$_POST["libelle"],$errors,"Veuillez renseigner le libelle");
        isEmpty("date_debut",$_POST["date_debut"],$errors,"Veuillez renseigner la date_debut");
        isEmpty("date_fin",$_POST["date_fin"],$errors,"Veuillez renseigner la date_fin");
        isEmpty("description",$_POST["description"],$errors,"Veuillez renseigner la description");
        isEmpty("statut",$_POST["statut"],$errors,"Veuillez renseigner le statut");

        if (!empty($_POST["date_debut"]) && !empty($_POST["date_fin"])) {
            if (strtotime($_POST["date_fin"]) < strtotime($_POST["date_debut"])) {
                $errors["date_fin"] = "La date de fin doit être ultérieure à la date de début";
            }
        }
        
        if (validate($errors)) {
            $tache=[
                "libelle"=>$_POST["libelle"],
                "date_debut"=>$_POST["date_debut"],
                "date_fin"=>$_POST["date_fin"],
                "description"=>$_POST["description"],
                "statut"=>$_POST["statut"]
            ];
            addTache($tache);
            redirectTo("tache","liste");
        }

    }

 loadView("tache/ajout",["errors"=>$errors]);

};

$detail = function() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $tache = getTacheById($id);

    if (empty($tache)) {
        echo "Tâche introuvable";
        exit();
    }

    loadView("tache/detail", ["tache" => $tache]);
};

$terminer = function() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($id > 0) {
        marquerCommeTerminee($id);
    }
    redirectTo("tache", "liste");
};

$supprimer = function() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($id > 0) {
        deleteTache($id);
    }
    redirectTo("tache", "liste");
};

$modifier=function(){
    echo "je modifie une tache";
};




$actions=[
    "liste"=>$liste,
    "ajout"=>$ajout,
    "detail"=>$detail,
    "terminer"  => $terminer,
    "modifier"=>$modifier,
    "supprimer"=>$supprimer
    
];
 $action=$_REQUEST["action"]??"liste";
 
 if (array_key_exists($action, $actions)) {
         $actions[$action]();
     }
     else{
         echo "page introuvable c tache";
         exit();
}
         
