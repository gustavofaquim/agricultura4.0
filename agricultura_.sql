


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agricultura`
--
CREATE DATABASE IF NOT EXISTS `agricultura` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `agricultura`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `central`
--

DROP TABLE IF EXISTS `central`;
CREATE TABLE `central` (
  `cod` varchar(300) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `central`
--

INSERT INTO `central` (`cod`, `descricao`, `usuario`) VALUES
('203x898m92x8x93m', 'Fazenda Rio Vermelho', 'teste02'),
('212uuy1uyuycxcct', 'IFG', 'teste01'),
('fjdh8343847843m7', 'IF Goiano', 'teste02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos` (
  `id` int NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome`) VALUES
(1, 'administrador'),
(2, 'produtor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sensor`
--

DROP TABLE IF EXISTS `sensor`;
CREATE TABLE `sensor` (
  `id` int NOT NULL,
  `tipo_sensor` int NOT NULL,
  `central` varchar(300) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `sensor`
--

INSERT INTO `sensor` (`id`, `tipo_sensor`, `central`, `descricao`) VALUES
(1, 1, '203x898m92x8x93m', 'Sensor de Umidade 01'),
(2, 3, '203x898m92x8x93m', 'Sensor de Temperatura'),
(3, 1, 'fjdh8343847843m7', 'Sensor de Umidade 01'),
(4, 5, '203x898m92x8x93m', 'Sensor de Umidade do Solo 01'),
(5, 5, '203x898m92x8x93m', 'Sensor de Umidade do Solo 02'),
(6, 5, '203x898m92x8x93m', 'Sensor de Umidade do Solo 03'),
(7, 5, '203x898m92x8x93m', 'Sensor de Umidade do Solo 04'),
(8, 5, '203x898m92x8x93m', 'Sensor de Umidade do Solo 05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sensor`
--

DROP TABLE IF EXISTS `tipo_sensor`;
CREATE TABLE `tipo_sensor` (
  `id` int NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tipo_sensor`
--

INSERT INTO `tipo_sensor` (`id`, `tipo`, `icon`, `color`) VALUES
(1, 'umidade', 'fas fa-tint', 'success'),
(3, 'temperatura', 'fas   fa-temperature-low', 'danger'),
(5, 'solo', 'fa-solid fa-leaf', 'info');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(150) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `grupo` int NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `grupo`, `ativo`) VALUES
(1, 'Teste01', 'teste01', '4dd358fa6de471d8db19a65a5c68a818753f57e6', 1, 1),
(2, 'Teste02', 'teste02', '5fc75d0675707e19079bc0ae1347377f36423785', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `valor_sensor`
--

DROP TABLE IF EXISTS `valor_sensor`;
CREATE TABLE `valor_sensor` (
  `id` int NOT NULL,
  `sensor` int NOT NULL,
  `valor` float NOT NULL,
  `dt_hr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `valor_sensor_temp`
--

DROP TABLE IF EXISTS `valor_sensor_temp`;
CREATE TABLE `valor_sensor_temp` (
  `id` int NOT NULL,
  `sensor` int NOT NULL,
  `valor` float NOT NULL,
  `dt_hr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `valor_sensor_temp`
--

INSERT INTO `valor_sensor_temp` (`id`, `sensor`, `valor`, `dt_hr`) VALUES
(1, 1, 90, '2022-02-05 12:40:20'),
(2, 1, 50, '2022-02-05 14:40:20'),
(3, 1, 90, '2022-02-05 17:57:20'),
(4, 1, 90, '2022-02-05 19:57:20'),
(5, 1, 90, '2022-02-05 21:57:20'),
(6, 2, 37, '2022-02-05 12:40:20'),
(7, 2, 35, '2022-02-05 14:40:20'),
(8, 2, 36, '2022-02-05 17:57:20'),
(9, 2, 28, '2022-02-05 19:57:20'),
(10, 2, 26, '2022-02-05 21:57:20'),
(11, 3, 40, '2022-02-05 12:57:20'),
(12, 1, 60, '2022-03-21 19:24:13'),
(13, 1, 30, '2022-03-20 19:24:46'),
(14, 4, 10, '2022-03-21 21:32:34'),
(15, 5, 15, '2022-03-21 21:32:53'),
(16, 6, 32, '2022-03-21 21:32:53'),
(17, 7, 4, '2022-03-21 21:33:18'),
(18, 8, 12, '2022-03-21 21:33:18'),
(19, 5, 20, '2022-03-21 10:18:21');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `central`
--
ALTER TABLE `central`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `usuario` (`usuario`);

--
-- Índices para tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_sensor` (`tipo_sensor`),
  ADD KEY `central` (`central`);

--
-- Índices para tabela `tipo_sensor`
--
ALTER TABLE `tipo_sensor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `grupo` (`grupo`);

--
-- Índices para tabela `valor_sensor`
--
ALTER TABLE `valor_sensor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sensor` (`sensor`);

--
-- Índices para tabela `valor_sensor_temp`
--
ALTER TABLE `valor_sensor_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sensor` (`sensor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tipo_sensor`
--
ALTER TABLE `tipo_sensor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `valor_sensor`
--
ALTER TABLE `valor_sensor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `valor_sensor_temp`
--
ALTER TABLE `valor_sensor_temp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `central`
--
ALTER TABLE `central`
  ADD CONSTRAINT `central_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`);

--
-- Limitadores para a tabela `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `sensor_ibfk_1` FOREIGN KEY (`tipo_sensor`) REFERENCES `tipo_sensor` (`id`),
  ADD CONSTRAINT `sensor_ibfk_2` FOREIGN KEY (`central`) REFERENCES `central` (`cod`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`id`);

--
-- Limitadores para a tabela `valor_sensor`
--
ALTER TABLE `valor_sensor`
  ADD CONSTRAINT `valor_sensor_ibfk_1` FOREIGN KEY (`sensor`) REFERENCES `sensor` (`id`);

--
-- Limitadores para a tabela `valor_sensor_temp`
--
ALTER TABLE `valor_sensor_temp`
  ADD CONSTRAINT `valor_sensor_temp_ibfk_1` FOREIGN KEY (`sensor`) REFERENCES `sensor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
