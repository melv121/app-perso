-- Base de données pour BallotPro
-- Script de création des tables et d'insertion de données

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `ballotpro`
--
CREATE DATABASE IF NOT EXISTS `ballotpro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ballotpro`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT 'category-default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`) VALUES
(1, 'Ballots Premium', 'premium', 'Vêtements de marques sélectionnés', 'premium.jpg'),
(2, 'Ballots Vintage', 'vintage', 'Pièces rétro à forte valeur ajoutée', 'vintage.jpg'),
(3, 'Ballots Casual', 'casual', 'Vêtements quotidiens toutes saisons', 'casual.jpg'),
(4, 'Ballots Enfants', 'enfants', 'Vêtements pour enfants de tous âges', 'enfants.jpg'),
(5, 'Ballots Luxe', 'luxe', 'Articles de luxe invendus à prix avantageux', 'luxe.jpg'),
(6, 'Ballots Mix', 'mix', 'Assortiment varié de vêtements tous styles', 'mix.jpg'),
(7, 'Ballots Sport', 'sport', 'Vêtements et accessoires de sport', 'sport.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `tier` enum('standard','premium','luxe') NOT NULL DEFAULT 'standard'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `tier`) VALUES
(1, 'Ralph Lauren', 'ralph-lauren', 'premium'),
(2, 'Nike', 'nike', 'premium'),
(3, 'Adidas', 'adidas', 'premium'),
(4, 'Zara', 'zara', 'standard'),
(5, 'H&M', 'h-m', 'standard'),
(6, 'Louis Vuitton', 'louis-vuitton', 'luxe'),
(7, 'Gucci', 'gucci', 'luxe'),
(8, 'Chanel', 'chanel', 'luxe'),
(9, 'Tommy Hilfiger', 'tommy-hilfiger', 'premium'),
(10, 'Levi\'s', 'levis', 'premium'),
(11, 'The North Face', 'the-north-face', 'premium'),
(12, 'Carhartt', 'carhartt', 'premium'),
(13, 'Calvin Klein', 'calvin-klein', 'premium'),
(14, 'Puma', 'puma', 'premium'),
(15, 'Uniqlo', 'uniqlo', 'standard'),
(16, 'Primark', 'primark', 'standard'),
(17, 'Lacoste', 'lacoste', 'premium'),
(18, 'Fila', 'fila', 'standard'),
(19, 'Champion', 'champion', 'standard'),
(20, 'Vintage Divers', 'vintage-divers', 'premium'),
(21, 'Mix Marques', 'mix-marques', 'standard');

-- --------------------------------------------------------

--
-- Structure de la table `ballots`
--

CREATE TABLE `ballots` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `original_price` decimal(10,2) DEFAULT NULL,
  `discount_percent` int(11) DEFAULT 0,
  `weight` decimal(10,2) NOT NULL COMMENT 'en kg',
  `pieces_count` int(11) NOT NULL COMMENT 'nombre approximatif de pièces',
  `estimated_retail` decimal(10,2) NOT NULL COMMENT 'valeur estimée pour la revente',
  `is_premium` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT 'ballot-default.jpg',
  `stock` int(11) NOT NULL DEFAULT 0,
  `sales` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ballots`
--

INSERT INTO `ballots` (`id`, `name`, `slug`, `description`, `category_id`, `price`, `original_price`, `discount_percent`, `weight`, `pieces_count`, `estimated_retail`, `is_premium`, `image`, `stock`, `sales`, `created_at`) VALUES
(1, 'Ballot Premium Ralph Lauren', 'ballot-premium-ralph-lauren', 'Ballot composé exclusivement de pièces Ralph Lauren authentiques. Comprend des polos, t-shirts, chemises et pulls en excellent état. Idéal pour les boutiques de seconde main haut de gamme.', 1, 599.00, 699.00, 14, 12.00, 35, 1800.00, 1, 'ballot-ralph-lauren.jpg', 5, 12, '2023-03-15 10:00:00'),
(2, 'Mix Sportswear Nike/Adidas', 'mix-sportswear-nike-adidas', 'Ballot mixte contenant des vêtements de sport Nike et Adidas. Comprend des t-shirts techniques, shorts, leggings et sweatshirts. Parfait pour les revendeurs spécialisés dans le sportswear.', 7, 450.00, 450.00, 0, 10.00, 40, 1200.00, 1, 'ballot-nike-adidas.jpg', 8, 24, '2023-03-20 14:30:00'),
(3, 'Ballot Vintage Années 90', 'ballot-vintage-annees-90', 'Collection de vêtements vintage authentiques des années 90. Comprend des jeans, t-shirts, sweatshirts et vestes. Pièces sélectionnées pour leur style rétro très tendance.', 2, 350.00, 400.00, 13, 15.00, 50, 1500.00, 0, 'ballot-vintage-90.jpg', 3, 18, '2023-04-05 09:15:00'),
(4, 'Ballot Casual Mixte', 'ballot-casual-mixte', 'Assortiment de vêtements casual de tous les jours. Marques variées de milieu de gamme. Idéal pour démarrer une activité de revente avec un investissement modéré.', 3, 250.00, 250.00, 0, 20.00, 70, 800.00, 0, 'ballot-casual-mix.jpg', 15, 42, '2023-03-12 11:45:00'),
(5, 'Ballot Enfants 3-10 ans', 'ballot-enfants-3-10', 'Vêtements pour enfants âgés de 3 à 10 ans. Comprend des t-shirts, pantalons, robes et pulls de marques diverses. Excellent état, peu ou pas porté.', 4, 199.00, 249.00, 20, 8.00, 60, 600.00, 0, 'ballot-enfants.jpg', 10, 15, '2023-03-25 16:20:00'),
(6, 'Ballot Tommy Hilfiger', 'ballot-tommy-hilfiger', 'Ballot composé uniquement de pièces Tommy Hilfiger authentiques. T-shirts, polos, chemises et pulls pour hommes et femmes. Idéal pour les revendeurs de marques américaines.', 1, 499.00, 549.00, 9, 12.00, 30, 1500.00, 1, 'ballot-tommy-hilfiger.jpg', 4, 8, '2023-04-10 13:00:00'),
(7, 'Ballot Luxe Accessoires', 'ballot-luxe-accessoires', 'Collection d\'accessoires de luxe invendus. Comprend des ceintures, foulards, portefeuilles et petite maroquinerie de marques prestigieuses. Authentification garantie avec certificats.', 5, 1299.00, 1499.00, 13, 5.00, 15, 5000.00, 1, 'ballot-luxe-accessoires.jpg', 2, 3, '2023-04-15 10:30:00'),
(8, 'Ballot Vintage Denim', 'ballot-vintage-denim', 'Sélection premium de jeans vintage des années 80 et 90. Levi\'s, Wrangler, Lee et autres marques emblématiques. Modèles recherchés par les collectionneurs.', 2, 450.00, 450.00, 0, 18.00, 25, 1800.00, 1, 'ballot-vintage-denim.jpg', 3, 9, '2023-03-18 09:45:00'),
(9, 'Ballot Mix Été', 'ballot-mix-ete', 'Assortiment de vêtements d\'été légers. T-shirts, shorts, robes légères et chemises de diverses marques. Parfait pour préparer la saison estivale.', 6, 299.00, 350.00, 15, 14.00, 55, 900.00, 0, 'ballot-mix-ete.jpg', 12, 20, '2023-04-20 15:15:00'),
(10, 'Ballot Premium Pulls Hiver', 'ballot-premium-pulls-hiver', 'Collection de pulls et sweats de marques premium. Ralph Lauren, Lacoste, Tommy Hilfiger et autres. Parfait pour les stocks d\'hiver à forte marge.', 1, 550.00, 650.00, 15, 16.00, 30, 1800.00, 1, 'ballot-pulls-premium.jpg', 6, 10, '2023-04-08 14:00:00'),
(11, 'Ballot Vestes The North Face', 'ballot-vestes-north-face', 'Lot de vestes et parkas The North Face authentiques. Modèles récents en excellent état, idéal pour les boutiques outdoor et streetwear.', 7, 799.00, 899.00, 11, 15.00, 20, 2400.00, 1, 'ballot-north-face.jpg', 4, 6, '2023-04-12 11:30:00'),
(12, 'Ballot Calvin Klein Sous-vêtements', 'ballot-calvin-klein', 'Assortiment de sous-vêtements Calvin Klein. Boxers, slips, soutiens-gorge et culottes. Produits neufs avec étiquettes.', 1, 350.00, 400.00, 13, 6.00, 80, 1200.00, 0, 'ballot-calvin-klein.jpg', 8, 14, '2023-03-22 13:45:00'),
(13, 'Ballot Luxe Invendus', 'ballot-luxe-invendus', 'Collection exceptionnelle de vêtements de luxe invendus. Pièces récentes de grandes maisons. Certificats d\'authenticité inclus. Investissement premium pour revendeurs spécialisés.', 5, 2999.00, 3499.00, 14, 10.00, 20, 12000.00, 1, 'ballot-luxe-invendus.jpg', 1, 2, '2023-04-18 09:00:00'),
(14, 'Ballot Vintage Streetwear', 'ballot-vintage-streetwear', 'Sélection de pièces streetwear vintage des années 90 et 2000. Supreme, Stüssy, FUBU et autres marques emblématiques. Pièces recherchées par les collectionneurs.', 2, 599.00, 699.00, 14, 12.00, 25, 2500.00, 1, 'ballot-vintage-streetwear.jpg', 2, 7, '2023-04-25 10:20:00'),
(15, 'Ballot Mix Grandes Tailles', 'ballot-mix-grandes-tailles', 'Assortiment de vêtements grandes tailles (XL-XXXL). Différentes marques et styles, pour hommes et femmes. Niche à fort potentiel.', 6, 299.00, 349.00, 14, 22.00, 40, 950.00, 0, 'ballot-grandes-tailles.jpg', 7, 11, '2023-04-02 15:30:00'),
(16, 'Ballot Vintage Chemises Hawaïennes', 'ballot-vintage-hawaii', 'Collection unique de chemises hawaïennes vintage authentiques des années 70-90. Pièces colorées très recherchées par les boutiques spécialisées.', 2, 399.00, 399.00, 0, 8.00, 30, 1500.00, 0, 'ballot-hawaii.jpg', 2, 5, '2023-04-28 14:15:00'),
(17, 'Ballot Enfants Marques Premium', 'ballot-enfants-premium', 'Vêtements pour enfants de marques premium. Ralph Lauren, Tommy Hilfiger, Lacoste et autres. Excellente qualité, faible usure.', 4, 399.00, 450.00, 11, 10.00, 45, 1200.00, 1, 'ballot-enfants-premium.jpg', 5, 8, '2023-04-05 12:40:00'),
(18, 'Ballot Jeans Mix', 'ballot-jeans-mix', 'Assortiment de jeans de différentes marques et styles. Coupe droite, slim, bootcut. Idéal pour boutiques généralistes.', 3, 350.00, 350.00, 0, 25.00, 50, 1200.00, 0, 'ballot-jeans-mix.jpg', 9, 15, '2023-03-28 11:10:00'),
(19, 'Ballot Sport Femme', 'ballot-sport-femme', 'Vêtements de sport féminins de marques variées. Leggings, brassières, t-shirts techniques et vestes. Parfait pour les revendeurs fitness.', 7, 399.00, 450.00, 11, 12.00, 45, 1100.00, 0, 'ballot-sport-femme.jpg', 6, 11, '2023-04-15 16:20:00'),
(20, 'Ballot Adidas Originals', 'ballot-adidas-originals', 'Collection Adidas Originals comprenant t-shirts, sweats et joggings. Pièces streetwear très demandées.', 7, 499.00, 550.00, 9, 14.00, 35, 1500.00, 1, 'ballot-adidas-originals.jpg', 5, 13, '2023-04-20 13:50:00');

-- --------------------------------------------------------

--
-- Structure de la table `ballot_brand`
--

CREATE TABLE `ballot_brand` (
  `id` int(11) NOT NULL,
  `ballot_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL COMMENT 'pourcentage approximatif du ballot'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ballot_brand`
--

INSERT INTO `ballot_brand` (`id`, `ballot_id`, `brand_id`, `percentage`) VALUES
(1, 1, 1, 100),
(2, 2, 2, 50),
(3, 2, 3, 50),
(4, 3, 20, 100),
(5, 4, 21, 100),
(6, 5, 21, 100),
(7, 6, 9, 100),
(8, 7, 6, 35),
(9, 7, 7, 35),
(10, 7, 8, 30),
(11, 8, 10, 60),
(12, 8, 20, 40),
(13, 9, 21, 100),
(14, 10, 1, 30),
(15, 10, 9, 30),
(16, 10, 17, 40),
(17, 11, 11, 100),
(18, 12, 13, 100),
(19, 13, 6, 30),
(20, 13, 7, 40),
(21, 13, 8, 30),
(22, 14, 20, 100),
(23, 15, 21, 100),
(24, 16, 20, 100),
(25, 17, 1, 40),
(26, 17, 9, 30),
(27, 17, 17, 30),
(28, 18, 10, 20),
(29, 18, 13, 15),
(30, 18, 21, 65),
(31, 19, 2, 25),
(32, 19, 3, 20),
(33, 19, 14, 30),
(34, 19, 21, 25),
(35, 20, 3, 100);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `siret` varchar(14) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `company_name`, `siret`, `address`, `city`, `postal_code`, `country`, `phone`, `role`, `created_at`, `last_login`) VALUES
(1, 'admin', 'admin@ballotpro.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'System', 'BallotPro', '12345678901234', '123 Rue Principal', 'Paris', '75000', 'France', '0123456789', 'admin', '2023-03-01 10:00:00', '2023-05-01 15:30:00'),
(2, 'testuser', 'test@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jean', 'Dupont', 'VintageShop', '98765432109876', '45 Avenue des Gobelins', 'Paris', '75013', 'France', '0687654321', 'customer', '2023-03-15 14:20:00', '2023-04-30 11:45:00');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('pending','paid','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `total` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `billing_address` text NOT NULL,
  `shipping_address` text NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `ballot_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Index pour la table `ballots`
--
ALTER TABLE `ballots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `ballot_brand`
--
ALTER TABLE `ballot_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ballot_id` (`ballot_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference` (`reference`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `ballot_id` (`ballot_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `ballots`
--
ALTER TABLE `ballots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `ballot_brand`
--
ALTER TABLE `ballot_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ballots`
--
ALTER TABLE `ballots`
  ADD CONSTRAINT `ballots_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ballot_brand`
--
ALTER TABLE `ballot_brand`
  ADD CONSTRAINT `ballot_brand_ibfk_1` FOREIGN KEY (`ballot_id`) REFERENCES `ballots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ballot_brand_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`ballot_id`) REFERENCES `ballots` (`id`) ON DELETE CASCADE;
