<?php

/*
 * Les liens seron sous la forme : ex1: nomdusite.ci?module=accueil
 *                                  ex2: nomdusie.ci?module=profil&action=connexion
 * 
 * Pour afficher une page le module ddoit existé puis l'action aussi
 * si le module n'existe pas on affiche une page par defaut sinon
 * on se rend au module et on cherche l'action
 * 
 * 
 */


include './brain/init.php';

$head = "global/head.php";

//démarage de la temporisation

ob_start();

//Première vérification 
//Existance de module dans url


if (isset($_GET["module"])) {

    //deuxieme vérificaion existance du module sur espace serveur

    /*
     * Cette partie est a remplacée quand les fonction dans brain seron disponible
     */
    
    $module = __DIR__ . "/modules/" . $_GET["module"] . "/" . $_GET["module"] . ".php";
    if (is_file($module)) {
        include $module;
    }
    //sinon module par defaut
    else {
        include "";
    }
}
//sinon module par defaut
else {
    include "";
}

//fin de la temporisation


    $content = ob_get_clean();


//Debut du rendu

    include $head;


    echo $content;
?>