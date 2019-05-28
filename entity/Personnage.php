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

 class Personnage
    {
        // propriétés
        private $nom;
        private $sante;
        private $force;
        private $experience;
        const POINTS_SOIN = 15;

        public static $nbCoupsRestants = 30;

    // constructeur
        public function __construct($nom="",$force="",$experience="", $sante=100)
        {
            //$this->nom  = $nom;c 'est pareil
            $this->setNom($nom);
            $this->setSante($sante);
            $this->setForce($force);
            $this->setExperience($experience);
        }

     // méthodes : getter/setter ou accesseur/mutateur en fr
        public function getNom() {
            return $this->nom;
        }
         public function setNom($nom) {
            $this->nom = $nom;
        }

         public function getSante() {
            return $this->sante;
        }
         public function setSante($sante) {
            $this->sante = $sante;
        }

        public function getForce() {
            return $this->force;
        }
         public function setForce($force) {
            $this->force = $force;
        }


        public function getExperience() {
            return $this->experience;
        }
         public function setExperience($experience) {
            $this->experience = $experience;
        }





          // gagner de l'experience
        public function gagnerExperience() {
            $this->experience = $this->experience + 5;
        }





      // attaquer un autre personne: la santé du personnage attaqué doit baisser de la force du premier.
   public function attaquer($persoAttaquer){
       $persoAttaquer->sante -= $this->force;
       
       /* Ou en détaillé
       -$nouvelleSante= $persoAttaque->getSante()- $this->force;
       -$persoAttaquer->setSante($nouvelleSante);*/
   }
    /*Exercice: rajouter une fonction soigner qui prend un parametre: ma valeur entiere a rajouter à la vie du perso cela augmente donc sa sante, mais avec une chance sur deux valeur aleatoire entre et 1 : si 0 pas de soin, si 1 soin
    dans le programme principal, la fonction soigner doit etre appelée avec la valeur 15 en parametre. Et elle doit etre appelée à chaque tour de boucle après les attaques
    */
   public function soigner($heal){
       if (rand(0,1)==1) {
           $this->sante += $heal;
           return true;
       }
        else{
            return false;
        }

        public static function canWePlay() {
            $hour = date("G");
            if ($hour<12 || $hour >= 14) {
                return true;
            }
            else {
                return false;
            }
        }

    }

?>
<?php  
/* 
* Exercice: Modélisez la classe Personnage:
* -Il a un nom, une santé qui commance à 100, une force, une expérience
* Un personnage peut gagner de l'expérience: 
    gagnerExperience
*Le personnage doit monter de 5 en expérience

-propriétés, constructeur, getter/setter, gagnerExperience
*/

class Personnage {
    private $id;
    private $created_at;
    private $nom;
    private $sante;
    private $force;
    private $experience;

    const POINT_SOIN = 15;

    public static $nbCoupsRestants = 30;

    public function __construct($nom, $force, $experience,$sante=100, $id="", $created_at=""){
            $this->setNom($nom);
            $this->setForce($force);
            $this->setExp($experience);
            $this->setSante($sante);
            $this->setId($id);
            $this->setCreateAt($created_at);
    }
//getter/setter
    public function getId(){
            return $this->id;
    }
    public function setId($id){
            $this->id = $id;
    }
/*------------------------------------------*/
    public function getCreatedAt(){
            return $this->created_at;
    }
    public function setCreateAt($created_at){
            $this->created_at = $created_at;
    }
/*------------------------------------------*/
    public function getNom(){
            return $this->nom;
    }
    public function setNom($nom){
            $this->nom = $nom;
    }
/*------------------------------------------*/
    public function getSante(){
            return $this->sante;
    }
    public function setSante($sante){
            $this->sante = $sante;
    }
/*------------------------------------------*/
    public function getForce(){
            return $this->force;
    }
    public function setForce($force){
            $this->force = $force;
    }
/*------------------------------------------*/
    public function getExp() {
           return $this->experience;
    }
    public function setExp($experience) {
            $this->experience = $experience;
    }
/*------------------------------------------*/
// gagner de l'experience
    public function gagnerExperience(){
        
        $this->experience = $this->experience + 5;
         
    }
// attaquer un autre personne: la santé du personnage attaqué doit baisser de la force du premier.
    public function attaquer($persoAttaquer){
        $persoAttaquer->sante -= $this->force;
        
        //gain d'experience après une attaque
        $this->gagnerExperience();

        //on diminue le nombre de coups restant avant fin de partie
        Personnage::$nbCoupsRestants--;
        self::$nbCoupsRestants--;

        /* Ou en détaillé
        -$nouvelleSante= $persoAttaque->getSante()- $this->force;
        -$persoAttaquer->setSante($nouvelleSante);*/
    }

/*------------------------------------------*/

    /*Exercice: rajouter une fonction soigner qui prend un parametre: ma valeur entiere a rajouter à la vie du perso cela augmente donc sa sante, mais avec une chance sur deux valeur aleatoire entre et 1 : si 0 pas de soin, si 1 soin

    dans le programme principal, la fonction soigner doit etre appelée avec la valeur 15 en parametre. Et elle doit etre appelée à chaque tour de boucle après les attaques
    */

    public function soigner($heal){


        if (rand(0,1)==1) {
            $this->sante += $heal;
            return true;
        }
        else{
            return false;
        }
    }

    public static function canWePlay(){
        $hour = date("G");
        if ($hour < 12 || $hour >= 14) {
            return true;
        }
        else {
            return false;
        }
    }
  }

<?php
    class Personnage {
        private $id;
        private $createdAt;
        protected $nom;
        private $sante;
        private $force;
        private $experience;
        const POINTS_SOIN = 13;

        public static $nbCoupsRestants = 150;

        // constructeur
        public function __construct($nom, $force, $experience, $sante=100, $id="", $createdAt="")
        {
            //$this->nom = $nom;
            $this->setNom($nom);
            $this->setForce($force);
            $this->setExperience($experience);
            $this->setSante($sante);
            $this->setId($id);
            $this->setCreatedAt($createdAt);
        }

        // getter/setter
        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getCreatedAt()
        {
            return $this->createdAt;
        }

        /**
         * @param mixed $createdAt
         */
        public function setCreatedAt($createdAt)
        {
            $this->createdAt = $createdAt;
        }

        public function getNom()  {
            return $this->nom;
        }
        public function setNom($nom) {
            $this->nom = $nom;
        }
        public function getSante()  {
            return $this->sante;
        }
        public function setSante($sante) {
            $this->sante = $sante;
        }
        public function getForce()  {
            return $this->force;
        }
        public function setForce($force) {
            $this->force = $force;
        }
        public function getExperience()  {
            return $this->experience;
        }
        public function setExperience($experience) {
            $this->experience = $experience;
        }

        // gagner de l'experience
        public function gagnerExperience() {
            $this->experience = $this->experience + 5;
        }

        // attaquer un autre personnage :  la santé du personnage attaqué
        // doit baisser de la force du premier
        public function attaquer($persoAttaque) {
            // $persoAttaque->sante -= $this->force;
            $nouvelleSante = $persoAttaque->getSante() - $this->force;
            $persoAttaque->setSante($nouvelleSante);

            // gain d'experience après une attaque
            $this->gagnerExperience();

            // on diminue le nombre de coups restants avant fin de partie
            // Personnage::$nbCoupsRestants--;
            self::$nbCoupsRestants--;
        }

        public function soigner($soin) {
            if (rand(0,1) == 1) {
                $this->sante += $soin;
                return true;
            }

            return false;
        }

        public static function canWePlay() {
            $hour = date("G");
            if ($hour < 12 || $hour >= 14) {
                return true;
            }
            else {
                return false;
            }
        }
    }

?>






?>

