1/ Creation de la table et des donn�es :
Jouer le script sql 'exercice3-importMagasins.sql' pour cr�er la table magasin et y ins�rer une liste de magasins.

2/ Test de l'API REST : recherche / ajout / suppression /modification :

Un controller 'StoreController.php' a �t� cr�e ainsi qu'une classe 'Store.php'.
Aussi un dossier store a �t� cr�e dans templates avec 5 nouveaux templates d�di�s � la gestion des magasins.
Enfin le fichier ajax.js a �t� modifier pour r�agir au clic de l'utilisteur lors de l'ajout ou la suppression ou la modification d'un magasin.

Voici les fonctionnalit�s de recherche de magasins (m�thode GET) avec possibilit� de filtre ou trie :
- Voir tous les magasin sur sur cette route : /store_list.php (ou si on met l'url compl�te http://localhost/wshop-test/FwTest/public/store_list.php)
- Voir tous les magasins mais en filtrant sur la ville du magasin : /store_list.php?filter=Paris (la fonction getWithFilter() a �t� cr��e dans Store.php)
- Voir tous les magasins mais en triant par ordre alphab�tique /store_list.php?sort=ASC (la fonctin getWithSort() a �t� cr��e dans Store.php)
- Voir tous les magasins mais en triant par ordre alphab�tique invers� /store_list.php?sort=DESC
- Voir un seul magasin sur cette route : /store_detail.php?id=1

Pour ajouter un magasin (m�thode POST) :
Rendez vous sur /store_add.php
Un formulaire vous permettra de renseigner le nom du magasin � cr�er en BDD.

Pour supprimer un magasin (m�thode DELETE) :
Rendez vous sur /store_delete.php
Un formulaire vous permettra de renseigner l'id du magasin � supprimer de la BDD.

Pour modifier un magasin (m�thode PUT) :
Rendez vous sur /store_modify.php
Un formulaire vous permettra de renseigner l'id du magasin et le nouveau nom du magasin pour une maj en BDD.