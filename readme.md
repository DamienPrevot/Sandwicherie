# Sandwicherie en ligne

Une société de restauration rapide propose à ses clients un service en ligne de commande de sandwichs réalisé par notre agence il y a plusieurs années.

Le site ne correspond aujourd'hui plus au standard actuel et son offre à depuis évoluer. Ce client à refait appel à nous pour faire évoluer son site web.

## Demande commerciale
Après discussion entre le commercial et le client, voici les points qui ressortent parmis ce que souhaite le client.

Avoir une interface d'administration permettant de : 
* Pouvoir mettre à jour ses produits
* Pouvoir mettre à jour ses niveaux de stock
* Voir la liste de ses clients
* Avoir des graphs des ventes, des produits, etc

Sur l'interface public, le client souhaite : 
* Avoir un espace client des dernières commandes
* Mettre des visuels
* Un design "genre airbnb"
* Le prix total de la commande doit être présent et mit à jour dynamiquement à chaque changement dans la commande

D'après les études clients mené via le compte Google Analytics, IE 8 représente une grosse part de marché. Il est donc important que le site soit compatible avec IE8 minimum.

## Etude technique
Quasiment rien ne peux être repris de l'ancien site. Il est important de garder la base de données et de la migrer, le client ne souhaite pas perdre ses données.

Technologies à utiliser : 
* PHP 5.6
* Mysql 5.6
* HTML 5
* CSS 3
* JS : ECMAScript 5
* Bootstrap 3
* JQuery 1.11
* JQueryUI 1.11
* HighCharts 4.2
* Modernizr (Compatilibilité IE8)

Le code devra utiliser le framework interne à notre agence web et être mit sous versionnement git. Il sera déployable sur les serveurs via Capistrano.

### Recommandations lead-dev
Après audit du site actuel, notre lead-developpeur nous a fait parvenir ses recommandations : 
* Plus d'écriture de fichier sur le disque
* Tout doit passer par la BDD
* Utilisation d'un framework pour la base de code
* Utiiisation de versionnement pour le code
* Faire attention au performences du site web sans Varnish (Un site trop lent de quelques mili-seconde rate des ventes)
* Schéma des tables SQL à revoir
* Mise en place d'un système CRUD (Create, Read, Update, Delete) pour les produits.
* Si jQueryUI s'avère non nécessaire, il sera envisagé d'utiliser Zepto au lieu de jQuery.
* Stocker certaines informations telle que la taxe en fichier PHP de configuration.

### Recommandations admin-DB
Notre administrateur de base de données à étudier la base actuel et a établie un schéma de la nouvelle base de donnée.

Table "clients" : 

||idClient|nom|prenom|mail|adresse|ville|
|-|-|-|-|-|-|-|
|Schéma|int(10) unsigned not null|varchar(255) not null|varchar(255) not null|varchar(255) not null|varchar(255) not null|varchar(255) not null|
|Foreign Key|Auto-incrément Primary Key|||Unique||
|Default|||||||
|Comment|||||||

Table "commandes"
||idCommande|idClient|status|pain|garniture|sauce|
|-|-|-|-|-|-|-|
|Schéma|int(10) unsigned not null|int(10) unsigned not null|tinyint(1) unsigned not null|varchar(255) not null|varchar(255) not null|varchar(255) not null|
|Foreign Key|Auto-incrément Primary Key||||||
|Default||0|0|||[]|
|Comment||||||Json data|

Table "produit"
||idProduit|idProduitCategorie|nom|description|visuel|prixHT|
|-|-|-|-|-|-|-|
|Schéma|int(10) unsigned not null|int(10) unsigned not null|varchar(255) not null|varchar(255)|varchar(255)|tinyint(3) unsigned|
|Foreign Key|Auto-incrément Primary Key||||||
|Default|||||||
|Comment|||||||

Table "stock"
||idProduit|stock|alertMin|
|-|-|-|-|
|Schéma|int(10) unsigned not null|int(10) unsigned not null|int(10) unsigned not null|
|Foreign Key|DELETE ON CASCADE FROM produit.IdProduit|||
|Default||0|0|
|Comment||||

Table "slider" (pour la home)
||idSlider|title|visuel|status
|-|-|-|-|-|
|Schéma|int(10) unsigned not null|varchar(255) not null|varchar(255) not null|tinyint(1) unsigned not null|
|Foreign Key|Auto-incrément Primary Key||||
|Default|||||
|Comment|||||

D'autres tables sont suceptibles de s'ajouter au fur et à mesure du projet.

### Recommandations SEO
Notre spéciailiste référencement à émit des points auquel il faut être prudent :
* Attention aux balises h1, h2, h3 etc qui doivent absoluement être utiliser correctement.
* Attention aux poids des fichiers images, js, css. Idéalement mettre en place un système de minification et concaténation des fichiers css et js.
* Le site doit être responsive pour être compatible mobile afin de répondre à la dernière mise à jour de l'algorithme google.
* Toujours mettre les attributs alt et title lorsqu'ils peuvent être mit pour l'accessibilité.


## Etude juridique
Notre service juridique à aussi étudier le site actuel et émit des alertes importante pour le nouveau site.
* Mise en place de pages "Mentions légales", "CGU" et "CGV".
* Mise en place d'une barre d'informations pour les cookies.

Ces éléments importants doivent être présent afin que le site soit valide au niveau de la loi.

La taxe appliquée aux produits est de 20%.