-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 mai 2023 à 19:25
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `basetr`
--

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `responsable` varchar(100) NOT NULL,
  `metier` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `association`
--

INSERT INTO `association` (`id`, `nom`, `responsable`, `metier`, `adresse`, `image`) VALUES
(32, 'khaled', 'chokri', 'soc', 'megrin', 'gggg'),
(34, 'houcem', 'mehdi', 'etu', 'gabes', 'gggg'),
(36, 'khaled', 'bbb', 'aa', 'oued', 'gggg'),
(37, 'khaled', 'ali', 'soc', 'manouba', 'gggg'),
(38, 'yassir', 'ahmer', 'sociale', 'tunis', 'gggg'),
(39, 'ijeba', 'mouhamed', 'fac', 'tunis', 'gggg'),
(40, 'ty', 'er', 'te', 'ty', 'gggg');

-- --------------------------------------------------------

--
-- Structure de la table `cagnotte`
--

CREATE TABLE `cagnotte` (
  `id` int(100) NOT NULL,
  `somme` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cagnotte`
--

INSERT INTO `cagnotte` (`id`, `somme`) VALUES
(1, 6700);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`nom`, `description`) VALUES
('abc', 'testdescaa'),
('Cuisine', 'Cuisine desc'),
('Freelance', 'freelance description'),
('IT', 'IT desc'),
('Jardin', 'Jardin desc'),
('Sport', 'sport desc');

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `nom_pub` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_communaute_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `communaute`
--
CREATE TABLE `communaute` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `num_tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




-- --------------------------------------------------------

--
-- Structure de la table `don`
--

CREATE TABLE `don` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `produit` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `jeton` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_association` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `don`
--

INSERT INTO `don` (`id`, `nom`, `produit`, `description`, `date`, `jeton`, `image`, `id_association`) VALUES
(50, 'haithem', 'krostina', '7amra', '1922-03-05', 0, 'ggg', 32),
(63, 'barrani', 'capuche', 'vert', '2023-03-06', 10, 'gggg', 34);

-- --------------------------------------------------------

--
-- Structure de la table `expertise`
--

CREATE TABLE `expertise` (
  `id` int(11) NOT NULL,
  `description` varchar(256) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `id_offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `id` int(100) NOT NULL,
  `nbr_pers` int(100) NOT NULL,
  `trv_pers` int(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `montant` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `nbr_pers`, `trv_pers`, `adresse`, `montant`) VALUES
(5, 8, 2, 'bizert', 0),
(6, 8, 2, 'bizert', 0),
(7, 2, 3, 'bizert', 0),
(8, 3, 2, 'bizert', 0),
(9, 2, 1, 'bizert', 0);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id_livraison` int(11) NOT NULL,
  `id_troc` int(11) NOT NULL,
  `id_livreur` int(11) NOT NULL,
  `date_demande` date NOT NULL,
  `date_livraison` date NOT NULL,
  `etat_livraison` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nom_categorie` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `reference` int(11) NOT NULL,
  `titre_rapport` varchar(254) NOT NULL,
  `description_produit` varchar(254) NOT NULL,
  `date_rapport` date NOT NULL,
  `image` varchar(254) NOT NULL,
  `id_expertise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `troc`
--

CREATE TABLE `troc` (
  `id_troc` int(11) NOT NULL,
  `produit1ref` int(11) NOT NULL,
  `produit2ref` int(11) NOT NULL,
  `nom1` varchar(256) NOT NULL,
  `nom2` varchar(256) NOT NULL,
  `numtel1` int(11) NOT NULL,
  `numtel2` int(11) NOT NULL,
  `shipping_adress1` varchar(256) NOT NULL,
  `shipping_adress2` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `numero` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `genre` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL,
  `id_wallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `age` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `bloquer` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `password`, `email`, `adresse`, `role`, `age`, `username`, `photo`, `bloquer`, `code`) VALUES
(1, 'sasa', 'sasaas', 'sasassas', 'sasa', 'sasa', 'sasa', '2023-03-08', 'sasa', 'sasa', 1, NULL);

-- Structure de la table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `views`
--

INSERT INTO `views` (`id`, `id_offre`, `id_user`, `nom_categorie`) VALUES
(18, 21, 14, 'IT'),
(19, 22, 14, 'IT'),
(20, 88, 99, 'Education'),
(21, 11, 899, 'Education'),
(22, 887, 1717, 'Education'),
(23, 998, 101, 'Sports'),
(24, 23, 15, 'IT'),
(25, 24, 15, 'IT'),
(26, 1, 11, 'IT'),
(27, 9, 7, 'abc');

-- --------------------------------------------------------

--
-- Structure de la table `wallet`
--

CREATE TABLE `wallet` (
  `id_wallet` int(11) NOT NULL,
  `nb_jeton` int(11) NOT NULL,
  `nb_transaction` int(11) NOT NULL,
  `date_transaction` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `wallet`
--

INSERT INTO `wallet` (`id_wallet`, `nb_jeton`, `nb_transaction`, `date_transaction`) VALUES
(1, 100, 1, '20/01/2023'),
(2, 150, 2, '20/01/2024'),
(3, 100, 1, '20/01/2023'),
(4, 150, 2, '20/01/2024'),
(5, 110, 1, '20/01/2023'),
(6, 100, 1, '20/01/2023'),
(7, 100, 1, '20/01/2023');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cagnotte`
--
ALTER TABLE `cagnotte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk6` (`id_communaute_id`) USING BTREE;

--
-- Index pour la table `communaute`
--
ALTER TABLE `communaute`
  ADD PRIMARY KEY (`id`);



--
-- Index pour la table `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cle` (`id_association`);

--
-- Index pour la table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_offre` (`id_offre`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_livraison`),
  ADD KEY `id_troc` (`id_troc`),
  ADD KEY `id_livreur` (`id_livreur`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom_categorie` (`nom_categorie`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`reference`),
  ADD KEY `id_expertise` (`id_expertise`);


--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ffa` (`iduser`),
  ADD KEY `ff2` (`idcom`) USING BTREE;

--
-- Index pour la table `troc`
--
ALTER TABLE `troc`
  ADD PRIMARY KEY (`id_troc`),
  ADD KEY `produit1ref` (`produit1ref`,`produit2ref`),
  ADD KEY `produit1ref_2` (`produit1ref`,`produit2ref`),
  ADD KEY `offre_troc1` (`produit2ref`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_wallet` (`id_wallet`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id_wallet`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `association`
--
ALTER TABLE `association`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `cagnotte`
--
ALTER TABLE `cagnotte`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `communaute`
--
ALTER TABLE `communaute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `don`
--
ALTER TABLE `don`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id_livraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `reference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `troc`
--
ALTER TABLE `troc`
  MODIFY `id_troc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id_wallet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk6` (`id_communaute_id`) USING BTREE;

--
-- Index pour la table `communaute`
--
ALTER TABLE `communaute`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ffa` (`iduser`),
  ADD KEY `ff2` (`idcom`) USING BTREE;


--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `communaute`
--
ALTER TABLE `communaute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour la table `don`
--
ALTER TABLE `don`
  ADD CONSTRAINT `don_ibfk_1` FOREIGN KEY (`id_association`) REFERENCES `association` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `expertise`
--
ALTER TABLE `expertise`
  ADD CONSTRAINT `offre_expertise` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `troc_livraison` FOREIGN KEY (`id_troc`) REFERENCES `troc` (`id_troc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_livreur` FOREIGN KEY (`id_livreur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `categorie_offre` FOREIGN KEY (`nom_categorie`) REFERENCES `categorie` (`nom`),
  ADD CONSTRAINT `user_offre` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `rapport_expertise` FOREIGN KEY (`id_expertise`) REFERENCES `expertise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `ffa` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`idcom`) REFERENCES `club` (`id`);

--
-- Contraintes pour la table `troc`
--
ALTER TABLE `troc`
  ADD CONSTRAINT `offre_troc` FOREIGN KEY (`produit1ref`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offre_troc1` FOREIGN KEY (`produit2ref`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_wallet` FOREIGN KEY (`id_wallet`) REFERENCES `wallet` (`id_wallet`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
