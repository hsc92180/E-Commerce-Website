-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 03:16 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(15) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `msg`) VALUES
('abc', 'abc@gmail.com', 'contact', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `oid` varchar(50) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `card` varchar(20) NOT NULL,
  `cvv` varchar(10) NOT NULL,
  `products` varchar(200) NOT NULL,
  `total` int(10) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`oid`, `uid`, `name`, `card`, `cvv`, `products`, `total`, `date`, `status`) VALUES
('1', '101', 'Jyotsnaa', '1234567893456789', '123', 'One Indian Girll', 100, '2017-03-18', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` varchar(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `author` varchar(100) NOT NULL,
  `free` varchar(20) NOT NULL,
  `warranty` varchar(50) NOT NULL,
  `delivery` varchar(500) NOT NULL,
  `features` varchar(500) NOT NULL,
  `catg` varchar(100) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `name`, `img`, `price`, `description`, `author`, `free`, `warranty`, `delivery`, `features`, `catg`, `sub`, `status`) VALUES
('101', 'One Indian Girl', 'b1.jpg', 150, 'Hi, I', ' Chetan Bhagat', '10% discount', '1 year', 'Free Delivery', 'These are features', 'dsds', 'dfdf', ''),
('102', 'Believe in Yourself', 'b2.jpg', 200, 'Believe in Yourself, Dr. Murphy stresses about having faith in ones abilities, believing in the inner self and in having the courage to chase your dream, come what may. The book was first published in 1955 but remains as popular as it was then.Being a preacher, with decades of experience behind him, Dr Murphy delves into lives of people to demonstrate the all encompassing power of self. By citing interesting episodes from the lives of artists, writers, entrepreneurs and ordinary peoples.', 'Dr. Joseph Murphy', '', '', '', '', '', '', ''),
('103', 'Everyone Has A Story', 'b3.jpg', 90, 'Everyone has a story.\r\nMeera, a fledgling writer who is in search of a story that can touch millions of lives.\r\nVivaan, assistant branch manager at Citibank, who dreams of travelling the world.\r\nKabir, a cafe manager who desires something of his own. Nisha, the despondent cafe customer who keeps secrets of her own.\r\nEveryone has their own story, but what happens when these four lives are woven together?\r\nPull up a chair in Kafe Kabir and watch them explore friendship and love, writing their own pages of life from the cosy cafe to the ends of the world.', 'Savi Sharma', '', '', '', '', '', '', ''),
('104', 'Wings of Fire: An Autobiography of Abdul Kalam', 'b4.jpg', 184, 'Every common man who by his sheer grit and hard work achieves success should share his story with the rest for they may find inspiration and strength to go on, in his story. The ''Wings of Fire'' is one such autobiography by visionary scientist Dr. APJ Abdul Kalam, who from very humble beginnings rose to be the President of India. The book is full of insights, personal moments and life experiences of Dr. Kalam. It gives us an understanding on his journey of success.', 'Tiwari ', '', '', '', '', '', '', ''),
('105', 'Verbal and Non-Verbal Reasoning', 'b5.jpg', 830, 'This revised edition of A Modern Approach to Verbal and Non-Verbal Reasoning, while retaining the key strengths and structure of the previous edition, brings to the readers additional questions from various competitive examinations as per the latest pattern and trends. A section on recent questions (based on memory) and their answers/solutions from different competitive examinations like SSC, SBI-CGL Tier I, AFCAT, SBI (PO), RBI Grade B, etc. has been added.', 'R S Aggarwal', '', '', '', '', '', '', ''),
('106', 'Scion of Ikshvaku', 'b6.jpg', 160, 'Lose yourself in this epic adventure thriller, based on the Ramayana, the story of Lord Ram, written by the multi-million bestselling Indian Author Amish; the author who has transformed Indian Fiction with his unique combination of mystery, mythology, religious symbolism and philosophy. In this book, you will find all the familiar characters you have heard of, like Lord Ram, Lord Lakshman, Lady Sita, Lord Hanuman, Lord Bharat and many others from Ayodhya. And even some from Lanka like Ravan! Read this BESTSELLER, the highest selling book of 2015, the first book of the Ram Chandra Series', 'Amish Tripathi', '', '', '', '', '', '', ''),
('107', 'Harry Potter and the Philosopher''s Stone', 'b7.jpg', 1417, 'When a letter arrives for unhappy but ordinary Harry Potter, a decade-old secret is revealed to him that apparently he''s the last to know. His parents were wizards, killed by a Dark Lord''s curse when Harry was just a baby, and which he somehow survived. Escaping his hideous Muggle guardians for Hogwarts, a wizarding school brimming with ghosts and enchantments, Harry stumbles upon a sinister adventure when he finds a three-headed dog guarding a room on the third floor. Then he hears of a missing stone with astonishing powers which could be valuable, dangerous, or both.', 'J.K. Rowling ', '', '', '', '', '', '', ''),
('108', 'The Book Thief ', 'b8.jpg', 287, 'Its just a small story really, about among other things: a girl, some words, an accordionist, some fanatical Germans, a Jewish fist-fighter, and quite a lot of thievery. . . . Set during World War II in Germany, Markus Zusak''s groundbreaking new novel is the story of Liesel Meminger, a foster girl living outside of Munich. Liesel scratches out a meager existence for herself by stealing when she encounters something she can''t resist books. With the help of her accordion-playing foster father, she learns to read and shares her stolen books with her neighbors during bombing raids as well as with the Jewish man hidden in her basement before he is marched to Dachau. This is an unforgettable story about the ability of books to feed the soul', 'Markus Zusak', '', '', '', '', '', '', ''),
('109', 'Sachin Tendulkar: Playing it My Way - My Autobiography', 'b9.jpg', 729, 'During his career of 24 years, Sachin Tendulkar ruled Cricket with his brilliant batting. During his playing days, he talked a lot about the game but spoke seldom about his personal life. Although every detail of Sachin''s life has been recorded and told in all forms courtesy the prolific writers, the personal account of Sachin''s life was never shared. But the legend himself has brought his story to the world in the form of an autobiography called ''Playing it my way. It is co-authored by Boria Majumdar . This autobiography became an instant hit among readers and entered the Limca Book of Records for being the best-selling adult hardback across both fiction and non-fiction categories. It is published by Hachette India.', 'Sachin Tendulkar', '', '', '', '', '', '', ''),
('110', 'The Noble Wilds', 'b10.jpg', 761, 'With a rhythmic, meditative tone, the words of The Noble Wilds flow gracefully along the pages, complemented by the luminous photos of God s creations in nature. Turning the pages, one is transported to Amoura, the place where the lady lives and is visited by cherished beings of the wild. The lady is none other than Supreme Master Ching Hai, and The Noble Wilds is yet another of Her simple but deeply touching gifts. Written, photographed and compiled personally by Master, this precious gem opens the door to a world of unique beauty. Here, the reader can witness firsthand the noble spirit and dedication of our co-inhabitants whose homes are under the open sky the swan, the goose, the squirrel, the beaver and even a tiny garden snail.', 'Supreme Master Ching Hai', '', '', '', '', '', '', ''),
('111', 'A Thousand Splendid Suns', 'b11.jpg', 290, 'A Thousand Splendid Suns is a contemporary novel that tells a gripping story of two women with contradictory attitudes and how their decisions shape future generations. A marvelous work of fiction which brings an untold side of Afghanistan in limelight, this novel is irresistible. Khalid Hosseini has once again depicted a plethora of human emotions and beauty of Afghanistan through his distinctive story telling. These books became number one New York Times bestseller for fifteen weeks following its release and according to the author, it is a "mother-daughter story". It won the Book Sense book of the year award for fiction and the Richard and Judy Best Read of the Year in 2008.', 'Khaled Hosseini', '', '', '', '', '', '', ''),
('112', 'Life is What You Make it ', 'b12.jpg', 80, 'The second book by Preeti Shenoy, Life Is What You Make It, was published on January 1, 2011 and it turned out to be a national bestseller. Life Is What You Make It is based on a love story that has been set in India in the 90s. It has been described by the readers as a book portraying how love, hope and determination can together win over even the destiny. It is a gripping tale of few significant years of the protagonistâ€™s life.', 'Preeti Shenoy', '', '', '', '', '', '', ''),
('113', 'The Theory of Everything', 'b13.jpg', 170, 'Seven lectures by the brilliant theoretical physicist have been compiled into this book to try to explain to the common man, the complex problems of mathematics and the question that has been gripped everyone all for centuries, the theory of existence.  Undeniably intelligent, witty and childlike in his explanations, the narrator describes every detail about the beginning of the universe. He describes what a theory that can state the initiation of everything would encompass.  Ideologies about the universe by Aristotle, Augustine, Hubble, Newton and Einstein have all been briefly introduced to the reader. Black holes and Big Bang has been explained in an unsophisticated manner for anyone to understand.', 'Stephen Hawking', '', '', '', '', '', '', ''),
('114', 'The Jungle Book ', 'b14.jpg', 180, 'Mowgli the man cub is growing up in the jungle. He has many exciting adventures with his animal friends Baloo the bear and Bagheera the panther. ', 'Ladybird', '', '', '', '', '', '', ''),
('115', 'book nm', 'c5.jpg', 500, 'desc', 'auth', 'free', 'qwdw', 'sds', 'dcsd', '', '', ''),
('116', 'dsfs', 'c1.jpg', 540, 'dfs', 'ds', 'ds', 'dsd', 'sdd', 'sda', '554', '54', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `pname` varchar(100) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `ansr` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`pname`, `keyword`, `ansr`) VALUES
('abc', 'warranty', '1 year'),
('xyz', 'warranty', '2 years');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `uid` varchar(15) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pid` varchar(15) NOT NULL,
  `book` varchar(200) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`uid`, `uname`, `pid`, `book`, `rate`) VALUES
('101', 'Jyotsna', '103', 'Everyone Has A Story', 3),
('102', 'poonam', '106', 'Scion of Ikshvaku', 2),
('102', 'poonam', '101', 'One Indian Girl', 5),
('101', 'Jyotsna', '105', 'Verbal and Non-Verbal Reasoning', 4),
('103', 'john', '104', 'Everyone Has A Story', 3),
('103', 'john', '104', 'One Indian Girl', 2),
('104', 'sameer', '109', 'Sachin Tendulkar: Playing it My Way - My Autobiography', 4),
('104', 'sameer', '108', 'The Book Thief ', 3),
('101', 'Jyotsna', '108', 'The Book Thief ', 2),
('104', 'sameer', '106', 'Scion of Ikshvaku', 3.5),
('103', 'john', '102', 'Believe in Yourself', 3),
('103', 'john', '104', 'Wings of Fire: An Autobiography of Abdul Kalam', 4),
('101', 'Jyotsna', '102', 'Believe in Yourself', 2),
('101', 'Jyotsna', '101', 'One Indian Girl', 3),
('101', 'Jyotsna', '101', 'One Indian Girl', 2),
('101', 'Jyotsna', '101', 'One Indian Girl', 3),
('101', 'Jyotsna', '101', 'One Indian Girl', 4);

-- --------------------------------------------------------

--
-- Table structure for table `recom`
--

CREATE TABLE IF NOT EXISTS `recom` (
  `uid` varchar(20) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `recomm` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recom`
--

INSERT INTO `recom` (`uid`, `uname`, `recomm`, `date`, `time`) VALUES
('101', 'Jyotsna', 'Sachin Tendulkar: Playing it My Way - My Autobiography, Wings of Fire: An Autobiography of Abdul Kalam, Scion of Ikshvaku, ', '2017-03-17', '02:04:37pm'),
('101', 'Jyotsna', 'Sachin Tendulkar: Playing it My Way - My Autobiography, Wings of Fire: An Autobiography of Abdul Kalam, Scion of Ikshvaku, ', '2017-03-17', '02:11:57pm'),
('101', 'Jyotsna', 'Sachin Tendulkar: Playing it My Way - My Autobiography, Wings of Fire: An Autobiography of Abdul Kalam, Scion of Ikshvaku, ', '2017-03-17', '02:17:45pm'),
('101', 'Jyotsna', 'Sachin Tendulkar: Playing it My Way - My Autobiography, Wings of Fire: An Autobiography of Abdul Kalam, Scion of Ikshvaku, ', '2017-03-17', '02:40:35pm'),
('101', 'Jyotsna', 'Sachin Tendulkar: Playing it My Way - My Autobiography, Wings of Fire: An Autobiography of Abdul Kalam, Scion of Ikshvaku, ', '2017-03-17', '02:46:07pm');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `uid` varchar(15) NOT NULL,
  `pid` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `contact`, `email`, `address`, `username`, `password`) VALUES
('101', 'Jyotsna', '9167105216', 'jyo@gmail.com', 'Mumbai', 'jyotsna', 'jyo'),
('102', 'poonam', '8383017000', 'poo@gmail.com', 'Pune', 'poonam', 'poonam'),
('103', 'john', '8954121234', 'john@gmail.com', 'Mumbai', 'john', 'john'),
('104', 'sameer', '9594326542', 'sam@gmail.com', 'Goa', 'sam', 'sam');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
