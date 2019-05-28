<?php
    class MagicienneBlanche extends Magicien {
           public function soinTotal(){
            // le constructeurn'est pas redéfini, donc on va remonte
            // de parent en parent jusqu'a trouver un constructeur
            if($this->getMagie() >=50) {
                $this->setSante($this->getSante() + 100);
                 $this->setMagie($this->getMagie() - 50);
            }
           }
          
        // gagner de l'experience : méthode redéfinie pour cette classe
         //surcharge / override : réécrire une fonction qui existe
        // déjà dans un parent
        // attention : la visibilité d'une propriété ou d'une méthode surchargée
        // doit être égale ou plus permissive que la visibilité dans le parent
        // private function gagnerExperience
           public function gagnerExperience() {
            $this->setExperience($this->getExperience() + 10);
           }

           }
?>