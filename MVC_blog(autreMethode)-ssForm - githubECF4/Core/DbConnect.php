<?php

namespace App\Core;

use PDO;
use Exception;

class DbConnect
{
    protected $connection;
    protected $request;

    const SERVER = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const BASE = 'coursportfolio';

    public function __construct()
    {
        try {
            // Lecture des paramètres de connexion à la base de données.
            // Chaque paramètre est d'abord cherché dans les variables d'environnement
            // (posées par Docker). S'il est absent, on utilise la constante par défaut
            // (valeurs de WampServer en local).

            // Adresse du serveur MySQL (en Docker : le nom du service "db")
            $host = getenv('DB_HOST') ?: self::SERVER;
            // Nom d'utilisateur MySQL
            $user = getenv('DB_USER') ?: self::USER;
            // Mot de passe MySQL
            $password = getenv('DB_PASSWORD') ?: self::PASSWORD;
            // Nom de la base de données
            $base = getenv('DB_BASE') ?: self::BASE;

            // Création de la connexion PDO avec les paramètres récupérés
            $this->connection = new PDO('mysql:host=' . $host . ';dbname=' . $base, $user, $password);

            // Activation des erreurs PDO
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Les retours de requête seront en Tableau objet par défaut
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            // Encodage des caractères spéciaux en "utf8"
            $this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
