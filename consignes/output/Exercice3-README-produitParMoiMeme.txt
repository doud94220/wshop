1/ Creation de la table et des données :
Jouer le script sql 'exercice3-importMagasins.sql' pour créer la table magasin et y insérer une liste de magasins.

2/ Test de l'API REST : recherche / ajout / suppression /modification :

Un controller 'StoreController.php' a été crée ainsi qu'une classe 'Store.php'.
Aussi un dossier store a été crée dans templates avec 5 nouveaux templates dédiés à la gestion des magasins.
Enfin le fichier ajax.js a été modifier pour réagir au clic de l'utilisteur lors de l'ajout ou la suppression ou la modification d'un magasin.

Voici les fonctionnalités de recherche de magasins (méthode GET) avec possibilité de filtre ou trie :
- Voir tous les magasin sur sur cette route : /store_list.php (ou si on met l'url complète http://localhost/wshop-test/FwTest/public/store_list.php)
- Voir tous les magasins mais en filtrant sur la ville du magasin : /store_list.php?filter=Paris (la fonction getWithFilter() a été créée dans Store.php)
- Voir tous les magasins mais en triant par ordre alphabétique /store_list.php?sort=ASC (la fonctin getWithSort() a été créée dans Store.php)
- Voir tous les magasins mais en triant par ordre alphabétique inversé /store_list.php?sort=DESC
- Voir un seul magasin sur cette route : /store_detail.php?id=1

Pour ajouter un magasin (méthode POST) :
Rendez vous sur /store_add.php
Un formulaire vous permettra de renseigner le nom du magasin à créer en BDD.

Pour supprimer un magasin (méthode DELETE) :
Rendez vous sur /store_delete.php
Un formulaire vous permettra de renseigner l'id du magasin à supprimer de la BDD.

Pour modifier un magasin (méthode PUT) :
Rendez vous sur /store_modify.php
Un formulaire vous permettra de renseigner l'id du magasin et le nouveau nom du magasin pour une maj en BDD.