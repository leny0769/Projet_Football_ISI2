# Projet_Football_ISI2

Pour ajouter la BD : 
  1) creer une schéma nommé "Football" sur WSL2@localhost
  2)  Exécuter les 3 lignes suivantes : 
            create user userfootball@localhost identified by 'Projet';
            grant all privileges on Football.* to userfootball@localhost;
            flush privileges;
  3) En étant dans le répertoire du projet, exécuter la commande : php artisan migrate 
  4) Sur datagrip, les 13 tables sont normalement ajouté. Faites un clique droit sur le schéma "Football", "Run Sql Script", choissisez le script donné avec le projet
  5) Tout est bon !!!
