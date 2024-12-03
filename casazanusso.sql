CREATE DATABASE casazanusso;
USE casazanusso;

CREATE TABLE plats (
  id_plat int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nom_plat text NOT NULL,
  image_plat text NOT NULL,
  description_plat text NOT NULL,
  detail_plat text NOT NULL,
  prix_plat decimal(4,2) NOT NULL,
  nb_pers_plat int(11) NOT NULL,
  id_sorteplat int(11) NOT NULL,
  CONSTRAINT FK_plat_sorte
  FOREIGN KEY (id_sorteplat) REFERENCES sorte (id_sorte)
  ON DELETE CASCADE
  ON UPDATE CASCADE
);

CREATE TABLE sorte (
  id_sorte int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nom_sorte text NOT NULL
);

INSERT INTO plats (id_plat, nom_plat, image_plat, description_plat, detail_plat, prix_plat, nb_pers_plat, id_sorteplat) VALUES
(6, 'Cannellonis à la tomate', 'cannelloni.jpg', 'Cannellonis à la tomate ', 'Prix par personne', 12.20, 12, 1),
(7, 'Cochon de lait grillé', 'Cochon grillé.JPG', 'Cochon grillé à la broche. Poids compris entre 25 et 35Kg. Servi découpé ou pas selon vos envies.', 'Prix par personne', 26.70, 25, 1),
(8, 'Pates aux écrevisses', 'Pates aux ecrevisses.JPG', 'Pates à la sauce mozzarella assortie aux écrevisses.', 'Prix par personne', 18.00, 12, 1),
(9, 'Pates aux gambas', 'Pates pesto au gambas.JPG', 'Pates à la sauce pesto assortie de 3 gambas.', 'Prix par personne', 19.90, 6, 1),
(10, 'Hamburger di Napoli', 'Hamburger.JPG', 'Hamburger au steak ,épice, mozzarella ,oignons.', 'Prix par personne', 8.90, 6, 1),
(11, 'Plateau Charcuterie', 'plat_italien.jpg', 'Plateau Charcuterie italienne.', 'Prix au kilo', 26.65, 6, 1),
(12, 'Pannacota', 'pannacota.jpg', 'Crème fraiche accompagné de gélatine au coulis de fruits rouges.', 'Prix par personne', 7.00, 10, 2),
(13, 'Tiramisu au citron', 'Tiramisu_citron.JPG', 'Tiramisu à la crème fraîche aux aromes de citron', 'Prix par personne', 6.50, 6, 2);

INSERT INTO sorte (id_sorte, nom_sorte) VALUES
(1, 'Plat'),
(2, 'Dessert');

CREATE TABLE marches (
  id_marche int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ville_marche text NOT NULL,
  adresse_marche text NOT NULL,
  jour_marche ENUM('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche') NOT NULL,
  frequence_marche ENUM('Hebdomadaire','Exceptionnel','','') NOT NULL,
  date_marche date DEFAULT NULL,
  evenement_marche text DEFAULT NULL
);

INSERT INTO marches (id_marche, ville_marche, adresse_marche, jour_marche, frequence_marche, date_marche, evenement_marche) VALUES
(5, 'Lezat/Leze', 'Centre historique', 'Lundi', 'Hebdomadaire', NULL, NULL),
(8, 'Caujac', 'Place du village', 'Mardi', 'Hebdomadaire', NULL, NULL),
(9, 'Auterive', 'La Madeleine', 'Samedi', 'Exceptionnel', '2024-10-31', 'Halloween'),
(11, 'Mazamet', 'Place de la république', 'Lundi', 'Exceptionnel', '2024-10-30', 'Foire au potiron'),
(13, 'Roques/Garonne', 'Place de la république', 'Lundi', 'Exceptionnel', '2024-10-31', 'Marché de Noël'),
(14, 'Mauressac', 'Rue Emile Zola', 'Lundi', 'Exceptionnel', '2024-12-14', 'Marché de Noël'),
(15, 'Mazères', 'Avenue des peupliers', 'Mercredi', 'Hebdomadaire', NULL, NULL);




CREATE TABLE users (
  id_user int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  mail text NOT NULL,
  password text NOT NULL,
  token text 
);

INSERT INTO users (id_user, mail, password,token) VALUES
(2, 'alexzanusso@admin.fr', 'olivia',''),
(3,'a@aa.com','$2y$10$e9ZdGzXS4vncrxVSTyYHHuqaHlK5fWgc0b/a1dqQ2CP','');
