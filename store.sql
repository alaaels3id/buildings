-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 02:05 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+02:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `dob`, `location`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '1994-09-27', 'sahraget as soghra, aga, dakahlia', '$2y$10$0Wxnv.cT8.5DlcSf0NpNfOA1c5GImmL6ttXjo80d5V7UeV5CPb2hO', '4RBXH8iEwq25vWkbV1wBsCZcmGjlg9xdzjVwYNAnYysKuwQiQzTvWocPleqx', '2018-08-23 22:00:00', '2018-08-23 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_buliding`
--

CREATE TABLE `admin_buliding` (
  `buliding_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bulidings`
--

CREATE TABLE `bulidings` (
  `id` int(10) UNSIGNED NOT NULL,
  `bu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bu_price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bu_type` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT 'none',
  `bu_rooms` mediumint(5) NOT NULL DEFAULT '0',
  `bu_rent` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT 'No',
  `bu_square` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bu_meta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bu_langtude` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bu_latitude` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bu_status` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT 'Disactive',
  `bu_gov` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `bu_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bu_small_dis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bu_large_dis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulidings`
--

INSERT INTO `bulidings` (`id`, `bu_name`, `bu_price`, `bu_type`, `bu_rooms`, `bu_rent`, `bu_square`, `bu_meta`, `bu_langtude`, `bu_latitude`, `bu_status`, `bu_gov`, `bu_image`, `bu_small_dis`, `bu_large_dis`, `year`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dawwod Tower', '10000000', 'Apartment', 10, 'No', '500', 'test,  for,  building', '31.340002', '30.044281', 'Active', 'Cairo', 'received_10203748383028398.jpeg', 'test for buildingtest for buildingtest for buildingtest for buildingtest for buildingtest for building', 'test for buildingtest for buildingtest for buildingtest for buildingtest for buildingtest for buildingtest for buildingtest for buildingtest for buildingtest for buildingtest for buildingtest for buildingtest for building', 2018, NULL, '2018-05-03 12:57:34', '2018-05-18 10:34:52'),
(3, 'Villa Elmaady', '1700000', 'Villa', 23, 'Yes', '620', 'Villa, Elmaady, Elgedida', '22.340123', '40.044281', 'Active', 'Matruh', '11749654_848794848550029_2137324976_n.jpg', 'Alaa Elsaid Villa Elmaady elgedida Alaa Elsaid Villa Elmaady elgedida Alaa Elsaid Villa Elmaady elgedida Alaa Elsaid Villa Elmaady elgedida', 'test for buildingtest for buildingtest for buildingtest for buildingtest for buildingtest for building', 2018, NULL, '2018-04-03 16:01:48', '2018-05-09 21:29:55'),
(4, 'Elsahel Villa', '3000000', 'Villa', 5, 'Yes', '500', 'Elsahel, Villa, egypt, cairo', '23.340147', '30.044281', 'Active', 'Suez', '7204_09b7e517c9be98502a4084881fa96058.jpg', 'Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa', 'Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa Elsahel Villa', 2018, NULL, '2018-04-03 19:15:40', '2018-05-16 23:58:35'),
(5, 'Villa 48 New Cairo', '15000000', 'Villa', 10, 'Yes', '500', 'Villa, New Cairo, Egypt', '31.340159', '30.044281', 'Active', 'Dakahlia', '16.jpg', 'Villa 48 New Cairo Egypt Villa 48 New Cairo Egypt Villa 48 New Cairo Egypt Villa 48 New Cairo Egypt Villa 48 New Cairo Egypt', 'Villa 48 New Cairo Villa 48 New Cairo Villa 48 New Cairo Villa 48 New Cairo Villa 48 New Cairo Villa 48 New Cairo Villa 48 New Cairo Villa 48 New Cairo Villa 48 New Cairo Villa 48 New Cairo', 2018, NULL, '2018-08-03 19:17:32', '2018-05-09 21:31:50'),
(6, 'Elshrook Villa', '10000000', 'Villa', 10, 'No', '500', 'Elshrook, Villa, egypt, cairo', '31.340002', '30.044281', 'Active', 'Cairo', 'IMG-20160305-WA0000.jpg', 'Elshrook Villa New Cairo Egypt Elshrook Villa New Cairo Egypt Elshrook Villa New Cairo Egypt Elshrook Villa New Cairo Egypt', 'Elshrook Villa New Cairo Egypt Elshrook Villa New Cairo Egypt Elshrook Villa New Cairo Egypt Elshrook Villa New Cairo Egypt', 2018, NULL, '2018-12-03 19:19:01', '2018-05-09 21:33:04'),
(7, 'Eltagamoa Villa No.14', '3000000', 'Villa', 30, 'No', '600', 'Eltagamoa, Villa Number 14, New Cairo, Egypt', '31.340002', '30.044281', 'Active', 'Cairo', '18403163_1354553637974145_2473315930679252648_n.jpg', 'Eltagamoa Villa Number 14 New Cairo Egypt Eltagamoa Villa Number 14 New Cairo Egypt Eltagamoa Villa Number 14 New Cairo Egypt', 'Eltagamoa Villa Number 14 New Cairo Egypt Eltagamoa Villa Number 14 New Cairo Egypt Eltagamoa Villa Number 14 New Cairo Egypt', 2018, NULL, '2018-11-03 19:21:39', '2018-05-09 21:33:37'),
(8, 'North Coast', '110000', 'Shallih', 5, 'Yes', '350', 'Noth, Coast, Shalih', '31.340002', '30.044281', 'Active', 'Alexandria', '13081979_10204551664149924_1924131206_n.jpg', 'North Coast Shalih in beautiful landscape view North Coast Shalih in beautiful landscape view North Coast Shalih in beautiful landscape view', 'North Coast Shalih in beautiful landscape view North Coast Shalih in beautiful landscape view North Coast Shalih in beautiful landscape view', 2018, NULL, '2018-11-03 21:04:12', '2018-05-09 21:34:00'),
(9, 'Mohssen Tower', '100000', 'Apartment', 4, 'Yes', '300', 'mohssen, twoer, cairo', '31.340002', '30.044281', 'Active', 'Giza', '13081729_10204551663669912_875054916_n.jpg', 'apartment in cairo mohssen twoer', 'apartment in cairo mohssen twoer apartment in cairo mohssen twoer apartment in cairo mohssen twoer', 2018, NULL, '2018-06-04 17:25:51', '2018-05-09 20:46:58'),
(10, 'Villa Elmistikawy', '3000000', 'Villa', 30, 'No', '800', 'Villa, cairo', '31.340002', '30.044281', 'Active', 'Cairo', '12309176_10203748365987972_176005014_n.jpg', 'Villa Elmistikawy located in new cairo compoundes collections at tagamoo khamess', 'Villa Elmistikawy located in new cairo compoundes collections at tagamoo khamess Villa Elmistikawy located in new Villa Elmistikawy located in new cairo compoundes collections at tagamoo khamess', 2018, NULL, '2018-09-05 16:57:29', '2018-05-09 20:51:12'),
(11, 'Goda Tawer apartment', '2000000', 'Apartment', 6, 'No', '300', 'tawer, apaertment, mansoura', '31.340002', '30.044281', 'Active', 'Dakahlia', 'IMG_20160713_125913.jpg', 'Goda Tawer apartment in mansoura Goda Tawer apartment in mansoura Goda Tawer apartment in mansoura Goda Tawer apartment in mansoura', 'Goda Tawer apartment  Goda Tawer apartment in mansoura Goda Tawer apartment in mansoura Goda Tawer apartment in mansoura', 2018, NULL, '2018-12-05 17:03:03', '2018-05-18 10:34:30'),
(12, 'Zidan Tawer', '100000', 'Apartment', 4, 'No', '350', 'mansoura, apartment, tawer', '31.340002', '30.044281', 'Active', 'Dakahlia', 'IMG-20160305-WA0012.jpg', 'wide apartment in mansoura city at el magzar street wide apartment in mansoura city at el magzar street wide apartment in mansoura', 'wide apartment in mansoura city at el magzar street wide apartment in mansoura city at el magzar street wide apartment in mansoura city at el magzar street', 2018, NULL, '2018-05-05 19:13:26', '2018-05-12 20:29:10'),
(13, 'el serafy tawer', '4000000', 'Apartment', 4, 'No', '450', 'tawer, apaertment, giza', '31.340002', '30.044281', 'Active', 'Giza', 'IMG_20141220_225831.jpg', 'el serafy tawer elgiza zoo el serafy tawer elgiza zoo el serafy tawer elgiza zoo el serafy tawer elgiza zoo', 'el serafy tawer elgiza zooel serafy tawer elgiza zooel serafy tawer elgiza zoo el serafy tawer elgiza zooel serafy tawer elgiza zooel serafy tawer elgiza zoo', 2018, NULL, '2018-07-08 13:30:49', '2018-08-27 09:50:06'),
(14, 'tomas villa', '5000000', 'Villa', 20, 'No', '800', 'new cairo, villa, 5th collection', '31.340002', '30.044281', 'Disactive', 'Cairo', 'IMG_20160326_165057.jpg', 'tomas villa 5th collection tomas villa 5th collection tomas villa 5th collection tomas villa 5th collection', 'tomas villa 5th collection tomas villa 5th collection tomas villa 5th collection tomas villa 5th collection tomas villa 5th collection tomas villa 5th collection', 2018, NULL, '2018-06-08 13:37:44', '2018-05-09 21:39:28'),
(15, 'lolo elsaid home 16', '5000000', 'Apartment', 4, 'No', '600', 'test,  for,  building, user, form', '31.340002', '30.044281', 'Disactive', 'Dakahlia', 'for.jpg', 'test from user yallha in can agbak yaany test from user yallha in can agbak yaany test from user yallha in can agbak yaany test from user yallha in can agbak ya...', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 2018, NULL, '2018-05-12 19:48:11', '2018-05-21 15:45:49'),
(17, 'test for building 3', '10000000', 'Apartment', 10, 'No', '500', 'test,  for,  building', '31.340002', '30.044281', 'Disactive', 'Red Sea', 'for.jpg', 'test for building 3 test for building 3 test for building 3 test for building 3 test for building 3 test for building 3 test for building 3 test for building 3', 'test for building 3 test for building 3 test for building 3 test for building 3 test for building 3 test for building 3 test for building 3 test for building 3', 2018, NULL, '2018-08-12 20:14:10', '2018-05-12 20:14:10'),
(19, 'test for building 4', '3000000', 'Villa', 20, 'No', '450', 'test,  for,  building3', '31.340002', '30.044281', 'Disactive', 'Giza', 'for.jpg', 'test for building 4 test for building 4 test for building 4 test for building 4 test for building 4 test for building 4 test for building 4 test for building 4', 'test for building 4 test for building 4 test for building 4 test for building 4 test for building 4 test for building 4 test for building 4 test for building 4', 2018, NULL, '2018-07-11 22:00:00', '2018-05-12 20:48:52'),
(20, 'First Building', '10000000', 'Apartment', 10, 'No', '500', 'Villa,Mansoura, Egypt', '31.340002', '30.044281', 'Disactive', 'Dakahlia', '20180226_202514.jpg', 'First Building First Building First Building First Building First Building First Building First Building First Building First Building First Building First Buil...', 'First Building First Building First Building First Building First Building First Building First Building First Building First Building First Building First Building First Building First Building First Building First Building First Building', 2018, NULL, '2018-09-13 21:22:15', '2018-05-13 21:22:15'),
(21, 'Second Building', '3000000', 'Villa', 10, 'Yes', '450', 'mansoura, villa', '31.340002', '30.044281', 'Active', 'Dakahlia', '18403163_1354553637974145_2473315930679252648_n.jpg', 'Second Building villa mansoura view good on the blue see\r\nSecond Building villa mansoura view good on the blue see\r\nSecond Building villa mansoura view good on...', 'Second Building villa mansoura view good on the blue see\r\nSecond Building villa mansoura view good on the blue see\r\nSecond Building villa mansoura view good on the blue see', 2018, NULL, '2018-12-13 22:00:46', '2018-05-13 22:02:03'),
(22, 'zap tharwat apartment', '3000000', 'Apartment', 4, 'Yes', '300', 'Villa, New Giza, Egypt', '37.340002', '39.044281', 'Active', 'Giza', '', 'zap tharwat apartment when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'zap tharwat apartment when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 2018, NULL, '2018-12-18 21:33:58', '2018-05-18 21:35:10'),
(23, 'icity apertment 21', '120000', 'Apartment', 5, 'No', '400', 'icity, apartment, new cairo', '31.496773', '30.026300', 'Active', 'Cairo', '4586_09b7e517c9be98502a4084881fa96058.jpg', 'Coordinates of New Cairo City, Cairo Governorate, Egypt is given above in both decimal degrees and DMS (degrees, minutes and seconds) format. The country code given is in the ISO2 format.', 'New Cairo City, Cairo Governorate, Egypt is given above in both decimal degrees and DMS (degrees, minutes and seconds) format. The country code given is in the ISO2 format.', 2018, NULL, '2017-12-20 16:16:53', '2018-05-21 22:13:29'),
(24, 'said ali apertment', '10000000', 'Apartment', 4, 'Yes', '300', 'test,  for,  building', '31.340002', '30.044281', 'Disactive', 'Dakahlia', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an...', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 2018, NULL, '2017-12-20 23:58:57', '2018-05-20 23:58:57'),
(25, 'said ali apertment 2', '100000', 'Apartment', 3, 'No', '300', 'test,  for,  building 22', '31.496773', '30.026300', 'Disactive', 'Dakahlia', '1892_1D4CF84CCCC2210ACA19C886F200F87B.1776_120_120_0.mp4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an...', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 2017, NULL, '2017-12-21 00:00:06', '2018-05-21 00:00:06'),
(26, 'ramadan hamed home 1', '100000', 'Apartment', 3, 'Yes', '300', 'test,  for,  building 23', '31.340002', '30.026300', 'Disactive', 'Dakahlia', '6176_0984E7F27FB5399C25AA4BF22FFB62AC.1776_120_120_0.mp4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an...', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 2017, NULL, '2017-12-21 00:05:48', '2017-05-21 00:05:48'),
(27, 'ramadan hamed home 3', '3000000', 'Apartment', 4, 'Yes', '450', 'Villa, New Cairo, Egypt', '31.496773', '30.026300', 'Disactive', 'Dakahlia', '9436_2998E5834BBB30C92B855EE6F5DE7364.1776_120_120_0.mp4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an...', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 2017, NULL, '2017-12-21 00:06:39', '2017-05-21 00:06:39'),
(28, 'ramadan hamed home 4', '4000000', 'Apartment', 3, 'No', '300', 'test,  for,  building', '31.496773', '30.026300', 'Disactive', 'Dakahlia', '7728_933073A631B74D6A1465E97A0CD8C6F8.1776_120_120_0.mp4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an...', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 2017, NULL, '2017-12-21 00:07:17', '2017-05-21 00:07:17'),
(29, 'ramadan home 24', '4000000', 'Apartment', 3, 'No', '300', 'test,  for,  building', '31.496773', '30.026300', 'Disactive', 'Dakahlia', '7625_FB_IMG_1506530207933.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an...', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 0, NULL, '2018-05-21 00:07:51', '2018-05-21 00:07:51'),
(30, 'ramadan hamed home 5', '3000000', 'Apartment', 3, 'No', '300', 'mansoura, apartment, tawer', '31.496773', '30.026300', 'Disactive', 'Dakahlia', '5398_FB_IMG_1510092730925.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an...', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 0, NULL, '2018-05-21 00:08:26', '2018-05-21 00:08:26'),
(48, 'limfa villa', '60000000', 'Villa', 8, 'No', '500', 'wide, sweet', '31.340056', '31.340002', 'Disactive', 'Cairo', '3196_gallery-03.jpg', 'this is a description this is a description this is a description this is a description this is a description', 'this is a description this is a description this is a description this is a description this is a description', 2018, NULL, '2018-08-27 14:07:01', '2018-08-27 15:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `buliding_user`
--

CREATE TABLE `buliding_user` (
  `buliding_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buliding_user`
--

INSERT INTO `buliding_user` (`buliding_id`, `user_id`, `created_at`, `updated_at`) VALUES
(48, 21, '2018-08-27 14:07:02', '2018-08-27 14:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `contact_uses`
--

CREATE TABLE `contact_uses` (
  `id` int(10) UNSIGNED NOT NULL,
  `co_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_message` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_view` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `co_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_uses`
--

INSERT INTO `contact_uses` (`id`, `co_name`, `co_email`, `co_subject`, `co_message`, `co_view`, `co_type`, `created_at`, `updated_at`, `image`) VALUES
(1, 'lolo', 'alaa4cat@gmail.com', 'error in buying', 'hi my name is alaa elsaid ahmed and i have a problem with this site', 'Yes', 'Problem', '2018-05-10 21:28:01', '2018-05-12 11:07:06', ''),
(3, 'gamal', 'alaa4cat@gmail.com', 'bad service', 'your service is so bad and i hate you very much now come and give me a hug', 'Yes', 'Problem', '2018-05-12 11:12:25', '2018-05-12 12:42:59', ''),
(4, 'dina', 'alaa4cat@gmail.com', 'Good Jop', 'Hi everyone my name is dina and i live your work so much really i do thanks a lot keep on an d thank you ....', 'Yes', 'like', '2018-05-12 13:34:48', '2018-05-14 12:56:18', ''),
(5, 'alaa elsaid', 'alaa4cat@gmail.com', 'Good Jop', 'hi every one i am alaa and i live your work so much', 'Yes', 'like', '2018-05-12 22:14:05', '2018-05-14 13:08:35', ''),
(6, 'Alaa', 'alaa4cat@gmail.com', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Yes', 'Suggest', '2018-05-14 12:40:53', '2018-05-14 13:08:41', '22310564_1346047128837524_4220480610791310768_n.jpg'),
(7, 'الحاج محمود اللي بيبيع حاجات', 'alaa4cat@gmail.com', 'الشغل بايظ يااسطي', 'ايه يا عم الشغل اللي بايظ ده مفيش اي حاجة شغالة شوف يا معم الموضوع ده', 'Yes', 'Problem', '2018-05-14 14:30:37', '2018-05-14 14:30:52', '5624_received_10203748383028398.jpeg'),
(8, 'ابو الشوق كاديلك', 'alaa4cats@gmail.com', 'موقع زي الزفت', 'ايه يا اسطي الكلام علي ايه هو انا هفضل الم وراكوا كده كتير ولا ايه يا عم الواحد زهق والله .....شكرا', 'Yes', 'Problem', '2018-05-21 16:03:24', '2018-05-21 16:10:28', '5629_09b7e517c9be98502a4084881fa96058.jpg'),
(9, 'said ali', 'said@gmail.com', 'Good Jop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy', 'Yes', 'like', '2018-05-21 16:09:08', '2018-05-21 16:10:21', 'alaa.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_27_211444_add_dob_to_users_table', 2),
(4, '2018_04_28_162701_add_role_to_users', 4),
(5, '2018_05_02_161911_create_settings_table', 5),
(6, '2018_05_02_162734_add_slug_to_settings', 6),
(7, '2018_05_02_215350_create_bulidings_table', 7),
(8, '2018_05_05_180336_add_bu_gov_to_bulidings', 8),
(9, '2018_05_08_145256_add_bu_image_to_bulidings', 9),
(10, '2018_05_10_201406_create_contact_uses_table', 10),
(11, '2018_05_11_113119_add_user_image_to_users', 11),
(12, '2018_05_13_000400_add_image_to_contact_uses', 12),
(13, '2018_05_18_230143_add_manth_to_bulidings', 13),
(14, '2018_05_19_160459_add_year_to_bulidings', 14),
(15, '2018_05_21_235134_add_location_to_users', 15),
(16, '2018_08_23_213533_create_orders_table', 16),
(17, '2018_08_23_223019_add_user_id_to_orders', 17),
(18, '2018_08_24_181714_create_admins_table', 18),
(19, '2018_08_24_183156_create_building_user_table', 18),
(20, '2018_08_24_184059_create_building_admin_table', 18),
(21, '2018_08_24_194148_create_admins_table', 19),
(22, '2018_08_26_133855_add_deleted_at_to_bulidings', 20),
(23, '2018_08_27_140846_create_admin_building_table', 21),
(24, '2018_08_27_141050_create_user_building_table', 22),
(25, '2018_08_27_141821_create_user_buliding_table', 23),
(26, '2018_08_27_141913_create_admin_buliding_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `bu_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `bu_rent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bu_id`, `user_id`, `bu_rent`, `fullname`, `email`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'No', 'alaa elsaid', 'alaa4cat@gmail.com', '01011468087', '2018-08-23 20:25:21', '2018-08-23 20:25:21'),
(2, 3, 21, 'Yes', 'alaa elsaid', 'alaa4cat@gmail.com', '01027543768', '2018-08-23 20:33:56', '2018-08-23 20:33:56'),
(3, 4, 21, 'Yes', 'alaa elsaid', 'alaa4cat@outlook.com', '01027543768', '2018-08-23 20:39:01', '2018-08-23 20:39:01'),
(4, 6, 21, 'No', 'alaa elsaid', 'alaa4cat@gmail.com', '01027543768', '2018-08-23 20:41:04', '2018-08-23 20:41:04'),
(7, 22, 21, 'Yes', 'alaa elsaid', 'alaa4cat@gmail.com', '01011468087', '2018-08-23 21:06:23', '2018-08-23 21:06:23'),
(8, 23, 21, 'No', 'ramadan hamed', 'ramadan_hamed@gmail.com', '01011468087', '2018-08-23 21:07:24', '2018-08-23 21:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('alaa4cat@gmail.com', '$2y$10$6kgaLS82x2bzcVhWjumLHeDqRq7NAQuPQ5pisqjEi2cGJ.O.dBDQ6', '2018-05-13 18:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `type`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'sitename', 'Store Website', 0, '2018-05-02 22:00:00', '2018-05-02 18:57:35', 'sitename'),
(2, 'mobile', '+201011468087', 0, '2018-05-03 00:05:06', '2018-05-02 16:25:37', 'mobile'),
(3, 'facebook', 'https://www.facebook.com/alaa.els3id', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'facebook'),
(4, 'youtube', 'https://www.youtube.com/', 0, '2018-05-08 05:20:17', NULL, 'youtube'),
(5, 'twitter', 'https://twitter.com/alaa_els3id', 0, '2018-05-08 05:20:17', '2018-05-02 19:10:49', 'twitter'),
(6, 'instagram', 'https://www.instagram.com/', 0, '2018-05-08 22:00:00', NULL, 'instagram'),
(7, 'linkedin', 'https://www.linkedin.com/', 0, '2018-05-08 22:00:00', NULL, 'linkedin'),
(8, 'google', 'https://plus.google.com/', 0, '2018-05-08 05:20:17', NULL, 'google'),
(9, 'no_image', 'no_image.jpg', 0, '2018-05-08 05:20:17', '2018-05-08 07:20:17', 'no_image'),
(10, 'header_image', 'Girl-Cup-Text-Inscription-Happy-Bee-Facebook-Covers.jpg', 3, '2018-05-08 22:00:00', '2018-05-09 20:34:22', 'header_image'),
(12, 'address', '25, El-horria  street, Cairo, Egypt', 0, '2018-05-12 12:52:00', '2018-05-12 12:52:14', 'address'),
(13, 'email', 'info@store.com', 0, '2018-05-11 22:00:00', '2018-05-11 22:00:00', 'email'),
(14, 'discription', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2018-05-12 12:52:00', '2018-05-12 02:58:00', 'discription');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `user_image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_image.jpg',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `dob`, `user_image`, `location`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'Lolo', 'lolo.elsaid', 'alaa4cats@gmail.com', '$2y$10$65GTyNy1aMAAtnUzxS4fReGOIbZ3KnV.cBL2fXC4DMPfbnvfur19e', '1994-09-27', 'no_image.jpg', 'Aga, Dakahila', 'TWLqAXt3Xha697EssYBdtV4lr2BFwgb9UueHiVFLXUTVAJU4Vjf4AsaFD2bK', '2018-05-21 21:57:45', '2018-04-27 10:00:03'),
(21, 'alaa', 'alaa.elsaid', 'alaa4cat@gmail.com', '$2y$10$0Wxnv.cT8.5DlcSf0NpNfOA1c5GImmL6ttXjo80d5V7UeV5CPb2hO', '1994-09-27', '9843_about-02.jpg', 'sahraget, elsoghra, aga', 'k3Puibd4Re8FbD2UX9CRDNVj5uPzYnZtsOb3Ug14h4oRvijeSMfllBY3oQLw', '2018-08-27 18:09:28', '2018-08-23 17:25:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_buliding`
--
ALTER TABLE `admin_buliding`
  ADD PRIMARY KEY (`buliding_id`,`admin_id`);

--
-- Indexes for table `bulidings`
--
ALTER TABLE `bulidings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bu_name` (`bu_name`);

--
-- Indexes for table `buliding_user`
--
ALTER TABLE `buliding_user`
  ADD PRIMARY KEY (`buliding_id`,`user_id`);

--
-- Indexes for table `contact_uses`
--
ALTER TABLE `contact_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `updated_at` (`updated_at`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bulidings`
--
ALTER TABLE `bulidings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `contact_uses`
--
ALTER TABLE `contact_uses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
