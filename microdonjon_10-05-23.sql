-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table microdonjon.chapitre : ~73 rows (environ)
INSERT INTO `chapitre` (`id`, `zone_id`, `titre_chapitre`, `type_page`) VALUES
	(1, 21, 'Introduction', 'Standard'),
	(2, 1, 'Corridor d\'entrée', 'Standard'),
	(3, 1, 'Obtenir Lanterne', 'Standard'),
	(4, 2, 'Quartiers de la garde', 'Combat'),
	(5, 2, 'Fouiller le garde gobelin', 'Standard'),
	(6, 3, 'Salle des coffres', 'Condition'),
	(7, 3, 'Coffre 1', 'Standard'),
	(8, 3, 'Coffre 2', 'Standard'),
	(9, 3, 'Coffre 3', 'Combat'),
	(10, 3, 'Crochetage', 'Standard'),
	(11, 3, 'Sortir de la salle des coffres', 'Standard'),
	(12, 4, 'Jardin d\'hiver', 'Combat'),
	(13, 5, 'Grande bibliothèque', 'Standard'),
	(14, 5, 'Comment devenir riche', 'Standard'),
	(15, 5, 'Guide de défense', 'Combat'),
	(16, 5, 'Traité d\'architecture', 'Standard'),
	(17, 6, 'Chambre noire', 'Condition'),
	(18, 6, 'Tâtonner', 'Standard'),
	(19, 6, 'Allumer la lanterne', 'Standard'),
	(20, 7, 'Passage dérobé', 'Standard'),
	(21, 7, 'Récupérer la gourde', 'Standard'),
	(22, 8, 'Quartiers du contremaître', 'Standard'),
	(23, 8, 'Enigme : Réponse correcte', 'Standard'),
	(24, 8, 'Enigme : Réponse erronée', 'Standard'),
	(25, 8, 'Enigme : S\'abstenir', 'Standard'),
	(26, 9, 'Couloir Arc-en-ciel', 'Standard'),
	(27, 9, 'Dalle bleue', 'Standard'),
	(28, 9, 'Dalle rouge', 'Standard'),
	(29, 9, 'Dalle jaune', 'Standard'),
	(30, 9, 'Dalle rose', 'Standard'),
	(31, 9, 'Dalle orange', 'Standard'),
	(32, 9, 'Dalle verte', 'Standard'),
	(33, 10, 'Fontaine cristalline', 'Standard'),
	(34, 10, 'Boire à la fontaine', 'Standard'),
	(35, 11, 'Poste de garde du pont de singe', 'Combat'),
	(36, 12, 'Pont de singe', 'Standard'),
	(37, 13, 'Armurerie', 'Standard'),
	(38, 13, 'Enfiler l\'armure', 'Standard'),
	(39, 13, 'Sol friable', 'Standard'),
	(40, 15, 'Torrent caverneux', 'Combat'),
	(41, 14, 'Escaliers en colimaçon', 'Standard'),
	(42, 16, 'Berge sablonneuse', 'Condition'),
	(43, 16, 'Dépouiller le gobelin', 'Standard'),
	(44, 16, 'Offrir de l\'eau au gobelin', 'Standard'),
	(45, 17, 'Statue du héros', 'Condition'),
	(46, 18, 'Autel de la déesse', 'Standard'),
	(47, 19, 'Échoppe itinérante', 'Standard'),
	(48, 19, 'Vers la salle du trône', 'Standard'),
	(49, 19, 'Menacer le vendeur', 'Combat'),
	(50, 19, 'Votre lame perd son éclat', 'Standard'),
	(51, 20, 'Salle du trône', 'Combat'),
	(52, 20, 'Conclusion', 'Standard'),
	(53, 3, 'Récupérer pièces du coffre', 'Standard'),
	(54, 4, 'Récupérer pièces du jardin', 'Standard'),
	(55, 10, 'Condition fontaine check', 'Condition'),
	(56, 10, 'Remplir la gourde', 'Standard'),
	(57, 11, 'Récupérer pièces du squelette', 'Standard'),
	(58, 13, 'Quitter l\'armurerie', 'Condition'),
	(59, 16, 'Accepter le coquillage', 'Standard'),
	(60, 17, 'Obtenir l\'épée du héros', 'Standard'),
	(61, 18, 'Offrande 50', 'Standard'),
	(62, 18, 'Offrande 100', 'Standard'),
	(63, 18, 'Offrande 150', 'Standard'),
	(64, 18, 'Offrande 200', 'Standard'),
	(65, 18, 'Offrande 250', 'Standard'),
	(66, 18, 'Offrande 300', 'Standard'),
	(67, 19, 'Acheter une potion de soin', 'Condition'),
	(68, 19, 'Acheter les bottes de vivacité', 'Standard'),
	(69, 19, 'Acheter la cape trompe-l\'oeil', 'Standard'),
	(70, 19, 'Récupérer potion de soin', 'Standard'),
	(71, 19, 'Boire potion de soin', 'Standard'),
	(79, 10, 'test', 'Standard'),
	(83, 1, 'bionpioubi', 'Standard');

-- Listage des données de la table microdonjon.chap_combat : ~8 rows (environ)
INSERT INTO `chap_combat` (`id`, `chapitre_id`, `monstre_id`, `texte_initial`, `texte_victoire`) VALUES
	(1, 4, 1, 'Un gobelin, jusque là assoupi, est réveillé en sursaut par votre arrivée inattendue\r\n<br><br>\r\nIl vous saute dessus et vous menace de sa grande épée, heureusement, fort émoussée.\r\nVous n\'avez, hélas, pas d\'autre choix que de vous battre. ', 'Le gobelin s\'effondre suite à votre dernier coup de dague.\r\n<br><br>\r\nVous pouvez fouiller ses quartiers à la recherche d\'objets intéressants. Ou alors vous pouvez rebrousser chemin et traverser le corridor pour emprunter l\'autre porte. '),
	(2, 9, 2, 'Alors que vous approchez la main pour ouvrir le coffre, il s\'ouvre brusquement, dévoilant une immonde rangée de dents et tente de vous croquer la main.<br>\r\nIl s\'agissait en réalité d\'une créature malveillante dissimulée sous les traits d\'un coffre.\r\n<br><br>\r\nVous allez devoir vous battre pour ne pas finir dévoré.', 'Le coffre disparait dans un craquement de bois, laissant derrière lui une poignée de pièces d\'or'),
	(3, 12, 3, 'A peine le seuil de la salle franchi, vous sentez vos pieds s\'enfoncer dans une sorte de terreau recouvrant le sol.\r\n<br><br>\r\nUn puits de lumière éclaire les murs recouverts de fleurs et de plantes à la beauté étrange. \r\n<br><br>\r\nVous avancez à pas feutrés sur l\'humus.\r\n<br><br>\r\nVous sentez le sol vibrer sous vos pieds.\r\n<br><br>\r\nSoudain, une gigantesque racine recouverte d\'écailless se dresse devant vous ! \r\nUne plante carnivore titanesque la suit sans se faire attendre, sa bouche immense remplie de milliers d\'épines saillantes vous menace d\'une salve de claquement de crocs. \r\n<br><br>\r\nLes racines vous bloquent toute tentative de sortie, vous allez devoir vous battre. \r\n', 'La plante s\'effondre dans une gerbe de sève.<br>\r\nDans ses entrailles, vous trouvez quelques pièces d\'or ayant appartenu à de précédents aventuriers n\'ayant pas eu votre dextérité.'),
	(4, 15, 4, 'A peine le livre ouvert, il se referme immédiatement sur votre main. Le tome avait bien prévu de faire de vous son petit déjeuner. \r\n<br><br>\r\nDégainez votre dague pour vous libérer', 'Vous retirez votre dague, souillée d\'encre, et l\'essuyez sur votre tunique.\r\n<br><br>\r\nVous pouvez feuilleter un autre ouvrage ou quitter la bibliothèque.'),
	(5, 35, 5, 'Vous apercevez un pont de singe à l\'autre bout de la pièce. \r\n<br><br>\r\nHélas vous en êtes séparé par un énorme squelette de deux mètres de haut équipé d\'une masse d\'armes. Sa cage thoracique résonne comme un vibraphone alors qu\'il abat sa masse hérissée de piques à quelques centimètres de votre visage. \r\n<br><br>\r\nVous n\'avez pas le choix, vous allez devoir combattre.', 'Le gardien s\'effondre à vos pieds tel un tas de Mikado.'),
	(6, 40, 6, 'Vous avancez avec une infinie prudence sur le pont de singe, retenant votre souffle au moindre balancement. \r\n<br><br>\r\nMais vos efforts ne suffiront pas : le pont cède finalement sous votre poids. \r\n<br><br>\r\nVous chutez dans le torrent en contrebas. Alors que vous vous débattez avec le courant, les poumons à demi remplis d\'eau, vous sentez votre corps se soulever.\r\n<br><br>\r\nUn tentacule s\'enroule autour de votre taille, un calamar géant a bien décidé de faire de vous son encas. Vous allez devoir combattre pour vous en dépétrer.', 'Vous sectionnez le tentacule d\'un coup de dague et parvenez à vous libérer. '),
	(7, 49, 7, 'Votre bluff ne fonctionne pas sur le marchand, il dégaine instantanément un sabre. Vos menaces ne lui ont pas plu du tout et il souhaite en découdre.', 'Au contact de votre fer, le corps du marchand se volatilise en un nuage de fumée verdâtre. '),
	(8, 51, 8, 'Le sorcier vous attendait. Sans dire un mot, il se met à léviter, les yeux vides et les mains chargées d\'une énergie violette.\r\nSa robe ondulant lentement au rythme du léger vent vous carressant le visage. \r\n<br><br>\r\nVotre destin se joue mainteant.', 'Le sorcier de Vangläs est à votre merci.');

-- Listage des données de la table microdonjon.chap_condition : ~8 rows (environ)
INSERT INTO `chap_condition` (`id`, `chapitre_id`, `item_condition_id`, `texte_si_vrai`, `texte_si_faux`) VALUES
	(1, 6, 4, 'La pièce est encombrée de nombreuses malles et coffres et semble servir de stockage pour le donjon. La plupart des malles sont remplies de breloques insignifiantes.<br> Trois coffres attirent néanmoins votre attention.\r\n<br><br>\r\nLe premier est un petit coffre gris de la taille d\'une boîte à chaussures.<br>\r\nLe second est un joli coffre en bois rose, verni et décoré avec goût.<br>\r\nLe troisième est un coffre en chêne, serti de dorures et gravé d\'une tête de mort.<br><br> \r\n\r\nLes trois coffres sont verrouillés par un cadenas.\r\n<br><br>\r\nVous pouvez essayer d\'utiliser la clé rouillée trouvée dans la cabine du garde pour ouvrir l\'un des coffres. \r\n<br>Vous pouvez également passer votre chemin et la conserver pour plus tard.', 'La pièce est encombrée de nombreuses malles et coffres et semble servir de stockage pour le donjon. La plupart des malles sont remplies de breloques insignifiantes.<br> Trois coffres attirent néanmoins votre attention.\r\n<br><br>\r\nLe premier est un petit coffre gris de la taille d\'une boîte à chaussures.<br>\r\nLe second est un joli coffre en bois rose, verni et décoré avec goût.<br>\r\nLe troisième est un coffre en chêne, serti de dorures et gravé d\'une tête de mort.<br><br> \r\n\r\nLes trois coffres sont verrouillés par un cadenas.\r\n<br><br>\r\n\r\nVous pouvez essayer de crocheter l\'une des serrures avec votre dague. Ou bien ne pas tenter le diable et continuer l\'exploration du donjon.'),
	(2, 17, 3, 'La salle dans laquelle vous entrez est plongée dans l\'obscurité. Vous ne voyez rien d\'autre que les ténèbres d\'un noir d\'encre. \r\n<br><br>\r\nVous pouvez allumer votre lanterne même si vous craignez que cela puisse alerter des créatures alentour de votre présence. Vous pouvez, sinon, tâtonner dans l\'obscurité en espérant trouver une issue.', 'La salle dans laquelle vous entrez est plongée dans l\'obscurité. Vous ne voyez rien d\'autre que les ténèbres d\'un noir d\'encre. \r\n<br><br>\r\nVous n\'avez d\'autre choix que de longer les murs en tâtonnant, et espérer de trouver une issue.'),
	(3, 55, 5, 'Vous vous souvenez que vous êtes en possession d\'une gourde, vous pouvez la remplir d\'eau fraîche si vous le désirez, ou bien poursuivre votre aventure vers l\'est ou l\'ouest', ' Vous poursuivez maintenant votre chemin, plein.e d\'entrain, vers l\'ouest ou l\'est.'),
	(4, 58, 8, 'La mauvaise nouvelle c\'est que vous vous trouvez vraisemblablement dans un cul-de-sac.<br>\r\nLe pont de singe a véritablement l\'air en piteux état et vous rechignez à tenter votre chance une seconde fois.\r\n<br><br>\r\nVous remarquez néanmoins des fissures dans le sol, vous pouvez y donner quelques coups de pioche pour voir s\'il n\'y aurait pas un chemin alternatif. Vous pouvez également tenter, de nouveau, votre chance sur le pont de singe si vous vous sentez d\'humeur chanceuse.', 'La mauvaise nouvelle c\'est que vous vous trouvez vraisemblablement dans un cul-de-sac.<br>\r\nLe pont de singe a véritablement l\'air en piteux état et vous rechignez à tenter votre chance une seconde fois.\r\n<br><br>\r\nVous n\'allez hélas pas avoir d\'autre choix.'),
	(5, 42, 6, 'Vous vous retrouvez sur une plage sablonneuse carressée par la rivière intérieure. Il est particulièrement déconcertant de retrouver ce genre de paysage à l\'intérieur d\'une caverne. Vous déambulez le long du flanc rocheux afin de trouver une ouverture vous permettant de poursuivre votre périple. \r\n<br><br>\r\nVous tombez nez à nez avec un gobelin blessé, allongé sur le sable. Il semble ressentir une douleur terrible, il a dû se blesser dans les torrents en amont.<br>\r\nMalgré la barrière de la langue, vous comprenez que la créature implore votre aide.<br>\r\nDerrière elle, deux arches taillées dans la roche semblent vous mener vers la suite de votre objectif.\r\n<br><br>\r\nVous vous souvenez que votre gourde est remplie d\'eau de la fontaine cristalline, vous pouvez l\'offrir au gobelin afin de tenter de le soigner\r\n<br><br>\r\nVous remarquez également la besace de la créature qui semble remplie d\'objets en tous genre, vous pouvez essayer de profiter de votre position pour la dépouiller.\r\n<br><br>\r\nVous pouvez également ignorer le gobelin et poursuivre votre chemin derrière l\'une des deux arches. ', 'Vous vous retrouvez sur une plage sablonneuse carressée par la rivière intérieure. Il est particulièrement surprenant de retrouver ce genre de paysage à l\'intérieur d\'une caverne. Vous déambulez le long du flanc rocheux afin de trouver une ouverture vous permettant de poursuivre votre périple. \r\n<br><br>\r\nVous tombez nez à nez avec un gobelin blessé, allongé sur le sable. Il semble ressentir une douleur terrible, il a dû se blesser dans les torrents en amont.<br>\r\nMalgré la barrière de la langue, vous comprenez que la créature implore votre aide.<br>\r\nDerrière elle, deux arches taillées dans la roche semblent vous mener vers la suite de votre objectif.\r\n<br><br>\r\nVous ne possédez, hélas, rien dans votre inventaire qui puisse permettre de le soigner\r\n<br><br>\r\nVous remarquez cependant la besace de la créature qui semble remplie d\'objets en tous genre, vous pouvez essayer de profiter de votre position pour la dépouiller.\r\n<br><br>\r\nVous pouvez également ignorer le gobelin et poursuivre votre chemin derrière l\'une des deux arches. '),
	(6, 45, 13, 'La salle circulaire est occupée en son centre par une colossale statue. Vous reconnaissez ce visage, il s\'agit des traits grâcieux de Käangelanne, la dernière héroïne a avoir restauré la paix sur les terres d\'Ängerjalg.\r\n<br><br>\r\nLa légende raconte que la statue sait reconnaître les véritables héros.\r\n<br><br>\r\nVous vous agenouillez devant la statue.\r\n<br><br>\r\nLa statue semble vous considérer digne d\'être un héros. En un grondement sourd, elle abaisse le bras vers vous et vous tend son épée.\r\n', 'La salle circulaire est occupée en son centre par une colossale statue. Vous reconnaissez ce visage, il s\'agit des traits grâcieux de Käangelanne, la dernière héroïne a avoir restauré la paix sur les terres d\'Ängerjalg.\r\n<br><br>\r\nLa légende raconte que la statue sait reconnaître les véritables héros.\r\n<br><br>\r\nVous vous agenouillez devant la statue ...\r\n<br><br>\r\n... mais rien ne se passe, vous êtes un petit peu vexé mais décidez malgré tout de continuer votre chemin.\r\n<br><br>\r\nDeux portes s\'offrent à vous :'),
	(7, 67, 5, 'En échange de quelques pièces d\'or, vous tendez votre gourde au vendeur.', 'Vous n\'avez, hélas, aucun récipient pour transporter votre potion.<br>\r\nVous pouvez la boire tout de suite si vous le souhaitez, ou bien jeter votre dévolu sur l\'un des autres objets magiques de l\'étal.');

-- Listage des données de la table microdonjon.chap_standard : ~57 rows (environ)
INSERT INTO `chap_standard` (`id`, `chapitre_id`, `item_prendre_id`, `item_perdre_id`, `texte_chapitre`, `modif_gold`, `modif_pv`, `modif_attaque`) VALUES
	(1, 1, NULL, NULL, 'Cela fait plusieurs décennies déjà que la verte plaine d\'Ängerjalg s\'est ternie. La végétation, autrefois luxuriante a cédé la place à des marécages brunâtres embourbant les villages alentour.\r\n\r\nLa légende raconte qu\'un sorcier, tapi dans les ténèbres menaçantes du donjon de Vangläs, devrait ses pouvoirs à l\'aspiration de l\'énergie vitale des forêts de la région. \r\n<br><br>\r\nVotre village vous a estimé.e digne de confiance et vous a missionné.e pour partir à l\'aventure afin de mettre un terme à ses sombres desseins.\r\n<br><br>\r\nVous êtes équipé.e d\'une légère armure de cuir, d\'une dague effilée, d\'un parchemin afin de cartographier votre progression, ainsi que d\'une besace vous permettant de collecter divers artéfacts au cours de votre aventure.\r\n<br><br>\r\nAlors que vous vous tenez sur le seuil du donjon, vous prenez une grande inspiration et poussez la massive porte d\'ébène. Une odeur de renfermé et de champignons divers vous attaque instantanément les narines. \r\n\r\nVous plissez les yeux pour vous accoutumer à l\'obscurité et plongez dans le donjon.\r\n<br><br>\r\nIl est désormais trop tard pour faire demi-tour.', NULL, NULL, NULL),
	(2, 2, NULL, NULL, 'Vous franchissez le seuil du donjon.<br>\r\nUn long corridor se déroule devant vous, éclairé par une rangée de lanternes.<br>\r\nLe couloir bifurque de part et d\'autre à son extrémité vers deux portes closes.<br>\r\nVous pouvez récupérer une lanterne, elle pourrait s\'avérer utile pour la suite de votre aventure.<br>\r\nVous pouvez également ignorer les lanternes et vous diriger directement vers l\'une des deux portes.', NULL, NULL, NULL),
	(3, 3, 3, NULL, '<div class="game__getItem game__box">Vous obtenez la <span class="game__getItem-item">lanterne</span></div>\r\nVous pouvez désormais vous diriger vers l\'une des deux portes à l\'extrémité du corridor\r\n', NULL, NULL, NULL),
	(4, 5, 4, NULL, 'Le capharnaüm de la salle de garde ne vous offre pas grande fortune.<br>\r\nVous trouvez néanmoins XX pièces d\'or et une petite clé dévorée par la rouille.\r\n\r\n<div class="game__getItem  game__box">Vous obtenez la <span class="game__getItem-item">clé rouillée</span></div>\r\n\r\nVous n\'avez maintenant pas d\'autre choix que de rebrousser chemin et d\'emprunter la porte de l\'autre côté du corridor.', 15, NULL, NULL),
	(5, 7, NULL, 4, 'Le coffre s\'ouvre avec un cliquetis satisfaisant.<br>\r\nUn petit pactole se trouve dans le coffre, vous glissez votre butin dans votre bourse.\r\n\r\n<div class="game__getGold  game__box">Vous obtenez X pièces d\'or</div>\r\n\r\nHélas la clé, rongée par l\'oxydation, se brise dans la serrure, elle sera désormais inutilisable.<br>\r\nVous pouvez néanmoins essayer de crocheter l\'un des autres coffres avec votre dague, ou bien vous satisfaire de votre prise et continuer votre périple.', 45, NULL, NULL),
	(6, 8, NULL, 4, 'Le coffre s\'ouvre avec un cliquetis satisfaisant.<br>\r\nUn petit pactole se trouve dans le coffre, vous glissez votre butin dans votre bourse.\r\n\r\n<div class="game__getGold  game__box">Vous obtenez X pièces d\'or</div>\r\n\r\nHélas la clé, rongée par l\'oxydation, se brise dans la serrure, elle sera désormais inutilisable.<br>\r\nVous pouvez néanmoins essayer de crocheter l\'un des autres coffres avec votre dague, ou bien vous satisfaire de votre prise et continuer votre périple.', 90, NULL, NULL),
	(7, 53, NULL, 4, '<div class="game__getGold  game__box">Vous obtenez X pièces d\'or</div>\r\n\r\nDans le feu de la bataille, vous avez égaré la clé, impossible de remettre la main dessus.<br>\r\nVous pouvez néanmoins essayer de crocheter l\'un des autres coffres avec votre dague, ou bien vous remettre de vos émotions et reprendre la route vers la suite de votre périple.', 30, NULL, NULL),
	(8, 10, NULL, NULL, 'Vous étiez pluôt bien parti.e mais vous rippez et vous entaillez la main avec votre dague en essayant de crocheter la serrure.\r\n\r\n<div class="game__loseHP game__box">Vous perdez X PV</div>\r\n\r\nCette mésaventure vous a passé le goût du crochetage. Vous décidez de continuer l\'exploration du donjon', NULL, -8, NULL),
	(9, 11, NULL, NULL, 'Deux chemins s\'offrent désormais à vous :<br>\r\n- Une porte, orientée est, au bois verni et aux motifs ouvragés<br>\r\n- Une autre porte, orientée nord, recouverte de griffures et de traces de crocs\r\n<br><br>\r\n', NULL, NULL, NULL),
	(10, 54, NULL, NULL, '<div class="game__getGold game__box">Vous obtenez XX pièces d\'or</div>\r\n\r\nVous arrachez les racines d\'un coup sec de dague et débloquez la porte. ', 45, NULL, NULL),
	(11, 13, NULL, NULL, 'Vous pénétrez dans une vaste bibliothèque, l\'espace est rempli, du sol au plafond, de milliers d\'ouvrages vermoulus et décrépits. Vous les feuilletez brièvement. Si certains sont dans votre langue, la plupart d\'entre eux est rédigée en écritures runiques bien au delà de votre compréhension.\r\n<br><br>\r\nTrois ouvrages retiennent néanmoins votre attention\r\n<br><br>\r\nLe premier s\'intitule "Comment devenir riche, rapidement et sans sortir de chez vous".<br>\r\nLe second est un grimoire relié de cuir appelé "Guide de défense contre les créatures maléfiques"<br>\r\nLe dernier est un énorme pavé nommé "Petit traité d\'architecture hostile"\r\n<br><br>\r\nVous pouvez feuilleter l\'un des trois ouvrages à la recherche d\'informations essentielles ou alors choisir de passer votre chemin sans plus tarder.', NULL, NULL, NULL),
	(12, 14, NULL, NULL, 'En ouvrant le tome vous réalisez qu\'il s\'agit en réalité d\'un petit coffret astucieusement camouflé. Il contient quelques pièces d\'or que vous empochez sur le champ.\r\n\r\n<div class="game__getGold game__box">Vous obtenez XX pièces d\'or</div>\r\n\r\nVous pouvez feuilleter un autre livre ou quitter la bibliothèque', 60, NULL, NULL),
	(13, 16, NULL, NULL, 'L\'ouvrage est massif et écrit dans le style ampoulé et hermétique caractéristique des textes techniques.\r\n<br><br>\r\nUn marque-page vous conduit néanmoins sur cet intriguant schéma.\r\n<br><br>\r\n\'\'Afficher le plan du Couloir Arc-en-ciel\'\'\r\n<br><br>\r\nPeut-être pourra-t-il vous être utile dans la suite de l\'aventure ? \r\n<br><br>\r\nVous pouvez désormais feuilleter un autre ouvrage ou quitter la bibliothèque.', NULL, NULL, NULL),
	(14, 18, NULL, NULL, 'Après quelques minutes de recherche dans l\'obscurité, vous ayant semblé une éternité, vous sentez finalement quelque chose qui s\'apparente à une poignée de porte. \r\n<br><br>\r\nVous quittez donc au plus vite la salle obscure avant qu\'une créature ne vous tombe dessus. ', NULL, NULL, NULL),
	(15, 19, NULL, NULL, 'Vous allumez la lanterne et illuminez la pièce.\r\n<br><br>\r\nUne unique porte, en face de vous, fait office d\'issue.\r\n<br><br>\r\nVous ne remarquez pas grand chose de notable, la pièce semble faire office de débarras.<br>\r\nVous relevez néanmoins un étrange bas-relief représentant le sorcier. \r\n<br><br>\r\nLe maître des lieux vous toise d\'un air de défi. Son regard est menaçant.<br>\r\nAlors que vous examinez son oeil torve, vous remarquez que la peinture y apparaît patinée par le temps, bien plus que le reste de son visage.<br>\r\nUne inspection plus poussée vous révèle qu\'il s\'agir d\'un mécanisme.<br>\r\n<br><br>\r\nVous pouvez presser l\'oeil du sorcier ou bien vous diriger directement vers la sortie.', NULL, NULL, NULL),
	(16, 20, NULL, NULL, 'Le bas-relief s\'ouvre en deux dans un grondement d\'outre-tombe. \r\nVous avez découvert un passage secret. Un vent frais et aux effluves d\'humidité vous carresse le visage. \r\n<br><br>\r\nVotre lanterne en avant, vous progressez avec peine dans l\'étroit boyau caverneux du passage secret. Coincé sous un rocher, le squelette d\'un aventurier moins fortuné que vous semble vous saluer. \r\n<br><br>\r\nLe squelette tient une gourde à la main. Vous pouvez la récupérer pour vous aider dans la suite de votre aventure ou alors la laisser, par respect pour le défunt, et continuer votre chemin dans le passage secret.', NULL, NULL, NULL),
	(17, 21, 5, NULL, '<div class="game__getItem game__box">Vous obtenez la <span class="game__getItem-item">gourde</span></div>\r\nAinsi que quelques pièces d\'or dans la bourse toujours attachée à la taille du squelette\r\n<br><br>\r\nVous poursuivez maintenant votre chemin à travers le passage dérobé.', 30, NULL, NULL),
	(18, 22, NULL, NULL, 'La salle semble vide au premier abord, juste une petite table et deux chaises trônent au milieu.<br>\r\nVous vous asseyez sur l\'une des deux chaises, juste le temps de souffler quelques secondes avant de repartir à l\'aventure. Alors que vous vous apprêtez à vous relever une  voix rocailleuse et bourrue vous invective.<br>\r\n"Alors comme ça vous partez déjà" ?\r\n<br><br>\r\nUn homme d\'une cinquantaine d\'années est apparu sur la chaise en face de vous. Il arbore une grande moustache broussailleuse et un casque de chantier. Il présente également la particularité d\'être parfaitement translucide et de flotter à quelques centimètres du sol.\r\n<br><br>\r\n"Enchanté, moi c\'est Tööde, j\'étais l\'ancien contremaitre et c\'est grosso-modo à moi que l\'on doit la construction du magnifique ouvrage que tu foules actuellement de tes pieds sales ! Il se trouve qu\'à l\'époque les normes de sécurité n\'étaient pas ce qu\'elles sont aujourd\'hui et qu\'un rocher à vite fait de se déloger du plafond, et qu\'un casque ne suffit pas dans ce genre de cas. Bref, pour la faire courte, je suis condamné à hanter le donjon pour l\'éternité. Mais tu ne devineras jamais à quel point on s\'ennuie quand on n\'a personne à hanter. En revanche ce que j\'adorais c\'est les énigmes. Sur le chantier on faisait que ça, se raconter des devinettes, des charades ... Alors j\'en ai une bonne pour toi, si tu gagnes, je trouverai bien un petit quelque chose à t\'offrir en trophée."\r\n<br><br>\r\n"Je porte un chapeau mais n\'ai pas de tête.<br>\r\nJ’ai un pied mais mais ne porte pas de chaussette.\r\n<br><br>\r\nQui suis-je?"\r\n<br><br>\r\nVous pouvez tenter de répondre à la devinette du contremaître ectoplasmique ou bien alors vous excuser poliment et passer votre chemin.', NULL, NULL, NULL),
	(19, 23, 8, NULL, 'Le visage du contremaître s\'éclaire d\'un sourire ! Félicitations !\r\n<br><br>\r\n"Tiens voilà, vu comme cette bicoque tombe en ruine, ça serait pas du luxe d\'emmener ça avec toi"\r\n<div class="game__getItem game__box">Vous obtenez la <span class="game__getItem-item">pioche spectrale</span></div>\r\nVous continuez vers la salle suivante\r\n(ou vous rebroussez chemin si on vient de la fontaine)', NULL, NULL, NULL),
	(20, 24, NULL, NULL, 'Le visage du contremaître s\'assombrit, furieux il vous jette au visage le maillet (spectral) qu\'il portait à la taille.\r\n\r\n<div class="game__loseHP game__box">Vous perdez X PV</div>\r\n\r\nVous vous hâtez de sortir de la pièce pour ne pas subir le courroux de l\'ectoplasme.', NULL, -10, NULL),
	(21, 25, NULL, NULL, 'Vous vous excusez poliment en expliquant que les énigmes ne sont pas votre fort.\r\n<br><br>\r\n"Je comprends, je comprends ... c\'est pas grave ..." répond le contremaître, la mine triste.\r\n<br><br>\r\nVous vous en voulez de l\'avoir déçu et quittez ses quartiers avec un petit pincement au coeur.\r\n', NULL, NULL, NULL),
	(22, 26, NULL, NULL, 'Un long couloir aux dalles multicolores s\'étend devant vous. Le magnifique carrelage, aux couleurs de l\'arc-en-ciel dénote énormément avec la décoration minimaliste du reste du donjon.\r\n<br><br>\r\nVous songez que le couloir doit être piégé. En y regardant de plus près, vous remarquez également de suspicieux trous dans les murs probablement là pour tirer des flèches. Le choix des dalles sur lesquelles marcher risque d\'être crucial. \r\n<br><br>\r\nVous calculez que vous pouvez atteindre le bout du couloir en deux sauts.<br>\r\nLe premier vous permettrait d\'atteindre les dalles bleues, rouges ou jaunes.\r\n', NULL, NULL, NULL),
	(23, 27, NULL, NULL, 'Alors que vous atterrissez sur la dalle, vous la sentez s\'enfoncer sous votre poids. Aussitôt une flèche fuse directement vers votre genou.\r\n\r\n<div class="game__loseHP game__box">Vous perdez X points de vie</div>\r\n\r\nVous priez pour ne pas vous tromper une seconde fois.\r\n<br><br>\r\nEn un saut vous pouvez atteindre les dalles roses, oranges ou vertes.', NULL, -11, NULL),
	(24, 28, NULL, NULL, 'Vous serrez les dents en attendant votre sentance mais rien ne se passe. À peine le temps de vous réjouir que vous devez enchaîner avec un 2e saut.\r\n<br><br>\r\nVous pouvez attendre les dalles roses, oranges, et vertes.', NULL, NULL, NULL),
	(25, 29, NULL, NULL, 'Alors que vous atterrissez sur la dalle, vous la sentez s\'enfoncer sous votre poids. Aussitôt une flèche fuse directement vers votre genou.\r\n<br><br>\r\n<div class="game__loseHP game__box">Vous perdez X points de vie</div>\r\n\r\nVous priez pour ne pas vous tromper une seconde fois.\r\n<br><br>\r\nEn un saut vous pouvez atteindre les dalles roses, oranges ou vertes.', NULL, -13, NULL),
	(26, 30, NULL, NULL, 'La dalle se brise sous l\'impact et vous vous empalez le pied sur un pieu en bois malicieusement dissimulé en dessous.\r\n\r\n<div class="game__loseHP game__box">Vous perdez X points de vie</div>\r\n\r\nLe prochain saut vous emmène directement au bout du couloir, vous pouvez enfin poursuivre votre aventure', NULL, -12, NULL),
	(27, 31, NULL, NULL, 'La dalle se brise sous l\'impact et vous vous empalez le pied sur un pieu en bois malicieusement dissimulé en dessous.\r\n<div class="game__loseHP game__box">Vous perdez X points de vie</div>\r\nLe prochain saut vous emmène directement au bout du couloir, vous pouvez enfin poursuivre votre aventure', NULL, -14, NULL),
	(28, 32, NULL, NULL, 'Toujours peu confiant en votre choix, vous craignez qu\'un piège vous tombe sur le coin de la figure alors que votre pied touche la dalle émeraude. Mais rien ne se passe, vous avez bien choisi.\r\n<br><br>\r\nUn ultime saut vous mène au bout du couloir, vous pouvez poursuivre votre aventure.', NULL, NULL, NULL),
	(29, 33, NULL, NULL, 'Vous entrez dans une magnifique pièce circulaire aux murs recouverts de marbre blanc.\r\n<br><br>\r\nAu centre de celle-ci trône une fontaine. Une statue de verseau en cristal reflète la lumière de la lucarne en un millier de petits arcs-en-ciel.\r\nLa statue déverse une eau limpide, pure et cristalline.\r\n<br><br>\r\nVous mourez de soif après des heures à crapahuter dans le donjon. \r\nVous seriez prêt à tout pour une petite gorgée de cette eau rafraîchissante.\r\n<br><br>\r\nVous pouvez vous désaltérer à la fontaine si vous le souhaitez. Si vous n\'avez pas confiance et que vous pensez qu\'il s\'agit d\'un nouveau piège du donjon, vous pouvez poursuivre votre parcours en direction de l\'est ou de l\'ouest.', NULL, NULL, NULL),
	(30, 34, NULL, NULL, 'Vous mettez vos mains en coupe et buvez de grandes lampées de cette eau fraîche et désaltérante. Vous vous sentez revigoré pour le reste de votre aventure. \r\n<br><br>\r\n<div class="game__getHP game__box">Restaurez X points de vie</div>', NULL, 25, NULL),
	(31, 56, 6, 5, '<div class="game__getItem game__box">Vous obtenez l\'<span class="game__getItem-item">eau revigorante</span></div>\r\n\r\nVous poursuivez maintenant votre chemin, plein.e d\'entrain, vers l\'ouest ou l\'est.', NULL, NULL, NULL),
	(32, 57, NULL, NULL, '<div class="game__getGold game__box">Vous obtenez XX pièces d\'or</div>\r\n\r\nLe pont de singe à l\'extrémité de la pièce a l\'air fragile, vous devrez être très prudent si vous décidez de l\'emprunter. <br><br>\r\nVous remarquez également un escalier en colimaçon s\'enfonçant dans l\'obscurité , dissimulé derrière les décombres du gardien squelettique.', 45, NULL, NULL),
	(33, 36, NULL, NULL, 'Vous empruntez un pont de singe traversant une énorme rivière sous-terraine, le courant est immense et vous craignez de ne pas survivre si par malheur vous deviez vous y aventurer.\r\n<br><br>\r\nChaque corde grince comme pour implorer votre pardon à chacun de vos pas. Les planches ploient sous votre poids comme si leur bois avait été remplacé préalablement par du nougat.\r\n<br><br>\r\nNéanmoins le pont encaisse miraculeusement le choc et vous permet d\'atteindre la salle suivante', NULL, NULL, NULL),
	(34, 37, NULL, NULL, 'La pièce est vide à l\'exception d\'un mannequin portant une splendide armure incrustée de mille rubis. \r\n<br><br>\r\nL\'armure est rutilante et vous mourez d\'envie de l\'enfiler. A moins qu\'il ne s\'agisse d\'un piège du donjon ?', NULL, NULL, NULL),
	(35, 38, 9, 2, 'Vous enfilez l\'armure.<br>\r\nUne sensation de pouvoir vous envahit.<br>\r\nVous vous sentez invincible.\r\n\r\n<div class="game__getItem game__box">Vous obtenez l\'<span class="game__getItem-item">armure rubis</span></div>\r\n\r\nVous devez maintenant quitter l\'armurerie', NULL, NULL, NULL),
	(36, 39, NULL, NULL, 'Quelques coups de pioche seulement vous permettent de former une ouverture assez large pour vous y faufiler. Quelques minutes d\'escalade plus tard, vous atteignez l\'étage inférieur. \r\n<br><br>\r\nVos pieds s\'enfoncent délicatement dans un doux sable blanc.', NULL, NULL, NULL),
	(37, 41, NULL, NULL, 'Les escaliers semblent s\'enfoncer à l\'infini dans les entrailles sombres du donjon. \r\n<br><br>\r\nAprès plusieurs bonnes minutes de descente vous entendez le grondement du torrent que vous aperceviez en contrebas du pont de singe. \r\n<br><br>\r\nUne fois sorti.e de l\'escalier vous empruntez un petit pont de bois, bien plus robuste, qui vous mène sans aucune crainte jusqu\'à une berge sablonneuse', NULL, NULL, NULL),
	(38, 43, NULL, NULL, 'A peine avez vous eu le temps de plonger la main dans la besace du gobelin qu\'il vous croque le bras. Plantant ses canines pointues jusqu\'au sang.\r\n<br><br>\r\nVous retirez promptement votre bras blessé.\r\nVous récupérez une misérable poignée de pièces d\'or et décidez de fuir, honteux de votre action.\r\n\r\n<div class="game__getGold game__box">Vous obtenez X or</div>\r\n<div class="game__loseHP game__box">Vous perdez X points de vie</div>', 9, -9, NULL),
	(39, 44, 5, 6, 'Vous portez votre gourde aux lèvres de la créature assoiffée.<br>\r\nAprès quelques lampées la créature semble déjà mieux se porter. Elle termine de boire la gourde et se remet sur pied instantanément. \r\n<br><br>\r\nLe gobelin se met à genoux devant vous pour exprimer sa gratitude et vous offre un petit coquillage en forme de coeur.\r\n', NULL, NULL, NULL),
	(40, 59, 13, NULL, 'Vous acceptez le petit coquillage avec humilité et le rangez dans votre besace.\r\n\r\n<div class="game__getItem game__box">Vous obtenez le <span class="game__getItem-item">coquillage de l\'amitié</span></div>\r\n\r\nLa créature vous quitte d\'un bon pas. \r\n<br><br>\r\nVous pouvez désormais continuer votre aventure avec la sensation du devoir accompli', NULL, NULL, NULL),
	(41, 60, 10, 1, '<div class="game__getItem game__box">Vous obtenez l\'<span class="game__getItem-item">épée du héros</span>.</div>\r\nVous vous remplissez de fierté à l\'idée d\'appartenir à une si longue lignée de héros et d\'héroïnes ayant restauré la paix sur ces terres. \r\n<br><br>\r\nVous continuez votre chemin, avec toujours un petit peu plus de pression sur les épaules.\r\n<br><br>\r\nDeux portes s\'offrent à vous :', NULL, NULL, 2),
	(42, 46, NULL, NULL, 'La salle dans laquelle vous pénétrez est un autel à la gloire de la déesse. Elle est recouverte de milliers de fleurs multicolores. D\'innombrables peintures représentant des scènes célèbres d\'héroïsme mythologique recouvrent les murs et le plafond.\r\n<br><br>\r\nAu centre de la pièce trône une petite boîte d\'ébène permettant de faire des offrandes.\r\n<br><br>\r\nVous pouvez glisser des pièces d\'or dans la boîte à offrandes en espérant que la déesse soit clémente avec votre quête. Ou bien vous pouvez passer votre chemin et garder votre or, auquel cas deux portes s\'offrent à vous, l\'une menant vers le sud-ouest, l\'autre vers le nord-est.', NULL, NULL, NULL),
	(43, 61, NULL, NULL, 'Vous glissez les pièces dans l\'urne et poursuivez votre chemin', -50, NULL, NULL),
	(44, 62, NULL, NULL, 'Vous glissez les pièces dans l\'urne et poursuivez votre chemin', -75, NULL, NULL),
	(45, 63, NULL, NULL, 'Alors que vous vous redressez après avoir effectué votre offrande, un rai de lumière multicolore descend du plafond, directement sur votre lame.\r\n\r\n<div class="game__getAttack game__box">Votre lame luit désormais d\'un doux éclat irisé</div>\r\n\r\nVous pouvez désormais continuer votre route, la confiance remontée à bloc', -100, NULL, 1),
	(46, 64, NULL, NULL, 'Alors que vous vous redressez après avoir effectué votre offrande, un rai de lumière multicolore descend du plafond, directement sur votre lame.\r\n\r\n<div class="game__getAttack game__box">Votre lame luit désormais d\'un éclat nouveau</div>\r\n\r\nVous pouvez désormais continuer votre route, la confiance remontée à bloc', -125, NULL, 2),
	(47, 65, NULL, NULL, 'Alors que vous vous redressez après avoir effectué votre offrande, un rai de lumière multicolore descend du plafond, directement sur votre lame.\r\n\r\n<div class="game__getAttack game__box">Votre lame luit désormais d\'un éclat nouveau</div>\r\n\r\nVous pouvez désormais continuer votre route, la confiance remontée à bloc', -150, NULL, 2),
	(48, 66, NULL, NULL, 'Alors que vous vous redressez après avoir effectué votre offrande, un rai de lumière multicolore descend du plafond, directement sur votre lame.\r\n\r\n<div class="game__getAttack game__box">Votre lame luit désormais d\'un éclat aveuglant</div>\r\n\r\nVous pouvez désormais continuer votre route, la confiance remontée à bloc', -200, NULL, 3),
	(49, 47, NULL, NULL, 'Vous avancez avec prudence le long d\'un grand corridor. Des tentures représentant le sorcier tapissent les murs. Vous touchez au but, vous le sentez. \r\n<br><br>\r\nVous atteignez la colossale porte en bout du couloir, c\'est derrière cette porte que s\'achève votre aventure. Peu importe l\'issue.\r\n<br><br>\r\nA côté de la porte, un petit gobelin tient une échoppe itinérante.<br>\r\n"Bonjour voyageur, l\'une de ces marchandises pourrait-elle être utile à votre entreprise ?"<br>\r\nVous observez l\'étal, 3 objets retiennent votre attention.\r\n<br><br>\r\nSi vous trouvez le prix des marchandises démesuré, vous pouvez aussi menacer le marchand de votre lame.\r\n<br><br>\r\nVous pouvez également partir sans rien acheter.\r\n', NULL, NULL, NULL),
	(50, 70, 7, 5, 'Le vendeur remplit votre gourde de d\'un liquide rouge et effervescent\r\n\r\n<div class="game__getItem game__box">Vous obtenez la <span class="game__getItem-item">potion de soin</span></div>\r\n\r\nSi jamais vous vous sentez défaillir lors du combat final, vous pourrez en boire afin de  reprendre vos esprits. ', -50, NULL, NULL),
	(51, 71, NULL, NULL, 'Vous buvez le breuvage rouge effervescent à même la louche du vendeur.<br>\r\nVous sentez instantanément la vitalité regagner votre corps.\r\n<br><br>\r\n<div class="game__getHP game__box">Restaurez X points de vie</div>', -50, 50, NULL),
	(52, 68, 14, NULL, 'En échange de quelques pièces d\'or, le vendeur vous tend une paire de bottes ornées de petites ailettes. \r\n\r\n<div class="game__getItem game__box">Vous obtenez les <span class="game__getItem-item">bottes de vivacité</span></div>\r\n\r\nVous les enfilez. Pile votre pointure ! Vous vous sentez instantanément plus allègre. \r\n<br><br>\r\nVotre vitesse vous conférera un avantage certain en vous permettant d\'attaquer plusieurs fois d\'affilée', -100, NULL, NULL),
	(53, 69, 15, NULL, 'En échange de quelques pièces d\'or, le vendeur vous tend une cape irisée aux volutes mouvantes similaires à celles de l\'essence dans une flaque.\r\n\r\n<div class="game__getItem game__box">Vous obtenez la <span class="game__getItem-item">cape trompe-l\'oeil</span></div>\r\n\r\nVous la nouez à vos épaules. Elle vous permet de vous fondre dans le paysage.\r\n<br><br>\r\nCette cape vous conférera un avantage certain en vous permettant d\'esquiver certaines attaques du sorcier.', -150, NULL, NULL),
	(54, 48, NULL, NULL, 'Vous saluez le vendeur, prenez une grande inspiration et poussez les portes colossales de la salle du trône, le torse bombé et la lame tremblante.\r\n<br><br>\r\nVotre aventure se termine maintenant.', NULL, NULL, NULL),
	(55, 50, NULL, NULL, 'Dans votre main, votre lame perd son éclat.\r\nLa déesse désapprouve votre geste.\r\n\r\nDémoralisé, vous poussez néanmoins les portes de votre destinée', NULL, NULL, -2),
	(56, 52, NULL, NULL, 'Alors même que vous portez l\'ultime coup au magicien, les murs du donjon se volatilisent sous vos yeux. Une forêt d\'émeraude s\'étale à perte de vue. La nature a repris ses droits. <br>\r\nVous vous passer un petit peu d\'eau de rivière sur le visage. Vous êtes prêt.e à rentrer au village pour être accueilli.e comme il se doit ! Le sourire aux lèvres, vous vous mettez en chemin avec l\'agréable sensation du devoir acompli.\r\n<br><br>\r\nFélicitations !', NULL, NULL, NULL),
	(59, 79, NULL, NULL, 'testtestfkcgvlhbmnml;gk,cf', NULL, -15, 6),
	(60, 83, NULL, NULL, 'hnùbhimnùjhmntyub', 15, NULL, NULL);

-- Listage des données de la table microdonjon.combat : ~0 rows (environ)

-- Listage des données de la table microdonjon.doctrine_migration_versions : ~0 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20230118074018', '2023-01-18 07:40:44', 841);

-- Listage des données de la table microdonjon.item : ~15 rows (environ)
INSERT INTO `item` (`id`, `nom_item`, `image_item`, `description_item`) VALUES
	(1, 'Dague effilée', 'img/items/01_dague_effilee.png', 'Cette dague légère, à la lame effilée se transmet de génération en génération dans votre famille. Elle devrait vous aider à affronter les créatures maléfiques qui peuplent le donjon.\r\n<br><br>\r\nLors des affrontements avec les créatures du donjon vous, ainsi que la créature que vous affronter, lancez deux dés chacun. La somme des deux dés est ajoutée à votre statistique d\'attaque. Il en est de même pour la créature. Si votre total est supérieur à celui de la créature, vous lui infligez des dégâts, dans le cas contraire vous en subissez. \r\n<br><br>\r\nVotre statistique d\'attaque est lisible à tout moment dans le petit macaron situé au dessus de la présente dague.'),
	(2, 'Armure de cuir', 'img/items/02_armure_cuir.png', 'Cette armure de cuir légère vous offre une résistance modérée aux dégâts que peuvent vous infliger les créatures et les pièges du donjon.\r\n<br><br>\r\nVous disposez d\'un maximum de 100 points de vie dont le décompte est affiché au dessus de l\'écran de droite.\r\n<br><br>\r\nLorsque votre total de points de vie descend à zéro, la partie est termninée. Vous pouvez néanmoins choisir d\'en commencer une autre et de visiter différents embranchements, vous trouverez probablement des objets vous permettant de progresser plus loin !'),
	(3, 'Lanterne', 'img/items/03_lanterne.png', 'Vous avez trouvé cette lanterne dans les corridors du donjon. \r\n<br><br>\r\nElle vous permettra de vous éclairer au cas où vous devriez vous aventurer dans les zones les plus obscures du donjon.'),
	(4, 'Clé rouillée', 'img/items/04_cle_rouillee.png', 'Une petite clé rongée par la rouille trouvée dans le poste de garde du donjon.\r\n<br><br>\r\nElle ne possède pas d\'indication particulière mais elle permet certainement d\'ouvrir une serrure dans les alentours.\r\n<br><br>\r\nNéanmoins, l\'oxydation a déjà bien fragilisé le matériau, vous craignez qu\'elle ne puisse offrir qu\'un nombre réduit d\'utilisations.'),
	(5, 'Gourde', 'img/items/05_gourde.png', 'Vous avez trouvé cette gourde sur le squelette d\'un aventurier au destin malheureux.\r\n<br><br>\r\nElle est vide pour le moment mais vous pourrez la remplir du liquide de votre choix le moment venu.'),
	(6, 'Gourde (eau revigorante)', 'img/items/06_gourde_eau.png', 'Vous avez trouvé cette gourde sur le squelette d\'un aventurier au destin malheureux.\r\n<br><br>\r\nElle est remplie d\'une eau cristalline et revigorante. Dans le cas où votre total de points de vie viendrait à descendre en dessous de zéro vous pourriez boire cette eau et reprendre un petit peu d\'énergie.'),
	(7, 'Gourde (potion de soin)', 'img/items/07_gourde_potion.png', 'Vous avez trouvé cette gourde sur le squelette d\'un aventurier au destin malheureux.\r\n<br><br>\r\nElle est remplie d\'une potion de soin rose et effervescente. Dans le cas où votre total de points de vie viendrait à descendre en dessous de zéro vous pourriez boire cette eau et reprendre un petit peu d\'énergie.'),
	(8, 'Pioche spectrale', 'img/items/08_pioche_spectrale.png', 'Cette pioche vous a été offerte par le contremaître du donjon à l\'issue d\'une petite partie de devinettes. \r\n<br><br>\r\nElle vous permettra certainement de vous frayer un chemin à travers certaines roches friables dans le donjon.'),
	(9, 'Armure rubis', 'img/items/09_armure_rubis.png', 'Vous avez trouvé cette magnifique armure sertie de mille rubis étincelants dans l\'armurerie du donjon. \r\n<br><br>\r\nElle vous offre une bonne résistance aux dégâts que peuvent vous infliger les créatures et les pièges du donjon.\r\n<br><br>\r\nVous disposez d\'un maximum de 125 points de vie dont décompte est affiché au dessus de l\'écran de droite.\r\n<br><br>\r\nLorsque votre total de points de vie descend à zéro, la partie est termninée. Vous pouvez néanmoins choisir d\'en commencer une autre et de visiter différents embranchements, vous trouverez probablement des objets vous permettant de progresser plus loin !'),
	(10, 'Épée du héros', 'img/items/10_epee_heros.png', 'Cette épée élancée et élégante vous a été léguée par la statue de l\'héroïne Käangelanne. Son tranchant éclatant vous permettra de combattre efficacement les créatures maléfiques du donjon.\r\n<br><br>\r\nLors des affrontements avec les créatures du donjon vous, ainsi que la créature que vous affronter, lancez deux dés chacun. La somme des deux dés est ajoutée à votre statistique d\'attaque. Il en est de même pour la créature. Si votre total est supérieur à celui de la créature, vous lui infligez des dégâts, dans le cas contraire vous en subissez. \r\n<br><br>\r\nVotre statistique d\'attaque est lisible à tout moment dans le petit macaron situé au dessus de la présente épée.'),
	(11, 'Dague éclatante', NULL, NULL),
	(12, 'Épée du héros (éclatante)', NULL, NULL),
	(13, 'Coquillage de l\'amitié', 'img/items/13_coquillage_amitie.png', 'Ce petit coquillage vous a été offert par une créature souffrante après que vous lui ayez porté secours.\r\n<br><br>\r\nIl semble pas disposer de pouvoir particulier. \r\n<br><br>\r\nIl reste néanmoins un très beau gage de votre amitié.'),
	(14, 'Bottes de vivacité', 'img/items/14_bottes_vivacite.png', 'Vous avez acheté ces bottes de vivacité à un marchand itinérant dans le donjon.\r\n<br><br>\r\nElles vous permettent d\'être plus agile lors de vos déplacements en combat. Lors de certaines attaques vous pourrez ainsi infliger deux coups d\'affilée à votre opposant !'),
	(15, 'Cape trompe-l\'oeil', 'img/items/15_cape_trompe_loeil.png', 'Vous avez acheté ces bottes de vivacité à un marchand itinérant dans le donjon.\r\n<br><br>\r\nSa texture agit comme une illusion d\'optique lors de vos déplacements, brouillant ainsi la vision de vos adversaires. Il se peut alors qu\'une attaque, censée vous atteindre, vous loupe de quelques centimètres pouvant s\'avérer décisifs pour l\'issue du combat.');

-- Listage des données de la table microdonjon.messenger_messages : ~0 rows (environ)
INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
	(1, 'O:36:\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\":2:{s:44:\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\";a:1:{s:46:\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\";a:1:{i:0;O:46:\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\":1:{s:55:\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\";s:21:\\"messenger.bus.default\\";}}}s:45:\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\";O:51:\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\":2:{s:60:\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\";O:39:\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\":4:{i:0;s:41:\\"registration/confirmation_email.html.twig\\";i:1;N;i:2;a:3:{s:9:\\"signedUrl\\";s:165:\\"http://127.0.0.1:8000/verify/email?expires=1674037600&signature=zHBnWykWmYepfU0vImdoh1LNPkuXGrxF9IcoIf5Vwd8%3D&token=noRhvQyeDMMaVSKUSQBKNMDG17iy%2FQRccklEFaskJeU%3D\\";s:19:\\"expiresAtMessageKey\\";s:26:\\"%count% hour|%count% hours\\";s:20:\\"expiresAtMessageData\\";a:1:{s:7:\\"%count%\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\":2:{s:46:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\";a:3:{s:4:\\"from\\";a:1:{i:0;O:47:\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\":5:{s:58:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\";a:1:{i:0;O:30:\\"Symfony\\\\Component\\\\Mime\\\\Address\\":2:{s:39:\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\";s:20:\\"admin@microdonjon.fr\\";s:36:\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\";s:17:\\"Admin Microdonjon\\";}}s:50:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\";s:4:\\"From\\";s:56:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\";i:76;s:50:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\";N;s:53:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\";s:5:\\"utf-8\\";}}s:2:\\"to\\";a:1:{i:0;O:47:\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\":5:{s:58:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\";a:1:{i:0;O:30:\\"Symfony\\\\Component\\\\Mime\\\\Address\\":2:{s:39:\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\";s:12:\\"toto@toto.fr\\";s:36:\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\";s:0:\\"\\";}}s:50:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\";s:2:\\"To\\";s:56:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\";i:76;s:50:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\";N;s:53:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\";s:5:\\"utf-8\\";}}s:7:\\"subject\\";a:1:{i:0;O:48:\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\":5:{s:55:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\";s:25:\\"Please Confirm your Email\\";s:50:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\";s:7:\\"Subject\\";s:56:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\";i:76;s:50:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\";N;s:53:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\";s:5:\\"utf-8\\";}}}s:49:\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\";i:76;}i:1;N;}}}s:61:\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\";N;}}', '[]', 'default', '2023-01-18 09:26:40', '2023-01-18 09:26:40', NULL);

-- Listage des données de la table microdonjon.monstre : ~8 rows (environ)
INSERT INTO `monstre` (`id`, `nom_monstre`, `pvmax_monstre`, `attaque_monstre`, `image_monstre`) VALUES
	(1, 'Gobelin Physionomiste', 10, 3, 'img/monstres/01_gobelin_physionomiste.png'),
	(2, 'Malle Polymorphe', 10, 3, 'img/monstres/02_malle_polymorphe.png'),
	(3, 'Drosera Insatiable', 10, 3, 'img/monstres/03_drosera_insatiable.png'),
	(4, 'Ouvrage Vorace', 10, 10, 'img/monstres/04_ouvrage_vorace.png'),
	(5, 'Gardien Osseux', 10, 3, 'img/monstres/05_gardien_osseux.png'),
	(6, 'Horreur Tentaculaire', 10, 3, 'img/monstres/06_horreur_tentaculaire.png'),
	(7, 'Marchand Itinérant', 10, 3, 'img/monstres/07_marchand_itinerant.png'),
	(8, 'Perfide Sorcier de Vangläs', 150, 10, 'img/monstres/08_perfide_sorcier.png');

-- Listage des données de la table microdonjon.sortie_combat : ~13 rows (environ)
INSERT INTO `sortie_combat` (`id`, `chap_combat_id`, `chapitre_id`, `texte_lien`) VALUES
	(1, 1, 5, 'Fouiller les quartiers de la garde'),
	(2, 1, 6, 'Rebrousser chemin'),
	(3, 2, 53, 'Ramasser votre butin'),
	(4, 3, 54, 'Ramasser votre butin'),
	(5, 4, 14, 'Feuilleter "Comment devenir riche ?"'),
	(6, 4, 16, 'Feuilleter le "Traité d\'architecture"'),
	(7, 4, 17, 'Quitter la bibliothèque'),
	(8, 5, 57, 'Récupérer votre butin'),
	(9, 6, 42, 'Atteindre la berge'),
	(10, 7, 50, 'Poursuivre'),
	(11, 8, 52, 'Porter le coup final');

-- Listage des données de la table microdonjon.sortie_condition : ~30 rows (environ)
INSERT INTO `sortie_condition` (`id`, `chap_condition_id`, `chapitre_id`, `condition_vrai`, `texte_lien`) VALUES
	(1, 1, 7, 1, 'Ouvrir le petit coffre gris'),
	(2, 1, 8, 1, 'Ouvrir le coffre de bois rose'),
	(3, 1, 9, 1, 'Ouvrir le coffre orné d\'une tête de mort'),
	(4, 1, 10, 0, 'Esssayer de crocheter une serrure'),
	(5, 1, 11, 1, 'Passer votre chemin'),
	(6, 1, 11, 0, 'Passer votre chemin'),
	(7, 2, 18, 0, 'Tâtonner'),
	(8, 2, 19, 1, 'Allumer la lanterne'),
	(9, 2, 18, 1, 'Tâtonner'),
	(10, 3, 56, 1, 'Remplir la gourde'),
	(11, 3, 22, 1, 'Aller vers l\'est'),
	(12, 3, 35, 1, 'Aller vers l\'ouest'),
	(13, 3, 22, 0, 'Aller vers l\'est'),
	(14, 3, 35, 0, 'Aller vers l\'ouest'),
	(15, 4, 39, 1, 'Piocher le sol friable'),
	(16, 4, 40, 1, 'Emprunter de nouveau le pont de singe'),
	(17, 4, 40, 0, 'Emprunter de nouveau le pont de singe'),
	(18, 5, 44, 1, 'Offir de l\'eau au gobelin'),
	(19, 5, 43, 1, 'Dépouiller la créature'),
	(20, 5, 45, 1, 'Entrer dans l\'arche de gauche'),
	(21, 5, 46, 1, 'Entrer dans l\'arche de droite'),
	(22, 5, 43, 0, 'Dépouiller la créature'),
	(23, 5, 45, 0, 'Entrer dans l\'arche de gauche'),
	(24, 5, 46, 0, 'Entrer dans l\'arche de droite'),
	(25, 6, 60, 1, 'Accepter l\'épée du héros'),
	(26, 6, 47, 0, 'Emprunter la porte sud'),
	(27, 6, 46, 0, 'Emprunter la porte nord-ouest'),
	(28, 7, 70, 1, 'Récupérer la potion de soin'),
	(29, 7, 71, 0, 'Boire la potion de soin'),
	(30, 7, 47, 0, 'Acheter autre chose');

-- Listage des données de la table microdonjon.sortie_standard : ~97 rows (environ)
INSERT INTO `sortie_standard` (`id`, `chap_standard_id`, `chapitre_id`, `texte_lien`) VALUES
	(1, 1, 2, 'Partir à l\'aventure !'),
	(2, 2, 3, 'Récupérer une lanterne'),
	(3, 2, 4, 'Ouvrir la porte de gauche'),
	(4, 2, 6, 'Ouvrir la porte de droite'),
	(5, 4, 6, 'Traverser le corridor'),
	(6, 5, 10, 'Essayer de crocheter une serrure'),
	(7, 5, 11, 'Continuer votre périple'),
	(8, 6, 10, 'Essayer de crocheter une serrure'),
	(9, 6, 11, 'Continuer votre périple'),
	(10, 7, 10, 'Essayer de crocheter une serrure'),
	(11, 7, 11, 'Continuer votre périple'),
	(12, 8, 11, 'Continuer votre périple'),
	(13, 9, 13, 'Prendre la porte est'),
	(14, 9, 12, 'Prendre la porte nord'),
	(15, 10, 17, 'Poursuivre'),
	(16, 11, 14, 'Feuilleter "Comment devenir riche ?"'),
	(17, 11, 15, 'Feuilleter le "Guide de défense"'),
	(18, 11, 16, 'Feuilleter le "Traité d\'architecture"'),
	(19, 11, 17, 'Poursuivre sans perdre de temps'),
	(20, 12, 15, 'Feuilleter le "Guide de défense"'),
	(21, 12, 16, 'Feuilleter le "Traité d\'architecture"'),
	(22, 12, 17, 'Poursuivre sans perdre de temps'),
	(23, 13, 14, 'Feuilleter "Comment devenir riche ?"'),
	(24, 13, 15, 'Feuilleter le "Guide de défense"'),
	(25, 13, 17, 'Quitter la bibliothèque'),
	(26, 3, 4, 'Ouvrir la porte de gauche'),
	(27, 3, 6, 'Ouvrir la porte de droite'),
	(28, 14, 26, 'Quitter la salle obscure'),
	(29, 15, 20, 'Activer le mécanisme'),
	(30, 15, 26, 'Se diriger vers la sortie'),
	(31, 16, 21, 'Récupérer la gourde'),
	(32, 16, 22, 'Continuer dans le passage secret'),
	(33, 17, 22, 'Continuer son chemin'),
	(34, 18, 23, 'Répondre "un champignon"'),
	(35, 18, 24, 'Répondre "un gobelin ... après m\'avoir rencontré"'),
	(36, 18, 25, 'Vous abstenir de répondre'),
	(37, 19, 33, 'Quitter les quartiers du contremaître '),
	(38, 20, 33, 'Vous enfuir des quartiers du contremaître '),
	(39, 21, 33, 'Quitter les quartiers du contremaître '),
	(40, 22, 27, 'Sauter sur une dalle bleue'),
	(41, 22, 28, 'Sauter sur une dalle rouge'),
	(42, 22, 29, 'Sauter sur une dalle jaune'),
	(43, 23, 30, 'Sauter sur une dalle rose'),
	(44, 23, 31, 'Sauter sur une dalle orange'),
	(45, 23, 32, 'Sauter sur une dalle verte'),
	(46, 24, 30, 'Sauter sur une dalle rose'),
	(47, 24, 31, 'Sauter sur une dalle orange'),
	(48, 24, 32, 'Sauter sur une dalle verte'),
	(49, 25, 30, 'Sauter sur une dalle rose'),
	(50, 25, 31, 'Sauter sur une dalle orange'),
	(51, 25, 32, 'Sauter sur une dalle verte'),
	(52, 26, 33, 'Poursuivre'),
	(53, 27, 33, 'Poursuivre'),
	(54, 28, 33, 'Poursuivre'),
	(55, 29, 34, 'Boire à la fontaine'),
	(56, 29, 22, 'Aller vers l\'est'),
	(57, 29, 35, 'Aller vers l\'ouest'),
	(58, 30, 55, 'Poursuivre'),
	(59, 31, 22, 'Aller vers l\'est'),
	(60, 31, 35, 'Aller vers l\'ouest'),
	(61, 32, 36, 'Emprunter le pont de singe'),
	(62, 32, 41, 'Descendre les escaliers en colimaçon'),
	(63, 33, 37, 'Entrer dans la chambre suivante '),
	(64, 34, 38, 'Enfiler l\'armure rutilante'),
	(65, 34, 58, 'Rebrousser chemin'),
	(66, 35, 58, 'Quitter l\'armurerie'),
	(67, 36, 42, 'Poursuivre'),
	(68, 37, 42, 'Visiter la berge sablonneuse'),
	(69, 38, 45, 'Fuir par l\'arche de gauche'),
	(70, 38, 46, 'Fuir par l\'arche de droite'),
	(71, 39, 59, 'Accepter le coquillage'),
	(72, 40, 45, 'Entrer dans l\'arche de gauche'),
	(73, 40, 46, 'Entrer dans l\'arche de droite'),
	(74, 41, 47, 'Emprunter la porte sud'),
	(75, 41, 46, 'Emprunter la porte nord-ouest'),
	(76, 42, 61, 'Faire une offrande de 50 pièces d\'or'),
	(77, 42, 62, 'Faire une offrande de 75 pièces d\'or'),
	(78, 42, 63, 'Faire une offrande de 100 pièces d\'or'),
	(79, 42, 64, 'Faire une offrande de 125 pièces d\'or'),
	(80, 42, 65, 'Faire une offrande de 150 pièces d\'or'),
	(81, 42, 66, 'Faire une offrande de 200 pièces d\'or'),
	(82, 42, 47, 'Emprunter la porte sud-ouest'),
	(83, 42, 45, 'Emprunter la porte sud-est'),
	(84, 43, 47, 'Se diriger vers le sud-ouest'),
	(85, 43, 45, 'Se diriger vers le sud-est'),
	(86, 44, 47, 'Se diriger vers le sud-ouest'),
	(87, 44, 45, 'Se diriger vers le sud-est'),
	(88, 45, 47, 'Se diriger vers le sud-ouest'),
	(89, 45, 45, 'Se diriger vers le sud-est'),
	(90, 46, 47, 'Se diriger vers le sud-ouest'),
	(91, 46, 45, 'Se diriger vers le sud-est'),
	(92, 47, 47, 'Se diriger vers le sud-ouest'),
	(93, 47, 45, 'Se diriger vers le sud-est'),
	(94, 48, 47, 'Se diriger vers le sud-ouest'),
	(95, 48, 45, 'Se diriger vers le sud-est'),
	(96, 49, 67, 'Acheter une potion de soin (50 pièces)'),
	(97, 49, 68, 'Acheter les bottes de vivacité (100 pièces)'),
	(98, 49, 69, 'Acheter la cape trompe-l\'oeil (150 pièces)'),
	(99, 49, 49, 'Menacer le vendeur'),
	(100, 49, 48, 'Terminer ses emplettes'),
	(101, 50, 47, 'Continuer vos achats'),
	(102, 51, 47, 'Continuer vos achats'),
	(103, 52, 47, 'Continuer vos achats'),
	(104, 53, 47, 'Continuer vos achats'),
	(106, 59, 15, 'test'),
	(107, 59, 6, 'UIONP?¨L.JBHV'),
	(108, 59, 14, 'dfcgvjhbkjnlk,l'),
	(110, 54, 51, 'Franchir le seuil de la salle du trône'),
	(112, 60, 17, 'dcfygvubhijno,k'),
	(113, 60, 26, 'tyujjiju');

-- Listage des données de la table microdonjon.user : ~6 rows (environ)
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `pseudo`, `pvmax`, `pvactuels`, `gold`, `attaque`, `chapitre_en_cours`, `date_victoire`, `is_verified`) VALUES
	(16, 'toto@toto.web', '["ROLE_ADMIN"]', '$2y$13$tMnmNHNVBeHUPYQxsorioOk1oBJnmFL/AiY4S416ieaEcdYq7IuSi', 'toto', 100, 100, 0, 10, 2, NULL, 1),
	(17, 'grugru@grugru.web', '[]', '$2y$13$RDM.X2Kc.BngfRdRd4F1c.rKOR0CiKhZGqPg7Nz09874QaPBwvCJy', 'gru', 100, 48, 0, 10, NULL, NULL, 0),
	(18, 'grugru@gmail.com', '[]', '$2y$13$c.Q.xu//vaU7eZ1SbifBPOS14Mh2UWfEoJOW5wt1UrJH9QxM1MrVa', 'grugru', 100, 19, 0, 10, NULL, NULL, 0),
	(19, 'brbrbrbr@brbr.com', '[]', '$2y$13$EFAhmJNDafhZtIvyt9cb4eNQCsIbLU/L85ZajjVo4xeY8XcA4BEH2', 'brbrbrbr', 100, 100, 0, 10, NULL, NULL, 0),
	(20, 'aaaaaa@aaaa.fr', '[]', '$2y$13$ICQGgNMUkmwDGxFEjgJjLuQocn5s30Y0sp6VKIMFxCQ9WCE5eyxfu', 'aaaaaa', 100, 100, 0, 10, NULL, NULL, 0),
	(21, 'TestRateLimiter2@gmail.com', '[]', '$2y$13$kAH9aywg3bf9WJpAr25z2.QEUnhByq0QS65DSaFxByiSvE4meXA4C', 'RateLimiterTest2', 100, 100, 0, 10, 1, NULL, 0);

-- Listage des données de la table microdonjon.user_chapitre : ~3 rows (environ)
INSERT INTO `user_chapitre` (`user_id`, `chapitre_id`) VALUES
	(16, 1),
	(16, 2),
	(21, 1);

-- Listage des données de la table microdonjon.user_item : ~9 rows (environ)
INSERT INTO `user_item` (`user_id`, `item_id`) VALUES
	(16, 1),
	(16, 2),
	(19, 1),
	(19, 2),
	(20, 1),
	(20, 2),
	(21, 1),
	(21, 2);

-- Listage des données de la table microdonjon.user_zone : ~3 rows (environ)
INSERT INTO `user_zone` (`user_id`, `zone_id`) VALUES
	(16, 1),
	(16, 21),
	(21, 21);

-- Listage des données de la table microdonjon.zone : ~21 rows (environ)
INSERT INTO `zone` (`id`, `nom_zone`, `description_zone`, `fichier_map`, `order_zone`) VALUES
	(1, 'Corridor d\'entrée', NULL, NULL, 2),
	(2, 'Quartiers de la garde', NULL, NULL, 3),
	(3, 'Salle des coffres', NULL, NULL, 4),
	(4, 'Jardin d\'hiver', NULL, NULL, 5),
	(5, 'Grande bibliothèque', NULL, NULL, 6),
	(6, 'Chambre noire', NULL, NULL, 7),
	(7, 'Passage dérobé', NULL, NULL, 8),
	(8, 'Quartiers du contremaître', NULL, NULL, 9),
	(9, 'Couloir arc-en-ciel', NULL, NULL, 10),
	(10, 'Fontaine cristalline', NULL, NULL, 11),
	(11, 'Poste de garde du pont de singe', NULL, NULL, 12),
	(12, 'Pont de singe', NULL, NULL, 13),
	(13, 'Armurerie', NULL, NULL, 14),
	(14, 'Escaliers en colimaçon', NULL, NULL, 15),
	(15, 'Torrent caverneux', NULL, NULL, 16),
	(16, 'Berge aux sables blancs', NULL, NULL, 17),
	(17, 'Statue du Héros', NULL, NULL, 18),
	(18, 'Autel de la Déesse', NULL, NULL, 19),
	(19, 'Échoppe itinérante', NULL, NULL, 20),
	(20, 'Salle du trône', NULL, NULL, 21),
	(21, 'Abords du donjon', NULL, NULL, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
