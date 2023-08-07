# API REST avec Laravel

# Description

Ce projet est une API REST développée avec le framework Laravel. Elle permet de :

1. Création de posts: Les utilisateurs peuvent créer de nouveaux posts en fournissant un titre, un contenu et d'autres informations facultatives.

2. Affichage de tous les posts: Les utilisateurs peuvent afficher tous les posts disponibles dans l'application.

3. Recherche de posts par lettre: L'API propose une fonction de recherche qui permet aux utilisateurs de rechercher des posts en utilisant une lettre spécifique. Les résultats de recherche afficheront tous les posts contenant cette lettre dans leur titre ou leur contenu.

4. Suppression de posts: Les utilisateurs peuvent supprimer des posts existants.

5. Authentication des utilisateurs: Pour accéder aux fonctionnalités de création de nouveaux posts, les utilisateurs doivent s'authentifier en fournissant leurs identifiants (nom d'utilisateur et mot de passe).

# Installation

Pour installer et exécuter l'API sur votre environnement local, suivez les étapes ci-dessous :

1. Clonez le dépôt git sur votre machine locale
# git clone https://github.com/Alain-kay/Laravel-api-rest.git


2. Installez les dépendances du projet
#composer install

3. Configurer la base de données en créant un fichier .env et en y spécifiant les informations d'accès à votre base de données.

4. Générer la clé d'application Laravel :
# php artisan key:generate

4. Effectuer les migrations pour créer les tables de la base de données :
# php artisan migrate

5. Démarrer le serveur de développement :
# php artisan serve

L'API sera alors accessible à l'adresse http://localhost:8000.

# Endpoints de l'API

L'API propose les endpoints suivants :

. GET /api/posts: Récupère tous les posts disponibles.
. GET /api/posts/{id}: Récupère un post spécifique en fonction de son id.
. POST /api/posts: Crée un nouveau post.
. GET /api/posts/search/{letter}: Recherche des posts en utilisant une lettre spécifique dans leur titre ou leur contenu.
. DELETE /api/posts/{id}: Supprime un post spécifique en fonction de son id.
. POST /api/register: Permet à un utilisateur de s'inscrire en fournissant un nom d'utilisateur, un email et un mot de passe.
. POST /api/login: Permet à un utilisateur de s'authentifier en fournissant un nom d'utilisateur et un mot de passe.

# Authentification

L'API utilise une authentication basique à l'aide de tokens d'accès (API tokens). Pour accéder aux fonctionnalités de création de posts, les utilisateurs doivent s'authentifier en envoyant une requête POST à l'endpoint /api/login. Le serveur renverra alors un token d'accès qui devra être inclus dans les en-têtes de toutes les requêtes ultérieures pour les actions protégées.

Exemple de requête d'authentication :

POST /api/login
Content-Type: application/json

{
  "name": "admin",
  "password": "admin"
}

# Exemple de réponse avec le token :

{
  "access_token": "votre_token"
}

Pour les requêtes nécessitant une authentication, assurez-vous d'inclure l'en-tête Authorization avec la valeur Bearer votre_token pour chaque requête.

# Auteur
    ALAIN KAYUMBA





