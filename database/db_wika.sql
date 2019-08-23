-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 172.28.0.4    Database: db_wika2
-- ------------------------------------------------------
-- Server version	5.7.27

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
-- Table structure for table `kuisioner`
--

DROP TABLE IF EXISTS `kuisioner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kuisioner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` tinytext,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kuisioner`
--

LOCK TABLES `kuisioner` WRITE;
/*!40000 ALTER TABLE `kuisioner` DISABLE KEYS */;
INSERT INTO `kuisioner` VALUES (1,'Respon technical support dengan user saat melakukan troubleshoot baik atau tidak ?','4'),(2,'Technical Support Mengerjakan Ticketing Sampai Tuntas dengan Baik atau Tidak ?','4'),(3,'Kehandalan technical support dalam melakukan pengerjaan ticketing baik atau tidak ?','4'),(4,'Akurasi perkiraan waktu pengerjaan dari technical support baik atau tidak ?','4'),(5,'Apakah Technical Support Cepat Menanggapi Pengaduan User Baik atau Tidak ?','4'),(6,'Kehandalan technical support dalam melakukan pengerjaan ticketing baik atau tidak ?\r\n','3'),(7,'Technical Support Cepat Menanggapi Pengaduan User Baik atau Tidak ?','3'),(8,'Technical Support Mengerjakan Ticketing Sampai Tuntas dengan Baik atau Tidak ?','3'),(9,'Respon technical support dengan user saat melakukan troubleshoot baik atau tidak ?','2'),(10,' Technical Support Mengerjakan Ticketing Sampai Tuntas dengan Baik atau Tidak ?','2');
/*!40000 ALTER TABLE `kuisioner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kuisioner_result`
--

DROP TABLE IF EXISTS `kuisioner_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kuisioner_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kuisioner` varchar(45) DEFAULT NULL,
  `result` varchar(45) DEFAULT NULL,
  `id_tiket` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kuisioner_result`
--

LOCK TABLES `kuisioner_result` WRITE;
/*!40000 ALTER TABLE `kuisioner_result` DISABLE KEYS */;
INSERT INTO `kuisioner_result` VALUES (123,'5','1','TK-0002','4'),(124,'5','1','TK-0002','4'),(125,'5','0','TK-0002','4'),(126,'5','1','TK-0002','4'),(127,'5','1','TK-0002','4'),(128,'10','1','TK-0002','2'),(129,'10','1','TK-0002','2'),(130,'8','1','TK-0002','3'),(131,'8','1','TK-0002','3'),(132,'8','1','TK-0002','3'),(133,'5','0','TK-0013','4'),(134,'5','0','TK-0013','4'),(135,'5','1','TK-0013','4'),(136,'5','0','TK-0013','4'),(137,'5','1','TK-0013','4');
/*!40000 ALTER TABLE `kuisioner_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1565426876),('m130524_201442_init',1565426881),('m190124_110200_add_verification_token_column_to_user_table',1565426881);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_alternatif`
--

DROP TABLE IF EXISTS `tbl_alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_alternatif` (
  `id_alternatif` varchar(100) NOT NULL,
  `kd_alternatif` varchar(100) NOT NULL,
  `nm_alternatif` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_alternatif` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_alternatif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_alternatif`
--

LOCK TABLES `tbl_alternatif` WRITE;
/*!40000 ALTER TABLE `tbl_alternatif` DISABLE KEYS */;
INSERT INTO `tbl_alternatif` VALUES ('AL-00001','A','Desta ','desta','b2e7247ec64e0f7840538698b5146ab8','desta@mailinator.com'),('AL-00002','B','Aisyah','aisyah','26bb533df5747c7a3f2a9cc48a8cf3ee','aisyah1@mailinator.com'),('AL-00003','C','Kukuh','kukuh','7d7e97a737ab5450304c9bfbb457854d','kukuh@mailinator.com'),('AL-00004','D','Ahmad','ahmad','61243c7b9a4022cb3f8dc3106767ed12','ahmad@mailinator.com'),('AL-00005','E','Wahyu','wahyu','32c9e71e866ecdbc93e497482aa6779f','wahyu@mailinator.com'),('AL-00006','F','Fauzan','fauzan','eacaf53cb2b533a68baa765faedf7e59','fauzan@mailinator.com'),('AL-00007','G','Rizal','rizal','150fb021c56c33f82eef99253eb36ee1','rizal@mailinator.com');
/*!40000 ALTER TABLE `tbl_alternatif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kriteria`
--

DROP TABLE IF EXISTS `tbl_kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kriteria` (
  `id_kriteria` varchar(100) NOT NULL,
  `kd_kriteria` varchar(100) NOT NULL,
  `nm_kriteria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kriteria`
--

LOCK TABLES `tbl_kriteria` WRITE;
/*!40000 ALTER TABLE `tbl_kriteria` DISABLE KEYS */;
INSERT INTO `tbl_kriteria` VALUES ('KR-00001','C1','Jaringan dan Infrastruktur'),('KR-00002','C2','Kerusakan Hardware'),('KR-00003','C3','Kerusakan Software'),('KR-00004','C4','User Access');
/*!40000 ALTER TABLE `tbl_kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nilai_alternatif`
--

DROP TABLE IF EXISTS `tbl_nilai_alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nilai_alternatif` (
  `id_nilai_alternatif` varchar(100) NOT NULL,
  `id_alternatif` varchar(100) NOT NULL,
  `id_kriteria` varchar(100) NOT NULL,
  `id_sub_kriteria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nilai_alternatif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nilai_alternatif`
--

LOCK TABLES `tbl_nilai_alternatif` WRITE;
/*!40000 ALTER TABLE `tbl_nilai_alternatif` DISABLE KEYS */;
INSERT INTO `tbl_nilai_alternatif` VALUES ('NAL-00001','AL-00001','KR-00001','SKR-00001'),('NAL-00002','AL-00001','KR-00001','SKR-00002'),('NAL-00003','AL-00001','KR-00004','SKR-00036'),('NAL-00004','AL-00002','KR-00002','SKR-00017'),('NAL-00005','AL-00002','KR-00002','SKR-00018'),('NAL-00006','AL-00002','KR-00002','SKR-00019'),('NAL-00007','AL-00002','KR-00003','SKR-00034'),('NAL-00008','AL-00003','KR-00001','SKR-00003'),('NAL-00009','AL-00003','KR-00004','SKR-00036'),('NAL-00010','AL-00003','KR-00004','SKR-00038'),('NAL-00011','AL-00004','KR-00002','SKR-00017'),('NAL-00012','AL-00004','KR-00002','SKR-00018'),('NAL-00013','AL-00005','KR-00001','SKR-00001'),('NAL-00014','AL-00005','KR-00001','SKR-00002'),('NAL-00015','AL-00005','KR-00001','SKR-00003'),('NAL-00016','AL-00005','KR-00001','SKR-00004'),('NAL-00017','AL-00006','KR-00004','SKR-00036'),('NAL-00018','AL-00007','KR-00002','SKR-00017'),('NAL-00019','AL-00001','KR-00001','SKR-00002'),('NAL-00020','AL-00001','KR-00002','SKR-00006'),('NAL-00021','AL-00001','KR-00003','SKR-00033'),('NAL-00022','AL-00001','KR-00004','SKR-00036'),('NAL-00023','AL-00001','KR-00001','SKR-00003'),('NAL-00024','AL-00001','KR-00001','SKR-00004'),('NAL-00025','AL-00001','KR-00002','SKR-00005'),('NAL-00026','AL-00001','KR-00002','SKR-00006'),('NAL-00027','AL-00001','KR-00003','SKR-00033'),('NAL-00028','AL-00001','KR-00003','SKR-00035'),('NAL-00029','AL-00001','KR-00004','SKR-00036'),('NAL-00030','AL-00001','KR-00001','SKR-00002'),('NAL-00031','AL-00001','KR-00002','SKR-00007'),('NAL-00032','AL-00001','KR-00003','SKR-00032'),('NAL-00033','AL-00001','KR-00004','SKR-00036'),('NAL-00034','AL-00001','KR-00004','SKR-00038'),('NAL-00035','AL-00001','KR-00001','SKR-00004'),('NAL-00036','AL-00001','KR-00002','SKR-00007'),('NAL-00037','AL-00001','KR-00003','SKR-00033'),('NAL-00038','AL-00001','KR-00004','SKR-00036'),('NAL-00039','AL-00001','KR-00001','SKR-00003'),('NAL-00040','AL-00001','KR-00002','SKR-00005'),('NAL-00041','AL-00001','KR-00002','SKR-00006'),('NAL-00042','AL-00001','KR-00002','SKR-00007'),('NAL-00043','AL-00001','KR-00002','SKR-00008'),('NAL-00044','AL-00001','KR-00002','SKR-00009'),('NAL-00045','AL-00001','KR-00003','SKR-00032'),('NAL-00046','AL-00001','KR-00003','SKR-00033'),('NAL-00047','AL-00001','KR-00003','SKR-00034'),('NAL-00048','AL-00001','KR-00003','SKR-00035'),('NAL-00049','AL-00001','KR-00004','SKR-00036');
/*!40000 ALTER TABLE `tbl_nilai_alternatif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nilai_matrix`
--

DROP TABLE IF EXISTS `tbl_nilai_matrix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nilai_matrix` (
  `id_nilai_matrix` varchar(100) NOT NULL,
  `id_alternatif1` varchar(100) NOT NULL,
  `id_alternatif2` varchar(100) NOT NULL,
  `nilai_matrix` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nilai_matrix`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nilai_matrix`
--

LOCK TABLES `tbl_nilai_matrix` WRITE;
/*!40000 ALTER TABLE `tbl_nilai_matrix` DISABLE KEYS */;
INSERT INTO `tbl_nilai_matrix` VALUES ('NM-00001','AL-00001','AL-00002','1'),('NM-00002','AL-00001','AL-00003','1'),('NM-00003','AL-00001','AL-00004','1'),('NM-00004','AL-00001','AL-00005','1'),('NM-00005','AL-00001','AL-00006','1'),('NM-00006','AL-00001','AL-00007','1'),('NM-00007','AL-00002','AL-00001','0'),('NM-00008','AL-00002','AL-00003','0'),('NM-00009','AL-00002','AL-00004','0'),('NM-00010','AL-00002','AL-00005','0'),('NM-00011','AL-00002','AL-00006','0'),('NM-00012','AL-00002','AL-00007','0'),('NM-00013','AL-00003','AL-00001','0'),('NM-00014','AL-00003','AL-00002','1'),('NM-00015','AL-00003','AL-00004','1'),('NM-00016','AL-00003','AL-00005','0'),('NM-00017','AL-00003','AL-00006','1'),('NM-00018','AL-00003','AL-00007','1'),('NM-00019','AL-00004','AL-00001','0'),('NM-00020','AL-00004','AL-00002','0'),('NM-00021','AL-00004','AL-00003','0'),('NM-00022','AL-00004','AL-00005','0'),('NM-00023','AL-00004','AL-00006','0'),('NM-00024','AL-00004','AL-00007','0'),('NM-00025','AL-00005','AL-00001','0'),('NM-00026','AL-00005','AL-00002','1'),('NM-00027','AL-00005','AL-00003','1'),('NM-00028','AL-00005','AL-00004','1'),('NM-00029','AL-00005','AL-00006','1'),('NM-00030','AL-00005','AL-00007','1'),('NM-00031','AL-00006','AL-00001','0'),('NM-00032','AL-00006','AL-00002','0'),('NM-00033','AL-00006','AL-00003','0'),('NM-00034','AL-00006','AL-00004','0'),('NM-00035','AL-00006','AL-00005','0'),('NM-00036','AL-00006','AL-00007','0'),('NM-00037','AL-00007','AL-00001','0'),('NM-00038','AL-00007','AL-00002','0'),('NM-00039','AL-00007','AL-00003','0'),('NM-00040','AL-00007','AL-00004','0'),('NM-00041','AL-00007','AL-00005','0'),('NM-00042','AL-00007','AL-00006','0'),('NM-00043','AL-00001','AL-00002','1'),('NM-00044','AL-00001','AL-00003','1'),('NM-00045','AL-00001','AL-00004','1'),('NM-00046','AL-00001','AL-00005','1'),('NM-00047','AL-00001','AL-00006','1'),('NM-00048','AL-00001','AL-00007','1'),('NM-00049','AL-00002','AL-00001','0'),('NM-00050','AL-00002','AL-00003','1'),('NM-00051','AL-00002','AL-00004','1'),('NM-00052','AL-00002','AL-00005','1'),('NM-00053','AL-00002','AL-00006','1'),('NM-00054','AL-00002','AL-00007','1'),('NM-00055','AL-00003','AL-00001','0'),('NM-00056','AL-00003','AL-00002','0'),('NM-00057','AL-00003','AL-00004','0'),('NM-00058','AL-00003','AL-00005','0'),('NM-00059','AL-00003','AL-00006','0'),('NM-00060','AL-00003','AL-00007','0'),('NM-00061','AL-00004','AL-00001','0'),('NM-00062','AL-00004','AL-00002','0'),('NM-00063','AL-00004','AL-00003','1'),('NM-00064','AL-00004','AL-00005','1'),('NM-00065','AL-00004','AL-00006','1'),('NM-00066','AL-00004','AL-00007','1'),('NM-00067','AL-00005','AL-00001','0'),('NM-00068','AL-00005','AL-00002','0'),('NM-00069','AL-00005','AL-00003','0'),('NM-00070','AL-00005','AL-00004','0'),('NM-00071','AL-00005','AL-00006','0'),('NM-00072','AL-00005','AL-00007','0'),('NM-00073','AL-00006','AL-00001','0'),('NM-00074','AL-00006','AL-00002','0'),('NM-00075','AL-00006','AL-00003','0'),('NM-00076','AL-00006','AL-00004','0'),('NM-00077','AL-00006','AL-00005','0'),('NM-00078','AL-00006','AL-00007','0'),('NM-00079','AL-00007','AL-00001','0'),('NM-00080','AL-00007','AL-00002','0'),('NM-00081','AL-00007','AL-00003','1'),('NM-00082','AL-00007','AL-00004','0'),('NM-00083','AL-00007','AL-00005','1'),('NM-00084','AL-00007','AL-00006','1'),('NM-00085','AL-00001','AL-00002','1'),('NM-00086','AL-00001','AL-00003','1'),('NM-00087','AL-00001','AL-00004','1'),('NM-00088','AL-00001','AL-00005','1'),('NM-00089','AL-00001','AL-00006','1'),('NM-00090','AL-00001','AL-00007','1'),('NM-00091','AL-00002','AL-00001','0'),('NM-00092','AL-00002','AL-00003','1'),('NM-00093','AL-00002','AL-00004','1'),('NM-00094','AL-00002','AL-00005','1'),('NM-00095','AL-00002','AL-00006','1'),('NM-00096','AL-00002','AL-00007','1'),('NM-00097','AL-00003','AL-00001','0'),('NM-00098','AL-00003','AL-00002','0'),('NM-00099','AL-00003','AL-00004','0'),('NM-00100','AL-00003','AL-00005','0'),('NM-00101','AL-00003','AL-00006','0'),('NM-00102','AL-00003','AL-00007','0'),('NM-00103','AL-00004','AL-00001','0'),('NM-00104','AL-00004','AL-00002','0'),('NM-00105','AL-00004','AL-00003','0'),('NM-00106','AL-00004','AL-00005','0'),('NM-00107','AL-00004','AL-00006','0'),('NM-00108','AL-00004','AL-00007','0'),('NM-00109','AL-00005','AL-00001','0'),('NM-00110','AL-00005','AL-00002','0'),('NM-00111','AL-00005','AL-00003','0'),('NM-00112','AL-00005','AL-00004','0'),('NM-00113','AL-00005','AL-00006','0'),('NM-00114','AL-00005','AL-00007','0'),('NM-00115','AL-00006','AL-00001','0'),('NM-00116','AL-00006','AL-00002','0'),('NM-00117','AL-00006','AL-00003','0'),('NM-00118','AL-00006','AL-00004','0'),('NM-00119','AL-00006','AL-00005','0'),('NM-00120','AL-00006','AL-00007','0'),('NM-00121','AL-00007','AL-00001','0'),('NM-00122','AL-00007','AL-00002','0'),('NM-00123','AL-00007','AL-00003','0'),('NM-00124','AL-00007','AL-00004','0'),('NM-00125','AL-00007','AL-00005','0'),('NM-00126','AL-00007','AL-00006','0'),('NM-00127','AL-00001','AL-00002','1'),('NM-00128','AL-00001','AL-00003','1'),('NM-00129','AL-00001','AL-00004','1'),('NM-00130','AL-00001','AL-00005','1'),('NM-00131','AL-00001','AL-00006','1'),('NM-00132','AL-00001','AL-00007','1'),('NM-00133','AL-00002','AL-00001','0'),('NM-00134','AL-00002','AL-00003','0'),('NM-00135','AL-00002','AL-00004','0'),('NM-00136','AL-00002','AL-00005','0'),('NM-00137','AL-00002','AL-00006','0'),('NM-00138','AL-00002','AL-00007','0'),('NM-00139','AL-00003','AL-00001','0'),('NM-00140','AL-00003','AL-00002','1'),('NM-00141','AL-00003','AL-00004','1'),('NM-00142','AL-00003','AL-00005','1'),('NM-00143','AL-00003','AL-00006','1'),('NM-00144','AL-00003','AL-00007','1'),('NM-00145','AL-00004','AL-00001','0'),('NM-00146','AL-00004','AL-00002','0'),('NM-00147','AL-00004','AL-00003','0'),('NM-00148','AL-00004','AL-00005','0'),('NM-00149','AL-00004','AL-00006','0'),('NM-00150','AL-00004','AL-00007','0'),('NM-00151','AL-00005','AL-00001','0'),('NM-00152','AL-00005','AL-00002','0'),('NM-00153','AL-00005','AL-00003','0'),('NM-00154','AL-00005','AL-00004','0'),('NM-00155','AL-00005','AL-00006','0'),('NM-00156','AL-00005','AL-00007','0'),('NM-00157','AL-00006','AL-00001','0'),('NM-00158','AL-00006','AL-00002','1'),('NM-00159','AL-00006','AL-00003','0'),('NM-00160','AL-00006','AL-00004','1'),('NM-00161','AL-00006','AL-00005','1'),('NM-00162','AL-00006','AL-00007','1'),('NM-00163','AL-00007','AL-00001','0'),('NM-00164','AL-00007','AL-00002','0'),('NM-00165','AL-00007','AL-00003','0'),('NM-00166','AL-00007','AL-00004','0'),('NM-00167','AL-00007','AL-00005','0'),('NM-00168','AL-00007','AL-00006','0');
/*!40000 ALTER TABLE `tbl_nilai_matrix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nilai_pengkajian`
--

DROP TABLE IF EXISTS `tbl_nilai_pengkajian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nilai_pengkajian` (
  `id_nilai_pengkajian` varchar(100) NOT NULL,
  `id_alternatif1` varchar(100) NOT NULL,
  `id_alternatif2` varchar(100) NOT NULL,
  `nilai_pengkajian` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nilai_pengkajian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nilai_pengkajian`
--

LOCK TABLES `tbl_nilai_pengkajian` WRITE;
/*!40000 ALTER TABLE `tbl_nilai_pengkajian` DISABLE KEYS */;
INSERT INTO `tbl_nilai_pengkajian` VALUES ('NP-00001','AL-00001','AL-00001','0'),('NP-00002','AL-00001','AL-00002','1'),('NP-00003','AL-00001','AL-00003','1'),('NP-00004','AL-00001','AL-00004','1'),('NP-00005','AL-00001','AL-00005','1'),('NP-00006','AL-00001','AL-00006','1'),('NP-00007','AL-00001','AL-00007','1'),('NP-00008','AL-00002','AL-00001','0'),('NP-00009','AL-00002','AL-00002','0'),('NP-00010','AL-00002','AL-00003','0.5'),('NP-00011','AL-00002','AL-00004','0.5'),('NP-00012','AL-00002','AL-00005','0.5'),('NP-00013','AL-00002','AL-00006','0.5'),('NP-00014','AL-00002','AL-00007','0.5'),('NP-00015','AL-00003','AL-00001','0'),('NP-00016','AL-00003','AL-00002','0.5'),('NP-00017','AL-00003','AL-00003','0'),('NP-00018','AL-00003','AL-00004','0.5'),('NP-00019','AL-00003','AL-00005','0.25'),('NP-00020','AL-00003','AL-00006','0.5'),('NP-00021','AL-00003','AL-00007','0.5'),('NP-00022','AL-00004','AL-00001','0'),('NP-00023','AL-00004','AL-00002','0'),('NP-00024','AL-00004','AL-00003','0.25'),('NP-00025','AL-00004','AL-00004','0'),('NP-00026','AL-00004','AL-00005','0.25'),('NP-00027','AL-00004','AL-00006','0.25'),('NP-00028','AL-00004','AL-00007','0.25'),('NP-00029','AL-00005','AL-00001','0'),('NP-00030','AL-00005','AL-00002','0.25'),('NP-00031','AL-00005','AL-00003','0.25'),('NP-00032','AL-00005','AL-00004','0.25'),('NP-00033','AL-00005','AL-00005','0'),('NP-00034','AL-00005','AL-00006','0.25'),('NP-00035','AL-00005','AL-00007','0.25'),('NP-00036','AL-00006','AL-00001','0'),('NP-00037','AL-00006','AL-00002','0.25'),('NP-00038','AL-00006','AL-00003','0'),('NP-00039','AL-00006','AL-00004','0.25'),('NP-00040','AL-00006','AL-00005','0.25'),('NP-00041','AL-00006','AL-00006','0'),('NP-00042','AL-00006','AL-00007','0.25'),('NP-00043','AL-00007','AL-00001','0'),('NP-00044','AL-00007','AL-00002','0'),('NP-00045','AL-00007','AL-00003','0.25'),('NP-00046','AL-00007','AL-00004','0'),('NP-00047','AL-00007','AL-00005','0.25'),('NP-00048','AL-00007','AL-00006','0.25'),('NP-00049','AL-00007','AL-00007','0');
/*!40000 ALTER TABLE `tbl_nilai_pengkajian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sub_kriteria`
--

DROP TABLE IF EXISTS `tbl_sub_kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sub_kriteria` (
  `id_sub_kriteria` varchar(100) NOT NULL,
  `id_kriteria` varchar(100) NOT NULL,
  `nm_sub_kriteria` varchar(100) NOT NULL,
  `bobot_sub_kriteria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sub_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sub_kriteria`
--

LOCK TABLES `tbl_sub_kriteria` WRITE;
/*!40000 ALTER TABLE `tbl_sub_kriteria` DISABLE KEYS */;
INSERT INTO `tbl_sub_kriteria` VALUES ('SKR-00001','KR-00001','Tidak terhubung ke jaringan','0.054'),('SKR-00002','KR-00001','Tidak bisa browsing','0.054'),('SKR-00003','KR-00001','Sinyal PC/Laptop bertanda seru','0.054'),('SKR-00004','KR-00001','Internet terhubung tetapi tidak bisa browsing','0.054'),('SKR-00005','KR-00002','CPU - Monitor tidak menyala','0.3246'),('SKR-00006','KR-00002','CPU - Ada bunyi beep beberapa kali','0.3246'),('SKR-00007','KR-00002','CPU - Sering tiba-tiba mati','0.3246'),('SKR-00008','KR-00002','RAM - PC/Laptop slow respon','0.3246'),('SKR-00009','KR-00002','RAM - Sering restart sendiri','0.3246'),('SKR-00010','KR-00002','RAM - Aplikasi tidak bisa dijalankan','0.3246'),('SKR-00011','KR-00002','VGA - Tampilan 3D buruk','0.3246'),('SKR-00012','KR-00002','VGA - Rendering lambat','0.3246'),('SKR-00013','KR-00002','VGA - Gambar tidak tampil','0.3246'),('SKR-00014','KR-00002','Harddisk - Bluescreen','0.3246'),('SKR-00015','KR-00002','Harddisk - PC/Laptop sering hang','0.3246'),('SKR-00016','KR-00002','Harddisk - Terdapat tulisan operating system not found di monitor','0.3246'),('SKR-00017','KR-00002','Monitor - Posisi dan revolusi gambar/teks tidak tepat','0.3246'),('SKR-00018','KR-00002','Monitor - Warna layer tidak baik','0.3246'),('SKR-00019','KR-00002','Monitor - LCD terbagi/pecah','0.3246'),('SKR-00020','KR-00002','Keyboard - Sebagian keyboard tidak berfungsi','0.3246'),('SKR-00021','KR-00002','Keyboard -	Keyboard mengetik sendiri','0.3246'),('SKR-00022','KR-00002','Keyboard -	Keyboard tidak berfungsi sama sekali','0.3246'),('SKR-00023','KR-00002','Mouse - Pointer/petunjuk bergerak tak tentu','0.3246'),('SKR-00024','KR-00002','Mouse - Pointer/petunjuk tidak merespon saat digunakan','0.3246'),('SKR-00025','KR-00002','Mouse - Mouse tidak terditeksi oleh PC','0.3246'),('SKR-00026','KR-00002','Motheboard - PC/Laptop sering mati sendiri','0.3246'),('SKR-00027','KR-00002','Motheboard - PC/Laptop sering not responding','0.3246'),('SKR-00028','KR-00002','Motheboard - Ada suara beep','0.3246'),('SKR-00029','KR-00002','Printer & Scanner -	Tidak bisa mencetak & melakukan scan','0.3246'),('SKR-00030','KR-00002','Printer & Scanner -  tidak merespon','0.3246'),('SKR-00031','KR-00002','Printer & Scanner -	Hasil cetak & scan tidak baik ','0.3246'),('SKR-00032','KR-00003','Print out di ERP tidak sesuai','0.54475'),('SKR-00033','KR-00003','Bug attach file  ( File sudah di tambahkan tetapi efile membaca nya belum )','0.54475'),('SKR-00034','KR-00003','Email tidak bisa dibuka (terkena virus / spam)','0.54475'),('SKR-00035','KR-00003','Tidak bisa membuka aplikasi (word, excel, autocad, dll)','0.54475'),('SKR-00036','KR-00004','Tidak bisa login karena kesalahan password','0.20733'),('SKR-00037','KR-00004','Tidak bisa sharing file','0.20733'),('SKR-00038','KR-00004','Tidak bisa login kedalam jaringan','0.20733');
/*!40000 ALTER TABLE `tbl_sub_kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sub_tiket`
--

DROP TABLE IF EXISTS `tbl_sub_tiket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sub_tiket` (
  `id_sub_tiket` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_tiket` varchar(100) NOT NULL,
  `id_alternatif` varchar(100) NOT NULL,
  `id_kriteria` varchar(100) NOT NULL,
  `id_sub_kriteria` varchar(100) NOT NULL,
  `status_sub_tiket` varchar(100) NOT NULL DEFAULT 'Proses',
  `notif_man` varchar(100) DEFAULT NULL,
  `created_date` varchar(45) DEFAULT NULL,
  `rating` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_sub_tiket`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sub_tiket`
--

LOCK TABLES `tbl_sub_tiket` WRITE;
/*!40000 ALTER TABLE `tbl_sub_tiket` DISABLE KEYS */;
INSERT INTO `tbl_sub_tiket` VALUES (198,'TK-0002','AL-00001','KR-00001','SKR-00001','Selesai',NULL,'2019-08-20','4'),(199,'TK-0002','AL-00001','KR-00001','SKR-00002','Selesai',NULL,'2019-08-20','4'),(200,'TK-0002','AL-00001','KR-00004','SKR-00036','Selesai',NULL,'2019-08-20','3'),(201,'TK-0003','AL-00002','KR-00002','SKR-00017','Selesai',NULL,'2019-08-20',NULL),(202,'TK-0003','AL-00002','KR-00002','SKR-00018','Selesai',NULL,'2019-08-20',NULL),(203,'TK-0003','AL-00002','KR-00002','SKR-00019','Selesai',NULL,'2019-08-20',NULL),(204,'TK-0003','AL-00002','KR-00003','SKR-00034','Selesai',NULL,'2019-08-20',NULL),(205,'TK-0004','AL-00003','KR-00001','SKR-00003','Selesai',NULL,'2019-08-20',NULL),(206,'TK-0004','AL-00003','KR-00004','SKR-00036','Selesai',NULL,'2019-08-20',NULL),(207,'TK-0004','AL-00003','KR-00004','SKR-00038','Selesai',NULL,'2019-08-20',NULL),(208,'TK-0005','AL-00004','KR-00002','SKR-00017','Selesai',NULL,'2019-08-20',NULL),(209,'TK-0005','AL-00004','KR-00002','SKR-00018','Selesai',NULL,'2019-08-20',NULL),(210,'TK-0006','AL-00005','KR-00001','SKR-00001','Selesai',NULL,'2019-08-20',NULL),(211,'TK-0006','AL-00005','KR-00001','SKR-00002','Selesai',NULL,'2019-08-20',NULL),(212,'TK-0006','AL-00005','KR-00001','SKR-00003','Selesai',NULL,'2019-08-20',NULL),(213,'TK-0006','AL-00005','KR-00001','SKR-00004','Selesai',NULL,'2019-08-20',NULL),(214,'TK-0007','AL-00006','KR-00004','SKR-00036','Selesai',NULL,'2019-08-20',NULL),(215,'TK-0008','AL-00007','KR-00002','SKR-00017','Selesai',NULL,'2019-08-20',NULL),(216,'TK-0009','AL-00001','KR-00001','SKR-00002','Proses',NULL,'2019-08-22',NULL),(217,'TK-0009','AL-00001','KR-00002','SKR-00006','Proses',NULL,'2019-08-22',NULL),(218,'TK-0009','AL-00001','KR-00003','SKR-00033','Proses',NULL,'2019-08-22',NULL),(219,'TK-0009','AL-00001','KR-00004','SKR-00036','Proses',NULL,'2019-08-22',NULL),(220,'TK-0010','AL-00001','KR-00001','SKR-00003','Proses',NULL,'2019-08-23',NULL),(221,'TK-0010','AL-00001','KR-00001','SKR-00004','Proses',NULL,'2019-08-23',NULL),(222,'TK-0010','AL-00001','KR-00002','SKR-00005','Proses',NULL,'2019-08-23',NULL),(223,'TK-0010','AL-00001','KR-00002','SKR-00006','Proses',NULL,'2019-08-23',NULL),(224,'TK-0010','AL-00001','KR-00003','SKR-00033','Proses',NULL,'2019-08-23',NULL),(225,'TK-0010','AL-00001','KR-00003','SKR-00035','Proses',NULL,'2019-08-23',NULL),(226,'TK-0010','AL-00001','KR-00004','SKR-00036','Proses',NULL,'2019-08-23',NULL),(227,'TK-0011','AL-00001','KR-00001','SKR-00002','Proses',NULL,'2019-08-23',NULL),(228,'TK-0011','AL-00001','KR-00002','SKR-00007','Proses',NULL,'2019-08-23',NULL),(229,'TK-0011','AL-00001','KR-00003','SKR-00032','Proses',NULL,'2019-08-23',NULL),(230,'TK-0011','AL-00001','KR-00004','SKR-00036','Proses',NULL,'2019-08-23',NULL),(231,'TK-0011','AL-00001','KR-00004','SKR-00038','Proses',NULL,'2019-08-23',NULL),(232,'TK-0012','AL-00001','KR-00001','SKR-00004','Proses',NULL,'2019-08-23',NULL),(233,'TK-0012','AL-00001','KR-00002','SKR-00007','Proses',NULL,'2019-08-23',NULL),(234,'TK-0012','AL-00001','KR-00003','SKR-00033','Proses',NULL,'2019-08-23',NULL),(235,'TK-0012','AL-00001','KR-00004','SKR-00036','Proses',NULL,'2019-08-23',NULL),(236,'TK-0013','AL-00001','KR-00001','SKR-00003','Selesai',NULL,'2019-08-23','5'),(237,'TK-0013','AL-00001','KR-00002','SKR-00005','Selesai',NULL,'2019-08-23','1'),(238,'TK-0013','AL-00001','KR-00002','SKR-00006','Selesai',NULL,'2019-08-23','3'),(239,'TK-0013','AL-00001','KR-00002','SKR-00007','Selesai',NULL,'2019-08-23','4'),(240,'TK-0013','AL-00001','KR-00002','SKR-00008','Selesai',NULL,'2019-08-23','5'),(241,'TK-0013','AL-00001','KR-00002','SKR-00009','Selesai',NULL,'2019-08-23','1'),(242,'TK-0013','AL-00001','KR-00003','SKR-00032','Selesai',NULL,'2019-08-23','5'),(243,'TK-0013','AL-00001','KR-00003','SKR-00033','Selesai',NULL,'2019-08-23','5'),(244,'TK-0013','AL-00001','KR-00003','SKR-00034','Selesai',NULL,'2019-08-23','4'),(245,'TK-0013','AL-00001','KR-00003','SKR-00035','Selesai',NULL,'2019-08-23','5'),(246,'TK-0013','AL-00001','KR-00004','SKR-00036','Selesai',NULL,'2019-08-23','3');
/*!40000 ALTER TABLE `tbl_sub_tiket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tiket`
--

DROP TABLE IF EXISTS `tbl_tiket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tiket` (
  `id_tiket` varchar(100) NOT NULL,
  `id_alternatif` varchar(100) NOT NULL,
  `wkt_tiket` varchar(50) DEFAULT NULL,
  `tgl_tiket` date NOT NULL,
  `status_tiket` varchar(100) NOT NULL DEFAULT 'Proses',
  `approver` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tiket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tiket`
--

LOCK TABLES `tbl_tiket` WRITE;
/*!40000 ALTER TABLE `tbl_tiket` DISABLE KEYS */;
INSERT INTO `tbl_tiket` VALUES ('TK-0001','AL-00001','13:11:41','2019-08-20','Proses',NULL),('TK-0002','AL-00001','13:18:22','2019-08-20','Selesai','techsup'),('TK-0003','AL-00002','13:19:23','2019-08-20','Selesai','techsup'),('TK-0004','AL-00003','13:20:10','2019-08-20','Diterima',NULL),('TK-0005','AL-00004','13:20:54','2019-08-20','Diterima',NULL),('TK-0006','AL-00005','13:21:36','2019-08-20','Diterima',NULL),('TK-0007','AL-00006','13:22:08','2019-08-20','Diterima',NULL),('TK-0008','AL-00007','13:22:39','2019-08-20','Diterima',NULL),('TK-0009','AL-00001','16:57:13','2019-08-22','Diterima',NULL),('TK-0010','AL-00001','08:45:35','2019-08-23','Proses',NULL),('TK-0011','AL-00001','12:22:06','2019-08-23','Diterima',NULL),('TK-0012','AL-00001','12:27:16','2019-08-23','Diterima','techsup'),('TK-0013','AL-00001','12:58:29','2019-08-23','Selesai','techsup2');
/*!40000 ALTER TABLE `tbl_tiket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id_user` varchar(100) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` varchar(100) NOT NULL,
  `temla_user` varchar(100) NOT NULL,
  `tangla_user` date NOT NULL,
  `almt_user` varchar(100) NOT NULL,
  `notelp_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES ('US-0001','Admin Wika','admin','21232f297a57a5a743894a0e4a801fc3','Admin','Bekasi','1997-07-01','Bekasi Timur','082127887158'),('US-0002','Technical Support','techsup','295ba50301b3df6097c1ecaa434462d1','Technical Support','Bekasi','2019-06-19','Bekasi Timur','01290129'),('US-0003','Manager Support','mansup','bc5ff4665880f412da5dcdc209918dd7','Manager Support','Bekasi','2019-06-19','Bekasi Timur','01290129'),('US-0004','Technical Support 2','techsup2','295ba50301b3df6097c1ecaa434462d1','Technical Support','Bekasi','2019-06-19','Bekasi Timur','01290129');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','PnvaAEMA85gcavo5kv5BPlj0ObLHwcI2','$2y$13$PlnwM9FPQ2eDtoCU1ZwTouvO13SHdT9qVsENs.cbQzNJdyXoK15iS',NULL,'admin@admin.com',10,1565428353,1565428353,'MZE5qdC2hoGPIRdy7pQLW5FgnQT4Y8to_1565428353','1'),(2,'techsup','VtlDPD2Dg2g8Fx8Z_5pXt006BHBnNzZf','$2y$13$O8EKKeWztr/cw1VFRfgk5.d1FnH0bUaqDY0DaNKQeoN3VpkXeoYrS',NULL,'techsup@techsup.com',10,1565428213,1565428213,'oyWndPR4xsnc7EZjEEGRBiifnRZpRR7v_1565428213','2'),(3,'mansup','-hVeUj8SyAuTrMOxhDrHQsiWUeJywlc5','$2y$13$ay/NtcfGMY20hHpRWdXu7O2f.0De6kuFNF7QAHSCW1.7ZtIxNBDFu',NULL,'mansup@mansup.com',10,1565427022,1565427022,'ZmUXjNf6D7Uamh1Of8LYsYG4DOmS3iCy_1565427022','3'),(4,'desta','UwmWPeBn8pODtwVdfj5tqzwihTjXUSvV','$2y$13$RXr/SjMkUrVLg/am77pk7eN0P.jVenPlWOcCP2VQomc.op0KjslTW',NULL,'desta@mailinator.com',10,1565428918,1565428918,'VUmPOleALDC27S-1qHRGWyLqxe_LU8d4_1565428918','4'),(5,'aisyah','MxbAio6JQYQgqMgoczbhUi130IwDBZrq','$2y$13$7834vKjY6oj8z/v.YCf33e7eDSM5NKp.xmpewbPbtbYV4AHpIMLlC',NULL,'aisyah1@mailinator.com',10,1565428978,1565428978,'tZsVoKbyh4vJbDceTHNCFm5OpbwMBisQ_1565428978','4'),(6,'kukuh','zLp9TI8tCxPGIdWfN1vvJprtUVfmrp1H','$2y$13$mMTN22j39MHYCg.awEuvX.tThU1v3TZiR08cuTtHhHH3R3jHa3WgS',NULL,'kukuh@mailinator.com',10,1565428994,1565428994,'haeg7ZRmkGDHTSZB-xvDGsGm99_L1l1O_1565428994','4'),(7,'ahmad','hAzF3PbAWPxWz--if-91bpa6iX5Kmdn0','$2y$13$K.h36ygVY94SH6MRI7Kj0OXwUeKWnoY/AYZPhhEXBJM.GFKgNcXhq',NULL,'ahmad@mailinator.com',10,1565429003,1565429003,'j-qmQlBVARhh4BZiKMyZrf9R1FEh6vES_1565429003','4'),(8,'wahyu','ExRGqjr723F734Anzt1yXJ1AkCMfysfl','$2y$13$Ap.FMmDFUxakFLljrxqBVeofyzm4oNJggh8jPNZP1cHefkSS0DOW2',NULL,'wahyu@mailinator.com',10,1565429012,1565429012,'s3Q4bIdCduq5L7w-rw7XmdaBpcy7MVBe_1565429012','4'),(9,'fauzan','XhTaoZuFy1fblOiSeuF-prcvXNTURXXZ','$2y$13$uvHGN3cJHUXeJdx.xx6LBerKGoKl1dxjJYKQjL0c/OiPYbFqwFdSi',NULL,'fauzan@mailinator.com',10,1565429022,1565429022,'VtV8SpIbKYE2RVClqMXSQmGJeup0DsCR_1565429022','4'),(10,'rizal','S231hkFfcWvj3Fvt7VJ-dSjwJl04rxKV','$2y$13$VzrMaAkXsWhJ4aHMVpk7FOvyb6duuFm7rJPegKmzq.DrE6HUr1tRa',NULL,'rizal@mailinator.com',10,1565429034,1565429034,'vgKglXci3duVXVtL5YkwxaGeAidGTayO_1565429034','4'),(11,'techsup2','Ob6vy1GwdMNzdxX8AalMxqN1K2y7ncpu','$2y$13$o1VNVzhzhbFXHKJ7ZLq8Deu42O3YDPXhUpr8jkrvG5jAO2gIS.Q3u',NULL,'techsup2@mailinator.com',10,1566535965,1566535965,'cuOLRFWUu6zxUezbS4gMu23ysYiFlRfi_1566535965','2');
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

-- Dump completed on 2019-08-23 14:33:56
