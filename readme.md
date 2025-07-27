# GestionEtudiant_composerPHP

## Description
GestionEtudiant_composerPHP est une application web développée en PHP permettant la gestion des entités liées aux étudiants, telles que les corrections, les examens, les professeurs, les établissements et les épreuves. Le projet suit une architecture MVC (Modèle-Vue-Contrôleur) pour une organisation claire et maintenable du code.

## Fonctionnalités
- Gestion des corrections : création, modification, affichage et suppression des corrections.
- Gestion des épreuves : opérations CRUD (Créer, Lire, Mettre à jour, Supprimer) sur les épreuves.
- Gestion des établissements : opérations CRUD sur les établissements.
- Gestion des examens : opérations CRUD sur les examens.
- Gestion des professeurs : opérations CRUD sur les professeurs.
- Interface utilisateur responsive et cohérente grâce à l'utilisation de Bootstrap.
- Utilisation de templates PHP pour l'en-tête et le pied de page afin d'assurer une mise en page uniforme.

## Structure du projet
- `public/` : répertoire accessible publiquement contenant le point d'entrée `index.php`.
- `src/Models/` : classes PHP représentant les modèles de données.
- `src/Controllers/` : contrôleurs gérant les requêtes HTTP et la logique métier.
- `src/Views/` : templates PHP pour le rendu des pages HTML.
- `config/` : fichiers de configuration, notamment la connexion à la base de données.
- `vendor/` : dépendances gérées par Composer (si applicable).

## Prérequis
- PHP 7.4 ou supérieur
- Serveur web (Apache, Nginx, etc.) configuré pour servir le répertoire `public/`
- Composer (pour la gestion des dépendances, si nécessaire)
- Base de données MySQL ou compatible (configurée dans `config/Database.php`)

## Installation
1. Cloner le dépôt :
   ```
   git clone <url-du-depot>
   ```
2. Configurer le serveur web pour servir le répertoire `public/`.
3. Configurer la base de données et mettre à jour les paramètres dans `config/Database.php`.
4. Exécuter le script SQL `script.sql` pour créer les tables nécessaires et insérer les données initiales.
5. Installer les dépendances avec Composer (si applicable) :
   ```
   composer install
   ```
6. Accéder à l'application via un navigateur web.

## Utilisation
- Naviguer vers la page d'accueil.
- Utiliser la navigation pour gérer les corrections, examens, professeurs, établissements et épreuves.
- Les formulaires permettent de créer et modifier les enregistrements.
- Les listes affichent les enregistrements existants avec des options pour modifier ou supprimer.


