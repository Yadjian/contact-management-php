CREATE DATABASE IF NOT EXISTS contact_manager;

USE contact_manager;

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    phone VARCHAR(20),
    city VARCHAR(50),
    address VARCHAR(100),
    category_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO categories (id, name) VALUES 
(1, 'Amis'),
(2, 'Famille'),
(3, 'Travail'),
(4, 'Autre');

INSERT INTO contacts (first_name, last_name, email, phone, city, address, category_id) VALUES 
('Thomas', 'Dubois', 'thomas.dubois@gmail.com', '0601020304', 'Paris', '10 rue de Rivoli', 1),
('Sophie', 'Martin', 'sophie.martin@gmail.com', '0611223344', 'Lyon', '5 avenue des Brotteaux', 2),
('Julien', 'Leroy', 'julien.leroy@gmail.com', '0622334455', 'Marseille', '20 boulevard Michelet', 3),
('Clémence', 'Moreau', 'clemence.moreau@gmail.com', '0633445566', 'Bordeaux', '15 rue Sainte-Catherine', 1),
('Nicolas', 'Girard', 'nicolas.girard@gmail.com', '0644556677', 'Nantes', '8 place Graslin', 2),
('Amélie', 'Roux', 'amelie.roux@gmail.com', '0655667788', 'Lille', '3 rue Esquermoise', 3),
('Bastien', 'Garnier', 'bastien.garnier@gmail.com', '0666778899', 'Toulouse', '12 rue d Alsace', 4);