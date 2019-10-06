-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2019 at 09:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_organizer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_msg`
--

CREATE TABLE `admin_msg` (
  `id` int(11) NOT NULL,
  `senderName` varchar(255) NOT NULL,
  `senderMail` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `receiverMail` varchar(255) NOT NULL,
  `sent_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_msg`
--

INSERT INTO `admin_msg` (`id`, `senderName`, `senderMail`, `subject`, `message`, `receiverMail`, `sent_on`) VALUES
(2, 'Admin', 'hiruni.chandrasiri@gmail.com', 'Security Alert', 'Please change your password once a month for safety purposes', 'ramesh.zincat@gmail.com', '2019-09-01 15:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` int(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `Name`, `Phone`, `Email`, `Password`) VALUES
(1, 'Hiruni Chandrasiri', 771322200, 'hiruni.chandrasiri@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sent`
--

CREATE TABLE `admin_sent` (
  `id` int(11) NOT NULL,
  `senderMail` varchar(255) NOT NULL,
  `senderName` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `receiverMail` varchar(255) NOT NULL,
  `sent_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sent`
--

INSERT INTO `admin_sent` (`id`, `senderMail`, `senderName`, `subject`, `message`, `receiverMail`, `sent_on`) VALUES
(1, 'hiruni.chandrasiri@gmail.com', 'Admin', 'Security Alert', 'Please change your password once a month for safety purposes', 'ramesh.zincat@gmail.com', '2019-09-01 15:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id` int(11) NOT NULL,
  `Expense` varchar(350) NOT NULL,
  `category` varchar(255) NOT NULL,
  `Estimatedcost` int(100) NOT NULL,
  `Finalcost` int(100) NOT NULL,
  `PaymentDueBy` date NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `Expense`, `category`, `Estimatedcost`, `Finalcost`, `PaymentDueBy`, `user_name`) VALUES
(5, 'Momento Creations', 'Photography', 75000, 74500, '2019-09-06', 'hiruni25abc@gmail.com'),
(8, 'Hilton Hotel', 'Venue', 80000, 80100, '2019-09-30', 'hiruni25abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `Taskname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `note` varchar(500) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `Taskname`, `category`, `status`, `note`, `user_name`) VALUES
(98, 'Book rehearsal dinner venue.', 'Venue', 'Complete', 'book dinner at hilton on 3rd november 2019', 'hiruni25abc@gmail.com'),
(100, 'smilling meal', 'Catering', 'Complete', '                ', 'hiruni25abc@gmail.com'),
(101, 'Find and book your photographer', 'Photography', 'Pending', '                                ', 'admin'),
(102, 'Find and book your florist', 'Flowers & Decoration', 'Complete', '                    ', 'hiruni25abc@gmail.com'),
(103, ' Find and order your wedding cake', 'Wedding cake', 'Pending', '', 'admin'),
(104, 'search cake vendors', 'Wedding cake', 'Pending', '', 'admin'),
(105, ' Find and book your hair and makeup vendor', 'Health & Beauty', 'Pending', '', 'hiruni25abc@gmail.com'),
(106, 'Find and book your videographer', 'Videography', 'Pending', '', 'admin'),
(107, 'Find and book your band', 'DJ/bands', 'Pending', '', 'hiruni25abc@gmail.com'),
(109, 'Find and book your transportation vendor', 'Transportation', 'Pending', '', 'admin'),
(110, 'Purchase your wedding rings', 'Jewelry', 'Pending', '', 'hiruni25abc@gmail.com'),
(111, 'Find and book your DJ', 'DJ/bands', 'Pending', '', 'hiruni25abc@gmail.com'),
(113, 'Find and book your venue', 'Venue', 'Pending', '', 'hiruni25abc@gmail.com'),
(114, 'Find and order your wedding invitations', 'Wedding invitation', 'Pending', '', 'hiruni25abc@gmail.com'),
(115, 'Address and send your wedding invitations', 'Wedding invitation', 'Pending', '', 'hiruni25abc@gmail.com'),
(116, 'Find and order your wedding dress', 'Bridal Accessories', 'Pending', '', 'hiruni25abc@gmail.com'),
(117, 'Find accessories for your wedding party', 'Bridal Accessories', 'Pending', '', 'hiruni25abc@gmail.com'),
(118, 'Find and order your wedding suit, or tux', 'Groom Accessories', 'Pending', '', 'hiruni25abc@gmail.com'),
(119, 'Find and book your venue', 'Venue', 'Complete', '                    ', 'ramesh.zincat@gmail.com'),
(120, 'Plan an engagement party', 'Venue', 'Pending', '', 'hiruni25abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE `deal` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `discount` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`id`, `vendor_id`, `discount`) VALUES
(2, 22, '10%'),
(4, 33, '5%'),
(5, 23, '10%');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `EventName` varchar(255) NOT NULL,
  `EventType` varchar(255) NOT NULL,
  `StartDate` date NOT NULL,
  `StartTime` varchar(255) NOT NULL,
  `EndDate` date NOT NULL,
  `EndTime` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `EventDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `vendor_id`, `EventName`, `EventType`, `StartDate`, `StartTime`, `EndDate`, `EndTime`, `City`, `Address`, `EventDescription`) VALUES
(1, 22, 'Inauguration of new reception hall', 'Inauguration', '2019-09-13', '8.00 AM', '2019-09-13', '12.00 PM ', 'Colombo', '2 Sir Chittampalam A Gardiner, Mawatha, Colombo.', '                                 New reception hall of the Hilton hotel Colombo will be open on 13th September 2019 at 10.00 AM.\r\nPlease join us and enjoy the celebration.                                 ');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `businessName` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `Contactno` varchar(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `businessName`, `contact_person`, `Contactno`, `category`, `city`, `image`, `user_name`, `vendor_id`, `status`) VALUES
(154, 'Momento Creations', 'Ramesh Silva', '0715519975', 'Photography', 'Kandy', '13.jpg', 'hiruni25abc@gmail.com', 23, 'SAVED'),
(155, 'Dushan Caterers', 'Dushan perera', '0 112 750 730', 'Catering', 'Homagama', 'slider-4.jpg', 'hiruni25abc@gmail.com', 29, 'SAVED'),
(156, 'Hilton Hotel', 'Danuka Silva', '01122879456', 'Venue', 'Colombo', 'hilton colombo hotel exterior.jpg', 'hiruni25abc@gmail.com', 22, 'SAVED'),
(157, 'Hotel Pinnalanda', 'kamal siriwardane', '035 2265297', 'Venue', 'Kegalle', '27598984.jpg', 'hiruni25abc@gmail.com', 28, 'SAVED'),
(159, 'Hilton Hotel', 'Danuka Silva', '01122879456', 'Venue', 'Colombo', 'hilton colombo hotel exterior.jpg', 'kamalsiriwardane@yahoo.co.uk', 22, 'SAVED');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `familySide` varchar(255) NOT NULL,
  `mobileNo` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `No`, `firstname`, `lastname`, `familySide`, `mobileNo`, `Address`, `status`, `user_name`) VALUES
(42, 1, 'Nilushika', 'perera', 'Friends of bride', 715523874, 'No 12, kandy road, pasyala', 'pending', 'hiruni25abc@gmail.com'),
(43, 2, 'Piyumali', 'silva', 'Mutual friends', 715868552, 'Godawela , Danowita', 'attending', 'hiruni25abc@gmail.com'),
(44, 3, 'Anoma', 'kaluarachchhi', 'Groom family', 778895642, 'No 25, mahena, warakapola', 'declined', 'hiruni25abc@gmail.com'),
(45, 4, 'Rani', 'Somarathna', 'Groom family', 758896589, 'Mahena, warakapola', 'attending', 'hiruni25abc@gmail.com'),
(46, 5, 'Nalini', 'siriwardane', 'Bride family', 771822350, 'No 24, Mirigama road, warakapola', 'attending', 'hiruni25abc@gmail.com'),
(47, 6, 'kamal ', 'somaweera', 'Friends of groom', 758845666, 'Kandy road, warakapola', 'attending', 'hiruni25abc@gmail.com'),
(48, 7, 'Anjana', 'rajapaksha', 'Coworkers of groom', 771322500, 'No 211, Ragama, Kadawatha', 'attending', 'hiruni25abc@gmail.com'),
(49, 8, 'Sitha', 'chandrasiri', 'Family friends of bride', 715568455, 'Weliweriya, Gampaha', 'attending', 'hiruni25abc@gmail.com'),
(50, 9, 'Sarath', 'Mendis', 'Family friends of groom', 775562510, 'No 45, Ragama, Kadawatha', 'attending', 'hiruni25abc@gmail.com'),
(51, 0, 'Vinitha ', 'Siriwardane', 'Bride family', 778854125, 'Godawela, Danowita', 'pending', 'hiruni25abc@gmail.com'),
(52, 0, 'kamal', 'kumara', 'Bride family', 777804296, 'No 24, Mirigama road, Warakapola', 'declined', 'hiruni25abc@gmail.com'),
(53, 1, 'Nilushika', 'perera', 'Friends of bride', 715523874, 'No 12, kandy road, pasyala', 'attending', 'iduranga22.chandrasiri@gmail.com'),
(54, 2, 'Piyumali', 'silva', 'Mutual friend', 715868552, 'Godawela , Danowita', 'attending', 'iduranga22.chandrasiri@gmail.com'),
(55, 3, 'Anoma', 'kaluarachchhi', 'Groom family', 778895642, 'No 25, mahena, warakapola', 'attending', 'iduranga22.chandrasiri@gmail.com'),
(56, 4, 'Rani', 'Somarathna', 'Groom family', 758896589, 'Mahena, warakapola', 'declined', 'iduranga22.chandrasiri@gmail.com'),
(57, 5, 'Nalini', 'siriwardane', 'Bride family', 771822350, 'No 24, Mirigama road, warakapola', 'attending', 'iduranga22.chandrasiri@gmail.com'),
(59, 7, 'Anjana', 'rajapaksha', 'Coworkers of groom', 771322500, 'No 211, Ragama, Kadawatha', 'attending', 'iduranga22.chandrasiri@gmail.com'),
(60, 8, 'Sitha', 'chandrasiri', 'Family friends of bride', 715568455, 'Weliweriya, Gampaha', 'attending', 'iduranga22.chandrasiri@gmail.com'),
(61, 9, 'Sarath', 'Mendis', 'Family friends of groom', 775562510, 'No 45, Ragama, Kadawatha', 'pending', 'iduranga22.chandrasiri@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hired_vendors`
--

CREATE TABLE `hired_vendors` (
  `id` int(11) NOT NULL,
  `businessName` varchar(255) NOT NULL,
  `contactPerson` varchar(255) NOT NULL,
  `Contactno` varchar(20) NOT NULL,
  `vendorMail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `clientName` varchar(255) NOT NULL,
  `clientContact` varchar(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `vendor_id` int(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hired_vendors`
--

INSERT INTO `hired_vendors` (`id`, `businessName`, `contactPerson`, `Contactno`, `vendorMail`, `image`, `clientName`, `clientContact`, `category`, `vendor_id`, `status`, `user_name`) VALUES
(4, 'Momento Creations', 'Ramesh Silva', '0715519975', 'ramesh.zincat@gmail.com', '13.jpg', 'Hiruni chandrasiri', '0723679933', 'Photography', 23, 'HIRED', 'hiruni25abc@gmail.com'),
(9, 'Hilton Hotel', 'Danuka Silva', '01122879456', 'colombo.reservations.@hilton.com', 'hilton colombo hotel exterior.jpg', 'Hiruni Chandrasiri', '0723679933', 'Venue', 22, 'HIRED', 'hiruni25abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `senderName` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `weddingDate` date NOT NULL,
  `message` varchar(500) NOT NULL,
  `contactMethod` varchar(100) NOT NULL,
  `vendorMail` varchar(255) NOT NULL,
  `receiverName` varchar(255) NOT NULL,
  `vendor_id` int(5) NOT NULL,
  `status` int(3) NOT NULL,
  `sent_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `senderName`, `subject`, `email`, `phoneNumber`, `weddingDate`, `message`, `contactMethod`, `vendorMail`, `receiverName`, `vendor_id`, `status`, `sent_on`) VALUES
(2, 'Hiruni Chandrasiri', 'Request Pricing', 'hiruni25abc@gmail.com', '0723679933', '2019-10-02', 'My wedding will be held on 2nd octomber 2019.\r\n150 guest will be attending for my wedding. \r\nI want to know the what are the facilities you will offer and final cost for the service', 'Phone ', 'colombo.reservations.@hilton.com', 'Danuka Silva', 22, 1, '2019-06-28 14:55:55'),
(5, 'Hiruni', 'Request Pricing', 'hiruni25abc@gmail.com', '0723679933', '2019-10-02', 'My wedding will be held on 2nd Octomber 2019. Maximum 150 guest will be attending to my wedding.\r\nI want to know to know the final budget of yours.', 'Phone', 'info@dushancaterers.com', 'Dushan perera', 29, 1, '2019-06-30 19:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `new_deal`
--

CREATE TABLE `new_deal` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `dealName` varchar(255) NOT NULL,
  `dealType` varchar(255) NOT NULL,
  `validUntil` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `dealDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_deal`
--

INSERT INTO `new_deal` (`id`, `vendor_id`, `dealName`, `dealType`, `validUntil`, `image`, `dealDescription`) VALUES
(5, 22, 'Mid Year Discount', 'Discount', '2019-09-27', 'hilton-event.jpg', '                                                                                                                                                                You have get a golden opportunity. If you book a wedding reception hall from Hilton hotel , you get the 10% discount.\r\nOffer valid until 27th September 2019.\r\nHurry up guys............                                                                                                                                                            ');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `Expense` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Paymentdate` date NOT NULL,
  `Payer` varchar(255) NOT NULL,
  `PaymentMethod` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `Expense`, `Category`, `Amount`, `Paymentdate`, `Payer`, `PaymentMethod`, `user_name`) VALUES
(1, 'Hilton Hotel', 'Venue', 8000, '2019-08-26', 'Hiruni gamage', 'Cash', 'hiruni25abc@gmail.com'),
(2, 'Momento creation', 'Photography', 10000, '2019-09-11', 'Bhagya perera', 'Cash', 'hiruni25abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `vendor_id`, `photo`, `title`, `status`) VALUES
(2, 22, 'hilton colombo hotel exterior.jpg', 'Hilton Colombo-Hotel Exterior', 'Main image'),
(3, 22, 'hilton colombo II ponte.jpg', 'II Ponte', 'Sample'),
(4, 22, 'hilton colombo restaurant.jpg', 'Restaurant', 'Sample'),
(5, 22, 'romantic hut with swiming pool.jpg', 'Romantic Hut with Swimming pool', 'Sample'),
(6, 22, 'shopping area.jpg', 'Shopping Area', 'Sample'),
(7, 22, 'guest room.jpg', 'Guest Room', 'Sample'),
(9, 22, 'stella karaoke bar.jpg', 'Stella Karaoke Bar', 'Sample'),
(11, 22, 'hilton colombo dinning.jpg', 'Dinning', 'Sample'),
(12, 22, 'room interior.jpg', 'Room Interior', 'Sample'),
(14, 23, '8.jpg', '', 'Sample'),
(15, 23, '23.jpg', '', 'Sample'),
(16, 23, '25.jpg', '', 'Sample'),
(17, 23, '4.jpg', '', 'Sample'),
(18, 23, '6 (1).jpg', '', 'Sample'),
(19, 23, '6.jpg', '', 'Sample'),
(21, 23, '24.jpg', '', 'Sample'),
(22, 23, '1.jpg', '', 'Sample'),
(25, 23, '13 (1).jpg', '', 'Sample'),
(26, 23, '13.jpg', '', 'Main Image'),
(29, 28, 'pinnalanda-wedding-3.jpg', 'Grand Ballroom', 'Sample'),
(30, 28, 'hotels-in-pinnawala-4.jpg', 'Riverside Ballroom', 'Sample'),
(31, 28, 'hotels-in-pinnawala-3.jpg', 'Outside hotel view', 'Sample'),
(32, 28, 'rooms-in-pinnawala-3.jpg', 'Rooms', 'Sample'),
(33, 28, 'hotels-in-pinnawala-dining-foods-24.jpg', 'Dinning I', 'Sample'),
(34, 28, 'hotels-in-pinnawala-dining-foods-41.jpg', 'Dinning II', 'Sample'),
(35, 28, 'wedding-1.jpg', 'Wedding I', 'Sample'),
(36, 28, 'wedding-5.jpg', 'Wedding II', 'Sample'),
(37, 28, 'wedding-6.jpg', 'Wedding III', 'Sample'),
(38, 28, 'wedding-7.jpg', 'Wedding IV', 'Sample'),
(40, 29, 'D9.jpg', '', 'Sample'),
(41, 29, 'D10.jpg', '', 'Sample'),
(42, 29, 'c2.jpg', '', 'Sample'),
(43, 29, 'c3.jpg', '', 'Sample'),
(44, 29, 'c4.jpg', '', 'Sample'),
(45, 29, 'D2.jpg', '', 'Sample'),
(46, 29, 'c1.jpg', '', 'Sample'),
(47, 29, '(1).png', '', 'Sample'),
(48, 29, '(3).png', 'Reception Hall', 'Sample'),
(49, 29, '(8).png', '', 'Sample'),
(50, 30, 'dj.jpg', '', 'Main Image'),
(51, 30, '2 copy.jpg', '', 'Sample'),
(52, 30, '3 copy.jpg', '', 'Sample'),
(53, 30, '4 copy.jpg', '', 'Sample'),
(54, 30, '14 copy.jpg', '', 'Sample'),
(55, 30, '1.jpg', '', 'Sample'),
(57, 31, '13.jpg', '', 'Sample'),
(58, 31, '14(1).jpg', '', 'Sample'),
(60, 31, '20.jpg', '', 'Sample'),
(61, 31, '26.jpg', '', 'Sample'),
(62, 31, '29.jpg', '', 'Sample'),
(63, 31, '39.jpg', '', 'Sample'),
(64, 31, '42.jpg', '', 'Sample'),
(65, 31, '49.jpg', '', 'Sample'),
(66, 31, '51.jpg', '', 'Sample'),
(67, 31, '45.jpg', '', 'Sample'),
(68, 31, '40.jpg', '', 'Sample'),
(70, 32, 'businessclasstamplate.jpg', 'Land Cruiser V8 (BUSINESS CLASS)', 'Sample'),
(72, 32, 'businesss400 (1).png', 'Benz S400 (BUSINESS CLASS)', 'Sample'),
(73, 32, 'discoverytamplate.jpg', 'Discovery 4 (BUSINESS CLASS)', 'Sample'),
(74, 32, 'premionw.jpg', 'Premio 2017 (BUSINESS CLASS)', 'Sample'),
(75, 32, 'alphardnew.jpg', 'Alphard Ex Lounge (BUSINESS CLASS)', 'Sample'),
(76, 28, '27598984.jpg', '', 'Main Image'),
(77, 29, 'slider-4.jpg', '', 'Main Image'),
(78, 31, 'gallery111.jpg', '', 'Main Image'),
(80, 32, 'modernfleet-full.jpg', '', 'Main Image'),
(82, 33, 'intro2(1).jpg', '', 'Main Image'),
(83, 33, 'IMG_20151226_163957.jpg', '', 'Sample'),
(84, 33, 'IMG_20151226_165154.jpg', '', 'Sample'),
(85, 33, 'IMG_20151226_165308.jpg', '', 'Sample'),
(86, 33, 'IMG_20151226_165411.jpg', '', 'Sample'),
(87, 33, 'IMG_20151226_165459.jpg', '', 'Sample'),
(88, 33, 'IMG_20151226_165531.jpg', '', 'Sample'),
(89, 33, 'IMG_20151226_171345.jpg', '', 'Sample'),
(90, 33, 'IMG_20151226_172056.jpg', '', 'Sample'),
(91, 33, 'IMG_20151226_172330.jpg', '', 'Sample'),
(92, 33, 'IMG_20151226_173536.jpg', '', 'Sample'),
(93, 33, 'IMG_20151226_173609.jpg', '', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `vendor_id`, `filename`) VALUES
(4, 22, 'pricing-sheet.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `senderName` varchar(255) NOT NULL,
  `senderMail` varchar(255) NOT NULL,
  `message` varchar(2500) NOT NULL,
  `receiverMail` varchar(255) NOT NULL,
  `receiverName` varchar(255) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `businessName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `sent_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `subject`, `senderName`, `senderMail`, `message`, `receiverMail`, `receiverName`, `vendor_id`, `businessName`, `status`, `sent_on`) VALUES
(4, 'Regarding Hilton hotel for your wedding', 'Danuka silva', 'colombo.reservations.@hilton.com', ' Thank you for your message. We are glad to work with you to successful your dream wedding.\r\nAccording to your details we plan our budget and send to you with this mail.\r\n\r\n ', 'hiruni25abc@gmail.com', 'Hiruni', 22, 'Hilton Hotel', 1, '2019-06-28 16:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `rating_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `vendorMail` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rating_id`, `vendor_id`, `username`, `vendorMail`, `Name`, `ratingNumber`, `title`, `comment`, `created`, `modified`, `status`) VALUES
(1, 22, 'hiruni25abc@gmail.com', 'iduranga.chandrasiri@gmail.com', 'Hiruni', 3, '\"Hilton Colombo never ceases to please\"', 'The moment you step into Hilton Colombo, you feel the warmth and hospitality of the staff. The lobby is fully renovated and looks great, though the rooms probably need to be reworked soon. My only gripe - walk a long way to the gym and the pool from the main hotel area', '2019-07-03 15:09:33', '2019-07-03 15:09:33', 0),
(2, 22, 'hiruni25abc@gmail.com', 'iduranga.chandrasiri@gmail.com', 'Hiruni', 2, 'Convenient location', 'Positive - reception allowed us for late checkout coz our flight at night time - lady staff at teddy bear train was so nice, came to assist by herself and took nice photo for us - food delicious - overall staff was nice Negative ', '2019-07-03 15:20:18', '2019-07-03 15:20:18', 0),
(10, 28, 'hiruni25abc@gmail.com', 'hotel.pinnalanda@gmail.com', 'Hiruni', 4, 'Amazing Location', 'Amazing view from the room and dining area, accommodating staff and great rooms for the price', '2019-07-04 06:02:06', '2019-07-04 06:02:06', 0),
(11, 33, 'hiruni25abc@gmail.com', 'snjselvaraj@gmail.com', 'Hiruni', 5, 'Quality of wedding invitation cards', 'Invitation cards are very beautiful and attractive.', '2019-08-31 09:44:46', '2019-08-31 09:44:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sent_message`
--

CREATE TABLE `sent_message` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `senderMail` varchar(255) NOT NULL,
  `senderName` varchar(255) NOT NULL,
  `receiverMail` varchar(255) NOT NULL,
  `receiverName` varchar(255) NOT NULL,
  `message` varchar(2500) NOT NULL,
  `sent_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_message`
--

INSERT INTO `sent_message` (`id`, `subject`, `senderMail`, `senderName`, `receiverMail`, `receiverName`, `message`, `sent_on`) VALUES
(1, 'Request Pricing', 'hiruni25abc@gmail.com', 'Hiruni', 'colombo.reservations.@hilton.com', 'Hilton Hotel', 'My wedding will be held on 2nd octomber 2019.\r\n150 guest will be attending for my wedding. \r\nI want to know the what are the facilities you will offer and final cost for the service', '2019-06-28 14:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `sent_reply`
--

CREATE TABLE `sent_reply` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `receiverMail` varchar(255) NOT NULL,
  `receiverName` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `senderMail` varchar(255) NOT NULL,
  `senderName` varchar(255) NOT NULL,
  `businessName` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `sent_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_reply`
--

INSERT INTO `sent_reply` (`id`, `subject`, `receiverMail`, `receiverName`, `message`, `senderMail`, `senderName`, `businessName`, `vendor_id`, `sent_on`) VALUES
(1, 'Regarding Hilton hotel for your wedding', 'hiruni25abc@gmail.com', 'Hiruni', ' Thank you for your message. We are glad to work with you to successful your dream wedding.\r\nAccording to your details we plan our budget and send to you with this mail.\r\n\r\n ', 'colombo.reservations.@hilton.com', 'Danuka silva', 'Hilton Hotel', 22, '2019-06-28 16:39:26'),
(2, 'Regarding registration on wedding organizer', 'hiruni.chandrasiri@gmail.com', 'Hiruni Chandrasiri', '\r\nI want to know how I register with your website to promote my wedding services.\r\n\r\nPlease reply as soon as possible.\r\n\r\n', 'ramesh.zincat@gmail.com', 'Ramesh Silva', 'Momento creations', 23, '2019-09-01 08:13:44'),
(4, 'Regarding registration on wedding organizer', 'hiruni.chandrasiri@gmail.com', 'Hiruni Chandrasiri', '\r\nI want to know how I register with your website to promote my wedding services.\r\n\r\nPlease reply as soon as possible.\r\n', 'info@dushancaterers.com', 'Dushan Perera', 'Dushan Caterers', 29, '2019-09-01 08:13:44'),
(5, 'Regarding registration on wedding organizer', 'hiruni.chandrasiri@gmail.com', 'Hiruni Chandrasiri', '\r\nI want to know how I register with your website to promote my wedding services.\r\n\r\nPlease reply as soon as possible.\r\n', 'sandaliyac@gmail.com', 'Chamara Bandara', 'Sadaliya Creations', 30, '2019-09-01 11:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `vendor_id`, `facebook`, `instagram`, `twitter`, `youtube`) VALUES
(3, 22, 'https://www.facebook.com/HiltonColombo', '', 'https://www.twitter.com/hilton-hotel', ''),
(4, 29, 'https://www.facebook.com/Dushan-Caterers-Private-Limited-1474346826176220/', '', '', 'https://www.youtube.com/channel/UCim-rc37aQdDZnCkzegpTNg');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Taskname` varchar(255) NOT NULL,
  `Contactno` varchar(15) NOT NULL,
  `Assigndate` date NOT NULL,
  `Duedate` date NOT NULL,
  `Status` varchar(100) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `Name`, `Taskname`, `Contactno`, `Assigndate`, `Duedate`, `Status`, `user_name`) VALUES
(1, 'Madushan somarathna', 'Pay advance payment for catering', '077 1356248', '2019-05-21', '2019-05-25', 'pending', 'iduranga.chandrasiri@gmail.com'),
(2, 'Hiruni gamage    ', 'Search best wedding photographers', '071 2354879', '2019-07-08', '2019-07-23', 'done', 'hiruni25abc@gmail.com'),
(4, 'Amali karunarathna ', 'Search some videographers', '0757370014', '2019-07-09', '2019-07-18', 'done', 'hiruni25abc@gmail.com'),
(5, 'Danuka silva', 'Pay advance payment for catering', '0778654895', '2019-08-03', '2019-08-03', 'pending', 'kamalsiriwardane@yahoo.co.uk'),
(16, 'Bhagya siriwardana', 'Pay advance payment for catering', '0757370014', '2019-08-16', '2019-08-18', 'pending', 'hiruni25abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Hiruni', 'Chandrasiri', 'hiruni25abc@gmail.com', '12345'),
(2, 'Iduranga', 'Chandrasiri', 'iduranga22.chandrasiri@gmail.com', 'abcdf'),
(19, 'gihq1', 'sen', 'abc@de.fg', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_prices`
--

CREATE TABLE `vendor_prices` (
  `id` int(11) NOT NULL,
  `estimatedCost` int(100) NOT NULL,
  `finalCost` int(100) NOT NULL,
  `vendor_id` int(20) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_prices`
--

INSERT INTO `vendor_prices` (`id`, `estimatedCost`, `finalCost`, `vendor_id`, `user_name`) VALUES
(1, 80000, 75000, 22, 'hiruni25abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_registration`
--

CREATE TABLE `vendor_registration` (
  `id` int(11) NOT NULL,
  `Login_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `businessName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `website` varchar(255) NOT NULL,
  `profileImage` varchar(255) NOT NULL,
  `address` varchar(400) NOT NULL,
  `city` varchar(255) NOT NULL,
  `businessHours` varchar(255) NOT NULL,
  `description` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_registration`
--

INSERT INTO `vendor_registration` (`id`, `Login_email`, `password`, `businessName`, `category`, `Name`, `contactno`, `email`, `mobileNo`, `fax`, `website`, `profileImage`, `address`, `city`, `businessHours`, `description`) VALUES
(22, 'colombo.reservations.@hilton.com', 'hilton123', 'Hilton Hotel', 'Venue', 'Danuka Silva', '01122879456', 'colombo.reservations.@hilton.com', '0771355600', '+1 323 555 1234', 'https://www3.hilton.com/en/hotels/sri-lanka/hilton-colombo-COLHITW/', 'hilton colombo hotel exterior.jpg', '2 Sir Chittampalam A Gardiner, Mawatha, Colombo.', 'Colombo', ' 24 hours', 'Hilton Colombo, a luxury Sri Lanka hotel is located right next to Colombo World Trade Center, the foremost landmark building in Colombo, the capital city of Sri Lanka. \r\n\r\nWhile Hilton Colombo is directly linked to the Colombo World Trade Center via a walkway, the Central Bank of Sri Lanka is just a stone\'s throw away from the hotel. \r\n\r\nColombo city center being the hub of business and commerce in Sri Lanka, most of the main Banks of Colombo are within walking distance from Hilton Colombo. Set in 7 acres of land, the views from Hilton Colombo open up Indian Ocean and Beira Lake of Colombo.\r\nLocation Information\r\nForty-five minutes from Bandaranaike International Airport, our Colombo hotel offers business travelers both comfort and convenience. Directly connected to Colombo World Trade Centre, Hilton Colombo offers 25 on-site venues for business and social functions, including a pillarless ballroom.'),
(23, 'ramesh.zincat@gmail.com', '123456', 'Momento Creations', 'Photography', 'Ramesh Silva', '0715519975', 'ramesh.zincat@gmail.com', '0771233541', '', 'http://www.momentocreations.lk/', '13.jpg', 'No.40C Bahirawakanda Path, Kandy. Sri Lanka', 'Kandy', ' ', ' I\'m Nishan Ogives, a Professional Wedding Photographer based in Kandy. I love to capture the moments as they unfold naturally in your Big Day with very little direction or posing. Being unique in each Wedding Album depends on capturing the Unseen candid moments between you and your loved ones. It is always wonderful to see a couple looking at their album and seeing moments they never knew happened. \r\nStarting my own venture as a web-designer and online marketer, I later discovered my passion for photography which made me a product photographer as well as hotel / travel photographer. Experiencing the splendor of travelling and capturing the spontaneous beauty of landscape, I\'ve then taken a leap towards Wedding Photography as well. I\'m a happy person who loves what he does. So, I\'ll be more than glad to create a delightful pictorial of your wedding to cherish for the rest of your life. For this reason, I\'ll always go the extra mile in delivering the best product that I possibly can. '),
(28, 'hotel.pinnalanda@gmail.com', 'abcxyz', 'Hotel Pinnalanda', 'Venue', 'kamal siriwardane', '035 2265297', 'hotel.pinnalanda@gmail.com', ' 077 360 2661', '', 'https://www.hotelpinnalanda.com', '27598984.jpg', 'Pinnalanda Group (Pvt) Ltd Pinnawala, Rambukkana, Sri Lanka', 'Kegalle', ' 24 Hours  ', ' Hotel Pinnalanda is known as one of the finest and outstanding Hotels in Pinnawala. The hotel is located in an enchanting landscape of a calm river bed with a dazzling view of elephant bath. It is the best place to enjoy your stay relaxing and entertaining at Sri Lanka while watching wisest creatures of Mother Nature, Elephants. Hotel Pinnalanda is placed in between the scenic â€œMaha Oyaâ€ river and prestigious country hills. Hotel provides a stunning panoramic view of river that will relax your mind. While your stay at Hotel Pinnalanda. You can have amusing time with adorable elephants.  '),
(29, 'info@dushancaterers.com', '123456abc', 'Dushan Caterers', 'Catering', 'Dushan perera', '0112 750 730', 'info@dushancaterers.com', '0777810 813', ' +94 112 752 611', 'http://www.dushancaterers.com', 'slider-4.jpg', 'No.242 Ranala Road, Habarakada, Homagama, Sri Lanka.', 'Homagama', ' 24 Hours  ', ' Our team is ready to come true your dream Occasions. Select from a large variety of quality handmade finger food items and create the ideal menu for your special event. What ever is your occasions our staff ready to give the best service for you. If you are senior citizen in sri lanka we are giving 10% discount for your childrenÃ¢â‚¬â„¢s wedding. Our mobile service ready to any time come to you and organize your party.\r\n\r\nAnniversary Party, Welcome Party, Wedding, Cocktail Party, Homecoming, Marriage Related Party,Holiday Party, Office Party, Get Together, Dinner Party, Informal Dinner Party, Pirith Ceremony, Almsgiving, Birthday Tea Party, Graduation Party, Special Event Party, Candle Night, Fundraising Party, Surprise Party etc...\r\n\r\nDushan Caterers (pvt) Ltd has been honored with the Shrama Abhimani National award for his input towards the Catering service provider in Sri Lanka. The Awards Festival was held under the patronage of Minister Rajitha Senaratne. As our best catering service we are presented with Shrama Abhimani BMICH on 28th Juny 2011. We guarantee that Our catering service is law rates and good quality. Our food is prepared in a certified kitchen under personal supervisor.  '),
(30, 'sandaliyac@gmail.com', 'sadaliya', 'Sadaliya Creations', 'DJ/bands', 'Chamara Bandara', '0773 646 833', 'sandaliyac@gmail.com', '', '', 'http://www.sandaliya.lk', 'dj.jpg', 'No: 235 A, Katugastota Rd, Kandy', 'Kandy', '', 'Wedding ceremony is the most important & memorable occasion in anyone\'s life. Wedding day is the beautiful day in your life. everyone\'s dream about her or his wedding day to come true in a glorious look.  Sandaliya Creations has a fulfill every thing you need for a wedding ceremony. Let us make your wedding a unique experience that unite with our creative mind with the most beautiful ideas. We are grated to create unique floral presentations that will last a lifetime of memories.   Hot Mix Music Entertatment, we are the pioneer dj & Music group in hill country.. any event you need music. we have quality service for you. lowest price, best qulity service for your request...'),
(31, 'info@claypot.lk', '789654', 'The Clay Pot Family Restaurant', 'Catering', 'Udayanga Perera', '0114062555', 'info@claypot.lk', '0765507844', '', 'https://www.claypot.lk', 'gallery111.jpg', '871-1-A, Avissawella Colombo Road, Nawagamuwa, Ranala ', 'Ranala', '  ', ' The CLAY POT FAMILY RESTAURANT serves Sri Lankan Traditional food as well as European food conveniently located in the neighborhood of Nawagamuwa, Ranala and Kaduwela; you donâ€™t have to go all the way to Colombo to taste fine Sri Lankan and Asian cuisine. This is definitely the place for those living in and around Kaduwela, Ranala, Nawagamuwa and the vicinity!\r\n\r\nThe cuisine at CLAY POT FAMILY RESTAURANT is fresh dining and prepared by five star chefs just superb! Pick and choose from the wide range on offer; from authentic Sri Lankan to a number of Asian dishes, served fresh, warm and delicious. Itâ€™s all about great fresh food, good affordable value and a relaxing indoor air conditioned or outdoor atmosphere. You can choose to dine-in; take-away as per your choice.\r\n\r\nCLAY POT FAMILY RESTAURANT with its spacious hall, awesome food and impeccable service is also the ideal venue for social gatherings, such as company get-togethers, conferences, club meetings, birthday parties and family reunions. We even have a special place for the kids to play.\r\n\r\nA great meal served in an elegant setting and enhanced with friendly service will certainly make you come back for more! Our many customers who are now regulars bear testimony to this!!\r\n\r\nYour favourite restaurant is now open 7.30 am to 9.30 pm daily.\r\nCLAY POT FAMILY RESTAURANT â€“ Taste of Asiaâ€¦ at it best! '),
(32, 'info@casonsrentacar.com', '111111', 'Casons Rent a Car (Pvt) Ltd', 'Wedding car', 'M.C.Zakir  Ahamed', '0114377366', 'info@casonsrentacar.com', '0777 312500', '', 'https://casons.lk/', 'modernfleet-full.jpg', '181, Gothami Gardens Gothami road, Rajagiriya, Sri Lanka.', 'Rajagiriya', '24 Hours  ', 'Our Company  Established in 1987 as the pioneering Rent a Car Company by the managing director Mr. M. C. Zakir Ahamed (A.M.I.M.I-UK), Casons Rent a Car (Pvt) Ltd. is a family managed business that reign at the top of rent a car sri lanka companies. As the oldest vehicle rental service providing company to both locals and foreign tourists, offering the widest range of transportation services using from a choice of small budget cars to luxury limousines and coaches with chauffeur or self driven options, our services extend to corporate group events, VIP movements, weddings & celebrity events and any other requirement. With the largest ever vehicle fleet to date since its inception, Casons has always maintained consistency and excelled in providing the highest levels of customer service quality and satisfaction with highly personalised service to all our customers.  Our company began operations during the time of terrorism getting involved with the tourism trade to promote the country as a popular tourist destination at a time Sri Lanka as a nation went through its darkest era. With his brother, Mr. M. C. Zufer Ahamed later joining the company as its Chief Executive Officer and Director in 1991, Casons began to swiftly expand and develop to make it big in a field relatively new to Sri Lanka thus earning the title and unmatched position as the leading rent a car company in Sri Lanka. Casons Name was given by their father MR. MOHAMED CASSIM to his both the sons Mr. Mohamed Cassim Zakir Ahamed (Elder Son) & Mr. Mohamed Cassim Zufer Ahamed (Younger Son). CASSIM & SONS coined to shorter form as CASONS.  We have always lived up to our company motto, ï¿½Excellence Unmatchedï¿½ beyond mere words with the secret of success of our company being a team of dedicated and dynamic staff members striving to go the extra mile in improving the quality of service offered to each and every customer since the companyï¿½s inception.  Casons continues to maintain its image and reputation as the specialists in rent a car business in Sri Lanka besides being the leading budget rent a car company in the island as well.  Casons Rent a Car the revolution Car Rental Agent and tour operator in Sri Lanka has extended it wings to the Bandaranayake International Airport (BIA) with the commissioning of a modern Travel counter at the BIA Arrival Terminal with effect from Jan 01 2017.     '),
(33, 'snjselvaraj@gmail.com', '1234567', 'Romax Wedding Cards', 'Wedding invitation', 'Dinuwan chandrasiri', ' 0112389769', 'snjselvaraj@gmail.com', '', '', 'https://romaxweddingcard.webs.com', 'intro2(1).jpg', '12, 48, 94, Maliban Street, Colombo 11, Sri Lanka.', 'Colombo', ' Mon-Fri: 9 am - 7 pm\r\n\r\nSat: 9 am - 6 pm\r\n\r\nSun: Call to inquire\r\n                          ', ' At Romax, we are focused on providing  services with the highest levels of customer satisfaction â€“ we will do everything we can to meet your expectations.\r\n\r\nWith a variety of offerings to choose from, weâ€™re sure youâ€™ll be happy working with us. Look around our website and if you have any comments or questions, please feel free to contact us. We hope to see you again! ');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `vendor_id`, `video`, `Title`, `Description`, `location`) VALUES
(7, 22, 'Hilton Hotel, Colombo, SriLanka.mp4', 'Hilton Hotel, Colombo, Sri Lanka ', 'A walk through the Hilton Hotel, Sri Lanka. The hotel facilities straddle the road through central Colombo with pool, gym, restaurants, hotel lobby and front entrance seen. ', 'uploads/Hilton Hotel, Colombo, SriLanka.mp4'),
(8, 23, 'Chris & ChAris - Preshoot - making Video.mp4', 'Photoshoot', ' Wedding photoshoot                                                              ', 'uploads/Chris & ChAris - Preshoot - making Video.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_details`
--

CREATE TABLE `wedding_details` (
  `id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `groomName` varchar(255) NOT NULL,
  `brideName` varchar(255) NOT NULL,
  `weddingdate` date NOT NULL,
  `homecomingdate` date NOT NULL,
  `phonenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding_details`
--

INSERT INTO `wedding_details` (`id`, `user_name`, `groomName`, `brideName`, `weddingdate`, `homecomingdate`, `phonenumber`) VALUES
(1, 'hiruni25abc@gmail.com', 'Madushan', 'Geeshani', '2019-10-02', '2019-10-04', '0723679933'),
(4, 'iduranga22.chandrasiri@gmail.com', 'Iduranga', 'Nilushika', '2020-03-09', '2020-03-11', '0772803125');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_msg`
--
ALTER TABLE `admin_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_sent`
--
ALTER TABLE `admin_sent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hired_vendors`
--
ALTER TABLE `hired_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_deal`
--
ALTER TABLE `new_deal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `sent_message`
--
ALTER TABLE `sent_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sent_reply`
--
ALTER TABLE `sent_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_prices`
--
ALTER TABLE `vendor_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_registration`
--
ALTER TABLE `vendor_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding_details`
--
ALTER TABLE `wedding_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_msg`
--
ALTER TABLE `admin_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_sent`
--
ALTER TABLE `admin_sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `hired_vendors`
--
ALTER TABLE `hired_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `new_deal`
--
ALTER TABLE `new_deal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sent_message`
--
ALTER TABLE `sent_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sent_reply`
--
ALTER TABLE `sent_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vendor_prices`
--
ALTER TABLE `vendor_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_registration`
--
ALTER TABLE `vendor_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wedding_details`
--
ALTER TABLE `wedding_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
