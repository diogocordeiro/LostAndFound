# dados para rodar direto no server
-- mysql -h z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com -u mfq6jgrmyzj9p0lx -pmqg8ln28l4fgjbrh n6tab27cmhizxmgg < schema.sql

#se quiser deleter as tabelas
-- drop table paises;
-- drop table usuarios;
-- drop table itens;

-- --------------------------------------------------------

--
-- Table structure for table `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(11) NOT NULL,
  `abrev` varchar(2) NOT NULL,
  `pais` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paises`
--

INSERT INTO `paises` (`id`, `abrev`, `pais`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AN', 'Netherlands Antilles'),
(9, 'AO', 'Angola'),
(10, 'AQ', 'Antarctica'),
(11, 'AR', 'Argentina'),
(12, 'AS', 'American Samoa'),
(13, 'AT', 'Austria'),
(14, 'AU', 'Australia'),
(15, 'AW', 'Aruba'),
(16, 'AX', 'Ã…land Islands'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BA', 'Bosnia and Herzegovina'),
(19, 'BB', 'Barbados'),
(20, 'BD', 'Bangladesh'),
(21, 'BE', 'Belgium'),
(22, 'BF', 'Burkina Faso'),
(23, 'BG', 'Bulgaria'),
(24, 'BH', 'Bahrain'),
(25, 'BI', 'Burundi'),
(26, 'BJ', 'Benin'),
(27, 'BL', 'Saint BarthÃ©lemy'),
(28, 'BM', 'Bermuda'),
(29, 'BN', 'Brunei'),
(30, 'BO', 'Bolivia'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Congo - Kinshasa'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Congo - Brazzaville'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'CÃ´te dâ€™Ivoire'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CX', 'Christmas Island'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DE', 'Germany'),
(57, 'DJ', 'Djibouti'),
(58, 'DK', 'Denmark'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'DZ', 'Algeria'),
(62, 'EC', 'Ecuador'),
(63, 'EE', 'Estonia'),
(64, 'EG', 'Egypt'),
(65, 'EH', 'Western Sahara'),
(66, 'ER', 'Eritrea'),
(67, 'ES', 'Spain'),
(68, 'ET', 'Ethiopia'),
(69, 'FI', 'Finland'),
(70, 'FJ', 'Fiji'),
(71, 'FK', 'Falkland Islands'),
(72, 'FM', 'Micronesia'),
(73, 'FO', 'Faroe Islands'),
(74, 'FR', 'France'),
(75, 'GA', 'Gabon'),
(76, 'GB', 'United Kingdom'),
(77, 'GD', 'Grenada'),
(78, 'GE', 'Georgia'),
(79, 'GF', 'French Guiana'),
(80, 'GG', 'Guernsey'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GL', 'Greenland'),
(84, 'GM', 'Gambia'),
(85, 'GN', 'Guinea'),
(86, 'GP', 'Guadeloupe'),
(87, 'GQ', 'Equatorial Guinea'),
(88, 'GR', 'Greece'),
(89, 'GT', 'Guatemala'),
(90, 'GU', 'Guam'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HK', 'Hong Kong SAR China'),
(94, 'HM', 'Heard Island and McDonald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HR', 'Croatia'),
(97, 'HT', 'Haiti'),
(98, 'HU', 'Hungary'),
(99, 'ID', 'Indonesia'),
(100, 'IE', 'Ireland'),
(101, 'IL', 'Israel'),
(102, 'IM', 'Isle of Man'),
(103, 'IN', 'India'),
(104, 'IO', 'British Indian Ocean Territory'),
(105, 'IQ', 'Iraq'),
(106, 'IR', 'Iran'),
(107, 'IS', 'Iceland'),
(108, 'IT', 'Italy'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JO', 'Jordan'),
(112, 'JP', 'Japan'),
(113, 'KE', 'Kenya'),
(114, 'KG', 'Kyrgyzstan'),
(115, 'KH', 'Cambodia'),
(116, 'KI', 'Kiribati'),
(117, 'KM', 'Comoros'),
(118, 'KN', 'Saint Kitts and Nevis'),
(119, 'KP', 'North Korea'),
(120, 'KR', 'South Korea'),
(121, 'KW', 'Kuwait'),
(122, 'KY', 'Cayman Islands'),
(123, 'KZ', 'Kazakhstan'),
(124, 'LA', 'Laos'),
(125, 'LB', 'Lebanon'),
(126, 'LC', 'Saint Lucia'),
(127, 'LI', 'Liechtenstein'),
(128, 'LK', 'Sri Lanka'),
(129, 'LR', 'Liberia'),
(130, 'LS', 'Lesotho'),
(131, 'LT', 'Lithuania'),
(132, 'LU', 'Luxembourg'),
(133, 'LV', 'Latvia'),
(134, 'LY', 'Libya'),
(135, 'MA', 'Morocco'),
(136, 'MC', 'Monaco'),
(137, 'MD', 'Moldova'),
(138, 'ME', 'Montenegro'),
(139, 'MF', 'Saint Martin'),
(140, 'MG', 'Madagascar'),
(141, 'MH', 'Marshall Islands'),
(142, 'MK', 'Macedonia'),
(143, 'ML', 'Mali'),
(144, 'MM', 'Myanmar [Burma]'),
(145, 'MN', 'Mongolia'),
(146, 'MO', 'Macau SAR China'),
(147, 'MP', 'Northern Mariana Islands'),
(148, 'MQ', 'Martinique'),
(149, 'MR', 'Mauritania'),
(150, 'MS', 'Montserrat'),
(151, 'MT', 'Malta'),
(152, 'MU', 'Mauritius'),
(153, 'MV', 'Maldives'),
(154, 'MW', 'Malawi'),
(155, 'MX', 'Mexico'),
(156, 'MY', 'Malaysia'),
(157, 'MZ', 'Mozambique'),
(158, 'NA', 'Namibia'),
(159, 'NC', 'New Caledonia'),
(160, 'NE', 'Niger'),
(161, 'NF', 'Norfolk Island'),
(162, 'NG', 'Nigeria'),
(163, 'NI', 'Nicaragua'),
(164, 'NL', 'Netherlands'),
(165, 'NO', 'Norway'),
(166, 'NP', 'Nepal'),
(167, 'NR', 'Nauru'),
(168, 'NU', 'Niue'),
(169, 'NZ', 'New Zealand'),
(170, 'OM', 'Oman'),
(171, 'PA', 'Panama'),
(172, 'PE', 'Peru'),
(173, 'PF', 'French Polynesia'),
(174, 'PG', 'Papua New Guinea'),
(175, 'PH', 'Philippines'),
(176, 'PK', 'Pakistan'),
(177, 'PL', 'Poland'),
(178, 'PM', 'Saint Pierre and Miquelon'),
(179, 'PN', 'Pitcairn Islands'),
(180, 'PR', 'Puerto Rico'),
(181, 'PS', 'Palestinian Territories'),
(182, 'PT', 'Portugal'),
(183, 'PW', 'Palau'),
(184, 'PY', 'Paraguay'),
(185, 'QA', 'Qatar'),
(186, 'RE', 'RÃ©union'),
(187, 'RO', 'Romania'),
(188, 'RS', 'Serbia'),
(189, 'RU', 'Russia'),
(190, 'RW', 'Rwanda'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SB', 'Solomon Islands'),
(193, 'SC', 'Seychelles'),
(194, 'SD', 'Sudan'),
(195, 'SE', 'Sweden'),
(196, 'SG', 'Singapore'),
(197, 'SH', 'Saint Helena'),
(198, 'SI', 'Slovenia'),
(199, 'SJ', 'Svalbard and Jan Mayen'),
(200, 'SK', 'Slovakia'),
(201, 'SL', 'Sierra Leone'),
(202, 'SM', 'San Marino'),
(203, 'SN', 'Senegal'),
(204, 'SO', 'Somalia'),
(205, 'SR', 'Suriname'),
(206, 'ST', 'SÃ£o TomÃ© and PrÃ­ncipe'),
(207, 'SV', 'El Salvador'),
(208, 'SY', 'Syria'),
(209, 'SZ', 'Swaziland'),
(210, 'TC', 'Turks and Caicos Islands'),
(211, 'TD', 'Chad'),
(212, 'TF', 'French Southern Territories'),
(213, 'TG', 'Togo'),
(214, 'TH', 'Thailand'),
(215, 'TJ', 'Tajikistan'),
(216, 'TK', 'Tokelau'),
(217, 'TL', 'Timor-Leste'),
(218, 'TM', 'Turkmenistan'),
(219, 'TN', 'Tunisia'),
(220, 'TO', 'Tonga'),
(221, 'TR', 'Turkey'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TV', 'Tuvalu'),
(224, 'TW', 'Taiwan'),
(225, 'TZ', 'Tanzania'),
(226, 'UA', 'Ukraine'),
(227, 'UG', 'Uganda'),
(228, 'UM', 'U.S. Minor Outlying Islands'),
(229, 'US', 'United States'),
(230, 'UY', 'Uruguay'),
(231, 'UZ', 'Uzbekistan'),
(232, 'VA', 'Vatican City'),
(233, 'VC', 'Saint Vincent and the Grenadines'),
(234, 'VE', 'Venezuela'),
(235, 'VG', 'British Virgin Islands'),
(236, 'VI', 'U.S. Virgin Islands'),
(237, 'VN', 'Vietnam'),
(238, 'VU', 'Vanuatu'),
(239, 'WF', 'Wallis and Futuna'),
(240, 'WS', 'Samoa'),
(241, 'YE', 'Yemen'),
(242, 'YT', 'Mayotte'),
(243, 'ZA', 'South Africa'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `sobrenome` varchar(30) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `dNascimento` date NOT NULL,
  `sexo` int(11) DEFAULT NULL,
  `cidade` text DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `imagemPerfil` varchar(40) NULL,
  `situacao` int(1) NOT NULL,
  `dataCadastro` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `senha`, `dNascimento`, `sexo`, `cidade`, `idPais`, `celular`, `telefone`, `facebook`, `imagemPerfil`, `situacao`, `dataCadastro`) VALUES
(1, 'Paulinely Morgan', 'da Silva', 'paulinelym@gmail.com', 'dd130d46320ac925bfee204b03d603d1', '1989-06-30', 1, 'Garanhuns', 31, '5587998022994', '558737625905', 'paulinelymorgan', 'c4ca4238a0b923820dcc509a6f75849b.jpg', 1, '2016-11-01');

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `senha`, `dNascimento`, `sexo`, `cidade`, `idPais`, `celular`, `telefone`, `facebook`, `imagemPerfil`, `situacao`, `dataCadastro`) VALUES
(2, 'Diogo', 'Cordeiro', 'diogo.ufrpe@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1990-04-20', 0, 'Sao Bento', 31, '5587111111111', '5587111111112', 'diogosbu', 'camera.jpg', 1, '2016-11-01');

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `senha`, `dNascimento`, `sexo`, `cidade`, `idPais`, `celular`, `telefone`, `facebook`, `imagemPerfil`, `situacao`, `dataCadastro`) VALUES
(3, 'Wagner', 'de Lima', 'waglds@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1990-04-20', 0, 'Garanhuns', 31, '5587111111111', '5587111111112', 'wagnerdelima', 'camera.jpg', 1, '2016-11-01');


--
-- Table structure for table `itens`
--

CREATE TABLE IF NOT EXISTS `itens` (
  `id` varchar(32) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idRelAchado` int(11) DEFAULT NULL,
  `idRelPerdido` int(11) DEFAULT NULL,
  `identificador` varchar(50) DEFAULT NULL,
  `marca` varchar(25) DEFAULT NULL,
  `titulo` varchar(30) NOT NULL,
  `descricao` text NOT NULL,
  `caracteristicas` text NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idSubcategoria` int(11) DEFAULT NULL,
  `cor1` varchar(15) NOT NULL,
  `cor2` varchar(15) DEFAULT NULL,
  `enderFoto` varchar(40) NOT NULL,
  `dataInsercao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
