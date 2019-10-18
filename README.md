# VenteVinPHP
## Sujet
Vous devrez réaliser un site de e-commerce. Les produits que vous devez vendre sont laissés à votre entière appréciation (y compris humoristique). Il n’y a pas de restriction particulière. Pensez néanmoins que ce projet Web fait partie de vos réalisations qui pourraient être mises en avant lors d’un entretien pour un stage, par exemple.

À la fin de cette séance vous devrez donner à votre encadrant la liste des membres de votre groupe ainsi que le thème de votre site (quels produits votre site vend-il ? ).

Modalités
Le projet est dimensionné pour des groupes de 3 étudiants. Ponctuellement les groupes de 2 sont autorisés (mais ils seront notés comme un groupe de 3). Les groupes de 4 sont aussi ponctuellement autorisés, mais seront évalués de manière plus stricte et l’on attendra 1/3 de boulot en plus.

Les soutenances de projet auront lieu la semaine du 10 Décembre. La note de ce projet Web interviendra pour moitié, l’autre moitié sera donnée par l’examen final sur papier (pas de code à écrire, questions de compréhension).

Le jour de la soutenance, le site devra être déployé sur webinfo sous l’un de vos comptes. Les sources du site devront être accessible dans un fichier sources.zip à la racine de votre site. Il n’y a pas de date de rendu : votre site Web et ses sources devront juste être disponibles au moment de la soutenance.

## Emploi du temps prévisionnel :

### 22 Octobre 2018 - Début projet
### 29 Octobre 2018 - Congé IUT
### 5 Novembre 2018 - 3h projet
### 12 Novembre 2018 – TP 7 – Cookies & Sessions + 1h projet
### 19 Novembre 2018 – TP 8 – Authentification & Validation par email + 1h projet
### 26 Novembre 2018 - 3h projet
### 3 Décembre 2018 - 3h projet
### 10 Décembre 2018 - soutenances du projet

## Par où commencer ?
Définir les produits que vous souhaitez vendre.
Vous devez éventuellement prévoir des extensions, par exemple des accessoires pour vos produits. S’agit-il d’une association “un vers plusieurs” ou “plusieurs vers plusieurs” ?

Créer les 2-3 tables correspondantes en SQL. Si votre schéma de Base de Données contient des clés étrangères (ce qui est probable), pensez à utiliser le format de stockage InnoDB. Se reporter au TD 3 pour plus de détails.

Cette première séance est consacrée à implémenter le Modèle, le Contrôleur et les premières vues spécifiques à vos produits.

Ce que ce projet n’est pas :
Un site vitrine joli avec beaucoup d’images par exemple. Vous n’aurez pas de point sur cet aspect. Par contre, vous êtes autorisés à repartir de votre projet de HTML/CSS de l’an dernier.
Un site réaliste qui implémente X fois la même fonctionnalité. Le but est de réaliser correctement un maximum de fonctionnalités différentes.
Que garder pour plus tard ?

## Dans la suite de ce cours, plusieurs séances seront consacrées à:

### la gestion des utilisateurs,
### la gestion des paniers,
### la sécurisation de votre site Web
### En conséquence, ne pas attaquer ces parties pour le moment.

Où héberger ce site? Comment partager un répertoire ?
Le site à rendre sera à héberger dans le répertoire de l’un des membres de votre groupe. Par exemple http://webinfo.iutmontp.univ-montp2.fr/~mon_login/eCommerce/

## L’étudiant 1 doit donc créer le répertoire eCommerce dans son dossier public_html puis donner les droits aux autres étudiants de son groupe sur ce répertoire:

setfacl -m u:loginetudiant2:x /home/ann2/loginetudiant1 (droit de lister le repertoire personnel)
setfacl -m u:loginetudiant2:x /home/ann2/loginetudiant1/public_html (droit de lister le repertoire public_html)
setfacl -R -m u:loginetudiant2:rwx eCommerce (donne récursivement les droits à tout les fichiers inclus dans eCommerce)
setfacl -R -m d:u:loginetudiant2:rwx eCommerce (défini des droits par défaut : les nouveaux fichiers créés prendront ces droits)
Rappel du TD 1 : Les ACL permettent d’avoir des droits spécifiques à plusieurs utilisateurs et à plusieurs groupes quand les droits classiques sont limités à un utilisateur et un groupe. Pour lire les droits ACL d’un fichier ou dossier, on tape getfacl nom_du_fichier.

Référence : La page Côté Technique > Site Web > Partager public_html de intradepinfo

## Critères de notation
Le but pédagogique de ce projet est de mettre en application toutes les techniques que vous avez apprises lors des TDs. Voici donc les critères sur lesquels vous serez notés.

Il n’y a pas de rapport à écrire, ni de présentation à préparer. Vous devrez juste répondre à une série de questions sur votre code qui nous permettra d’évaluer ce qui a été implémenté.
