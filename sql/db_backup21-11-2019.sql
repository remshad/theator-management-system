-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 02:14 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theatre`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(10) NOT NULL,
  `b_booked_time` int(10) NOT NULL,
  `b_booked_seats` int(11) NOT NULL,
  `movsh_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_visit_date` int(11) NOT NULL,
  `b_status` int(11) NOT NULL,
  `b_conv_charge` int(11) NOT NULL,
  `scrd_class_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(4, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `state_id`) VALUES
(1, 'North and Middle Andaman', 32),
(2, 'South Andaman', 32),
(3, 'Nicobar', 32),
(4, 'Adilabad', 1),
(5, 'Anantapur', 1),
(6, 'Chittoor', 1),
(7, 'East Godavari', 1),
(8, 'Guntur', 1),
(9, 'Hyderabad', 1),
(10, 'Kadapa', 1),
(11, 'Karimnagar', 1),
(12, 'Khammam', 1),
(13, 'Krishna', 1),
(14, 'Kurnool', 1),
(15, 'Mahbubnagar', 1),
(16, 'Medak', 1),
(17, 'Nalgonda', 1),
(18, 'Nellore', 1),
(19, 'Nizamabad', 1),
(20, 'Prakasam', 1),
(21, 'Rangareddi', 1),
(22, 'Srikakulam', 1),
(23, 'Vishakhapatnam', 1),
(24, 'Vizianagaram', 1),
(25, 'Warangal', 1),
(26, 'West Godavari', 1),
(27, 'Anjaw', 3),
(28, 'Changlang', 3),
(29, 'East Kameng', 3),
(30, 'Lohit', 3),
(31, 'Lower Subansiri', 3),
(32, 'Papum Pare', 3),
(33, 'Tirap', 3),
(34, 'Dibang Valley', 3),
(35, 'Upper Subansiri', 3),
(36, 'West Kameng', 3),
(37, 'Barpeta', 2),
(38, 'Bongaigaon', 2),
(39, 'Cachar', 2),
(40, 'Darrang', 2),
(41, 'Dhemaji', 2),
(42, 'Dhubri', 2),
(43, 'Dibrugarh', 2),
(44, 'Goalpara', 2),
(45, 'Golaghat', 2),
(46, 'Hailakandi', 2),
(47, 'Jorhat', 2),
(48, 'Karbi Anglong', 2),
(49, 'Karimganj', 2),
(50, 'Kokrajhar', 2),
(51, 'Lakhimpur', 2),
(52, 'Marigaon', 2),
(53, 'Nagaon', 2),
(54, 'Nalbari', 2),
(55, 'North Cachar Hills', 2),
(56, 'Sibsagar', 2),
(57, 'Sonitpur', 2),
(58, 'Tinsukia', 2),
(59, 'Araria', 4),
(60, 'Aurangabad', 4),
(61, 'Banka', 4),
(62, 'Begusarai', 4),
(63, 'Bhagalpur', 4),
(64, 'Bhojpur', 4),
(65, 'Buxar', 4),
(66, 'Darbhanga', 4),
(67, 'Purba Champaran', 4),
(68, 'Gaya', 4),
(69, 'Gopalganj', 4),
(70, 'Jamui', 4),
(71, 'Jehanabad', 4),
(72, 'Khagaria', 4),
(73, 'Kishanganj', 4),
(74, 'Kaimur', 4),
(75, 'Katihar', 4),
(76, 'Lakhisarai', 4),
(77, 'Madhubani', 4),
(78, 'Munger', 4),
(79, 'Madhepura', 4),
(80, 'Muzaffarpur', 4),
(81, 'Nalanda', 4),
(82, 'Nawada', 4),
(83, 'Patna', 4),
(84, 'Purnia', 4),
(85, 'Rohtas', 4),
(86, 'Saharsa', 4),
(87, 'Samastipur', 4),
(88, 'Sheohar', 4),
(89, 'Sheikhpura', 4),
(90, 'Saran', 4),
(91, 'Sitamarhi', 4),
(92, 'Supaul', 4),
(93, 'Siwan', 4),
(94, 'Vaishali', 4),
(95, 'Pashchim Champaran', 4),
(96, 'Bastar', 35),
(97, 'Bilaspur', 35),
(98, 'Dantewada', 35),
(99, 'Dhamtari', 35),
(100, 'Durg', 35),
(101, 'Jashpur', 35),
(102, 'Janjgir-Champa', 35),
(103, 'Korba', 35),
(104, 'Koriya', 35),
(105, 'Kanker', 35),
(106, 'Kawardha', 35),
(107, 'Mahasamund', 35),
(108, 'Raigarh', 35),
(109, 'Rajnandgaon', 35),
(110, 'Raipur', 35),
(111, 'Surguja', 35),
(112, 'Diu', 29),
(113, 'Daman', 29),
(114, 'Central Delhi', 25),
(115, 'East Delhi', 25),
(116, 'New Delhi', 25),
(117, 'North Delhi', 25),
(118, 'North East Delhi', 25),
(119, 'North West Delhi', 25),
(120, 'South Delhi', 25),
(121, 'South West Delhi', 25),
(122, 'West Delhi', 25),
(123, 'North Goa', 26),
(124, 'South Goa', 26),
(125, 'Ahmedabad', 5),
(126, 'Amreli District', 5),
(127, 'Anand', 5),
(128, 'Banaskantha', 5),
(129, 'Bharuch', 5),
(130, 'Bhavnagar', 5),
(131, 'Dahod', 5),
(132, 'The Dangs', 5),
(133, 'Gandhinagar', 5),
(134, 'Jamnagar', 5),
(135, 'Junagadh', 5),
(136, 'Kutch', 5),
(137, 'Kheda', 5),
(138, 'Mehsana', 5),
(139, 'Narmada', 5),
(140, 'Navsari', 5),
(141, 'Patan', 5),
(142, 'Panchmahal', 5),
(143, 'Porbandar', 5),
(144, 'Rajkot', 5),
(145, 'Sabarkantha', 5),
(146, 'Surendranagar', 5),
(147, 'Surat', 5),
(148, 'Vadodara', 5),
(149, 'Valsad', 5),
(150, 'Ambala', 6),
(151, 'Bhiwani', 6),
(152, 'Faridabad', 6),
(153, 'Fatehabad', 6),
(154, 'Gurgaon', 6),
(155, 'Hissar', 6),
(156, 'Jhajjar', 6),
(157, 'Jind', 6),
(158, 'Karnal', 6),
(159, 'Kaithal', 6),
(160, 'Kurukshetra', 6),
(161, 'Mahendragarh', 6),
(162, 'Mewat', 6),
(163, 'Panchkula', 6),
(164, 'Panipat', 6),
(165, 'Rewari', 6),
(166, 'Rohtak', 6),
(167, 'Sirsa', 6),
(168, 'Sonepat', 6),
(169, 'Yamuna Nagar', 6),
(170, 'Palwal', 6),
(171, 'Bilaspur', 7),
(172, 'Chamba', 7),
(173, 'Hamirpur', 7),
(174, 'Kangra', 7),
(175, 'Kinnaur', 7),
(176, 'Kulu', 7),
(177, 'Lahaul and Spiti', 7),
(178, 'Mandi', 7),
(179, 'Shimla', 7),
(180, 'Sirmaur', 7),
(181, 'Solan', 7),
(182, 'Una', 7),
(183, 'Anantnag', 8),
(184, 'Badgam', 8),
(185, 'Bandipore', 8),
(186, 'Baramula', 8),
(187, 'Doda', 8),
(188, 'Jammu', 8),
(189, 'Kargil', 8),
(190, 'Kathua', 8),
(191, 'Kupwara', 8),
(192, 'Leh', 8),
(193, 'Poonch', 8),
(194, 'Pulwama', 8),
(195, 'Rajauri', 8),
(196, 'Srinagar', 8),
(197, 'Samba', 8),
(198, 'Udhampur', 8),
(199, 'Bokaro', 34),
(200, 'Chatra', 34),
(201, 'Deoghar', 34),
(202, 'Dhanbad', 34),
(203, 'Dumka', 34),
(204, 'Purba Singhbhum', 34),
(205, 'Garhwa', 34),
(206, 'Giridih', 34),
(207, 'Godda', 34),
(208, 'Gumla', 34),
(209, 'Hazaribagh', 34),
(210, 'Koderma', 34),
(211, 'Lohardaga', 34),
(212, 'Pakur', 34),
(213, 'Palamu', 34),
(214, 'Ranchi', 34),
(215, 'Sahibganj', 34),
(216, 'Seraikela and Kharsawan', 34),
(217, 'Pashchim Singhbhum', 34),
(218, 'Ramgarh', 34),
(219, 'Bidar', 9),
(220, 'Belgaum', 9),
(221, 'Bijapur', 9),
(222, 'Bagalkot', 9),
(223, 'Bellary', 9),
(224, 'Bangalore Rural District', 9),
(225, 'Bangalore Urban District', 9),
(226, 'Chamarajnagar', 9),
(227, 'Chikmagalur', 9),
(228, 'Chitradurga', 9),
(229, 'Davanagere', 9),
(230, 'Dharwad', 9),
(231, 'Dakshina Kannada', 9),
(232, 'Gadag', 9),
(233, 'Gulbarga', 9),
(234, 'Hassan', 9),
(235, 'Haveri District', 9),
(236, 'Kodagu', 9),
(237, 'Kolar', 9),
(238, 'Koppal', 9),
(239, 'Mandya', 9),
(240, 'Mysore', 9),
(241, 'Raichur', 9),
(242, 'Shimoga', 9),
(243, 'Tumkur', 9),
(244, 'Udupi', 9),
(245, 'Uttara Kannada', 9),
(246, 'Ramanagara', 9),
(247, 'Chikballapur', 9),
(248, 'Yadagiri', 9),
(249, 'Alappuzha', 10),
(250, 'Ernakulam', 10),
(251, 'Idukki', 10),
(252, 'Kollam', 10),
(253, 'Kannur', 10),
(254, 'Kasaragod', 10),
(255, 'Kottayam', 10),
(256, 'Kozhikode', 10),
(257, 'Malappuram', 10),
(258, 'Palakkad', 10),
(259, 'Pathanamthitta', 10),
(260, 'Thrissur', 10),
(261, 'Thiruvananthapuram', 10),
(262, 'Wayanad', 10),
(263, 'Alirajpur', 11),
(264, 'Anuppur', 11),
(265, 'Ashok Nagar', 11),
(266, 'Balaghat', 11),
(267, 'Barwani', 11),
(268, 'Betul', 11),
(269, 'Bhind', 11),
(270, 'Bhopal', 11),
(271, 'Burhanpur', 11),
(272, 'Chhatarpur', 11),
(273, 'Chhindwara', 11),
(274, 'Damoh', 11),
(275, 'Datia', 11),
(276, 'Dewas', 11),
(277, 'Dhar', 11),
(278, 'Dindori', 11),
(279, 'Guna', 11),
(280, 'Gwalior', 11),
(281, 'Harda', 11),
(282, 'Hoshangabad', 11),
(283, 'Indore', 11),
(284, 'Jabalpur', 11),
(285, 'Jhabua', 11),
(286, 'Katni', 11),
(287, 'Khandwa', 11),
(288, 'Khargone', 11),
(289, 'Mandla', 11),
(290, 'Mandsaur', 11),
(291, 'Morena', 11),
(292, 'Narsinghpur', 11),
(293, 'Neemuch', 11),
(294, 'Panna', 11),
(295, 'Rewa', 11),
(296, 'Rajgarh', 11),
(297, 'Ratlam', 11),
(298, 'Raisen', 11),
(299, 'Sagar', 11),
(300, 'Satna', 11),
(301, 'Sehore', 11),
(302, 'Seoni', 11),
(303, 'Shahdol', 11),
(304, 'Shajapur', 11),
(305, 'Sheopur', 11),
(306, 'Shivpuri', 11),
(307, 'Sidhi', 11),
(308, 'Singrauli', 11),
(309, 'Tikamgarh', 11),
(310, 'Ujjain', 11),
(311, 'Umaria', 11),
(312, 'Vidisha', 11),
(313, 'Ahmednagar', 12),
(314, 'Akola', 12),
(315, 'Amrawati', 12),
(316, 'Aurangabad', 12),
(317, 'Bhandara', 12),
(318, 'Beed', 12),
(319, 'Buldhana', 12),
(320, 'Chandrapur', 12),
(321, 'Dhule', 12),
(322, 'Gadchiroli', 12),
(323, 'Gondiya', 12),
(324, 'Hingoli', 12),
(325, 'Jalgaon', 12),
(326, 'Jalna', 12),
(327, 'Kolhapur', 12),
(328, 'Latur', 12),
(329, 'Mumbai City', 12),
(330, 'Mumbai suburban', 12),
(331, 'Nandurbar', 12),
(332, 'Nanded', 12),
(333, 'Nagpur', 12),
(334, 'Nashik', 12),
(335, 'Osmanabad', 12),
(336, 'Parbhani', 12),
(337, 'Pune', 12),
(338, 'Raigad', 12),
(339, 'Ratnagiri', 12),
(340, 'Sindhudurg', 12),
(341, 'Sangli', 12),
(342, 'Solapur', 12),
(343, 'Satara', 12),
(344, 'Thane', 12),
(345, 'Wardha', 12),
(346, 'Washim', 12),
(347, 'Yavatmal', 12),
(348, 'Bishnupur', 13),
(349, 'Churachandpur', 13),
(350, 'Chandel', 13),
(351, 'Imphal East', 13),
(352, 'Senapati', 13),
(353, 'Tamenglong', 13),
(354, 'Thoubal', 13),
(355, 'Ukhrul', 13),
(356, 'Imphal West', 13),
(357, 'East Garo Hills', 14),
(358, 'East Khasi Hills', 14),
(359, 'Jaintia Hills', 14),
(360, 'Ri-Bhoi', 14),
(361, 'South Garo Hills', 14),
(362, 'West Garo Hills', 14),
(363, 'West Khasi Hills', 14),
(364, 'Aizawl', 15),
(365, 'Champhai', 15),
(366, 'Kolasib', 15),
(367, 'Lawngtlai', 15),
(368, 'Lunglei', 15),
(369, 'Mamit', 15),
(370, 'Saiha', 15),
(371, 'Serchhip', 15),
(372, 'Dimapur', 16),
(373, 'Kohima', 16),
(374, 'Mokokchung', 16),
(375, 'Mon', 16),
(376, 'Phek', 16),
(377, 'Tuensang', 16),
(378, 'Wokha', 16),
(379, 'Zunheboto', 16),
(380, 'Angul', 17),
(381, 'Boudh', 17),
(382, 'Bhadrak', 17),
(383, 'Bolangir', 17),
(384, 'Bargarh', 17),
(385, 'Baleswar', 17),
(386, 'Cuttack', 17),
(387, 'Debagarh', 17),
(388, 'Dhenkanal', 17),
(389, 'Ganjam', 17),
(390, 'Gajapati', 17),
(391, 'Jharsuguda', 17),
(392, 'Jajapur', 17),
(393, 'Jagatsinghpur', 17),
(394, 'Khordha', 17),
(395, 'Kendujhar', 17),
(396, 'Kalahandi', 17),
(397, 'Kandhamal', 17),
(398, 'Koraput', 17),
(399, 'Kendrapara', 17),
(400, 'Malkangiri', 17),
(401, 'Mayurbhanj', 17),
(402, 'Nabarangpur', 17),
(403, 'Nuapada', 17),
(404, 'Nayagarh', 17),
(405, 'Puri', 17),
(406, 'Rayagada', 17),
(407, 'Sambalpur', 17),
(408, 'Subarnapur', 17),
(409, 'Sundargarh', 17),
(410, 'Karaikal', 27),
(411, 'Mahe', 27),
(412, 'Puducherry', 27),
(413, 'Yanam', 27),
(414, 'Amritsar', 18),
(415, 'Bathinda', 18),
(416, 'Firozpur', 18),
(417, 'Faridkot', 18),
(418, 'Fatehgarh Sahib', 18),
(419, 'Gurdaspur', 18),
(420, 'Hoshiarpur', 18),
(421, 'Jalandhar', 18),
(422, 'Kapurthala', 18),
(423, 'Ludhiana', 18),
(424, 'Mansa', 18),
(425, 'Moga', 18),
(426, 'Mukatsar', 18),
(427, 'Nawan Shehar', 18),
(428, 'Patiala', 18),
(429, 'Rupnagar', 18),
(430, 'Sangrur', 18),
(431, 'Ajmer', 19),
(432, 'Alwar', 19),
(433, 'Bikaner', 19),
(434, 'Barmer', 19),
(435, 'Banswara', 19),
(436, 'Bharatpur', 19),
(437, 'Baran', 19),
(438, 'Bundi', 19),
(439, 'Bhilwara', 19),
(440, 'Churu', 19),
(441, 'Chittorgarh', 19),
(442, 'Dausa', 19),
(443, 'Dholpur', 19),
(444, 'Dungapur', 19),
(445, 'Ganganagar', 19),
(446, 'Hanumangarh', 19),
(447, 'Juhnjhunun', 19),
(448, 'Jalore', 19),
(449, 'Jodhpur', 19),
(450, 'Jaipur', 19),
(451, 'Jaisalmer', 19),
(452, 'Jhalawar', 19),
(453, 'Karauli', 19),
(454, 'Kota', 19),
(455, 'Nagaur', 19),
(456, 'Pali', 19),
(457, 'Pratapgarh', 19),
(458, 'Rajsamand', 19),
(459, 'Sikar', 19),
(460, 'Sawai Madhopur', 19),
(461, 'Sirohi', 19),
(462, 'Tonk', 19),
(463, 'Udaipur', 19),
(464, 'East Sikkim', 20),
(465, 'North Sikkim', 20),
(466, 'South Sikkim', 20),
(467, 'West Sikkim', 20),
(468, 'Ariyalur', 21),
(469, 'Chennai', 21),
(470, 'Coimbatore', 21),
(471, 'Cuddalore', 21),
(472, 'Dharmapuri', 21),
(473, 'Dindigul', 21),
(474, 'Erode', 21),
(475, 'Kanchipuram', 21),
(476, 'Kanyakumari', 21),
(477, 'Karur', 21),
(478, 'Madurai', 21),
(479, 'Nagapattinam', 21),
(480, 'The Nilgiris', 21),
(481, 'Namakkal', 21),
(482, 'Perambalur', 21),
(483, 'Pudukkottai', 21),
(484, 'Ramanathapuram', 21),
(485, 'Salem', 21),
(486, 'Sivagangai', 21),
(487, 'Tiruppur', 21),
(488, 'Tiruchirappalli', 21),
(489, 'Theni', 21),
(490, 'Tirunelveli', 21),
(491, 'Thanjavur', 21),
(492, 'Thoothukudi', 21),
(493, 'Thiruvallur', 21),
(494, 'Thiruvarur', 21),
(495, 'Tiruvannamalai', 21),
(496, 'Vellore', 21),
(497, 'Villupuram', 21),
(498, 'Dhalai', 22),
(499, 'North Tripura', 22),
(500, 'South Tripura', 22),
(501, 'West Tripura', 22),
(502, 'Almora', 33),
(503, 'Bageshwar', 33),
(504, 'Chamoli', 33),
(505, 'Champawat', 33),
(506, 'Dehradun', 33),
(507, 'Haridwar', 33),
(508, 'Nainital', 33),
(509, 'Pauri Garhwal', 33),
(510, 'Pithoragharh', 33),
(511, 'Rudraprayag', 33),
(512, 'Tehri Garhwal', 33),
(513, 'Udham Singh Nagar', 33),
(514, 'Uttarkashi', 33),
(515, 'Agra', 23),
(516, 'Allahabad', 23),
(517, 'Aligarh', 23),
(518, 'Ambedkar Nagar', 23),
(519, 'Auraiya', 23),
(520, 'Azamgarh', 23),
(521, 'Barabanki', 23),
(522, 'Badaun', 23),
(523, 'Bagpat', 23),
(524, 'Bahraich', 23),
(525, 'Bijnor', 23),
(526, 'Ballia', 23),
(527, 'Banda', 23),
(528, 'Balrampur', 23),
(529, 'Bareilly', 23),
(530, 'Basti', 23),
(531, 'Bulandshahr', 23),
(532, 'Chandauli', 23),
(533, 'Chitrakoot', 23),
(534, 'Deoria', 23),
(535, 'Etah', 23),
(536, 'Kanshiram Nagar', 23),
(537, 'Etawah', 23),
(538, 'Firozabad', 23),
(539, 'Farrukhabad', 23),
(540, 'Fatehpur', 23),
(541, 'Faizabad', 23),
(542, 'Gautam Buddha Nagar', 23),
(543, 'Gonda', 23),
(544, 'Ghazipur', 23),
(545, 'Gorkakhpur', 23),
(546, 'Ghaziabad', 23),
(547, 'Hamirpur', 23),
(548, 'Hardoi', 23),
(549, 'Mahamaya Nagar', 23),
(550, 'Jhansi', 23),
(551, 'Jalaun', 23),
(552, 'Jyotiba Phule Nagar', 23),
(553, 'Jaunpur District', 23),
(554, 'Kanpur Dehat', 23),
(555, 'Kannauj', 23),
(556, 'Kanpur Nagar', 23),
(557, 'Kaushambi', 23),
(558, 'Kushinagar', 23),
(559, 'Lalitpur', 23),
(560, 'Lakhimpur Kheri', 23),
(561, 'Lucknow', 23),
(562, 'Mau', 23),
(563, 'Meerut', 23),
(564, 'Maharajganj', 23),
(565, 'Mahoba', 23),
(566, 'Mirzapur', 23),
(567, 'Moradabad', 23),
(568, 'Mainpuri', 23),
(569, 'Mathura', 23),
(570, 'Muzaffarnagar', 23),
(571, 'Pilibhit', 23),
(572, 'Pratapgarh', 23),
(573, 'Rampur', 23),
(574, 'Rae Bareli', 23),
(575, 'Saharanpur', 23),
(576, 'Sitapur', 23),
(577, 'Shahjahanpur', 23),
(578, 'Sant Kabir Nagar', 23),
(579, 'Siddharthnagar', 23),
(580, 'Sonbhadra', 23),
(581, 'Sant Ravidas Nagar', 23),
(582, 'Sultanpur', 23),
(583, 'Shravasti', 23),
(584, 'Unnao', 23),
(585, 'Varanasi', 23),
(586, 'Birbhum', 24),
(587, 'Bankura', 24),
(588, 'Bardhaman', 24),
(589, 'Darjeeling', 24),
(590, 'Dakshin Dinajpur', 24),
(591, 'Hooghly', 24),
(592, 'Howrah', 24),
(593, 'Jalpaiguri', 24),
(594, 'Cooch Behar', 24),
(595, 'Kolkata', 24),
(596, 'Malda', 24),
(597, 'Midnapore', 24),
(598, 'Murshidabad', 24),
(599, 'Nadia', 24),
(600, 'North 24 Parganas', 24),
(601, 'South 24 Parganas', 24),
(602, 'Purulia', 24),
(603, 'Uttar Dinajpur', 24);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `lang_id` int(11) NOT NULL,
  `language` varchar(250) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`lang_id`, `language`) VALUES
(1, 'english');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mov_id` int(11) NOT NULL,
  `mov_name` varchar(250) NOT NULL,
  `lang_id` int(50) DEFAULT NULL,
  `mov_img_path` varchar(250) DEFAULT NULL,
  `mov_duration` int(11) NOT NULL,
  `mov_description` text NOT NULL,
  `mov_youtube_link` varchar(250) NOT NULL,
  `mov_released` int(11) NOT NULL,
  `mov_direction` varchar(250) NOT NULL,
  `mov_starring` text NOT NULL,
  `mov_production` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mov_id`, `mov_name`, `lang_id`, `mov_img_path`, `mov_duration`, `mov_description`, `mov_youtube_link`, `mov_released`, `mov_direction`, `mov_starring`, `mov_production`) VALUES
(1, 'Action', 1, 'https://upload.wikimedia.org/wikipedia/en/a/a4/Action_Tamil_Film.jpg', 120, 'Colonel Subhash (Vishal Krishna) and Diya (Tamannaah), who are Indian army officers, are on a mission to catch a mastermind behind a terror attack that took away Subhash\'s brother (Ramki) and his love interest (Aishwarya Lekshmi)', 'https://www.youtube.com/watch?v=74FI1-yNOOg', 1574066207, 'Sundar C', 'Vishal,Tamannaah,Aishwarya Lekshmi', 'R. Ravindran');

-- --------------------------------------------------------

--
-- Table structure for table `movie_category`
--

CREATE TABLE `movie_category` (
  `movcat_id` int(11) NOT NULL,
  `mov_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `movie_category`
--

INSERT INTO `movie_category` (`movcat_id`, `mov_id`, `cat_id`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `movie_show`
--

CREATE TABLE `movie_show` (
  `movsh_id` int(11) NOT NULL,
  `mov_id` int(11) NOT NULL,
  `movsh_start_date` int(11) NOT NULL,
  `movsh_end_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rat_id` int(10) NOT NULL,
  `mov_id` int(100) DEFAULT NULL,
  `rat_rating` int(10) DEFAULT NULL,
  `u_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rat_id`, `mov_id`, `rat_rating`, `u_id`) VALUES
(1, 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `scr_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `scr_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `scr_added_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`scr_id`, `t_id`, `scr_name`, `scr_added_date`) VALUES
(1, 1, 'Aswathi', 1574066207);

-- --------------------------------------------------------

--
-- Table structure for table `screen_details`
--

CREATE TABLE `screen_details` (
  `scrd_id` int(11) NOT NULL,
  `scr_id` int(11) NOT NULL,
  `scrd_class_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `scrd_price` float NOT NULL,
  `scrd_seat_avail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `screen_details`
--

INSERT INTO `screen_details` (`scrd_id`, `scr_id`, `scrd_class_name`, `scrd_price`, `scrd_seat_avail`) VALUES
(1, 1, 'platnum', 100, 250),
(2, 1, 'diamond', 200, 150);

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

CREATE TABLE `show_time` (
  `showt_id` int(11) NOT NULL,
  `scr_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `movsh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'ANDHRA PRADESH'),
(2, 'ASSAM'),
(3, 'ARUNACHAL PRADESH'),
(4, 'BIHAR'),
(5, 'GUJRAT'),
(6, 'HARYANA'),
(7, 'HIMACHAL PRADESH'),
(8, 'JAMMU & KASHMIR'),
(9, 'KARNATAKA'),
(10, 'KERALA'),
(11, 'MADHYA PRADESH'),
(12, 'MAHARASHTRA'),
(13, 'MANIPUR'),
(14, 'MEGHALAYA'),
(15, 'MIZORAM'),
(16, 'NAGALAND'),
(17, 'ORISSA'),
(18, 'PUNJAB'),
(19, 'RAJASTHAN'),
(20, 'SIKKIM'),
(21, 'TAMIL NADU'),
(22, 'TRIPURA'),
(23, 'UTTAR PRADESH'),
(24, 'WEST BENGAL'),
(25, 'DELHI'),
(26, 'GOA'),
(27, 'PONDICHERY'),
(28, 'LAKSHDWEEP'),
(29, 'DAMAN & DIU'),
(30, 'DADRA & NAGAR'),
(31, 'CHANDIGARH'),
(32, 'ANDAMAN & NICOBAR'),
(33, 'UTTARANCHAL'),
(34, 'JHARKHAND'),
(35, 'CHHATTISGARH');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `t_id` int(10) NOT NULL,
  `t_theatrename` varchar(100) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `t_theatre_place` varchar(250) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`t_id`, `t_theatrename`, `district_id`, `t_theatre_place`, `u_id`) VALUES
(1, 'NEW THEATRE', 223, 'Chalakkudi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `time_id` int(11) NOT NULL,
  `time_showtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`time_id`, `time_showtime`) VALUES
(1, 660),
(2, 800);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_e-mail` varchar(50) DEFAULT NULL,
  `u_name` varchar(50) DEFAULT NULL,
  `u_age` varchar(20) DEFAULT NULL,
  `u_phoneno` varchar(50) DEFAULT NULL,
  `u_password` varchar(250) DEFAULT NULL,
  `u_join_date` int(10) NOT NULL,
  `u_type` int(11) NOT NULL,
  `u_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_e-mail`, `u_name`, `u_age`, `u_phoneno`, `u_password`, `u_join_date`, `u_type`, `u_status`) VALUES
(1, 'remshadm@gmail.com', 'remshad', '25', '9447796296', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1),
(2, 'rahman555@gmail.com', 'rahman', '20', '9207616365', 'e10adc3949ba59abbe56e057f20f883e', 0, 2, 1),
(3, 'testadmin@mail.com', 'testadmin', '22', '2222333344', '202cb962ac59075b964b07152d234b70', 0, 2, 1),
(4, 'testmgr@mail.com', 'testmgr', '21', '1231231234', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 1),
(8, 'sharon@gmail.com', 'sharon', '28', '9895257774', 'e10adc3949ba59abbe56e057f20f883e', 1574066207, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `user_id` (`u_id`),
  ADD KEY `booking_ibfk_1` (`movsh_id`),
  ADD KEY `screen_class` (`scrd_class_name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mov_id`),
  ADD KEY `language_id` (`lang_id`);

--
-- Indexes for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`movcat_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `movie_id` (`mov_id`);

--
-- Indexes for table `movie_show`
--
ALTER TABLE `movie_show`
  ADD PRIMARY KEY (`movsh_id`),
  ADD KEY `movie_id` (`mov_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rat_id`),
  ADD KEY `film_id` (`mov_id`),
  ADD KEY `user_id` (`u_id`);

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`scr_id`),
  ADD KEY `theatre_id` (`t_id`);

--
-- Indexes for table `screen_details`
--
ALTER TABLE `screen_details`
  ADD PRIMARY KEY (`scrd_id`),
  ADD KEY `screen_id` (`scr_id`);

--
-- Indexes for table `show_time`
--
ALTER TABLE `show_time`
  ADD PRIMARY KEY (`showt_id`),
  ADD KEY `screen_id` (`scr_id`),
  ADD KEY `time_slot_id` (`time_id`),
  ADD KEY `movsh_id` (`movsh_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `mgr_id` (`u_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `mov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `movcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movie_show`
--
ALTER TABLE `movie_show`
  MODIFY `movsh_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `scr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `screen_details`
--
ALTER TABLE `screen_details`
  MODIFY `scrd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `show_time`
--
ALTER TABLE `show_time`
  MODIFY `showt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`movsh_id`) REFERENCES `movie_show` (`movsh_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`scrd_class_name`) REFERENCES `screen_details` (`scrd_id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `language` (`lang_id`);

--
-- Constraints for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD CONSTRAINT `movie_category_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `movie_category_ibfk_2` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`);

--
-- Constraints for table `movie_show`
--
ALTER TABLE `movie_show`
  ADD CONSTRAINT `movie_show_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `screen`
--
ALTER TABLE `screen`
  ADD CONSTRAINT `screen_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `theatre` (`t_id`);

--
-- Constraints for table `screen_details`
--
ALTER TABLE `screen_details`
  ADD CONSTRAINT `screen_details_ibfk_1` FOREIGN KEY (`scr_id`) REFERENCES `screen` (`scr_id`);

--
-- Constraints for table `show_time`
--
ALTER TABLE `show_time`
  ADD CONSTRAINT `show_time_ibfk_1` FOREIGN KEY (`scr_id`) REFERENCES `screen` (`scr_id`),
  ADD CONSTRAINT `show_time_ibfk_2` FOREIGN KEY (`time_id`) REFERENCES `time_slots` (`time_id`),
  ADD CONSTRAINT `show_time_ibfk_3` FOREIGN KEY (`movsh_id`) REFERENCES `movie_show` (`movsh_id`);

--
-- Constraints for table `theatre`
--
ALTER TABLE `theatre`
  ADD CONSTRAINT `theatre_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`),
  ADD CONSTRAINT `theatre_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
