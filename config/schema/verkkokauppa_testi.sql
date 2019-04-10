-- MySQL dump 10.14  Distrib 5.5.60-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: verkkokauppa_testi
-- ------------------------------------------------------
-- Server version	5.5.60-MariaDB

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
-- Table structure for table `kayttajat`
--

DROP TABLE IF EXISTS `kayttajat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kayttajat` (
  `id` int(11) NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `toimitusosoite` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `puhelin` varchar(255) NOT NULL,
  `salasana` varchar(1024) NOT NULL,
  `rooli` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kayttajat`
--

LOCK TABLES `kayttajat` WRITE;
/*!40000 ALTER TABLE `kayttajat` DISABLE KEYS */;
INSERT INTO `kayttajat` VALUES (1,'Terttu Testaaja','Testikatu 123, Oulu','terttu.testaaja@esimerkki.fi','050 123 4567','$2y$10$1gbR.p1COtcTihfU9SL30eRX5t5JMYPsLLVcie5wJ0w3z.nFXBBOa','admin'),(2,'Pertti Kokeilija','Kokeilukatu 56, Kerava','pertti.kokeilija@esimerkki.fi','044 876 5432','$2y$10$kTA.hLAOlYMaPeS7d/Ovi.wRIBN8ZHeRSTgbQH7kya4v4Ee1YGbeG','customer'),(3,'Emilia Empijä','Lempokatu 87, Lempäälä','emilia.epailija@esimerkki.fi','040 233 4556','$2y$10$.dwvP.vXBhG99L/wPE9XZeBlQauSxA8HpEEs75UaPGi8zKZ1SCFzK','customer');
/*!40000 ALTER TABLE `kayttajat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ostoskori`
--

DROP TABLE IF EXISTS `ostoskori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ostoskori` (
  `id` int(11) NOT NULL,
  `kayttaja_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kayttaja_id` (`kayttaja_id`),
  CONSTRAINT `ostoskori_ibfk_1` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ostoskori`
--

LOCK TABLES `ostoskori` WRITE;
/*!40000 ALTER TABLE `ostoskori` DISABLE KEYS */;
INSERT INTO `ostoskori` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `ostoskori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ostoskorituotteet`
--

DROP TABLE IF EXISTS `ostoskorituotteet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ostoskorituotteet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tuotekoodi` int(11) NOT NULL,
  `ostoskori_id` int(11) DEFAULT NULL,
  `tilaus_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tuotekoodi` (`tuotekoodi`),
  KEY `ostoskori_id` (`ostoskori_id`),
  KEY `tilaus_id` (`tilaus_id`),
  CONSTRAINT `ostoskorituotteet_ibfk_1` FOREIGN KEY (`tuotekoodi`) REFERENCES `tuotteet` (`tuotekoodi`),
  CONSTRAINT `ostoskorituotteet_ibfk_2` FOREIGN KEY (`ostoskori_id`) REFERENCES `ostoskori` (`id`),
  CONSTRAINT `ostoskorituotteet_ibfk_3` FOREIGN KEY (`tilaus_id`) REFERENCES `ostoskori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ostoskorituotteet`
--

LOCK TABLES `ostoskorituotteet` WRITE;
/*!40000 ALTER TABLE `ostoskorituotteet` DISABLE KEYS */;
INSERT INTO `ostoskorituotteet` VALUES (7,6,2,NULL),(8,2,2,NULL);
/*!40000 ALTER TABLE `ostoskorituotteet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soitintyypit`
--

DROP TABLE IF EXISTS `soitintyypit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soitintyypit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soitintyyppi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soitintyypit`
--

LOCK TABLES `soitintyypit` WRITE;
/*!40000 ALTER TABLE `soitintyypit` DISABLE KEYS */;
INSERT INTO `soitintyypit` VALUES (1,'elektromekaaninen'),(2,'analoginen syntetisaattori'),(3,'akustinen'),(4,'digitaalinen syntetisaattori');
/*!40000 ALTER TABLE `soitintyypit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tilaukset`
--

DROP TABLE IF EXISTS `tilaukset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tilaukset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tilaukset_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `kayttajat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tilaukset`
--

LOCK TABLES `tilaukset` WRITE;
/*!40000 ALTER TABLE `tilaukset` DISABLE KEYS */;
/*!40000 ALTER TABLE `tilaukset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tuotteet`
--

DROP TABLE IF EXISTS `tuotteet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tuotteet` (
  `nimi` varchar(255) NOT NULL,
  `tuotekoodi` int(11) NOT NULL AUTO_INCREMENT,
  `valmistusvuosi` int(11) NOT NULL,
  `mitat` varchar(255) NOT NULL,
  `paino` int(11) NOT NULL,
  `hinta` float NOT NULL,
  `kuvaus` varchar(255) DEFAULT NULL,
  `soitintyyppi` int(11) NOT NULL,
  PRIMARY KEY (`tuotekoodi`),
  KEY `soitintyyppi` (`soitintyyppi`),
  CONSTRAINT `tuotteet_ibfk_1` FOREIGN KEY (`soitintyyppi`) REFERENCES `soitintyypit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tuotteet`
--

LOCK TABLES `tuotteet` WRITE;
/*!40000 ALTER TABLE `tuotteet` DISABLE KEYS */;
INSERT INTO `tuotteet` VALUES ('Hammond B3',1001,1963,'50x100x150, leslie-kaiutin: 80cm x 80cm x 130cm',30,6500,'Legendaarinen rock- ja jazz-urku. Mukana ikonisen soundin takaava Leslie-kaiutin. Tunnettuja käyttäjiä: The Beatles, Uriah Heep, Deep Purple ja monet muut.',1),('Fender Rhodes Mark II',1002,1979,'50x100x150',12,4000,'Upea elektromekaaninen piano. Tuttu monista jazz- ja pop-kappaleista. Tunnettuja käyttäjiä maailmalla: Herbie Hancock, Chick Corea. Kotimaassa soitinta kuullaan esim. Hectorin hitissä Lumi teki enkelin eteiseen.',1),('Clavinet D6',1003,1966,'50x100x150',6,3500,'Legendaarinen funk- ja soul-hittien soitin. Tunnettuja käyttäjiä Stevie Wonder, Herbie Hancock ja Pink Floyd.',1),('Minimoog',2001,1971,'40x60x70',5,6500,'Kaikkien aikojen legendaarisin analogisyntetisaattori. Sopii sekä jyhkeisiin bassolinjoihin, että hienoihin lead-linjoihin. Monofoninen, kolmen oskillaattorin syntetisaattori. Tunnettuja käyttäjiä maailmalla Pink Floyd ja Yes, kotimaassa Esa Kotilainen.',2),('Arp 2600',2002,1970,'55x120x157',6,4500,'Klassikon asemaan noussut bassosyntetisaattori. Tällä saa jyhkeät soundit biisiin kuin biisiin. Tunnettuja käyttäjiä esim Herbie Hancock.',2),('Yamaha DX7',3006,1984,'150x30x15',10,3000,'Kaikkien aikojen FM-syntetisaattori. Aidot 80-luvun soundit! Tunnettuja käyttäjiä: Enya, Elton John, U2.',4),('Arp Odyssey Mk 1',2007,1974,'44cm x 58cm x 13cm',3,3780,'Hieno analoginen syntetisaattori. Arp-sarjan suosituimpia. Tunnettuja käyttäjiä ABBA, Vangelis ja Herbie Hancock.',2),('ARP Odyssey Mk III',2008,1979,'60cm x 25cm x 10cm',5,2890,'Tämä syntetisaattori on käytännössä identtinen Odyssey Mk II -malliin verrattuna. Erona on metallinen suojalaatikko.\r\n\r\nSuosituin ja yleisin Arp Odyssey -malli.',2),('Arp Soloist',2009,1971,'60cm x 25cm x 10cm',6,5870,'Vähemmän tunnettu Arp-syntetisaattori. Hieno soolosoitin, jossa aftertouch. 30 presettiä. Tunnettuja käyttäjiä Herbie Hancock ja Tangerine Dream.',2),('Eminent Solina String Ensemble',2010,1975,'54cm x 45cm x 12cm',7,3640,'Legendaarinen jousikone. Yhdysvalloissa tätä myytiin nimellä Arp Solina, mutta tosiasiassa laite on hollantilainen. Ikoninen 70-luvun diskokappaleiden jousisoundi lähtee tästä koneesta! Tunnettuja käyttäjiä: Air, The Eagles, Elton John.',2),('Farfisa Organ',1011,1965,'90cm x 45cm x 10cm',15,1650,'Klassikkourku 1960-luvulta. Transistorikäyttöinen halpamalli, joka sai paljon suosiota rock-yhtyeiden piirissä. Soi niin The Doorsin Light My Fire -kappaleessa kuin Hassisen koneen hitissä Levottomat jalat.',1),('Mellotron Mk II',1012,1965,'66cm x 54cm x 14cm',8,6750,'Legendaarinen 60-luvun jousikone. Tunnettuja käyttäjiä esimerkiksi The Beatles, Yes ja King Crimson.',1),('Yamaha AN1x',4013,1997,'85cm x 15cm x 7cm',3,400,'Digitaalinen analogimallintava syntetisaattori. Edullinen ja hienosoundinen laite.',4);
/*!40000 ALTER TABLE `tuotteet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-10 11:52:00
