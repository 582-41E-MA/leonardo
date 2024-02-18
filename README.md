# LEONARDO

Le deuxième milestone, qui consistait à développer un projet Laravel avec l'affichage des produits dans la page d'index et la visualisation détaillée des produits par ID dans une page "show" spécifique, tout en intégrant le template Bootstrap, a été complété avec succès. Ces fonctionnalités sont désormais opérationnelles et disponibles sur la branche main.

## Étapes à suivre pour la configuration

Pour configurer et lancer le projet sur votre machine locale, veuillez suivre les étapes ci-dessous.

### 1. Cloner le projet

Commencez par cloner le dépôt sur votre machine locale :

git clone https://github.com/582-41E-MA/leonardo.git

cd leonardo


### 2. Installer les dépendances

Utilisez Composer pour installer les dépendances du projet :

composer update

### 3. Configurer l'environnement

Copiez le fichier `.env.example` en un nouveau fichier nommé `.env`.

### 4. Créer la base de données

Importez le fichier `leonardo_update.sql` dans votre système de gestion de base de données (comme phpMyAdmin ou MySQL Workbench). Cela créera la base de données nécessaire au projet. Le fichier `leonardo.sql` est disponible dans la branche `main`.

### 5. Configurer le fichier `.env`

Ouvrez le fichier `.env` et configurez les informations de connexion à votre base de données :

- `DB_PORT`: Le port de votre serveur de base de données (généralement `3306` pour MySQL, ou `8889` avec MAMP).
- `DB_DATABASE`: Le nom de votre base de données (ici, cela sera "leonardo").
- `DB_USERNAME`: Votre nom d'utilisateur pour accéder à la base de données.
- `DB_PASSWORD`: Votre mot de passe pour accéder à la base de données.

### 6. Lancer les migrations

Exécutez les migrations pour créer les tables nécessaires dans la base de données :

php artisan migrate


### 7. Lancer le serveur

Démarrer le serveur de développement :

php artisan serve

Visitez http://localhost:8000 dans votre navigateur pour voir l'application en action.

### Configuration Stripe pour les Tests

Pour tester les fonctionnalités de paiement, vous aurez besoin de configurer Stripe avec des clés API de test.

1.Connectez-vous à votre [dashboard Stripe].(https://dashboard.stripe.com/test/apikeys)
2.Trouvez vos clés d'API de test Clé publique et Clé secrète.
3.Ajoutez ces clés à votre fichier .env :

STRIPE_KEY=your_stripe_key_here
STRIPE_SECRET=your_stripe_secret_here

###Tester les Paiements

Pour tester les fonctionnalités de paiement sans effectuer de transactions réelles, vous pouvez utiliser les numéros de carte de crédit de test fournis par Stripe. Voici un exemple de numéro de carte de crédit de test que vous pouvez utiliser :

Numéro de carte : 4242 4242 4242 4242
Date d'expiration : Une date future 
CVC : Un nombre aléatoire à 3 chiffres 







