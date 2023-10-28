# Blog System README

Ce projet est un système de blog basique en PHP avec des fonctionnalités pour la gestion des utilisateurs, des articles, des catégories, des commentaires et une fonction de recherche.

## Installation

1. Clonez le dépôt depuis GitHub :

2. Configurez votre base de données en créant un fichier `.env` et en y ajoutant vos informations de base de données :

3. Importez le schéma de la base de données en utilisant le fichier SQL fourni.

4. Installez les dépendances en exécutant :

5. Configurez le serveur web pour pointer vers le répertoire public.

## Utilisation

- Accédez à la page d'accueil en ouvrant votre navigateur et en visitant : `http://localhost/`
- Vous pouvez vous connecter en utilisant un compte existant ou vous inscrire pour créer un nouveau compte.
- En tant qu'administrateur, accédez à la page d'administration à l'URL : `http://localhost/admin`
- Créez des articles, des catégories et ajoutez des commentaires.
- Recherchez des articles en utilisant la fonction de recherche sur la page d'accueil.

## Routes

- Page d'accueil : "/"
- Page de connexion : "/login"
- Page d'inscription : "/register"
- Page de déconnexion : "/logout"
- Profil de l'utilisateur : "/profile"
- Page d'administration : "/admin"
- Afficher un article : "/article/{id}"
- Créer un nouvel article : "/article/create"
- Éditer un article existant : "/article/edit/{id}"
- Supprimer un article : "/article/delete/{id}"
- Afficher tous les articles d'une catégorie : "/category/{id}"
- Créer une nouvelle catégorie : "/category/create"
- Éditer une catégorie existante : "/category/edit/{id}"
- Supprimer une catégorie : "/category/delete/{id}"
- Ajouter un commentaire à un article : "/comment/add/{article_id}"
- Modifier un commentaire : "/comment/edit/{comment_id}"
- Supprimer un commentaire : "/comment/delete/{comment_id}"
- Résultats de recherche : "/search"

## Contribuer

Si vous souhaitez contribuer à ce projet, veuillez ouvrir une issue ou créer une pull request sur GitHub.

## Auteurs

- Votre nom
- Autre auteur (si applicable)

## Licence

Ce projet est sous licence [MIT](LICENSE).
