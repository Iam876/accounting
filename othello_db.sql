-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 04:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `othello_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mansion_name` varchar(255) NOT NULL,
  `mansion_address` text DEFAULT NULL,
  `room_number` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `prefecture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `image`, `mansion_name`, `mansion_address`, `room_number`, `contact`, `prefecture`, `created_at`, `updated_at`) VALUES
(1, 'https://via.placeholder.com/640x480.png/0033aa?text=quod', 'atque Mansion', '885 Johan Union\nPort Jasen, IA 53325', 'Room 059', '1-720-852-5458', 'ad', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(2, 'https://via.placeholder.com/640x480.png/005500?text=provident', 'et Mansion', '9112 Sporer Dale Apt. 180\nCassinfort, LA 61884', 'Room 843', '253-342-9463', 'quia', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(3, 'https://via.placeholder.com/640x480.png/008899?text=quis', 'velit Mansion', '60278 Euna Rue Apt. 819\nKeeganstad, AZ 07893-7204', 'Room 607', '551.919.6616', 'vero', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(4, 'https://via.placeholder.com/640x480.png/001122?text=qui', 'reprehenderit Mansion', '2675 Ankunding Mission Apt. 956\nUptonborough, NM 64670-8545', 'Room 460', '1-870-481-9474', 'tempore', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(5, 'https://via.placeholder.com/640x480.png/0099ff?text=ea', 'omnis Mansion', '2378 Kaela Station Apt. 313\nWest Elaina, AK 28660', 'Room 950', '+1.202.840.3367', 'quia', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(6, 'https://via.placeholder.com/640x480.png/000033?text=distinctio', 'ex Mansion', '36661 Rempel Viaduct Suite 205\nSouth Horace, MN 21561', 'Room 059', '651-420-7554', 'labore', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(7, 'https://via.placeholder.com/640x480.png/0088ff?text=voluptas', 'fuga Mansion', '6205 Gudrun Tunnel\nNew Keven, AK 03325-6938', 'Room 005', '(512) 784-7791', 'sit', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(8, 'https://via.placeholder.com/640x480.png/005500?text=error', 'porro Mansion', '733 Corrine Land\nBorermouth, FL 56457-4222', 'Room 939', '757.715.9290', 'natus', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(9, 'https://via.placeholder.com/640x480.png/0099ee?text=laborum', 'est Mansion', '44277 Patsy Throughway\nChaunceyland, OH 51725', 'Room 538', '1-520-735-1232', 'dolores', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(10, 'https://via.placeholder.com/640x480.png/009911?text=vel', 'qui Mansion', '507 Rosemarie Cape Suite 844\nJulianneville, ID 12191-8028', 'Room 919', '+1-724-677-1708', 'sint', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(11, 'https://via.placeholder.com/640x480.png/0099dd?text=sit', 'non Mansion', '7571 Pearlie Wall Suite 113\nPort Alverta, DC 14104-0846', 'Room 962', '308.771.5738', 'ut', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(12, 'https://via.placeholder.com/640x480.png/007755?text=eum', 'cumque Mansion', '803 Nitzsche Extensions Apt. 348\nSouth Tyshawn, NH 12484', 'Room 850', '+1 (231) 551-3658', 'veniam', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(13, 'https://via.placeholder.com/640x480.png/00ff11?text=voluptatum', 'et Mansion', '250 Liam Throughway Apt. 605\nHaleightown, ID 24671-4870', 'Room 665', '(434) 921-7654', 'ipsam', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(14, 'https://via.placeholder.com/640x480.png/008899?text=aliquam', 'non Mansion', '1739 Kuhlman Courts\nJaleelbury, MA 85886', 'Room 666', '1-216-326-1304', 'minima', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(15, 'https://via.placeholder.com/640x480.png/00bb00?text=aut', 'repellendus Mansion', '3223 Devante Trail\nOfeliashire, GA 49766-2511', 'Room 517', '(248) 750-4770', 'ut', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(16, 'https://via.placeholder.com/640x480.png/001188?text=ab', 'exercitationem Mansion', '169 Emanuel Junctions\nEast Faeton, NE 64276', 'Room 367', '865.897.5293', 'porro', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(17, 'https://via.placeholder.com/640x480.png/00ddee?text=nulla', 'qui Mansion', '10285 Cormier Green Suite 970\nPort Constantin, NC 92907-7130', 'Room 138', '+1.763.739.5341', 'eius', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(18, 'https://via.placeholder.com/640x480.png/001133?text=distinctio', 'libero Mansion', '556 Pollich Unions Suite 177\nCadeland, MT 29654-0029', 'Room 754', '765.409.5267', 'tempore', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(19, 'https://via.placeholder.com/640x480.png/00cc77?text=ut', 'dicta Mansion', '8516 Billy Lakes Suite 307\nAugustmouth, MA 89175', 'Room 733', '(559) 744-9501', 'magnam', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(20, 'https://via.placeholder.com/640x480.png/006699?text=ab', 'voluptate Mansion', '4926 Reymundo Center\nPort Jaylenmouth, DE 09799-1947', 'Room 307', '+1-678-265-1028', 'eligendi', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(21, 'https://via.placeholder.com/640x480.png/00aa22?text=laborum', 'officia Mansion', '25923 Watsica Forges Suite 344\nNew Erling, MN 83519', 'Room 940', '+1.458.536.9168', 'quia', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(22, 'https://via.placeholder.com/640x480.png/003333?text=deleniti', 'velit Mansion', '997 Walsh Crescent\nRaventon, MN 53632', 'Room 717', '+1-502-898-1809', 'doloribus', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(23, 'https://via.placeholder.com/640x480.png/00ccee?text=doloremque', 'laboriosam Mansion', '31258 Haskell Trafficway Suite 797\nOsborneview, MA 63759-0823', 'Room 104', '(458) 956-6012', 'suscipit', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(24, 'https://via.placeholder.com/640x480.png/000099?text=qui', 'sapiente Mansion', '793 Lowe Dam Apt. 999\nEast Casimir, HI 76495', 'Room 523', '+1 (432) 844-4709', 'inventore', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(25, 'https://via.placeholder.com/640x480.png/00ff44?text=repudiandae', 'quia Mansion', '8417 Thompson Ramp Suite 341\nJoanneview, CA 39633', 'Room 358', '+1.339.495.4904', 'modi', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(26, 'https://via.placeholder.com/640x480.png/006611?text=vel', 'vel Mansion', '27904 Labadie Ferry\nNorth Nealmouth, SC 48212-3390', 'Room 335', '682.745.8346', 'nihil', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(27, 'https://via.placeholder.com/640x480.png/00aaff?text=quia', 'quae Mansion', '10814 Kuhic Club\nLavinialand, WA 72898-3976', 'Room 962', '1-435-539-6101', 'amet', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(28, 'https://via.placeholder.com/640x480.png/009955?text=temporibus', 'labore Mansion', '262 Erich Loop Suite 890\nSatterfieldburgh, DC 13510-5463', 'Room 230', '731-906-5840', 'dolor', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(29, 'https://via.placeholder.com/640x480.png/00bbaa?text=et', 'occaecati Mansion', '74607 Agustina Glens Apt. 793\nRanditon, WV 70531-1152', 'Room 135', '573-319-9564', 'deleniti', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(30, 'https://via.placeholder.com/640x480.png/003300?text=nesciunt', 'quam Mansion', '141 Swaniawski Knoll\nBogisichport, MA 08973', 'Room 005', '+1.915.915.8768', 'perspiciatis', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(31, 'https://via.placeholder.com/640x480.png/00cc77?text=qui', 'ab Mansion', '22201 Maida Ford Apt. 252\nKlington, OH 69006', 'Room 932', '628.404.0666', 'corrupti', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(32, 'https://via.placeholder.com/640x480.png/00ffff?text=autem', 'molestiae Mansion', '2420 Toy Manor\nKemmerhaven, CO 78424-8105', 'Room 675', '484.859.6919', 'ab', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(33, 'https://via.placeholder.com/640x480.png/00bbcc?text=vitae', 'in Mansion', '6319 Tyson Mountain\nWest Savanna, ID 20139-0550', 'Room 642', '432.483.8430', 'deserunt', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(34, 'https://via.placeholder.com/640x480.png/006688?text=natus', 'dolor Mansion', '991 Duane Unions Suite 960\nLake Travismouth, IN 11151', 'Room 439', '+1-605-481-1216', 'doloribus', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(35, 'https://via.placeholder.com/640x480.png/005555?text=laborum', 'magni Mansion', '55079 Koepp Crossing Suite 401\nEast Kraigbury, NY 15012-0777', 'Room 758', '(984) 860-5279', 'in', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(36, 'https://via.placeholder.com/640x480.png/002211?text=enim', 'eos Mansion', '41398 Aglae Haven\nWest Asia, MT 28388-0652', 'Room 630', '1-304-442-5060', 'quos', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(37, 'https://via.placeholder.com/640x480.png/007766?text=laboriosam', 'est Mansion', '46519 Feeney Shoals Apt. 590\nAltenwerthhaven, NH 15701-5760', 'Room 640', '1-614-498-3785', 'tempore', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(38, 'https://via.placeholder.com/640x480.png/002233?text=ut', 'consequatur Mansion', '77540 Wanda Flats Apt. 309\nLake Millie, MS 46750-1234', 'Room 600', '(781) 328-6876', 'enim', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(39, 'https://via.placeholder.com/640x480.png/008822?text=eaque', 'deleniti Mansion', '62618 Cody Road\nGulgowskimouth, MO 95694-3305', 'Room 449', '+1-510-994-9779', 'placeat', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(40, 'https://via.placeholder.com/640x480.png/003366?text=omnis', 'perspiciatis Mansion', '260 Connelly Shoals Suite 408\nSouth Mariana, NJ 52649-4777', 'Room 253', '872-904-2046', 'minus', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(41, 'https://via.placeholder.com/640x480.png/00ccdd?text=distinctio', 'delectus Mansion', '80836 Davis Heights\nPort Aricville, MI 36054-7856', 'Room 009', '(657) 345-0454', 'qui', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(42, 'https://via.placeholder.com/640x480.png/00bbdd?text=ratione', 'ex Mansion', '421 Delaney Avenue Suite 127\nPort Donnybury, GA 38985', 'Room 340', '808-917-2619', 'vel', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(43, 'https://via.placeholder.com/640x480.png/007766?text=similique', 'voluptatibus Mansion', '5079 Raegan Square\nSouth Delilah, WI 45809', 'Room 662', '913.828.8184', 'quas', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(44, 'https://via.placeholder.com/640x480.png/00bb77?text=corporis', 'voluptatem Mansion', '4833 Adriana Greens Suite 827\nLake Bernieborough, RI 42112', 'Room 476', '(573) 861-5263', 'sit', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(45, 'https://via.placeholder.com/640x480.png/00aa77?text=sit', 'dicta Mansion', '2936 Rogahn Estates\nJaedenton, LA 05817-9208', 'Room 797', '+1-678-898-0363', 'quod', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(46, 'https://via.placeholder.com/640x480.png/00bbbb?text=autem', 'et Mansion', '276 Sawayn Greens\nSouth Grace, AK 72778', 'Room 008', '+1 (283) 661-9348', 'ipsum', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(47, 'https://via.placeholder.com/640x480.png/00bb44?text=perferendis', 'eaque Mansion', '44622 Crona Locks\nPort Emmitt, WA 24352', 'Room 890', '+1 (539) 673-1066', 'ipsum', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(48, 'https://via.placeholder.com/640x480.png/0033ee?text=repellendus', 'fugiat Mansion', '37369 Fritsch Flat Apt. 815\nLake Noemyville, SC 34720-5386', 'Room 711', '385.467.7103', 'adipisci', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(49, 'https://via.placeholder.com/640x480.png/00bbff?text=rerum', 'qui Mansion', '28521 Ziemann Plaza Apt. 184\nSouth Justinashire, CO 67028', 'Room 331', '+1-316-572-8007', 'consequuntur', '2024-09-08 05:40:15', '2024-09-08 05:40:15'),
(50, 'https://via.placeholder.com/640x480.png/009944?text=autem', 'modi Mansion', '97928 Morton Manors\nBrockstad, TN 08521', 'Room 868', '+1.434.561.5324', 'quae', '2024-09-08 05:40:15', '2024-09-08 05:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `apartment_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_start_month` date NOT NULL,
  `rent` decimal(10,2) NOT NULL,
  `utility_fees` decimal(10,2) DEFAULT NULL,
  `initial_costs` decimal(10,2) DEFAULT NULL,
  `initial_costs_collection_date` date DEFAULT NULL,
  `rent_collection_date` date DEFAULT NULL,
  `utilities_collection_date` date DEFAULT NULL,
  `payment_id` varchar(255) NOT NULL,
  `completed_billing` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `student_id`, `apartment_id`, `package_id`, `payment_method_id`, `billing_start_month`, `rent`, `utility_fees`, `initial_costs`, `initial_costs_collection_date`, `rent_collection_date`, `utilities_collection_date`, `payment_id`, `completed_billing`, `created_at`, `updated_at`) VALUES
(1, 30, 10, 4, 4, '1974-11-06', 142.00, 37.00, NULL, '2002-03-12', '1998-12-03', '2001-05-06', '9fdbadf7-798c-359f-b7f6-fb207b3ccf07', 0, '2024-09-08 05:40:19', '2024-09-08 05:40:19'),
(2, 40, 11, 2, 2, '1984-02-19', 688.00, NULL, NULL, NULL, '2004-09-03', '1980-04-17', 'cb3b07e4-06b6-38ed-8172-0c16bd753979', 1, '2024-09-08 05:40:19', '2024-09-08 05:40:19'),
(3, 7, 8, 3, 3, '2008-06-11', 107.00, NULL, 190.00, '2015-05-29', '2012-02-29', '1989-12-19', '0e88c459-9053-3592-be8c-8b4b6e6a2396', 1, '2024-09-08 05:40:19', '2024-09-08 05:40:19'),
(4, 28, 25, 2, 2, '1998-08-09', 150.00, NULL, 107.00, NULL, '2018-10-05', '2022-08-24', '0ab527d6-d9b9-33bf-9791-5f3f0649537e', 1, '2024-09-08 05:40:19', '2024-09-08 05:40:19'),
(5, 16, 9, 2, 4, '2023-10-19', 971.00, 29.00, 15.00, NULL, '1989-05-06', '2015-09-13', '3aebdd64-fd29-31cf-bcf9-7ed14a745b11', 0, '2024-09-08 05:40:19', '2024-09-08 05:40:19'),
(6, 18, 42, 1, 2, '2021-10-06', 769.00, 54.00, 175.00, NULL, '2013-02-22', '2015-07-13', 'ceede9e0-0406-3711-bb3d-957e27aed2a7', 0, '2024-09-08 05:40:19', '2024-09-08 05:40:19'),
(7, 38, 1, 3, 3, '2020-10-29', 408.00, NULL, NULL, '2000-10-23', '2014-12-20', '1994-04-29', 'f34174e9-9c7c-31cb-bee3-f66a16056911', 1, '2024-09-08 05:40:19', '2024-09-08 05:40:19'),
(8, 7, 45, 3, 3, '2016-08-21', 675.00, 10.00, NULL, '2000-09-19', '1974-06-12', '2001-10-17', '18fc92b1-4da1-3377-a4f4-30eddf8fefa9', 1, '2024-09-08 05:40:19', '2024-09-08 05:40:19'),
(9, 13, 46, 4, 3, '1979-02-24', 399.00, NULL, NULL, NULL, '1983-04-25', '1971-06-17', '1b01c823-c841-31e3-b0cb-375d5f8ab3c8', 0, '2024-09-08 05:40:19', '2024-09-08 05:40:19'),
(10, 50, 18, 1, 1, '1981-03-09', 145.00, NULL, 23.00, NULL, '2014-01-09', '1983-01-29', 'e50d3eaa-6fe8-368a-8584-0f947be81700', 0, '2024-09-08 05:40:20', '2024-09-08 05:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `billing_methods`
--

CREATE TABLE `billing_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_methods`
--

INSERT INTO `billing_methods` (`id`, `method_name`, `created_at`, `updated_at`) VALUES
(1, 'Bank', NULL, NULL),
(2, 'Cash', NULL, NULL),
(3, 'Convenience Store', NULL, NULL),
(4, 'Card', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_08_064157_create_roles_table', 1),
(6, '2024_09_08_073438_create_role_user_table', 1),
(7, '2024_09_08_113147_create_schools_table', 1),
(8, '2024_09_08_122830_create_apartments_table', 1),
(9, '2024_09_08_130404_create_students_table', 1),
(10, '2024_09_08_131721_create_package_chooses_table', 1),
(11, '2024_09_08_133651_create_billing_methods_table', 1),
(12, '2024_09_08_134939_create_billings_table', 1),
(13, '2024_09_08_144418_create_payments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `package_chooses`
--

CREATE TABLE `package_chooses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_chooses`
--

INSERT INTO `package_chooses` (`id`, `package_name`, `description`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Basic Package', 'Includes basic features.', 'Suitable for individuals.', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(2, 'Standard Package', 'Includes standard features.', 'Recommended for small teams.', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(3, 'Premium Package', 'Includes premium features.', 'Suitable for larger organizations.', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(4, 'Enterprise Package', 'Includes all features and support.', 'Best for enterprise-level needs.', '2024-09-08 05:40:16', '2024-09-08 05:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billing_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `billing_id`, `amount`, `payment_method_id`, `payment_id`, `payment_date`, `created_at`, `updated_at`) VALUES
(1, 1, 250.00, 1, 'BANK123', '2024-09-08', NULL, NULL),
(2, 1, 300.00, 2, NULL, '2024-09-08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'inactive', '2024-09-08 05:40:11', '2024-09-08 05:40:11'),
(2, 'manager', 'inactive', '2024-09-08 05:40:11', '2024-09-08 05:40:11'),
(3, 'marketer', 'inactive', '2024-09-08 05:40:11', '2024-09-08 05:40:11'),
(4, 'accountant', 'inactive', '2024-09-08 05:40:11', '2024-09-08 05:40:11'),
(5, 'blogger', 'inactive', '2024-09-08 05:40:11', '2024-09-08 05:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 3, NULL, NULL),
(3, 3, 4, NULL, NULL),
(4, 4, 3, NULL, NULL),
(5, 5, 3, NULL, NULL),
(6, 6, 2, NULL, NULL),
(7, 7, 2, NULL, NULL),
(8, 8, 4, NULL, NULL),
(9, 9, 1, NULL, NULL),
(10, 10, 1, NULL, NULL),
(11, 11, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `prefecture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `image`, `school_name`, `contact`, `address`, `prefecture`, `created_at`, `updated_at`) VALUES
(1, 'https://picsum.photos/200/300?random=571', 'Ernser-Spencer School', '+1 (540) 938-7220', '1034 Wolff Harbors Apt. 691\nPort Shayne, FL 38359', 'Iowa', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(2, 'https://picsum.photos/200/300?random=940', 'Kutch, Boehm and Murray School', '+1 (848) 862-6713', '520 Dejuan Junction Suite 196\nArmstrongton, TX 60894', 'Hawaii', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(3, 'https://picsum.photos/200/300?random=690', 'DuBuque-Kuphal School', '+13302903547', '137 Erwin Plains\nDoylefort, RI 23151', 'West Virginia', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(4, 'https://picsum.photos/200/300?random=871', 'Shields, Ryan and Sipes School', '1-540-760-9567', '24177 Boehm Locks\nNorth Brock, DE 63204-1487', 'Tennessee', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(5, 'https://picsum.photos/200/300?random=241', 'Murazik PLC School', '+1-854-314-0686', '1725 Taylor Mountains\nEast Axel, IA 96646-6136', 'North Carolina', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(6, 'https://picsum.photos/200/300?random=546', 'Mayert-Schumm School', '(661) 532-1589', '6271 Clemens Road Apt. 250\nMartaview, OK 36651-9148', 'New Hampshire', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(7, 'https://picsum.photos/200/300?random=635', 'Ernser, Cartwright and Wuckert School', '+1-442-340-0610', '258 Waelchi Bypass\nTillmanfort, WY 44829-2436', 'Nebraska', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(8, 'https://picsum.photos/200/300?random=197', 'Koch, Sipes and Bosco School', '270-724-0563', '82713 Tessie Bridge Apt. 905\nEast Kristoferton, KS 10642', 'Idaho', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(9, 'https://picsum.photos/200/300?random=957', 'Watsica, Hamill and Moore School', '1-786-742-7265', '262 Gretchen Mount Suite 833\nBeattyshire, KY 60575-8919', 'New York', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(10, 'https://picsum.photos/200/300?random=561', 'Muller-Connelly School', '+1 (985) 441-4570', '842 Herzog Lights Suite 216\nNorth Angelaside, IN 76953-8758', 'South Carolina', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(11, 'https://picsum.photos/200/300?random=805', 'Kreiger-Strosin School', '(781) 996-4337', '242 Jacobi Cove Apt. 480\nBoriston, KS 90664-6535', 'Delaware', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(12, 'https://picsum.photos/200/300?random=258', 'Wehner-Greenfelder School', '+13805089705', '68482 Veda Drive Apt. 189\nVirgilshire, RI 06763-6698', 'Arizona', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(13, 'https://picsum.photos/200/300?random=404', 'Lind, Stark and Jacobi School', '+1 (828) 282-7764', '5737 Ellis Plains Apt. 982\nEast Mohamedside, HI 45101-6545', 'Wyoming', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(14, 'https://picsum.photos/200/300?random=334', 'Lueilwitz, Kub and Gorczany School', '+1-973-344-5117', '3606 Rau Ways Suite 132\nSouth Berneice, AZ 26011', 'District of Columbia', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(15, 'https://picsum.photos/200/300?random=111', 'Wolf-Zieme School', '717-481-9257', '40752 Lehner Junction\nHadleyshire, HI 67186', 'Colorado', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(16, 'https://picsum.photos/200/300?random=79', 'Lynch Group School', '(872) 723-5264', '90527 Conn Way\nLake Caesarmouth, ND 72582', 'Louisiana', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(17, 'https://picsum.photos/200/300?random=675', 'Wyman, Wisozk and Turcotte School', '1-731-623-8086', '921 Huel Estate Apt. 652\nSanfordchester, DE 63059', 'Michigan', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(18, 'https://picsum.photos/200/300?random=552', 'Hane PLC School', '843.221.5662', '621 Kessler Place Suite 575\nVernicestad, NJ 62660', 'Wisconsin', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(19, 'https://picsum.photos/200/300?random=934', 'Gibson and Sons School', '+15035838250', '65689 Kassandra Corners Suite 936\nLake Mikefurt, NJ 74149-4754', 'Hawaii', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(20, 'https://picsum.photos/200/300?random=116', 'Schaden-Effertz School', '+1-260-253-1665', '86609 Schowalter Ferry\nLake Constantintown, KY 38868-1610', 'Michigan', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(21, 'https://picsum.photos/200/300?random=494', 'Hoeger-Haag School', '+1 (872) 541-1478', '796 Wiza Estates\nWiegandtown, LA 18152', 'Nevada', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(22, 'https://picsum.photos/200/300?random=380', 'Kilback, Cormier and Hoppe School', '+1.972.713.5273', '241 Flatley Keys Apt. 506\nChristopherside, HI 31120-5730', 'Maryland', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(23, 'https://picsum.photos/200/300?random=743', 'Swift-Predovic School', '+1-347-340-7827', '5061 Metz Springs Apt. 582\nEast Max, ID 28658', 'Washington', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(24, 'https://picsum.photos/200/300?random=362', 'Gleichner, Brekke and Marks School', '541.986.5658', '423 Kuhlman Square\nPort Douglaschester, OK 87706-1503', 'Rhode Island', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(25, 'https://picsum.photos/200/300?random=380', 'Turner Group School', '352-734-7132', '288 Rachel Views Apt. 216\nHeathcoteport, AR 02136-3748', 'Minnesota', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(26, 'https://picsum.photos/200/300?random=992', 'Cremin-Erdman School', '+1 (928) 957-5531', '577 Soledad Villages Apt. 203\nGrantville, TN 73864', 'Washington', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(27, 'https://picsum.photos/200/300?random=141', 'Walter-Kemmer School', '(570) 847-3814', '26671 Jacobi River Apt. 916\nAgustinborough, VT 99955-3722', 'Iowa', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(28, 'https://picsum.photos/200/300?random=977', 'O\'Kon-Koss School', '+17144787978', '5473 Daphnee River Suite 288\nLake Markmouth, SC 89101-4776', 'Hawaii', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(29, 'https://picsum.photos/200/300?random=286', 'Hodkiewicz-Sipes School', '+1.478.573.2460', '8983 Weber Prairie Suite 128\nLehnermouth, AK 46700', 'Nevada', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(30, 'https://picsum.photos/200/300?random=614', 'Trantow, Huel and Wilkinson School', '570-279-2295', '3611 Wuckert Viaduct\nSouth Serena, OK 95317-0780', 'Florida', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(31, 'https://picsum.photos/200/300?random=182', 'Robel-Schulist School', '+1.614.345.2301', '6937 Daniel Villages\nSouth Horace, AK 27005', 'Oklahoma', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(32, 'https://picsum.photos/200/300?random=881', 'Ryan-Dooley School', '928-838-6314', '58901 Dayana Village Suite 184\nWest Braulio, MA 94859-0162', 'Kentucky', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(33, 'https://picsum.photos/200/300?random=807', 'Schuppe, Kutch and Armstrong School', '+1 (272) 814-0101', '94843 Marks Wall Suite 909\nNew Oliver, MN 82077-5188', 'Iowa', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(34, 'https://picsum.photos/200/300?random=45', 'Wiegand-Padberg School', '+1.651.264.3580', '567 Hahn Burg\nMerrittton, IA 01594-4434', 'Nevada', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(35, 'https://picsum.photos/200/300?random=448', 'O\'Conner, McLaughlin and Powlowski School', '1-707-598-6107', '4468 Sanford Ports\nStoltenbergfurt, AR 79359-6448', 'New Hampshire', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(36, 'https://picsum.photos/200/300?random=817', 'Shields, Beer and Labadie School', '+1 (773) 786-6837', '368 Stefan Fork Suite 770\nCurtismouth, WV 71883', 'New Mexico', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(37, 'https://picsum.photos/200/300?random=307', 'Greenfelder-Altenwerth School', '+1.949.377.2710', '1883 Alessandro Rapid Apt. 857\nLeonoraburgh, OK 88940', 'Kentucky', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(38, 'https://picsum.photos/200/300?random=831', 'Rath Inc School', '678-762-0663', '8526 Wilderman Estates\nJohnsfurt, KY 69354-8427', 'Minnesota', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(39, 'https://picsum.photos/200/300?random=487', 'Erdman-Zulauf School', '225-381-5225', '94741 Carroll Crossroad Apt. 034\nNorth Kaiashire, KS 66556-3943', 'New Mexico', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(40, 'https://picsum.photos/200/300?random=488', 'Reinger, Bartell and Koelpin School', '+1 (470) 643-6467', '662 Aufderhar Inlet\nEmmanuellehaven, WA 28380', 'Delaware', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(41, 'https://picsum.photos/200/300?random=353', 'Homenick PLC School', '1-828-238-4635', '969 Norval Meadow\nPort Urbanmouth, NV 04754', 'Indiana', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(42, 'https://picsum.photos/200/300?random=4', 'Wehner, O\'Hara and Schulist School', '(959) 435-9722', '45580 Swaniawski Spring\nNorth Dave, HI 34863', 'Maryland', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(43, 'https://picsum.photos/200/300?random=604', 'Lang-Dietrich School', '(936) 420-6513', '476 Samson Branch Suite 255\nLake Annie, CA 21628', 'Wisconsin', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(44, 'https://picsum.photos/200/300?random=863', 'Mosciski, Hartmann and Hoeger School', '+1 (520) 613-7536', '71088 Earline Dam\nJulioport, NY 52300', 'Kentucky', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(45, 'https://picsum.photos/200/300?random=318', 'Bogisich-Goldner School', '+1 (774) 692-2893', '117 Jamal Expressway\nNorth Leonardo, MT 07334-0703', 'New Hampshire', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(46, 'https://picsum.photos/200/300?random=649', 'Crist LLC School', '+14304905662', '310 Wallace Pines Apt. 952\nLucasview, OH 12619-8484', 'Delaware', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(47, 'https://picsum.photos/200/300?random=238', 'Ferry-Muller School', '+1-980-282-2897', '749 Bosco Forest\nFriedrichburgh, SC 99066', 'North Carolina', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(48, 'https://picsum.photos/200/300?random=212', 'Hand, Donnelly and Halvorson School', '803-533-0833', '36247 Medhurst Creek Apt. 985\nPort Kiraborough, NJ 07570-8964', 'Hawaii', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(49, 'https://picsum.photos/200/300?random=713', 'Lindgren Group School', '(907) 826-5826', '773 Marquis Dam\nSouth Lavonne, OH 35004-5038', 'Texas', '2024-09-08 05:40:13', '2024-09-08 05:40:13'),
(50, 'https://picsum.photos/200/300?random=117', 'Stokes-Kutch School', '+1-313-224-2465', '38040 McClure Views Suite 844\nHickleport, MT 98642', 'Massachusetts', '2024-09-08 05:40:13', '2024-09-08 05:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `name_katakana` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `contract_date` date DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `student_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `name_katakana`, `nationality`, `school_id`, `contract_date`, `termination_date`, `remarks`, `student_image`, `created_at`, `updated_at`) VALUES
(1, 'Adela Bogan', 'distinctio', 'China', 10, '2009-09-21', '2019-01-16', 'Eos consectetur est numquam ut quo error fugiat.', 'https://picsum.photos/200/300?random=931', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(2, 'Alysa Miller', 'qui', 'United Arab Emirates', 32, '1975-01-28', '2022-03-25', 'Dolorem harum dolor repellat hic molestiae et.', 'https://picsum.photos/200/300?random=314', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(3, 'Jacky Koepp', 'dignissimos', 'Cambodia', 18, '2000-04-08', '2014-07-01', 'Ad fuga aut qui et quas.', 'https://picsum.photos/200/300?random=650', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(4, 'Desmond Paucek', 'ad', 'New Caledonia', 7, '2006-09-21', '1978-03-20', 'Consequuntur esse quaerat necessitatibus aut et dolores.', 'https://picsum.photos/200/300?random=444', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(5, 'Dr. Brody Satterfield', 'corrupti', 'Czech Republic', 11, '2007-07-31', '2022-01-25', 'Qui repellendus corrupti quam molestias.', 'https://picsum.photos/200/300?random=598', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(6, 'Arvid Smith', 'perferendis', 'Turks and Caicos Islands', 34, '1992-09-14', '1974-04-25', 'Quaerat non optio qui id.', 'https://picsum.photos/200/300?random=639', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(7, 'Wendy Morissette', 'eos', 'Ghana', 20, '1992-02-08', '2008-04-14', 'Velit quae quos dolor non et eaque.', 'https://picsum.photos/200/300?random=586', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(8, 'Alvera Nikolaus Jr.', 'similique', 'New Zealand', 37, '2023-05-02', '2022-04-07', 'Omnis totam ipsa et voluptas voluptatibus asperiores.', 'https://picsum.photos/200/300?random=491', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(9, 'Dr. Jace Gusikowski', 'odit', 'Monaco', 41, '2021-02-27', '2000-09-18', 'Placeat aut velit et possimus aut reprehenderit explicabo.', 'https://picsum.photos/200/300?random=461', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(10, 'Lilla Langworth', 'consequuntur', 'Chad', 10, '2005-08-23', '1970-12-03', 'Accusantium inventore rem cupiditate quas ex.', 'https://picsum.photos/200/300?random=761', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(11, 'Karley Gaylord', 'vitae', 'French Polynesia', 17, '2015-03-12', '2003-06-26', 'Sint quasi culpa et est illo minus soluta.', 'https://picsum.photos/200/300?random=674', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(12, 'Jabari Gulgowski', 'sint', 'Azerbaijan', 30, '2007-04-02', '1978-07-15', 'Tempore et delectus nobis nihil harum quae quae eos.', 'https://picsum.photos/200/300?random=936', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(13, 'Dr. Yvette Hoppe PhD', 'consequatur', 'Palau', 40, '2018-07-06', '1991-05-01', 'Amet ea quae enim maxime qui ea enim.', 'https://picsum.photos/200/300?random=625', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(14, 'Kristina D\'Amore', 'reprehenderit', 'Pitcairn Islands', 33, '1999-05-24', '2008-01-19', 'Dicta vel dolorum animi ea vitae.', 'https://picsum.photos/200/300?random=761', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(15, 'Arely Satterfield DDS', 'rerum', 'Micronesia', 5, '1983-09-01', '1981-02-04', 'Eius sint ut illo quaerat ut.', 'https://picsum.photos/200/300?random=713', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(16, 'Dr. Mozell Kozey', 'id', 'Estonia', 33, '1983-08-19', '2005-01-06', 'Quidem nihil dolorem culpa quis tenetur nemo.', 'https://picsum.photos/200/300?random=664', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(17, 'Maurine Daniel', 'est', 'Bolivia', 21, '2005-06-18', '1981-04-26', 'Aut sed cupiditate sit sunt molestiae.', 'https://picsum.photos/200/300?random=990', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(18, 'Treva Rowe', 'similique', 'Taiwan', 37, '2010-09-17', '1988-08-19', 'Error ipsum sint dolor expedita.', 'https://picsum.photos/200/300?random=424', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(19, 'Ms. Dahlia Medhurst', 'soluta', 'Mauritania', 34, '1994-01-12', '2024-04-03', 'Explicabo qui qui quo vero.', 'https://picsum.photos/200/300?random=290', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(20, 'Mr. Daron Schaefer PhD', 'aut', 'Bouvet Island (Bouvetoya)', 7, '2010-08-24', '2004-05-08', 'Porro voluptates provident veniam quae et.', 'https://picsum.photos/200/300?random=236', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(21, 'Dr. Dortha Johns MD', 'nobis', 'Haiti', 32, '2016-08-04', '2010-10-03', 'Dolores velit sed possimus tenetur repudiandae dicta culpa.', 'https://picsum.photos/200/300?random=347', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(22, 'Prof. Eric Shanahan Sr.', 'error', 'Faroe Islands', 50, '2023-07-04', '2016-01-04', 'Saepe labore molestiae similique dolor ratione animi sint.', 'https://picsum.photos/200/300?random=619', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(23, 'Marcia O\'Keefe', 'quis', 'Trinidad and Tobago', 5, '1990-07-07', '1981-02-16', 'Fugiat enim nisi corporis veritatis.', 'https://picsum.photos/200/300?random=699', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(24, 'Ettie Padberg', 'ad', 'Philippines', 33, '2004-08-05', '1995-01-09', 'Facere iste corrupti nihil perspiciatis beatae.', 'https://picsum.photos/200/300?random=860', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(25, 'Miss Lizzie Larkin', 'esse', 'Marshall Islands', 30, '1993-12-27', '2010-08-06', 'Omnis totam aperiam deserunt eos consequatur.', 'https://picsum.photos/200/300?random=572', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(26, 'Prof. Jermain Frami II', 'quibusdam', 'Hong Kong', 36, '2003-04-23', '2014-11-09', 'Minus debitis provident animi et adipisci.', 'https://picsum.photos/200/300?random=478', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(27, 'Mariam Cremin', 'vel', 'Barbados', 10, '2023-03-25', '1999-05-08', 'Odit repellendus quia necessitatibus.', 'https://picsum.photos/200/300?random=708', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(28, 'Rey Nolan', 'iste', 'Greenland', 34, '1990-05-07', '1994-07-13', 'Unde molestiae omnis temporibus quos qui et accusamus.', 'https://picsum.photos/200/300?random=304', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(29, 'Montana Kessler', 'debitis', 'Djibouti', 23, '1983-01-21', '1984-04-02', 'Qui in sit pariatur laudantium.', 'https://picsum.photos/200/300?random=115', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(30, 'Randall Tromp', 'optio', 'Korea', 5, '2001-11-06', '2015-07-03', 'Nisi labore odit eos amet repellat et.', 'https://picsum.photos/200/300?random=713', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(31, 'Prof. Yasmin Nienow', 'et', 'Serbia', 1, '1972-07-31', '1989-04-25', 'Doloremque mollitia est aliquid optio aperiam consequatur.', 'https://picsum.photos/200/300?random=639', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(32, 'Ludwig Howell', 'et', 'Bangladesh', 42, '1990-04-23', '1970-10-25', 'Atque aliquid non deleniti at molestiae omnis.', 'https://picsum.photos/200/300?random=190', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(33, 'Dean Weimann', 'ducimus', 'Brazil', 22, '2011-09-01', '1995-08-16', 'Sed praesentium eum facere incidunt maiores vel aspernatur.', 'https://picsum.photos/200/300?random=944', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(34, 'Wilson Lesch', 'eaque', 'France', 25, '1998-04-28', '1983-07-13', 'Non aut officia accusantium totam necessitatibus saepe cum.', 'https://picsum.photos/200/300?random=98', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(35, 'Anika Flatley', 'eos', 'Spain', 14, '2009-08-22', '1993-09-14', 'Praesentium soluta inventore rerum nostrum iure.', 'https://picsum.photos/200/300?random=397', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(36, 'Liza Collins', 'reprehenderit', 'Algeria', 44, '1976-06-11', '2011-01-29', 'Voluptates quo dicta molestias reprehenderit vel laboriosam.', 'https://picsum.photos/200/300?random=846', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(37, 'Dolores Kassulke', 'voluptas', 'Puerto Rico', 23, '2020-10-13', '2014-12-09', 'Sequi quam veritatis excepturi eaque.', 'https://picsum.photos/200/300?random=104', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(38, 'Freddy Yundt', 'dolor', 'Lesotho', 29, '2015-12-16', '1981-05-10', 'Vel ducimus et veniam cupiditate voluptatem ad et.', 'https://picsum.photos/200/300?random=633', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(39, 'August Mraz', 'voluptas', 'Sweden', 4, '1981-06-06', '1988-07-01', 'Qui eum dignissimos quia maiores optio.', 'https://picsum.photos/200/300?random=93', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(40, 'Effie Pollich', 'labore', 'Oman', 3, '1975-04-03', '1994-05-26', 'Cupiditate officiis consequatur ut fugit officiis repellendus.', 'https://picsum.photos/200/300?random=600', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(41, 'Julian Abshire', 'amet', 'Sao Tome and Principe', 19, '2009-01-11', '2010-02-04', 'Fuga voluptatem hic harum assumenda.', 'https://picsum.photos/200/300?random=858', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(42, 'Carmelo Stokes III', 'nobis', 'Kiribati', 49, '2002-09-15', '1985-08-11', 'Quam ea occaecati sit asperiores tempore.', 'https://picsum.photos/200/300?random=53', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(43, 'Verner Anderson', 'qui', 'Kiribati', 22, '1977-03-12', '1989-04-14', 'Officiis explicabo aut unde culpa cum.', 'https://picsum.photos/200/300?random=419', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(44, 'Cicero Eichmann', 'pariatur', 'Bulgaria', 24, '1989-12-18', '1981-07-12', 'Ut non est assumenda quia et.', 'https://picsum.photos/200/300?random=217', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(45, 'Fleta Upton', 'et', 'Albania', 42, '1981-02-16', '1981-07-02', 'Soluta sint sint quia natus nulla.', 'https://picsum.photos/200/300?random=108', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(46, 'Ethelyn Fritsch', 'sunt', 'Taiwan', 32, '2000-08-13', '2022-09-10', 'Ea repellendus tempore totam reiciendis aspernatur autem.', 'https://picsum.photos/200/300?random=626', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(47, 'Dr. Elise Ankunding PhD', 'hic', 'Lebanon', 7, '2003-05-14', '1985-09-25', 'Velit quis itaque doloribus sed aliquam aliquam.', 'https://picsum.photos/200/300?random=620', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(48, 'Ms. Rebeca Gorczany', 'est', 'French Guiana', 47, '1980-07-30', '1991-03-26', 'Molestias possimus et libero corporis unde fugiat.', 'https://picsum.photos/200/300?random=807', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(49, 'Leatha Windler II', 'praesentium', 'Solomon Islands', 14, '2015-02-01', '1985-10-18', 'Voluptatem dignissimos sapiente adipisci non repellendus ut.', 'https://picsum.photos/200/300?random=991', '2024-09-08 05:40:16', '2024-09-08 05:40:16'),
(50, 'Audie Erdman V', 'vel', 'Sweden', 24, '1989-03-07', '1984-07-29', 'Qui aut aut eum.', 'https://picsum.photos/200/300?random=593', '2024-09-08 05:40:16', '2024-09-08 05:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@gmail.com', '2024-09-08 05:40:11', '$2y$12$yShifMNNkZJVhKK3K7MRsOWxjw9.rmGcUxoJvMnKXw.UyJR1a7/Wa', 'S8UMFlHByI', '2024-09-08 05:40:11', '2024-09-08 05:40:11'),
(2, 'Roger Olson III', 'laverna98@example.net', '2024-09-08 05:40:12', '$2y$12$/iTjKMBoN3ruVMmfhB7llO5v5l84W0V85Rp.16wTNM5.FljcdY0/u', 'CruJ1selAf', '2024-09-08 05:40:12', '2024-09-08 05:40:12'),
(3, 'Maud Brakus', 'nader.josefina@example.com', '2024-09-08 05:40:12', '$2y$12$/iTjKMBoN3ruVMmfhB7llO5v5l84W0V85Rp.16wTNM5.FljcdY0/u', '21By5kLLzY', '2024-09-08 05:40:12', '2024-09-08 05:40:12'),
(4, 'Prof. Providenci Christiansen', 'kayleigh.langworth@example.net', '2024-09-08 05:40:12', '$2y$12$/iTjKMBoN3ruVMmfhB7llO5v5l84W0V85Rp.16wTNM5.FljcdY0/u', '4Vhq3Mcce6', '2024-09-08 05:40:12', '2024-09-08 05:40:12'),
(5, 'Connor Huels', 'breichel@example.com', '2024-09-08 05:40:12', '$2y$12$/iTjKMBoN3ruVMmfhB7llO5v5l84W0V85Rp.16wTNM5.FljcdY0/u', 'd05NOUgLLb', '2024-09-08 05:40:12', '2024-09-08 05:40:12'),
(6, 'Ms. Eloise Zemlak', 'bryana42@example.com', '2024-09-08 05:40:12', '$2y$12$/iTjKMBoN3ruVMmfhB7llO5v5l84W0V85Rp.16wTNM5.FljcdY0/u', '1SWc4DjG5G', '2024-09-08 05:40:12', '2024-09-08 05:40:12'),
(7, 'Miss Lou Lynch', 'doyle.grant@example.net', '2024-09-08 05:40:12', '$2y$12$/iTjKMBoN3ruVMmfhB7llO5v5l84W0V85Rp.16wTNM5.FljcdY0/u', 'XTEtkwVwPy', '2024-09-08 05:40:12', '2024-09-08 05:40:12'),
(8, 'Kristoffer Blick', 'considine.dianna@example.org', '2024-09-08 05:40:12', '$2y$12$/iTjKMBoN3ruVMmfhB7llO5v5l84W0V85Rp.16wTNM5.FljcdY0/u', '7zwc4HNPqc', '2024-09-08 05:40:12', '2024-09-08 05:40:12'),
(9, 'Prof. Malvina Wilkinson Jr.', 'fschmeler@example.org', '2024-09-08 05:40:12', '$2y$12$/iTjKMBoN3ruVMmfhB7llO5v5l84W0V85Rp.16wTNM5.FljcdY0/u', 'nuIzlSoBq1', '2024-09-08 05:40:12', '2024-09-08 05:40:12'),
(10, 'Tina Kiehn DDS', 'emayert@example.org', '2024-09-08 05:40:12', '$2y$12$/iTjKMBoN3ruVMmfhB7llO5v5l84W0V85Rp.16wTNM5.FljcdY0/u', 'owSSKgN9WE', '2024-09-08 05:40:12', '2024-09-08 05:40:12'),
(11, 'Helmer Bergstrom', 'mclaughlin.mable@example.org', '2024-09-08 05:40:12', '$2y$12$/iTjKMBoN3ruVMmfhB7llO5v5l84W0V85Rp.16wTNM5.FljcdY0/u', 'z1ezMxa2gN', '2024-09-08 05:40:12', '2024-09-08 05:40:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billings_student_id_foreign` (`student_id`),
  ADD KEY `billings_apartment_id_foreign` (`apartment_id`),
  ADD KEY `billings_package_id_foreign` (`package_id`),
  ADD KEY `billings_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `billing_methods`
--
ALTER TABLE `billing_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_chooses`
--
ALTER TABLE `package_chooses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_billing_id_foreign` (`billing_id`),
  ADD KEY `payments_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_school_id_foreign` (`school_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `billing_methods`
--
ALTER TABLE `billing_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `package_chooses`
--
ALTER TABLE `package_chooses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`),
  ADD CONSTRAINT `billings_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `package_chooses` (`id`),
  ADD CONSTRAINT `billings_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `billing_methods` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `billings_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_billing_id_foreign` FOREIGN KEY (`billing_id`) REFERENCES `billings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `billing_methods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
