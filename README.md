#Site du BDS de l'UTBM

* [Website](http://bds.utbm.fr/)
* [Documentation](http://bds.utbm.fr/documentation/html/index.html)
* Author: Ludovic Henry
* License: Creative Commons 3.0 BY-NC

##Instalation
Pour installer le site du BDS sur votre serveur, il faut suivre les étapes suivantes :

* Placer vous dans le dossier du projet
* Créer les dossiers manquants avec la commande "mkdir -p cache/ log/ web/uploads/ data/sql/ data/cotisants/cartes/ data/mailer/spool/"
* Créer les fichiers de configuration manquants et renseignez les. Pour les générer, utiliser la commande "touch config/databases.yml config/factories.yml"
* [Installer symfony](http://www.symfony-project.org/jobeet/1_4/Doctrine/fr/01#chapter_01_sub_choix_du_lieu_d_installation_de_symfony) sur votre serveur
* Si vous avez installer symfony dans un répertoire différent de lib/vendor/, vous devez modifier le fichier config/ProjectConfiguration.class.php à la ligne 3 pour inclure le bon fichier
* Vous devez ensuite générer les classes de base nécessaire à la base de données. Pour cela éxécuter la commande "symfony doctrine:build --all-classes"
* Construisez ensuite la base de données avec la commande "php symfony doctrine:build --sql --db" (Attention, un bug persiste : la commande build --sql va générer 2 fois la table sf_guard_user. Il faut donc supprimer la deuxième occurence dans le fichier data/sql/schema.sql)
* Nettoyer le cache avec la commande "php symfony cc"
* Si vous voulez générer la documentation lancer la commande "php symfony doxygen:generate"

