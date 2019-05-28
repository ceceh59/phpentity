<?php
   /* LES JOINTURES SQL */
/* différence entre myisam et innobd : https://sql.sh/1548-mysql-innodb-myisam */

/*
    1-Jointure interne :
    Va retourner tous les enregistrements pour lesquels il y a une correspondance
    demandé par les jointures (sur les deux champs liés dans le ON)


    Exemple: Retourne tous les produits qui sont liés à un pays. Les produits sans pays
            ne font pas partie des résultats.
    SELECT * FROM `product` INNER JOIN country ON product.pays_id=country.id

    2-Jointure externe :
    Retourne tous les enregistrements d'une table même si il n'y a pas de correspondance
    entre les deux tables. LEFT permet de retourner tous les enregistrements de la table
    à gauche, RIGHT tous les enregistrements de la table à droite

    Exemple : retourne tous les produits même s'ils ne sont pas liés à un pays
    SELECT * FROM `product` LEFT JOIN country ON product.pays_id=country.id

    Exemple : retourne tous les pays même s'il n'y a pas de produit dedans
    SELECT * FROM `product` RIGHT JOIN country ON product.pays_id=country.id


 En plus des jointures, le moteur innodb permet de créer des clés étrangères.
Les clés étrangères pointent vers des champs d'une autre table, ce qui empêche
les incohérences dans les données
Exemple : si le pays "1" n'existe pas, aucun produit ne peut avoir pour valeur "1" dans
le champ "pays_id"
*/
?>




<!-- -- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Avril 2019 à 16:54
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `php_formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE `couleur` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `couleur`
--

INSERT INTO `couleur` (`id`, `name`) VALUES
(1, 'Noir'),
(2, 'Jaune'),
(3, 'Vert');

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(2, 'Belgique'),
(3, 'Italie'),
(4, 'Allemagne'),
(5, 'Espagne');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `code` varchar(16) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `stock` smallint(6) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `pays_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `description`, `price`, `stock`, `category`, `created_at`, `pays_id`) VALUES
(4, 'AGH-159-20190412', 'Produit 1', 'cswcsw', '15.00', 1, 'Carte graphique', '2019-04-12 14:43:06', NULL),
(5, 'ABC-123-20190412', 'hthft', 'htfhfth', '15.89', 2, 'Carte graphique', '2019-04-12 14:43:16', 2),
(6, 'ECR-869-20190412', 'Ecran 19', 'FRGDRGRD', '156.00', 5, 'Ecran', '2019-04-12 16:12:23', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product_couleur`
--

CREATE TABLE `product_couleur` (
  `product_id` int(11) NOT NULL,
  `couleur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product_couleur`
--

INSERT INTO `product_couleur` (`product_id`, `couleur_id`) VALUES
(4, 1),
(4, 2),
(4, 3),
(5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `email`, `date_naissance`, `age`) VALUES
(20, 'test', 'test@gmail.com', '2010-10-10', 10),
(21, 'thomas56du59', 'test@mail.fr', '2017-02-02', 25),
(22, 'fab', 'test', '2016-01-01', 15),
(23, 'Ouja', 'test@mail.fr', '2018-02-02', 55),
(24, 'test', 'test45@gmail.com', '2018-02-02', 13),
(25, 'thomas', 'test@gmail.com', '2010-10-10', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PAYS` (`pays_id`);

--
-- Index pour la table `product_couleur`
--
ALTER TABLE `product_couleur`
  ADD PRIMARY KEY (`product_id`,`couleur_id`),
  ADD KEY `FK_COLOR` (`couleur_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_PAYS` FOREIGN KEY (`pays_id`) REFERENCES `country` (`id`);

--
-- Contraintes pour la table `product_couleur`
--
ALTER TABLE `product_couleur`
  ADD CONSTRAINT `FK_COLOR` FOREIGN KEY (`couleur_id`) REFERENCES `couleur` (`id`),
  ADD CONSTRAINT `FK_PRODUCT` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-->

  <?php
$pdo = new PDO("mysql:host=localhost;dbname=php_formation;charset=UTF8",
            'root', '');

$statement = $pdo->prepare('SELECT * FROM country');
$result = $statement->execute();
$pays = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare('SELECT * FROM couleur');
$result = $statement->execute();
$couleurs = $statement->fetchAll(PDO::FETCH_ASSOC);

$idToUpdate = $_GET['id'];
if (isset($_POST['btn_pays_couleurs'])) {
    $paysSelectionne = filter_input(INPUT_POST, 'pays');
    $couleursSelectionnees = filter_input(INPUT_POST, 'couleurs',
                                        FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);



    // récupérer les ids des pays en base pour voir
    // le choix de l'utilisateur est bien l'un d'eux
    $paysIds = [];
    foreach ($pays as $pEnBase) {
        $paysIds[] = $pEnBase['id'];
    }

    $errors = [];
    if (!in_array($paysSelectionne, $paysIds)) {
        $errors[] = "Veuillez sélectionner un pays valide";
    }

    if (count($errors) == 0) {
        $statement = $pdo->prepare('UPDATE product SET pays_id=:pays WHERE id=:id');
        $statement->execute([
            ':pays' => $paysSelectionne,
            ':id' => $idToUpdate
        ]);

        // insertion des couleurs en base pour ce produit
        // la liste droulante est multiple, il faut insérer les couleurs une à une dans
        // la table intermédiaire "product_couleur"

        // on peut supprimer toutes les associations produits/couleurs
        // avant de réinsérer les nouvelles associations
        // DELETE FROM product_couleur WHERE product_id=:idProduit
        foreach ($couleursSelectionnees as $couleursSelectionnee) {
            // on peut vérifier si le duo existe déjà en base :
            // SELECT * FROM product_couleur  WHERE product_id=:idProduit AND couleur_id=:idCouleur
             // $statement->rowCount() : nombre de résultat de la requête
            $statement = $pdo->prepare('INSERT INTO product_couleur(product_id,couleur_id)
                                VALUES (:idProduit, :idCouleur)');
            $result = $statement->execute([
                            ':idProduit' => $idToUpdate,
                            ':idCouleur' => $couleursSelectionnee
                        ]);
        }

    }




}
?>

<form method="post">
    <select name="pays">
        <?php
            foreach ($pays as $p) {
                echo "<option value='".$p['id']."'>".$p['name']."</option>";
            }
        ?>
    </select>

    <select name="couleurs[]" multiple>
        <?php
            foreach ($couleurs as $couleur) {
                echo "<option value='".$couleur['id']."'>".$couleur['name']."</option>";
            }
        ?>
    </select>

    <input type="submit" name="btn_pays_couleurs" />
</form>
                                                      