## Photos
Toutes les photos du site proviennent du site [pexels.com](https://www.pexels.com/) et sont libre 
d'utilisation.

Page d'accueil (slider) : 
[cottonbro](https://www.pexels.com/fr-fr/photo/nourriture-aube-homme-amour-6466304/), 
[GaPeppy1](https://www.pexels.com/fr-fr/photo/chaises-longues-d-exterieur-blanches-2373201/),
[Pixabay](https://www.pexels.com/fr-fr/photo/palmiers-la-nuit-258154/)

page d'accueil (à propos) : 
[Max Vakhtbovych](https://www.pexels.com/fr-fr/photo/orchidees-papillon-jaune-sur-evier-en-ceramique-blanche-6394549/),
[Sebastian Coman Photography](https://www.pexels.com/fr-fr/photo/rouleau-de-sushi-sur-plateau-et-table-3475617/),
[Alexandr Podvalny](https://www.pexels.com/fr-fr/photo/flotteur-flamant-rose-2705879/)



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
