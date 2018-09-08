-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Bann`
--

DROP TABLE IF EXISTS `Bann`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bann` (
  `id_ban` int(11) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `nickname_ban` varchar(47) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bann`
--

LOCK TABLES `Bann` WRITE;
/*!40000 ALTER TABLE `Bann` DISABLE KEYS */;
INSERT INTO `Bann` VALUES (1,'72.232.213.210','astrology find moon sign\"\r\n\"2'),(3,'201.254.97.17','bbw brunetteastrology easy guide horoscope read'),(5,'80.166.56.44','babe brunette fucked hot\"\r\n\"6'),(7,'83.103.236.238','Free Movies\"\r\n\"8'),(9,'72.232.200.210','astrology free hindi horoscope in\"\r\n\"10'),(11,'62.205.74.196','brunette anal\"\r\n\"12'),(13,'72.237.18.137','polyphonic ringtones\"\r\n\"14'),(15,'200.176.41.21','brunette boob\"\r\n\"16'),(17,'200.138.34.67','astrology gemini sign\"\r\n\"18'),(19,'122.18.75.233','black midget porn\"\r\n\"20'),(21,'83.55.185.122','astrology horoscope sign\"\r\n\"22'),(23,'67.99.20.45','brunette bikini\"\r\n\"24'),(25,'217.7.100.131','astrology handbook i vedic\"\r\n\"26'),(27,'218.98.221.102','bcra lites midget sale\"\r\n\"28'),(29,'72.232.47.34','astrology in scorpio venus\"\r\n\"30'),(31,'84.174.113.38','astrology image pisces sign\"\r\n\"32'),(33,'163.148.100.85','gemini turntable\"\r\n\"34'),(35,'127.0.0.1','astrology horoscope symbol\"\r\n\"36'),(37,'201.17.188.37','mahalia jackson songs\"\r\n\"38'),(39,'192.168.10.135','brunette babes\"\r\n\"40'),(41,'60.242.17.34','astrology scorpio weekly\"\r\n\"42'),(43,'72.225.201.152','Free Movies\"\r\n\"44'),(45,'58.226.223.4','astrology sagittarius sign\"\r\n\"46'),(47,'202.42.86.107','big boob brunette\"\r\n\"48'),(49,'124.216.25.114','astrology relationship compatibility\"\r\n\"50'),(51,'211.48.62.49','astrology picture sign zodiac\"\r\n\"52'),(53,'201.42.211.29','edition home uninstall window xp\"\r\n\"54'),(55,'62.20.56.21','astrology numerology services vaastu\"\r\n\"56'),(57,'201.20.117.74','astrology msn url\"\r\n\"58'),(59,'211.205.17.45','brunette cum hot\"\r\n\"60'),(61,'58.61.154.228','astrology matches sign\"\r\n\"62'),(63,'59.171.155.78','astrology leo man\"\r\n\"64'),(65,'63.64.185.249','amateur hot brunette\"\r\n\"66'),(67,'59.95.30.249','used cases\"\r\n\"68'),(69,'62.57.67.76','astrology soul\"\r\n\"70'),(71,'200.176.32.23','astrologyyahoocom astrology compatibility love\"'),(73,'61.17.198.74','best free pc game\"\r\n\"74'),(75,'200.208.102.14','astrology zone\"\r\n\"76'),(77,'200.88.46.58','astrology weekly horoscope\"\r\n\"78'),(79,'125.35.6.221','\"buy phentermine online\"\r\n');
/*!40000 ALTER TABLE `Bann` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Guestbook`
--

DROP TABLE IF EXISTS `Guestbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Guestbook` (
  `id_guest` int(11) DEFAULT NULL,
  `Nick_guest` varchar(8) DEFAULT NULL,
  `Data_guest` varchar(19) DEFAULT NULL,
  `Mail_guest` varchar(28) DEFAULT NULL,
  `Link_guest` varchar(41) DEFAULT NULL,
  `Indirizzo_ip` varchar(14) DEFAULT NULL,
  `Commento_Guest` varchar(241) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Guestbook`
--

LOCK TABLES `Guestbook` WRITE;
/*!40000 ALTER TABLE `Guestbook` DISABLE KEYS */;
INSERT INTO `Guestbook` VALUES (1,'Veronica','2005-11-23 00:20:11','veronica_aires@yahoo.it','','62.101.126.238','Finalmente ce l&#39ho fatta! <br>Ora il Guestbook è pronto e funzionante!<br>Che aspettate a lasciare un vostro commento?!?! <br><br>Ciao ciao!!\"\r\n\"2'),(3,'Riccardo','2005-11-24 12:15:34','riccardo.barioglio@gmail.com','','','Ottimo lavoro.\"\r\n\"4'),(5,'mami','2005-11-26 15:13:27','','','','BRAVA VERONICA! MI PIACE.\"\r\n\"6'),(7,'Veronica','2005-12-19 11:22:45','veronica_aires@yahoo.it','','62.101.126.238','Come potrete notare ho sostituito la vecchia versione del sito con questa nuova! <br>Ancora non è finito (soprattutto la parte per la gestione interna del sito) ma è un inizio... Solo un po&#39 di pazienza e sarà tutto a posto! <br><br>Ciao!'),(9,'Veronica','2006-03-20 16:01:18','veronica_aires@yahoo.it','','62.101.126.238','Grazie mille!!! In effetti non è stato così rapido metterlo più o meno a posto e neanche ora è perfetto comunque... CIAO!!! :-)\"\r\n\"10'),(11,'Veronica','2007-01-19 09:46:28','veronica_aires@yahoo.it','','62.101.126.238','\"A quanto pare non ha funzionato molto bene questo metodo per cui chiudo nuovamente il Guestbook nella speranza di riuscire a trovare un metodo più efficace per evitare lo spam! Scusate per il disagio. Veronica\"\r\n');
/*!40000 ALTER TABLE `Guestbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Repertorio`
--

DROP TABLE IF EXISTS `Repertorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Repertorio` (
  `id_canti` int(11) DEFAULT NULL,
  `Gruppo_id` int(11) DEFAULT NULL,
  `Titolo` varchar(27) DEFAULT NULL,
  `Armonizzazione` varchar(46) DEFAULT NULL,
  `Testo` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Repertorio`
--

LOCK TABLES `Repertorio` WRITE;
/*!40000 ALTER TABLE `Repertorio` DISABLE KEYS */;
INSERT INTO `Repertorio` VALUES (1,4,'Erile ba boela hae','Spiritual Africano',''),(3,3,'Venite o pastori','arm. R. Dionisi',''),(5,3,'I tre re dell’oriente','arm. L. Pigarelli',''),(7,3,'Gloria in cielo','arm. G. Soli',''),(9,3,'Astro del ciel','arm. L. Molfino',''),(11,2,'L&#39ange Gabriel annonce','testo di J. P. Lécot; musica di N. Darros',''),(13,2,'Jubilate Deo','W. A. Mozart',''),(15,2,'Stabat Mater','testo di Jacopone da Todi; musica di Z. Kodaly',''),(17,2,'Tantum Ergo','M. Gandini',''),(19,2,'Sacris Solemnis','M. Gandini',''),(21,2,'Ave Maria','F. L. Luciani',''),(23,2,'Preghiera','R. Padoin',''),(25,1,'Sul Ciastel de Mirabel','arm. L. Pigarelli',''),(27,1,'Doman l’è festa','arm. L. Pigarelli',''),(29,1,'Signore delle Cime','Bepi De Marzi',''),(31,1,'Tre colombe bianche','arm. A. Agazzani',''),(33,1,'Entorno al fòch','arm. A. Benedetti Michelangeli',''),(35,1,'La scelta felice','arm. A. Benedetti Michelangeli',''),(37,1,'Fila, fila','ricostruz. L. Pigarelli',''),(39,1,'Quando ero picolina','arm. L. Chailly',''),(41,1,'La bela giardiniera','arm. G. Veneri',''),(43,1,'La cima del Montello','arm. P. Bon',''),(45,1,'Senti ‘l martelo','arm. R. Dionisi',''),(47,1,'Non potho reposare','G. Rachel; arm. M. Casula',''),(49,1,'A l’ombra do fòo','P. Fornelli; arm. Provera',''),(51,1,'Lu piante de le fòjje','G. Albanese; arm. L. Pigarelli',''),(53,1,'Piccola Suite Infantile','elaboraz. P. Bon',''),(55,1,'Montagne Addio!','G. Bregani; arm. L. Pietropoli',''),(57,1,'Montenero','rielaboraz. P. Bon',''),(59,1,'O Carlota','arm. C. Vettorazzi',''),(61,1,'Voici venir la nuit','arm. L. Pietropoli',''),(63,1,'Martina &#39d Carlivè','arm. A. Agazzani',''),(70,1,'Dove te vett, o Mariettina','arm. A. Mazza',''),(68,3,'Joy to the world!','L. Mason; arm. J. Rutter',''),(72,4,'The lion sleeps tonight','arm. V. Guerci',''),(74,1,'Aria Paesana','D. Conrero',''),(76,4,'La luce del giorno','testo di G. Pillonetto; musica di R. Padoin',''),(78,4,'Il leon','C. Favaro',''),(83,3,'Oggi è Natale','C. Favaro',''),(85,4,'Ambra','R. Bertoldo',''),(87,2,'Bogoroditse Devo, raduisya','S. Rachmaninov',''),(89,1,'Cortesani','Bepi De Marzi',''),(93,4,'La Neige','C. Favaro',''),(95,4,'Yesterday','J. Lennon, P. McCartney',''),(97,4,'You Are The New Day','J. David - Arr. P. Knight',''),(99,2,'O Magnum mysterium','I. Antognini','');
/*!40000 ALTER TABLE `Repertorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Storia`
--

DROP TABLE IF EXISTS `Storia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Storia` (
  `storiaCoro` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Storia`
--

LOCK TABLES `Storia` WRITE;
/*!40000 ALTER TABLE `Storia` DISABLE KEYS */;
INSERT INTO `Storia` VALUES ('\"<img src=\"img/gruppo1home.jpg\" border=0 align=right  height=\"260\" width=\"381\" alt=\"\"><br><!--<center><b>LA STORIA DELLA CORALITA&#39 VIUCESE</b></center>--><br>Il coro a quattro voci miste Coralità Viucese nasce nel 1997 e si costituisce ufficialmente nell’anno 2000. Fin dalla sua nascita è diretto da Vittorio Guerci. Il suo repertorio comprende canti popolari e di montagna,  brani natalizi, musica sacra, polifonica e contemporanea.<br><br>Il suo spirito innovativo e la sua dinamicità fanno sì che nel giro di pochi mesi venga coinvolta in concerti di una certa rilevanza: con il Coro CAI UGET di Torino, con la sezione corale della Brigata Taurinense e in numerose serate con i principali gruppi musicali della zona. L’anno successivo, nell’estate 2000, partecipa alla Rassegna Interregionale “Montagne di Note” con i cori Stellina, G. PL. da Palestrina di Meana Sardo (NU) e A.N.A. Cesen di Valdobbiadene (TV).<br><br>Nel 2001 la Coralità Viucese interviene nel concerto di musiche del maestro Marco Gandini organizzato dal Conservatorio “G. Verdi” di Torino, presentando alcuni brani dell’autore. Nel 2002 partecipa al “4° Concorso Nazionale di Cori Provincia e Città di Biella”. Nel 2003 prende parte alla 1a Rassegna Corale di Valdobbiadene con i cori A.N.A. Cesen e Montecimon e alla manifestazione “Les Heures Chantantes” di Chambéry, in Francia, con la Chorale de Bel’Air di Francheville.<br><br>Dal 2004 a oggi la Coralità Viucese ha ulteriormente consolidato e intensificato la sua attività. Il Coro è ormai apprezzato non solo nelle valli e nei paesi limitrofi, ma anche nell’intera provincia e città di Torino, oltre che nel Biellese, Cuneese, in Valle d’Aosta e in Puglia. Numerose sono le partecipazioni alle Rassegne corali regionali organizzate dall’Associazione Cori Piemontesi, quali “Cantiamo a…” (edizioni 2002, 2004 e 2007) e “Piemonte in… Canto” (edizione 2010, in cui si è classificata tra i 6 migliori cori partecipanti).<br><br>Negli ultimi anni di attività, forte della presenza di molti giovani elementi, la Coralità Viucese ha scelto di lavorare anche su altri fronti e di vagliare come il canto corale si possa incontrare con altre forme di musica e di arte. In questo senso sono state molto significative la sua collaborazione con solisti di fama a serate di operetta organizzate presso Villa Franchetti a Viù e la sua partecipazione attiva agli spettacoli teatrali della compagnia teatrale C.A.S.T., in particolare a quelli della Kermesse delle Valli “Fragorcudì” dell’estate 2009, che hanno avuto luogo in tutti i principali comuni delle Valli di Lanzo.<br><br>Sempre all’insegna della ricerca di nuovi percorsi, la Coralità Viucese si è recentemente cimentata con nuove tipologie di brani, sia per soddisfare il gusto dei coristi più giovani, sia per continuare il suo processo di crescita musicale. Ora fanno quindi parte del suo repertorio anche pezzi di polifonia contemporanea e arrangiamenti di gruppi vocali moderni. Alcuni di questi sono stati incisi insieme con i canti popolari e di montagna nel cd “Specchio”, pubblicato nell’estate 2010, in occasione dei primi dieci anni di attività del coro.<br><br><br><center><a href=\"uscite.asp\"><img src=\"img/prossimi_concerti.png\" alt=\"\" /></a></center>\"\r\n');
/*!40000 ALTER TABLE `Storia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gruppo_Repertorio`
--

DROP TABLE IF EXISTS `gruppo_Repertorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gruppo_Repertorio` (
  `id_gruppo_repertorio` int(11) DEFAULT NULL,
  `descrizione_gruppo` varchar(34) DEFAULT NULL,
  `ordine_gruppo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gruppo_Repertorio`
--

LOCK TABLES `gruppo_Repertorio` WRITE;
/*!40000 ALTER TABLE `gruppo_Repertorio` DISABLE KEYS */;
INSERT INTO `gruppo_Repertorio` VALUES (1,'CANTI POPOLARI E DI MONTAGNA',1),(3,'BRANI NATALIZI',4);
/*!40000 ALTER TABLE `gruppo_Repertorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informazioniSito`
--

DROP TABLE IF EXISTS `informazioniSito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informazioniSito` (
  `idCoro` int(11) DEFAULT NULL,
  `nomeCoro` varchar(16) DEFAULT NULL,
  `indirizzoCoro` varchar(47) DEFAULT NULL,
  `codiceFiscaleCoro` int(11) DEFAULT NULL,
  `nomePresidente` varchar(17) DEFAULT NULL,
  `nomeDirettore` varchar(15) DEFAULT NULL,
  `telefonoPresidente` varchar(5) DEFAULT NULL,
  `telefonoDirettore` varchar(11) DEFAULT NULL,
  `mailPresidente` varchar(27) DEFAULT NULL,
  `mailDirettore` varchar(24) DEFAULT NULL,
  `newsSitoCoro` varchar(42) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informazioniSito`
--

LOCK TABLES `informazioniSito` WRITE;
/*!40000 ALTER TABLE `informazioniSito` DISABLE KEYS */;
INSERT INTO `informazioniSito` VALUES (1,'Coralità Viucese','Via Madonna della Neve, 13 - 10070 Viù (Torino)',2147483647,'Silvia Migliorero','Vittorio Guerci','vuoto','0123 696107','migliorero.silvia@gmail.com','guercivittorio@gmail.com','\"Per il momento non serve più questa parte');
/*!40000 ALTER TABLE `informazioniSito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginCoro`
--

DROP TABLE IF EXISTS `loginCoro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loginCoro` (
  `nickname` varchar(8) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `mailGenerico` varchar(27) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginCoro`
--

LOCK TABLES `loginCoro` WRITE;
/*!40000 ALTER TABLE `loginCoro` DISABLE KEYS */;
INSERT INTO `loginCoro` VALUES ('coralita','corocoro','silvia.migliorero@libero.it');
/*!40000 ALTER TABLE `loginCoro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quandoGiornata_Uscite`
--

DROP TABLE IF EXISTS `quandoGiornata_Uscite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quandoGiornata_Uscite` (
  `id_quando` int(11) DEFAULT NULL,
  `descrizione_quando` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quandoGiornata_Uscite`
--

LOCK TABLES `quandoGiornata_Uscite` WRITE;
/*!40000 ALTER TABLE `quandoGiornata_Uscite` DISABLE KEYS */;
INSERT INTO `quandoGiornata_Uscite` VALUES (1,'-\"\r\n\"2'),(3,'Pomeriggio'),(5,'Weekend\"\r\n');
/*!40000 ALTER TABLE `quandoGiornata_Uscite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registroUscite`
--

DROP TABLE IF EXISTS `registroUscite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registroUscite` (
  `id_uscita` int(11) DEFAULT NULL,
  `data_inizio` varchar(19) DEFAULT NULL,
  `data_fine` varchar(19) DEFAULT NULL,
  `quandoDescrizione` varchar(10) DEFAULT NULL,
  `luogo_uscita` varchar(47) DEFAULT NULL,
  `dettagli_uscita` varchar(145) DEFAULT NULL,
  `indirizzoFileVolantini` varchar(49) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registroUscite`
--

LOCK TABLES `registroUscite` WRITE;
/*!40000 ALTER TABLE `registroUscite` DISABLE KEYS */;
INSERT INTO `registroUscite` VALUES (144,'2008-06-21 00:00:00','2008-06-21 00:00:00','21:00','Viù (To)','Rassegna Corale Estiva organizzata dalla Coralità Viucese. Cori Ospiti: CORO VIVAVOCE di Donnas, CORO MINIMO di Burolo e CORO STELLINA di Viù','\"\r\n\"146'),(147,'2008-05-10 00:00:00','2008-05-10 00:00:00','21:00','Pessinetto Fuori (To)','Concerto nella Chiesa Parrocchiale','\"\r\n\"148'),(149,'2008-06-07 00:00:00','2008-06-08 00:00:00','Weekend','alle Cinque Terre (SP)','Stage canoro e Gita del coro','\"\r\n\"150'),(151,'2008-10-25 00:00:00','2008-10-25 00:00:00','21:00','Venaria (To)','Rassegna Tematica organizzata dal Coro Tre Valli','Doc_Volantini/Volantino_251008.pdf\"\r\n\"152'),(153,'2008-12-07 00:00:00','2008-12-07 00:00:00','10:00','Viù, Chiesa Parrocchiale','Animazione S. Messa (la S.Messa verrà trasmessa in diretta su Rete 4)','\"\r\n\"154'),(155,'2009-01-04 00:00:00','2009-01-04 00:00:00','9:30','Viù (To)','Animazione della S.Messa presso il Cottolengo','\"\r\n\"157'),(158,'2009-06-06 00:00:00','2009-06-06 00:00:00','21:00','Donnas (Ao)','5&#39 Rassegna Corale','\"\r\n\"159'),(160,'2009-08-05 00:00:00','2009-08-05 00:00:00','21:00','Viù (To)','Concerto estivo nella Chiesa Parrocchiale','\"\r\n\"161'),(162,'2009-08-09 00:00:00','2009-08-09 00:00:00','21:30','Viù (To)','Partecipazione alla Rassegna Teatrale FRAGORCUDI&#39 a cura di CAST','\"\r\n\"163'),(164,'2009-07-25 00:00:00','2009-07-25 00:00:00','21:30','Groscavallo (To)','Partecipazione alla Rassegna Teatrale FRAGORCUDI&#39 a cura di CAST','\"\r\n\"165'),(166,'2009-08-01 00:00:00','2009-08-01 00:00:00','21:30','Ala di Stura (To)','Partecipazione alla Rassegna Teatrale FRAGORCUDI&#39 a cura di CAST','\"\r\n\"167'),(168,'2009-10-02 00:00:00','2009-10-02 00:00:00','21:00','Germagnano (To)','Partecipazione alla presentazione del libro di Gianni Oliva &#39Alpini - 140 anni di storia ed eroismi&#39','\"\r\n\"169'),(139,'2007-11-10 00:00:00','2007-11-10 00:00:00','15:30','Viù (TO)','festa patronale di San Martino - concerto al Centro Polifunzionale','\"\r\n\"140'),(142,'2007-12-26 00:00:00','2007-12-26 00:00:00','21:00','Viù (TO)','Concerto di Natale presso il Centro Polifunzionale','\"\r\n\"143'),(170,'2009-11-28 00:00:00','2009-11-28 00:00:00','21:00','Monastero di Lanzo (To)','Partecipazione alla presentazione del libro di Gianni Oliva &#39Alpini - 140 anni di storia ed eroismi&#39','\"\r\n\"171'),(172,'2010-04-18 00:00:00','2010-04-18 00:00:00','15:00','San Maurizio C.se (To)','Concerto presso Azienda Regionale Sanitaria u.s.l. n.6 r.s.a. - Via Ceretta Inferiore, 93','\"\r\n\"173'),(174,'2010-09-11 00:00:00','2010-09-11 00:00:00','21:00','Pessinetto (To)','Concerto presso il Santuario di Sant&#39Ignazio e presentazione del nuovo CD della Coralità Viucese','/Doc_Volantini/Volantino_060810.jpg\"\r\n\"175'),(177,'2010-10-17 00:00:00','2010-10-17 00:00:00','15:00','Vallo (To)','Concerto presso Casa Olivero','\"\r\n\"178'),(179,'2010-08-14 00:00:00','2010-08-14 00:00:00','21:00','Viù (To)','Animazione S.Rosario presso il Santuario Madonna della Salette','\"\r\n\"180'),(181,'2010-07-04 00:00:00','2010-07-04 00:00:00','10:30','Usseglio (To)','Animazione S.Messa presso la Chiesa Parrocchiale','\"\r\n\"182'),(183,'2010-09-25 00:00:00','2010-09-25 00:00:00','21:00','Lemie (To)','Concerto presso la Chiesa Parrocchiale per la festa di S.Michele','\"\r\n\"184'),(187,'2010-09-26 00:00:00','2010-09-26 00:00:00','15:00','Alba (Cn)','Festival della Coralità Piemontese, giornata conclusiva presso la  chiesa di S. Domenico','Doc_Volantini/manifesto_26_9_2010.pdf\"\r\n\"188'),(189,'2010-11-28 00:00:00','2010-11-28 00:00:00','16:00','Traves','Concerto di Natale presso la Chiesa Parrocchiale','\"\r\n\"190'),(191,'2010-12-29 00:00:00','2010-12-29 00:00:00','21:00','Viù (TO)','Concerto di Natale presso il Centro Polifunzionale di Viù con la partecipazione del gruppo di ottoni \"Rhythm and Brass\" e dei bimbi dell&#39asilo','\"\r\n\"192'),(193,'2011-03-20 00:00:00','2011-03-20 00:00:00','15:00','Varisella (TO)','Concerto presso la RSA di Varisella','\"\r\n\"194'),(195,'2011-07-09 00:00:00','2011-07-09 00:00:00','21:00','Chialamberto (TO)','Concerto estivo presso la Chiesa Parrocchiale','\"\r\n\"197'),(198,'2011-08-05 00:00:00','2011-08-05 00:00:00','21:00','Viù (TO)','Concerto estivo presso la Chiesa Parrocchiale','Doc_Volantini/manifesto_5_8_2011.pdf\"\r\n\"199'),(200,'2011-06-26 00:00:00','2011-06-26 00:00:00','11:30','Briançon (Francia)','Concerto presso la Collégiale Saint Nicolas','\"\r\n\"201'),(202,'2011-12-08 00:00:00','2011-12-08 00:00:00','16:30','Viù (TO)','Animazione S.Rosario e vespri presso la Cappella di Villa Schiari in diretta radiofonica su Radio Maria','\"\r\n\"203'),(204,'2012-02-26 00:00:00','2012-02-26 00:00:00','21:30','Rivarolo (TO)','Concerto presso la Chiesa di San Giacomo con il Coro Polifonico Città di Rivarolo','/Doc_Volantini/locandina_26feb12.pdf\"\r\n\"205'),(206,'2012-10-06 00:00:00','2012-10-06 00:00:00','21:00','Agliè (TO)','26° rassegna “Settembre in Coro”','Doc_Volantini/sett_in_coro_6_10_2012.pdf\"\r\n\"208'),(209,'2012-08-03 00:00:00','2012-08-03 00:00:00','21:00','Viù (TO)','Concerto estivo presso la Chiesa Parrocchiale','\"\r\n\"210'),(211,'2012-06-30 00:00:00','2012-06-30 00:00:00','21:00','Ceresole Reale (TO)','Concerto \"Buon Compleanno Parco\" nel Salone delle Feste del Gran Hotel di Ceresole','/Doc_Volantini/locandina_alborada_30_6_01_7.pdf\"\r'),(214,'2012-06-17 00:00:00','2012-06-17 00:00:00','10:30','Viù (TO)','Animazione S.Messa in occasione della visita pastorale dell&#39arcivescovo Cesare Nosiglia','\"\r\n\"1'),(2,'1999-08-16 00:00:00','1999-08-16 00:00:00','Pomeriggio','frazione Tornetti di Viù (TO)','Li Tornòt d’in bòt - canti in piazza e concerto in chiesa','\"\r\n\"3'),(4,'1999-12-24 00:00:00','1999-12-24 00:00:00','Sera','Viù (TO)','esecuzione di brani natalizi aspettando la S. Messa di Mezzanotte','\"\r\n\"5'),(6,'2000-01-29 00:00:00','2000-01-29 00:00:00','Sera','Vallo (TO)','festa Don Bosco e i giovani 2000','\"\r\n\"7'),(8,'2000-07-07 00:00:00','2000-07-07 00:00:00','Sera','Balangero (TO)','Montagne di Note - concerto a Balangero, Parco Villa Copperi','\"\r\n\"9'),(10,'2000-07-08 00:00:00','2000-07-08 00:00:00','Sera','Viù (TO)','Montagne di Note - concerto in chiesa','\"\r\n\"11'),(12,'2000-08-05 00:00:00','2000-08-05 00:00:00','Sera','frazione Polpresa di Viù (TO)','festa patronale di S. Lorenzo - concerto in chiesa','\"\r\n\"13'),(14,'2000-08-13 00:00:00','2000-08-13 00:00:00','Mattino','Usseglio (TO)','animazione della S. Messa','\"\r\n\"15'),(16,'2000-08-18 00:00:00','2000-08-18 00:00:00','Sera','frazione Bogliano di Mezzenile (TO)','festa patronale di S. Bernardo - concerto in piazza','\"\r\n\"17'),(18,'2000-09-09 00:00:00','2000-09-09 00:00:00','Pomeriggio','frazione Savoulx di Oulx (TO)','Fète d’“La Valaddo” - concerto in piazza','\"\r\n\"19'),(20,'2000-11-11 00:00:00','2000-11-11 00:00:00','Pomeriggio','Viù (TO)','festa patronale di S. Martino - concerto al capannone','\"\r\n\"21'),(22,'2000-12-09 00:00:00','2000-12-09 00:00:00','Sera','Viù (TO)','concerto a favore degli alluvionati della Valle di Viù','\"\r\n\"23'),(24,'2000-12-29 00:00:00','2000-12-29 00:00:00','Sera','frazione Savoulx di Oulx (TO)','concerto natalizio in chiesa','\"\r\n\"25'),(26,'2001-03-18 00:00:00','2001-03-18 00:00:00','Sera','Torino','concerto di musiche di Marco Gandini','\"\r\n\"27'),(28,'2001-05-20 00:00:00','2001-05-20 00:00:00','Pomeriggio','Viù (TO)','partecipazione allo spettacolo teatrale della scuola di Viù','\"\r\n\"29'),(30,'2001-06-14 00:00:00','2001-06-14 00:00:00','Sera','Mezzenile (TO)','concerto nel teatro parrocchiale','\"\r\n\"31'),(32,'2001-08-25 00:00:00','2001-08-25 00:00:00','Sera','Viù (TO)','concerto estivo nella Confraternita','\"\r\n\"33'),(34,'2001-09-08 00:00:00','2001-09-08 00:00:00','Pomeriggio','Viù (TO)','animazione della S. Messa alla Madonna di Prà Colèt','\"\r\n\"35'),(39,'2001-10-06 00:00:00','2001-10-06 00:00:00','Sera','Germagnano (TO)','festa dell’AVIS - concerto in Chiesa','\"\r\n\"40'),(41,'2001-11-11 00:00:00','2001-11-11 00:00:00','Pomeriggio','Viù (TO)','festa patronale di S. Martino - concerto al capannone','\"\r\n\"42'),(43,'2001-12-29 00:00:00','2001-12-29 00:00:00','Sera','Oulx (TO), frazione Savoulx','concerto natalizio in chiesa','\"\r\n\"44'),(45,'2002-05-19 00:00:00','2002-05-19 00:00:00','Mattino','Usseglio (TO)','animazione S. Messa della Pentecoste','\"\r\n\"46'),(47,'2002-08-18 00:00:00','2002-08-18 00:00:00','Mattino','Usseglio (TO)','animazione S. Messa','\"\r\n\"48'),(49,'2002-08-31 00:00:00','2002-08-31 00:00:00','Sera','Ceres (TO)','concerto per Don Celestino','\"\r\n\"50'),(51,'2002-09-08 00:00:00','2002-09-08 00:00:00','Mattino','Viù (TO), frazione Fubina','festa patronale di S. Michele - animazione della S. Messa','\"\r\n\"53'),(54,'2002-11-10 00:00:00','2002-11-10 00:00:00','Mattino','Viù (TO)','festa patronale di San Martino, animazione della S. Messa','\"\r\n\"55'),(56,'2002-12-14 00:00:00','2002-12-14 00:00:00','Sera','Prascorsano (TO)','concerto in chiesa','\"\r\n\"57'),(58,'2002-12-21 00:00:00','2002-12-21 00:00:00','Sera','Banchette di Ivrea (TO)','concerto nel centro polifunzionale','\"\r\n\"59'),(60,'2002-12-29 00:00:00','2002-12-29 00:00:00','Pomeriggio','Viù (TO)','concerto alla Colonia “E.Dominici” per i 75 anni di professione religiosa di Suor Gisella','\"\r\n\"61'),(63,'2003-05-17 00:00:00','2003-05-18 00:00:00','Weekend','Chambéry (Francia)','weekend-stage canoro “Les heures chantantes” e concerto al Centre des Conventions','\"\r\n\"64'),(65,'2003-07-25 00:00:00','2003-07-25 00:00:00','Sera','Viù (TO)','partecipazione ai festeggiamenti per l\'80° anniversario del Gruppo A.N.A. di Viù','\"\r\n\"66'),(67,'2003-08-23 00:00:00','2003-08-23 00:00:00','Sera','Groscavallo (TO)','concerto presso Villa Pastrone organizzato dal C.A.I. di Venaria ','\"\r\n\"68'),(69,'2003-08-30 00:00:00','2003-08-30 00:00:00','Sera','Viù (TO)','concerto estivo nella Chiesa Parrocchiale','\"\r\n\"70'),(71,'2003-09-20 00:00:00','2003-09-20 00:00:00','Pomeriggio','Viù (TO)','animazione della S. Messa alla Madonna di Prà Colèt','\"\r\n\"72'),(73,'2003-12-21 00:00:00','2003-12-21 00:00:00','Pomeriggio','Lanzo (TO)','concerto natalizio nella chiesa S. Croce','\"\r\n\"74'),(131,'2007-05-20 00:00:00','2007-05-20 00:00:00','11:00','Mathi (TO)','Festa coscritti classe 1947','\"\r\n\"215'),(216,'2012-07-01 00:00:00','2012-07-01 00:00:00','11:00','Ceresole Reale (TO)','Animazione della S. Messa presso il Palamila','/Doc_Volantini/locandina_alborada_30_6_01_7.pdf\"\r'),(76,'2004-04-24 00:00:00','2004-04-24 00:00:00','Sera','Robassomero (TO)','serata in ricordo della Resistenza','\"\r\n\"77'),(78,'2004-05-29 00:00:00','2004-05-29 00:00:00','Sera','Cafasse (TO)','concerto di primavera 2004','\"\r\n\"80'),(81,'2004-08-02 00:00:00','2004-08-02 00:00:00','Sera','Viù (TO)','concerto estivo nella Chiesa Parrocchiale','\"\r\n\"82'),(83,'2004-08-13 00:00:00','2004-08-13 00:00:00','Sera','fraz. Mombresto di Pessinetto (TO)','concerto estivo presso la chiesa','\"\r\n\"84'),(85,'2004-09-04 00:00:00','2004-09-04 00:00:00','Sera','Usseglio (TO)','esecuzione di alcuni brani tra il primo e il secondo tempo del concerto del Coro Penne Nere di Aosta','\"\r\n\"86'),(88,'2004-10-17 00:00:00','2004-10-17 00:00:00','Pomeriggio','Mappano (TO)','rassegna corale \"Arcobaleno Musicale\"','\"\r\n\"89'),(90,'2004-12-18 00:00:00','2004-12-18 00:00:00','Sera','Germagnano (TO)','concerto natalizio di beneficenza per Ivan Gallino','\"\r\n\"91'),(92,'2005-02-24 00:00:00','2005-02-24 00:00:00','21:00','Viù (TO)','inaugurazione del progetto \"Residenze teatrali\" (RE.TE.) 2005','\"\r\n\"93'),(94,'2005-05-15 00:00:00','2005-05-15 00:00:00','21:00','Pianezza (TO)','concerto in occasione della \"Giornata della Piemontesità\"','\"\r\n\"95'),(96,'2005-05-28 00:00:00','2005-05-28 00:00:00','21:00','Settimo (TO)','Rassegna \"Concerto di primavera\" organizzata dal coro La Ginestra','\"\r\n\"97'),(98,'2005-06-25 00:00:00','2005-06-25 00:00:00','21:00','fraz. Bertesseno di VIU\' (TO)','partecipazione ai festeggiamenti per il 60° Anniversario della Liberazione','\"\r\n\"99'),(101,'2005-07-22 00:00:00','2005-07-22 00:00:00','21:00','Usseglio (TO)','concerto in chiesa per il 70° del Gruppo A.N.A. di Usseglio','\"\r\n\"217'),(218,'2012-07-15 00:00:00','2012-07-15 00:00:00','10:30','Usseglio (To)','Animazione della S. Messa in occasione della visita pastorale dall&#39arcivescovo Cesare Nosiglia','\"\r\n\"102'),(104,'2005-11-12 00:00:00','2005-11-12 00:00:00','21:00','Altessano, Venaria (TO)','rassegna corale organizzata dal CAI di Venaria','\"\r\n\"105'),(106,'2005-11-19 00:00:00','2005-11-19 00:00:00','21:00','Nole (TO)','concerto in chiesa','\"\r\n\"107'),(108,'2005-12-15 00:00:00','2005-12-15 00:00:00','21:00','Torino','concerto di Natale nella Cappella dei Mercanti organizzato dall\'Unione Cattolica Farmacisti Italiani','Doc_Volantini/Volantino_151205.doc\"\r\n\"109'),(110,'2005-12-23 00:00:00','2005-12-23 00:00:00','21:00','Viù (TO)','La Coralità Viucese ospita il Coro LA RUPE di Quincinetto','\"\r\n\"111'),(112,'2005-12-27 00:00:00','2005-12-27 00:00:00','21:00','Sestriere (TO)','Concerto di Natale nella Chiesa Parrocchiale','\"\r\n\"113'),(114,'2006-03-04 00:00:00','2006-03-04 00:00:00','21:00','Viù (TO)','Inaugurazione del progetto \"Residenze teatrali\" (RE.TE.) 2006 \"L\'amore nelle Valli di Lanzo\"','\"\r\n\"115'),(116,'2006-05-25 00:00:00','2006-05-25 00:00:00','20:00','Torino','Partecipazione alla trasmissione televisiva \'Nòst Piemont\' di Telestudio','\"\r\n\"118'),(119,'2006-06-24 00:00:00','2006-06-24 00:00:00','21:00','Viù (TO)','Progetto RE.TE. 2006: partecipazione alla rappresentazione teatrale \"L\'amore nelle Valli di Lanzo\"','\"\r\n\"120'),(121,'2006-06-25 00:00:00','2006-06-25 00:00:00','18:00','Viù (TO)','Progetto RE.TE. 2006: partecipazione alla Festa Festival e alla rappresentazione teatrale \"L\'amore nelle Valli di Lanzo\"','\"\r\n\"122'),(123,'2006-08-27 00:00:00','2006-08-27 00:00:00','21:00','Viù (TO)','Concerto estivo nella Chiesa Parrocchiale','\"\r\n\"124'),(125,'2006-11-01 00:00:00','2006-11-01 00:00:00','16:00','Torino','6° Rassegna Corale Itinerante nei Cimiteri Torinesi','\"\r\n\"126'),(127,'2006-12-10 00:00:00','2006-12-10 00:00:00','15:00','Ceres (TO)','Concerto di Natale nella Chiesa Parrocchiale','\"\r\n\"128'),(129,'2006-12-23 00:00:00','2006-12-23 00:00:00','21:00','Traves (TO)','Concerto di Natale nella Chiesa Parrocchiale','\"\r\n\"130'),(133,'2007-06-24 00:00:00','2007-06-24 00:00:00','10:00','fraz. Margaula di Germagnano (TO)','Animazione S.Messa','\"\r\n\"134'),(135,'2007-08-05 00:00:00','2007-08-05 00:00:00','18:30','fraz. Cramoletti di Viù (TO)','Festa dei forni','\"\r\n\"136'),(138,'2007-07-28 00:00:00','2007-07-28 00:00:00','21:00','Lingotto (TO), 8Gallery','Rassegna Corale presso la Corte della Ristorazione','\"\r\n\"219'),(220,'2013-04-28 00:00:00','2013-04-28 00:00:00','16:00','Piennes (Francia)','II Festival di canto corale \"Mines en choeur\"','Doc_Volantini/Programme_Piennes_28042013.pdf\"\r\n\"2'),(222,'2013-01-05 00:00:00','2013-01-05 00:00:00','21:00','Favria (TO)','Concerto presso il Salone San Michele','Doc_Volantini/favria_5-1-2013.docx\"\r\n\"223'),(224,'2012-12-16 00:00:00','2012-12-16 00:00:00','15:30','Viù (TO)','Canti natalizi presso la Chiesa Parrocchiale, in occasione di &#39Babbo Natale a Viù&#39','\"\r\n\"225'),(226,'2013-05-25 00:00:00','2013-05-25 00:00:00','21:00','Tavagnasco (TO)','Rassegna Corale organizzata dal Coro Rio Fontano','Doc_Volantini/volantino_tavagnasco_25052013.pdf\"\r'),(228,'2013-07-27 00:00:00','2013-07-27 00:00:00','21:00','Viù (TO)','Concerto per il 90° di fondazione del Gruppo A.N.A. di Viu&#39 con il coro Stellina','\"\r\n\"229'),(230,'2013-10-25 00:00:00','2013-10-25 00:00:00','21:00','Boves (CN)','Piemonte In... Canto','/Doc_Volantini/locandina_BOVES_25102013.pdf\"\r\n\"23'),(232,'2014-04-05 00:00:00','2014-04-05 00:00:00','21:00','Villar Pellice (TO)','Concerto presso il Tempio Valdese organizzato dal Gruppo Corale Ciansunando','/Doc_Volantini/volantino_05042014.pdf\"\r\n\"233'),(235,'2014-03-22 00:00:00','2014-03-22 00:00:00','21:00','Borgo San Lorenzo (Firenze)','Concerto in chiesa','/Doc_Volantini/locandina_22-23-03-2014.pdf\"\r\n\"236'),(237,'2014-08-01 00:00:00','2014-08-01 00:00:00','21:00','Viù (To)','Concerto estivo nella Chiesa Parrocchiale','/Doc_Volantini/volantino_01082014.pdf\"\r\n\"238'),(239,'2014-09-21 00:00:00','2014-09-21 00:00:00','15:30','Mentone (Francia)','Concerto nella chiesa del Sacre&#39 Coeur','\"\r\n\"240'),(242,'2016-03-28 00:00:00','2016-03-29 00:00:00','18:00','Lourdes','Pellegrinaggio e animazione delle funzioni religiose con diretta televisiva su TV2000','\"\r\n\"243'),(244,'2015-04-18 00:00:00','2015-04-18 00:00:00','21:00','Pinerolo (TO)','Rassegna Corale InterRegionale CANTINCORO presso Chiesa San Domenico','/Doc_Volantini/locandina_cantincoro_pinerolo.pdf\"'),(246,'2015-06-13 00:00:00','2015-06-13 00:00:00','21:00','Rubiana (TO)','Concerto presso il salone parrocchiale per i terremotati del Nepal','/Doc_Volantini/nepal.pdf\"\r\n\"247'),(248,'2015-06-20 00:00:00','2015-06-20 00:00:00','16:00','Balangero (TO)','Animazione S.Messa per il Matrimonio di Carlo A. e Alessia P.','\"\r\n\"249'),(250,'2015-09-05 00:00:00','2015-09-05 00:00:00','11:00','Usseglio (TO)','Animazione S.Messa per il Matrimonio di Bianca S. e Daniele T.','\"\r\n\"251'),(252,'2015-10-04 00:00:00','2015-10-04 00:00:00','10:30','Viù (TO)','Festa dell&#39Arma dei Carabinieri - Animazione S.Messa','\"\r\n\"253'),(254,'2015-11-28 00:00:00','2015-11-28 00:00:00','21:00','Cantalupo (AL)','Concerto nella Chiesa Parrocchiale','\"\r\n\"255'),(256,'2015-12-05 00:00:00','2015-12-05 00:00:00','10:30','Viu&#39 (TO)','Animazione S.Messa per il Matrimonio di Vittoria C. e Simone C.','\"\r\n\"259'),(258,'2016-01-05 00:00:00','2016-01-05 00:00:00','21:00','Viu&#39 (TO)','Concerto dell&#39epifania','\"\r\n\"260'),(261,'2016-08-03 00:00:00','2016-08-03 00:00:00','21:00','Viù (TO)','Concerto estivo presso la chiesa Parrocchiale','/Doc_Volantini/Concerto_estivo2016.jpg\"\r\n\"262'),(263,'2016-11-27 00:00:00','2016-11-27 00:00:00','15:30','Mathi (TO)','Concerto presso la cappella della Residenza Chantal','\"\r\n\"264'),(265,'2017-05-21 00:00:00','2017-05-21 00:00:00','Pomeriggio','Viù (TO)','Concorso Corale Regionale indetto da ACP in collaborazione con il Comune di Viù','/Doc_Volantini/Concorso_Regionale_2017.jpeg\"\r\n\"26'),(267,'2017-07-08 00:00:00','2017-07-08 00:00:00','21:00','Viù (TO)','Rassegna Corale \"Paesaggi Corali\" indetta da ACP','/Doc_Volantini/Viu&#768;_8_luglio.pdf\"\r\n\"268'),(270,'2017-10-06 00:00:00','2017-10-06 00:00:00','21:00','Pianazzola (Sondrio)','Concerto in chiesa','\"\r\n\"271'),(272,'2017-09-23 00:00:00','2017-09-23 00:00:00','18:00','Balangero (TO)','Animazione S.Messa presso la Chiesa di San Giacomo','\"\r\n\"274');
/*!40000 ALTER TABLE `registroUscite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_youtube`
--

DROP TABLE IF EXISTS `video_youtube`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_youtube` (
  `id_video` int(11) DEFAULT NULL,
  `codice_video` varchar(11) DEFAULT NULL,
  `descrizione_video` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_youtube`
--

LOCK TABLES `video_youtube` WRITE;
/*!40000 ALTER TABLE `video_youtube` DISABLE KEYS */;
INSERT INTO `video_youtube` VALUES (4,'U3PEQTq7Suk','Oggi è Natale - C. Favaro\"\r\n\"5'),(6,'ITA0c_I-qQ4','Preghiera - E. Wolf-Ferrari; arm. G. Castagna\"\r\n\"7'),(8,'klsiD5QhUmU','Joy to the world - L. Mason; arm. J. Rutter\"\r\n\"10'),(11,'1zC9A5RrNZ8','La luce del giorno - R. Padoin\"\r\n\"13'),(14,'yFxek6usY_E','Guantanamera - arm. L. Pietropoli\"\r\n\"15'),(16,'fFTxtgZtgM8','Nella vecchia fattoria - arrang. C. Favaro\"\r\n\"22'),(25,'_Vk0JFqoqn4','Bogoroditse Devo, raduisya - Sergei Rachmaninov\"\r\n\"26'),(27,'3Ay0dtZesnc','Specchio - testo di S. Quasimodo; musica di R. Bertoldo'),(30,'1MTsBTBTcgs','Esta tierra - J. Busto\"\r\n\"31'),(32,'N8p6Go5IpHA','La sera - C. Favaro\"\r\n\"33'),(34,'TksLzEIE2qc','O Sacrum Convivium - L. Molfino\"\r\n\"35'),(37,'K6je6-AtNvI','\"You are the new day - John David, arr. Peter Knight\"\r\n');
/*!40000 ALTER TABLE `video_youtube` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-28 17:06:58
