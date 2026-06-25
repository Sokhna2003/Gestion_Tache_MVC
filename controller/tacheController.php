<?php
require_once ROOT."/model/produitModel.php";
auth();
$liste=function(){
$produits = getAllproduits();
$total_produits=countTable("produit");
    loadView("produits/liste",["produits"=>$produits,"total_produits"=>$total_produits]);


};

$ajout=function(){
    $errors=[];
    if (isset($_POST["ajouter"])) {
        isEmpty("reference",$_POST["reference"],$errors,"Veuillez renseigner la reference");
        isEmpty("libelle",$_POST["libelle"],$errors,"Veuillez renseigner le libelle");
        isEmpty("description",$_POST["description"],$errors,"Veuillez renseigner la description");
        isEmpty("prix",$_POST["prix"],$errors,"Veuillez renseigner le prix");
        isEmpty("stock",$_POST["stock"],$errors,"Veuillez renseigner la stock");
        
        if (validate($errors)) {
            $produit=[
                "reference"=>$_POST["reference"],
                "libelle"=>$_POST["libelle"],
                "description"=>$_POST["description"],
                "prix"=>$_POST["prix"],
                "stock"=>$_POST["stock"]
            ];
            addProduit($produit);
            redirectTo("produit","liste");
        }

    }

 loadView("produits/ajout",["errors"=>$errors]);

};

$detail=function(){
echo "je detail un produit";
};

$modifier=function(){
echo "je modifie un produit";
};

$supprimer=function(){
echo "je supprime un produit";
};


$actions=[
    "liste"=>$liste,
    "ajout"=>$ajout,
    "detail"=>$detail,
    "modifier"=>$modifier,
    "supprimer"=>$supprimer
    
];
 $action=$_REQUEST["action"]??"liste";
 
 if (array_key_exists($action, $actions)) {
         $actions[$action]();
     }
     else{
         echo "page introuvable c produit";
         exit();
}
         
