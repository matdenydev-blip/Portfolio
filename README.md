# Portfolio - Page de Contact et Dockerisation

Application de portfolio en PHP clonée depuis le dépot indiqué dans l'exercice.

## Modifications apportées

Branche "page-contact"

### Nouvelle fonctionnalité : "page Contact"
Controllers/ContactController.php : nouveau controleur qui affiche la page.
Views/contact/index.php : Nouvelle vue avec Titre, texte et formulaire.
Views/base.php : ajout du lien contact dans le menu de navigation.

### Corrections necessaires au fonctionnement pour Docker:
Core/Router.php : Dans la méthode route() le contrôleur par défaut s'appelait "home" avec une minuscule. Le fichier HomeController.php n'était pas trouvé et la page d'accueil plantait. Remplacement de "home" par "Home".

Core/DbConnect.php : Le fichier DbConnect.php cherche d'abord l'adresse de la base de données dans les étiquettes posées par Docker. 
S'il n'en trouve pas, il utilise l'adresse de WampServer. Le même code marche ainsi sur mon PC et dans Docker.

Controllers/HomeController.php : la ligne $creation = new Creation(); provoquait une erreur fatale (Class "App\Controllers\Creation" not found) et faisait planter la page d'accueil, car la classe Creation est dans l'espace de noms App\Entities et n'était pas importée avec use. 
La variable n'était pas utilisée : j'ai donc commenté la ligne.

### Fichiers Docker ajoutés
Dockerfile : construit l'image du serveur web.
docker-compose.yml : lance le serveur web et la base MySQL ensemble.
db/init.sql : crée la table creation au premier démarrage de MySQL.

## Lancer l'application avec Docker

Cloner le dépôt et se placer sur la branche :
   
   git clone https://github.com/matdenydev-blip/Portfolio.git
   cd Portfolio
   git checkout page-contact
   cd "MVC_blog(autreMethode)-ssForm - githubECF4"
Construire et démarrer les conteneurs : docker compose up -d --build
Ouvrir http://localhost:8082
Vérifier l'état des conteneurs : docker compose ps

## Image Docker Hub

L'image du serveur web:
https://hub.docker.com/r/mathieudn/portfolio-contact

## Comment j'ai dockerisé l'application

Création d'un Dockerfile. 
   On part d'une image PHP avec Apache, on ajoute ce qu'il faut
   pour parler à MySQL, on copie le code dedans, et on dit à Apache que le site
   est dans le dossier "public".

Création d'un docker-compose.yml. Il lance deux conteneurs en même temps :
   le site (PHP + Apache) et la base de données (MySQL).

Création d'un fichier db/init.sql. MySQL l'exécute tout seul au premier
   démarrage pour créer la table "creation".

Lancement :
   docker compose up -d --build

J'ai mis l'image sur Docker Hub :
   docker tag mvc_blogautremethode-ssform-githubecf4-web mathieudn/portfolio-contact:latest
   docker push mathieudn/portfolio-contact:latest

