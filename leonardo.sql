-- Création de la table Produits
CREATE TABLE Produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_produit VARCHAR(255) NOT NULL,
    description TEXT,
    prix DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    categorie VARCHAR(255),
    image_url VARCHAR(255)
);

-- Création de la table Clients
CREATE TABLE Clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255) UNIQUE NOT NULL,
    adresse TEXT,
    mot_de_passe VARCHAR(255),
    est_invité BOOLEAN DEFAULT TRUE
);

-- Création de la table Commandes
CREATE TABLE Commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT,
    date_commande DATETIME NOT NULL,
    statut VARCHAR(255) NOT NULL,
    montant_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_client) REFERENCES Clients(id)
);

-- Création de la table DetailsCommande
CREATE TABLE DetailsCommande (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_commande INT,
    id_produit INT,
    quantite INT NOT NULL,
    prix_unitaire DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_commande) REFERENCES Commandes(id),
    FOREIGN KEY (id_produit) REFERENCES Produits(id)
);

-- Création de la table Paiements
CREATE TABLE Paiements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_commande INT,
    date_paiement DATETIME NOT NULL,
    montant DECIMAL(10, 2) NOT NULL,
    id_stripe VARCHAR(255) NOT NULL,
    statut VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_commande) REFERENCES Commandes(id)
);
