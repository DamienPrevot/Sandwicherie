# Sandwicherie en ligne

CRUD (Create, Read, Update, Delete)

Une soci�t� de restauration rapide propose � ses clients un service en ligne de commande de sandwichs r�alis� par notre agence il y a plusieurs ann�es.

Le site ne correspond aujourd'hui plus au standard actuel et son offre � depuis �voluer. Ce client � refait appel � nous pour faire �voluer son site web.

## Demande commerciale
Apr�s discussion entre le commercial et le client, voici les points qui ressortent parmis ce que souhaite le client.

Avoir une interface d'administration permettant de : 
* Pouvoir mettre � jour ses produits
* Pouvoir mettre � jour ses niveaux de stock
* Voir la liste de ses clients
* Avoir des graphs des ventes, des produits, etc

Sur l'interface public, le client souhaite : 
* Avoir un espace client des derni�res commandes
* Mettre des visuels
* Un design "genre airbnb"

## Etude technique
Quasiment rien ne peux �tre repris de l'ancien site. Il est important de garder la base de donn�es et de la migrer, le client ne souhaite pas perdre ses donn�es.

Technologies � utiliser : 
* PHP 5.6
* Mysql 5.6
* Bootstrap 3
* JQuery 1.11
* JQueryUI 1.11
* HighCharts 4.2

Le code devra utiliser le framework interne � notre agence web et �tre mit sous versionnement git. Il sera d�ployable sur les serveurs via Capistrano.

### Recommandations lead-dev
Apr�s audit du site actuel, notre lead-developpeur nous a fait parvenir ses recommandations : 
* Plus d'�criture de fichier sur le disque
* Tout doit passer par la BDD
* Utilisation d'un framework pour la base de code
* Utiiisation de versionnement pour le code
* Faire attention au performences du site web sans Varnish (Un site trop lent de quelques mili-seconde rate des ventes)
* Sch�ma des tables SQL � revoir

## Etude juridique
Notre service juridique � aussi �tudier le site actuel et �mit des alertes importante pour le nouveau site.
* Mise en place de pages "Mentions l�gales", "CGU" et "CGV".
* Mise en place d'une barre d'informations pour les cookies.

Ces �l�ments importants doivent �tre pr�sent afin que le site soit valide au niveau de la loi.