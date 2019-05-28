/*
/* Exercice : modéliser la classe Personnage :
* Il a un nom, une santé qui commence à 100,
* une force, une expérience
* Un personnage peut gagner de l'expérience :
* gagnerExperience
* le personnage doit monter de 5 en expérience
*
* propriètés, constructeur, getter/setter, gagnerExperience

<?php

//include"Personnage.php";


// autochargement de classes : dire à PHP d'aller chercher dans un
// dossier les classes qu'il ne trouve pas avant de les instancier


function loadClass($class) {
    require "entity/".$class.".php";
}
    spl_autoload_register("loadClass");




    $perso = new Personnage("Perso1", 22, 0);
    $perso2 = new Personnage("Perso2", 18, 0, 112);

    $perso->attaquer($perso2);
    $perso->attaquer($perso2);
    $perso2->attaquer($perso);
    $perso->gagnerExperience();


    /*
     * Exo supp : Utilisez la classe Personnage
     * Instanciez deux personnages, en leur donnant un nom, une force, une sante, une experience
     * sante commence à 100, experience à 0, la force est déterminée aléatoirement :
     * un chiffre entre 5 et 20 (on calcule cette force avant l'instanciation et on la passe au
     * constructeur ou au setter, au choix)
     * faites combattre les deux personnes dans une boucle : dès la santé d'un perso passe en dessous
     * de 0 : sortir de la boucle et afficher le perso gagnant
     */

       if (!Personnage::canWePlay()) {
        echo "C'est pas le moment de jouer mais de manger";
        exit;
    }


    $forceDragon = rand(5, 20);
    $dragon = new Personnage("Dragon", $forceDragon, 0);
    $pikachu = new Personnage("Pikachu", rand(5, 20), 0);

    echo "Force ".$dragon->getNom()." : ".$dragon->getForce()."<br>";
    echo "Force ".$pikachu->getNom()." : ".$pikachu->getForce()."<br>";

    do {
        // on vérifie qu'il rest des coups à jouer
        $dragon->attaquer($pikachu);
        $pikachu->attaquer($dragon);

        if ($dragon->soigner(Personnage::POINTS_SOIN)) {
            echo "Soin pour ".$dragon->getNom()."<br>";
        }
        if ($pikachu->soigner(Personnage::POINTS_SOIN)) {
            echo "Soin pour ".$pikachu->getNom()."<br>";
        }

        echo "Vie restante ".$dragon->getNom()." : ".$dragon->getSante()."<br>";
        echo "Vie restante ".$pikachu->getNom()." : ".$pikachu->getSante()."<br>";

    } while ($dragon->getSante() > 0 && $pikachu->getSante() > 0 && Personnage::$nbCoupsRestants > 0);

    echo "Expérience ".$dragon->getNom()." : ".$dragon->getExperience()."<br>";
    echo "Expérience ".$pikachu->getNom()." : ".$pikachu->getExperience()."<br>";

    if ($dragon->getSante() > 0 && $pikachu->getSante() > 0) {
        echo "Match nul";
    }
    elseif ($dragon->getSante() > 0) {
        echo $dragon->getNom()." a gagné !";
    }
    else {
        echo $pikachu->getNom()." a gagné !";
    }

    /* exercice : rajouter une fonction soigner
    qui prend un paramètre : la valeur entière a rajouter à la vie du perso
    cela augmentera donc sa santé, mais avec une chance sur deux
    valeur aléatoire entre 0 et 1 : si 0 pas de soin, si 1 soin

    dans le programme principal, la fonction soigner doit être appelée
    avec la valeur 15 en paramètre. Et elle doit être appelée à chaque tour
    de boucle après les attaques
    */
<?php 
    //include " personnage.php";


// Autochargement de classes: dire a PHP d'aller chercher dans un dossier des classes qu'il ne trouve pas avant de les instanciers

function loadClass($class){
    require"Entity/".$class.".php";
}
spl_autoload_register("loadClass");

   /*
     * Exo supp : Utilisez la classe Personnage
     * Instanciez deux personnages, en leur donnant un nom, une force, une sante, une experience
     * sante commence à 100, experience à 0, la force est déterminée aléatoirement :
     * un chiffre entre 5 et 20 (on calcule cette force avant l'instanciation et on la passe au
     * constructeur ou au setter, au choix)
     * faites combattre les deux personnes dans une boucle : dès la santé d'un perso passe en dessous
     * de 0 : sortir de la boucle et afficher le perso gagnant
     */

    if (!Personnage::canWePlay()) {
        echo "C'est pas le moment de jouer mais de manger";
        exit;
    }
    
    $carnouille = new Personnage("Carnouille",rand(5,20),0);
    $vegouille = new Personnage("Vegouille", rand(5,20), 0);

    echo "Forces ".$carnouille->getNom().": ".$carnouille->getForce()."<br>";
    echo "Forces ".$vegouille->getNom().": ".$vegouille->getForce()."<br>";

    do{
        $vegouille->attaquer($carnouille);
        $carnouille->attaquer($vegouille);
        if($vegouille->soigner(Personnage::POINT_SOIN) == true){
            echo "soin pour ".$vegouille->getNom()."<br>";
        };
        if($carnouille->soigner(Personnage::POINT_SOIN)== true){
            echo "soin pour ".$carnouille->getNom()."<br>";
        };
        echo "Vie restante".$carnouille->getNom().": ".$carnouille->getSante()."<br>";
        echo "Vie restante".$vegouille->getNom().": ".$vegouille->getSante()."<br>";
    }

    while($carnouille->getSante() > 0 && $vegouille->getSante() > 0 && Personnage::$nbCoupsRestants > 0);
        if ($carnouille->getSante() >0 && $vegouille->getSante() >0 ) {
            echo "Match null !";
        }

        elseif ($carnouille->getSante() >0 ) {
            echo $carnouille->getNom(). " a gagné!";
        }
        else{
            echo $vegouille->getNom(). " a gagné!";
        }

    /*CRUD avec manager*/
    $pdo = new PDO("mysql:host=localhost;dbname=php_formation;charset=UTF8",
            'root', '');
    $personnageManager = new PersonnageManager($pdo);
    $personnageManager->insert($vegouille);
    $personnageManager->insert($carnouille);
 ?>
?>