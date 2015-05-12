-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2015 at 09:45 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mmistudioscom`
--

-- --------------------------------------------------------

--
-- Table structure for table `mmi_orders`
--

CREATE TABLE IF NOT EXISTS `mmi_orders` (
`id` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `customerAddress1` text NOT NULL,
  `customerAddress2` text NOT NULL,
  `customerCity` varchar(255) NOT NULL,
  `customerState` varchar(255) NOT NULL,
  `customerZip` varchar(22) NOT NULL,
  `customerCountry` varchar(255) NOT NULL,
  `customerStripe` varchar(255) NOT NULL,
  `orderSummary` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mmi_orders`
--

INSERT INTO `mmi_orders` (`id`, `customerName`, `customerEmail`, `customerAddress1`, `customerAddress2`, `customerCity`, `customerState`, `customerZip`, `customerCountry`, `customerStripe`, `orderSummary`) VALUES
(1, 'Richard Bakos', 'riki.rez@gmail.com', '3316 Cochiti St NE', 'Suite 01<br>', 'Rio Rancho', 'NM', '87144', 'United States', 'cus_5KULSv0aWTDVPZ', ''),
(2, 'Richard Bakos', 'riki.rez@gmail.com', '3316 Cochiti St NE', '', 'Rio Rancho', 'NM', '87144', 'US', 'cus_5KrJ3I7FNkHHKQ', ''),
(3, 'Richard Bakos', 'riki.rez@gmail.com', '3316 Cochiti St NE', 'Suite 01', 'Rio Rancho', 'New Mexico', '87144', 'US', 'cus_5KrNzYf0y1Pku5', ''),
(4, 'Richard Bakos', 'riki.rez@gmail.com', '3316 Cochiti St NE', 'Suite 01', 'Rio Rancho', 'NM', '87144', 'US', 'cus_5KrTqUIdDBHVti', '');

-- --------------------------------------------------------

--
-- Table structure for table `mmi_pages`
--

CREATE TABLE IF NOT EXISTS `mmi_pages` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `keywords` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'article',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mmi_products`
--

CREATE TABLE IF NOT EXISTS `mmi_products` (
`id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `artist_page` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cat_num` varchar(9) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `third_party` text NOT NULL,
  `featured` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `mmi_products`
--

INSERT INTO `mmi_products` (`id`, `category`, `artist`, `artist_page`, `title`, `cat_num`, `description`, `img`, `content`, `price`, `third_party`, `featured`) VALUES
(21, 'Shipping', 'NA', '', 'USPS First Class International', 'NA', 'International shipping charges', 'NA', 'NA', '9.12', 'NA', 'no'),
(22, 'CD', 'Brother Cement', '''app/includes/content/artists/brother-cement.php'', ''content-swapper''', 'Self-Titled', 'MMI003001', '<p>Self-titled debut.</p>\r\n<p>Written, recorded, and produced by Brother Cement<br>\r\nBrother Cement is Dylan Cowles & Riki Rezinunts<br>\r\nArtwork by Dylan Cowles<br>\r\nGraphic Design by Jeremy Cowles<br>\r\nPackage Design by Resonance Design (resonance-designs.com)<br>\r\nMastered by Riki Rezinunts @ MMI Studios (mmi-studios.com)<br>\r\nLabel: MMI Studios (Rio Rancho, NM)<br></p>', 'brother-cement.png', '''app/includes/content/albums/brother-cement.php'', ''content-swapper''', '12.74', '<a href="https://brothercement.bandcamp.com/album/self-titled-debut-remastered" target="_blank"><small>$6.00 @ Bandcamp (Download)</small></a>', 'no'),
(23, 'CD', 'Gross National Produkt', '''app/includes/content/artists/gross-national-produkt.php'', ''content-swapper''', 'Disturbed Spaces', 'MMI001002', 'Second release from GNP. Mostly instrumental and it''s an example of Riki''s first forays into a more structured and dance-floor industrial approach compared to his previous efforts which were much more ambient and free-form.', 'disturbed-spaces.png', '''app/includes/content/albums/disturbed-spaces.php'', ''content-swapper''', '14.74', '<a href="https://grossnationalprodukt.bandcamp.com/album/disturbed-spaces" target="_blank"><small>$5.00 @ Bandcamp (Download)</small></a><br>\r\n<a href="http://www.cdbaby.com/cd/grossnationalprodukt14" target="_blank"><small>$5.00 @ CDBaby (Download)</small></a>', 'no'),
(24, 'CD', 'Gross National Produkt', '''app/includes/content/artists/gross-national-produkt.php'', ''content-swapper''', 'Enslave', 'MMI001003', 'All songs written, recorded, and produced by Riki Rezinunts\r\nArtwork by Resonance Design (resonance-designs.com)\r\nMastered by Riki Rezinunts @ MMI Studios (mmi-studios.com)\r\nLabel: MMI Studios (Rio Rancho, NM USA) ', 'enslave.png', '''app/includes/content/albums/enslave.php'', ''content-swapper''', '14.74', '<a href="https://grossnationalprodukt.bandcamp.com/album/enslave" target="_blank"><small>$6.00 @ Bandcamp (Download)</small></a><br>\r\n<a href="http://www.cdbaby.com/cd/grossnationalprodukt15" target="_blank"><small>$6.00 @ CDBaby (Download)</small></a>', 'no'),
(25, 'CD', 'Gross National Produkt', '''app/includes/content/artists/gross-national-produkt.php'', ''content-swapper''', 'The Death Among Us', 'MMI001004', 'All songs written, recorded, and produced by Riki Rezinunts\r\nArtwork by Jamason Finn\r\nPackage Design by Resonance Design (resonance-designs.com)\r\nMastered by Riki Rezinunts @ MMI Studios (mmi-studios.com)\r\nLabel: MMI Studios (Rio Rancho, NM USA) ', 'the-death-among-us.png', '''app/includes/content/albums/the-death-among-us.php'', ''content-swapper''', '14.74', '<a href="https://grossnationalprodukt.bandcamp.com/album/the-death-among-us" target="_blank"><small>$7.00 @ Bandcamp (Download)</small></a><br>\r\n<a href="http://www.cdbaby.com/cd/grossnationalprodukt16" target="_blank"><small>$7.00 @ CDBaby (Download)</small></a>', 'no'),
(26, 'CD', 'Sound-Skrapes', '''app/includes/content/artists/sound-skrapes.php'', ''content-swapper''', 'Kode', 'MMI005001', '<p>In October of 2004 the debut album of Sound-Skrapes, “Kode” had been completed. This serves as somewhat of a conceptual album and tells the story of a fairly advanced digital civilization fading out of existence because their advanced and superior technology that they were so dependent upon ultimately became their undoing.</p>\r\n<p>All songs written and recorded by Sound-Skrapes<br>\r\nSound-Skrapes is Riki Rezinunts<br>\r\nArtwork and packaging by Resonance Design (resonance-designs.com)<br>\r\nMastered @ MMI Studios (mmi-studios.com)<br>\r\nLabel: MMI Studios (Rio Rancho, NM USA)</p>', 'kode.png', '''app/includes/content/albums/kode.php'', ''content-swapper''', '14.74', '<a href="https://sound-skrapes.bandcamp.com/album/kode" target="_blank"><small>$7.00 @ Bandcamp (Download)</small></a>', 'no'),
(27, 'CD', 'Komatose Void', '''app/includes/content/artists/komatose-void.php'', ''content-swapper''', 'Kontinuum', 'MMI006001', '<p>The debut LP release from 2005. Remastered and re-released with a revised track-list in 2011. Instrumental darkcore for getting rowdy!</p>\r\n<p>All songs written, recorded, and produced by Komatose Void<br>\r\nKomatose Void is Riki Rezinunts & Jack Feightner<br>\r\nPackage design by Resonance Design (resonance-designs.com)<br>\r\nDemon illustration and KV logo by Jamason Finn<br>\r\nAdditional artwork by Justin Bakos<br>\r\nMastered by Riki Rezinunts @ MMI Studios (mmi-studios.com)<br>\r\nLabel: MMI Studios (Rio Rancho, NM)</p>', 'kontinuum.png', '''app/includes/content/albums/kontinuum.php'', ''content-swapper''', '14.74', '<a href="https://komatosevoid.bandcamp.com/album/kontinuum" target="_blank"><small>$7.00 @ Bandcamp (Download)</small></a>', 'no'),
(28, 'CD', 'Gross National Produkt', '''app/includes/content/artists/gross-national-produkt.php'', ''content-swapper''', 'Quaque: Die', 'MMI001006', 'This EP was an experiment in collaboration between Riki Rezinunts and Jamason Finn (now a full member of GNP)... Jamason supplied the concept, lyrics, and artwork... He painted the picture he had in mind for Riki and from there, Riki created the music and mapped everything out... What was originally supposed to be a 3 track EP turned into 5 tracks due to the overwhelming inspiration Riki felt from Jamasons idea and energy. The EP is mainly instrumental with only the title track containing vocals, although they are arguably some of the best vox Riki has ever laid down for a GNP track, or any track for that matter...', 'quaque-die.png', '''app/includes/content/albums/quaque-die.php'', ''content-swapper''', '12.74', '<a href="https://grossnationalprodukt.bandcamp.com/album/quaque-die" target="_blank"><small>$4.00 @ Bandcamp (Download)</small></a><br>\r\n<a href="http://www.cdbaby.com/cd/grossnationalprodukt13" target="_blank"><small>$4.00 @ CDBaby (Download)</small></a>', 'no'),
(29, 'CD', 'Sound-Skrapes', '''app/includes/content/artists/sound-skrapes.php'', ''content-swapper''', 'Dementia Disease Process', 'MMI005002', '<p>Sound-Skrapes second album, “Dementia Disease Process” was released in May of 2007 in observance of and as a homage to National Mental Awareness Month. Much more spontaneous and “unscripted” than the previous album, it has more of a free-style "jamming" session feel throughout.</p>\r\n<p>All songs written, recorded and produced by Sound-Skrapes<br>\r\nArtwork by Jamason Finn<br>\r\nPackage design by Resonance Design (resonance-designs.com)<br>\r\nMastered @ MMI Studios (mmi-studios.com)<br>\r\nLabel: MMI Studios (Rio Rancho, NM USA)</p>', 'dementia-disease-process.png', '''app/includes/content/albums/dementia-disease-process.php'', ''content-swapper''', '14.74', '<a href="https://sound-skrapes.bandcamp.com/album/dementia-disease-process" target="_blank"><small>$7.00 @ Bandcamp (Download)</small></a>', 'no'),
(30, 'CD', 'Brother Cement', '''app/includes/content/artists/brother-cement.php'', ''content-swapper''', 'Ass-Eye-Lamb', 'MMI003002', '<p>Brother Cements second full-length studio album, "Ass-Eye-Lamb" is a conceptual piece of ones psychedelic exploration of heart and soul through humility.</p>\r\n<p>Written, recorded, and produced by Brother Cement<br>\r\nBrother Cement is Dylan Cowles & Riki Rezinunts<br>\r\nArtwork and package design by Lina Gonzalez (lina-g.com)<br>\r\nMastered by Riki Rezinunts @ MMI Studios (mmi-studios.com)<br>\r\nLabel: MMI Studios (Rio Rancho, NM)</p>', 'ass-eye-lamb.png', '''app/includes/content/albums/ass-eye-lamb.php'', ''content-swapper''', '14.74', '<a href="https://grossnationalprodukt.bandcamp.com/album/re-produktion-volume-1-re-mixed" target="_blank"><small>$9.00 @ Bandcamp (Download)</small></a>', 'no'),
(31, 'CD', 'Brother Cement', '''app/includes/content/artists/brother-cement.php'', ''content-swapper''', 'Velveteen Rabbit', 'MMI003003', 'Written, recorded, and produced by Brother Cement \r\nBrother Cement is Dylan Cowles & Riki Rezinunts \r\nArtwork and Package Design by Lina Gonzalez (lina-g.com)\r\nAdditional Graphic Design by Resonance Design (resonance-designs.com)\r\nMastered by Riki Rezinunts @ MMI Studios (mmi-studios.com) \r\nLabel: MMI Studios (Rio Rancho, NM)', 'velveteen-rabbit.png', '''app/includes/content/albums/velveteen-rabbit.php'', ''content-swapper''', '12.74', '<a href="https://brothercement.bandcamp.com/album/velveteen-rabbit-ep" target="_blank"><small>$4.00 @ Bandcamp (Download)</small></a>', 'no'),
(32, 'CD', 'Blood Ties', '''app/includes/content/artists/blood-ties.php'', ''content-swapper''', 'Knots', 'MMI008001', 'Spontaneous, ritualistic, fluid, intuitive, and hypnotic aural cascades of atmospheric sound-scapes pull and tug at your emotions, lulling your consciousness into introspective realms... Some of them the chaos of contrasting ideas while others, the harmony and beauty of synchronicity and serendipity...', 'knots.png', '''app/includes/content/albums/knots.php'', ''content-swapper''', '14.74', '<a href="https://bloodties.bandcamp.com/" target="_blank"><small>$7.00 @ Bandcamp (Download)</small></a>', 'no'),
(33, 'CD', 'Rezinunts Muzik', '''app/includes/content/artists/rezinunts-muzik.php'', ''content-swapper''', 'A Chapter Closed', 'MMI007001', '<p>The debut release. An air of romanticism and mystery delivered with electronic ambiance and heart-felt melodies.</p>\r\n<p>All songs written, recorded, and produced by Riki Rezinunts<br>\r\nPackage design by Resonance Design (resonance-designs.com)<br>\r\nMastered @ MMI Studios (mmi-studios.com)<br>\r\nLabel: MMI Studios (Rio Rancho, NM USA)</p>', 'a-chapter-closed.png', '''app/includes/content/albums/a-chapter-closed.php'', ''content-swapper''', '14.74', '<a href="https://trmp.bandcamp.com/album/a-chapter-closed" target="_blank"><small>$7.00 @ Bandcamp (Download)</small></a>', 'no'),
(34, 'CD', 'Extropy Nervosa', '''app/includes/content/artists/extropy-nervosa.php'', ''content-swapper''', 'The Coming of the Storm', 'MMI002002', '<p>The first official release from Extropy Nervosa in the form of a ten track EP with songs recorded between 1999 and 2007. Remastered and re-released in 2011.</p>\r\n<p>All song written, recorded, and produced by Extropy Nervosa<br>\r\nExtropy Nervosa is Riki Rezinunts & Jerry Feightner<br>\r\nOriginal artwork by Jerry Feightner (vividdark.com)<br>\r\nPackage Design by Resonance Design (resonance-designs.com)<br>\r\nMastered by Riki Rezinunts @ MMI Studios (mmi-studios.com)<br>\r\nLabel: MMI Studios (Rio Rancho, NM)</p>', 'the-coming-of-the-storm.png', '''app/includes/content/albums/the-coming-of-the-storm.php'', ''content-swapper''', '14.74', '<a href="https://extropynervosa.bandcamp.com/album/the-coming-of-the-storm-remastered" target="_blank"><small>$7.00 @ Bandcamp (Download)</small></a>', 'no'),
(35, 'CD', 'Gross National Produkt', '''app/includes/content/artists/gross-national-produkt.php'', ''content-swapper''', 'Intensities : Sonics : Extremes', 'MMI001007', 'Gross National Produkts 5th and latest LP.', 'intensities-sonics-extremes.png', '''app/includes/content/albums/intensities-sonics-extremes.php'', ''content-swapper''', '14.74', '<a href="https://grossnationalprodukt.bandcamp.com/album/intensities-sonics-extremes" target="_blank"><small>$7.00 @ Bandcamp (Download)</small></a><br>\r\n<a href="http://www.cdbaby.com/cd/grossnationalprodukt1" target="_blank"><small>$7.00 @ CDBaby (Download)</small></a>', 'no'),
(36, 'CD', 'CEO', '''app/includes/content/artists/ceo.php'', ''content-swapper''', 'Stop Making Babies', 'MMI009001', '<p>Within the greater story of a global apocalypse there is a microcosmic tale involving one family. Their lives were a tapestry of every modern suburban horror from spousal abuse, rape and incest to murder, cults and alien abduction. This is their story as the family decays on the advent of the end of their culture and civilization. It is a positive, enjoyable, comedy-horror show, because the end of such a horrid nightmare can only be uplifting.</p>\r\n<p>Conceived, Created, Ritualized, Cut-Up, Re-Arranged and Mixed by Valen Jamason<br>\r\nVocals by Valen Jamason<br>\r\nArtwork by Valen Jamason<br>\r\nPackage Design by Resonance Design (resonance-designs.com)<br>\r\nMastered by Riki Rezinunts @ MMI Studios (mmi-studios.com)<br>\r\nLabel: MMI Studios (Rio Rancho, NM)</p>\r\n<p>Special thanks: Miles Ryan, Shane Baker, Eric Stodolnik, Ryan Phalen</p>', 'stop-making-babies.png', '''app/includes/content/albums/stop-making-babies.php'', ''content-swapper''', '14.74', '<a href="https://ceoprojekt.bandcamp.com/album/stop-making-babies" target="_blank"><small>$7.00 @ Bandcamp (Download)</small></a>', 'no'),
(37, 'CD', 'Rezinunts Muzik', '''app/includes/content/artists/rezinunts-muzik.php'', ''content-swapper''', 'Learning To Speak', 'MMI007002', '<p>A retrospective LP featuring b-sides and unreleased tracks that were made prior to the debut LP, "A Chapter Closed". The tracks on this release date from 2003-2008 and highlight the sonic journey from experimentation to conceptual realization and fruition of a solid idea for the musical project that is Thee Rezinunts Muzik Projekt.</p>\r\n<p>All songs written, recorded, and produced by Riki Rezinunts<br>\r\nPackage design by Resonance Design (resonance-designs.com)<br>\r\nMastered @ MMI Studios (mmi-studios.com)<br>\r\nLabel: MMI Studios (Rio Rancho, NM USA)</p>', 'learning-to-speak.png', '''app/includes/content/albums/learning-to-speak.php'', ''content-swapper''', '14.74', '<a href="https://trmp.bandcamp.com/album/learning-to-speak" target="_blank"><small>$7.00 @ Bandcamp (Download)</small></a>', 'no'),
(38, 'CD', 'Gross National Produkt', '''app/includes/content/artists/gross-national-produkt.php'', ''content-swapper''', 'RE:Produktion Volume 01 - <small>RE:Mixed</small>', 'MMI001008', 'A collection of remixes produced and arranged by Gross National Produkt spanning the years 1999 to 2014.', 'reproduktion-vol-1.png', '''app/includes/content/albums/reproduktion-vol-1.php'', ''content-swapper''', '14.74', '<a href="https://grossnationalprodukt.bandcamp.com/album/re-produktion-volume-1-re-mixed" target="_blank"><small>$9.00 @ Bandcamp (Download)</small></a><br>\r\n<a href="http://www.cdbaby.com/cd/grossnationalprodukt12" target="_blank"><small>$9.00 @ CDBaby (Download)</small></a>', 'yes'),
(39, 'CD', 'Sound-Skrapes', '''app/includes/content/artists/sound-skrapes.php'', ''content-swapper''', 'As These Green Leaves Turn Brown', 'MMI005003', '<p>Third full-length release from New Mexico based, experimental dark ambient act Sound-Skrapes. Loaded with mystic and magickal symbolism primarily centered on the number 333. One song is 33 minutes and 3 seconds long, another has a BPM of 333, etc... Even the price is also based on the principal of 3 three times...</p>\r\n<p>Written, recorded and produced by Riki Rezinunts<br>\r\nArtwork and package design by Resonance Design (resonance-designs.com)<br>\r\nMastered @ MMI Studios (mmi-studios.com)<br>\r\nLabel: MMI Studios (Rio Rancho, NM USA)</p>', 'as-these-green-leaves-turn-brown.png', '''app/includes/content/albums/as-these-green-leaves-turn-brown.php'', ''content-swapper''', '14.74', '<a href="https://sound-skrapes.bandcamp.com/album/as-these-green-leaves-turn-brown" target="_blank"><small>$9.00 @ Bandcamp (Download)</small></a>', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `mmi_users`
--

CREATE TABLE IF NOT EXISTS `mmi_users` (
`id` bigint(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` int(128) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `code` varchar(20) NOT NULL,
  `joined` datetime NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `group` int(11) NOT NULL,
  `profile_pic` varchar(512) NOT NULL DEFAULT 'default/imgs/default.png',
  `banner_pic` varchar(512) NOT NULL,
  `bio` text NOT NULL,
  `country` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mmi_orders`
--
ALTER TABLE `mmi_orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mmi_pages`
--
ALTER TABLE `mmi_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mmi_products`
--
ALTER TABLE `mmi_products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mmi_users`
--
ALTER TABLE `mmi_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mmi_orders`
--
ALTER TABLE `mmi_orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mmi_pages`
--
ALTER TABLE `mmi_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mmi_products`
--
ALTER TABLE `mmi_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `mmi_users`
--
ALTER TABLE `mmi_users`
MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
