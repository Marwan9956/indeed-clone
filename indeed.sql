-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 03:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `phone_number` int(255) DEFAULT NULL,
  `country_code` char(2) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `employee_count` int(11) NOT NULL DEFAULT 0,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `password`, `logo_url`, `description`, `email`, `website_url`, `phone_number`, `country_code`, `industry_id`, `employee_count`, `create_date`) VALUES
(1, 'Microsoft', '$2y$10$wim7MZfPH7RHj74Y8rYsjus7/6k.RBnGfr5jj8Vo2.iSLI8FgNQG2', 'user-profile-avatar.jpg', 'We are Colas; an award-winning business, delivering sustainable solutions for the UK’s transport infrastructure. We invest, design, construct, maintain and operate a wide variety of projects for the public and commercial clients.', 'microsoft@mic.com', 'https://localhost/indeed/register/company', 999555666, 'US', 2, 11000, '2020-03-01 14:20:36'),
(2, 'macintoch', '$2y$10$u04QxO07YZHZAdQUHQcto.7dA4PUfj2l7tLI8udQ0OmIX4GLLWoRm', '', 'company -- company company -- company -- company -- company -- company -- company -- company -- company -- company -- company -- company -- company -- company -- company -- company -- company --', 'macintoch@mac.com', 'https://localhost/indeed/register/company', 2147483647, 'NZ', 7, 4000, '2020-03-05 09:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE `continents` (
  `code` char(2) NOT NULL COMMENT 'Continent code',
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`code`, `name`) VALUES
('AF', 'Africa'),
('AN', 'Antarctica'),
('AS', 'Asia'),
('EU', 'Europe'),
('NA', 'North America'),
('OC', 'Oceania'),
('SA', 'South America');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `code` char(2) NOT NULL COMMENT 'Two-letter country code (ISO 3166-1 alpha-2)',
  `name` varchar(255) NOT NULL COMMENT 'English country name',
  `full_name` varchar(255) NOT NULL COMMENT 'Full English country name',
  `iso3` char(3) NOT NULL COMMENT 'Three-letter country code (ISO 3166-1 alpha-3)',
  `number` char(3) NOT NULL COMMENT 'Three-digit country number (ISO 3166-1 numeric)',
  `continent_code` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`code`, `name`, `full_name`, `iso3`, `number`, `continent_code`) VALUES
('AD', 'Andorra', 'Principality of Andorra', 'AND', '020', 'EU'),
('AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', '784', 'AS'),
('AF', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', '004', 'AS'),
('AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', '028', 'NA'),
('AI', 'Anguilla', 'Anguilla', 'AIA', '660', 'NA'),
('AL', 'Albania', 'Republic of Albania', 'ALB', '008', 'EU'),
('AM', 'Armenia', 'Republic of Armenia', 'ARM', '051', 'AS'),
('AO', 'Angola', 'Republic of Angola', 'AGO', '024', 'AF'),
('AQ', 'Antarctica', 'Antarctica (the territory South of 60 deg S)', 'ATA', '010', 'AN'),
('AR', 'Argentina', 'Argentine Republic', 'ARG', '032', 'SA'),
('AS', 'American Samoa', 'American Samoa', 'ASM', '016', 'OC'),
('AT', 'Austria', 'Republic of Austria', 'AUT', '040', 'EU'),
('AU', 'Australia', 'Commonwealth of Australia', 'AUS', '036', 'OC'),
('AW', 'Aruba', 'Aruba', 'ABW', '533', 'NA'),
('AX', 'Åland Islands', 'Åland Islands', 'ALA', '248', 'EU'),
('AZ', 'Azerbaijan', 'Republic of Azerbaijan', 'AZE', '031', 'AS'),
('BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', '070', 'EU'),
('BB', 'Barbados', 'Barbados', 'BRB', '052', 'NA'),
('BD', 'Bangladesh', 'People\'s Republic of Bangladesh', 'BGD', '050', 'AS'),
('BE', 'Belgium', 'Kingdom of Belgium', 'BEL', '056', 'EU'),
('BF', 'Burkina Faso', 'Burkina Faso', 'BFA', '854', 'AF'),
('BG', 'Bulgaria', 'Republic of Bulgaria', 'BGR', '100', 'EU'),
('BH', 'Bahrain', 'Kingdom of Bahrain', 'BHR', '048', 'AS'),
('BI', 'Burundi', 'Republic of Burundi', 'BDI', '108', 'AF'),
('BJ', 'Benin', 'Republic of Benin', 'BEN', '204', 'AF'),
('BL', 'Saint Barthélemy', 'Saint Barthélemy', 'BLM', '652', 'NA'),
('BM', 'Bermuda', 'Bermuda', 'BMU', '060', 'NA'),
('BN', 'Brunei Darussalam', 'Brunei Darussalam', 'BRN', '096', 'AS'),
('BO', 'Bolivia', 'Plurinational State of Bolivia', 'BOL', '068', 'SA'),
('BQ', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'BES', '535', 'NA'),
('BR', 'Brazil', 'Federative Republic of Brazil', 'BRA', '076', 'SA'),
('BS', 'Bahamas', 'Commonwealth of the Bahamas', 'BHS', '044', 'NA'),
('BT', 'Bhutan', 'Kingdom of Bhutan', 'BTN', '064', 'AS'),
('BV', 'Bouvet Island (Bouvetøya)', 'Bouvet Island (Bouvetøya)', 'BVT', '074', 'AN'),
('BW', 'Botswana', 'Republic of Botswana', 'BWA', '072', 'AF'),
('BY', 'Belarus', 'Republic of Belarus', 'BLR', '112', 'EU'),
('BZ', 'Belize', 'Belize', 'BLZ', '084', 'NA'),
('CA', 'Canada', 'Canada', 'CAN', '124', 'NA'),
('CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'CCK', '166', 'AS'),
('CD', 'Congo', 'Democratic Republic of the Congo', 'COD', '180', 'AF'),
('CF', 'Central African Republic', 'Central African Republic', 'CAF', '140', 'AF'),
('CG', 'Congo', 'Republic of the Congo', 'COG', '178', 'AF'),
('CH', 'Switzerland', 'Swiss Confederation', 'CHE', '756', 'EU'),
('CI', 'Cote d\'Ivoire', 'Republic of Cote d\'Ivoire', 'CIV', '384', 'AF'),
('CK', 'Cook Islands', 'Cook Islands', 'COK', '184', 'OC'),
('CL', 'Chile', 'Republic of Chile', 'CHL', '152', 'SA'),
('CM', 'Cameroon', 'Republic of Cameroon', 'CMR', '120', 'AF'),
('CN', 'China', 'People\'s Republic of China', 'CHN', '156', 'AS'),
('CO', 'Colombia', 'Republic of Colombia', 'COL', '170', 'SA'),
('CR', 'Costa Rica', 'Republic of Costa Rica', 'CRI', '188', 'NA'),
('CU', 'Cuba', 'Republic of Cuba', 'CUB', '192', 'NA'),
('CV', 'Cabo Verde', 'Republic of Cabo Verde', 'CPV', '132', 'AF'),
('CW', 'Curaçao', 'Curaçao', 'CUW', '531', 'NA'),
('CX', 'Christmas Island', 'Christmas Island', 'CXR', '162', 'AS'),
('CY', 'Cyprus', 'Republic of Cyprus', 'CYP', '196', 'AS'),
('CZ', 'Czechia', 'Czech Republic', 'CZE', '203', 'EU'),
('DE', 'Germany', 'Federal Republic of Germany', 'DEU', '276', 'EU'),
('DJ', 'Djibouti', 'Republic of Djibouti', 'DJI', '262', 'AF'),
('DK', 'Denmark', 'Kingdom of Denmark', 'DNK', '208', 'EU'),
('DM', 'Dominica', 'Commonwealth of Dominica', 'DMA', '212', 'NA'),
('DO', 'Dominican Republic', 'Dominican Republic', 'DOM', '214', 'NA'),
('DZ', 'Algeria', 'People\'s Democratic Republic of Algeria', 'DZA', '012', 'AF'),
('EC', 'Ecuador', 'Republic of Ecuador', 'ECU', '218', 'SA'),
('EE', 'Estonia', 'Republic of Estonia', 'EST', '233', 'EU'),
('EG', 'Egypt', 'Arab Republic of Egypt', 'EGY', '818', 'AF'),
('EH', 'Western Sahara', 'Western Sahara', 'ESH', '732', 'AF'),
('ER', 'Eritrea', 'State of Eritrea', 'ERI', '232', 'AF'),
('ES', 'Spain', 'Kingdom of Spain', 'ESP', '724', 'EU'),
('ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'ETH', '231', 'AF'),
('FI', 'Finland', 'Republic of Finland', 'FIN', '246', 'EU'),
('FJ', 'Fiji', 'Republic of Fiji', 'FJI', '242', 'OC'),
('FK', 'Falkland Islands (Malvinas)', 'Falkland Islands (Malvinas)', 'FLK', '238', 'SA'),
('FM', 'Micronesia', 'Federated States of Micronesia', 'FSM', '583', 'OC'),
('FO', 'Faroe Islands', 'Faroe Islands', 'FRO', '234', 'EU'),
('FR', 'France', 'French Republic', 'FRA', '250', 'EU'),
('GA', 'Gabon', 'Gabonese Republic', 'GAB', '266', 'AF'),
('GB', 'United Kingdom of Great Britain and Northern Ireland', 'United Kingdom of Great Britain & Northern Ireland', 'GBR', '826', 'EU'),
('GD', 'Grenada', 'Grenada', 'GRD', '308', 'NA'),
('GE', 'Georgia', 'Georgia', 'GEO', '268', 'AS'),
('GF', 'French Guiana', 'French Guiana', 'GUF', '254', 'SA'),
('GG', 'Guernsey', 'Bailiwick of Guernsey', 'GGY', '831', 'EU'),
('GH', 'Ghana', 'Republic of Ghana', 'GHA', '288', 'AF'),
('GI', 'Gibraltar', 'Gibraltar', 'GIB', '292', 'EU'),
('GL', 'Greenland', 'Greenland', 'GRL', '304', 'NA'),
('GM', 'Gambia', 'Republic of the Gambia', 'GMB', '270', 'AF'),
('GN', 'Guinea', 'Republic of Guinea', 'GIN', '324', 'AF'),
('GP', 'Guadeloupe', 'Guadeloupe', 'GLP', '312', 'NA'),
('GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'GNQ', '226', 'AF'),
('GR', 'Greece', 'Hellenic Republic of Greece', 'GRC', '300', 'EU'),
('GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'SGS', '239', 'AN'),
('GT', 'Guatemala', 'Republic of Guatemala', 'GTM', '320', 'NA'),
('GU', 'Guam', 'Guam', 'GUM', '316', 'OC'),
('GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'GNB', '624', 'AF'),
('GY', 'Guyana', 'Co-operative Republic of Guyana', 'GUY', '328', 'SA'),
('HK', 'Hong Kong', 'Hong Kong Special Administrative Region of China', 'HKG', '344', 'AS'),
('HM', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'HMD', '334', 'AN'),
('HN', 'Honduras', 'Republic of Honduras', 'HND', '340', 'NA'),
('HR', 'Croatia', 'Republic of Croatia', 'HRV', '191', 'EU'),
('HT', 'Haiti', 'Republic of Haiti', 'HTI', '332', 'NA'),
('HU', 'Hungary', 'Hungary', 'HUN', '348', 'EU'),
('ID', 'Indonesia', 'Republic of Indonesia', 'IDN', '360', 'AS'),
('IE', 'Ireland', 'Ireland', 'IRL', '372', 'EU'),
('IL', 'Israel', 'State of Israel', 'ISR', '376', 'AS'),
('IM', 'Isle of Man', 'Isle of Man', 'IMN', '833', 'EU'),
('IN', 'India', 'Republic of India', 'IND', '356', 'AS'),
('IO', 'British Indian Ocean Territory (Chagos Archipelago)', 'British Indian Ocean Territory (Chagos Archipelago)', 'IOT', '086', 'AS'),
('IQ', 'Iraq', 'Republic of Iraq', 'IRQ', '368', 'AS'),
('IR', 'Iran', 'Islamic Republic of Iran', 'IRN', '364', 'AS'),
('IS', 'Iceland', 'Republic of Iceland', 'ISL', '352', 'EU'),
('IT', 'Italy', 'Republic of Italy', 'ITA', '380', 'EU'),
('JE', 'Jersey', 'Bailiwick of Jersey', 'JEY', '832', 'EU'),
('JM', 'Jamaica', 'Jamaica', 'JAM', '388', 'NA'),
('JO', 'Jordan', 'Hashemite Kingdom of Jordan', 'JOR', '400', 'AS'),
('JP', 'Japan', 'Japan', 'JPN', '392', 'AS'),
('KE', 'Kenya', 'Republic of Kenya', 'KEN', '404', 'AF'),
('KG', 'Kyrgyz Republic', 'Kyrgyz Republic', 'KGZ', '417', 'AS'),
('KH', 'Cambodia', 'Kingdom of Cambodia', 'KHM', '116', 'AS'),
('KI', 'Kiribati', 'Republic of Kiribati', 'KIR', '296', 'OC'),
('KM', 'Comoros', 'Union of the Comoros', 'COM', '174', 'AF'),
('KN', 'Saint Kitts and Nevis', 'Federation of Saint Kitts and Nevis', 'KNA', '659', 'NA'),
('KP', 'Korea', 'Democratic People\'s Republic of Korea', 'PRK', '408', 'AS'),
('KR', 'Korea', 'Republic of Korea', 'KOR', '410', 'AS'),
('KW', 'Kuwait', 'State of Kuwait', 'KWT', '414', 'AS'),
('KY', 'Cayman Islands', 'Cayman Islands', 'CYM', '136', 'NA'),
('KZ', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', '398', 'AS'),
('LA', 'Lao People\'s Democratic Republic', 'Lao People\'s Democratic Republic', 'LAO', '418', 'AS'),
('LB', 'Lebanon', 'Lebanese Republic', 'LBN', '422', 'AS'),
('LC', 'Saint Lucia', 'Saint Lucia', 'LCA', '662', 'NA'),
('LI', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', '438', 'EU'),
('LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', '144', 'AS'),
('LR', 'Liberia', 'Republic of Liberia', 'LBR', '430', 'AF'),
('LS', 'Lesotho', 'Kingdom of Lesotho', 'LSO', '426', 'AF'),
('LT', 'Lithuania', 'Republic of Lithuania', 'LTU', '440', 'EU'),
('LU', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', '442', 'EU'),
('LV', 'Latvia', 'Republic of Latvia', 'LVA', '428', 'EU'),
('LY', 'Libya', 'State of Libya', 'LBY', '434', 'AF'),
('MA', 'Morocco', 'Kingdom of Morocco', 'MAR', '504', 'AF'),
('MC', 'Monaco', 'Principality of Monaco', 'MCO', '492', 'EU'),
('MD', 'Moldova', 'Republic of Moldova', 'MDA', '498', 'EU'),
('ME', 'Montenegro', 'Montenegro', 'MNE', '499', 'EU'),
('MF', 'Saint Martin', 'Saint Martin (French part)', 'MAF', '663', 'NA'),
('MG', 'Madagascar', 'Republic of Madagascar', 'MDG', '450', 'AF'),
('MH', 'Marshall Islands', 'Republic of the Marshall Islands', 'MHL', '584', 'OC'),
('MK', 'North Macedonia', 'Republic of North Macedonia', 'MKD', '807', 'EU'),
('ML', 'Mali', 'Republic of Mali', 'MLI', '466', 'AF'),
('MM', 'Myanmar', 'Republic of the Union of Myanmar', 'MMR', '104', 'AS'),
('MN', 'Mongolia', 'Mongolia', 'MNG', '496', 'AS'),
('MO', 'Macao', 'Macao Special Administrative Region of China', 'MAC', '446', 'AS'),
('MP', 'Northern Mariana Islands', 'Commonwealth of the Northern Mariana Islands', 'MNP', '580', 'OC'),
('MQ', 'Martinique', 'Martinique', 'MTQ', '474', 'NA'),
('MR', 'Mauritania', 'Islamic Republic of Mauritania', 'MRT', '478', 'AF'),
('MS', 'Montserrat', 'Montserrat', 'MSR', '500', 'NA'),
('MT', 'Malta', 'Republic of Malta', 'MLT', '470', 'EU'),
('MU', 'Mauritius', 'Republic of Mauritius', 'MUS', '480', 'AF'),
('MV', 'Maldives', 'Republic of Maldives', 'MDV', '462', 'AS'),
('MW', 'Malawi', 'Republic of Malawi', 'MWI', '454', 'AF'),
('MX', 'Mexico', 'United Mexican States', 'MEX', '484', 'NA'),
('MY', 'Malaysia', 'Malaysia', 'MYS', '458', 'AS'),
('MZ', 'Mozambique', 'Republic of Mozambique', 'MOZ', '508', 'AF'),
('NA', 'Namibia', 'Republic of Namibia', 'NAM', '516', 'AF'),
('NC', 'New Caledonia', 'New Caledonia', 'NCL', '540', 'OC'),
('NE', 'Niger', 'Republic of Niger', 'NER', '562', 'AF'),
('NF', 'Norfolk Island', 'Norfolk Island', 'NFK', '574', 'OC'),
('NG', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', '566', 'AF'),
('NI', 'Nicaragua', 'Republic of Nicaragua', 'NIC', '558', 'NA'),
('NL', 'Netherlands', 'Kingdom of the Netherlands', 'NLD', '528', 'EU'),
('NO', 'Norway', 'Kingdom of Norway', 'NOR', '578', 'EU'),
('NP', 'Nepal', 'Federal Democratic Republic of Nepal', 'NPL', '524', 'AS'),
('NR', 'Nauru', 'Republic of Nauru', 'NRU', '520', 'OC'),
('NU', 'Niue', 'Niue', 'NIU', '570', 'OC'),
('NZ', 'New Zealand', 'New Zealand', 'NZL', '554', 'OC'),
('OM', 'Oman', 'Sultanate of Oman', 'OMN', '512', 'AS'),
('PA', 'Panama', 'Republic of Panama', 'PAN', '591', 'NA'),
('PE', 'Peru', 'Republic of Peru', 'PER', '604', 'SA'),
('PF', 'French Polynesia', 'French Polynesia', 'PYF', '258', 'OC'),
('PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'PNG', '598', 'OC'),
('PH', 'Philippines', 'Republic of the Philippines', 'PHL', '608', 'AS'),
('PK', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', '586', 'AS'),
('PL', 'Poland', 'Republic of Poland', 'POL', '616', 'EU'),
('PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', '666', 'NA'),
('PN', 'Pitcairn Islands', 'Pitcairn Islands', 'PCN', '612', 'OC'),
('PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'PRI', '630', 'NA'),
('PS', 'Palestine', 'State of Palestine', 'PSE', '275', 'AS'),
('PT', 'Portugal', 'Portuguese Republic', 'PRT', '620', 'EU'),
('PW', 'Palau', 'Republic of Palau', 'PLW', '585', 'OC'),
('PY', 'Paraguay', 'Republic of Paraguay', 'PRY', '600', 'SA'),
('QA', 'Qatar', 'State of Qatar', 'QAT', '634', 'AS'),
('RE', 'Réunion', 'Réunion', 'REU', '638', 'AF'),
('RO', 'Romania', 'Romania', 'ROU', '642', 'EU'),
('RS', 'Serbia', 'Republic of Serbia', 'SRB', '688', 'EU'),
('RU', 'Russian Federation', 'Russian Federation', 'RUS', '643', 'EU'),
('RW', 'Rwanda', 'Republic of Rwanda', 'RWA', '646', 'AF'),
('SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'SAU', '682', 'AS'),
('SB', 'Solomon Islands', 'Solomon Islands', 'SLB', '090', 'OC'),
('SC', 'Seychelles', 'Republic of Seychelles', 'SYC', '690', 'AF'),
('SD', 'Sudan', 'Republic of Sudan', 'SDN', '729', 'AF'),
('SE', 'Sweden', 'Kingdom of Sweden', 'SWE', '752', 'EU'),
('SG', 'Singapore', 'Republic of Singapore', 'SGP', '702', 'AS'),
('SH', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helena, Ascension and Tristan da Cunha', 'SHN', '654', 'AF'),
('SI', 'Slovenia', 'Republic of Slovenia', 'SVN', '705', 'EU'),
('SJ', 'Svalbard & Jan Mayen Islands', 'Svalbard & Jan Mayen Islands', 'SJM', '744', 'EU'),
('SK', 'Slovakia (Slovak Republic)', 'Slovakia (Slovak Republic)', 'SVK', '703', 'EU'),
('SL', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', '694', 'AF'),
('SM', 'San Marino', 'Republic of San Marino', 'SMR', '674', 'EU'),
('SN', 'Senegal', 'Republic of Senegal', 'SEN', '686', 'AF'),
('SO', 'Somalia', 'Federal Republic of Somalia', 'SOM', '706', 'AF'),
('SR', 'Suriname', 'Republic of Suriname', 'SUR', '740', 'SA'),
('SS', 'South Sudan', 'Republic of South Sudan', 'SSD', '728', 'AF'),
('ST', 'Sao Tome and Principe', 'Democratic Republic of Sao Tome and Principe', 'STP', '678', 'AF'),
('SV', 'El Salvador', 'Republic of El Salvador', 'SLV', '222', 'NA'),
('SX', 'Sint Maarten (Dutch part)', 'Sint Maarten (Dutch part)', 'SXM', '534', 'NA'),
('SY', 'Syrian Arab Republic', 'Syrian Arab Republic', 'SYR', '760', 'AS'),
('SZ', 'Eswatini', 'Kingdom of Eswatini', 'SWZ', '748', 'AF'),
('TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', '796', 'NA'),
('TD', 'Chad', 'Republic of Chad', 'TCD', '148', 'AF'),
('TF', 'French Southern Territories', 'French Southern Territories', 'ATF', '260', 'AN'),
('TG', 'Togo', 'Togolese Republic', 'TGO', '768', 'AF'),
('TH', 'Thailand', 'Kingdom of Thailand', 'THA', '764', 'AS'),
('TJ', 'Tajikistan', 'Republic of Tajikistan', 'TJK', '762', 'AS'),
('TK', 'Tokelau', 'Tokelau', 'TKL', '772', 'OC'),
('TL', 'Timor-Leste', 'Democratic Republic of Timor-Leste', 'TLS', '626', 'AS'),
('TM', 'Turkmenistan', 'Turkmenistan', 'TKM', '795', 'AS'),
('TN', 'Tunisia', 'Tunisian Republic', 'TUN', '788', 'AF'),
('TO', 'Tonga', 'Kingdom of Tonga', 'TON', '776', 'OC'),
('TR', 'Turkey', 'Republic of Turkey', 'TUR', '792', 'AS'),
('TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'TTO', '780', 'NA'),
('TV', 'Tuvalu', 'Tuvalu', 'TUV', '798', 'OC'),
('TW', 'Taiwan', 'Taiwan, Province of China', 'TWN', '158', 'AS'),
('TZ', 'Tanzania', 'United Republic of Tanzania', 'TZA', '834', 'AF'),
('UA', 'Ukraine', 'Ukraine', 'UKR', '804', 'EU'),
('UG', 'Uganda', 'Republic of Uganda', 'UGA', '800', 'AF'),
('UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', '581', 'OC'),
('US', 'United States of America', 'United States of America', 'USA', '840', 'NA'),
('UY', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', '858', 'SA'),
('UZ', 'Uzbekistan', 'Republic of Uzbekistan', 'UZB', '860', 'AS'),
('VA', 'Holy See (Vatican City State)', 'Holy See (Vatican City State)', 'VAT', '336', 'EU'),
('VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', '670', 'NA'),
('VE', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', '862', 'SA'),
('VG', 'British Virgin Islands', 'British Virgin Islands', 'VGB', '092', 'NA'),
('VI', 'United States Virgin Islands', 'United States Virgin Islands', 'VIR', '850', 'NA'),
('VN', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', '704', 'AS'),
('VU', 'Vanuatu', 'Republic of Vanuatu', 'VUT', '548', 'OC'),
('WF', 'Wallis and Futuna', 'Wallis and Futuna', 'WLF', '876', 'OC'),
('WS', 'Samoa', 'Independent State of Samoa', 'WSM', '882', 'OC'),
('YE', 'Yemen', 'Yemen', 'YEM', '887', 'AS'),
('YT', 'Mayotte', 'Mayotte', 'MYT', '175', 'AF'),
('ZA', 'South Africa', 'Republic of South Africa', 'ZAF', '710', 'AF'),
('ZM', 'Zambia', 'Republic of Zambia', 'ZMB', '894', 'AF'),
('ZW', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', '716', 'AF');

-- --------------------------------------------------------

--
-- Table structure for table `current_status`
--

CREATE TABLE `current_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_status`
--

INSERT INTO `current_status` (`id`, `name`) VALUES
(1, 'Full-time'),
(2, 'Part-time'),
(3, 'Temporary'),
(4, 'unemployed'),
(5, 'remote');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `education_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`education_json`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `user_id`, `education_json`) VALUES
(2, 1, '[{\"InsitituteName\":\"Facebook            \",\"programTitle\":\"Certificate            \",\"fromDate\":\"2002-02-22\",\"to\":\"2003-02-15\"},{\"InsitituteName\":\"Microsoft      \",\"programTitle\":\"Certificate      \",\"fromDate\":\"2006-10-25\",\"to\":\"2007-11-25\"},{\"InsitituteName\":\"Sikkim     \",\"programTitle\":\"fasfdsa     \",\"fromDate\":\"2003-02-05\",\"to\":\"2004-02-22\"},{\"InsitituteName\":\"Adobe  \",\"programTitle\":\"Certificate  \",\"fromDate\":\"2006-02-05\",\"to\":\"2007-02-10\"}]'),
(3, 4, '[{\"InsitituteName\":\"Facebook\",\"programTitle\":\"Certificate\",\"fromDate\":\"2015-05-13\",\"to\":\"2020-05-13\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Experience_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Experience_json`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `Experience_json`) VALUES
(1, 1, '[{\"companyName\":\"Microsoft\",\"jobRole\":\"Software engineer\",\"fromDate\":\"2003-02-22\",\"to\":\"2006-02-02\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`) VALUES
(1, 'Gaming'),
(2, 'Web Tech'),
(3, 'Mobile development'),
(4, 'food industry'),
(5, 'Movies'),
(6, 'Marketing'),
(7, 'Computer Hardware'),
(8, 'Electricity equipments');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `required_skills` varchar(255) NOT NULL,
  `nice_to_have_skills` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `required_skills`, `nice_to_have_skills`, `company_id`, `create_date`) VALUES
(1, 'Web Developer', 'php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery', 'php Mysql javascript jquery', 'php Mysql javascript jquery', 1, '2020-03-07 11:46:21'),
(3, 'Web Developer New', '																php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery php Mysql javascript jquery \r\n\r\n\r\nnew description.												', 'First skill|second skill|third skill|fourth skill', 'php Mysql javascript jquery|php|new nice skill', 1, '2020-03-07 11:51:48'),
(4, 'Software enginner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'php php php php php php php php ', 'php php php php php php php php php php', 2, '2020-03-08 12:09:36'),
(5, 'Feugiat Metus Sit Industries', 'nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor', 'Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla.', 'condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing', 1, '2020-03-08 12:35:44'),
(6, 'Vel Quam Associates', 'molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim,', 'auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis', 'In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum', 2, '2020-03-08 12:35:44'),
(7, 'Ipsum Phasellus Vitae Associates', 'Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu.', 'libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus', 'vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum', 1, '2020-03-08 12:35:44'),
(8, 'Pretium Aliquet Ltd', 'pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed', 'sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu,', 'vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet', 2, '2020-03-08 12:35:44'),
(9, 'Ante Ipsum Primis Consulting', 'dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare', 'Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu', 'ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed', 2, '2020-03-08 12:35:44'),
(10, 'A Inc.', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu', 'amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi', 'pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus', 2, '2020-03-08 12:35:44'),
(11, 'Est Mauris Industries', 'nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec', 'ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla', 'libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui.', 1, '2020-03-08 12:35:44'),
(12, 'Massa Inc.', 'mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes,', 'mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh', 'nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla.', 1, '2020-03-08 12:35:44'),
(13, 'Nec Associates', 'nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus', 'id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent', 'vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod', 1, '2020-03-08 12:35:44'),
(14, 'Sem Molestie LLC', 'nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a,', 'turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla', 'Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis', 2, '2020-03-08 12:35:44'),
(15, 'Ornare Sagittis Institute', 'lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat.', 'Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non', 'malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac', 2, '2020-03-08 12:35:44'),
(16, 'Hendrerit Consectetuer Consulting', 'sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et', 'magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus', 'odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales', 1, '2020-03-08 12:35:44'),
(17, 'Aenean Institute', 'urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit.', 'vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac', 'a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non', 2, '2020-03-08 12:35:44'),
(18, 'Ultrices Posuere Associates', 'Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit', 'nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam', 'magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat', 2, '2020-03-08 12:35:44'),
(19, 'Nunc Ullamcorper Eu Corp.', 'diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce', 'interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus', 'a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra,', 2, '2020-03-08 12:35:44'),
(20, 'Est Ac Facilisis LLP', 'Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu', 'enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa.', 'odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu,', 1, '2020-03-08 12:35:44'),
(21, 'Ultricies Adipiscing Corporation', 'In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue,', 'Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat', 'sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec', 2, '2020-03-08 12:35:44'),
(22, 'Aliquet Molestie Institute', 'Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra.', 'aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus.', 'molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu', 1, '2020-03-08 12:35:44'),
(23, 'Pellentesque Habitant Morbi LLC', 'aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis.', 'urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed', 'molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec', 1, '2020-03-08 12:35:44'),
(24, 'Enim Institute', 'pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id,', 'Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus', 'a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui,', 2, '2020-03-08 12:35:44'),
(25, 'Enim Suspendisse Industries', 'arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis', 'dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent', 'lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis', 1, '2020-03-08 12:35:44'),
(26, 'Nec Ante Corporation', 'dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum', 'tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum.', 'sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis', 2, '2020-03-08 12:35:44'),
(27, 'A Odio Semper PC', 'ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin', 'amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit', 'blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia.', 2, '2020-03-08 12:35:44'),
(28, 'Sodales Limited', 'non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim,', 'Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem', 'nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices', 1, '2020-03-08 12:35:44'),
(29, 'Sodales Nisi Magna Inc.', 'Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna', 'mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis', 'lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur', 2, '2020-03-08 12:35:44'),
(30, 'Malesuada Corp.', 'et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit', 'Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus', 'porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.', 1, '2020-03-08 12:35:44'),
(31, 'In Inc.', 'Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu', 'et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus', 'lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac,', 1, '2020-03-08 12:35:44'),
(32, 'Ornare PC', 'malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent', 'Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus', 'Sed congue, elit sed consequat auctor, nunc nulla vulputate dui,', 1, '2020-03-08 12:35:44'),
(33, 'In Faucibus Corporation', 'sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu', 'velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu', 'tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit', 2, '2020-03-08 12:35:44'),
(34, 'Ultrices Industries', 'dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed', 'volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor', 'felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut', 2, '2020-03-08 12:35:44'),
(35, 'In LLP', 'neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo', 'vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse', 'scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis', 1, '2020-03-08 12:35:44'),
(36, 'Et Consulting', 'lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in', 'Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend', 'a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris', 2, '2020-03-08 12:35:44'),
(37, 'Lectus Convallis Est Consulting', 'urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam', 'urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci', 'arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis', 1, '2020-03-08 12:35:44'),
(38, 'Ipsum Non Arcu Incorporated', 'Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non', 'elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae', 'ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi.', 1, '2020-03-08 12:35:44'),
(39, 'Risus Odio Auctor Corporation', 'egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus', 'faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia', 'ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus.', 1, '2020-03-08 12:35:44'),
(40, 'Amet Incorporated', 'ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin', 'libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus', 'ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis', 1, '2020-03-08 12:35:44'),
(41, 'Sodales Elit Erat Corporation', 'id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula', 'Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget', 'erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat.', 1, '2020-03-08 12:35:44'),
(42, 'Sed Molestie LLP', 'eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque', 'ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem.', 'Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper,', 2, '2020-03-08 12:35:44'),
(43, 'Dui Semper Et Industries', 'egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem', 'velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed', 'ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce', 2, '2020-03-08 12:35:44'),
(44, 'Velit Pellentesque Incorporated', 'pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut,', 'ut odio vel est tempor bibendum. Donec felis orci, adipiscing', 'Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede.', 2, '2020-03-08 12:35:44'),
(45, 'Nisl Arcu Consulting', 'sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi.', 'sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a,', 'sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam', 2, '2020-03-08 12:35:44'),
(46, 'Integer Consulting', 'sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum', 'egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci', 'dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus', 2, '2020-03-08 12:35:44'),
(47, 'Urna Ut Corp.', 'aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient', 'quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus.', 'et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi', 2, '2020-03-08 12:35:44'),
(48, 'Lacus Ut Corp.', 'scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in', 'sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci', 'euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi.', 2, '2020-03-08 12:35:44'),
(49, 'Torquent Per Conubia Inc.', 'sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing', 'ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula.', 'Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis.', 2, '2020-03-08 12:35:44'),
(50, 'Vel Pede Blandit Inc.', 'at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh', 'nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit.', 'vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare', 1, '2020-03-08 12:35:44'),
(51, 'Elementum Lorem LLP', 'leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus', 'fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem', 'bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu', 2, '2020-03-08 12:35:44'),
(52, 'Dictum Cursus Nunc LLP', 'lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat', 'facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede.', 'mus. Donec dignissim magna a tortor. Nunc commodo auctor velit.', 1, '2020-03-08 12:35:44'),
(53, 'Fringilla Ornare Company', 'Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non', 'ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula', 'odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum', 2, '2020-03-08 12:35:44'),
(54, 'Vulputate Velit Ltd', 'odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed', 'venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et', 'neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In', 1, '2020-03-08 12:35:44'),
(55, 'Et Libero Foundation', 'venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus.', 'a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio,', 'ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis', 2, '2020-03-08 12:35:44'),
(56, 'Commodo At Libero Company', 'ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui.', 'quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam,', 'ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis', 2, '2020-03-08 12:35:44'),
(57, 'Lacinia Consulting', 'ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa.', 'pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus.', 'dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi', 2, '2020-03-08 12:35:44'),
(58, 'Vel Company', 'gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in', 'aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in,', 'sem magna nec quam. Curabitur vel lectus. Cum sociis natoque', 1, '2020-03-08 12:35:44'),
(59, 'Sed Institute', 'rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero', 'eu nulla at sem molestie sodales. Mauris blandit enim consequat', 'ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non', 2, '2020-03-08 12:35:44'),
(60, 'Suscipit Est Ac Ltd', 'feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio,', 'vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam', 'orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim.', 2, '2020-03-08 12:35:44'),
(61, 'Eu Odio Tristique Corp.', 'sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam', 'mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum', 'odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id,', 1, '2020-03-08 12:35:44'),
(62, 'Sit Amet Corporation', 'Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec', 'aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod', 'Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia.', 1, '2020-03-08 12:35:44'),
(63, 'Cursus Integer Institute', 'Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis', 'egestas. Fusce aliquet magna a neque. Nullam ut nisi a', 'Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor', 2, '2020-03-08 12:35:44'),
(64, 'Varius Et Associates', 'Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus', 'non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum', 'lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim', 2, '2020-03-08 12:35:44'),
(65, 'Ut LLP', 'Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi.', 'id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque', 'eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et,', 2, '2020-03-08 12:35:45'),
(66, 'Egestas Sed Industries', 'interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu', 'nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut', 'luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis', 1, '2020-03-08 12:35:45'),
(67, 'Quis Pede Praesent Associates', 'Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus.', 'nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor', 'euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies', 2, '2020-03-08 12:35:45'),
(68, 'Non Corp.', 'enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio.', 'tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non', 'varius et, euismod et, commodo at, libero. Morbi accumsan laoreet', 1, '2020-03-08 12:35:45'),
(69, 'Dis Parturient Montes Corp.', 'enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin', 'at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque', 'nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus.', 2, '2020-03-08 12:35:45'),
(70, 'Nec Orci PC', 'Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia', 'libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet', 'dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae', 1, '2020-03-08 12:35:45'),
(71, 'Ornare Ltd', 'amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus', 'sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in', 'magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non', 2, '2020-03-08 12:35:45'),
(72, 'Pellentesque Corp.', 'scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis', 'amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis', 'purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis', 1, '2020-03-08 12:35:45'),
(73, 'Felis Ltd', 'ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet', 'tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et', 'rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede.', 1, '2020-03-08 12:35:45'),
(74, 'Nunc Ullamcorper Industries', 'dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent', 'Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est,', 'tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at', 2, '2020-03-08 12:35:45'),
(75, 'Ante Limited', 'vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin', 'lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo', 'porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis,', 1, '2020-03-08 12:35:45'),
(76, 'Erat Nonummy Ultricies LLC', 'Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et', 'Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas', 'Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla.', 1, '2020-03-08 12:35:45'),
(77, 'At Company', 'eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et', 'mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum.', 'dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum,', 1, '2020-03-08 12:35:45'),
(78, 'Fusce Company', 'tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin', 'neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.', 'vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac', 1, '2020-03-08 12:35:45'),
(79, 'Velit Limited', 'quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'auctor non, feugiat nec, diam. Duis mi enim, condimentum eget,', 'Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus', 1, '2020-03-08 12:35:45'),
(80, 'Id PC', 'in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;', 'vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan', 'turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean', 1, '2020-03-08 12:35:45'),
(81, 'Metus Facilisis Lorem Industries', 'nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu', 'dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis.', 'luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum', 1, '2020-03-08 12:35:45'),
(82, 'Metus Aliquam Erat Company', 'aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh', 'pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim', 'ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien.', 1, '2020-03-08 12:35:45'),
(83, 'Sollicitudin Commodo Ipsum Institute', 'amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac', 'metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis', 'ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat,', 1, '2020-03-08 12:35:45'),
(84, 'Arcu LLP', 'lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim.', 'eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero', 'commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi', 1, '2020-03-08 12:35:45'),
(85, 'Montes Nascetur Ltd', 'gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar', 'orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae', 'Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.', 1, '2020-03-08 12:35:45'),
(86, 'Per Inceptos Hymenaeos LLP', 'amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt', 'dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget', 'eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus', 1, '2020-03-08 12:35:45'),
(87, 'Elit Pellentesque A Corp.', 'egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum', 'quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam', 'vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci', 2, '2020-03-08 12:35:45'),
(88, 'Aenean Sed Pede Institute', 'orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio.', 'tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus.', 'hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim.', 2, '2020-03-08 12:35:45'),
(89, 'Convallis Dolor Quisque Corporation', 'egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis', 'varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec', 'pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem', 2, '2020-03-08 12:35:45'),
(90, 'Erat Eget Ipsum Consulting', 'amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut', 'molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse', 'vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 1, '2020-03-08 12:35:45'),
(91, 'Eget Metus In Ltd', 'Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed', 'elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus', 'adipiscing elit. Aliquam auctor, velit eget laoreet posuere, enim nisl elementum purus, accumsan interdum libero dui nec', 2, '2020-03-08 12:35:45'),
(92, 'Lobortis Nisi Nibh Consulting', 'odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus.', 'sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut', 'quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus', 1, '2020-03-08 12:35:45');
INSERT INTO `jobs` (`id`, `title`, `description`, `required_skills`, `nice_to_have_skills`, `company_id`, `create_date`) VALUES
(93, 'Metus Limited', 'ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla.', 'magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo.', 'Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer,', 1, '2020-03-08 12:35:45'),
(94, 'Bibendum Sed Est LLP', 'ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia', 'elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales', 'sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et', 1, '2020-03-08 12:35:45'),
(95, 'Mollis Lectus Pede Company', 'Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem,', 'malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna.', 'massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur', 1, '2020-03-08 12:35:45'),
(96, 'Donec Associates', 'hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin', 'augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et', 'litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet', 1, '2020-03-08 12:35:45'),
(97, 'Urna Nec Industries', 'tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus', 'Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat.', 'arcu. Vestibulum ante ipsum primis in faucibus orci luctus et', 1, '2020-03-08 12:35:45'),
(98, 'Rutrum Foundation', 'Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit,', 'Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed', 'non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed', 2, '2020-03-08 12:35:45'),
(99, 'Sed Limited', 'ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed', 'porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non,', 'elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus', 2, '2020-03-08 12:35:45'),
(100, 'Tincidunt Incorporated', 'Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod', 'varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est.', 'Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas', 2, '2020-03-08 12:35:45'),
(101, 'Tincidunt Donec Vitae Corp.', 'Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis', 'est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus,', 'ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque', 2, '2020-03-08 12:35:45'),
(102, 'Egestas Rhoncus PC', 'nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper,', 'massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula', 'iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh.', 1, '2020-03-08 12:35:45'),
(103, 'Dignissim Limited', 'luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas.', 'vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum', 'sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan', 1, '2020-03-08 12:35:45'),
(104, 'At Fringilla LLP', 'sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero', 'Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus', 'imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor.', 1, '2020-03-08 12:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_search` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `user_id`, `job_search`) VALUES
(1, 1, 'web');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_nonmember`
--

CREATE TABLE `subscription_nonmember` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job_search` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_nonmember`
--

INSERT INTO `subscription_nonmember` (`id`, `email`, `job_search`) VALUES
(1, 'ms-mr-9@hotmail.com', 'web'),
(3, 'mar@mar.com', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country_code` char(2) NOT NULL,
  `phone_number` int(150) NOT NULL,
  `resume_url` varchar(255) DEFAULT NULL,
  `profile_img` varchar(50) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `current_status_id` int(11) DEFAULT NULL,
  `register_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `country_code`, `phone_number`, `resume_url`, `profile_img`, `company_id`, `current_status_id`, `register_time`) VALUES
(1, 'marwan', 'alamoodi', 'marwan9956', '$2y$10$DxzjEDASh9OankCatK6SV.QiYtmV9PyUDrvO46obpApS3/P..t6MO', 'marwan9956@yahoo.com', 'AF', 123456789, 'Building_a_Desktop_Application_with_Php_(Laravel_5_3).pdf', 'user-profile-avatar2.jpg', 2, 1, '2020-03-01 06:25:23'),
(2, 'michael', 'moo', 'michael', '$2y$10$4Q6d1qZ6y//E6kkSLBlg0u/.tl3mz40siMM2LPc275RTamFW.5twu', 'marwan@dfdsaf.com', 'DZ', 123456789, '', 'alena-dubrovina-3.jpg', NULL, 1, '2020-03-01 13:59:37'),
(3, 'Maroo', 'marrrrrrrr', 'marwanfadsfa', '$2y$10$PcuB/vUZSjiP.SiOmDcnsOull6z/Wr95phaOTpLsFFrROwzV1DLYW', 'marwan9956@gmail.com', 'AZ', 888888888, '', '', NULL, 2, '2020-03-01 14:04:52'),
(4, 'marwan', 'moo', 'marwan5555', '$2y$10$na2OrLQ9HakeP13/8Z7zaOJ/8MJDwUcpnC9XksPO4wk27ebP5Ivqu', 'marwan@marwan.com', 'YE', 999555666, '', '', 2, 1, '2020-05-04 16:02:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD KEY `FK_candidate_user` (`user_id`),
  ADD KEY `FK_candidate_job` (`job_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Industray_company` (`industry_id`),
  ADD KEY `FK_country_company` (`country_code`);

--
-- Indexes for table `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`code`),
  ADD KEY `continent_code` (`continent_code`);

--
-- Indexes for table `current_status`
--
ALTER TABLE `current_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Education_user_id` (`user_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Experiences_user_id` (`user_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Company_id` (`company_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `subscription_user_id` (`user_id`);

--
-- Indexes for table `subscription_nonmember`
--
ALTER TABLE `subscription_nonmember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Status_id` (`current_status_id`),
  ADD KEY `FK_company` (`company_id`),
  ADD KEY `FK_user_country` (`country_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `current_status`
--
ALTER TABLE `current_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription_nonmember`
--
ALTER TABLE `subscription_nonmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `FK_candidate_job` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `FK_candidate_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `FK_Industray_company` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`),
  ADD CONSTRAINT `FK_country_company` FOREIGN KEY (`country_code`) REFERENCES `countries` (`code`);

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `fk_countries_continents` FOREIGN KEY (`continent_code`) REFERENCES `continents` (`code`);

--
-- Constraints for table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `FK_Education_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `FK_Experiences_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FK_Company_id` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_Status_id` FOREIGN KEY (`current_status_id`) REFERENCES `current_status` (`id`),
  ADD CONSTRAINT `FK_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `FK_user_country` FOREIGN KEY (`country_code`) REFERENCES `countries` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
