# Projet_Football_ISI2

Pour ajouter la BD : 
  1) creer une schéma nommé "Football" sur WSL2@localhost
  
  2)  Exécuter les 3 lignes suivantes : 
            create user userfootball@localhost identified by 'Projet';
            grant all privileges on Football.* to userfootball@localhost;
            flush privileges;
  3) 
  - Se placer dans le dossier 'Football_Project'
  - Installer les dépendances du projets : composer install
  - Créer une copie du fichier .env avec le commande suivante : cp .env.exampl .env
  et ajouter les informations pour se connecter à la database (DATATBASE, USERNAME, PASSWORD).
  - Générer un clé d'encryption pour l'application : php artisan key:generate
  - En étant dans le répertoire du projet, exécuter la commande : php artisan migrate 

  4) Sur datagrip, les 13 tables sont normalement ajouté. Faites un clique droit sur le schéma "Football", "Run Sql Script", choissisez le script donné avec le projet
  
  5) Tout est bon !!!

  Dernières précisions : 
    Concernant la base de données
    - Elle contient que les clubs appartenant à des championnats français. 
    - Et, nous avons seulement les joueurs appartenant au club : Olympique Lyonnais. Notamment pour afficher les statistiques d'un joueur. 

  Donc pour résumer, quand vous êtes sur la page d'acceuil : 
    - Choisir France
    - Choisir ligue 1 2021
    - Choisir Olympique Lyonnais
    - Choisir un joueur pour afficher ses statistiques et détails (Certains joueurs n'ont pas de stats).

Merci !
