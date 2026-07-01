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

INSERT INTO categories (name) VALUES ('Amis');
INSERT INTO categories (name) VALUES ('Famille');
INSERT INTO categories (name) VALUES ('Travail');
INSERT INTO categories (name) VALUES ('Autre');