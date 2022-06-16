-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 juin 2022 à 07:47
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dinoscopia`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarif` int(11) NOT NULL,
  `average_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`id`, `tarif`, `average_duration`, `place`, `language`, `title`, `description`) VALUES
(1, 0, '6', 'Jardin des Plantes 57 rue Cuvier  75005 Paris', 'Français', 'LE SAVOIR FAIRE DES JARDINIERS', 'Avec les jardiniers du Jardin des Plantes, venez participer à des ateliers variés pour en apprendre plus sur certaines plantes et la manière d\'en prendre soin. Au programme par exemple, comment rempoter une plante, conserver des graines ou encore décoder une étiquette de botanique. Profitez de ces temps d\'échanges privilégiés pour partager la passion des jardiniers pour le monde végétal, enrichir vos connaissances personnelles et poser toutes vos questions.\r\n\r\nEn famille, dès 7 ans\r\n« Ateliers rempotages et multiplications de plantes courantes avec l\'équipe des Grandes serres » : les mardis 31 mai, 21 juin et 30 août 2022. Rendez-vous devant l\'entrée des Grandes serres.\r\n« Atelier semis à l\'École de Botanique » : le mardi 14 juin 2022.\r\n« Voyage sensoriel au milieu des plantes - collantes, satinées, rugueuses, douces, odorantes » : le mardi 26 juillet 2022.\r\n« Les outils du jardinier : apprendre à s\'en servir » : le mardi 2 août 2022.\r\nTous public, dès 10 ans\r\n« Comment récolter les graînes de son jardin et bien les conserver ? » : les mardis 7 juin, et 5 juillet 2022.\r\nAdulte, dès 12 ans\r\n« Le métier de rosiériste : création d\'une rose » : le mardi 24 mai 2022.  \r\n« Cactus des Alpes ? Les plantes xérophiles et d\'Afrique australe de l\'alpin » : le mardi 28 juin 2022. .\r\n« Etiquette botanique : comment la lire ? » : le mardi 12 juillet 2022.\r\n« Les pavots au Jardin » : le mardi 19 juillet 2022.\r\n« Les patriarches historiques du Jardin Alpin » : le mardi 9 août 2022.\r\n« De l\'Himalaya au Fujisan, plantes de montagne en Extrème-Orient » : le mardi 16 août 2022.\r\n« Décoder et fabriquer une étiquette botanique » : le mardi 23 août 2022.  \r\nRendez-vous devant l\'entrée des Grandes Serres en mai et en juin, et au Jardin d\'été en juillet et en août.\r\nLes mardis du 24 mai 2022 au 30 août 2022, à 13 h, 14 h et 15 h - Durée : 30 minutes.');

-- --------------------------------------------------------

--
-- Structure de la table `activity_filter`
--

DROP TABLE IF EXISTS `activity_filter`;
CREATE TABLE IF NOT EXISTS `activity_filter` (
  `activity_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  PRIMARY KEY (`activity_id`,`filter_id`),
  KEY `IDX_2DB2BF1D81C06096` (`activity_id`),
  KEY `IDX_2DB2BF1DD395B25E` (`filter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activity_filter`
--

INSERT INTO `activity_filter` (`activity_id`, `filter_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL,
  `explication` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DADD4A251E27F6BF` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classification`
--

DROP TABLE IF EXISTS `classification`;
CREATE TABLE IF NOT EXISTS `classification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classification`
--

INSERT INTO `classification` (`id`, `classification`) VALUES
(2, 'Théropodes'),
(3, 'Sauropodomorphes'),
(4, 'Ornithisciens'),
(5, 'Cétaropodes'),
(6, 'Thyréophores');

-- --------------------------------------------------------

--
-- Structure de la table `dinosaur`
--

DROP TABLE IF EXISTS `dinosaur`;
CREATE TABLE IF NOT EXISTS `dinosaur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classification_id` int(11) NOT NULL,
  `common_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scientific_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fossil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DAEDC56E2A86559F` (`classification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dinosaur`
--

INSERT INTO `dinosaur` (`id`, `classification_id`, `common_name`, `scientific_name`, `length`, `height`, `weight`, `description`, `img_height`, `period`, `regime`, `localisation`, `fossil`) VALUES
(3, 2, 'Tyrannosaure', 'Tyrannosaurus', 1300, 600, 7000, 'Tyrannosaurus rex est l\'un des plus grands carnivores ayant vécu sur Terre. Le plus grand spécimen complet (mais pas le plus grand spécimen) découvert à ce jour, répertorié sous le code FMNH PR2081 et surnommé « Sue », du nom de la paléontologue Sue Hendrickson, mesure 12,8 mètres de long et 4 mètres de haut au niveau des hanches4. Les différentes estimations de la masse du Tyrannosaurus rex ont grandement varié au cours des années, allant selon les auteurs de plus de 8,8 tonnes12 à moins de 4,5 tonnes13,14 avec d\'après les estimations les plus récentes une fourchette allant de 7,8 à 9,9 tonnes6,15,16,17.\r\n\r\nTyrannosaurus rex était peut-être légèrement moins imposant que Spinosaurus, Carcharodontosaurus et Giganotosaurus, trois autres carnivores du Crétacé18,19.\r\n\r\nComme chez les autres théropodes, le cou du T. rex forme une courbe en forme de « S » afin de maintenir la tête au-dessus du corps, mais il est particulièrement court et musculeux afin de supporter la tête massive. Les bras sont courts et se terminent par deux doigts. En 2007, un spécimen possédant trois doigts à chaque main a été découvert dans la formation de Hell Creek dans le Montana, suggérant la possible présence d\'un troisième doigt vestigial chez Tyrannosaurus20, hypothèse restant à confirmer21. Proportionnellement à la taille du corps, les jambes du T. rex sont parmi les plus longues de tous les théropodes. La queue est longue et massive, constituée parfois de plus de quarante vertèbres, agissant comme un balancier permettant d\'équilibrer la lourde tête et le torse. Afin d\'alléger l\'animal et de lui permettre de se mouvoir suffisamment rapidement, de nombreux os sont creux, réduisant la masse sans perte significative de solidité3.\r\n\r\nLe plus grand crâne de T. rex mesure 1,535 mètre (5 pieds) de longueur22. De larges cavités aériennes permettaient de réduire la masse du crâne, et laissaient la place aux attaches des muscles de la mâchoire, comme chez tous les théropodes carnivores23. Mais, sur d\'autres aspects, le crâne de Tyrannosaurus est significativement différent de celui des autres grands théropodes. Extrêmement large à l\'arrière et muni d\'un museau étroit, il permet une très bonne vision stéréoscopique24,25.\r\n\r\nLes os du crâne sont massifs et certains os de la face dont l\'os nasal sont fusionnés, empêchant tout mouvement. Beaucoup sont pneumatisés (constitués d\'une structure en nid d\'abeilles de petites poches d\'air) ce qui a pour conséquence de les rendre plus souples et plus légers26. Ces caractéristiques du crâne des tyrannosauridés leur aurait donné une morsure très puissante dépassant largement celle de tous les non-tyrannosauridés27,28,29. Cependant, et malgré le cliché véhiculé par la saga des films Jurassic Park, T. rex ne pouvait pas tirer la langue, cette dernière étant supposée collée au fond de la gueule comme chez l\'alligator. La conclusion est aussi valable pour la plupart des dinosaures30.\r\n\r\nL\'extrémité de la mâchoire supérieure est en forme de « U » (alors qu\'elle est en forme de « V » chez la plupart des carnivores en dehors de la super-famille des Tyrannosauroidea), ce qui augmente la quantité de chair et d\'os pouvant être arrachée à chaque bouchée, tout en augmentant l\'effort exercé sur les dents frontales31,32. L\'étude des dents de Tyrannosaurus rex montrent une importante hétérodontie, c\'est-à-dire la présence de dents de morphologies différentes3,33.\r\n\r\nLes prémaxillaires à l\'avant de la mâchoire supérieure sont resserrés, avec des crêtes de renforcement sur la surface arrière, en forme d\'incisive recourbée vers l\'arrière, réduisant ainsi le risque que les dents ne s\'arrachent quand Tyrannosaurus mordait et tirait. Les autres dents sont robustes, plus largement espacées et également renforcées par des crêtes34. Les dents de la mâchoire supérieure sont plus grandes que toutes les autres. La plus grande trouvée à ce jour est estimée à 30 cm de long, racine comprise, ce qui en fait la plus grande dent de dinosaure carnivore5.\r\n\r\nDans les premiers temps, les paléontologues pensaient qu\'il se tenait presque verticalement à cause de sa bipédie. Mais à la suite de la découverte de nouveaux squelettes et à des études biomécaniques, il s\'avère qu\'il se serait tenu à l\'horizontale car c\'est la seule manière pour que ses vertèbres supportent son poids. Le tyrannosaure ne devait donc pas dépasser 6 mètres de hauteur.\r\n\r\nIl se tenait sur ses deux pattes arrière. Ses membres postérieurs, terminés par un pied à trois orteils griffus, étaient particulièrement puissants. Sa vision frontale lui permettait d\'évaluer efficacement les distances. Afin de pouvoir soutenir son immense tête, ses membres antérieurs étaient atrophiés (« miniaturisés »). Ses bras avaient néanmoins des muscles développés et ils disposaient de deux doigts avec des griffes acérées. Ils servaient sans doute à maintenir la nourriture, mais étaient trop courts (comparables à ceux d\'un homme) pour pouvoir la ramasser au sol. Le tyrannosaure était donc obligé de se pencher pour ronger les carcasses de ses proies. Certaines de ses dents, particulièrement impressionnantes (atteignant 18 cm de long), étaient crénelées comme des couteaux à viande. On suppose qu\'il pouvait déplacer l\'un de ses maxillaires vers l\'arrière. D\'autre part, l\'usure des dents fossilisées indique qu\'il mâchait des aliments relativement durs.\r\n\r\nLa mâchoire du tyrannosaure était d\'une puissance phénoménale. Selon une étude publiée en 2012, elle pouvait appliquer sur une seule dent postérieure une force estimée entre 35 000 et 57 000 N, soit une pression équivalente d\'environ 3,5 à 5,7 tonnes, à comparer aux 1 000 N environ d\'un être humain, ou à la force 8 fois moins importante d\'un alligator35,36. Elle est considérée comme la plus puissante de tout le règne animal vivant ou éteint : le tyrannosaure était ainsi capable d\'emporter plusieurs kilogrammes de chair lors d\'un seul coup de mâchoire[réf. nécessaire].\r\n\r\nIl n\'est pas exclu que le tyrannosaure, comme d\'autres dinosaures de cette époque, ait été pourvu de plumes. Une équipe de chercheurs a d\'ailleurs découvert dans un fémur brisé des tissus mous » (phénomène extrêmement rare)37,38. « Les vaisseaux (sanguins) et leur contenu sont similaires à ceux observés dans les os d\'autruche », a rapporté la paléontologue Mary Schweitzer.', 'T-rex-removebg-preview.png', 'Crétacé Supérieur', 'Carnivore', 'Amérique du nord', 'Fossiles pétrifié'),
(4, 3, 'Diplodocus', 'Diplodocus', 2500, 400, 15000, 'C\'est un très grand quadrupède au long cou, avec une longue queue en forme de fouet. Ses membres antérieurs sont légèrement plus courts que ses membres postérieurs, ce qui lui donnait une posture horizontale. Le long cou, la longue queue et les quatre pattes robustes le font, mécaniquement, ressembler à un pont suspendu.', 'Diplodocus.jpg', 'Jurassique Supérieur', 'Herbivore', 'Amérique du nord', 'Fossiles pétrifié'),
(5, 4, 'Triceratops', 'Triceratops', 900, 400, 6000, 'Le Triceratops était un grand dinosaure végétivore qui vécu à la fin du crétacé, entre 67 et 65 millions d’années avant notre ère. Son nom signifie « tête à trois cornes ». Il en portait deux longues sur le front et une plus courte sur le nez. Il avait en outre une large collerette osseuse derrière son crâne, destinée à protéger son cou et ses épaules. Quadrupède, son allure générale était celle d’un immense rhinocéros, avec des membres lourds, le dinosaure Triceratops atteignait jusqu’à 9 mètres de long et pesait jusqu’à 5 à 6 tonnes.', 'triceratops.jpg', 'Crétacé Supérieur', 'Herbivore', 'Amérique du nord', 'Fossiles pétrifié'),
(6, 2, 'Vélociraptor', 'Vélociraptor', 180, 120, 15, 'Le Velociraptor était un genre de petit dinosaure bipède carnivore à plumes qui a vécu à la fin du crétacé, entre 80 et 70 millions d’années avant notre ère. Son nom signifie « voleur agile ».\r\n\r\nLe dinosaure Velociraptor se distingue des autres dromaeosauridés par sa tête très étroite et aplatie. En revanche, le volume de son cerveau est relativement important proportionnellement à sa taille. Le velociraptor possédait de puissantes mâchoires portant environ 80 dents acérées. Il mesurait, de la tête à la queue, environ 1,80 mètre pour une hauteur de 1,20 mètre et un poids qui avoisinait les 15 kilogrammes. La morphologie du vélociraptor laisse à penser qu’il possédait une excellente vitesse de course, pouvant atteindre 60 km/h, et qu’il disposait de la vision tridimensionnelle.', 'Velociraptor.jpg', 'Crétacé Supérieur', 'Carnivore', 'Asie', 'Fossiles pétrifié');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220610102803', '2022-06-10 10:28:07', 1614),
('DoctrineMigrations\\Version20220613075427', '2022-06-13 07:54:43', 119),
('DoctrineMigrations\\Version20220613145610', '2022-06-13 14:56:18', 693),
('DoctrineMigrations\\Version20220614142115', '2022-06-14 14:21:21', 323),
('DoctrineMigrations\\Version20220614142423', '2022-06-14 14:24:26', 143);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `image`, `title`, `description`, `url`) VALUES
(1, 'crépuscule.jpg', 'Évènement Nocturnes', '<div>À l’occasion des Nocturnes, venez découvrir une autre facette du Parc zoologique de Paris et observer le comportement des animaux au coucher du soleil.<br><br></div><div><strong>Jusqu’à 22h</strong>, explorez les 5 biozones, de la Patagonie à Madagascar, en passant par l’Afrique, l’Europe et l’Amazonie-Guyane et assistez aux rentrées de certains animaux. Des animations spéciales rythmeront ces soirées : quizz, jeux, rencontres, afin d\'en apprendre plus sur les sens des espèces nocturnes.<br><br></div><div>Pour poursuivre la soirée, <strong>jusqu\'à 23h30</strong>, profitez d\'un espace détente spécialement aménagé <strong>sur le parvis</strong> du zoo : transats, cocktails, bar, offre de restauration, gourmandises et bonne humeur sont au menu de ces soirées, toujours dans le respect des mesures sanitaires.<br><br></div><div><strong>Happy Hour au bar des Nocturnes de 18h30 à 20h<br></strong><br></div><div><strong>Nouveauté !</strong> Un <strong>espace de dessin à la craie pour les plus petits</strong>, et des <strong>jeux en bois</strong>* pour s\'amuser en famille ou entre amis seront à votre disposition sur le parvis.<br><br></div><div><em>*non disponibles les jeudis 23 juin, 14 juillet et 11 août à l\'occasion des Silent Zoo</em></div>', 'https://www.mnhn.fr/fr/evenement/nocturnes');

-- --------------------------------------------------------

--
-- Structure de la table `filter`
--

DROP TABLE IF EXISTS `filter`;
CREATE TABLE IF NOT EXISTS `filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `filter`
--

INSERT INTO `filter` (`id`, `filter`) VALUES
(1, 'Date'),
(2, 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `name`, `image`, `instructions`) VALUES
(1, 'Le jeu', 'halo.jpg', '<div>attention</div>');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dinosaur_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C53D045F4C3E9E0E` (`dinosaur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `dinosaur_id`, `url`, `alt`, `main_image`) VALUES
(3, 3, 'T-rex.jpg', 'trex', 0);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggestion` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `type`, `code`, `suggestion`) VALUES
(2, 'Vidéo', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/vhCOB1ara3k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0),
(3, 'Vidéo', '<iframe width=\"1280\" height=\"720\" src=\"https://www.youtube.com/embed/rJ7cJbGvI6o\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0);

-- --------------------------------------------------------

--
-- Structure de la table `media_dinosaur`
--

DROP TABLE IF EXISTS `media_dinosaur`;
CREATE TABLE IF NOT EXISTS `media_dinosaur` (
  `media_id` int(11) NOT NULL,
  `dinosaur_id` int(11) NOT NULL,
  PRIMARY KEY (`media_id`,`dinosaur_id`),
  KEY `IDX_D58CEBDCEA9FDD75` (`media_id`),
  KEY `IDX_D58CEBDC4C3E9E0E` (`dinosaur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media_dinosaur`
--

INSERT INTO `media_dinosaur` (`media_id`, `dinosaur_id`) VALUES
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `more_information`
--

DROP TABLE IF EXISTS `more_information`;
CREATE TABLE IF NOT EXISTS `more_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dinosaur_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DECA70424C3E9E0E` (`dinosaur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `more_information`
--

INSERT INTO `more_information` (`id`, `dinosaur_id`, `image`, `title`, `description`, `alt`) VALUES
(1, 3, 'bébéaffreux.jpg', 'Les bébés tyrannosaures étaient tout petits', 'Après l’étude des premiers fossiles connus de bébés tyrannosaures, les scientifiques ont pu en découvrir davantage sur le développement de ces animaux colossaux, qui font partie des meilleurs chasseurs les plus redoutables du Crétacé.', 'bébé tyrannosaure');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `statement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6F7494E23EDC87` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `subject_id`, `statement`, `image`) VALUES
(2, 1, 'oui', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3299375123EDC87` (`subject_id`),
  KEY `IDX_32993751A76ED395` (`user_id`),
  KEY `IDX_32993751E48FD905` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subject`
--

INSERT INTO `subject` (`id`, `subject`) VALUES
(1, 'Sujet');

-- --------------------------------------------------------

--
-- Structure de la table `timeline`
--

DROP TABLE IF EXISTS `timeline`;
CREATE TABLE IF NOT EXISTS `timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `timeline`
--

INSERT INTO `timeline` (`id`, `image`, `date`, `description`) VALUES
(2, 'T-Rex.jpg', 'il y a 66 millions d\'années', '<div>Olala il fait peur&nbsp;</div>'),
(3, 'bébéaffreux.jpg', 'Il y a 7 000 000 d’années', '<div><br>L’<strong>humanité</strong> peut désigner à la fois : l\'ensemble des <a href=\"https://fr.wikipedia.org/wiki/Individu\">individus</a> appartenant à l\'<a href=\"https://fr.wikipedia.org/wiki/Homo_sapiens\">espèce humaine</a> ; les caractéristiques <a href=\"https://fr.wikipedia.org/wiki/Cognition\">cognitives</a> et <a href=\"https://fr.wikipedia.org/wiki/Comportement\">comportementales</a> <a href=\"https://fr.wikipedia.org/wiki/Esp%C3%A8ce\">spécifiques</a> à cet ensemble ; des traits de <a href=\"https://fr.wikipedia.org/wiki/Personnalit%C3%A9\">personnalité</a> d\'un individu qui, dans une perspective <a href=\"https://fr.wikipedia.org/wiki/Humanisme\">humaniste</a> et <a href=\"https://fr.wikipedia.org/wiki/Altruisme\">altruiste</a>, sont considérées comme des qualités ou des valeurs à promouvoir, telles que la <a href=\"https://fr.wikipedia.org/wiki/Bont%C3%A9\">bonté</a>, l\'<a href=\"https://fr.wikipedia.org/wiki/%C3%89quit%C3%A9\">équité</a> ou la <a href=\"https://fr.wikipedia.org/wiki/G%C3%A9n%C3%A9rosit%C3%A9\">générosité</a>.<br><br></div><div><br>Le concept d\'humanité se situe entre les notions de <a href=\"https://fr.wikipedia.org/wiki/Nature_humaine\"><strong>nature humaine</strong></a> qui souligne l\'idée que les êtres humains ont en commun certaines caractéristiques essentielles, une <a href=\"https://fr.wikipedia.org/wiki/Nature\">nature</a> manifestée par des comportements spécifiques, jugés « humains » (par opposition à ce qui est jugé « inhumain ») et qui les différencie plus ou moins des autres espèces animales, et de <a href=\"https://fr.wikipedia.org/wiki/Condition_humaine\"><strong>condition humaine</strong></a> qui souligne l\'idée d\'une « communauté de destin » face aux « événements majeurs et situations qui composent l\'essentiel de l\'<a href=\"https://fr.wikipedia.org/wiki/Existence_(philosophie)\">existence</a> humaine, tels que la naissance, la croissance, l\'aptitude à ressentir des émotions ou à former des aspirations, le conflit, la mortalité ».<br><br></div><div><br>Deux réflexions en découlent. D\'une part, ce qu\'est le « <a href=\"https://fr.wikipedia.org/wiki/Propre_de_l%27homme\">propre de l\'homme</a> » : quelles sont les particularités de la <a href=\"https://fr.wikipedia.org/wiki/Physiologie\">physiologie</a> et du <a href=\"https://fr.wikipedia.org/wiki/Comportement\">comportement</a> humain que l\'on ne retrouve pas dans le reste du règne du vivant ? D\'autre part, la question de l\'<em>unité de l\'homme</em> : dans quelle mesure ces particularités sont véritablement partagées par tous les membres de l\'espèce humaine ? Cette deuxième considération se heurte à l\'<a href=\"https://fr.wikipedia.org/wiki/Ethnocentrisme\">ethnocentrisme</a>, qui <a href=\"https://fr.wikipedia.org/wiki/Essence_(philosophie)\">essentialise</a> des caractéristiques (par exemple, la <a href=\"https://fr.wikipedia.org/wiki/Couleur_de_la_peau\">couleur de la peau</a>) ou des comportements propres à un groupe humain ou à une tradition <a href=\"https://fr.wikipedia.org/wiki/Culture\">culturelle</a> et qui, par conséquent, peut refuser le statut d\'humain à des individus d\'un autre groupe, d\'une autre <a href=\"https://fr.wikipedia.org/wiki/Ethnie\">ethnie</a>.<br><br></div><div><a href=\"https://fr.wikipedia.org/wiki/Histoire\"><br>Historiquement</a>, ces questions furent d\'abord abordées sous les angles de la <a href=\"https://fr.wikipedia.org/wiki/Philosophie\">philosophie</a> (notamment dans l\'<a href=\"https://fr.wikipedia.org/wiki/Antiquit%C3%A9\">Antiquité</a>) et de la <a href=\"https://fr.wikipedia.org/wiki/Religion\">religion</a> (notamment durant le <a href=\"https://fr.wikipedia.org/wiki/Moyen_%C3%82ge\">Moyen Âge</a>). Une illustration de ces débats fut la <a href=\"https://fr.wikipedia.org/wiki/Controverse_de_Valladolid\">controverse de Valladolid</a> qui, en 1550, posa la question du statut des <a href=\"https://fr.wikipedia.org/wiki/Am%C3%A9rindiens\">Amérindiens</a>. Par la suite, notamment à partir du xviiie siècle, ces questions furent reprises dans une perspective de plus en plus <a href=\"https://fr.wikipedia.org/wiki/Scientifique\">scientifique</a> croisant les approches de la <a href=\"https://fr.wikipedia.org/wiki/Zoologie\">zoologie</a>, de l\'<a href=\"https://fr.wikipedia.org/wiki/%C3%89thologie\">éthologie</a>, de l\'<a href=\"https://fr.wikipedia.org/wiki/Anthropologie\">anthropologie</a>, de la <a href=\"https://fr.wikipedia.org/wiki/G%C3%A9n%C3%A9tique\">génétique</a> et de la <a href=\"https://fr.wikipedia.org/wiki/Pal%C3%A9oanthropologie\">paléoanthropologie</a>. Bien que reposant sur une démarche scientifique, ces études ont pu et peuvent être critiquées dans la mesure où elles restent influencées, voire <a href=\"https://fr.wikipedia.org/wiki/Biais_cognitif\">biaisées</a>, par les <a href=\"https://fr.wikipedia.org/wiki/Id%C3%A9ologie\">idéologies</a> politiques, religieuses, philosophiques des sociétés passées ou présentes<a href=\"https://fr.wikipedia.org/wiki/Humanit%C3%A9#cite_note-1\">1</a>. De nos jours, les différentes conceptions de l\'humanité ont des implications <a href=\"https://fr.wikipedia.org/wiki/Morale\">morales</a>, <a href=\"https://fr.wikipedia.org/wiki/%C3%89thique\">éthiques</a>, <a href=\"https://fr.wikipedia.org/wiki/Science\">scientifiques</a>, <a href=\"https://fr.wikipedia.org/wiki/Droit\">juridiques</a> et <a href=\"https://fr.wikipedia.org/wiki/Environnement\">environnementales</a> qui s\'expriment, par exemple, dans les débats sur les <a href=\"https://fr.wikipedia.org/wiki/Caste\">castes</a> et les <a href=\"https://fr.wikipedia.org/wiki/S%C3%A9gr%C3%A9gation_raciale\">ségrégations traditionnelles</a>, les <a href=\"https://fr.wikipedia.org/wiki/Servage\">statuts serviles</a> et ceux des personnes <a href=\"https://fr.wikipedia.org/wiki/Handicap\">handicapées</a>, l\'<a href=\"https://fr.wikipedia.org/wiki/%C3%89galit%C3%A9_des_sexes\">égalité des sexes</a> ou des <a href=\"https://fr.wikipedia.org/wiki/Orientation_sexuelle\">orientations sexuelles</a>, la <a href=\"https://fr.wikipedia.org/wiki/Personnalit%C3%A9_juridique\">personnalité juridique</a> de l\'<a href=\"https://fr.wikipedia.org/wiki/Embryon\">embryon</a> humain, les différents <a href=\"https://fr.wikipedia.org/wiki/Sociologie_de_la_famille\">types de familles</a> ou le statut des <a href=\"https://fr.wikipedia.org/wiki/Hominoidea\">grands singes</a>.<br><br></div>');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nickname`, `photo`) VALUES
(28, 'oui@gmail.oui', '[\"ROLE_ADMIN\"]', '$2y$13$vNO5zVr9nfbASJpmyS0t8.s1Jd//IO9x6Fztnc3gMovLjx6Fr8Z8O', 'DINGUE', 'avatar.png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activity_filter`
--
ALTER TABLE `activity_filter`
  ADD CONSTRAINT `FK_2DB2BF1D81C06096` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2DB2BF1DD395B25E` FOREIGN KEY (`filter_id`) REFERENCES `filter` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `FK_DADD4A251E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

--
-- Contraintes pour la table `dinosaur`
--
ALTER TABLE `dinosaur`
  ADD CONSTRAINT `FK_DAEDC56E2A86559F` FOREIGN KEY (`classification_id`) REFERENCES `classification` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045F4C3E9E0E` FOREIGN KEY (`dinosaur_id`) REFERENCES `dinosaur` (`id`);

--
-- Contraintes pour la table `media_dinosaur`
--
ALTER TABLE `media_dinosaur`
  ADD CONSTRAINT `FK_D58CEBDC4C3E9E0E` FOREIGN KEY (`dinosaur_id`) REFERENCES `dinosaur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D58CEBDCEA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `more_information`
--
ALTER TABLE `more_information`
  ADD CONSTRAINT `FK_DECA70424C3E9E0E` FOREIGN KEY (`dinosaur_id`) REFERENCES `dinosaur` (`id`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_B6F7494E23EDC87` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`);

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `FK_3299375123EDC87` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `FK_32993751A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_32993751E48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
