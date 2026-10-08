-- Initialisation de la base de données 
USE coursportfolio;

CREATE TABLE IF NOT EXISTS creation (
    id_creation INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at DATE,
    picture VARCHAR(255)
);
