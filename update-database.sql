-- Mise à jour de la base de données pour ajouter la colonne category
USE `marketplace_artisanat`;

-- Ajouter la colonne category si elle n'existe pas
ALTER TABLE `products` 
ADD COLUMN `category` VARCHAR(50) DEFAULT 'art' 
AFTER `price`;

-- Mettre à jour les produits existants avec des catégories par défaut
UPDATE `products` SET `category` = 'art' WHERE `category` IS NULL OR `category` = '';

-- Vérifier que la colonne a été ajoutée
DESCRIBE `products`;
