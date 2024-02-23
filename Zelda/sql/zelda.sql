-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 23 fév. 2024 à 12:32
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zelda`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(2) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `login`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'thomas', 'ef6e65efc188e7dffd7335b646a85a21');

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `IdJeux` int(11) NOT NULL,
  `IdPersonnage` int(11) NOT NULL,
  `histoire` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`IdJeux`, `IdPersonnage`, `histoire`, `image`) VALUES
(1, 1, 'sous les traits de la réincarnation de la Déesse Hylia. Elle doit retrouver les souvenirs de sa vie antérieure et comprendre son rôle dans les différentes sources de la Terre. Elle est aidée de Impa, sa fidèle servante, qui réapparaîtra dans les autres jeux, tels que Hyrule Warrior ou dans Breath of the Wild en tant que cheffe du village Cocorico. Zelda éprouve des sentiments pour Link, même si on ne sait pas s\'ils sont partagés. ', NULL),
(1, 2, ' il est élève dans l\'école de chevalerie de Celesbourg, où il connaîtra de nombreux rivaux. Par la suite, il se révélera être l\'élu de la Déesse Hylia, ce qui lui vaudra d\'un coup plus de valeur aux yeux d\'Hergo, son ennemi juré. Zelda et Link sont amis depuis l\'enfance dans ce jeu. Link aura comme quête principale de retrouver Zelda dans les différentes régions sur la Terre, par amour et fidelité à la jeune fille. ', NULL),
(1, 3, 'c\'est un camarade d\'école de Link qui est sensible, naïf et vulnérable. Link, avec quelques quêtes annexes va lui apporter de l\'Endurol (Potion pour l\'endurance) pour qu\'il puisse augmenter sa force physique. ', NULL),
(1, 4, 'élève de l\'école de chevalerie, de grande taille, musclé avec une houppette rouge disgracieuse (cf Ghirahim à̱ la fin du jeu) et 2 acolytes soumis à ses côtés, Orbo et L\'autruche, présent dans les quêtes annexes la lettre d\'amour et l\'île aux insectes. Hergo déteste Link et n\'hésite pas à lui faire des sales coups. Depuis le début du jeu, il y a une rivalité entre eux deux car ils éprouvent tous deux des sentiments pour Zelda, qui hait profondément ce personnage. Mais Hergo n\'est pas aussi méchant qu\'il en a l\'air, puisque dans la seconde partie du jeu, il va, par la force des choses, se lier d\'amitié avec Link, et même lui prêter main-forte à deux reprises( même si on le soupçonne de faire ça pour s\'attirer les louanges de Zelda).. Hergo va veiller sur Impa dans le temple du sceau à l\'époque actuelle, jusqu\'au jour où cette dernière mourra. ', NULL),
(1, 5, 'esprit de la Déesse Hylia, créé dans le but de guider l\'élu vers sa destinée. Elle accompagnera Link tout le long de son aventure, ce qui l\'émouvera profondément au point de lui faire ressentir une émotion singulière : la joie. ', NULL),
(1, 6, 'bête immense scellée au fond du Vallon du Sceau. Elle est l\'incarnation du mal. Ce monstre est la forme animale de l\'Avatar du Néant. ', NULL),
(1, 7, 'forme humaine du Banni, c\'est le boss final du jeu. C\'est lui qui est à l\'origine de la guerre relatée dans la légende de la Déesse Hylia. Il est le maître de tous les démons de la terre, qu\'ils veut venger en assassinant Link de sang froid. ', NULL),
(1, 8, 'il est le serviteur de l\'Avatar du Néant. C\'est lui qui a enlevé Zelda dans le but de faire revenir son maître à la vie. Imbu de sa personne, il s\'est autoproclamé Monarque Démoniaque. Il est l\'exact opposé de Fay. Il est également très vaniteux', NULL),
(1, 9, 'servante de la Déesse Hylia, cette femme a pour mission de protéger Zelda le temps que Link éveille l\'âme du héros qui sommeille en lui. Dans beaucoup de jeux The Legend of Zelda, elle sera une alliée fidèle et précieuse. ', NULL),
(1, 25, 'Dans Skyward Sword, Terry possède une boutique volante qui flotte au dessus de Célesbourg le jour. Pour qu\'elle vole, Terry doit sans cesse pédaler, ce qui le fait souvent se plaindre. Il faut frapper sa clochette avec l\'arc, le lance-pierre, le scarabée, le grappin... pour qu\'il s\'arrête et lance une corde pour qu\'on puisse monter à bord. Terry vend des médailles, des emplacements pour la sacoche d\'aventurier et le filet à papillons.\n\nSi Link part de sa boutique sans rien acheter, Terry ouvre une trappe sous ses pieds pour le faire tomber, parce que ça l\'énerve de pédaler deux fois plus. La nuit, Terry vit sur son île. Il possède un insecte très rare qu\'il adore et que Latruche vole. Quand Link le lui rend, il gagne ainsi un article à moitié prix et cinq cristaux de gratitude. ', NULL),
(2, 1, 'La princesse Zelda n\'apparaît jamais directement dans le jeu, sauf lors des cinématiques finales, faisant d\'elle à la fois un personnage totalement absent du jeu, mais omniprésent comme elle apparaît à la fois dans les souvenirs, et est capable de parler à Link. Link entend sa voix dès son réveil du sommeil de la renaissance. Par ses paroles, la princesse le guide à travers le plateau du Prélude pour éveiller les tours Sheikah. Link entendra à plusieurs reprises la voix de la princesse au cours de son aventure.\nL\'histoire de Zelda est également au centre des Souvenirs de Link et évolue continuellement durant l\'histoire contée par les souvenirs (on peut également trouver des informations supplémentaires dans le journal de Zelda au Château d\'Hyrule). La princesse était au début froide et sèche envers Link, et ne supportait pas sa présence. Urbosa explique à Link que son comportement résulte d\'un complexe d\'infériorité : elle ne se sent pas à la hauteur de la mission qui lui a été donnée. La réussite de Link renforce encore plus ce sentiment d\'infériorité. Elle croyait également que le mutisme du jeune chevalier était une marque de mépris à son égard. ', NULL),
(2, 2, 'Dans Breath of the Wild Link se réveille dans le Sanctuaire de la Renaissance. Il est guidé par une voix vers le monde extérieur. Il fait la rencontre d\'un Vieil Homme qui lui apprend les actions de base : la chasse, la cuisine, combattre, etc...\n\nAprès avoir fait plusieurs sanctuaires, le vieil homme se révèle être le défunt Roi Rhoam, souverain du royaume d\'Hyrule. Il lui révèle alors qu\'il est le chevalier servant de la princesse Zelda et qu\'il a été plongé dans un sommeil de 100 ans suite à sa défaite contre Ganon. Le roi guide Link vers Impa, qui lui donne la marche à suivre pour vaincre Ganon : Link doit éveiller les quatre créatures Divines. L\'histoire de Link est révélée si le joueur décide de faire la quêtes des souvenirs, ainsi que dans certains journaux. ', NULL),
(2, 9, 'Impa est une femme du peuple Sheikah vivant à Cocorico, un petit village sheikah dans l\'Ouest de Necluda. C\'est la sage du village et une des rares personnes à avoir vécu les événements un siècle plus tôt.\n\nLorsque Link arrive, perdu dans ce monde qui lui est inconnu, elle le guide et l\'aide à accomplir sa mission. Impa commence par lui raconter la légende des dix mille ans, où un Prodige et une Princesse doivent combattre un fléau appelé Ganon. La vieille femme lui apprend que l\'armée antique est désormais contrôlée par Ganon et que pour le vaincre, il devra libérer les quatre créatures divines du contrôle de Ganon. Pour l\'aider à accomplir ses différentes tâches, Impa lui conseille d\'aller voir sa sœur, Pru\'Ha afin de réparer la tablette sheikah.\n\nAprès avoir récupéré toutes les fonctionnalités de la tablette, Link découvre douze photos d\'un autre temps. Impa lui explique qu\'il s\'agit de souvenirs de la princesse Zelda. S\'il se rend à ces endroits, il retrouvera peut-être sa mémoire... Après avoir retrouvé l\'un de ses souvenirs, Link reçoit de la part d\'Impa une tunique de Prodige. Elle lui explique qu\'il s\'agit de son équipement, utilisé cent ans plus tôt.', NULL),
(2, 10, 'Revali est un guerrier de la tribu des Piafs, doué pour voler et également excellent archer. Ses capacités lui ont permis de devenir un Prodige, aux côtés de Zelda, Link, Daruk, Mipha et Urbosa. Il est arrogant et orgueilleux, et se positionne en rivalité avec Link, se considérant comme supérieur à ce dernier dans tous les domaines, pensant même que le Héros aurait dû être lui. Il aime bien parler de manière éloquente et dramatique. Comme tous les Prodiges, il est déterminé à arrêter Ganon, et ce sens du devoir est assez puissant pour qu\'il mette de côté sa vanité.\n\nEn tant que Prodige, Revali a accès aux commandes de la Créature Divine Vah\'Medoh. L\'assurance extérieure du Piaf cache en réalité un manque de confiance en soi, en particulier vis-à-vis de ses capacités. Il a toujours repoussé ses limites pour s\'améliorer, se blessant parfois, et éprouvait constamment le besoin de devoir faire ses preuves au monde. Il comptait également énormément sur les compliments et les louanges des autres afin de se sentir bien dans sa peau, et de ne pas être être rongé par l\'incertitude.\n\nLors du retour inattendu de Ganon, Revali s\'envole jusqu\'à sa Créature Divine, où il est attaqué par un serviteur du Fléau, l\'Ombre de vent de Ganon. Impuissant, il est alors tué, et son esprit reste enfermé dans Vah\'Medoh pendant un siècle. Lorsque Link le libère après avoir vaincu le monstre, il lui apprend la Rage de Revali, en guise plus ou moins de remerciement. Voyant le jeune Héros réussir là où lui a échoué, Revali ravale sa fierté et admet finalement que Link est le plus fort et le meilleur. Comme Urbosa, Revali ne regrette pas vraiment sa vie antérieure.', NULL),
(2, 11, 'Mipha est la princesse adorée du peuple Zora, fille du Roi Dorefah et grande sœur du Prince Sidon. Elle est née avec le don de pouvoir soigner les autres, une capacité unique dans tout Hyrule. Elle accepte la proposition de Zelda de devenir un des Prodiges, souhaitant apporter son aide au royaume. Bien qu\'elle en contrarie certains, le Roi accepte la décision de sa fille. Mipha devient ainsi la pilote de la Créature Divine Vah\'Ruta, et parmi les Prodiges, c\'est elle qui a eu le moins de difficulté à contrôler sa machine, ce qui surprit Zelda à cause de l\'apparente fragilité de la Zora. Bien qu\'elle se spécialise dans le soin, elle excelle aussi dans le maniement de la lance.\n\nMipha est calme, timide mais courageuse, étant déterminée à jouer son rôle de Prodige en combattant Ganon. Elle a connu Link lorsqu\'il avait quatre ans, et les Zoras ayant une durée de vie bien plus grande que les Hyliens, elle l\'a vu grandir au fil des années. Mipha a alors développé des sentiments à l\'égard du jeune homme, et tient énormément à lui, souhaitant pouvoir guérir toutes ses blessures. Elle confectionne même une Armure Zora pour lui, une tenue censée être donnée à celui qu\'une Zora considère comme son futur mari, et qu\'elle compte lui donner au Domaine Zora. Néanmoins, elle change d\'avis, et n\'aura plus jamais une autre occasion de la lui offrir.\n\nLors de l\'éveil de Ganon, Mipha se précipite dans sa Créature Divine pour engager le combat. Néanmoins, l\'Ombre d\'eau de Ganon apparaît dans la machine, et tue la princesse. Son esprit reste alors enfermé dans Vah\'Ruta pendant un siècle, jusqu\'à l\'arrivée de Link qui élimine la création de Ganon. Mipha lui fait alors don de la Prière de Mipha, réalisant ainsi la promesse qu\'elle lui avait faite de toujours le soigner et le protéger. Elle regrette de ne pas avoir pu rester aux côtés de Link comme elle le souhaitait secrètement, mais aussi de partir sans avoir pu revoir son père, qui fut profondément marqué et plongé dans le chagrin lors de la disparition de sa fille.', NULL),
(2, 12, 'Daruk est un puissant guerrier Goron, apprécié et respecté par son peuple. Grâce à sa force et ses talents, il a été choisi par le Roi pour devenir l\'un des Prodiges aux côtés de Link, Revali, Urbosa, Mipha et Zelda. Il est le pilote de la Créature Divine Vah\'Rudania. Très courageux, il prend à cœur son devoir de défaire Ganon. Bien qu\'amical en temps normal, il devient féroce et bruyant sur le champ de bataille.\n\nDarukeru s\'entend très bien avec Link, dont il admire la force. Ils ont en commun un appétit insatiable, et le Goron le considère comme son frère de sang. Bien qu\'il soit d\'une nature brave et infléchissable, il a une peur bleue des chiens, ayant été poursuivi à de nombreuses reprises dans sa jeunesse. Le contrôle de sa Créature Divine lui a donné beaucoup de mal, et c\'est Link, en lui conseillant de l\'explorer pour que se forme une connexion entre eux, qui lui a permis de l\'utiliser correctement. Il n\'hésite pas à donner de la voix pour encourager ses amis.\n\nLors de l\'éveil de Ganon, Darukeru est le premier à réagir et à inciter les autres à entrer en action. Il se rend dans Vah\'Rudania pour débuter le combat, mais y est attaqué par l\'Ombre de feu de Ganon, qui le tue. Son esprit reste ainsi enfermé un siècle durant dans la Créature Divine, avant d\'être libéré à l\'arrivée de Link. Il apprend au jeune héros le Bouclier de Daruk, en gage de remerciement. Il est nostalgique en revoyant Hyrule après un siècle, et est heureux de voir son peuple se porter bien en apercevant Yunobo, son descendant.', NULL),
(2, 13, 'Urbosa est l\'ancienne chef du peuple Gerudo, ainsi que l\'un des Prodiges dirigés par la Princesse Zelda. C\'est une femme au fort caractère, connue comme une guerrière puissante, et qui fut l\'amie de la reine, la mère de Zelda. À la mort de celle-ci, Urbosa s\'est rapprochée de sa fille, devenant ainsi très proche avec la jeune princesse, et se comporte de manière rassurante et protectrice avec elle, presque comme une mère. Elle admire aussi beaucoup les efforts et la volonté de Zelda pour accomplir ses devoirs.\n\nForte et courageuse, elle est déterminée à se battre pour Hyrule lorsque Ganon se réveillera. Urbosa ressent une profonde haine et beaucoup de honte envers Ganon, le monstre étant à l\'origine né dans le peuple Gerudo. Elle connaît toutes les légendes sur les crimes commis par Ganon au fil des temps, et respecte profondément une autre légende Gerudo, Nabooru, qui s\'est à son époque rebellée contre leur roi. Le nom de la Créature Divine pilotée par Urbosa, Vah\'Naboris, est d\'ailleurs inspiré de celui de cette femme. En vainquant Ganon, Urbosa souhaite montrer au monde que son peuple ne montre plus aucune allégeance ni tolérance envers ce démon.\n\nLors de l\'éveil de Ganon, les Prodiges pris par surprise se sont précipités aux commandes de leurs Créatures Divines. Cependant, tout se passe au plus mal. Urbosa est attaquée puis tuée par l\'Ombre de foudre de Ganon, qu\'elle avouera être bien trop forte pour elle, puis son esprit est enfermé dans Vah\'Naboris. Un siècle plus tard, Link bat la créature et libère l\'esprit de la guerrière, qui lui apprend alors la Colère d\'Urbosa et lui demande de dire à Zelda de ne pas se sentir responsable de sa mort.', NULL),
(2, 14, 'Au début du jeu, il se présente à Link sous la forme d\'un vieil homme avec une capuche et un bâton. Il mange tranquillement des pommes grillées près d\'un feu, à quelques mètres du sanctuaire où reposait Link. Il apprend à Link qu\'ils se trouvent sur le Plateau du Prélude et l\'aide également à chasser, cuisiner et même à passer le temps.\n\n\nLink le recroise au sommet de la Tour du Prélude, le vieil homme arrivant à l\'aide de sa paravoile. Link s\'y intéresse de suite et le vieil homme lui propose un marché : il lui trouve quatre trésors cachés dans des sanctuaires sur le plateau et en échange, il lui donne sa paravoile. Celle-ci pourra l\'aider à descendre des positions en hauteur sans se faire mal.\n\nAprès avoir exploré le plateau et ses sanctuaires, le vieil homme lui donne rendez-vous au sommet des ruines du Temple du Temps. Une fois sur place, il lui révèle sa vraie identité : celle du roi Rhoam décédé un siècle plus tôt. Il explique au jeune homme que le fléau Ganon est en vie et qu\'il est enfermé au château d\'Hyrule. Un siècle plus tôt, lorsque Ganon s\'est éveillé, Link fut gravement blessé et fut emmené au sanctuaire de la Renaissance pour guérir. Rhoam demande alors à Link de vaincre Ganon. Pour l\'aider, le jeune hylien devra se rende au village de Cocorico et trouver Impa.\n\n', NULL),
(2, 15, 'Il s\'agit du chef du Gang des Yigas, un groupe de rebelles Sheikahs qui ont décidé de s\'écarter et d\'arrêter de servir la Famille Royale d\'Hyrule. Ils ont choisi de prêter allégeance à Ganon, le Fléau. Le grand Kohga possède un côté assez mégalomane faisant penser à Ghirahim de Skyward Sword, et paraît assez ridicule de part sa tenue et ses répliques assez exagérées, malgré ça il reste respecté de ses hommes. Il se démarque également par sa stupidité et sa fainéantise. Il semble qu\'il continue sa traque de Link simplement pour poursuivre l\'héritage de ses ancêtres, car il a l\'air de vouloir s\'occuper de lui juste pour se la couler douce ensuite sans penser au reste.', NULL),
(2, 16, 'Noïa est le seul Korogu géant connu. Il possède une feuille verte en guise de barbe et deux amas de verdure au-dessus de sa tête en guise de cheveux. Tout comme les Korogus de plus petite taille, son corps ressemble a un tronc d\'arbre et ses bras sont comme des branches. Il adore jouer de la musique avec ses maracas magiques qui sont alimentés par des noix Korogu. Il y en a 900 et elles sont obtenues par Link auprès des Korogus sans nom cachés un peu partout en Hyrule.\n\nChaque fois que Link donne à Noïa un certain nombre de noix Korogus, il peut augmenter jusqu\'à un certain point, le nombre d\'emplacement des trois premiers compartiments de sa sacoche, soit celui des armes, des boucliers et des arcs.', NULL),
(2, 17, 'Link traverse les bois perdus pour avoir accès à la forêt Korogu située dans la province d\'Ordinn au nord-est d\'Hyrule. La forêt est l\'habitat de l\'Arbre Mojo et des Korogus.Les Korogus ont créé trois commerces dans le tronc de l\'Arbre Mojo. Lorsqu\'il y arrive au piédestal de l\'épée de Légende, l\'Arbre Mojo s\'adresse à lui pour le mettre en garde. En effet, s\'il veut retirer l\'épée cela peut lui coûter la vie. Il précise aussi que c\'est la princesse Zelda qui lui a demandé de veiller sur l\'épée jusqu\'au retour du héros. ', NULL),
(2, 18, 'Il ressemble à une araignée géante avec le corps supérieur et la tête humanoïdes, à la fois composés des quatre Ombres que Ganon a envoyées pour corrompre les Créatures Divines. Il brandit une lame de flamme dans l\'une de ses mains droites, une lance de glace dans une de ses mains gauches. Il possède également une main armée d\'un canon semblable à celui de l\'Ombre de vent de Ganon. Il a aussi trois petites mains au-dessus de sa tête qui ont chacune une arme différente : une épée, des griffes et des cisailles. Il possède par ailleurs deux tentacules de Gardiens.\n\nL\'historie de Ganon nous est contée dans la Légende des dix mille ans. ', NULL),
(2, 25, 'erry apparaît de nouveau dans ce jeu, où il incarne encore une fois un marchand ambulant. Link peut le croiser dans tous les relais et au bazar Assek, dans le désert Gerudo. En fonction des lieux où il est présent, Terry vendra des ingrédients différents et liés aux environs. Cependant, peu importe l\'endroit où il se trouve, Terry proposera toujours à Link 20 flèches en bois et deux lots de 5 flèches en bois. Si Link possède un nombre trop important de flèches (environ 120 et plus), Terry ne pourra donc pas lui en vendre. Link peut également lui vendre des ingrédients, des plats et des tenues.  ', NULL),
(2, 34, 'Épona fait une nouvelle apparition dans ce jeu en tant que monture favorite de Link, d\'abord dans les souvenirs puis dans l\'épilogue. Son apparence physique est alors différente de celle qu\'elle possède dans les autres jeux : sa crinière es brune foncée au lieu de blanche puis sa robe est brune plutôt que rousse. Comme avec tous les autres chevaux sauvages, le joueur peut trouver à plusieurs endroits cette version d\'Épona, la dompter puis l\'enregistrer au relais afin de la monter. Il est toutefois possible d\'obtenir, de manière aléatoire, une autre version d\'Épona au physique plus familier, en utilisant l\'amiibo de Link (celui de la série Super Smash Bros. ou celui de Twilight Princess) via le module amiibo. Cette version de la jument porte automatiquement le nom d\'Épona lorsqu\'elle est enregistrée au relais. Elle possède le même physique et le même équipement équestre que l\'Épona dans Twilight Princess. Comme pour n\'importe quel autre cheval, lors du combat final contre Ganon, si Épona est le seul cheval enregistré aux relais ou si elle est désignée comme le cheval en cours d\'utilisation, ce sera elle que Link chevauchera pour le combattre. ', NULL),
(3, 1, 'La Princesse Zelda n’apparaît réellement qu\'à partir du moment où Link conduit Tetra au royaume d\'Hyrule, plongé sous les eaux. Le roi Daphnès Nohansen Hyrule lance un sortilège à la jeune pirate, qui se révèle, en réalité, être la princesse Zelda, réincarnation de la fille du roi précédemment mentionnée. Daphnès Nohansen Hyrule lui explique qu\'il a confié un morceau de la Triforce, qui est sien, celui de la Sagesse, à sa propre fille. La princesse Zelda étant sa descendante, c\'est maintenant elle qui est en possession de ce fragment. À partir de ce moment, Tetra devenue Zelda change radicalement de comportement, étant devenue plus sage et plus vénérable qu\'en tant qu\'une pirate. Elle attend Link dans le monde d\'Hyrule englouti, pour se cacher de Ganondorf, mais ce dernier la trouve et l\'enlève, et Link ne s\'en rend compte qu\'au moment où il revient au château. ', NULL),
(3, 2, 'Link est un garçon d\'à peine douze ans. Il vit avec sa sœur et sa grand-mère sur l\'île de l\'Aurore. Pour son anniversaire, il reçoit les mêmes habits que le héros légendaire. Sa sœur est enlevée par le roi Cuirasse, un monstre, au service de Ganondorf, et Link prend la mer aux côtés des pirates de Tetra pour la retrouver. Il rencontre le Lion Rouge, un bateau parlant, et sa quête prend une toute autre ampleur : Link doit sauver la Grande Mer de l\'emprise Ganondorf. À l\'aide de la baguette du Vent, il doit d\'abord retrouver les perles des déesses afin de faire remonter la tour des Dieux. Ceci fait, il trouve un passage qui le ramène dans le royaume submergé d\'Hyrule, et il retrouve l\'épée de Légende. Il parvient à sauver sa sœur grâce à l\'épée, mais il décide de ne pas arrêter sa quête ici, et comme l\'épée de Légende a perdu de ses pouvoir, il se met en quête de les lui rendre, en faisant appel aux sages de la terre et du vent. Le Lion Rouge lui donne plus tard le titre de Héros du Vent.\n\n\n', NULL),
(3, 17, 'L\'Arbre Mojo de The Wind Waker vit à l\'Île aux Forêts. Il est l\'esprit de cet endroit, et est considéré par les Korogus comme leur père. Il est très âgé, et pense d\'ailleurs qu\'il tient son âge avancé de l\'eau de la Forêt dans laquelle il baigne. Cependant, quelques temps avant les événements du jeu, Ganondorf vint perturber l\'ordre, et des ennemis firent leur apparitions. L\'Arbre Mojo se retrouve alors couvert de Blobs, et Dumoria, l\'un des Korogus, se fait enlever par un monstre. Aussi, dans le but de mettre fin à l’existence de Karle Demos, le boss des Bois Défendus qui a avalé Dumoria, l’Arbre Mojo remet la feuille Mojo à Link, lui permettant de planer en échange de quelques points de magie. C’est également lui qui lui confie la perle de Farore (nécessaire à l’apparition de la Tour des Dieux), une fois Dumoria sauvé. ', NULL),
(3, 19, 'Au début du jeu, Arielle recherche Link, qui s\'est endormi dans un coin de l\'Île de l\'Aurore. Comme c\'est le douzième anniversaire du héros, elle lui prête sa précieuse longue-vue. Elle est enlevée peu après par le roi Cuirasse qui la confond avec Tetra (en effet elles sont toutes deux blondes et ont les oreilles pointues). C\'est pour la retrouver que Link se lance dans l\'aventure. ', NULL),
(3, 20, 'Capitaine d\'un navire pirate depuis le décès de sa mère, elle est enlevée par le Roi Cuirassé au début de l\'histoire. Cependant l\'oiseau la confond avec Arielle, la petite sœur de Link. Se sentant responsable de l\'enlèvement d\'Arielle, elle accepte Link à bord de son bateau et l\'aide à pénétrer dans l\'antre de Ganondorf, la forteresse Maudite. Elle confie à Link l\'amulette Pirate, transmise dans sa famille, grâce à laquelle ils peuvent communiquer (le Lion Rouge l\'utilise également, à l\'insu de Tetra). Au cours de l\'aventure, elle aide Link à plusieurs reprises, en lui permettant d\'atteindre Jabu avant l\'équipage pirate pendant la nuit sans fin, ou en l\'aidant à secourir les jeunes filles kidnappées par Ganondorf en distrayant le Roi Cuirassé. \r\n\r\nTetra découvrira, dans le royaume d\'Hyrule englouti, qu\'elle est en réalité la princesse Zelda, après que Daphnès Nohansen Hyrule lui ait lancé un sortilège spécial qui lui donne une apparence de princesse. Elle est ainsi la descendante de la famille royale, et elle détient une partie de la Triforce de la Sagesse. Enlevée par Ganondorf, elle est sauvée par Link, puis participe au combat final avec les flèches de lumière. Après avoir vaincu le Seigneur du Mal, les deux héros décident de parcourir les mers ensemble avec l\'équipage de la princesse. ', NULL),
(3, 21, 'Quand Link arrive au sommet de la Tour de Ganon après avoir vaincu Alter-Ganon, Ganondorf lui révèle ses intentions de faire revivre et de dominer Hyrule. Il rassemble alors les trois morceaux de la Triforce : le sien et celui qu\'il a volé à Zelda, ainsi que celui de Link, qu\'il parvient à prendre après avoir assommé le jeune héros. Cependant, Daphnès Nohansen Hyrule fait son apparition et parvient à toucher la Triforce avant Ganondorf. C\'est donc le vœu du roi qui est exaucé, celui d\'offrir un avenir à Link et Zelda et de détruire définitivement Hyrule en emportant le seigneur du mal dans l\'abysse. Alors qu\'Hyrule commence à être englouti, Link et Zelda font face à Ganondorf, seuls. ', NULL),
(3, 22, 'Lion Rouge est un voilier qui parle. La rencontre entre Link et le Lion Rouge se déroule dans la Grande Mer près de Mercantîle, après être expulsé par le roi Cuirassé de la forteresse Maudite. Il explique à Link qui est Ganondorf et ce qu\'il doit faire pour le vaincre. C\'est le plus grand allié de Link et il est toujours de bon conseil.\r\n\r\nMais avant de partir, Link doit retrouver une voile (qui permet au navire d\'être poussé par les vents) pour qu\'il puisse partir à la recherche des trois Perles. Le bateau utilise plusieurs objets de l\'arsenal de Link, comme le grappin-griffe qui devient une grue de récupération. Les bombes s\'utilisent grâce à un canon. \r\n\r\nPlus tard dans l\'aventure, on apprend que le Lion Rouge est en réalité Daphnès Nohansen Hyrule le Roi d\'Hyrule, mais il continue tout de même à servir de bateau à Link. Le Roi peut parler la langue ancienne Hylienne, et traduit souvent au nom de Link. Sur la seconde quête, Link peut comprendre l\'Hylien, et le texte apparaît en français. La première quête, cependant, montre des symboles intelligibles quand elle est parlée. C\'est lui qui remettra à Tetra la seconde partie de la Triforce de la Sagesse.  ', NULL),
(3, 23, 'Pour la première fois, le roi a un nom : Daphnès Nohansen Hyrule. Il s\'agit du compagnon de Link, le Lion Rouge. Il révèle sa véritable identité à Link dans la salle où se trouve Excalibur sous le château d\'Hyrule, et révèle en même temps la véritable identité de Tetra: celle de la princesse Zelda. Lors du combat final contre Ganondorf, il demande à la Triforce d\'engloutir son royaume pour ne pas le laisser aux mains de Ganondorf, puis coule avec lui. ', NULL),
(3, 24, '\nLorsque Link arrive sur l\'île du Dragon, il rencontre Médolie qui lui donne une lettre que le chef des Piafs a écrite pour son fils. Elle en profite pour lui donner rendez-vous à l\'entrée de la caverne du Dragon. En fait, elle souhaite que Link l\'aide à rentrer dans la caverne, car l\'entrée qui était une mare s\'est asséchée. Médolie ne peut pas voler par dessus car ses ailes ne sont pas encore tout à fait développées. Link lui donne de l\'élan en la propulsant et en s\'aidant du vent, et réussit à la faire rentrer dans la caverne. Pour le remercier, elle lui offre une bouteille. Médolie avait l\'intention d\'aller calmer Valoo seule, mais Link la suit dans la caverne. Heureusement, car la jeune fille se fait capturer par des monstres, et Link la sauve. Médolie lui donne alors le grappin-griffe pour qu\'il puisse se déplacer plus facilement dans la caverne, puisqu\'elle ne se sert plus depuis qu\'elle peut voler.\n\nPlus tard, Link découvrira qu\'elle est le sage de la Terre, héritière de Laruto. Elle et Link partent ensemble au temple de la Terre pour restaurer les pouvoirs d\'Excalibur. Dans le temple, il faudra à plusieurs reprises la contrôler avec le chant du Marionnettiste; il sera alors possible de voler un court instant et de refléter la lumière avec la lyre de Médolie. À la fin, Médolie se trouve à bord du bateau pirate et accueille Link et Tetra, de retour d\'Hyrule, avec leurs autres compagnons. ', NULL),
(3, 25, 'Terry possède un bateau et voyage d\'île en île. Les îles où il se trouve sont indiquées sur une carte spéciale, la carte de Terry, que le marchand envoie à Link par la poste. Son bateau s\'arrête dès qu\'on s\'en approche pour que l\'on puisse monter à bord, mais on peut aussi le frapper avec le canon. \n\nIl vend généralement de la nourriture pour animaux (et le fameux sac à Appâts en forme de cochon), des flèches et des bombes.', NULL),
(4, 1, 'A l\'âge adulte, elle se transforme en Sheik pour se cacher. Cependant, après que Link a trouvé les six médaillons, Sheik attend au temple du Temps et elle reprend sa véritable apparence devant Link, mais se fait alors enlever par Ganondorf. Elle a tout de même le temps de lui offrir les flèches de Lumières, permettant de vaincre Ganondorf. On apprend également qu\'elle est le septième Sage.\r\n\r\nLink part la secourir à la tour de Ganon, puis une fois Ganondorf défait, la tour s\'écroule; Link et la princesse s\'enfuient en descendant la tour. Link doit protéger Zelda des monstres, et à un moment, vaincre deux Stalfos afin de libérer la princesse qui s\'est retrouvée bloquée dans un cercle de feu. Zelda est capable d\'ouvrir les grilles, et une fois qu\'ils arrivent en bas, ils retrouvent Ganon, et Link perd son épée. Il parvient finalement à remettre la main dessus, et à vaincre le prince des ténèbres.\r\n\r\nUne fois leur ennemi vaincu, Zelda reprend l\'ocarina du Temps, et renvoie Link à son époque. Dans le passé, elle est de retour au château, et on peut voir Link aller lui parler.', NULL),
(4, 2, 'Link parvient à ouvrir la Porte du Temps et il y trouve l\'épée de Légende. Malheureusement, il permet ainsi à Ganondorf de s\'emparer de la Triforce de la Force. Link, quant à lui, est plongé dans un sommeil de sept ans, jusqu\'à ce que Rauru, le Sage de la Lumière, le réveille. Ce dernier lui explique qu\'il est le Héros du Temps, et qu\'il devait atteindre l\'âge adulte pour utiliser l\'épée de Légende et vaincre Ganondorf. Link, avec l\'aide des sages et de leurs médaillons, parvient à chasser le mal d\'Hyrule. La princesse Zelda le renvoie alors à l\'époque de son enfance. Redevenu enfant, Link raconte ce qu\'il a vécu dans le futur à la princesse Zelda. On voit également que Navi le quitte, probablement parce que sa quête est terminée et qu\'il n\'est pas un véritable Kokiri.', NULL),
(4, 9, 'Impa, dans Ocarina of Time, est la dernière des Sheikahs. Elle est plutôt jeune, mais musclée et vêtue d\'une armure. En tant que serviteur de la famille royale, elle est chargée de veiller sur Zelda. On apprend également qu\'elle est la fondatrice du village Cocorico et qu\'elle a enfermé un monstre dans le Puits de Cocorico il y a très longtemps.\r\n\r\nAu début du jeu, elle apprend à Link la berceuse de Zelda. C\'est elle qui guide Link pour aller chercher le Rubis Goron. Quand Ganondorf assassine le roi d\'Hyrule, Impa fuit le château avec Zelda, pour la protéger. C\'est elle qui apprend à Zelda à devenir Sheik. Plus tard, Link aide Sheik à libérer Impa du temple de l\'Ombre, et celle-ci s’avère être le sage de l\'ombre. Elle lui remet un médaillon, et affirme qu\'elle doit rester dans le sanctuaire des Sages. On ne la revoit qu\'en compagnie des autres sages, à la tour de Ganon, pour créer le pont menant à la tour, puis après que Link ait passé la salle de l\'ombre.', NULL),
(4, 17, 'Avant le début de l\'aventure, Ganondorf rend visite à l\'Arbre Mojo et lui demande de lui remettre l\'Émeraude Kokiri. Essuyant un refus catégorique, il ordonne à Gohma de maudire le Vénérable, le condamnant à une mort certaine. Après avoir chargé Navi de veiller sur Link, il demande au jeune héros de le sauver de sa malédiction (Voir : Arbre Mojo (Donjon)). Le mal étant déjà fait par Gohma, l’Arbre Mojo finit par s’éteindre. L\'Arbre Mojo a juste le temps de confier à Link la mission de déjouer les plans de Ganondorf ; il met le jeune Hylien au courant de la menace qui pèse sur Hyrule et lui dit de se rendre au château d\'Hyrule avec l\'Émeraude Kokiri.\r\n\r\nIl laisse les Kokiris et leur forêt à la proie des monstres, comme l’en témoigne son état sept ans plus tard. En battant Ganon Spectral dans le Temple de la Forêt, Link permet ainsi à l’Arbre Mojo de renaître sous la forme d’un nouvel être : le Bourgeon Mojo. L\'entrée qui mène à son intérieur est fermée à l\'époque de Link adulte.', NULL),
(4, 21, 'Chronologiquement parlant, c\'est dans Ocarina of Time que Ganondorf fait ses débuts. Seul mâle né dans la tribu Gerudo depuis un siècle, Ganondorf devient leur roi. Ambitieux, il souhaite s\'emparer de la Triforce et du royaume d\'Hyrule; il prête allégeance au roi d\'Hyrule, mais seule la jeune princesse Zelda semble deviner ses véritables intentions. Afin de pénétrer dans le Saint Royaume où repose la Triforce, Ganondorf tente de réunir les trois pierres ancestrales qui sont la clé de la porte du temps dans le temple du Temps. Les trois tribus gardiennes des pierres (Kokiris, Gorons et Zoras) refusant de les lui remettre, le roi Gerudo jette une malédiction à l\'Arbre Mojo, gardien des Kokiris, à Jabu-Jabu, dieu des Zoras, et condamne la caverne Dodongo, garde-manger des Gorons, rendant fou le Roi Dodongo.\r\n\r\nLink, prévenu des intentions de Ganondorf par Zelda, réussit à réunir les trois pierres. Lorsqu\'il retourne à Hyrule, il aperçoit la princesse qui fuit le château avec sa nourrice Impa, poursuivies par Ganondorf. Zelda confie à Link son ocarina du temps; le jeune garçon possède alors toutes les clés du Saint Royaume. Malheureusement, lorsqu\'il ouvre la porte du temps, il est suivi par Ganondorf. Alors que Link s\'endort pour sept ans dans le sanctuaire des sages, Ganondorf tente de s\'emparer de la Triforce, mais n\'obtient que le fragment de la force. Pendant les sept années de sommeil de Link, Ganondorf détruit le château d\'Hyrule et érige la tour de Ganon. Il attend que les porteurs des deux autres fragments de la Triforce fassent leur apparition. Il les retrouve tous les deux dans le Temple du Temps, lorsque Sheik révèle à Link sa véritable identité : la princesse Zelda . Il kidnappe Zelda et propose à Link de le combattre dans sa tour. Grâce à l\'épée de Légende et aux flèches de Lumière, le héros parvient à vaincre Ganondorf. Ce dernier utilise alors le pouvoir de la Triforce de la force pour se transformer en un monstre gigantesque, Ganon. Le héros parvient à le vaincre grâce à l\'épée sacrée, et Ganondorf est enfermé dans le Saint Royaume grâce aux pouvoirs des sept sages rassemblés par Link au cours de sa quête. Ganondorf, alors qu\'il disparaît, profère une malédiction contre Link. ', NULL),
(4, 26, 'Link est un jeune garçon élevé parmi les Kokiris, le peuple des enfants de la forêt. Il est le seul à ne pas avoir de fée, ce qui lui vaut les brimades de certains. Mais un jour, la fée Navi vient le réveiller pour le mener à l\'Arbre Mojo, l\'esprit protecteur des Kokiris. Le vénérable Arbre Mojo est mourant : il a été maudit par Ganondorf. Link sauve l\'Arbre Mojo de sa malédiction, mais trop tard, ce dernier meurt, ayant juste le temps de confier à Link l\'émeraude Kokiri et de l\'envoyer vers le château d\'Hyrule pour y trouver la princesse Zelda.\r\n\r\nLà, il rencontre Zelda, qui le charge d\'une importante mission : retrouver le rubis Goron et le saphir Zora. Les pierres ancestrales, ainsi que l\'ocarina du Temps, sont les clés de la porte du Temps menant au saint Royaume qui renferme la Triforce, et Zelda veut empêcher Ganondorf de s\'en emparer. ', NULL),
(4, 27, 'Jeune Princesse d\'Hyrule se méfiant de Ganondorf, Zelda rencontre Link alors que ce dernier vient de s\'infiltrer à l\'intérieur du château. Elle lui explique qu\'elle craint que Ganondorf fasse quelque chose de mal, puis elle lui donne une lettre lui permettant d\'accéder au mont du Péril, et l\'envoie à la recherche de deux des trois pierres ancestrales puisqu\'il en possède déjà une. Ce sont les clefs permettant d\'ouvrir la Porte du Temps, au sein du temple du Temps.\r\n\r\nAprès avoir retrouvé les trois pierres, Link rentre à Hyrule, mais croise Zelda qui s\'enfuit du château à cheval avec sa nourrice Impa, poursuivies par Ganondorf. Zelda confie alors à Link son ocarina et le jeune héros part au temple du Temps afin d\'ouvrir la porte du Temps. C\'était une erreur, car Ganondorf en profite pour voler la Triforce de la Force.\r\n\r\nImpa emmène la princesse loin du château d\'Hyrule pour la protéger du roi Gerudo. ', NULL),
(4, 28, 'La princesse Zelda, après avoir fuit Hyrule, se déguise en Sheik, un homme de la tribu des Sheikah. De cette manière, elle peut espionner Ganondorf tout en restant cachée.\r\n\r\nSept ans plus tard, Link se réveille, adulte. Rauru lui confie la tâche de retrouver les sept sages puis le renvoie dans le temple du temps. Il y rencontre Sheik, qui lui apprend où trouver les sept sages et lui dit de se rendre dans le temple de la Forêt. Lorsque Link arrive dans le bosquet Sacré, Sheik réapparaît et lui enseigne le menuet des Bois, un chant de téléportation. Une fois que Saria s\'est éveillée au rang de sage de la forêt, Link retourne dans le Temple du Temps, où il retrouve Sheik une nouvelle fois. Le Sheikah l\'informe qu\'en replaçant l\'Épée de Légende dans son piédestal, Link peut revenir sept ans en arrière; il lui apprend ensuite un nouveau chant de téléportation, le prélude de la Lumière. Le héros rencontre également Sheik devant le Temple du Feu et dans la caverne Polaire, et il lui apprend le boléro du Feu et la sérénade de l\'Eau. ', NULL),
(4, 29, 'Navi est une fée qui, dans la série Zelda, sont souvent représentées sous la forme de boules de lumière avec quatre ailes. Elle est de couleur bleue ou de temps en temps blanche (mais c\'est rare). Bien qu\'elle ne croie pas vraiment en Link au début du jeu, son opinion change avec le temps, et ils deviennent rapidement une équipe inséparable. ', NULL),
(4, 30, 'Saria est l\'amie avec qui Link a grandi. Lorsque ce dernier obtient une fée, elle est très heureuse pour lui. Le départ du garçon l\'attriste beaucoup et elle lui offre son ocarina des fées. Link la retrouve un peu plus tard dans le bosquet Sacré. Elle lui apprend le chant de Saria, qui leur permet de communiquer à distance. Link adulte devra retrouver Saria dans le temple de la Forêt afin qu\'elle s\'élève au rang de Sage de la Forêt.\r\n\r\nElle nourrissait secrètement des sentiments amoureux pour Link quand ce dernier vivait encore avec les Kokiris dans la forêt. Ses sentiments sont mentionnés par Mido, le chef des Kokiris, après que Link, devenu adulte, a vaincu le boss du Temple de la forêt. Hélas, cet amour n\'aurait jamais été possible puisque Link est en réalité un Hylien et non un Kokiri comme Saria qui restera un enfant tout au long de sa vie. ', NULL),
(4, 31, 'La première rencontre entre Link et la princesse Ruto se passe dans le ventre de Jabu-Jabu, car celui-ci a avalé la jeune princesse. En tant que princesse des Zoras, sa tâche est en effet de nourrir le dieu protecteur de son peuple, l\'esprit de l\'eau Jabu-Jabu. Apparemment, elle est habituée à être avalée par celui-ci et a déjà exploré son ventre de nombreuses fois quand elle était petite. Cependant, cette fois-ci, elle a perdu son Saphir Zora et a également remarqué la présence anormale de monstres à l\'intérieur de l\'esprit. Ruto écrit alors une lettre qu\'elle place dans une bouteille et que Link retrouve ensuite au fond du lac Hylia.\r\n\r\nUne fois qu\'ils sont réunis dans le ventre de Jabu-Jabu, Link doit porter Ruto sur son dos (un honneur, d\'après elle) et l\'aider à retrouver le saphir. Elle se fait cependant kidnapper par un Octorok géant et Link ne la retrouvera qu\'après avoir vaincu Barinade. Saine et sauve, Ruto offre le Saphir Zora à Link, ce qui signifie pour elle qu\'à l\'âge adulte, se marieront.\r\n\r\nSept ans plus tard, le domaine Zora a été gelé et seule Ruto a pu s\'en sortir, aidée par Sheik. Elle s\'est ensuite rendue dans le temple de l\'Eau dans l\'espoir de sauver son peuple, où elle est rejointe par Link. Elle disparaît subitement après une brève rencontre et Link ne la retrouve qu\'après son combat contre Morpha. Ruto se révèle alors être une des sept sages, celle de l\'eau. ', NULL),
(4, 32, 'La première rencontre entre Link et Darunia se fait au village Goron, dans la salle du chef. Darunia étant de mauvaise humeur, il ne veut pas aider Link dans sa quête des pierres ancestrales. Seul le chant de Saria a le pouvoir de le faire danser et de le rendre joyeux. Après que Link l\'a joué à l\'ocarina, Darunia lui demande de se débarrasser des Dodongos présents dans la caverne Dodongo à cause de Ganondorf. En échange de ce service, Darunia remet à Link le rubis Goron. Par ce geste symbolique, Link et lui deviennent frères.\r\n\r\nPlus tard dans l\'aventure, Link adulte se rend à nouveau au village Goron et y rencontre le fils de Darunia, lui aussi nommé Link. Le jeune Goron explique au héros que son papa est parti dans le temple du Feu pour sauver les Gorons retenus captifs et détruire Volcania, un dragon maléfique réveillé par Ganondorf. Lorsque Link se rend au temple du Feu, il y rencontre Darunia, qui part affronter Volcania sans la masse des Titans, l\'arme légendaire du héros Goron. Il incombe donc à Link de vaincre le dragon. Ensuite, dans le Sanctuaire des Sages, Link retrouve Darunia, qui devient le Sage du Feu. ', NULL),
(4, 33, 'Link rencontre Nabooru quand il est enfant, au temple de l\'Esprit. Comme Nabooru est trop grande pour entrer dans le petit passage menant à l\'intérieur, elle demande à Link d\'aller chercher les gantelets d\'Argent, qui procurent à leur porteur une grande force. Elle compte s\'en servir pour déjouer les plans de Ganondorf. En échange, elle promet un bisou à Link. Toutefois, lorsque le jeune garçon trouve les gantelets, il voit Nabooru se faire capturer par Koume et Kotake, les sorcières qui gardent le temple.\r\n\r\nSept ans plus tard, Link adulte utilise les gantelets pour pénétrer dans le temple une nouvelle fois. À l\'intérieur, il combat deux Hache-Viandes, dont un qui s\'avère en fait être Nabooru, manipulée par les sorcières. Une fois vaincue, elle semble retrouver ses esprits, mais Koume et Kotake apparaissent immédiatement et la téléporte ailleurs pour lui re-laver le cerveau. Après que Link a battu les sorcières, Nabooru se réveille en tant que Sage de l\'Esprit (魂の賢者 Tamashī no Kenja). Juste avant de sortir du Sanctuaire des Sages, Nabooru dit qu\'elle aurait dû tenir sa promesse qu\'elle a faite à Link, sept ans auparavant. ', NULL),
(4, 34, 'Dans Ocarina of Time, Épona est une jument du ranch Lon Lon qui appartient à Talon et à sa fille. Link rencontre Malon qui lui apprend le chant d\'Épona ; ce chant permet d’appeler Épona, mais seulement si Link est dans un environnement approprié. De plus, il ne marche pas encore avant l\'ellipse : Épona est petite et doit donc rester au ranch.\n\nDans le futur, le ranch a été remis à Ingo par Ganondorf. Link, voulant récupérer Épona, doit faire une course contre Ingo autour du ranch, où la jument y est enfermée. Ingo promet de la donner au jeune Héros s\'il arrive à le battre à la course. Au final, Ingo est malhonnête, car il demande une revanche après avoir perdu une fois. Même après deux défaites d\'affilée, Ingo ne veut toujours pas libérer Épona, donc il l\'enferme avec Link dans le ranch. Chevauchée par Link, Épona saute d\'un bond par dessus la barrière du ranch et ils parviennent à s\'enfuir.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `compatible`
--

CREATE TABLE `compatible` (
  `IdJeux` int(11) NOT NULL,
  `IdConsole` int(11) NOT NULL,
  `DateSortie` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compatible`
--

INSERT INTO `compatible` (`IdJeux`, `IdConsole`, `DateSortie`) VALUES
(1, 1, '2021-07-16'),
(1, 4, '2011-11-18'),
(2, 1, '2017-03-03'),
(2, 2, '2017-03-03'),
(3, 2, '2013-10-04'),
(3, 3, '2003-05-03'),
(4, 3, '2003-03-23'),
(4, 5, '1998-11-21'),
(4, 6, '2011-06-16');

-- --------------------------------------------------------

--
-- Structure de la table `console`
--

CREATE TABLE `console` (
  `IdConsole` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `Date_Sortie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `console`
--

INSERT INTO `console` (`IdConsole`, `nom`, `Date_Sortie`) VALUES
(1, 'Nintendo Switch', '2017-3-3'),
(2, 'Wii U', '2012-11-18'),
(3, 'GameCube', '2002-5-3'),
(4, 'Wii', '2006-12-7'),
(5, 'Nintendo 64', '1997-09-01'),
(6, 'Nintendo 3DS', '2011-03-25');

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `IdJeux` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`IdJeux`, `nom`, `Description`, `photo`) VALUES
(1, 'The Legend of Zelda : Skyward Sword', ' La légende raconte qu\'une déesse éleva une partie des terres vers les cieux ainsi que les humains afin de les protéger des ténèbres. Link vit sur cette île volante du nom de Célesbourg. Après une cérémonie visant à poursuivre ses études pour devenir chevalier, son amie d\'enfance, Zelda, est emportée par une tornade. Link, peu de temps après, fait la découverte d\'une épée mystérieuse, la Skyward Sword. Il comprend dès lors que celle-ci est habitée par un esprit féminin. Cet esprit nommé Fay a été envoyé par la Déesse pour guider l\'Élu dans sa mission. Apprenant l\'existence d\'un monde en dessous de l\'île, Link part à sa découverte. Il y découvre un monde d\'une grande beauté, mais teinté par la présence des Ténèbres, un monde où il doit retrouver Zelda. ', 'Images/jeux/SkywardSword.jpg'),
(2, 'The Legend of Zelda : Breath of the Wild', '   Oubliez tout ce que vous savez sur les jeux The Legend of Zelda. Plongez dans un monde de découverte, d\'exploration et d\'aventure dans The Legend of Zelda : Breath of the Wild, un nouveau jeu qui vient bouleverser la série à succès. Voyagez à travers des champs, des forêts et grimpez sur des sommets dans votre périple où vous explorez le royaume d\'Hyrule en ruines, à travers cette aventure à ciel ouvert.', 'Images/jeux/BOTW.jpg'),
(3, 'The legend of zelda: wind waker', '  The Legend of Zelda : The Wind Waker est un jeu d\'action/aventure sur Gamecube. La légende raconte qu\'à chaque fois où le mal est apparu, un héros nommé Link a surgi pour le combattre. Cette fois, l\'histoire se poursuit sur une mer vaste et mystérieuse et entraîne Link dans une épopée aussi grandiose que terrifiante à la rescousse de sa soeur. Aidé de la Baguette du Vent, Link devra discuter avec des tas de personnages, parcourir plusieurs donjons et défaire de nombreux ennemis et boss.', 'Images/jeux/WindWaker.jpg'),
(4, 'The Legend of Zelda: Ocarina of Time', '  Ocarina of Time raconte l\'histoire de Link, un jeune garçon vivant dans un village perdu dans la forêt, qui parcourt le royaume d\'Hyrule pour empêcher Ganondorf d\'obtenir la Triforce, une relique sacrée partagée en trois : le courage (Link), la sagesse (Zelda) et la force (Ganondorf). La Triforce, une fois rassemblée, donne à son détenteur des pouvoirs surhumains. Le principal antagoniste du jeu, Ganondorf, la désire pour pouvoir régner sur le monde. Par conséquent, Link devra voyager dans le temps grâce à son ocarina et retrouver les sept sages qui lui permettront d\'enfermer Ganondorf dans un sceau dimensionnel. ', 'Images/jeux/OOT.png');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `Id_topic` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_Message` int(11) NOT NULL,
  `contenu` text DEFAULT NULL,
  `h_message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`Id_topic`, `Id_utilisateur`, `Id_Message`, `contenu`, `h_message`) VALUES
(3, 1, 7, 'T\'es charmante , ça te dirais une glace à la menthe', ''),
(3, 1, 10, 'Coucou bae', ''),
(3, 1, 11, 'yo', ''),
(3, 1, 12, 'yo', ''),
(3, 1, 13, 'bae t\'as des krampé ?', ''),
(3, 1, 14, 'Apagnon', ''),
(3, 6, 3, 'bonjour', ''),
(3, 6, 15, 'Kouakoubé', ''),
(6, 1, 6, 'Besoin d\'aide pour vaincre le boss final , ça fait 5 fois que j\'essaye', ''),
(6, 1, 16, 'yo', '2024-02-23 11:57:30');

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `IdPersonnage` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Sexe` char(1) NOT NULL,
  `photo` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnage`
--

INSERT INTO `personnage` (`IdPersonnage`, `Nom`, `Sexe`, `photo`) VALUES
(1, 'Zelda', 'F', 'Images/personnages/Zelda.jpg'),
(2, 'Link', 'H', 'Images/personnages/Link.jpg'),
(3, 'Celestin', 'H', 'Images/personnages/Celestin.jpg'),
(4, 'Hergo', 'H', 'Images/personnages/Hergo.jpg'),
(5, 'Fay', 'F', 'Images/personnages/fay.jpg'),
(6, 'Le Banni', 'I', 'Images/personnages/Banni.jpg'),
(7, 'Avatar du Néant', 'H', 'Images/personnages/Avatar.png'),
(8, 'Ghirahim', 'H', 'Images/personnages/Ghirahim.jpg'),
(9, 'Impa', 'F', 'Images/personnages/Impa.jpg'),
(10, 'Revali', 'H', 'Images/personnages/Revali.jpg'),
(11, 'Mipha', 'F', 'Images/personnages/Mipha.jpg'),
(12, 'Daruk', 'H', 'Images/personnages/Daruk.jpg'),
(13, 'Urbossa', 'F', 'Images/personnages/Urbossa.jpg'),
(14, 'Roi Rhoam', 'H', 'Images/personnages/Roi-Rhoam.png'),
(15, 'Le Grand Kohga', 'H', 'Images/personnages/Kohga.jpg'),
(16, 'Noïa', 'I', 'Images/personnages/Noia.jpg'),
(17, 'Arbre Mojo', 'I', 'Images/personnages/ArbreMojo.jpg'),
(18, 'ganon', 'I', 'Images/personnages/Ganon.jpg'),
(19, 'Arielle', 'F', 'Images/personnages/Arielle.png'),
(20, 'Tetra', 'F', 'Images/personnages/Tetra.jpg'),
(21, 'Ganondorf', 'H', 'Images/personnages/Ganondorf.jpg'),
(22, 'Lion Rouge', 'I', 'Images/personnages/Lion.jpg'),
(23, 'Daphnès Nohansen Hyrule', 'H', 'Images/personnages/Roi.jpg'),
(24, 'Médolie', 'F', 'Images/personnages/Melodie.jpg'),
(25, 'Terry', 'H', 'Images/personnages/Terry.jpg'),
(26, 'Link (enfant)', 'H', 'Images/personnages/Link(enfant).jpg'),
(27, 'Zelda (enfant)', 'F', 'Images/personnages/Zelda(enfant).png'),
(28, 'Sheik', 'F', 'Images/personnages/Sheik.jpg'),
(29, 'Navi', 'I', 'Images/personnages/Navi.jpg'),
(30, 'Saria', 'F', 'Images/personnages/Saria.png'),
(31, 'Ruto', 'F', 'Images/personnages/Ruto.jpg'),
(32, 'Darunia', 'H', 'Images/personnages/Darunia.jpg'),
(33, 'Nabooru', 'F', 'Images/personnages/Naborro.jpg'),
(34, 'Epona', 'F', 'Images/personnages/Epona.png');

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `Id_topic` int(11) NOT NULL,
  `date_ajout` datetime DEFAULT NULL,
  `libelle` varchar(200) DEFAULT NULL,
  `Id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`Id_topic`, `date_ajout`, `libelle`, `Id_utilisateur`) VALUES
(3, '2023-04-10 15:51:29', 'coucou', 6),
(6, '2023-04-10 21:40:24', 'Bloqué dans la créature divine de foudre', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typesexe`
--

CREATE TABLE `typesexe` (
  `idSexe` char(1) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typesexe`
--

INSERT INTO `typesexe` (`idSexe`, `libelle`) VALUES
('F', 'Féminin'),
('H', 'Masculin'),
('I', 'Inconnu');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_utilisateur`, `nom`, `prenom`, `email`, `mdp`, `pseudo`, `photo`) VALUES
(1, 'totot', 'totto', 'toto@toto.fr', 'f71dbe52628a3f83a77ab494817525c6', 'toto', ''),
(4, 'toto', 'toto', 'fr@toto.fr', 'f71dbe52628a3f83a77ab494817525c6', 'grg', NULL),
(5, 'toto', 'tata', 'to@yo.fr', 'f71dbe52628a3f83a77ab494817525c6', 'yo', NULL),
(6, 'tata', 'tat', 'tata@tata.fr', 'f71dbe52628a3f83a77ab494817525c6', 'tata', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`IdJeux`,`IdPersonnage`),
  ADD KEY `IdPersonnage` (`IdPersonnage`);

--
-- Index pour la table `compatible`
--
ALTER TABLE `compatible`
  ADD PRIMARY KEY (`IdJeux`,`IdConsole`),
  ADD KEY `IdConsole` (`IdConsole`);

--
-- Index pour la table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`IdConsole`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`IdJeux`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id_topic`,`Id_utilisateur`,`Id_Message`),
  ADD UNIQUE KEY `Id_Message` (`Id_Message`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`IdPersonnage`),
  ADD KEY `Sexe` (`Sexe`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`Id_topic`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `typesexe`
--
ALTER TABLE `typesexe`
  ADD PRIMARY KEY (`idSexe`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `console`
--
ALTER TABLE `console`
  MODIFY `IdConsole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `IdJeux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `Id_Message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `IdPersonnage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `Id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`IdJeux`) REFERENCES `jeux` (`IdJeux`),
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`IdPersonnage`) REFERENCES `personnage` (`IdPersonnage`);

--
-- Contraintes pour la table `compatible`
--
ALTER TABLE `compatible`
  ADD CONSTRAINT `compatible_ibfk_1` FOREIGN KEY (`IdJeux`) REFERENCES `jeux` (`IdJeux`),
  ADD CONSTRAINT `compatible_ibfk_2` FOREIGN KEY (`IdConsole`) REFERENCES `console` (`IdConsole`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`Id_topic`) REFERENCES `topic` (`Id_topic`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Contraintes pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD CONSTRAINT `fk_perso_sexe` FOREIGN KEY (`Sexe`) REFERENCES `typesexe` (`idSexe`);

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
