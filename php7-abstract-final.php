<?php 
// une sorte de modele a suivre

// une classe abatraite ne peut pas être instanciée, c'est juste un modèle
// sur lequel les dévs doivent se baser. Une classe abstraite impose donc
// des contraintes de développement
    abstract class Animal {
        protected $nom;
        protected $hasPoils;

        public function getNom(){return $this->nom;}
        public function setNom($nom){$this->nom = $nom;}

        public function dormir() {
            echo "RRRRR pssss";
        }

        // une méthode abstraite devra obligatoirement être redéfinie
        // dans les classes enfants.
        // une méthode abstraite ne peut exister que dans une classe abstraite
        abstract public function communiquer();
        abstract public function frapper($animal);
    }

    // une classe finale est une classe qui ne peut pas être héritée
    // aucune classe ne peut hériter de Dauphin
    final class Dauphin extends Animal {
        // rédéfinition (surcharge) obligatoire car méthode abstraite
        // dans la classe parent : respecter la signature
        // parent (visiblité et paramètres)
        public function communiquer() {
            echo "Biiiiiiiiiiii";
        }
        // idem
        public function frapper($animal) {
            echo "Coup de boule du dauphin sur ".$animal->getNom();
        }

        public function nager() {
            echo "Glouglou";
        }
    }

    class Singe extends Animal {
        private $longueurQueue;

        // une méthode final ne peut pas être redéfinie par les
        // classe qui hérite de Singe
        final public function mangerBanane() {
            echo "UHM MIAM MIAM";
        }

        public function communiquer() { echo "OUH OUH HIN";}
        public function frapper($animal) { echo "HIN HIN BOUM BOUM";}
    }

    class Bonobo extends Singe {
        // c'est interdit de rédéfinir mangerBanane car dans la classe parent
        // Singe, la méthode est finale
        // public function mangerBanane() {}
    }

    // interdit car classe abstraite
    // $animal = new Animal();
    $dauphin = new Dauphin();
    echo "<pre>";
    var_dump($dauphin);
    echo "</pre>";
    $dauphin->communiquer();
?>
