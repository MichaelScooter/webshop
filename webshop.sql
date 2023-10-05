-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1:3306
-- Genereringstid: 05. 10 2023 kl. 07:26:19
-- Serverversion: 10.10.2-MariaDB
-- PHP-version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `bog`
--

DROP TABLE IF EXISTS `bog`;
CREATE TABLE IF NOT EXISTS `bog` (
  `bogId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bogTitel` varchar(50) NOT NULL,
  `bogForfatter` varchar(50) NOT NULL,
  `bogUdgivelsesAar` int(4) NOT NULL,
  `bogGenre` varchar(50) NOT NULL,
  `bogSprog` varchar(10) NOT NULL,
  `bogSider` int(4) NOT NULL,
  `bogBeskrivelse` text DEFAULT NULL,
  `bogUdgave` varchar(15) NOT NULL,
  `bogPris` decimal(6,2) NOT NULL,
  `bogForlag` varchar(30) NOT NULL,
  `bogISBN` varchar(20) NOT NULL,
  `bogDato` datetime NOT NULL DEFAULT current_timestamp(),
  `bogBillede` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bogId`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Data dump for tabellen `bog`
--

INSERT INTO `bog` (`bogId`, `bogTitel`, `bogForfatter`, `bogUdgivelsesAar`, `bogGenre`, `bogSprog`, `bogSider`, `bogBeskrivelse`, `bogUdgave`, `bogPris`, `bogForlag`, `bogISBN`, `bogDato`, `bogBillede`) VALUES
(1, 'To Kill a Mockingbird', 'Harper Lee', 1960, 'Roman, social retfærdighed', 'Engelsk', 336, '<p>\"To Kill a Mockingbird\" er en klassisk roman, der udforsker sp&oslash;rgsm&aring;l om race, klasse og moral i den amerikanske syd under 1930\'erne. Handlingen f&oslash;lger den unge pige Scout Finch og hendes bror Jem, hvis far, advokaten Atticus Finch, forsvarer en sort mand, der er anklaget for voldt&aelig;gt. Bogen udforsker temaer som fordomme, empati og retf&aelig;rdighed gennem Scout\'s &oslash;jne.</p>', 'Hardcover', '149.00', 'Harper & Row', '978-0-06-112008-4', '2023-09-26 11:06:31', 'To_Kill_a_Mockingbird.webp'),
(3, 'Pride and Prejudice', 'Jane Austen', 1813, 'Roman, Klassiker', 'Engelsk', 432, '<p>\"Pride and Prejudice\" er en klassisk k&aelig;rlighedsroman, der udforsker temaer som klasse, fordomme og sociale normer i det engelske samfund i det tidlige 19. &aring;rhundrede. Historien f&oslash;lger Elizabeth Bennet, en uafh&aelig;ngig og skarp kvinde, n&aring;r hun navigerer gennem k&aelig;rlighed og &aelig;gteskab i en tid, hvor sociale forventninger er strenge.</p>', 'Paperback', '129.00', 'Vintage Classics', '978-0-09-958933-4', '2023-09-26 11:24:25', 'Pride and Prejudice.webp'),
(4, '1984', 'George Orwell', 1949, 'Dystopi, Science Fiction', 'Engelsk', 328, '<p>1984 er en dystopisk roman, der udforsker et totalit&aelig;rt samfund, hvor individuel frihed og privatliv er undertrykt. Hovedpersonen, Winston Smith, k&aelig;mper imod regimets overv&aring;gning og tankekontrol i en verden, hvor sandheden er fleksibel, og historien konstant &aelig;ndres.</p>', 'Paperback', '99.00', 'Penguin Books', '978-0-14-103614-4', '2023-09-26 11:33:28', '1984.webp'),
(5, 'The Great Gatsby', 'F. Scott Fitzgerald', 1925, 'Roman, Klassiker', 'Engelsk', 192, '<p>The Great Gatsby er en klassisk roman, der skildrer det dekadente liv i 1920\'ernes jazzalder i USA. Historien f&oslash;lger den mystiske Jay Gatsby og hans k&aelig;rlighed til Daisy Buchanan, og den udforsker temaer som overflod, illusioner og klasseskel.</p>', 'Hardcover', '149.00', 'Scribner', '978-0-7432-7356-5', '2023-09-26 11:35:58', 'The_Great_Gatsby.webp'),
(6, 'Harry Potter and the Sorcerer\'s Stone', ' J.K. Rowling', 1997, 'Fantasy', 'Engelsk', 320, '<p>Harry Potter and the Sorcerer\'s Stone er begyndelsen p&aring; den magiske rejse af Harry Potter, en ung troldmand, der opdager sin sk&aelig;bne som en beskytter mod m&oslash;rkets kr&aelig;fter. Bogen udforsker temaer som venskab, mod og kampen mellem godt og ondt.</p>', 'Hardcover', '149.00', 'Scholastic', '978-0-590-35340-3', '2023-09-26 11:37:34', 'Harry_Potter_and_the_Sorcerer_Stone.webp'),
(7, 'The Catcher in the Rye', ' J.D. Salinger', 1951, 'Roman, Ungdomslitteratur', 'Engelsk', 224, '<p>The Catcher in the Rye er en ungdomsroman, der f&oslash;lger den desillusionerede teenager Holden Caulfield, n&aring;r han s&oslash;ger mening i en verden, han finder meningsl&oslash;s. Bogen udforsker temaer som isolation, identitet og teenageangst.</p>', 'Paperback', '109.00', 'Little, Brown and Company', '978-0-316-76948-0', '2023-09-26 11:40:00', 'The_Catcher_in_the_Rye.webp'),
(8, 'The Hobbit', 'J.R.R. Tolkien', 1937, ' Fantasy, Eventyr', 'Engelsk', 320, '<p>The Hobbit f&oslash;lger eventyrene af Bilbo Baggins, en almindelig hobbit, der bliver draget ind i et episk eventyr for at redde dv&aelig;rgenes kongerige fra dragen Smaug. Bogen udforsker temaer som mod, venskab og sk&aelig;bne.</p>', 'Hardcover', '129.00', 'Houghton Mifflin Harcourt', ' 978-0-261-10210-6', '2023-09-26 11:41:28', 'The_Hobbit.webp'),
(9, 'The Lord of the Rings', 'J.R.R. Tolkien', 1955, 'Fantasy, Eventyr', 'Engelsk', 1178, '<p>The Lord of the Rings er en episk fantasy-trilogi, der f&oslash;lger en gruppe eventyrere, der fors&oslash;ger at &oslash;del&aelig;gge en ond ring, der truer med at &oslash;del&aelig;gge verden. B&oslash;gerne udforsker temaer som venskab, mod og magtens fristelse.</p>', 'Hardcover', '299.00', 'Houghton Mifflin Harcourt', '978-0-345-45308-1', '2023-09-26 11:43:20', 'The_Lord_of_the_Rings.webp'),
(10, 'The Da Vinci Code', 'Dan Brown', 2003, 'Thriller, Mystery', 'Engelsk', 464, '<p>The Da Vinci Code er en sp&aelig;ndingsroman, der f&oslash;lger symbologen Robert Langdon og kryptologen Sophie Neveu, n&aring;r de fors&oslash;ger at l&oslash;se en gammel g&aring;de omkring Da Vincis mesterv&aelig;rker. Bogen udforsker temaer som religion, kunst og konspirationer.</p>', 'Paperback', '149.00', 'Doubleday', '978-0-385-50420-5', '2023-09-26 11:45:00', 'The_Da_Vinci_Code.webp'),
(11, 'The Hunger Games', 'Suzanne Collins', 2008, 'Dystopi, Ungdomslitteratur', 'Engelsk', 374, '<p>The Hunger Games foreg&aring;r i en dystopisk fremtid, hvor unge mennesker deltager i en d&oslash;dbringende tv-kamp kaldet De Sultne Lege. Bogen f&oslash;lger Katniss Everdeen, en ung kvinde, der k&aelig;mper for overlevelse og frihed. Romanen udforsker temaer som overlevelse, undertrykkelse og modstand.</p>', 'Hardcover', '129.00', 'Scholastic', '978-0-439-02351-1', '2023-09-26 11:46:25', 'The_Hunger_Games.webp'),
(12, 'The Chronicles of Narnia: The Lion', 'C.S. Lewis', 1950, ' Fantasy, Ungdomslitteratur', 'Engelsk', 208, '<p>The Lion, the Witch and the Wardrobe er f&oslash;rste bind i The Chronicles of Narnia-serien og f&oslash;lger fire s&oslash;skende, der opdager en magisk verden ved at g&aring; igennem en garderobe. I Narnia bliver de en del af en episk kamp mellem godt og ondt, ledet af den m&aelig;gtige l&oslash;ve Aslan. Bogen udforsker temaer som eventyr, mod og magi.</p>', 'Paperback', '99.00', 'HarperCollins', '978-0-06-447104-6', '2023-09-26 11:48:36', 'The_Chronicles_of_Narnia.webp'),
(13, 'The Alchemist', 'Paulo Coelho', 1988, 'Roman, Selvhjælp', 'Engelsk', 208, '<p>The Alchemist er en inspirerende roman om Santiago, en ung hyrde, der s&oslash;ger sin personlige legende skat. Undervejs m&oslash;der han mystiske vejledere og oplever magiske &oslash;jeblikke, der f&oslash;rer ham p&aring; en spirituel rejse. Bogen udforsker temaer som sk&aelig;bne, dr&oslash;mme og personlig opdagelse.</p>', 'Paperback', '129.00', 'HarperOne', '978-0-06-112008-4', '2023-09-26 11:50:09', 'The_Alchemist.webp'),
(19, 'The Nightingale', 'Kristin Hannah', 2015, 'Historisk fiktion, Krigsdrama', 'Engelsk', 440, '<p>The Nightingale er en hjertegribende historisk roman, der f&oslash;lger to s&oslash;stre, Vianne og Isabelle, i Frankrig under Anden Verdenskrig. De to kvinder m&aring; navigere gennem krigens farer og k&aelig;mpe for overlevelse og frihed p&aring; hver deres m&aring;de.</p>', 'Hardcover', '169.00', 'St. Martin\'s Press', '978-0-312-57750-1', '2023-10-03 16:03:44', 'The_Nightingale.webp'),
(20, 'The Road', 'Cormac McCarthy', 2006, 'Post-apokalyptisk, Dystopi', 'Engelsk', 256, '<p>The Road er en rystende dystopisk roman, der f&oslash;lger en far og hans unge s&oslash;n p&aring; en farefuld rejse gennem en &oslash;delagt verden i jagten p&aring; sikkerhed. Bogen udforsker temaer som overlevelse, k&aelig;rlighed og menneskelig natur.</p>', 'Paperback', '139.00', 'Vintage Books', '978-0-307-26565-0', '2023-10-03 16:05:58', 'The_Road.webp'),
(21, 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 2005, 'Krimi, Thriller', 'Svensk', 590, '<p>The Girl with the Dragon Tattoo er en sp&aelig;ndingsroman, der f&oslash;lger journalisten Mikael Blomkvist og hackeren Lisbeth Salander, n&aring;r de fors&oslash;ger at opklare en gammel families forsvinden. Bogen udforsker temaer som korruption, hemmeligheder og retf&aelig;rdighed.</p>', 'Hardcover', '159.00', 'Norstedts Förlag', '978-91-0-013967-4', '2023-10-03 16:07:46', 'The_Girl_with_the_Dragon_Tattoo.webp'),
(22, 'The Kite Runner', 'Khaled Hosseini', 2003, 'Roman, Historisk fiktion', 'Dansk', 368, '<p>Dragel&oslash;beren\" er den danske overs&aelig;ttelse af \"The Kite Runner\" og f&oslash;lger livet og venskabet mellem to drenge, Amir og Hassan, i Afghanistan. Romanen udforsker temaer som venskab, skyld og forsoning i en tid pr&aelig;get af politisk uro.</p>', 'Paperback', '149.00', 'Gyldendal', '978-87-02-02229-1', '2023-10-03 16:09:39', 'The_Kite_Runner.webp'),
(23, 'The Night Circus', 'Erin Morgenstern', 2011, 'Fantasy, Magisk realisme', 'Engelsk', 389, '<p>The Night Circus er en fortryllende roman, der udforsker en magisk cirkus, der kun optr&aelig;der om natten. Bogen f&oslash;lger to unge magikere, Celia og Marco, hvis sk&aelig;bne er viklet sammen i en konkurrence, der kan have d&oslash;delige konsekvenser.</p>', 'Paperback', '139.00', 'Anchor Books', '978-0-385-34296-8', '2023-10-03 16:11:16', 'The_Night_Circus.webp'),
(24, 'The Silent Patient', 'Alex Michaelides', 2019, 'Psykologisk thriller', 'Engelsk', 336, '<p>The Silent Patient er en psykologisk thriller om en kvinde, Alicia Berenson, der er anklaget for at have dr&aelig;bt sin mand og derefter aldrig tale igen. En terapeut fors&oslash;ger at l&oslash;se mysteriet bag hendes tavshed.</p>', 'Hardcover', '149.00', 'Celadon Books', '978-1-250-30169-7', '2023-10-03 16:13:09', 'The_Silent_Patient.webp'),
(25, 'The Goldfinch', 'Donna Tartt', 2013, 'Roman, Coming-of-Age', 'Engelsk', 771, '<p>The Goldfinch er en episk roman, der f&oslash;lger den unge Theo Decker, der overlever en eksplosion p&aring; et kunstmuseum og stj&aelig;ler et v&aelig;rdifuldt maleri kaldet \"The Goldfinch.\" Bogen udforsker temaer som tab, k&aelig;rlighed og sk&aelig;bne.</p>', 'Hardcover', '179.00', 'Brown and Company', '978-0-316-05543-7', '2023-10-03 16:16:09', NULL),
(26, 'The Martian', 'Andy Weir', 2011, 'Science Fiction, Overlevelsesdrama', 'Dansk', 394, '<p>\"Marsianeren\" er den danske overs&aelig;ttelse af \"The Martian\" og f&oslash;lger astronauten Mark Watney\'s kamp for overlevelse p&aring; Mars efter at v&aelig;re blevet efterladt af hans bes&aelig;tning. Romanen udforsker temaer som vedholdenhed, opfindsomhed og menneskelig viljestyrke.</p>', 'Paperback', '149.00', 'Gyldendal', '978-87-02-10450-6', '2023-10-03 16:18:07', '901493-691200-640-406.webp'),
(27, 'test', 'test', 2012, 'test', 'test sprog', 156, '<p>gfgfgf</p>', 'Hardcover', '159.00', 'ghgh', '978-0-05-958933-4', '2023-10-03 16:22:08', 'test_bog.webp'),
(28, 'hg', 'hg', 1236, 'ghg', 'gh', 2, '<p>hjjh</p>', 'Hardcover', '129.00', 'kml', '978-0-09-958953-4', '2023-10-05 09:25:33', 'test_bog.webp');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
