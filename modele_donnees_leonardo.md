
# Modèle Conceptuel de Données (MCD)

## Entités et attributs:

### Clients
- id (clé primaire)
- nom
- prenom
- email (unique)
- adresse
- mot_de_passe
- est_invité
- created_at
- updated_at

### Commandes
- id (clé primaire)
- id_client (clé étrangère référençant Clients.id)
- date_commande
- statut
- montant_total
- created_at
- updated_at

### DetailsCommande
- id (clé primaire)
- id_commande (clé étrangère référençant Commandes.id)
- id_produit (clé étrangère référençant Produits.id)
- quantite
- prix_unitaire
- created_at
- updated_at

### Paiements
- id (clé primaire)
- id_commande (clé étrangère référençant Commandes.id)
- date_paiement
- montant
- id_stripe
- statut
- created_at
- updated_at

### Produits
- id (clé primaire)
- nom_produit
- description
- model
- prix
- stock
- categorie
- image_url
- image_path
- materiaux
- technologie
- fonctionnalites
- certifications
- fabricant
- date_de_lancement

## Relations:

- Une **Commande** est passée par un **Client**.
- Une **Commande** peut contenir plusieurs **DétailsCommande**.
- Un **DétailCommande** fait référence à un **Produit**.
- Un **Paiement** est associé à une **Commande**.

# Modèle Physique de Données (MPD)

- **Clients**(*id*: int, *nom*: varchar(255), *prenom*: varchar(255), *email*: varchar(255), *adresse*: text, *mot_de_passe*: varchar(255), *est_invité*: tinyint(1), *created_at*: timestamp, *updated_at*: timestamp)
- **Commandes**(*id*: int, *id_client*: int, *date_commande*: datetime, *statut*: varchar(255), *montant_total*: decimal(10,2), *created_at*: timestamp, *updated_at*: timestamp)
- **DetailsCommande**(*id*: int, *id_commande*: int, *id_produit*: int, *quantite*: int, *prix_unitaire*: decimal(10,2), *created_at*: timestamp, *updated_at*: timestamp)
- **Paiements**(*id*: int, *id_commande*: int, *date_paiement*: datetime, *montant*: decimal(10,2), *id_stripe*: varchar(255), *statut*: varchar(255), *created_at*: timestamp, *updated_at*: timestamp)
- **Produits**(*id*: int, *nom_produit*: varchar(255), *description*: text, *model*: varchar(255), *prix*: decimal(10,2), *stock*: int, *categorie*: varchar(255), *image_url*: varchar(255), *image_path*: varchar(255), *materiaux*: text, *technologie*: text, *fonctionnalites*: text, *certifications*: varchar(255), *fabricant*: varchar(255), *date_de_lancement*: date)
