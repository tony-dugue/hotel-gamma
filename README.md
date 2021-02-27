## Démarrer l'application
***

Pour démarrer le serveur web (à la racine du projet) :
```sh
$ symfony serve
```

## Installation

Créer le fichier .env.local avec la connexion à la base de données :

```dotenv
DATABASE_URL=mysql://root:root@127.0.0.1:8889/hotelgamma?serverVersion=5.7
```

- Installer les packages :

```shell script
$ composer install
```

- Créer la base de données et ajouter les fixtures :

```shell script
$ php bin/console doctrine:database:drop --force
$ php bin/console doctrine:database:create
$ php bin/console doctrine:migrations:migrate
$ php bin/console doctrine:fixtures:load
```

- Démarrer l'application :

```sh
$ symfony serve
```

Installation et compilation des assets :

```shell script
npm install
npm run watch
```
