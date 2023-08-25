-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Jul-2023 às 06:27
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `outdoorsangola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguer`
--

CREATE TABLE `aluguer` (
  `id` int(100) NOT NULL,
  `datainicio` date NOT NULL,
  `datafim` date NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `fk_cliente` int(100) NOT NULL,
  `fk_outdoor` int(11) NOT NULL,
  `fk_gestor` int(11) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluguer`
--

INSERT INTO `aluguer` (`id`, `datainicio`, `datafim`, `imagem`, `fk_cliente`, `fk_outdoor`, `fk_gestor`, `preco`) VALUES
(15, '2023-10-10', '2023-02-12', NULL, 7, 11, 3, 50000),
(16, '2023-10-10', '2023-10-12', NULL, 6, 9, 2, 20000),
(17, '2023-10-10', '2023-11-10', NULL, 6, 14, 1, 93000000),
(19, '2023-07-10', '2023-07-15', NULL, 7, 17, 3, 2500),
(20, '2023-07-20', '2023-07-23', NULL, 7, 18, 3, 2250),
(21, '2023-07-23', '2023-07-23', NULL, 7, 17, 4, 0),
(22, '2023-07-24', '2023-07-30', 'nenhuma', 7, 20, 3, 6000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(100) NOT NULL,
  `tipodecliente` varchar(20) NOT NULL,
  `atividadedaempresa` varchar(20) DEFAULT NULL,
  `fk_users` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `tipodecliente`, `atividadedaempresa`, `fk_users`) VALUES
(2, 'empresa', 'vender liamba', 1),
(4, 'Empresa', 'Vender liambas', 42),
(6, 'particular', 'nenhuma', 45),
(7, 'Empresa', 'Empresa de Juros', 2),
(8, 'particular', 'nenhuma', 53),
(9, 'Particular', '', 58);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprovativos`
--

CREATE TABLE `comprovativos` (
  `id` int(11) NOT NULL,
  `comprovativo` varchar(255) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comprovativos`
--

INSERT INTO `comprovativos` (`id`, `comprovativo`, `fk_user`) VALUES
(1, 'Projecto_AW Recurso.pdf', 2),
(2, '16265387_1325122577534950_4630056488859839273_n.png', 2),
(3, '15', 2),
(4, '18', 26),
(5, '15pdf', 2),
(6, '15pdf', 2),
(7, '15pdf', 2),
(8, '15pdf', 2),
(9, '15.pdf', 2),
(10, '19.pdf', 2),
(11, '19.pdf', 2),
(12, '19.pdf', 2),
(13, '22.pdf', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunas`
--

CREATE TABLE `comunas` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `fk_municipio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comunas`
--

INSERT INTO `comunas` (`id`, `nome`, `fk_municipio`) VALUES
(1, 'Ambriz', 1),
(2, 'Bela Vista', 1),
(3, 'Tabi', 1),
(4, 'Bula Atumba', 2),
(5, 'Quiage', 2),
(6, 'caxito', 3),
(7, 'Barra do Dande', 3),
(8, 'Mabubas', 3),
(9, 'Quicabo', 3),
(10, 'Úcua', 3),
(11, 'Quibaxe', 4),
(12, 'Paredes', 4),
(13, 'Piri', 4),
(14, 'São José das Matas (antiga Quoxe)', 4),
(15, 'Muxaluando', 5),
(16, 'Cage', 5),
(17, 'Canacassala', 5),
(18, 'Gombe', 5),
(19, 'Quicunzo', 5),
(20, 'Quixico', 5),
(21, 'Zala', 5),
(22, 'Pango Aluquém', 6),
(23, 'Cazuangongo', 6),
(24, 'Baía Farta', 7),
(25, 'Dombe Grande', 7),
(26, 'Calahanga', 7),
(27, 'Equimina', 7),
(28, 'Balombo', 8),
(29, 'Chindumbo', 8),
(30, 'Chingongo', 8),
(31, 'Maca Mombolo', 8),
(32, 'Benguela', 9),
(33, 'Bocoio', 10),
(34, 'Chila', 10),
(35, 'Monte Belo', 10),
(36, 'Passe', 10),
(37, 'Cavimbe', 10),
(38, 'Cubal do Lumbo', 10),
(39, 'Caimbambo', 11),
(40, 'Catengue', 11),
(41, 'Caiave', 11),
(42, 'Canhamela', 11),
(43, 'Viangombe', 11),
(44, 'Catumbela', 12),
(45, 'Gama', 12),
(46, 'Biópio', 12),
(47, 'Praia Bebe', 12),
(48, 'Chongoroi', 13),
(49, 'Bolonguera', 13),
(50, 'Camuine', 13),
(51, 'Cubal', 14),
(52, 'Iambala', 14),
(53, 'Capupa', 14),
(54, 'Tumbulo (antiga Lomaum)', 14),
(55, 'Ganda', 15),
(56, 'Babaera', 15),
(57, 'Chicuma', 15),
(58, 'Ebanga', 15),
(59, 'Casseque', 15),
(60, 'Lobito', 16),
(61, 'Egipto Praia', 16),
(62, 'Canjala', 16),
(63, 'Andulo', 17),
(64, 'Calucinga', 17),
(65, 'Cassumbe', 17),
(66, 'Chivaúlo', 17),
(67, 'Camacupa', 18),
(68, 'Ringoma', 18),
(69, 'Santo António da Muinha', 18),
(70, 'Umpulo', 18),
(71, 'Cuanza', 18),
(72, 'Catabola', 19),
(73, 'Chipeta', 19),
(74, 'Caiuera', 19),
(75, 'Chiuca', 19),
(76, 'Sande', 19),
(77, 'Chinguar', 20),
(78, 'Cutato', 20),
(79, 'Cangote', 20),
(80, 'Chitembo', 21),
(81, 'Cachingues', 21),
(82, 'Mutumbo', 21),
(83, 'Mumbué', 21),
(84, 'Malengue', 21),
(85, 'Soma Cuanza', 21),
(86, 'Cuemba', 22),
(87, 'Luando', 22),
(88, 'Munhango', 22),
(89, 'Sachinemuna', 22),
(90, 'Cuíto', 23),
(91, 'Chicala', 23),
(92, 'Cambândua', 23),
(93, 'Cunje', 23),
(94, 'Trumba', 23),
(95, 'Cunhinga', 24),
(96, 'Belo Horizonte', 24),
(97, 'Nharea', 25),
(98, 'Gamba', 25),
(99, 'Lúbia', 25),
(100, 'Caiei', 25),
(101, 'Dando', 25),
(102, 'Belize', 26),
(103, 'Luali', 26),
(104, 'Miconje', 26),
(105, 'Buco-Zau', 27),
(106, 'Inhuca', 27),
(107, 'Necuto', 27),
(108, 'Cabinda', 28),
(109, 'Malembo', 28),
(110, 'Tanto-Zinze', 28),
(111, 'Cacongo', 29),
(112, 'Dinge', 29),
(113, 'Massabi', 29),
(114, 'Calai', 30),
(115, 'Maue', 30),
(116, 'Mavengue', 30),
(117, 'Cuangar', 31),
(118, 'Savate', 31),
(119, 'Caila (antiga Bondo)', 31),
(120, 'Cuchi', 32),
(121, 'Cutato', 32),
(122, 'Chinguanja', 32),
(123, 'Vissati', 32),
(124, 'Cuito Cuanavale', 33),
(125, 'Longa', 33),
(126, 'Lupire', 33),
(127, 'Baixo Longa', 33),
(128, 'Dirico', 34),
(129, 'Xamavera', 34),
(130, 'Mucusso', 34),
(131, 'Mavinga', 35),
(132, 'Cunjamba', 35),
(133, 'Cutuile', 35),
(134, 'Luengue', 35),
(135, 'Menongue', 36),
(136, 'Caiundo', 36),
(137, 'Cueio-Betre', 36),
(138, 'Missombo', 36),
(139, 'Nancova', 37),
(140, 'Rito', 37),
(141, 'Rivungo', 38),
(142, 'Luiana', 38),
(143, 'Chipundo', 38),
(144, 'Neriquinha', 38),
(145, 'Jamba-Cueio', 38),
(146, 'Camabatela', 39),
(147, 'Tango', 39),
(148, 'Maúa', 39),
(149, 'Bindo', 39),
(150, 'Luinga', 39),
(151, 'Banga', 40),
(152, 'Caculo Cabaça', 40),
(153, 'Cariamba', 40),
(154, 'Aldeia Nova', 40),
(155, 'Bolongongo', 41),
(156, 'Terreiro', 41),
(157, 'Quiquiemba', 41),
(158, 'Dondo', 42),
(159, 'Massangano', 42),
(160, 'Danje-ia-Menha', 42),
(161, 'Zenza do Itombe', 42),
(162, 'São Pedro da Quilemba', 42),
(163, 'Nadalatando', 43),
(164, 'Canhoca', 43),
(165, 'Golungo Alto', 44),
(166, 'Cambondo', 44),
(167, 'Cêrca', 44),
(168, 'Quiluanje', 44),
(169, 'Quilombo dos Dembos', 45),
(170, 'Camame', 45),
(171, 'Cavunga', 45),
(172, 'Lucala', 46),
(173, 'Quiangombe', 46),
(174, 'Quiculungo', 47),
(175, 'Samba Caju', 48),
(176, 'Samba Lucala', 48),
(177, 'Gabela', 49),
(178, 'Assango', 49),
(179, 'Cassongue', 50),
(180, 'Pambangala', 50),
(181, 'Dumbi', 50),
(182, 'Atome', 50),
(183, 'Uaco Cungo', 51),
(184, 'Quissanga', 51),
(185, 'Sanga', 51),
(186, 'Conda', 52),
(187, 'Cunjo', 52),
(188, 'Ebo', 53),
(189, 'Condé', 53),
(190, 'Quissanje', 53),
(191, 'Mussende', 54),
(192, 'São Lucas', 54),
(193, 'Quienha', 54),
(194, 'Porto Amboim', 55),
(195, 'Capolo', 55),
(196, 'Quibala', 56),
(197, 'Cariango', 56),
(198, 'Dala Cachibo', 56),
(199, 'Lonhe', 56),
(200, 'Quirimbo', 57),
(201, 'Quilenda', 57),
(202, 'Amboiva', 58),
(203, 'Botera', 58),
(204, 'Seles', 58),
(205, 'Sumbe', 59),
(206, 'Gangula', 59),
(207, 'Gungo', 59),
(208, 'Quicombo', 59),
(209, 'Cahama', 60),
(210, 'Oxinjau', 60),
(211, 'Ondijiva', 61),
(212, 'Môngua', 61),
(213, 'Evale', 61),
(214, 'Nehone Cafima', 61),
(215, 'Simporo', 61),
(216, 'Oncócua', 62),
(217, 'Chitado', 62),
(218, 'Mucolongodijo', 63),
(219, 'Mupa', 63),
(220, 'Calonga', 63),
(221, 'Cuvati', 63),
(222, 'Namacunde', 64),
(223, 'Chiede', 64),
(224, 'Xangongo', 65),
(225, 'Ombala yo Mungu', 65),
(226, 'Naulila', 65),
(227, 'Humbe', 65),
(228, 'Mucope', 65),
(229, 'Bailundo', 66),
(230, 'Lunge', 66),
(231, 'Luvemba', 66),
(232, 'Bimbe', 66),
(233, 'Hengue-Caculo', 66),
(234, 'Caála', 67),
(235, 'Cuíma', 67),
(236, 'Calenga', 67),
(237, 'Catata', 67),
(238, 'Cachiungo', 68),
(239, 'Chiumbo', 68),
(240, 'Chinhama', 68),
(241, 'Chicala-Choloanga', 69),
(242, 'Mbave', 69),
(243, 'Sambo', 69),
(244, 'Samboto (antiga Hungulo)', 69),
(245, 'Chinjenje', 70),
(246, 'Chiaca', 70),
(247, 'Ecunha', 71),
(248, 'Quipeio', 71),
(249, 'Huambo', 72),
(250, 'Chipipa', 72),
(251, 'Calima', 72),
(252, 'Londuimbali', 73),
(253, 'Angalanga', 73),
(254, 'Alto–Hama', 73),
(255, 'Ussoque', 73),
(256, 'Cumbira', 73),
(257, 'Longonjo ', 74),
(258, 'Lépi', 74),
(259, 'Iava', 74),
(260, 'Chilata', 74),
(261, 'Mungo', 75),
(262, 'Cambuengo', 75),
(263, 'Ucuma', 76),
(264, 'Cacoma', 76),
(265, 'Mundundo', 76),
(266, 'Caconda', 77),
(267, 'Gungue', 77),
(268, 'Uaba', 77),
(269, 'Cusse', 77),
(270, 'Caluquembe', 78),
(271, 'Calépi', 78),
(272, 'Ngola', 78),
(273, 'Chiange', 79),
(274, 'Chibemba', 79),
(275, 'Chibia', 80),
(276, 'Capunda-Cavilongo', 80),
(277, 'Quihita', 80),
(278, 'Jau', 80),
(279, 'Chicomba', 81),
(280, 'Cutenda', 81),
(281, 'Chipindo', 82),
(282, 'Bambi', 82),
(283, 'Cuvango', 83),
(284, 'Galangue', 83),
(285, 'Vicungo', 83),
(286, 'Humpata', 84),
(287, 'Jamba', 85),
(288, 'Cassinga', 85),
(289, 'Dongo', 85),
(290, 'Lubango', 86),
(291, 'Arimba', 86),
(292, 'Hoque', 86),
(293, 'Huíla', 86),
(294, 'Matala', 87),
(295, 'Capelongo', 87),
(296, 'Mulondo', 87),
(297, 'Quilengues', 88),
(298, 'Impulo', 88),
(299, 'Dinde', 88),
(300, 'Quipungo', 89),
(301, 'Belas', 90),
(302, 'Barra do Cuanza', 90),
(303, 'Cacuaco', 91),
(304, 'Funda', 91),
(305, 'Cazenga', 92),
(306, 'Ícolo e Bengo', 93),
(307, 'Bom Jesus do Cuanza', 93),
(308, 'Cabiri', 93),
(309, 'Cassoneca', 93),
(310, 'Caculo Cahango', 93),
(311, 'Luanda', 94),
(312, 'Quilamba Quiaxi', 95),
(313, 'Muxima', 96),
(314, 'Demba Chio', 96),
(315, 'Quixinge', 96),
(316, 'Mumbondo', 96),
(317, 'Caboledo', 96),
(318, 'Talatona', 97),
(319, 'Benfica', 97),
(320, 'Viana', 98),
(321, 'Calumbo', 98),
(322, 'Cambulo', 99),
(323, 'Luia', 99),
(324, 'Cachimo', 99),
(325, 'Canzar', 99),
(326, 'Capenda Camulemba', 100),
(327, 'Xinge', 100),
(328, 'Caungula', 101),
(329, 'Camaxilo', 101),
(330, 'Dundo-Chitato', 102),
(331, 'Luachimo', 102),
(332, 'Cuango', 103),
(333, 'Luremo', 103),
(334, 'Cuílo', 104),
(335, 'Caluango', 104),
(336, 'Lóvua', 105),
(337, 'Lubalo', 106),
(338, 'Luangue', 106),
(339, 'Muvuluege', 106),
(340, 'Lucapa', 107),
(341, 'Camissombo', 107),
(342, 'Capaia', 107),
(343, 'Xa–Cassau', 107),
(344, 'Xá-Muteba', 108),
(345, 'Iongo', 108),
(346, 'Cassanje Calucala', 108),
(347, 'Cacolo', 109),
(348, 'Alto Chicapa', 109),
(349, 'Xassengue', 109),
(350, 'Cucumbi', 109),
(351, 'Dala', 110),
(352, 'Cazage', 110),
(353, 'Luma Cassai', 110),
(354, 'Muconda', 111),
(355, 'Muriege', 111),
(356, 'Chiluage', 111),
(357, 'Cassai Sul', 111),
(358, 'Saurimo', 112),
(359, 'Mona Quimbundo', 112),
(360, 'Sombo', 112),
(361, 'Cacuso', 113),
(362, 'Lombe', 113),
(363, 'Quizenga', 113),
(364, 'Pungo-Andongo', 113),
(365, 'Soqueco', 113),
(366, 'Cambundi Catembo', 114),
(367, 'Quitapa', 114),
(368, 'Tala Mungongo', 114),
(369, 'Dumba Cambango', 114),
(370, 'Cangandala', 115),
(371, 'Bembo', 115),
(372, 'Culamagia', 115),
(373, 'Caribo', 115),
(374, 'Caombo', 116),
(375, 'Bange-Angola', 116),
(376, 'Cambo Suinginge', 116),
(377, 'Micanda', 116),
(378, 'Cuaba Nzoji', 117),
(379, 'Mufuma', 117),
(380, 'Cunda-Dia-Baze', 118),
(381, 'Lemba', 118),
(382, 'Milando', 118),
(383, 'Calandula', 119),
(384, 'Cateco Cangola', 119),
(385, 'Cota', 119),
(386, 'Cuale', 119),
(387, 'Quinje', 119),
(388, 'Luquembo', 120),
(389, 'Quimbango', 120),
(390, 'Capunda', 120),
(391, 'Dombo', 120),
(392, 'Cunga Palanga', 120),
(393, 'Rimba', 120),
(394, 'Malanje', 121),
(395, 'Nugola-Luije', 121),
(396, 'Cambaxe', 121),
(397, 'Marimba', 122),
(398, 'Cabombo', 122),
(399, 'Tembo-Aluma', 122),
(400, 'Massango', 123),
(401, 'Quihuhu', 123),
(402, 'Quinguengue', 123),
(403, 'Mucari', 124),
(404, 'Catala', 124),
(405, 'Caxinga', 124),
(406, 'Muquixe', 124),
(407, 'Quela', 125),
(408, 'Xandele', 125),
(409, 'Moma', 125),
(410, 'Bângalas', 125),
(411, 'Quirima', 126),
(412, 'Sautar', 126),
(413, 'Cazombo', 127),
(414, 'Nana Candundo', 127),
(415, 'Lumbala Caquengue', 127),
(416, 'Macondo', 127),
(417, 'Caianda', 127),
(418, 'Calunda', 127),
(419, 'Lóvua Leste', 127),
(420, 'Lumbala Guimbo', 128),
(421, 'Lutembo', 128),
(422, 'Chiume', 128),
(423, 'Luvuei', 128),
(424, 'Ninda', 128),
(425, 'Mussuma', 128),
(426, 'Sessa', 128),
(427, 'trcoa', 128),
(428, 'Camanongue', 128),
(429, 'Cameia', 129),
(430, 'Léua', 130),
(431, 'Liangongo', 130),
(432, 'Luau', 131),
(433, 'Luacano', 132),
(434, 'Lago-Dilolo', 132),
(435, 'Luchazes', 133),
(436, 'Cangombe', 133),
(437, 'Cassamba', 133),
(438, 'Tempué', 133),
(439, 'Muié', 133),
(440, 'Luena', 134),
(441, 'Cangumbe', 134),
(442, 'Cachipoque', 134),
(443, 'Lucusse', 134),
(444, 'Lutuai (antiga Muangai)', 134),
(445, 'Bibala', 135),
(446, 'Caitou', 135),
(447, 'Capangombe', 135),
(448, 'Lola', 135),
(449, 'Camucuio', 136),
(450, 'Mamué', 136),
(451, 'Chingo', 136),
(452, 'Moçâmedes', 137),
(453, 'Lucira', 137),
(454, 'Bentiaba', 137),
(455, 'Tômbua', 138),
(456, 'Iona', 138),
(457, 'São Martinho dos Tigres', 138),
(458, 'Virei', 139),
(459, 'Cainde', 139),
(460, 'Cangola', 140),
(461, 'Bengo', 140),
(462, 'Caiongo', 140),
(463, 'Nova Ambuíla', 141),
(464, 'Quipedro', 141),
(465, 'Bembe', 142),
(466, 'Lucunga', 142),
(467, 'Mabaia', 142),
(468, 'Buengas', 143),
(469, 'Nova Esperança (antiga Buenga Norte)', 143),
(470, 'Cuilo-Camboso', 143),
(471, 'Bungo', 144),
(472, 'Damba', 145),
(473, 'Mabanza Sosso', 145),
(474, 'Camatambo', 145),
(475, 'Lêmboa', 145),
(476, 'Petecusso', 145),
(477, 'Milunga', 146),
(478, 'Macocola', 146),
(479, 'Macolo', 146),
(480, 'Massau', 146),
(481, 'Maquela do Zombo', 147),
(482, 'Beu', 147),
(483, 'Cuilo Futa', 147),
(484, 'Quibocolo', 147),
(485, 'Sacandica', 147),
(486, 'Mucaba', 148),
(487, 'Uando', 148),
(488, 'Negage', 149),
(489, 'Dimuca', 149),
(490, 'Quisseque', 149),
(491, 'Puri', 150),
(492, 'Quimbele', 151),
(493, 'Cuango', 151),
(494, 'Icoca', 151),
(495, 'Alto Zaza', 151),
(496, 'Quitexe', 152),
(497, 'Aldeia Viçosa', 152),
(498, 'Cambamba', 152),
(499, 'Vista Alegre', 152),
(500, 'Sanza Pombo', 153),
(501, 'Cuilo Pombo', 153),
(502, 'Uamba', 153),
(503, 'Alfândega', 153),
(504, 'Songo', 154),
(505, 'Quivuenga', 154),
(506, 'Uíge', 156),
(507, 'Cuimba', 157),
(508, 'Buela', 157),
(509, 'Serra da Canda', 157),
(510, 'Luvaca', 157),
(511, 'Mbanza Congo', 158),
(512, 'Calambata', 158),
(513, 'Caluca', 158),
(514, 'Quiende', 158),
(515, 'Luvu', 158),
(516, 'Madimba', 158),
(517, 'Nóqui', 159),
(518, 'Lufico', 159),
(519, 'Mepala Lulendo', 159),
(520, 'Nezeto', 160),
(521, 'Mussera', 160),
(522, 'Quibala Norte', 160),
(523, 'Quindeje', 160),
(524, 'Soio', 161),
(525, 'Sumba', 161),
(526, 'Pedra de Feitiço', 161),
(527, 'Quêlo', 161),
(528, 'Mangue Grande', 161),
(529, 'Tomboco', 162),
(530, 'Quinsimba', 162),
(531, 'Quinzau', 162);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

CREATE TABLE `gestor` (
  `id` int(11) NOT NULL,
  `solicitacoes` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `gestor`
--

INSERT INTO `gestor` (`id`, `solicitacoes`, `fk_user`) VALUES
(1, 27, 26),
(2, 11, 51),
(3, 7, 52),
(4, 1, 56);

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipios`
--

CREATE TABLE `municipios` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `fk_provincia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `municipios`
--

INSERT INTO `municipios` (`id`, `nome`, `fk_provincia`) VALUES
(1, 'Ambriz', 1),
(2, 'Bula Atumba', 1),
(3, 'Dande', 1),
(4, 'Dembos', 1),
(5, 'Nambuangongo', 1),
(6, 'Pango Aluquém', 1),
(7, 'Baía Farta', 2),
(8, 'Balombo', 2),
(9, 'Benguela', 2),
(10, 'Bocoio', 2),
(11, 'Caimbambo', 2),
(12, 'Catumbela', 2),
(13, 'Chongoroi', 2),
(14, 'Cubal', 2),
(15, 'Ganda', 2),
(16, 'Lobito', 2),
(17, 'Andulo', 3),
(18, 'Camacupa', 3),
(19, 'Catabola', 3),
(20, 'Chinguar', 3),
(21, 'Chitembo', 3),
(22, 'Cuemba', 3),
(23, 'Cuíto', 3),
(24, 'Cunhinga', 3),
(25, 'Nharea', 3),
(26, 'Belize', 4),
(27, 'Buco-Zau', 4),
(28, 'Cabinda', 4),
(29, 'Cacongo', 4),
(30, 'Calai', 5),
(31, 'Cuangar', 5),
(32, 'Cuchi', 5),
(33, 'Cuito Cuanavale', 5),
(34, 'Dirico', 5),
(35, 'Mavinga', 5),
(36, 'Menongue', 5),
(37, 'Nancova', 5),
(38, 'Rivungo', 5),
(39, 'Ambaca', 6),
(40, 'Banga', 6),
(41, 'Bolongongo', 6),
(42, 'Cambambe', 6),
(43, 'Cazengo', 6),
(44, 'Golungo Alto', 6),
(45, 'Gonguembo', 6),
(46, 'Lucala', 6),
(47, 'Quiculungo', 6),
(48, 'Samba Caju', 6),
(49, 'Amboim', 7),
(50, 'Cassongue', 7),
(51, 'Cela', 7),
(52, 'Conda', 7),
(53, 'Ebo', 7),
(54, 'Mussende', 7),
(55, 'Porto Amboim', 7),
(56, 'Quibala', 7),
(57, 'Quilenda', 7),
(58, 'Seles', 7),
(59, 'Sumbe', 7),
(60, 'Cahama', 8),
(61, 'Cuanhama', 8),
(62, 'Curoca', 8),
(63, 'Cuvelai', 8),
(64, 'Namacunde', 8),
(65, 'Ombadija', 8),
(66, 'Bailundo', 9),
(67, 'Caála', 9),
(68, 'Cachiungo', 9),
(69, 'Chicala-Choloanga', 9),
(70, 'Chinjenje', 9),
(71, 'Ecunha', 9),
(72, 'Huambo', 9),
(73, 'Londuimbali', 9),
(74, 'Longonjo', 9),
(75, 'Mungo', 9),
(76, 'Ucuma', 9),
(77, 'Caconda', 10),
(78, 'Caluquembe', 10),
(79, 'Chiange', 10),
(80, 'Chibia', 10),
(81, 'Chicomba', 10),
(82, 'Chipindo', 10),
(83, 'Cuvango', 10),
(84, 'Humpata', 10),
(85, 'Jamba', 10),
(86, 'Lubango', 10),
(87, 'Matala', 10),
(88, 'Quilengues', 10),
(89, 'Quipungo', 10),
(90, 'Belas', 11),
(91, 'Cacuaco', 11),
(92, 'Cazenga', 11),
(93, 'Ícolo e Bengo', 11),
(94, 'Luanda', 11),
(95, 'Quilamba Quiaxi', 11),
(96, 'Quissama', 11),
(97, 'Talatona', 11),
(98, 'Viana', 11),
(99, 'Cambulo', 12),
(100, 'Capenda Camulemba', 12),
(101, 'Caungula', 12),
(102, 'Chitato', 12),
(103, 'Cuango', 12),
(104, 'Cuílo', 12),
(105, 'Lóvua', 12),
(106, 'Lubalo', 12),
(107, 'Lucapa', 12),
(108, 'Xá-Muteba', 12),
(109, 'Cacolo', 13),
(110, 'Dala', 13),
(111, 'Muconda', 13),
(112, 'Saurimo', 13),
(113, 'Cacuso', 14),
(114, 'Cambundi Catembo', 14),
(115, 'Cangandala', 14),
(116, 'Caombo', 14),
(117, 'Cuaba Nzoji', 14),
(118, 'Cunda-Dia-Baze', 14),
(119, 'Calandula', 14),
(120, 'Luquembo', 14),
(121, 'Malanje', 14),
(122, 'Marimba', 14),
(123, 'Massango', 14),
(124, 'Mucari', 14),
(125, 'Quela', 14),
(126, 'Quirima', 14),
(127, 'Alto Zambeze', 15),
(128, 'Bundas', 15),
(129, 'Camanongue', 15),
(130, 'Cameia', 15),
(131, 'Léua', 15),
(132, 'Luau', 15),
(133, 'Luacano', 15),
(134, 'Luchazes', 15),
(135, 'Moxico', 15),
(136, 'Bibala', 16),
(137, 'Camucuio', 16),
(138, 'Moçâmedes', 16),
(139, 'Tômbua', 16),
(140, 'Virei', 16),
(141, 'Alto Cauale', 17),
(142, 'Ambuíla', 17),
(143, 'Bembe', 17),
(144, 'Buengas', 17),
(145, 'Bungo', 17),
(146, 'Damba', 17),
(147, 'Milunga', 17),
(148, 'Maquela do Zombo', 17),
(149, 'Mucaba', 17),
(150, 'Negage', 17),
(151, 'Puri', 17),
(152, 'Quimbele', 17),
(153, 'Quitexe', 17),
(154, 'Sanza Pombo', 17),
(155, 'Songo', 17),
(156, 'Uíge', 17),
(157, 'Cuimba', 18),
(158, 'Mabanza Congo', 18),
(159, 'Nóqui', 18),
(160, 'Nezeto', 18),
(161, 'Soio', 18),
(162, 'Tomboco', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nacionalidade`
--

CREATE TABLE `nacionalidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nacionalidade`
--

INSERT INTO `nacionalidade` (`id`, `nome`) VALUES
(1, 'afegão'),
(2, 'andorrano'),
(3, 'angolano'),
(4, 'antiguano'),
(5, 'argelino'),
(6, 'argentino'),
(7, 'armênio'),
(8, 'australiano'),
(9, 'austríaco'),
(10, 'azeri '),
(11, 'bahamense'),
(12, 'bangladês'),
(13, 'barbadiano'),
(14, 'baremita'),
(15, 'bielorrusso'),
(16, 'belga'),
(17, 'belizenho'),
(18, 'beninense'),
(19, 'boliviano'),
(20, 'bósnio'),
(21, 'bechuano'),
(22, 'brasileiro'),
(23, 'bruneano'),
(24, 'búlgaro'),
(25, 'burquinense'),
(26, 'burundês '),
(27, ' butanense'),
(28, 'cabo-verdiano '),
(29, 'camaronense '),
(30, 'cambojano '),
(31, 'canadense '),
(32, 'centroafricano '),
(33, 'chadiano '),
(34, 'chinês '),
(35, ' chileno'),
(36, 'cookiano '),
(37, 'colombiano '),
(38, ' comoriano'),
(39, ' costa-riquenho'),
(40, 'croata '),
(41, 'Cubano '),
(42, 'cipriota '),
(43, 'tcheco '),
(44, ' congolense'),
(45, ' dinamarquês'),
(46, 'djibutiense '),
(47, 'dominiquense '),
(48, 'dominicano '),
(49, 'timorense '),
(50, ' equatoriano'),
(51, ' egípcio'),
(52, 'salvadorenho '),
(53, ' inglês'),
(54, 'guinéu-equatoriano '),
(55, 'eritreu '),
(56, ' estoniano'),
(57, 'fijiano '),
(58, ' finlandês'),
(59, ' francês'),
(60, 'gabonense '),
(61, ' gambiano'),
(62, ' geórgico'),
(63, ' alemão'),
(64, 'granadino '),
(65, 'grego '),
(66, ' guatemalteco'),
(67, ' guineano'),
(68, ' guineense'),
(69, 'guianense '),
(70, ' haitiano'),
(71, 'holandês '),
(72, 'hondurenho '),
(73, ' húngaro'),
(74, ' islandês'),
(75, 'indiano '),
(76, 'indonésio '),
(77, ' iraniano'),
(78, ' irlandês'),
(79, ' israelita'),
(80, ' italiano'),
(81, 'costa-marfinense '),
(82, 'jamaicano '),
(83, 'japonês '),
(84, 'jordão '),
(85, ' cazaque'),
(86, ' queniano'),
(87, ' quiribatiano'),
(88, ' quirguistanês'),
(89, 'kuwaitiano '),
(90, 'laosiano '),
(91, ' letoniano'),
(92, 'libanês '),
(93, ' lesotiano'),
(94, 'liberiano '),
(95, ' liechtensteinense'),
(96, 'lituano '),
(97, 'luxemburguês '),
(98, 'líbio '),
(99, ' macedônio'),
(100, ' madagascarense'),
(101, 'malaio '),
(102, ' malauiano'),
(103, 'maldivo '),
(104, ' maliano'),
(105, ' maltês'),
(106, 'mauriciano '),
(107, ' mauritano'),
(108, ' marshallino'),
(109, ' micronésio'),
(110, 'mexicano '),
(111, 'marroquino '),
(112, ' moldávio'),
(113, ' monegasco'),
(114, ' mongol'),
(115, 'montenegrino '),
(116, 'moçambicano '),
(117, 'birmanês '),
(118, ' namibiano'),
(119, 'nauruano '),
(120, 'nepalês '),
(121, 'neozelandês '),
(122, ' nicaraguense'),
(123, 'nigerino '),
(124, ' nigeriano'),
(125, ' niuano'),
(126, ' norte-coreano'),
(127, ' norueguês'),
(128, ' omanense'),
(129, ' palestino'),
(130, ' paquistanês'),
(131, ' palauense'),
(132, 'panamenho '),
(133, 'papuásio '),
(134, ' paraguaio'),
(135, ' peruano'),
(136, 'filipino '),
(137, ' polonês'),
(138, ' português'),
(139, 'catarense '),
(140, ' romeno'),
(141, 'russo '),
(142, ' ruandês'),
(143, 'samoano '),
(144, ' santa-lucense'),
(145, 'são-cristovense '),
(146, ' são-marinense'),
(147, 'são-tomense '),
(148, 'são-vicentino '),
(149, 'escocês '),
(150, ' senegalense'),
(151, 'sérvio '),
(152, 'seichelense '),
(153, 'serra-leonês '),
(154, ' singapurense'),
(155, ' eslovaco'),
(156, ' salomônico'),
(157, ' somali'),
(158, 'sul–africano '),
(159, 'coreano '),
(160, ' sul-sudanense'),
(161, 'espanhol '),
(162, 'srilankês '),
(163, ' sudanense'),
(164, ' surinamês'),
(165, ' suazi'),
(166, 'sueco '),
(167, ' suíço'),
(168, ' sírio'),
(169, 'tajique '),
(170, 'tanzaniano '),
(171, ' tailandês'),
(172, 'togolês '),
(173, 'tonganês '),
(174, ' trinitário'),
(175, ' tunisiano'),
(176, ' turcomeno'),
(177, 'turco '),
(178, ' tuvaluano'),
(179, 'ucraniano '),
(180, ' ugandês'),
(181, 'uruguaio '),
(182, ' árabe'),
(183, ' britânico'),
(184, ' americano '),
(185, ' uzbeque'),
(186, ' vanuatuano'),
(187, 'venezuelano '),
(188, ' vietnamita'),
(189, ' galês'),
(190, ' iemenita'),
(191, 'zambiano '),
(192, 'zimbabueano ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `outdoor`
--

CREATE TABLE `outdoor` (
  `id` int(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `tipodeoutdoor` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `comuna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `outdoor`
--

INSERT INTO `outdoor` (`id`, `estado`, `preco`, `tipodeoutdoor`, `provincia`, `municipio`, `comuna`) VALUES
(1, 'ocupado', 1000, 'Faixadas', 'luanda', 'Cacuaco', 'Cacuaco'),
(9, 'A aguardar pagamento', 10001, 'Paineis Luminosos', 'namibe', 'Moçâmedes', 'Tômbua'),
(10, 'disponivel', 10000, 'Paineis Não Luminosos', 'luanda', 'Cazenga', 'Cazenga'),
(11, 'disponivel', 50000, 'Faixadas', 'huambo', 'Lubango', 'Lubango'),
(12, 'disponivel', 1000000, 'Placas Indicativas', 'cuanza sul', 'Quibala', 'Quibala'),
(14, 'disponivel', 3000000, 'Lampoles', 'luanda', 'Belas', 'Belas'),
(15, 'ocupado', 105, 'Paineis Luminosos', 'zaire', 'Tomboco', 'Tomboco'),
(16, 'disponivel', 1000, 'Paineis Não Luminosos', 'luanda', 'Luanda', 'Luanda'),
(17, 'A aguardar pagamento', 500, 'Faixadas', 'benguela', 'Benguela', 'Lobito'),
(18, 'por validar pagamento', 750, 'Placas Indicativas', 'lunda sul', 'Quibala', 'Quibala'),
(19, 'disponivel', 10000, 'Lampoles', 'zaire', 'Lobito', 'Zala'),
(20, 'disponivel', 10000, 'Paineis Luminosos', 'luanda', 'Belas', 'Belas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincias`
--

CREATE TABLE `provincias` (
  `id` int(3) NOT NULL,
  `nome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `provincias`
--

INSERT INTO `provincias` (`id`, `nome`) VALUES
(1, 'bengo'),
(2, 'benguela'),
(3, 'bie'),
(4, 'cabinda'),
(5, 'cuando-cubango'),
(6, 'cuanza norte'),
(7, 'cuanza sul'),
(8, 'cunene'),
(9, 'huambo'),
(10, 'huila'),
(11, 'luanda'),
(12, 'lunda norte'),
(13, 'lunda sul'),
(14, 'malanje'),
(15, 'moxico'),
(16, 'namibe'),
(17, 'uige'),
(18, 'zaire');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `provincia` varchar(25) NOT NULL,
  `municipio` varchar(25) NOT NULL,
  `comuna` varchar(25) NOT NULL,
  `nacionalidade` varchar(25) NOT NULL,
  `morada` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telemovel` int(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `estadoConta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `provincia`, `municipio`, `comuna`, `nacionalidade`, `morada`, `email`, `telemovel`, `username`, `password`, `perfil`, `estadoConta`) VALUES
(1, 'Anthony Ngola', 'luanda', 'belas', 'belas', 'angola', 'kilamba b27', 'ngolajr@hotmail.com', 943149945, 'antoniongola', '1234', 'administrador', 'ativo'),
(2, 'Henriques Lopes Ngola', 'Luanda', 'Belas', 'Belas', 'angolano', 'reino de céus', 'Edsonwena22@gmail.com', 943149945, 'Edsonwena22', '1234', 'cliente', 'ativo'),
(26, 'teste II', 'luanda', 'belas', 'belas', 'angola', 'Kilamba', 'gestor@hotmail.com', 993304521, 'kidmau', '1234', 'gestor', 'autenticado'),
(42, 'Anthony Ngola', 'luanda', 'Viana', 'Viana', 'angolano\"\"\"\"', 'kilamba b27', 'antoniongola10@gmail.com', 943149945, 'antoniongola', '1234', 'cliente', 'ativo'),
(45, 'Cesar de carvalho', '-- Província --', '-- Município --', '-- Comuna --', 'angolano\"', 'KILAMU', 'cesarngola@hotmail.com', 923506319, 'kid mau', '1234', 'cliente', 'ativo'),
(47, 'novo gestor', '-- Província --', '-- Município --', '-- Comuna --', 'angolano', 'kilamba', 'loironaspontas20@gmail.com', 943149945, 'novo gestor', '1234', 'gestor', 'autenticar'),
(51, 'wow mau', '-- Província --', '-- Município --', '-- Comuna --', 'angolano', 'ajkdfs', 'ww@gmail.com', 943149945, 'wow', '1234', 'gestor', 'autenticar'),
(52, 'ngola jr', '-- Província --', '-- Município --', '-- Comuna --', 'angolano', 'kilamba', 'kidmau@gmail.com', 943149945, 'ultimo gestor', '1234', 'gestor', 'autenticado'),
(53, 'Derby Candido', '-- Província --', '-- Município --', '-- Comuna --', 'angolano', 'Kilamba Quarteirão C', 'Derbydervy@gmail.com', 940, 'DC', '1234', 'cliente', 'ativo'),
(56, 'Pai grande mais bom que Deus', 'luanda', 'Luanda', 'Luanda', 'angolano', 'kilamba', 'paigrande@hotmail.com', 2147483647, 'pai grande', '1234', 'gestor', 'autenticar'),
(58, 'ai ai ', 'luanda', 'Luanda', 'Luanda', 'angolano', 'kilamba', 'ngolajr@gmail.com', 2147483647, 'ads', '1234', 'user', 'ativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluguer`
--
ALTER TABLE `aluguer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_outdoor` (`fk_outdoor`),
  ADD KEY `fk_cliente` (`fk_cliente`),
  ADD KEY `fk_gestor` (`fk_gestor`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users` (`fk_users`);

--
-- Índices para tabela `comprovativos`
--
ALTER TABLE `comprovativos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Índices para tabela `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_municipio` (`fk_municipio`);

--
-- Índices para tabela `gestor`
--
ALTER TABLE `gestor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Índices para tabela `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_provincia` (`fk_provincia`);

--
-- Índices para tabela `nacionalidade`
--
ALTER TABLE `nacionalidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `outdoor`
--
ALTER TABLE `outdoor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluguer`
--
ALTER TABLE `aluguer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `comprovativos`
--
ALTER TABLE `comprovativos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;

--
-- AUTO_INCREMENT de tabela `gestor`
--
ALTER TABLE `gestor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de tabela `nacionalidade`
--
ALTER TABLE `nacionalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT de tabela `outdoor`
--
ALTER TABLE `outdoor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluguer`
--
ALTER TABLE `aluguer`
  ADD CONSTRAINT `aluguer_ibfk_1` FOREIGN KEY (`fk_outdoor`) REFERENCES `outdoor` (`id`),
  ADD CONSTRAINT `aluguer_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_gestor` FOREIGN KEY (`fk_gestor`) REFERENCES `gestor` (`id`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`fk_users`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `comprovativos`
--
ALTER TABLE `comprovativos`
  ADD CONSTRAINT `comprovativos_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `comunas`
--
ALTER TABLE `comunas`
  ADD CONSTRAINT `fk_municipio` FOREIGN KEY (`fk_municipio`) REFERENCES `municipios` (`id`);

--
-- Limitadores para a tabela `gestor`
--
ALTER TABLE `gestor`
  ADD CONSTRAINT `gestor_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `fk_provincia` FOREIGN KEY (`fk_provincia`) REFERENCES `provincias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
