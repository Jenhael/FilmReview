-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 sep. 2024 à 10:17
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cube3`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

DROP TABLE IF EXISTS `acteurs`;
CREATE TABLE IF NOT EXISTS `acteurs` (
  `id_acteurs` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`id_acteurs`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`id_acteurs`, `nom`, `prenom`, `age`) VALUES
(1, 'Duris', 'Romain ', 0),
(2, 'Kircher', 'Paul ', 0),
(3, 'Exarchopoulos', 'Adèle ', 0);

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id_films` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `duree` varchar(50) NOT NULL,
  `id_themes` int NOT NULL,
  `annee` int NOT NULL,
  `age_requis` varchar(500) NOT NULL,
  `synopsis` varchar(1000) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `imageurl` varchar(500) NOT NULL,
  `acteurs` varchar(500) NOT NULL,
  `realisateurs` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_films`),
  KEY `id_themes` (`id_themes`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_films`, `titre`, `duree`, `id_themes`, `annee`, `age_requis`, `synopsis`, `url`, `imageurl`, `acteurs`, `realisateurs`) VALUES
(1, 'Le Règne animal', '2 h 07 min', 1, 2023, 'Tous public', 'Dans un monde en proie à une vague de mutations qui transforment peu à peu certains humains en animaux, François fait tout pour sauver sa femme, touchée par ce phénomène mystérieux. Alors que la région se peuple de créatures d\'un nouveau genre, il embarque Émile, leur fils de 16 ans, dans une quête qui bouleversera à jamais leur existence...', 'https://www.youtube.com/watch?v=K1pfR_IC7pU&pp=ygUNcsOoZ25lIGFuaW1hbA%3D%3D', 'https://media.senscritique.com/media/000021540394/300/le_regne_animal.png', ' Romain Duris, Paul Kircher, Adèle Exarchopoulos', 'Thomas Cailley'),
(2, 'The Creator', '2 h13 min', 1, 2023, 'Déconseillé aux moins de 13 ans.', 'Dans un futur proche, les humains et l\'intelligence artificielle (IA) se livrent une guerre sans merci. Joshua, un ex-agent des forces spéciales fragilisé par la disparition de sa femme, est recruté pour traquer et neutraliser le Créateur, l\'insaisissable architecte d\'une IA avancée à l\'origine d\'une arme qui pourrait mettre fin à la guerre...', 'https://www.youtube.com/watch?v=vkpTXoVKJoY&pp=ygULdGhlIGNyZWF0b3I%3D', 'https://media.senscritique.com/media/000021525611/300/the_creator.png', 'John David Washington,\r\nGemma Chan,\r\nRalph Ineson, \r\nAllison Janney,\r\nKen Watanabe', 'Gareth Edwards'),
(3, 'Le Procès Goldman', '1 h 56 min', 2, 2023, 'Déconseillé aux moins de 12 ans', 'En avril 1976 débute le deuxième procès de Pierre Goldman, militant d’extrême gauche, condamné en première instance à la réclusion criminelle à perpétuité pour quatre braquages à main armée, dont un ayant entraîné la mort de deux pharmaciennes. Il clame son innocence dans cette dernière affaire et devient en quelques semaines l’icône de la gauche intellectuelle. Georges Kiejman, jeune avocat, assure sa défense. Mais très vite, leurs rapports se tendent. Goldman, insaisissable et provocateur, risque la peine capitale et rend l’issue du procès incertaine..', 'https://www.youtube.com/watch?v=lVU364k9eYU&pp=ygUSbGUgcHJvY8OocyBnb2xkbWFu', 'https://media.senscritique.com/media/000021600724/300/le_proces_goldman.png', 'Arieh Worthalter, Arthur Harari, Jeremy Lewin', 'Cédric Kahn'),
(4, 'Le Ravissement', '1 h 37 min', 2, 2023, 'Tous public', 'Comment la vie de Lydia, sage-femme très investie dans son travail, a-t-elle déraillé ? Est-ce sa rupture amoureuse, la grossesse de sa meilleure amie Salomé, ou la rencontre de Milos, un possible nouvel amour ? Lydia s’enferme dans une spirale de mensonges et leur vie à tous bascule...', 'https://www.youtube.com/watch?v=2SuwdIgYVqA&pp=ygUcbGUgcmF2aXNzZW1lbnQgYmFuZGUgYW5ub25jZQ%3D%3D', 'https://media.senscritique.com/media/000021642421/300/le_ravissement.png', 'Hafsia Herzi, Alexis Manenti, Nina Meurisse', 'Iris Kaltenbäck'),
(5, 'Le Consentement', '1 h 59 min', 2, 2023, 'Déconseillé aux moins de 12 ans', 'Paris, 1985. Vanessa a treize ans lorsqu\'elle rencontre Gabriel Matzneff, écrivain quinquagénaire de renom. La jeune adolescente devient l\'amante et la muse de cet homme célébré par le monde culturel et politique. Se perdant dans la relation, elle subit de plus en plus violemment l’emprise destructrice que ce prédateur exerce sur elle...', 'https://www.youtube.com/watch?v=4ZzGdajCqDQ', 'https://media.senscritique.com/media/000021606790/300/le_consentement.png', 'Jean-Paul Rouve, Kim Higelin, Laetitia Casta', 'Vanessa Filho'),
(6, 'L\'Exorciste - Dévotion', '2 h', 4, 2023, 'Interdiction au moins de 12 ans.', 'Depuis la mort de sa femme enceinte, Victor Fielding élève seul sa fille Angela. Mais lorsque l\'adolescente et son amie Katherine disparaissent dans les bois pour revenir trois jours plus tard sans aucun souvenir de ce qui leur est arrivé, se déclenche alors une chaîne d\'événements qui obligera Victor à affronter le mal et, dans sa terreur et son désespoir, à rechercher la seule personne vivante qui a déjà été témoin d\'un tel évènement : Chris MacNeil.', 'https://www.youtube.com/watch?v=WAXxFGfnfgY', 'https://media.senscritique.com/media/000021527375/150/l_exorciste_devotion.png', 'Leslie Odom Jr., Ellen Burstyn, Ann Dowd', 'David Gordon Green'),
(8, 'Les Gardiens de la galaxie Vol. 3', '2 h 30 min', 1, 2023, 'Déconseillé au moins de 12 ans', 'Notre bande de marginaux favorite a quelque peu changé. Peter Quill, qui pleure toujours la perte de Gamora, doit rassembler son équipe pour défendre l’univers et protéger l’un des siens. En cas d’échec, cette mission pourrait bien marquer la fin des Gardiens tels que nous les connaissons.', 'https://www.youtube.com/watch?v=0RsvBSFm938', 'https://media.senscritique.com/media/000021344712/0/les_gardiens_de_la_galaxie_vol_3.png', 'Chris Pratt,\r\nZoe Saldaña,\r\nDave Bautista,\r\nKaren Gillan,\r\nPom Klementieff,\r\nVin Diesel,\r\nBradley Cooper,\r\nChukwudi Iwuji,\r\nWill Poulter,\r\nElizabeth Debicki', 'James gunn'),
(9, 'Titanic', '3 h14 min', 2, 1997, 'Déconseillé au moins de 10 ans', 'Le 10 avril 1912, au port de Southampton en Angleterre, le Titanic, le plus grand paquebot du monde, réputé pour son insubmersibilité, appareille pour son premier voyage. Une traversée inaugurale de l\'Atlantique Nord avec pour destination New York. À son bord, Jack Dawson, un artiste sans le sous, fait la rencontre de Rose, passagère de première classe issue d\'une famille aristocrate de Philadelphie. Bien que venant d\'univers radicalement différents, ils finissent pas tomber amoureux. Quatre jours plus tard, le navire heurte un iceberg', 'https://www.youtube.com/watch?v=Quf4qIkD3KY', 'https://media.senscritique.com/media/000019629037/0/titanic.jpg', 'Leonardo DiCaprio,\r\nKate Winslet,\r\nBilly Zane,\r\nKathy Bates,\r\nFrances Fisher,\r\nGloria Stuart,\r\nBill Paxton,\r\nBernard Hill,\r\nDavid Warner,\r\nVictor Garber', 'James Cameron'),
(10, 'Forrest Gump', '2 h 22 min', 2, 1994, 'Déconseillé au moins de 13 ans', 'A Savannah, dans l\'Etat de Géorgie, Forrest Gump, assis sur un banc public, livre à qui veut l\'entendre, l\'étrange récit de sa vie mouvementée. Il naît dans un bourg de l\'Alabama, affecté d\'un quotient intellectuel inférieur à la moyenne et d\'une paralysie partielle des jambes. Souvent raillé à l\'école, le jeune Forrest se lie d\'amitié avec la belle Jenny. Ensemble, ils vont grandir dans l\'Amérique des années 1960.', 'https://www.youtube.com/watch?v=7pDDuroFBGM', 'https://media.senscritique.com/media/000020846881/0/forrest_gump.jpg', 'Tom Hanks,\r\nGary Sinise,\r\nRobin Wright,\r\nSally Field,\r\nMykelti Williamson,\r\nMichael Conner Humphreys,\r\nMargo Moorer,\r\nHaley Joel Osment,\r\nSam Anderson,\r\nHarold G. Herthum', 'Robert Zemeckis'),
(11, 'Avatar', '2 h 42 min', 1, 2009, 'Tous public', 'Jake Sully, ancien marine immobilisé dans un fauteuil roulant, est envoyé en mission sur la planète Pandora. Là, il doit participer à un programme d\'étude du peuple autochtone, les Na\'vi. L\'atmosphère de Pandora étant toxique, son esprit est projeté dans un hybride biologique commandé à distance: un avatar. On lui confie dès lors une mission d\'infiltration auprès des Na\'vi, devenu un obstacle auprès d\'un puissant groupe industriel exploitant un minerai rarissime. Son allégeance est cependant remise en question lorsque Neytiri, une très belle Na\'vi, sauve la vie de Jake...', 'https://www.youtube.com/watch?v=O1CzgULNRGs&t=3s', 'https://media.senscritique.com/media/000019629031/0/avatar.jpg', 'Sam Worthington,\r\nZoe Saldaña,\r\nSigourney Weaver,\r\nStephen Lang,\r\nMichelle Rodriguez,\r\nGiovanni Ribisi,\r\nCCH Pounder,\r\nWes Studi,\r\nLaz Alonso,\r\nDileep Rao', 'James Cameron'),
(12, 'M3GAN', '1 h 41 min', 4, 2023, 'Déconseillé au moins de 12 ans.', 'M3GAN est un miracle technologique, une cyber poupée dont l’intelligence artificielle est programmée pour être la compagne idéale des enfants et la plus sûre alliée des parents. Conçue par Gemma, la brillante roboticienne d’une entreprise de jouets, M3GAN peut écouter, observer et apprendre tout en étant à la fois l’amie et le professeur, la camarade de jeu et la protectrice de l’enfant à qui elle est liée. Quand Gemma devient tout à coup responsable de sa nièce de 8 ans, Cady, dont les parents sont soudainement décédés, elle n’est absolument pas prête à assumer son rôle. Débordée et sous pression au travail, elle décide de lier le prototype M3GAN encore en développement à la petite fille, dans une tentative désespérée de résoudre ses problèmes sur ces deux fronts. Une décision qui va entraîner d’épouvantables conséquences.', 'https://www.youtube.com/watch?v=Y3lhwLG0WYE', 'https://media.senscritique.com/media/000021053247/0/m3gan.jpg', 'Allison Williams,\r\nViolet McGraw,\r\nAmie Donald,\r\nJenna Davis,\r\nJen Van Epps,\r\nBrian Jordan Alvarez,\r\nJack Cassidy,\r\nRonny Chieng,\r\nLori Dungey,\r\nStephane Garneau-Monten', 'Gerard Johnstone'),
(13, 'Scream', '1 h 54 min', 4, 2022, 'Déconseillé au moins de 16 ans.', 'Vingt-cinq ans après que la paisible ville de Woodsboro a été frappée par une série de meurtres violents, un nouveau tueur revêt le masque de Ghostface et prend pour cible un groupe d\'adolescents. Il est déterminé à faire ressurgir les sombres secrets du passé.', 'https://www.youtube.com/watch?v=z_FVI4_L1gg', 'https://media.senscritique.com/media/000020364560/0/scream.png', 'Neve Campbell,\r\nCourteney Cox,\r\nDavid Arquette,\r\nMelissa Barrera,\r\nJack Quaid,\r\nMikey Madison,\r\nJenna Ortega,\r\nDylan Minnette,\r\nJasmin Savoy Brown,\r\nMason Gooding', 'Matt Bettinelli-Olpin, Tyler Gillett'),
(14, 'Ready Player One', '2 h 20 min', 1, 2018, 'Tous public', '2044. La Terre est à l’agonie. Comme la majeure partie de l’humanité, Wade, 17 ans, passe son temps dans l’OASIS – un univers virtuel où chacun peut vivre et être ce qui lui chante. Mais lorsque le fondateur de l’OASIS meurt sans héritier, une formidable chasse au trésor est lancée : celui qui découvrira les trois clefs cachées dans l’OASIS par son créateur remportera 250 milliards de dollars ! Multinationales et geeks s’affrontent alors dans une quête épique, dont l’avenir du monde est l’enjeu. Que le meilleur gagne…', 'https://www.youtube.com/watch?v=hWrH_44Fd9Q', 'https://media.senscritique.com/media/000021285046/0/ready_player_one.png', 'Tye Sheridan,\r\nOlivia Cooke,\r\nBen Mendelsohn,\r\nLena Waithe,\r\nMark Rylance,\r\nT. J. Miller,\r\nSimon Pegg,\r\nPhilip Zhao,\r\nWin Morisaki,\r\nHannah John-Kamen', 'Steven Spielberg'),
(15, 'Ça', '2 h 15 min', 4, 2017, 'Déconseillé au moins de 12 ans', 'Plusieurs disparitions d\'enfants sont signalées dans la petite ville de Derry, dans le Maine. Au même moment, une bande d\'adolescents doit affronter un clown maléfique et tueur, du nom de Grippe-sou, qui sévit depuis des siècles. Ils vont connaître leur plus grande terreur…', 'https://www.youtube.com/watch?v=Tw3yT-qAbvc', 'https://media.senscritique.com/media/000018424724/0/ca.png', 'Bill Skarsgård,\r\nJaeden Martell,\r\nFinn Wolfhard,\r\nWyatt Oleff,\r\nChosen Jacobs,\r\nJeremy Ray Taylor,\r\nSophia Lillis,\r\nJack Dylan Grazer,\r\nJavier Botet,\r\nNicholas Hamilton', 'Andy Muschietti '),
(16, 'Escape Game', '1 h 39 min', 4, 2019, 'Tous public', 'Six personnes n’ayant rien en commun se retrouvent enfermés dans un jeu et devront trouver les indices ou mourir.', 'https://www.youtube.com/watch?v=_Wzj2iNPy7s', 'https://media.senscritique.com/media/000018270775/0/escape_game.png', 'Taylor Russell,\r\nLogan Miller,\r\nDeborah Ann Woll,\r\nTyler Labine,\r\nJay Ellis,\r\nNik Dodani,\r\nYorick van Wageningen,\r\nJessica Sutton,\r\nAdam Robitel', 'Adam Robitel'),
(17, 'La soupe aux choux', '1h 38 min', 3, 1981, 'Tous public', 'Le Glaude et le Bombé, deux vieux paysans portés sur la bouteille, vivent très retirés de la vie moderne. Une nuit, un extra-terrestre atterrit en soucoupe volante dans le jardin du Glaude. En gage de bienvenue, ce dernier lui offre un peu de sa fameuse soupe aux choux...', 'https://www.youtube.com/watch?v=ivFoSrV_1Tg', 'https://media.senscritique.com/media/000010795955/0/la_soupe_aux_choux.jpg', 'Louis de Funès,\r\nJean Carmet,\r\nJacques Villeret,\r\nClaude Gensac,\r\nHenri Genès,\r\nMarco Perrin,\r\nChristine Dejoux,\r\nGaëlle Legrand,\r\nCatherine Ohotnikoff,\r\nPhilippe Ruggieri', 'Jean Girault'),
(18, 'Le dîner de cons', '1 h 20 min', 3, 1998, 'Tous public', 'Le passe-temps préféré d\'une bande d\'amis, satisfaits d\'eux-mêmes, consiste à se retrouver pour un dîner hebdomadaire où chacun doit amener avec lui un simple d\'esprit, dont la stupidité enchantera tout le monde. Pierre Brochant, éditeur en vogue, pense avoir trouvé l\'oiseau rare en la personne de François Pignon, comptable au ministère des Finances. Mais les choses ne tournent pas comme prévu.', 'https://www.youtube.com/watch?v=wx0mwd9l93Q', 'https://media.senscritique.com/media/000020558631/0/le_diner_de_cons.jpg', 'Thierry Lhermitte,\r\nJacques Villeret,\r\nFrancis Huster,\r\nDaniel Prévost,\r\nAlexandra Vandernoot,\r\nCatherine Frot,\r\nBenoît Bellal,\r\nJacques Bleu,\r\nPhilippe Brigaud,\r\nMichel Caccia', 'Francis Veber'),
(19, 'Astérix & Obélix - Mission Cléopâtre', '1 h 47 min', 3, 2002, 'Tous public', 'A Alexandrie, en 52 av. J.-C., Cléopâtre, désireuse de prouver la supériorité du peuple égyptien, relève le défi lancé par l\'Empereur romain Jules César : construire un palais en trois mois ! Pour ce faire, Cléopâtre fait appel à l\'architecte Numérobis. S\'il réussit, elle le couvrira d\'or. S\'il échoue, elle le jettera aux crocodiles. Celui-ci, conscient du défi à relever, cherche de l\'aide auprès de son vieil ami Panoramix. Le druide fait le voyage en Égypte avec Astérix et Obélix. De son côté, Amonbofis, l\'architecte officiel de Cléopâtre, jaloux que la reine ait choisi Numérobis pour construire le palais, va tout mettre en œuvre pour faire échouer son concurrent', 'https://www.youtube.com/watch?v=7Nd1ZCwB5PI', 'https://media.senscritique.com/media/000006204256/0/asterix_obelix_mission_cleopatre.jpg', 'Gérard Depardieu,\r\nChristian Clavier,\r\nJamel Debbouze,\r\nMonica Bellucci,\r\nAlain Chabat,\r\nClaude Rich,\r\nGérard Darmon,\r\nÉdouard Baer,\r\nDieudonné,\r\nBernard Farcy', 'Alain Chabat'),
(21, 'Bienvenue chez les Ch\'tis', '1 h 46 min', 3, 2008, 'Tous public', 'Habitué au climat du sud de la France, Philippe est muté à Bergues, petite ville du nord de la France. Commence alors son acclimatation chez les Ch\'tis.', 'https://www.youtube.com/watch?v=OycTfchnopU', 'https://media.senscritique.com/media/000004683476/0/bienvenue_chez_les_ch_tis.jpg', 'Kad Merad,\r\nDany Boon,\r\nZoé Félix,\r\nLorenzo Ausilia-Foret,\r\nAnne Marivin,\r\nPhilippe Duquesne,\r\nGuy Lecluyse,\r\nLine Renaud,\r\nMichel Galabru,\r\nStéphane Freiss', 'Dany Boon'),
(22, 'American Carnage', '1 h 38 min', 3, 2022, 'Déconseillé au moins de 12 ans.', 'Après la déclaration d\'un décret d\'un gouverneur visant à arrêter les enfants d\'immigrants sans papiers, les nouveaux détenus se voient offrir la possibilité de faire annuler les charges qui pèsent sur eux en se portant volontaires pour s\'occuper des personnes âgées.', 'https://www.youtube.com/watch?v=3B0Me5bIwos', 'https://media.senscritique.com/media/000020722234/0/american_carnage.jpg', 'Jenna Ortega\r\nJorge Lendeborg Jr.\r\nAllen Maldonado\r\nEric Dane,\r\nBrett Cullen,\r\nJorge Diaz,\r\nMichael Batista,\r\nPaloma Bloyd,\r\nTiffany Brown,\r\nGigi Burgdorf', 'Diego Hallivis');

-- --------------------------------------------------------

--
-- Structure de la table `film_favori`
--

DROP TABLE IF EXISTS `film_favori`;
CREATE TABLE IF NOT EXISTS `film_favori` (
  `id_favoris` int NOT NULL AUTO_INCREMENT,
  `id_films` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_favoris`),
  KEY `id_films` (`id_films`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film_favori`
--

INSERT INTO `film_favori` (`id_favoris`, `id_films`, `id_user`) VALUES
(2, 5, 1),
(3, 4, 1),
(13, 9, 2),
(14, 8, 2),
(15, 10, 2),
(16, 11, 2),
(17, 2, 2),
(18, 1, 2),
(19, 14, 2),
(20, 18, 2),
(21, 17, 2),
(22, 19, 2),
(23, 21, 2);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id_notes` int NOT NULL AUTO_INCREMENT,
  `id_films` int NOT NULL,
  `id_user` int NOT NULL,
  `note` int NOT NULL,
  PRIMARY KEY (`id_notes`),
  KEY `id_films` (`id_films`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `realisateurs`
--

DROP TABLE IF EXISTS `realisateurs`;
CREATE TABLE IF NOT EXISTS `realisateurs` (
  `id_realisateurs` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_realisateurs`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `realisateurs`
--

INSERT INTO `realisateurs` (`id_realisateurs`, `nom`, `prenom`) VALUES
(1, 'Cailley', ' Thomas '),
(2, 'Edwards', 'Gareth '),
(3, 'Kahn', 'Cédric '),
(4, 'Kaltenback ', 'Iris '),
(5, 'Filho', 'Vanessa'),
(6, 'Anderson', 'Wes '),
(7, 'Diego Hallivis', ''),
(8, 'David Gordon Green', '');

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

DROP TABLE IF EXISTS `themes`;
CREATE TABLE IF NOT EXISTS `themes` (
  `id_themes` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_themes`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id_themes`, `nom`) VALUES
(1, ' Science-fiction'),
(2, 'Drame'),
(3, 'Comédie'),
(4, 'Horreur'),
(5, 'Science-fiction'),
(6, 'a');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(500) NOT NULL,
  `age` int NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `pwd`, `age`, `role`) VALUES
(1, 'jenhael', 'jenhael.grenon@viacesi.fr', '$2y$10$Sonst28FOeUOxH2rYVE7oePVxAu6eFIxNKlD4.h4kn7egvZ8R1.Zy', 23, 'admin'),


-- --------------------------------------------------------

--
-- Structure de la table `watchlist`
--

DROP TABLE IF EXISTS `watchlist`;
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id_watchlist` int NOT NULL AUTO_INCREMENT,
  `id_films` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_watchlist`),
  KEY `id_films` (`id_films`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `watchlist`
--

INSERT INTO `watchlist` (`id_watchlist`, `id_films`, `id_user`) VALUES
(1, 5, 1),
(8, 5, 2),
(9, 6, 2),
(11, 3, 2),
(12, 4, 2),
(13, 2, 2),
(14, 13, 2),
(15, 12, 2),
(16, 15, 2),
(17, 16, 2),
(18, 22, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`id_themes`) REFERENCES `themes` (`id_themes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `film_favori`
--
ALTER TABLE `film_favori`
  ADD CONSTRAINT `film_favori_ibfk_1` FOREIGN KEY (`id_films`) REFERENCES `films` (`id_films`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_favori_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`id_films`) REFERENCES `films` (`id_films`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`id_films`) REFERENCES `films` (`id_films`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
