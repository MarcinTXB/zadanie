-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: zadanie
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Temat`
--

DROP TABLE IF EXISTS `Temat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Temat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Temat`
--

LOCK TABLES `Temat` WRITE;
/*!40000 ALTER TABLE `Temat` DISABLE KEYS */;
INSERT INTO `Temat` VALUES (1,'PHP'),(2,'Symfony'),(3,'HTML'),(4,'CSS'),(5,'Sposoby'),(6,'MySQL'),(7,'Encyklopedia'),(8,'React'),(9,'Android'),(10,'JavaScript'),(11,'Bash');
/*!40000 ALTER TABLE `Temat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `akapit`
--

DROP TABLE IF EXISTS `akapit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `akapit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `tresc` longtext COLLATE utf8mb4_unicode_ci,
  `kolor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rozt` double NOT NULL,
  `kolort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `italict` tinyint(1) NOT NULL,
  `boldt` tinyint(1) NOT NULL,
  `roz` double NOT NULL,
  `italic` tinyint(1) NOT NULL,
  `bold` tinyint(1) NOT NULL,
  `odgt` double NOT NULL,
  `odpt` double NOT NULL,
  `oddt` double NOT NULL,
  `odlt` double NOT NULL,
  `odg` double NOT NULL,
  `odp` double NOT NULL,
  `odd` double NOT NULL,
  `odl` double NOT NULL,
  `tytul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A8B4A6FD4B89032C` (`post_id`),
  CONSTRAINT `FK_A8B4A6FD4B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akapit`
--

LOCK TABLES `akapit` WRITE;
/*!40000 ALTER TABLE `akapit` DISABLE KEYS */;
INSERT INTO `akapit` VALUES (1,15,'While a controller can be any PHP callable (function, method on an object, or a Closure), a controller is usually a method inside a controller class:\r\n\r\n[code]// src/Controller/LuckyController.php\r\nnamespace App\\Controller;\r\n\r\nuse Symfony\\Component\\HttpFoundation\\Response;\r\nuse Symfony\\Component\\Routing\\Annotation\\Route;\r\n\r\nclass LuckyController\r\n{\r\n    /**\r\n     * @Route(\"/lucky/number/{max}\", name=\"app_lucky_number\")\r\n     */\r\n    public function number($max)\r\n    {\r\n        $number = random_int(0, $max);\r\n\r\n        return new Response(\r\n            \'<html><body>Lucky number: \'.$number.\'</body></html>\'\r\n        );\r\n    }\r\n}[/code]','AFF',1.2,'EEE',0,0,0.9,0,0,3,10,7,1,1,5,0,5,'Prosty kontroler'),(2,15,'Żeby zobaczyć rezultat tego kontrolera, potrzebujesz zmapować URL do tego kontrolera przez route. Było to wykonane wyżej przez adnotację\r\n[code]@Route(\"/lucky/number/{max}\").[/code]','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'Mapowanie URL-a do kontrolera'),(3,15,'To aid development, Symfony comes with an optional base controller class called AbstractController. It can be extended to gain access to helper methods.\r\n\r\nAdd the use statement atop your controller class and then modify LuckyController to extend it:\r\n\r\n[code]// src/Controller/LuckyController.php\r\nnamespace App\\Controller;\r\n\r\n+ use Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController;\r\n\r\n- class LuckyController\r\n+ class LuckyController extends AbstractController\r\n{\r\n    // ...\r\n}[/code]\r\n\r\nThat\'s it! You now have access to methods like $this->render() and many others that you\'ll learn about next.','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'The Base Controller Class & Services'),(4,15,'The generateUrl() method is just a helper method that generates the URL for a given route:\r\n\r\n[code]$url = $this->generateUrl(\'app_lucky_number\', [\'max\' => 10]);[/code]','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'Generating URLs'),(5,16,'The Twig templating language allows you to write concise, readable templates that are more friendly to web designers and, in several ways, more powerful than PHP templates. Take a look at the following Twig template example. Even if it\'s the first time you see Twig, you probably understand most of it:\r\n\r\n[code][color=#fc5][b]<!DOCTYPE html>\r\n<html>    \r\n    <head>\r\n        <title>Welcome to Symfony!</title>\r\n    </head>\r\n    <body>\r\n        <h1>{{ page_title }}</h1>\r\n\r\n        {% if user.isLoggedIn %}\r\n            Hello {{ user.name }}!\r\n        {% endif %}\r\n\r\n        {# ... #}\r\n    </body>\r\n</html>[/b][/code]\r\n\r\nTwig syntax is based on these three constructs:\r\n\r\n[code]    {{ ... }}, used to display the content of a variable or the result of evaluating an expression;\r\n    {% ... %}, used to run some logic, such as a conditional or a loop;\r\n    {# ... #}, used to add comments to the template (unlike HTML comments, these comments are not included in the rendered page).[/code]\r\n\r\nYou can\'t run PHP code inside Twig templates, but Twig provides utilities to run some logic in the templates. For example, filters modify content before being rendered, like the upper filter to uppercase contents:\r\n\r\n[code]{{ title|upper }}[/code]\r\n\r\nTwig comes with a long list of tags, filters and functions that are available by default. In Symfony applications you can also use these Twig filters and functions defined by Symfony and you can create your own Twig filters and functions.\r\n\r\nTwig is fast in the prod environment (because templates are compiled into PHP and cached automatically), but convenient to use in the dev environment (because templates are recompiled automatically when you change them).','AFF',1.2,'EEE',0,0,0.8,0,0,5,1,0,1,1,5,0,5,'Twig Templating Language'),(6,15,'If you want to redirect the user to another page, use the redirectToRoute() and redirect() methods:\r\n\r\n[code]use Symfony\\Component\\HttpFoundation\\RedirectResponse;\r\n\r\n// ...\r\npublic function index()\r\n{\r\n    // redirects to the \"homepage\" route\r\n    return $this->redirectToRoute(\'homepage\');\r\n\r\n    // redirectToRoute is a shortcut for:\r\n    // return new RedirectResponse($this->generateUrl(\'homepage\'));\r\n\r\n    // does a permanent - 301 redirect\r\n    return $this->redirectToRoute(\'homepage\', [], 301);\r\n\r\n    // redirect to a route with parameters\r\n    return $this->redirectToRoute(\'app_lucky_number\', [\'max\' => 10]);\r\n\r\n    // redirects to a route and maintains the original query string parameters\r\n    return $this->redirectToRoute(\'blog_show\', $request->query->all());\r\n\r\n    // redirects externally\r\n    return $this->redirect(\'http://symfony.com/doc\');\r\n}[/code]\r\n\r\nThe redirect() method does not check its destination in any way. If you redirect to a URL provided by end-users, your application may be open to the unvalidated redirects security vulnerability.','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'Redirecting'),(7,17,'echo \'<pre>\';\r\nprint_r($array);\r\necho \'</pre>\';','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Wyświetlanie zawartości tablicy w PHP'),(8,15,'If you\'re serving HTML, you\'ll want to render a template. The render() method renders a template and puts that content into a Response object for you:\r\n\r\n[code]// renders templates/lucky/number.html.twig\r\nreturn $this->render(\'lucky/number.html.twig\', [\'number\' => $number]);[/code]\r\n\r\nTemplating and Twig are explained more in the Creating and Using Templates article.','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'Rendering Templates'),(10,19,'The Assets component manages URL generation and versioning of web assets such as CSS stylesheets, JavaScript files and image files.\r\n\r\nTo use the Sass, LESS or Stylus pre-processors, enable the one you want in webpack.config.js\r\n\r\nThen restart Encore. When you do, it will give you a command you can run to install any missing dependencies.\r\nAfter running that command and restarting Encore, you\'re done!','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'Assets'),(11,20,'select * from mysql.user;','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Pokazuje użytkowników'),(12,24,'alter table nazwa_tabeli modify column nazwa_kolumny typ_kolumny after nazwa_kolumny_po_której_ma_być_ta_przenoszona;','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Zmiana kolejności kolumn'),(13,24,'alter table nazwa_tabeli modify nazwa_kolumny nowy_typ_kolumny;','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Zmiana typu kolumny'),(14,24,'alter table `nazwa_tabeli` change column `nazwa` `nowa_nazwa` int(11);','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Zmiana nazwy kolumny'),(15,29,'&nbsp; - jedna spacja\r\n&ensp; - 2 spacje\r\n&emsp; - 4 spacje','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Spacje i taby'),(16,25,'Wieloplatformowe środowisko uruchomieniowe o otwartym kodzie do tworzenia aplikacji typu server-side napisanych w języku JavaScript.','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Node.js'),(17,26,'Domyślny manager pakietów dla środowiska Node.js, może być także używany do zarządzania warstwą front-end aplikacji WWW.','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'npm'),(18,24,'ALTER TABLE tabela MODIFY kolumna VARCHAR(255);   - Ponieważ null jest domyślne','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Ustawianie kolumny na możliwe null'),(19,27,'mysqldump -u root -p moja_baza > /home/moj_uzytkownik/nazwa_pliku.sql','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Zrzut bazy'),(20,5,'SET foreign_key_checks = 0;\r\nUPDATE  post SET id=\'xyz\' WHERE id=\'abc\';\r\nUPDATE  akapit SET post_id=\'xyz\' WHERE post_id=\'abc\';\r\nSET foreign_key_checks = 1;','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Chwilowe wyłączenie sprawdzania kluczy obcych'),(21,22,'UPDATE akapit SET id=7 [WHERE id=5];','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'UPDATE'),(22,1,'[code]composer create-project symfony/website-skeleton nazwa_projektu albo symfony new nazwa_projektu --full\r\n\r\ncomposer require symfony/orm-pack\r\ncomposer require --dev symfony/maker-bundle\r\n\r\nDATABASE_URL=\"mysql://db_user:db_password@127.0.0.1:3306/db_name\"       w .env\r\n\r\nphp bin/console doctrine:database:create\r\n\r\ncomposer require annotations\r\n\r\ncomposer require symfony/form\r\n\r\ncomposer require symfony/webpack-encore-dev\r\nyarn install\r\nyarn encore dev                                                ---->>  Po każdej zmianie w css[/code]','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,4,'Rozpoczęcie projektu'),(23,32,'In applications using Symfony Flex, run this command to install the security feature before using it:\r\n\r\ncomposer require symfony/security-bundle','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'Instalacja'),(24,32,'No matter how you will authenticate (e.g. login form or API tokens) or where your user data will be stored (database, single sign-on), the next step is always the same: create a \"User\" class. The easiest way is to use the MakerBundle.\r\n\r\nLet\'s assume that you want to store your user data in the database with Doctrine:\r\n\r\n[code]php bin/console make:user\r\n\r\nThe name of the security user class (e.g. User) [User]:\r\n> User\r\n\r\nDo you want to store user data in the database (via Doctrine)? (yes/no) [yes]:\r\n> yes\r\n\r\nEnter a property name that will be the unique \"display\" name for the user (e.g.\r\nemail, username, uuid [email]\r\n> email\r\n\r\nDoes this app need to hash/check user passwords? (yes/no) [yes]:\r\n> yes\r\n\r\ncreated: src/Entity/User.php\r\ncreated: src/Repository/UserRepository.php\r\nupdated: src/Entity/User.php\r\nupdated: config/packages/security.yaml[/code]\r\n\r\nThat\'s it! The command asks several questions so that it can generate exactly what you need. The most important is the User.php file itself. The only rule about your User class is that it must implement UserInterface. Feel free to add any other fields or logic you need. If your User class is an entity (like in this example), you can use the make:entity command to add more fields. Also, make sure to make and run a migration for the new entity:\r\n\r\nphp bin/console make:migration\r\nphp bin/console doctrine:migrations:migrate','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'Stworzenie swojej klasy User'),(25,32,'Creating a powerful login form can be bootstrapped with the make:auth command from MakerBundle. Depending on your setup, you may be asked different questions and your generated code may be slightly different:\r\n\r\n php bin/console make:auth\r\n\r\nWhat style of authentication do you want? [Empty authenticator]:\r\n [0] Empty authenticator\r\n [1] Login form authenticator\r\n> 1\r\n\r\nThe class name of the authenticator to create (e.g. AppCustomAuthenticator):\r\n> LoginFormAuthenticator\r\n\r\nChoose a name for the controller class (e.g. SecurityController) [SecurityController]:\r\n> SecurityController\r\n\r\nDo you want to generate a \'/logout\' URL? (yes/no) [yes]:\r\n> yes\r\n\r\n created: src/Security/LoginFormAuthenticator.php\r\n updated: config/packages/security.yaml\r\n created: src/Controller/SecurityController.php\r\n created: templates/security/login.html.twig\r\n\r\nNew in version 1.8: Support for login form authentication was added to make:auth in MakerBundle 1.8.','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'Stworzenie Login Form'),(26,33,'Ustawienia > System > Informacje > nacisnąć 7 razy na Numer kompilacji ---> pojawią się Opcje programisty','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Wyświetlanie opcji programisty na telefonie'),(27,33,'W Opcjach programisty na telefonie umożliwić debugowanie\r\nPodłączyć telefon kablem USB\r\nadb devices _ _ _ _ // W terminalu ---> Pokaże dostępne urządzenia','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Podłączanie'),(28,34,'react-native run-android ---- uruchomienie aplikacji','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Uruchomienie aplikacji'),(29,37,'echo fs.inotify.max_user_watches=524288 | sudo tee -a /etc/sysctl.conf && sudo sysctl -p\r\n\r\nThen execute:\r\n\r\nsudo sysctl --system','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'ENOSPC error'),(30,35,'Stworzyć katalog z projektem\r\n\r\nnpm init                                Powstanie plik package.json\r\n\r\ndodać\r\n\"scripts\": {\r\n_ _ \"postinstall\":  \"force-latest\"\r\n},\r\n\"devDependencies\": {\r\n_ _ \"force-latest\": \"*\"\r\n}\r\n\r\nnpm install','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Wymuszenie najnowszego npm'),(31,26,'npx - narzędzie do uruchamiania pakietów Node\r\nNPX comes bundled with NPM version 5.2+','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'npx'),(32,NULL,'tyutuytuyt','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'tyutytuy'),(34,1,'[code]/**\r\n * @Route(\"/{id}/new\", name=\"admin_akapit_new\", methods={\"GET\",\"POST\"})\r\n */\r\npublic function new(Request $request, Post $post): Response\r\n{\r\n    $akapit = new Akapit();\r\n    $akapit->setPost($post);                        ---->>  W AkapitType nie wstawiamy add(\'post\')[/code]','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'Dodanie wartości w kontrolerze bez podawania w formularzu'),(35,38,'nano ~/.bashrc\r\ni dodać                   alias lq=\'ls -l\'\r\nwyjść i uruchomić . ~/.bashrc','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Aliasy na stałe'),(36,39,'sudo apt install apache2 _ _ _ _ _ _ _ _ _ _ _ _ _ _ Tworzy też katalog /var/www\r\nsudo systemctl stop apache2.service _ _ _ _ _ _ _ Stop Apache 2 on Ubuntu\r\nsudo service mysql stop _ _ _ _ _ _ _ _ _ _ _ _ _ _ Stop MySQL','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'Komendy'),(37,40,'CREATE TABLE Produkt (\r\n_ _ ID_Produkt INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,\r\n_ _ ID_Kategoria INT UNSIGNED,\r\n_ _ Nazwa TINYTEXT,\r\n_ _ Symbol CHAR(11),\r\n_ _ FOREIGN KEY (ID_Kategoria) REFERENCES Kategoria (ID_Kategoria)\r\n)\r\n\r\nCREATE TABLE Kategoria (\r\n_ _ ID_Kategoria INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,\r\n_ _ Nazwa TINYTEXT\r\n)','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'CREATE TABLE'),(38,41,'$dsn = \'mysql:dbname=testdb;host=127.0.0.1\';\r\n$user = \'dbuser\';\r\n$password = \'dbpass\';\r\n\r\ntry {\r\n_ _ $dbh = new PDO($dsn, $user, $password);\r\n} catch (PDOException $e) {\r\n_ _ echo \'Connection failed: \' . $e->getMessage();\r\n}\r\n\r\n$calories = 150;\r\n$colour = \'red\';\r\n\r\n$sth = $dbh->prepare(\'SELECT name, colour, calories FROM fruit WHERE calories < ? AND colour = ?\');\r\n$sth->bindParam(1, $calories, PDO::PARAM_INT);\r\n$sth->bindParam(2, $colour, PDO::PARAM_STR, 12);\r\n$sth->execute();\r\n\r\nwhile($row = $sth->fetch(PDO::FETCH_ASSOC)) {\r\n_ _ echo $row[0] . \" \" . $row[1] . \" \" . $row[2] . \"|\";\r\n}\r\n\r\n*******************************\r\n\r\n\r\n$stmt = $dbh->prepare(\"INSERT INTO REGISTRY (name, value) VALUES (?, ?)\");\r\n$stmt->bindParam(1, $name);\r\n$stmt->bindParam(2, $value);\r\n\r\n$name = \'one\';\r\n$value = 1;\r\n$stmt->execute();\r\n\r\n$name = \'two\';\r\n$value = 2;\r\n$stmt->execute();\r\n\r\n*******************************\r\n\r\n\r\n/* Begin a transaction, turning off autocommit */\r\n$dbh->beginTransaction();\r\n\r\n/* Insert multiple records on an all-or-nothing basis */\r\n$sql = \'INSERT INTO fruit (name, colour, calories) VALUES (?, ?, ?)\';\r\n\r\n$sth = $dbh->prepare($sql);\r\n\r\nforeach ($fruits as $fruit) {\r\n_ _ $sth->execute(array(\r\n_ _ _ _ $fruit->name,\r\n_ _ _ _ $fruit->colour,\r\n_ _ _ _ $fruit->calories,\r\n_ _ ));\r\n}\r\n\r\n/* Commit the changes */\r\n$dbh->commit();\r\n\r\n/* Database connection is now back in autocommit mode */','AFF',1.2,'EEE',0,0,0.7,0,0,5,1,0,1,1,5,0,5,'PDO'),(39,1,'[code]composer require chriskonnertz/bbcode[/code]\r\n//  W config/services.yaml  dodać\r\n[code]services:\r\n    App\\Twig\\BBcode:\r\n        tags: nawias_kwadratowy \'twig.extension\' nawias_kwadratowy','AFF',1.2,'EEE',0,0,0.9,0,0,5,1,0,1,1,5,0,5,'BBcode Symfony');
/*!40000 ALTER TABLE `akapit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20191018093553','2019-10-19 08:27:46'),('20191019082723','2019-10-19 08:27:46'),('20191019084816','2019-10-19 08:48:28'),('20191019112829','2019-10-19 11:28:42'),('20191021130550','2019-10-21 13:06:11'),('20191024134813','2019-10-24 13:48:38'),('20191025074628','2019-10-25 07:46:41'),('20191025082109','2019-10-25 08:21:23'),('20191025084556','2019-10-25 08:46:09'),('20191025090100','2019-10-25 09:01:13'),('20191025095439','2019-10-25 09:54:52'),('20191025100332','2019-10-25 10:03:47'),('20191104125240','2019-11-04 12:52:54'),('20191108105559','2019-11-08 10:56:29'),('20191109134512','2019-11-09 13:45:38'),('20191114113919','2019-11-14 11:39:31'),('20191114125808','2019-11-14 12:58:22');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `temat_id` int(11) NOT NULL,
  `tytul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rozt` double NOT NULL,
  `kolort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `italict` tinyint(1) NOT NULL,
  `boldt` tinyint(1) NOT NULL,
  `odgt` double NOT NULL,
  `odpt` double NOT NULL,
  `oddt` double NOT NULL,
  `odlt` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A8A6C8DF9D34AD1` (`temat_id`),
  CONSTRAINT `FK_5A8A6C8DF9D34AD1` FOREIGN KEY (`temat_id`) REFERENCES `Temat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,2,'Sposoby Symfony',13,'#799',1,1,10,10,10,10),(5,6,'Sposoby MySQL',13,'#799',1,1,10,10,10,10),(15,2,'Kontroler',13,'#799',1,1,10,10,10,10),(16,2,'Tworzenie i używanie templatek',13,'#799',1,1,10,10,10,10),(17,5,'Sposoby PHP',22,'#577',0,0,10,10,10,10),(19,2,'Komponenty',13,'#799',1,1,10,10,10,10),(20,6,'SELECT',13,'#799',1,1,10,10,10,10),(21,6,'INSERT INTO',13,'#799',1,1,10,10,10,10),(22,6,'UPDATE',13,'#799',1,1,10,10,10,10),(23,6,'DELETE',13,'#799',1,1,10,10,10,10),(24,6,'ALTER TABLE',13,'#799',1,1,10,10,10,10),(25,7,'Node.js',13,'#799',1,1,10,10,10,10),(26,7,'npm',13,'#799',1,1,10,10,10,10),(27,6,'Zrzut bazy',13,'#799',1,1,10,10,10,10),(29,5,'Spacje i taby',13,'#799',1,1,10,10,10,10),(32,2,'Security',13,'#799',1,1,10,10,10,10),(33,9,'Podłączanie telefonu do komputera',13,'#799',1,1,10,10,10,10),(34,9,'Tworzenie',13,'#799',1,1,10,10,10,10),(35,10,'Nodejs',13,'#799',1,1,10,10,10,10),(37,8,'React konfiguracja',13,'#799',1,1,10,10,10,10),(38,11,'Aliasy',13,'#799',1,1,10,10,10,10),(39,11,'Bash komendy',13,'#799',1,1,10,10,10,10),(40,6,'CREATE TABLE',13,'#799',1,1,10,10,10,10),(41,6,'PDO',13,'#799',1,1,10,10,10,10);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-14 14:46:27
