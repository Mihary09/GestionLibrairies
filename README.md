Gestion de Librairie
Bienvenue dans l'application de gestion de librairie ! Ce projet vise à permettre une gestion efficace des livres, catégories et membres au sein d'une librairie.

Description
Cette application web permet de :

Ajouter de nouveaux livres à la base de données (Create).

Consulter la liste des livres avec leurs auteurs, catégories et dates d'édition (Read).

Modifier les informations existantes des livres (Update).

Supprimer des livres de la base de données (Delete).

Le projet utilise PHP et Bootstrap 5 pour l'interface utilisateur et les interactions avec la base de données MySQL.

Fonctionnalités
1. Gestion des Livres
Ajouter des livres avec un titre, un auteur et une catégorie.

Modifier les informations d'un livre existant.

Supprimer des livres.

Afficher la liste complète des livres avec pagination et recherche.

2. Gestion des Catégories
Afficher les catégories disponibles.

Associer chaque livre à une catégorie.

3. Gestion des Membres (en cours de développement)

Installation

Prérequis
Serveur web local (ex. WAMP, XAMPP, ou MAMP).
Base de données MySQL.

Étapes
1/ Clonez ce dépôt dans le répertoire de votre serveur local :

bash
git clone https://github.com/Mihary09/GestionLibrairies.git

2/ Importez le fichier librairies.sql qui se trouve dans le dossier BD dans votre base de données MySQL pour créer les tables nécessaires.

3/ Configurez la connexion à la base de données dans library/App/livre.php :

php
$dsn = "mysql:host=localhost;dbname=librairies";
$user = "root";
$password = "";

4/ Lancez le serveur et accédez à l'application via : http://localhost/nom_du_repertoire/index.php.

Technologies Utilisées
Frontend :

HTML, CSS, Bootstrap 5.

Backend :

PHP pour le traitement des données.

Base de données :

MySQL pour stocker les informations.
