-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 21 fév. 2024 à 06:48
-- Version du serveur : 5.7.23-23
-- Version de PHP : 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cecosdaf_radioscommunautaires`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `soustitre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `auteur` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contributions`
--

CREATE TABLE `contributions` (
  `id` int(11) NOT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `contributeur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `contributions` longtext COLLATE utf8_unicode_ci NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `visuel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `contributions`
--

INSERT INTO `contributions` (`id`, `theme_id`, `contributeur`, `date`, `contributions`, `enable`, `visuel`) VALUES
(1, 1, 'Evambe', '2023-09-17', 'My name is Evambe Thompson, community radio animator working with the Bonakanda Rural Radio. One of the many ways in which I fight against fake news it through the use of radio productions like spots and micro programs through which I inform audience on how to use or share information both online and offline. Through the productions, I advise listeners to verify, confirm and think before they click or whisper any information to a third party.\n\nFurthermore, partnering with #defyhatenow# has empowered my counter fake news initiative following the use of the developed field guides.\n\nConsidering the fact that I work in one of the most prioritized media (proximity radio), I take the challenge to denounce every false news of information by consulting the relevant institutions or organizations that are directly related to the subject in question.\n\nIn addition, I share my knowledge with community members on how fake news can influence behaviors. During training sessions that are been organized by local organizations, I seize the opportunity pass information on how to stop or fight against fake news.', 0, NULL),
(2, 2, 'Evambe', '2023-09-17', 'Fake news in my local language (Mokpé) is called; Nganelì', 0, NULL),
(3, 1, 'RCN', '2023-09-19', 'Les Fake news posent 1 problème majeur dans ma communauté. Comme expérience dans la lutte contre les Fake news je peux parlé de La descente sur le terrain , la vérification de l\' information,( poser des questions, \nenquête ) investigation  , l\' interview de plusieurs personnes sur le fait vécu ou entendu .Recoupage de l\'information recueillie .  Sensibilisation sur les risques de Fake news ! ', 0, NULL),
(4, 2, 'RCN', '2023-09-19', 'Les Fakes se traduisent dans notre langue locale par les mots \"buzz \", \" \"Mbe\'e\" et \" Ntan \" \" Fouop \" en langue Bamoun ...', 0, NULL),
(5, 1, 'Princia', '2023-09-20', 'Princia Florence Yalla                                           Bangui, 20 Septembre 2023Journaliste à Radio la voix des citoyens (RAVOCI) et journaliste Fact-checkerÀ Centrafrique CheckTel et WhatsApp : +23672476132Mail : princiaflorenceyalla@gmail.comTHEMATIQUE I : Partagez votre expérience de journaliste communautaire dans la lutte contre les fake newsD’une manière générale, ce que je peux partager comme expérience en tant que journaliste communautaire dans la lutte contre les fake news est que :De 2013 à 2019, la République Centrafricaine faisait face à un flux de diffusion des fausses informations. Cela a été accentué par l’avènement de la covid-19. C’est ainsi que l’ONG Internews Centrafrique a lancé une formation à l’endroit des journalistes des radios communautaires de provinces et celles de Bangui pour une riposte. En 2021, j’ai été contacté par l’ONG Internews Centrafrique pour participer à cette formation des journalistes communautaires sur la lutte contre la désinformation et les rumeurs.Faisant partie des 8 journalistes à Radio Siriri de Bouar (l’une des préfectures situées à l’Ouest de la République Centrafricaine), j’ai été sélectionné pour représenter cette radio à ce rendez-vous du donner et recevoir.Il est demandé à ce que les formateurs choisissent 6 participants parmi les 14 à poursuivre leur stage de perfectionnement pour 6 mois au sein de l’ONG Internews. Mes talents ont été révélés à tel point que ma candidature a été retenu parmi les 6 lauréats. Pendant le stage, nous rédigeons des articles de vérifications sur tous les sujets qui touchent la santé, la politique, l’économie, la société, sans oublier les rumeurs de bouches à oreilles. Dans notre communauté en RCA, les fausses informations et les rumeurs de bouches à oreilles circulent plus vite que les vraies informations. Sans une vérification préalable, la population croit souvent à ces informations. Ce qui crée de fois des tensions et déchire la cohésion sociale entre les chrétiens et musulmans. Notons aussi que certaines fausses informations sont diffusées par certains médias de la place, par la course au scoop ; ceux-ci ne se donnent pas le temps de vérifier les informations auprès des sources fiables. Et c’est dans cet optique que l’ONG internews a jugé mieux de former 14 journalistes communautaires de Bangui et des provinces. A la fin de la formation nous avons intégré l’Association des Fact-Checkers de Centrafrique devenue Centrafrique Check, une organisation dans laquelle je travaille jusqu’à présent. Nos articles sont diffusés sur les réseaux sociaux et les versions audio sont diffusées sur les ondes des radios communautaires partenaires comme : Radio Siriri de Bouar, Radio la voix de la Ouaka de Bambari, Radio communautaire Séwa de Bangui, Radio la voix des Citoyens RAVOCI, Radio la voix des aigles et aussi sur Radio Centrafrique lors des émissions de la synergie des radios pour la lutte contre la Covid-19. Une initiative de l’ONG Internews. J’ai rédigé plusieurs articles de vérifications des faits. Celui qui suit est un exemple : Bangui ,12 février 2022#Centrafrique (AFC) : Faux, l’utilisation du masque bleu pour se protéger du covid 19 n’est pas dangereuse pour la santéUne vidéo nous montre que le cache nez bleu contient un produit toxique qui provoque des maladies dans certains organes du corps des utilisateurs ? Attention, cette information n’est ni reconnues, ni acceptées par des spécialistes de la santé.Depuis ces derniers temps une vidéo circule et prend de l’ampleur sur les réseaux sociaux monter par un docteur Béninois ANAYON Brissot alertant les utilisateurs du masque bleu de ne plus continuer à les porter parce ça joue sur leur santé.  Comme l’explique dans cette vidéo : « je lance une alerte ! L’alerte concernant la bavette bleue. J’ai reçu d’énormes patients ces derniers jours qui ont des douleurs à la poitrine des irritations des voies pulmonaires suite à l’utilisation excessive des bavettes bleues. Dans cette bavette bleue se trouve de folmadeïde et du toluène et que la prochaine crise après la crise de la covid 19 dans les années à venir pour ceux qui continuent d’utiliser cette bavette bleue c’est la crise du cancer de la gorge, la tumeur de cerveau et si vous sentez déjà des irritations, céphalée, vertige après avoir utilisé ses bavettes mes chers amis je vous recommande une solution comme le miel pur qui contient le zinc et du sélénium. Je vous conseille vivement d’utiliser la bavette en coton ou en soi ».La rédaction de l’Association des Fact-checkers de Centrafrique à vérifier et a trouvé que l’information de cette vidéo est fausse.Une information totalement rejetée par   l’organisation mondiale de la santé (OMS) et le ministère de la santéDans le cadre de la vérification des faits, AFC a accordé une interview au conseillé en promotion de la santé de l’OMS DIBERT Augustin il dément ces allégations en disant :‘’ J’affirme que nulle part dans la littérature de l’OMS il n’a été  dit que le port du masque bleu  apportait d’autres problèmes de santé complémentaire, mais au contraire il est conseillé de porter les masques pour se protéger des maladies respiratoire y comprit d’autres maladies et la covid19 .Et j’ajoute que je reçois tous les jours des mise à jours de l’OMS concernant les masques , je n’ai vu nulle part des questions qui ont été posées et répondues lier à des maladies qui surviendraient éventuellement après le port des masques  ’’Dr OUARANDJI Louis Médard au ministère de la santé publique et de la population de son côté dit :‘’C’est pour la première fois que j’attends çà parce que depuis qu’on a reçu et commencé à porter les masques surtout celle de la couleur bleue on a jamais reçu des patients victimes qui se sont plaints de l’utilisation du masque bleu ou autre couleur, cette information n’est pas vraie et surtout faites très attention à tous ce que vous lisez et regardez sur les réseaux sociaux fomenter autour du covid19 par des soit disant experts ou spécialistes\"\" Je conseille tout le monde de rester du côté de la science parce qu’on ne peut pas combattre une maladie en se fondant sur des rumeurs \" a conclu Mr DIBERT Augustin de l’OMS   Princia Florence YALLA /Rédaction Fact-checking de l’AFC  Des informations et des images vous paraissent douteuses ? Contacter notre rédaction au 00236 74 02 15 70/ 75 81 61 38/ 75 38 11 73, ou écrivez-nous sur le mail factcheckingefc@gmail.comPendant la pandémie de Covid-19 nous avons vérifié plusieurs fausses informations et rumeurs de bouche à oreille en nous rapprochant des sources fiables comme l’Organisation Mondiale de la Santé (OMS), le Ministère de la santé plus précisément le comité de lutte contre le Covid-19 et des recherches approfondies sur des sites de la santé certifiée.Disposant d’une compétence préalable en vérification des faits avec 2 années d’expérience, je compte partager mes acquis et approfondir mes compétences dans ce domaine qui me passionne autant.', 0, NULL),
(8, 1, 'anon.', '2023-09-20', '', 0, NULL),
(9, 2, 'Fabrice Beloko', '2023-09-21', 'Les fakes news se manifestent généralement dans le Septentrion (Adamaoua) du Cameroun par les superstitions. Les cas les plus récurrents sont énumérés dans le secteur sanitaire. Ici, le poids de la tradition et certaines rumeurs pèsent sur les déroulement des campagnes de vaccination organisées par le gouvernement.', 0, NULL),
(10, 1, 'anon.', '2023-09-21', 'Pour briser le plafond de verre, des émissions spéciales sont produites par la radio. Dans ces productions, la parole est donnée aux leaders religieux et traditionnels qui s\'expriment en plusieurs langues locales (Dii, Gbaya, Fulfulde, Mboum, Haoussa), pour convaincre les communautés. Une recette qui a fait ses preuves pendant les campagnes nationales  et régionales contre la polio, la rougeole et rubéole ainsi que la lutte contre la propagation de pandémie à Coronavirus au sein de la communauté.\n', 0, NULL),
(11, 1, '7528', '2023-10-10', 'Bonjour, \n Je suis Thibaut Ribar , membre du Réseau des Médias Communautaires de Centrafrique RMCC. Je travaille à Radio Notre-dame Centrafrique,  station confessionnelle d\'origine catholique.  Grâce au Réseau des Médias Communautaires,  j\'ai bénéficié de plusieurs formations notamment dans le cadre du projet desinfox Afrique Centrafrique organisé par CFI.  C\'est ce qui m\'a permis de participer à la conférence de désinformation tenue à Yaoundé. Aussi , je me suis outillé de la prise en main, à la suite de laquelle je produits aujourd\'hui un magazine consacré  à la désinformation. ', 0, NULL),
(12, 1, 'anon.', '2023-10-10', '', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Donateurs`
--

CREATE TABLE `Donateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `montant` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lieu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `image`, `titre`, `details`, `lieu`, `etat`, `datedebut`, `datefin`) VALUES
(1, NULL, 'Formations des journalistes des radios communautaires sur les techniques de verifications des faits', 'Formations de 30 journalistes des radios communautaires de la sous region Afrique centrale - 10 journalistes pour la RCA, 10 journalistes pour le Cameroun, 10 Journalistes pour le TCHAD - sur les techniques de verifications des faits et de la protection de leur audience contre les effets de la desinformation', 'Semi presentiel (TCHAD, RCA, Cameroun)', 0, '2023-09-26', '2023-09-27');

-- --------------------------------------------------------

--
-- Structure de la table `Formations`
--

CREATE TABLE `Formations` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `objectifs` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `duree` int(11) NOT NULL,
  `modaliteparticipation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombreplace` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lieu` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Formations`
--

INSERT INTO `Formations` (`id`, `libelle`, `objectifs`, `duree`, `modaliteparticipation`, `type`, `nombreplace`, `lieu`) VALUES
(1, 'Verifications des faits', 'Apprendre les techniques de fact checking', 2, 'Etre journaliste communataire', 'Semi presentielle', '30', 'RCA - CAMEROUN - TCHAD');

-- --------------------------------------------------------

--
-- Structure de la table `Journalistes`
--

CREATE TABLE `Journalistes` (
  `id` int(11) NOT NULL,
  `radio_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `langues` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cni` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recommandations` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Journalistes`
--

INSERT INTO `Journalistes` (`id`, `radio_id`, `programme_id`, `nom`, `email`, `phone`, `ville`, `pays`, `langues`, `cni`, `recommandations`) VALUES
(1, 14, NULL, 'BELOKO Fabrice', 'fabricebeloko1806@gmail.com', '678382274', 'Yaounde', 'Cameroun', NULL, NULL, NULL),
(2, 37, NULL, 'TOKO ROBERT', 'rober.toko@yahoo.fr', '675796604', 'Yaounde', 'Cameroun', NULL, NULL, NULL),
(3, 15, NULL, 'SOBGOUM MITCHELL', 'yaneyajose@yahoo.fr', '696958827', 'OUEST', 'Cameroun', 'Yemba', NULL, NULL),
(5, 16, NULL, 'YANEYA JOSE', 'yaneyajose@yahoo.fr', '672517090', 'west', 'Cameroun', NULL, NULL, NULL),
(6, 17, NULL, 'Irene MBAZOA', 'radiofemmes@yahoo.fr', '677699324', 'Mbalmayo-Centre', 'Cameroun', NULL, NULL, NULL),
(7, 18, NULL, 'KWI BANGSI', 'kwibangsi@yahoo.co.uk', '675581004', 'Limbe', 'Cameroun', NULL, NULL, NULL),
(8, 19, NULL, 'Farshid Olivier Medjo', 'princearabica@yahoo.fr', '691997298', 'Ebolowa', 'Cameroun', NULL, NULL, NULL),
(9, 20, NULL, 'BOUNGA GISCARD', 'giscardbounga@yahoo.fr', '677830490', 'Bertoua', 'Cameroun', NULL, NULL, NULL),
(11, 21, NULL, 'EPANGUE Serge', 'radiobare@yahoo.fr', '699 697 903', 'NKOMSAMBA', 'Cameroun', NULL, NULL, NULL),
(12, 22, NULL, 'EVAMBE THOMPSON ATRA', 'thompsonatra@yahoo.com', '679670064', 'BUEA', 'Cameroun', NULL, NULL, NULL),
(13, 4, NULL, 'Félicienne Kengni Kamgang', '(+237)693562863', '(+237)693562863', 'West Region', 'Cameroun', NULL, NULL, NULL),
(14, 24, NULL, 'George NDJI', 'georgesndji2@gmail.com', '(+237)698247213', 'Yaoundé', 'Cameroun', NULL, NULL, NULL),
(15, 12, NULL, 'Anne Marie Chintouo', 'annemariechintouo22@gmail.com', '(+237)696158392', 'West région', 'Cameroun', NULL, NULL, NULL),
(16, 24, NULL, 'Nadege Tatfo', 'tatfonadege@gmail.com', '(+237) 698670159‎‎', 'Yaoundé', 'Cameroun', NULL, NULL, NULL),
(17, 26, NULL, 'Felix Menaî', 'Felixmenai4@gmail.com', '(+237)672236612', 'North West Region', 'Cameroun', NULL, NULL, NULL),
(18, 27, NULL, 'Lionel Félix Mvenang', 'lionelfelixmvenang@gmail.com', '(+237)695977627', 'centre region', 'Cameroun', NULL, NULL, NULL),
(19, 28, NULL, 'Josiane MIRVOLA', 'mirvolanathasa@gmail.com', '(+236)70 50 70 82', 'Bangui', 'RCA', NULL, NULL, NULL),
(20, 29, NULL, 'Martinien WODE', 'martinienwode@gmail.com', '(+236)75 15 87 02', 'Bangui', 'RCA', NULL, NULL, NULL),
(21, 28, NULL, 'Josianne Mirevola', 'mirvolanathasa@gmail.com', '670 507 082', 'Bangui', 'RCA', NULL, NULL, NULL),
(22, 28, NULL, 'Magalie BINGUINABA', 'magaliemerylbinguinaba@gmail.com', '(+236)70 94 13 74', 'Bangui', 'RCA', NULL, NULL, NULL),
(23, 9, NULL, 'Tibaut RIBAR', 'ribarthibaut@gmail.com', '(+236)72 28 88 00', 'Bangui', 'RCA', NULL, NULL, NULL),
(24, 11, NULL, 'Sabrina NAÏLO', 'nailosabrina20@gmail.com', '(+236)72 35 57 25', 'Bangui', 'RCA', NULL, NULL, NULL),
(26, 30, NULL, 'Novalis Clotaire MAPOUKA', 'mcn.novalis@gmail.com', '(+236)72 13 40 99', 'Bangui', 'RCA', NULL, NULL, NULL),
(27, 10, NULL, 'Pépin Fred Darem', 'daremppinfred@gmail.com', '72799395', 'Bangui', 'RCA', NULL, NULL, NULL),
(28, 8, NULL, 'Abdan Yondo', 'abdanyondo01@gmail.com', '72011114', 'Bangui', 'RCA', NULL, NULL, NULL),
(29, 28, NULL, 'Edgard Marius Piozza', 'edgarpiozza@gmail.com', '72010646', 'Bangui', 'RCA', NULL, NULL, NULL),
(30, 6, NULL, 'Djouwaikina  Djimtabé', 'djimtabedjouwaikina@gmail.com', '23566158757', 'N’Djamena', 'TCHAD', NULL, NULL, NULL),
(31, 6, NULL, 'Moné Laoutaye Marie-Rose', 'marierosemonelaotaye@gmail.com', '23566319709', 'N’Djamena', 'TCHAD', NULL, NULL, NULL),
(32, 33, NULL, 'Djenade Roger', 'Djenade14@gmail.com', '0,999664423', 'N’Djamena', 'TCHAD', NULL, NULL, NULL),
(33, 33, NULL, 'Daba Providence', 'Providencegabdibe85@gmail.com', '23562722519', 'N’Djamena', 'TCHAD', NULL, NULL, NULL),
(34, 34, NULL, 'Abakar Idriss Hassan', 'abihassane@gmail.com', '23566233574', 'N’Djamena', 'TCHAD', NULL, NULL, NULL),
(35, 34, NULL, 'Brahim Tom', 'habibrahimsaga@gmail.com', '23566336140', 'N’Djamena', 'TCHAD', NULL, NULL, NULL),
(36, 35, NULL, 'Vangtou Abdoulaye', 'abdoulayevangtou@gmail.com', '23566454049', 'N’Djamena', 'TCHAD', NULL, NULL, NULL),
(37, 35, NULL, 'Ménodji Christelle Namia', 'namiachristelle@gmail.com', '23565462092', 'N’Djamena', 'TCHAD', NULL, NULL, NULL),
(38, 36, NULL, 'Narbeye Halimé (f)', 'narbayehali@gmail.com', '23566097194', 'N’Djamena', 'TCHAD', NULL, NULL, NULL),
(39, 36, NULL, 'Oiyo-Allah Dingaoremte', 'd.oiyoallah@gmail.com', '23566325931', 'N’Djamena', 'TCHAD', NULL, NULL, NULL),
(40, 15, NULL, 'DOUNTIO MBOGNI FRANK STEVE', 'stevembogni@yahoo.fr', '674997844/699101377', 'Dschang', 'Cameroun', 'Français', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mails`
--

CREATE TABLE `mails` (
  `id` int(11) NOT NULL,
  `destinataire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepublication` date DEFAULT NULL,
  `contenu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `mails`
--

INSERT INTO `mails` (`id`, `destinataire`, `object`, `datepublication`, `contenu`) VALUES
(1, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(2, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(3, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(4, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(5, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(6, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(7, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(8, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(9, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(10, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(11, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(12, 'mengnherubiel@gmail.com', NULL, '2023-05-31', NULL),
(13, 'mengnherubiel@gmail.com', NULL, '2023-06-15', NULL),
(14, 'felixmenai4@gmail.com', NULL, '2023-08-24', NULL),
(15, 'mengnherubiel@gmail.com', NULL, '2023-09-02', NULL),
(16, 'mengnherubiel@gmail.com', NULL, '2023-09-02', NULL),
(17, 'mengnherubiel@gmail.com', NULL, '2023-09-02', NULL),
(18, 'mengnherubiel@gmail.com', NULL, '2023-09-02', NULL),
(19, 'mengnherubiel@gmail.com', NULL, '2023-09-02', NULL),
(20, 'mengnherubiel@gmail.com', NULL, '2023-09-15', NULL),
(21, 'mengnherubiel@gmail.com', NULL, '2023-09-15', NULL),
(22, 'martinienwode@gmail.com', NULL, '2023-09-19', NULL),
(23, 'daremppinfred@gmail.com', NULL, '2023-09-26', NULL),
(24, 'daremppinfred@gmail.com', NULL, '2023-09-26', NULL),
(25, 'daremppinfred@gmail.com', NULL, '2023-09-26', NULL),
(26, 'ribarthibaut@gmail.com', NULL, '2023-09-26', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL,
  `heures` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emission` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Radios`
--

CREATE TABLE `Radios` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frequence` double DEFAULT NULL,
  `pays` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `village` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `langues` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horaires` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `visuel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Radios`
--

INSERT INTO `Radios` (`id`, `nom`, `frequence`, `pays`, `village`, `langues`, `horaires`, `description`, `visuel`) VALUES
(2, 'Radio life alt FM', 89, 'République Centrafricaine', 'Samba 15 km de Bangui route de mbaïki', 'Français', '08h00-18h00', 'Membre du réseau des radios communautaires de Centrafrique.', 'radioaltfm-644bc91776065.jpeg'),
(3, 'Bonakanda Rural Radio', 92.1, 'Cameroun', 'Bonakanda', 'Anglais', '05h00-20h00', 'the radio is located in Bonakanda - Buea, SWR', 'brrfm-644bcb30dbc4f.jpeg'),
(4, 'Radio Rurale de Fotouni', 94, 'Cameroun', 'Foutouni', 'Français', '08h00-18h00', 'Radio Fotouni est situé à Ouest dans le Haut_Kam , dans l\'arrondissement de Bandja et dans le groupe', 'radioruraldefoutouni-644bcdb37ff7f.jpeg'),
(5, 'Babungo Community Radio (BCR)', 98, 'Cameroun', 'Babungo', 'Anglais', '08h00-18h00', 'Situated in Finteng quarter in the Babungo village, Ngoketunjia Division of  Cameroons Northwest Reg', 'babungocommunityradio-644bcfd9e4dda.jpeg'),
(6, 'La radio Mandela FM', 102, 'TCHAD', 'commune du 1er arrondissement', 'Français', '08h00-18h00', 'une radio communale située au sein de la commune du 1er arrondissement de la ville Ndjamena', 'laradiomandela-644bd0d4d757a.jpeg'),
(7, 'Radio FM LIBERTE', 105, 'TCHAD', 'l\'avenue Pascal Yoadoumnadji dans le 7è arrondissement', 'Français', '08h00-18h00', 'Une radio qui oeuvre pour la promotion des libertés fondamentales au Tchad ( créée pas les associati', 'radiofmliberte-644bf0f46001a.jpeg'),
(8, 'Radio Maria Centrafrique', 91, 'République Centrafricaine', 'Bimbo', 'Français', '08h00-18h00', 'Premier signal sonore le 22 novembre 2015 a Bangui. Située à Bimbo à la rue du Grand séminaire Saint', 'radiomariacentrafrique-64512fc60b0b6.jpeg'),
(9, 'Radio Notre-dame Centrafrique', 103, 'République Centrafricaine', 'Centre ville Avenue', 'Français', '08h00-18h00', 'station radiophonique privée à caractère purement religieux et d\'origine catholique. Situé au centre', 'radionotredamecentrafrique-645130750e074.jpeg'),
(10, 'Radio la voix du citoyen ( RAVOCI)', 103, 'République Centrafricaine', '5e arrondissement de la ville de Bangui.', 'Français', '08h00-18h00', '102.9', 'radiolavoixducitoyen-64513139eefda.jpeg'),
(11, 'Radio Lengo Sengo FM', 99, 'République Centrafricaine', 'Bangui, et dans le 1er arrondissement', 'Anglais', '08h00-18h00', 'Située à Bangui, et dans le 1er arrondissement', 'radiolengosongo-6453ed697014b.jpeg'),
(12, 'La radio communautaire du Noun-Foumban', 104, 'Cameroun', 'Foumban', 'Français, Bamoun', '08h00-18h00', 'lancée le 15/08/2002 par l\'UNESCO est située à l\'avenue principale de la ville de Foumban, ouest Cam', 'rcn-64625b05adbd0.jpeg'),
(13, 'RADIO LA VOIX DE LA DIVERSITE', NULL, 'Cameroun', 'Melong', NULL, NULL, 'BP 03 MELONG', NULL),
(14, 'RADIO TIKIRI', NULL, 'CAMEROUN', NULL, NULL, NULL, 'ADAMAOUA', NULL),
(15, 'RADIO YEMBA', NULL, 'CAMEROUN', 'L\'OUEST', 'YEMBA', NULL, 'WEST', NULL),
(16, 'RADIO NOUN', NULL, 'CAMEROUN', NULL, NULL, NULL, 'west', NULL),
(17, 'RADIO FEMMES DE BALMAYO', NULL, 'CAMEROUN', 'MBALMAYO-CENTRE', NULL, NULL, 'Mbalmayo-Centre', NULL),
(18, 'OCEAN CITY RADIO', NULL, 'CAMEROUN', NULL, NULL, NULL, 'Limbe', NULL),
(19, 'RADIO COMMUNAUTAIRE DE LA MVILLA', NULL, 'CAMEROUN', NULL, NULL, NULL, 'Ebolowa', NULL),
(20, 'RADIO AURORE', NULL, NULL, NULL, NULL, NULL, 'Bertoua', NULL),
(21, 'RADIO BARE BAKEM', NULL, 'CAMEROUN', NULL, NULL, NULL, 'NKOMSAMBA', NULL),
(22, 'RADIO BONAKANDA', NULL, 'CAMEROUN', NULL, NULL, NULL, 'BUEA', NULL),
(23, 'Radio Foutouni', NULL, 'CAMEROUN', NULL, NULL, NULL, 'West Region', NULL),
(24, 'Chroniqueur CRTV', NULL, 'CAMEROUN', NULL, NULL, NULL, 'Yaoundé', NULL),
(25, 'Radio communautaire', NULL, 'CAMEROUN', NULL, NULL, NULL, 'West région', NULL),
(26, 'Radio Babungo', NULL, 'CAMEROUN', NULL, NULL, NULL, 'North West Region', NULL),
(27, 'Radio la canne à mbandjock', NULL, 'CAMEROUN', NULL, NULL, NULL, 'centre region', NULL),
(28, 'RMCC', NULL, 'REPUBLIQUE CENTRAFRICAINE', NULL, NULL, NULL, 'Bangui', NULL),
(29, 'Radio SEWA', NULL, 'REPUBLIQUE CENTRAFRICAINE', NULL, NULL, NULL, 'Bangui', NULL),
(30, 'Voix des miracles', NULL, 'CAMEROUN', NULL, NULL, NULL, 'Bangui', NULL),
(31, 'RAVOCI', NULL, 'REPUBLIQUE CENTRAFRICAINE', NULL, NULL, NULL, 'Bangui', NULL),
(32, 'Maria', NULL, 'REPUBLIQUE CENTRAFRICAINE', NULL, NULL, NULL, 'Bangui', NULL),
(33, 'Radio Oxygene', NULL, 'TCHAD', NULL, NULL, NULL, 'N’Djamena', NULL),
(34, 'Radio Alquoran', NULL, 'TCHAD', NULL, NULL, NULL, 'N’Djamena', NULL),
(35, 'Radio  Arc en ciel', NULL, 'TCHAD', NULL, NULL, NULL, 'N’Djamena', NULL),
(36, 'Radio FM Liberté', NULL, 'TCHAD', NULL, NULL, NULL, 'N’Djamena', NULL),
(37, 'RADIO MEIGANGA', NULL, 'Cameroun', 'MEIGANGA', NULL, NULL, 'MEIGANGA', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `thematiques`
--

CREATE TABLE `thematiques` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datepublication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `thematiques`
--

INSERT INTO `thematiques` (`id`, `titre`, `delais`, `datepublication`) VALUES
(1, 'Partagez votre expérience de journaliste communautaire dans la lutte contre les fake news', '10 jours', '2023-08-31'),
(2, 'Comment les fakes news se traduisent dans votre langue locale', '10 jours', '2023-09-07');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'steve', 'steve', 'mengnherubiel@gmail.com', 'mengnherubiel@gmail.com', 1, NULL, '$2y$13$iyutjIEW9jNnOq3K8PVcDuR7R9EvuxcbKbeao8/0V9AECRE.7wC9.', '2024-01-30 11:33:01', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(2, 'rubiel', 'rubiel', 'performance.cecosda@gmail.com', 'performance.cecosda@gmail.com', 1, NULL, '$2y$13$wB6uWo3jWihyjfsLTf8dUeyIZo/hiOPGDQ1rp8zKjrm8mkC3ms98C', '2023-09-07 12:48:15', NULL, NULL, 'a:0:{}'),
(3, 'Princia', 'princia', 'yallaprinciaflorence@gmail.com', 'yallaprinciaflorence@gmail.com', 1, NULL, '$2y$13$XBQzelEy4E36smPJsZLQ7uh6FbbZljExp5SQnUFKoQ9.uzyrF6PVS', '2023-09-20 05:20:45', NULL, NULL, 'a:0:{}'),
(4, 'Evambe', 'evambe', 'thompsonatra@yahoo.com', 'thompsonatra@yahoo.com', 1, NULL, '$2y$13$068eQgJwzzZhwSyGjmyeH.YtYAwk6GXcMZXiykl6bovg6Jb5hqoQm', '2023-09-17 06:24:40', NULL, NULL, 'a:0:{}'),
(5, '7528', '7528', 'ribarthibaut@gmail.com', 'ribarthibaut@gmail.com', 1, NULL, '$2y$13$.VAQ55aFgBpuoiMWoLtSM.zrcdOs.znw.UoapFBlmgEsQ6mxYrgk2', '2023-11-01 04:23:29', NULL, NULL, 'a:0:{}'),
(6, 'Fabrice Beloko', 'fabrice beloko', 'fabricebeloko1806@gmail.com', 'fabricebeloko1806@gmail.com', 1, NULL, '$2y$13$XkdLQ61EPy/WTRqGWnE5He1wZN9joYKTQIjTmTTo.yLmCWNDo3Afm', '2023-09-21 07:18:32', NULL, NULL, 'a:0:{}'),
(7, 'RCN', 'rcn', 'annemariechintouo22@gmail.com', 'annemariechintouo22@gmail.com', 1, NULL, '$2y$13$BhZIOHkWIEN/Z42BRSE8suOn3bGNHWJBMvIYm4E6Iz0uYGmcpqyCa', '2023-09-19 11:58:44', NULL, NULL, 'N;'),
(8, 'BMPM', 'bmpm', 'magbinguinaba@gmail.com', 'magbinguinaba@gmail.com', 1, NULL, '$2y$13$E5tSBxgVy6dEMyIMcg1kCOHUItgxSx5p7KVWecyZiGyuagIat9o9S', '2023-09-20 02:33:53', NULL, NULL, 'N;'),
(9, 'Boss', 'boss', 'rahimnchange05@gmail.com', 'rahimnchange05@gmail.com', 1, NULL, '$2y$13$kWVbqiN523h0ks5iBJH7tumgdNd7aeD3GIYeyuYu67Luy5TTyOPDK', '2023-09-20 07:52:24', NULL, NULL, 'N;'),
(10, 'matys2035', 'matys2035', 'stevembogni@yahoo.fr', 'stevembogni@yahoo.fr', 1, NULL, '$2y$13$LBljJaMPd94MrDcbQ5s0iuqKnelyZCEV07n3ngz.sHgOUUtPMnLKm', '2023-09-28 05:15:42', NULL, NULL, 'N;'),
(11, 'Felix', 'felix', 'Felixmenai4@gmail.com', 'felixmenai4@gmail.com', 1, NULL, '$2y$13$RVbshTqkqJk4U0BPhxGeYugRqdfDxu0hEbKCEtTy1.hP08piDM0a6', NULL, NULL, NULL, 'N;'),
(12, 'Djimtabe', 'djimtabe', 'djimtabedjouwaikina@gmail.com', 'djimtabedjouwaikina@gmail.com', 1, NULL, '$2y$13$ymbZYs5oElEPO2rD9NSo/uVWVFCWcAxCsTqo4FmKg8V0M4eRMVZaO', NULL, NULL, NULL, 'N;'),
(13, 'Brahim', 'brahim', 'habibrahimsaga@gmail.com', 'habibrahimsaga@gmail.com', 1, NULL, '$2y$13$Eg3.KzwNDX6yHeUF0f51oexSuofzbXCXZ4vLVt5hvRvCkY9oIBAqu', NULL, NULL, NULL, 'N;'),
(14, 'Christelle', 'christelle', 'namiachristelle@gmail.com', 'namiachristelle@gmail.com', 1, NULL, '$2y$13$osp8Bxu3dORtDA6t6gIc5eM6mTkHCDfU58TjCT3ZV5iwr81RoEpHq', NULL, NULL, NULL, 'N;'),
(15, 'Nailo', 'nailo', 'nailosabrina20@gmail.com', 'nailosabrina20@gmail.com', 1, NULL, '$2y$13$7gB2vx8UM/DjN/wAG.Vz3..ug3VVRyZZOFNqyWnLENimHSzmojLni', NULL, NULL, NULL, 'N;'),
(16, 'Wode', 'wode', 'martinienwode@gmail.com', 'martinienwode@gmail.com', 1, NULL, '$2y$13$fAIRIn8PGGNNBGY/.nNHGuVCFxFgLcI.JKo.Ys4qZ1uyL6UqbMcYW', NULL, NULL, NULL, 'N;'),
(17, 'Félicienne', 'félicienne', 'feliciennekengnikamgang@gmail.com', 'feliciennekengnikamgang@gmail.com', 1, NULL, '$2y$13$5R6TPmDcP0TWbGgDMGqyT.1TVVv4fSJAVJELLwQI4pycO8.eKT8qy', NULL, NULL, NULL, 'N;'),
(18, 'Kebuh', 'kebuh', 'willingteeh@gmail.com', 'willingteeh@gmail.com', 1, NULL, '$2y$13$BS/82c3RHQ96LS58SQjAp.3yUYjULhqfHwK57kQeXC2NPBxCDE.fO', NULL, NULL, NULL, 'N;'),
(19, 'Aziz', 'aziz', 'djougdoumroukye@gmail.com', 'djougdoumroukye@gmail.com', 1, NULL, '$2y$13$QP7CNVjoJewi06Tw.WQGFe87/BM1jnI6W0z8bGtVykDH2qjp4raWu', '2024-02-21 06:45:17', NULL, NULL, 'N;'),
(20, 'Ali', 'ali', 'mailtoaldou@yahoo.com', 'mailtoaldou@yahoo.com', 1, NULL, '$2y$13$Js1kuUqG8Fa3Us3voe3NS.Ix///JkCWKGitagGz.qZTADBoUbOzye', '2024-02-01 09:21:20', NULL, NULL, 'N;'),
(21, 'Eric', 'eric', 'eric1234@gmail', 'eric1234@gmail', 1, NULL, '$2y$13$xcionWc3s3FH3ALfMcRB8.YjecCk4PNadmbpPpHNhCh59WmWmDxJq', NULL, NULL, NULL, 'N;'),
(22, 'Marnasse', 'marnasse', 'marnasse1234@gmail.com', 'marnasse1234@gmail.com', 1, NULL, '$2y$13$HB8VDlqgmfuIqvGDuYVpL.HuykJegtp3AHc0FlWe3U825OWTenXA2', NULL, NULL, NULL, 'N;'),
(23, 'Français', 'français', 'francais1234@gmail.com', 'francais1234@gmail.com', 1, NULL, '$2y$13$YSUZKmLKsL9vijcsuNiEueLbYjoKwDGtPg3vfBFfYD3KlBPilkqbe', NULL, NULL, NULL, 'N;'),
(24, 'Gabriel', 'gabriel', 'gabriel1234@gmail.com', 'gabriel1234@gmail.com', 1, NULL, '$2y$13$n0kRVQsJzASAUnRZVmPA7.Fd.wsi5EuzENBC1MriCIReIb3pDK9Ta', NULL, NULL, NULL, 'N;'),
(25, 'Abdel', 'abdel', 'abdel1234@gmail.com', 'abdel1234@gmail.com', 1, NULL, '$2y$13$cfwxXH3tbsnNCl4PX5NZv.PupfaxSZ8Nt0DsFoMG5RciDmLQ6UcoS', NULL, NULL, NULL, 'N;'),
(26, 'Miriam', 'miriam', 'miriam1234@gmail.com', 'miriam1234@gmail.com', 1, NULL, '$2y$13$widVnlXAkSsDDynbbJ.gyOB5yqNBfvLBN9eWfPhYyR/NnPaViAP7q', NULL, NULL, NULL, 'N;'),
(27, 'Mone', 'mone', 'mone1234@gmail.com', 'mone1234@gmail.com', 1, NULL, '$2y$13$EkXbx0Emxr7bITVCj9b3dehpn1tqngA786kBXHIFUaIizMN9oiZoG', NULL, NULL, NULL, 'N;'),
(28, 'Rocard', 'rocard', 'rocard1234@gmail.com', 'rocard1234@gmail.com', 1, NULL, '$2y$13$6bX5OYX/WkOe2mj0HOHCNOfX3s0vohacVsT.c3lHO3vkpbiqbrRx6', NULL, NULL, NULL, 'N;'),
(29, 'Namia', 'namia', 'namia1234@gmail.com', 'namia1234@gmail.com', 1, NULL, '$2y$13$YBw6EvwTBN0gvgiENPnPbei9Y8f3SyzE9TG8CjL5YbSjPC2oERZ1e', NULL, NULL, NULL, 'N;'),
(30, 'Darem', 'darem', 'daremppinfred@gmail.com', 'daremppinfred@gmail.com', 1, NULL, '$2y$13$8eDeelZt38yaaUPhzU63..uBf6z0yF94.WcQYCxs1feM1hcMdxW0u', NULL, NULL, NULL, 'N;');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_76391EFE59027487` (`theme_id`);

--
-- Index pour la table `Donateurs`
--
ALTER TABLE `Donateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Formations`
--
ALTER TABLE `Formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Journalistes`
--
ALTER TABLE `Journalistes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_54D801D05B94ADD2` (`radio_id`),
  ADD KEY `IDX_54D801D062BB7AEE` (`programme_id`);

--
-- Index pour la table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Radios`
--
ALTER TABLE `Radios`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `thematiques`
--
ALTER TABLE `thematiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2DA1797792FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_2DA17977A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_2DA17977C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `Donateurs`
--
ALTER TABLE `Donateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Formations`
--
ALTER TABLE `Formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Journalistes`
--
ALTER TABLE `Journalistes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Radios`
--
ALTER TABLE `Radios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `thematiques`
--
ALTER TABLE `thematiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `FK_76391EFE59027487` FOREIGN KEY (`theme_id`) REFERENCES `thematiques` (`id`);

--
-- Contraintes pour la table `Journalistes`
--
ALTER TABLE `Journalistes`
  ADD CONSTRAINT `FK_54D801D05B94ADD2` FOREIGN KEY (`radio_id`) REFERENCES `Radios` (`id`),
  ADD CONSTRAINT `FK_54D801D062BB7AEE` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
