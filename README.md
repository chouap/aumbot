# AUMBot
=========

L'objectif de AUMBot est de vous rendre actif sur adopteunmec.com afin que l'on s'intéresse à vous sans que vous ayez à faire quoi que ce soit.


Installation Sélénium serveur

  - Télécharger sur sélénium http://www.seleniumhq.org/download/
  - Lancer le serveur via java -jar <path_to>/selenium-server-standalone-<version>.jar
  
Installation de l'application

  - Dans app/config, créer le fichier parameters.yml
```code
parameters:
    database_host: 127.0.0.1
    database_port: null
    database_name: aumbot
    database_user: root
    database_password: root
    mailer_transport: smtp
    mailer_host: 127.0.0.1
    mailer_user: null
    mailer_password: null
    secret: 84e7006afc4a2cbedf7932cdaa8094fe0674eb77
    database_path: "%kernel.root_dir%/database/data.db3"
```
  - Aller dans l'application puis en ligne de commande :

```sh
$ composer install
$ mkdir app/database
$ php bin/console doctrine:schema:create
```
  - renseigner les paramètres de connexion dans src\AUMBotBundle\Resources\config\parameters.yml

Commande de lancement

```sh
$ php bin/console aumbot:run
```

Que fait l'application ?

  - Loggin sur adopteunmec
  - Lance la recherche
  - Récupère les profils
  - Visite les profils en lignes X fois avec Y seconde d'intervalle. X, Y sont des valeurs paramètrables
  - Se délogge
