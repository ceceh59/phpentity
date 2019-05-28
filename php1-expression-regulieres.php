<?php
    /* Les expressions régulières : REGEX */
    // rechercher dans du texte des morceaux de texte correspondant
    // à un format (expression régulière) particulier

    // expression régulière simple : chercher un mot dans une chaine
    $test = "Chez moi, il y a une table";
    $regexp = "#table#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }


    $test = "Chez moi, il y a une table";
    $regexp = "#voiture#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    // les expressions régulières sont sensibles à la casse (par défaut)
    $test = "Chez moi, il y a une table";
    $regexp = "#Table#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    // chercher au moins un mot dans une chaine
    $test = "Chez moi, il y a une table et une voiture";
    $regexp = "#voiture|table|avion#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "Mon num portable c'est 0745544554";
    $regexp = "#06|07[0-9]{8}#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    // rechercher quelquechose qui commence par ou termine par
    $test = "Chez moi, il y a une table";
    $regexp = "#^table#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "Chez moi, il y a une table";
    $regexp = "#table$#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "Chez moi, il y a une table";
    $regexp = "#^table$#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "Chez moi, il y a une table";
    $regexp = "#^Chez.*table$#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    // expressions régulières avancées : plage de caractères recherchés
    $test = "Chez moi, il y a 6 arbres";
    $regexp = "#[5-9][a-zA-Z]{3,}#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "Chez moi, il y a 6 arbres";
    $regexp = "#[5-9]\s[a-zA-Z]{3,}#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "Il fait beau. Chez moi, il y a 6 arbres, et je vais nager.";
    $regexp = "#Chez.*[5-9]\s[a-zA-Z]{3,}#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "Il fait beau. Chez moi, il y a 6 arbres, et je vais nager.";
    $regexp = "#^Chez.*[5-9]\s[a-zA-Z]{3,}#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "Il fait beau. Chez moi, il y a 6 arbres, et je vais nager.";
    $regexp = "#Chez.*[5-9]\s[a-zA-Z]{3,}$#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    /*
     * Nombre d'occurences recherchées : quantificateurs
     * + : 1 ou plusieurs
     * ? : 0 ou 1
     * * : 0, 1 ou plusieurs
     * {5} : 5
     * {3, 10} : 3 mini, 10 max
     * {2,} : 2 mini, pas de max
     * {, 15} : pas de mini, 15 max
     * espace : \s
     * pas espace : \S
     * Intervalles de classe :
     * [a-z] : minuscule de a à z
     * [A-Z] : majuscule de A à Z
     * [0-9] : un chiffre de 0 à 9
     *         équivalent : \d
     * [0-9A-Z] : un chiffre ou une majuscule
     * [a-zA-Z0-9_] : équivalent : \w
     * [^a-zA-Z0-9_] : équivalent : \W
     * [0-9A-Zmù\!] : un chiffre de 0 à 9,
     *                  majuscule de A à Z ou un "m" ou un ù" ou "!"
     *                  équivalent détaillé : [0-9]|[A-Z]|m|ù|\!
     * [^0-9] : tout ce qui n'est pas chiffre
     * [^\!] : tout ce qui n'est pas "!"
     * [^0-46-9] : tout ce qui n'est pas de 0 à 4 ni de 6 à 9
     *
     */

    // OU avec quantificateurs
    $test = "Chez moi, il y a 6 arbres";
    $regexp = "#(Chez.*[5-9]){4}\s[a-zA-Z]{3,}$#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "Chez moi, il y a 6Chez moi fesfis 7Chez test 9Chez moi 7 arbres";
    $regexp = "#(Chez.*[5-9]){4}\s[a-zA-Z]{3,}$#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "Chez moi, il y a un arbre, une voitureavion.";
    $regexp = "#(voiture|avion|arbre){2}#";
    if (preg_match($regexp, $test)) {
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "tata toto titi toto";
    $regexp = "#[a-z]{4}#";
    if (preg_match($regexp, $test, $results)) {
        echo "<pre>";
        var_dump($results);
        echo "</pre>";
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $test = "tata toto titi toto";
    $regexp = "#[a-z]{4}#";
    if (preg_match_all($regexp, $test, $results)) {
        echo "<pre>";
        var_dump($results);
        echo "</pre>";
        echo $regexp." a été trouvé dans la chaine : ".$test."<br>";
    }
    else {
        echo $regexp." n'a pas été trouvé dans la chaine : ".$test."<br>";
    }

    $textArticle = "Bonjour, je m'appelle Toto et
    je vais vous présenter mon métier. Voici mon cv : www.cv-de-toto.fr.
    test.monsite.fr Et puis vous pouvez aller voir aussi mes photos de vacances : www.toto-vacances.fr toto-cool.fr";

    $regexp = "#(www\.)?[a-z0-9_\-]{2,}\.[a-z]{2,10}#";
    if (preg_match_all($regexp, $textArticle, $results)) {
        echo "<pre>";
        var_dump($results);
        echo "</pre>";
    }
    else {
    }

    echo $textArticle;

    /* preg_replace : remplacer toutes les occurences trouvées par quelque-chose
    */
    $regexp = "#(www\.|test\.)?[a-z0-9_\-]{2,}\.[a-z]{2,10}#";
    $textArticle = preg_replace($regexp, "<a href='http://$0'>$0</a>", $textArticle);

    echo "<br><br>".$textArticle;

 // mémento : https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/918834-memento-des-expressions-regulieres
    // Les options à ajouter avec le délimiteurs de fin :
/*
 *
i : la regex ne fera plus la différence entre majuscules / minuscules ;
s : le point (classe universelle) fonctionnera aussi pour les retours à la ligne (\n) ;
U : mode « Ungreedy » (pas gourmand). Utilisé pour que la regex s'arrête le plus tôt possible. Pratique par exemple pour le bbCode[b][/b] : la regex s'arrêtera à la première occurrence de[/b].
 */
?>


