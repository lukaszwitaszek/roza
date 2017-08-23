-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_main
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

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
-- Table structure for table `hasze`
--

DROP TABLE IF EXISTS `hasze`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hasze` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `haszHasla` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hasze`
--

LOCK TABLES `hasze` WRITE;
/*!40000 ALTER TABLE `hasze` DISABLE KEYS */;
INSERT INTO `hasze` VALUES ('admin@system.pl','$2y$10$a/1X1T5SDCsQ9YLb4johs.HZw3WZWbWJdlOq3OtXwUPPtLKQAcwUi','2017-08-18 13:26:19','2017-08-18 13:26:19',NULL),('administrator@system.pl','$2y$10$hA/ikORtRqG/FM8WxVgfweejWkyP1QO1g52YlLfJ8QVyWBL305/Lm','2017-08-22 11:36:23','2017-08-22 11:36:23',NULL),('zelator@system.pl','$2y$10$XbKaLVvRplhxr1tbYTGOyOjKaokPTG2jt2tFJz52iPcL0.pa06gZm','2017-08-23 08:17:39','2017-08-23 08:17:39',NULL);
/*!40000 ALTER TABLE `hasze` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kolo`
--

DROP TABLE IF EXISTS `kolo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kolo` (
  `id` int(10) unsigned NOT NULL,
  `nazwa` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `rolowanie` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabela zawierajaca informacje o Kolach ZR w systemie.	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kolo`
--

LOCK TABLES `kolo` WRITE;
/*!40000 ALTER TABLE `kolo` DISABLE KEYS */;
INSERT INTO `kolo` VALUES (1,'Koło Pierwsze',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `kolo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tajemnice`
--

DROP TABLE IF EXISTS `tajemnice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tajemnice` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nr_tajemnicy` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='opis tajemnic R';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tajemnice`
--

LOCK TABLES `tajemnice` WRITE;
/*!40000 ALTER TABLE `tajemnice` DISABLE KEYS */;
INSERT INTO `tajemnice` VALUES (1,'Tajemnica pierwsza radosna: Zwiastowanie Najświętszej Maryi Pannie','Posłał Bóg anioła Gabriela do miasta w Galilei, zwanego Nazaret, do Dziewicy poślubionej mężowi, imieniem Józef, z rodu Dawida; a Dziewicy było na imię Maryja. Anioł wszedł do Niej i rzekł: „Bądź pozdrowiona, pełna łaski, Pan z Tobą”. Ona zmieszała się na te słowa i rozważała, co miałoby znaczyć to pozdrowienie. Lecz anioł rzekł do Niej: „Nie bój się, Maryjo, znalazłaś bowiem łaskę u Boga. Oto poczniesz i porodzisz Syna, któremu nadasz imię Jezus. Będzie On wielki i będzie nazwany Synem Najwyższego, a Pan Bóg da Mu tron Jego praojca, Dawida. Będzie panował nad domem Jakuba na wieki, a Jego panowaniu nie będzie końca”.',1,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(2,'Tajemnica druga radosna: Nawiedzenie świętej Elżbiety','W tym czasie Maryja wybrała się i poszła z pośpiechem w góry do pewnego miasta w pokoleniu Judy. Weszła do domu Zachariasza i pozdrowiła Elżbietę. Gdy Elżbieta usłyszała pozdrowienie Maryi, poruszyło się dzieciątko w jej łonie, a Duch Święty napełnił Elżbietę. Wydała ona okrzyk i powiedziała: „Błogosławiona jesteś między niewiastami i błogosławiony jest owoc Twojego łona. A skądże mi to, że Matka mojego Pana przychodzi do mnie? Oto, skoro głos Twego pozdrowienia zabrzmiał w moich uszach, poruszyło się z radości dzieciątko w moim łonie. Błogosławiona jesteś, któraś uwierzyła, że spełnią się słowa powiedziane Ci od Pana”.',2,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(3,'Tajemnica trzecia radosna: Narodzenie Pana Jezusa','W owym czasie wyszło rozporządzenie Cezara Augusta, żeby przeprowadzić spis ludności w całym państwie. Pierwszy ten spis odbył się wówczas, gdy wielkorządcą Syrii był Kwiryniusz. Wybierali się więc wszyscy, aby się dać zapisać, każdy do swego miasta. Udał się także Józef z Galilei, z miasta Nazaret, do Judei, do miasta Dawidowego, zwanego Betlejem, ponieważ pochodził z domu i rodu Dawida, żeby się dać zapisać z poślubioną sobie Maryją, która była brzemienna. Kiedy tam przebywali, nadszedł dla Maryi czas rozwiązania. Porodziła swego pierworodnego Syna, owinęła Go w pieluszki i położyła w żłobie, gdyż nie było dla nich miejsca w gospodzie.',3,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(4,'Tajemnica czwarta radosna: Ofiarowanie Pana Jezusa w świątyni','Gdy upłynęły dni ich oczyszczenia według Prawa Mojżeszowego, przynieśli Je do Jerozolimy, aby Je przedstawić Panu. Tak bowiem jest napisane w Prawie Pańskim: Każde pierworodne dziecko płci męskiej będzie poświęcone Panu. Mieli również złożyć w ofierze parę synogarlic albo dwa młode gołębie.',4,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(5,'Tajemnica piąta radosna: Odnalezienie Pana Jezusa w świątyni','Rodzice Jego chodzili co roku do Jerozolimy na Święto Paschy. Gdy miał lat dwanaście, udali się tam zwyczajem świątecznym. Kiedy wracali po skończonych uroczystościach, został Jezus w Jerozolimie, a tego nie zauważyli Jego Rodzice. Przypuszczając, że jest w towarzystwie pątników, uszli dzień drogi i szukali Go wśród krewnych i znajomych. Gdy Go nie znaleźli, wrócili do Jerozolimy szukając Go. Dopiero po trzech dniach odnaleźli Go w świątyni, gdzie siedział między nauczycielami, przysłuchiwał się im i zadawał pytania.',5,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(6,'Tajemnica pierwsza światła: Chrzest Pana Jezusa w Jordanie','Wtedy przyszedł Jezus z Galilei nad Jordan do Jana, żeby przyjąć chrzest od niego. Lecz Jan powstrzymywał Go, mówiąc: „To ja potrzebuję chrztu od Ciebie, a Ty przychodzisz do mnie?” Jezus mu odpowiedział: „Pozwól teraz, bo tak godzi się nam wypełnić wszystko, co sprawiedliwe”. Wtedy Mu ustąpił.',6,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(7,'Tajemnica druga światła: Objawienie się Pana Jezusa w Kanie Galilejskiej','Trzeciego dnia odbywało się wesele w Kanie Galilejskiej i była tam Matka Jezusa. Zaproszono na to wesele także Jezusa i Jego uczniów. A kiedy zabrakło wina, Matka Jezusa mówi do Niego: „Nie mają już wina”. Jezus Jej odpowiedział: „Czyż to moja lub Twoja sprawa, Niewiasto? Czyż jeszcze nie nadeszła godzina moja?” Wtedy Matka Jego powiedziała do sług: „Zróbcie wszystko, cokolwiek wam powie”. Stało zaś tam sześć stągwi kamiennych przeznaczonych do żydowskich oczyszczeń, z których każda mogła pomieścić dwie lub trzy miary. Rzekł do nich Jezus:„Napełnijcie stągwie wodą!” I napełnili je aż po brzegi.',7,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(8,'Tajemnica trzecia światła: Głoszenie królestwa i wzywanie do nawrócenia','Gdy Jezus posłyszał, że Jan został uwięziony, usunął się do Galilei. Opuścił jednak Nazaret, przyszedł i osiadł w Kafarnaum nad jeziorem, na pograniczu Zabulona i Neftalego. Tak miało się spełnić słowo proroka Izajasza: Ziemia Zabulona i ziemia Neftalego. Droga morska, Zajordanie, Galilea pogan! Lud, który siedział w ciemności, ujrzał światło wielkie, i mieszkańcom cienistej krainy śmierci światło wzeszło. Odtąd począł Jezus nauczać i mówić: „Nawracajcie się, albowiem bliskie jest królestwo niebieskie”.',8,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(9,'Tajemnica czwarta światła: Przemienienie Pańskie na górze Tabor','Po sześciu dniach Jezus wziął z sobą Piotra, Jakuba i Jana i zaprowadził ich samych osobno na górę wysoką. Tam przemienił się wobec nich. Jego odzienie stało się lśniąco białe tak, jak żaden folusznik na ziemi wybielić nie zdoła. I ukazał się im Eliasz z Mojżeszem, którzy rozmawiali z Jezusem.',9,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(10,'Tajemnica piąta światła: Ustanowienie Eucharystii','A gdy nadeszła pora, zajął miejsce u stołu i Apostołowie z Nim. Wtedy rzekł do nich:„Gorąco pragnąłem spożyć Paschę z wami, zanim będę cierpiał. Albowiem powiadam wam: już jej spożywać nie będę, aż się spełni w królestwie Bożym”. Potem wziął kielich i odmówiwszy dziękczynienie rzekł: „Weźcie go i podzielcie między siebie; albowiem powiadam wam: odtąd nie będę już pił z owocu winnego krzewu, aż przyjdzie królestwo Boże”. Następnie wziął chleb, odmówiwszy dziękczynienie połamał go i podał mówiąc: „To jest Ciało moje, które za was będzie wydane: to czyńcie na moją pamiątkę!” Tak samo i kielich po wieczerzy, mówiąc: „Ten kielich to Nowe Przymierze we Krwi mojej, która za was będzie wylana.”',10,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(11,'Tajemnica pierwsza bolesna: Modlitwa Pana Jezusa w Ogrójcu','Potem wyszedł i udał się, według zwyczaju, na Górę Oliwną: towarzyszyli Mu także uczniowie. Gdy przyszedł na miejsce, rzekł do nich: „Módlcie się, abyście nie ulegli pokusie”. A sam oddalił się od nich na odległość jakby rzutu kamieniem, upadł na kolana i modlił się tymi słowami: „Ojcze, jeśli chcesz, zabierz ode Mnie ten kielich! Jednak nie moja wola, lecz Twoja niech się stanie!” Wtedy ukazał Mu się anioł z nieba i umacniał Go. Pogrążony w udręce jeszcze usilniej się modlił, a Jego pot był jak gęste krople krwi, sączące się na ziemię. Gdy wstał od modlitwy i przyszedł do uczniów, zastał ich śpiących ze smutku. Rzekł do nich: „Czemu śpicie? Wstańcie i módlcie się, abyście nie ulegli pokusie”.',11,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(12,'Tajemnica druga bolesna: Biczowanie Pana Jezusa','Odpowiedzieli: „Barabasza”. Rzekł do nich Piłat: „Cóż więc mam uczynić z Jezusem, którego nazywają Mesjaszem?” Zawołali wszyscy: „Na krzyż z Nim!” Namiestnik odpowiedział: „Cóż właściwie złego uczynił?” Lecz oni jeszcze głośniej krzyczeli: „Na krzyż z Nim!” Piłat widząc, że nic nie osiąga, a wzburzenie raczej wzrasta, wziął wodę i umył ręce wobec tłumu, mówiąc: „Nie jestem winny krwi tego Sprawiedliwego. To wasza rzecz”. cały lud zawołał: „Krew Jego na nas i na dzieci nasze”. Wówczas uwolnił im Barabasza, a Jezusa kazał ubiczować i wydał na ukrzyżowanie.',12,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(13,'Tajemnica trzecia bolesna: Cierniem ukoronowanie Pana Jezusa','Wówczas Piłat wziął Jezusa i kazał Go ubiczować. A żołnierze uplótłszy koronę z cierni, włożyli Mu ją na głowę i okryli Go płaszczem purpurowym. Potem podchodzili do Niego i mówili: „Witaj, Królu Żydowski!” I policzkowali Go. A Piłat ponownie wyszedł na zewnątrz i przemówił do nich: „Oto wyprowadzam Go do was na zewnątrz, abyście poznali, że ja nie znajduję w Nim żadnej winy”. Jezus więc wyszedł na zewnątrz, w koronie cierniowej i płaszczu purpurowym. Piłat rzekł do nich: „Oto Człowiek”. Gdy Go ujrzeli arcykapłani i słudzy, zawołali: „Ukrzyżuj! Ukrzyżuj!”Rzekł do nich Piłat: „Weźcie Go i sami ukrzyżujcie! Ja bowiem nie znajduję w Nim winy”. Odpowiedzieli mu Żydzi: „My mamy Prawo, a według Prawa powinien On umrzeć, bo sam siebie uczynił Synem Bożym”.',13,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(14,'Tajemnica czwarta bolesna: Dźwiganie krzyża na Kalwarię','Zabrali zatem Jezusa. A On sam dźwigając krzyż wyszedł na miejsce zwane Miejscem Czaszki, które po hebrajsku nazywa się Golgota. Tam Go ukrzyżowano, a z Nim dwóch innych, z jednej i drugiej strony, pośrodku zaś Jezusa. Wypisał też Piłat tytuł winy i kazał go umieścić na krzyżu. A było napisane: „Jezus Nazarejczyk, Król Żydowski”. Ten napis czytało wielu Żydów, ponieważ miejsce, gdzie ukrzyżowano Jezusa, było blisko miasta. A było napisane w języku hebrajskim, łacińskim i greckim. Arcykapłani żydowscy mówili do Piłata: „Nie pisz: Król Żydowski, ale że On powiedział: Jestem Królem Żydowskim”. Odparł Piłat: „Com napisał, napisałem”.',14,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(15,'Tajemnica piąta bolesna: Ukrzyżowanie i śmierć Pana Jezusa','A obok krzyża Jezusowego stały: Matka Jego i siostra Matki Jego, Maria, żona Kleofasa, i Maria Magdalena. Kiedy więc Jezus ujrzał Matkę i stojącego obok Niej ucznia, którego miłował, rzekł do Matki: „Niewiasto, oto syn Twój”. Następnie rzekł do ucznia: „Oto Matka twoja”. I od tej godziny uczeń wziął Ją do siebie. Potem Jezus świadom, że już wszystko się dokonało, aby się wypełniło Pismo, rzekł: „Pragnę”. Stało tam naczynie pełne octu. Nałożono więc na hizop gąbkę pełną octu i do ust Mu podano. A gdy Jezus skosztował octu, rzekł: „Wykonało się!” I skłoniwszy głowę oddał ducha.',15,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(16,'Tajemnica pierwsza chwalebna: Zmartwychwstanie Pana Jezusa','Anioł zaś przemówił do niewiast: „Wy się nie bójcie! Gdyż wiem, że szukacie Jezusa Ukrzyżowanego. Nie ma Go tu, bo zmartwychwstał, jak powiedział. Chodźcie, zobaczcie miejsce, gdzie leżał. A idźcie szybko i powiedzcie Jego uczniom: Powstał z martwych i oto udaje się przed wami do Galilei. Tam Go ujrzycie. Oto, co wam powiedziałem”. Pośpiesznie więc oddaliły się od grobu, z bojaźnią i wielką radością, i biegły oznajmić to Jego uczniom. A oto Jezus stanął przed nimi i rzekł: „Witajcie!” One podeszły do Niego, objęły Go za nogi i oddały Mu pokłon. A Jezus rzekł do nich: „Nie bójcie się!”',16,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(17,'Tajemnica druga chwalebna: Wniebowstąpienie Pana Jezusa','I rzekł do nich: „Idźcie na cały świat i głoście Ewangelię wszelkiemu stworzeniu! Kto uwierzy i przyjmie chrzest, będzie zbawiony; a kto nie uwierzy, będzie potępiony. Tym zaś, którzy uwierzą, te znaki towarzyszyć będą: w imię moje złe duchy będą wyrzucać, nowymi językami mówić będą; węże brać będą do rąk, i jeśliby co zatrutego wypili, nie będzie im szkodzić. Na chorych ręce kłaść będą, i ci odzyskają zdrowie”. Po rozmowie z nimi Pan Jezus został wzięty do nieba i zasiadł po prawicy Boga. Oni zaś poszli i głosili Ewangelię wszędzie, a Pan współdziałał z nimi i potwierdził naukę znakami, które jej towarzyszyły.',17,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(18,'Tajemnica trzecia chwalebna: Zesłanie Ducha Świętego','Kiedy nadszedł wreszcie dzień Pięćdziesiątnicy, znajdowali się wszyscy razem na tym samym miejscu. Nagle dał się słyszeć z nieba szum, jakby uderzenie gwałtownego wiatru, i napełnił cały dom, w którym przebywali. Ukazały się im też języki jakby z ognia, które się rozdzieliły, i na każdym z nich spoczął jeden. I wszyscy zostali napełnieni Duchem Świętym, i zaczęli mówić obcymi językami, tak jak im Duch pozwalał mówić.',18,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(19,'Tajemnica czwarta chwalebna: Wniebowzięcie Najświętszej Maryi Panny','Wtedy Maryja rzekła: „Wielbi dusza moja Pana, i raduje się duch mój w Bogu, moim Zbawcy. Bo wejrzał na uniżenie Służebnicy swojej. Oto bowiem błogosławić mnie będą odtąd wszystkie pokolenia, gdyż wielkie rzeczy uczynił mi Wszechmocny. Święte jest Jego imię – a swoje miłosierdzie na pokolenia i pokolenia zachowuje dla tych, co się Go boją.',19,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(20,'Tajemnica piąta chwalebna: Ukoronowanie Maryi na Królową nieba i ziemi','Potem wielki znak się ukazał na niebie: Niewiasta obleczona w słońce i księżyc pod jej stopami, a na jej głowie wieniec z gwiazd dwunastu. A jest brzemienna. I woła cierpiąc bóle i męki rodzenia. I inny znak się ukazał na niebie: Oto wielki Smok barwy ognia, mający siedem głów i dziesięć rogów – a na głowach jego siedem diademów. I ogon jego zmiata trzecią część gwiazd nieba: i rzucił je na ziemię.',20,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL);
/*!40000 ALTER TABLE `tajemnice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uczestnicy`
--

DROP TABLE IF EXISTS `uczestnicy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uczestnicy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imie` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `telefon` varchar(12) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ost_wizyta` timestamp NULL DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `zelat` tinyint(4) DEFAULT NULL,
  `kolo_id` int(11) NOT NULL,
  `nr_tajemnicy` int(2) NOT NULL,
  `ostatnia_wiadomosc` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idusers_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabela uzytkownikow systemu KZR';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uczestnicy`
--

LOCK TABLES `uczestnicy` WRITE;
/*!40000 ALTER TABLE `uczestnicy` DISABLE KEYS */;
INSERT INTO `uczestnicy` VALUES (16,'Administrator','System','administrator@system.pl','000','2017-08-22 11:36:23',NULL,1,0,1,1,2,'2017-08-22 11:36:23',NULL),(17,'Zelator','System','zelator@system.pl','000','2017-08-23 08:17:39',NULL,0,1,1,2,2,'2017-08-23 08:17:39',NULL),(18,'Uczestnik','System','uczestnik@system.pl','uczestnik@sy','2017-08-23 08:18:10',NULL,0,0,1,3,2,'2017-08-23 08:18:10',NULL),(19,'Uczestnik2','System','uczestnik2@system.pl','000','2017-08-23 08:19:34',NULL,0,0,1,4,2,'2017-08-23 08:19:34',NULL);
/*!40000 ALTER TABLE `uczestnicy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wiadomosci`
--

DROP TABLE IF EXISTS `wiadomosci`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wiadomosci` (
  `id` int(11) NOT NULL,
  `naglowek` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `tresc` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `kolo_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='wiadomości przesyłane do członków systemu';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wiadomosci`
--

LOCK TABLES `wiadomosci` WRITE;
/*!40000 ALTER TABLE `wiadomosci` DISABLE KEYS */;
INSERT INTO `wiadomosci` VALUES (1,'Pierwsza wiadomość dla koła 1.','Treść pierwszej wiadomości dla koła 1.',1,4,'2017-05-01 10:00:00','2017-05-01 10:00:00',NULL),(2,'Druga wiadomość dla koła 1.','Treść drugiej wiadomości dla koła 1.',1,3,'2017-06-06 06:10:55','2017-06-06 06:10:55',NULL),(3,'Pierwsza wiadomość dla koła 2.','Treść pierwszej wiadomości dla koła 2.',2,2,'2017-06-06 06:10:55','2017-06-06 06:10:55',NULL),(4,'Druga wiadomość dla koła 2.','Treść drugiej wiadomości dla koła 2.',2,1,'2017-06-06 06:10:55','2017-06-06 06:10:55',NULL);
/*!40000 ALTER TABLE `wiadomosci` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-23 15:46:35
