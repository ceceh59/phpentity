<?php
    /** OBJET **/
    class User
    {
        // propriétés
        private $id;
        private $name;
        private $email;
        private $birthday;
        private $age;

        // constructeur
        public function __construct($nom="", $email="")
        {
            //$this->name = $nom;
            $this->setName($nom);
        }

        // méthodes : getter/setter ou accesseur/mutateur en fr
        // pour obtenir get et modifier la valeur set comme c'est en private


        
        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $name = mb_strtoupper($name);
            $this->name = $name;
        }

        // autres méthodes
        public function direBonjour() {
            echo "Bonjour, je m'appelle ".$this->name;
        }
    }
    // pour ce soit plus lisible

    function dumper($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }

    // instanciation
    $user = new User("Gilles");
    $user->direBonjour();
    /*
     sans le mutateur, il aurait faire ça pour chaque instance de user
    ce traitement (mise en majuscule) est maintenant centraliser dans la classe User
    $inputName = "toto";
    $inputName = mb_strtoupper($inputName);
    $user->name = $inputName;
    */

    //echo $user->getName();

    $user2 = new User("jean jacques");
    $user2->direBonjour();

    $user3 = new User("toto");
    $user3->setName("toto2");
    $user3->direBonjour();

    $user4 = new User("gilbert");
    //$user2->setName("tata");

    dumper($user2);
    dumper($user3);
    dumper($user4);

    // objet existant en PHP nativement
    $dt = new DateTime();
    $dt->add(new DateInterval("P35D"));
    echo $dt->format("d/m/Y");


    
?>

