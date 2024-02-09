LEONARDO
Le premier milestone, consistant à avoir un projet Laravel fonctionnel avec le template Bootstrap intégré, a été complété et est maintenant disponible sur la branche main.
Étapes à suivre
Pour configurer et lancer le projet sur votre machine locale, veuillez suivre les étapes ci-dessous.

1.Cloner le projet

Commencez par cloner le dépôt sur votre machine locale :

git clone https://github.com/582-41E-MA/leonardo.git

cd leonardo

2.Installer les dépendances

Utilisez Composer pour installer les dépendances du projet :
composer update

3.Configurer l'environnement

Copiez le fichier .env.example en un nouveau fichier nommé .env 

4.Créer la base de données

Importez le fichier leonardo.sql dans votre système de gestion de base de données (comme phpMyAdmin ou MySQL Workbench). Cela créera la base de données nécessaire au projet. Le fichier leonardo.sql est disponible dans la branche main.

5.Configurer le fichier .env

Ouvrez le fichier .env et configurez les informations de connexion à votre base de données :

DB_PORT : Le port de votre serveur de base de données (généralement 3306 pour MySQL, ou 8889 avec MAMP).
DB_DATABASE : Le nom de votre base de données (ici, cela sera "leonardo").
DB_USERNAME : Votre nom d'utilisateur pour accéder à la base de données. 
DB_PASSWORD : Votre mot de passe pour accéder à la base de données. 

6.Lancer les migrations

Exécutez les migrations pour créer les tables nécessaires dans la base de données :

php artisan migrate

7.Lancer le serveur

php artisan serve 

Visitez http://localhost:8000 dans votre navigateur pour voir l'application en action.




