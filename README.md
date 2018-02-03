Test Novaway

Pre-requis
- PHP7.1.3 avec PDO_SQLITE
- MySQL 5.7

Installation
- Cloner le repo
- Se rendre à la racine du projet, puis installer les dépendances de composer : ```composer install```
- Dans le terminal, taper : ```cp .env.dist .env```
- Editer le fichier .env pour renseigner les informations de connexion à la BDD, par exemple
    DATABASE_URL=mysql://root:root@127.0.0.1:3306/novaway
- Creer la BDD : ```php bin/console doctrine:database:create```
- Executer les migration : ```php bin/console doctrine:migrations:migrate```
- Ajouter les fixtures : ```php bin/console doctrine:fixtures:load```
