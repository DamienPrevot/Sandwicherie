# Sandwicherie en ligne

CRUD (Create, Read, Update, Delete)

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

## Etude technique
Quasiment rien ne peux être repris de l'ancien site. Il est important de garder la base de données et de la migrer, le client ne souhaite pas perdre ses données.

Technologies à utiliser : 
* PHP 5.6
* Mysql 5.6
* Bootstrap 3
* JQuery 1.11
* JQueryUI 1.11
* HighCharts 4.2

Le code devra utiliser le framework interne à notre agence web et être mit sous versionnement git. Il sera déployable sur les serveurs via Capistrano.

### Recommandations lead-dev
Après audit du site actuel, notre lead-developpeur nous a fait parvenir ses recommandations : 
* Plus d'écriture de fichier sur le disque
* Tout doit passer par la BDD
* Utilisation d'un framework pour la base de code
* Utiiisation de versionnement pour le code
* Faire attention au performences du site web sans Varnish (Un site trop lent de quelques mili-seconde rate des ventes)
* Schéma des tables SQL à revoir

## Etude juridique
Notre service juridique à aussi étudier le site actuel et émit des alertes importante pour le nouveau site.
* Mise en place de pages "Mentions légales", "CGU" et "CGV".
* Mise en place d'une barre d'informations pour les cookies.

Ces éléments importants doivent être présent afin que le site soit valide au niveau de la loi.