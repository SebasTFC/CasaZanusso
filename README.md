# CasaZanusso

*https://github.com/SebasTFC/CasaZanusso.git*

**Application WEB d'un site de traiteur Italien dans le cadre de la préparation du diplôme de Graduate Développeur WEB chez STUDI.**

**Cette application permet aux visiteurs de visualiser tous les produits et services que peut proposer l'entreprise CasaZanusso,et de faciliter la gestion d'eventuel devis ou contact'.**

**Technologies Utilisées:**
* HTML, CSS, JavaScript : Pour l'interface utilisateur.
* PHP : Scripting côté serveur.
* MySQL : Base de données relationnelle.
* MongoDB : Base de données non relationnelle.
* Bootstrap : Design responsive.
* AJAX : Scripting coté client.

**Environnement de Développement:**
* XAMPP : Serveur local Apache et MySQL.
* Visual Studio Code: Éditeurs de code.
* Composer : Gestionnaire de dépendances PHP.
* Git : Contrôleur de version.
* MongoDBCompass : Base de données non relationnelle.

**Installation en local:**
* Clonez le dépôt : git clone *https://github.com/SebasTFC/CasaZanusso.git* et collez le à la racine de Windows(C:)
* Installez et configurez XAMPP.Ouvrir le serveur Apache et MySql.
* Ouvrez phpmyadmin (http://localhost/phpmyadmin/ sur votre navigateur) et importez le fichier casazanusso.sql qui contient la base de données complète.
* Ouvrez un invité de commandes et à la racine du projet tapez "composer init","composer require mongodb/mongodb", "composer require phpmailer/phpmailer", "composer require vlucas/phpdotenv" et "composer require ext-mongodb" afin de télécharger les dépendances. 
* Téléchargez la librairie "php_mongodb.dll" que vous trouverez à cette adresse https://pecl.php.net/ et collez là dans le dossier "ext" de PHP.Modifiez le fichier "php.ini" en ajoutant la ligne "extension=php_mongodb.dll".
* Créez une base de données "db" et une collection "CompteVisiteur" dans MongoDB Compass ou Atlas.
* Créer et complètez un fichier ".env" d'environnement de variables à la racine du projet comme cela:
>ADRESS_MAIL = `'Adresse Gmail'`    
>PASSWORD_MAIL = `'Mot de passe d'application GMAIL'`   
>PSWD=`'Password Mysql'`
* Ouvrez un invité de commandes et tapez  "php -S localhost:8000" pour démarrer le serveur puis sur le navigateur "http://localhost:8000/index.php" pour lançer l'application.