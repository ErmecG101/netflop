-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Mar-2022 às 15:09
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `netflop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `admcod` int(11) NOT NULL,
  `admnom` varchar(32) DEFAULT NULL,
  `admsen` varchar(256) DEFAULT NULL,
  `admemail` varchar(256) DEFAULT NULL,
  `admfunc` varchar(64) DEFAULT NULL,
  `admfunccel` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`admcod`, `admnom`, `admsen`, `admemail`, `admfunc`, `admfunccel`) VALUES
(1, 'Rogério', '80177534a0c99a7e3645b52f2027a48b', 'rogerio@netflop.com', 'Rogério', '(14) 99755-4432');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `consulta_resenhas`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `consulta_resenhas` (
`rencod` int(11)
,`pernom` varchar(128)
,`usunom` varchar(128)
,`concod` int(11)
,`contit` varchar(128)
,`rennota` double
,`rentit` varchar(64)
,`codper` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudos`
--

CREATE TABLE `conteudos` (
  `concod` int(11) NOT NULL,
  `contit` varchar(128) DEFAULT NULL,
  `conimg` varchar(128) DEFAULT NULL,
  `condur` varchar(10) DEFAULT NULL,
  `coneps` varchar(10) DEFAULT NULL,
  `consip` varchar(1024) DEFAULT NULL,
  `conaut` varchar(256) DEFAULT NULL,
  `connotimdb` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteudos`
--

INSERT INTO `conteudos` (`concod`, `contit`, `conimg`, `condur`, `coneps`, `consip`, `conaut`, `connotimdb`) VALUES
(18, 'Um programador maluco', 'dir/Um programador maluco/Um programador maluco.png', '1:25:00', '312', 'Uma aventura muito louca', '412412', 6.5),
(19, 'Serelepe do lepe', 'dir/Serelepe do lepe/Serelepe do lepe.png', 'Seriado', '312', 'Uma aventura muito louca', '412412', 7.8),
(20, 'Filme Generalizado', 'dir/Filme Generalizado/Filme Generalizado.png', '15:55:55', '754', 'Uma aventura muito louca', '412412', 0.1),
(21, 'Teste1', 'dir/Teste1/Teste1.png', 'Seriado', '312', '31231231', '312312', 8.6),
(24, 'filme22', 'dir/filme22/filme22.png', 'Seriado', '312', 'uma sinópse ai', '3123123', 4.5),
(25, '86 - Anime', 'dir/86 - Anime/86 - Anime.png', 'Seriado', '7', '31231231', '412412', 4.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretorios`
--

CREATE TABLE `diretorios` (
  `dircod` int(11) NOT NULL,
  `dirdir` varchar(512) DEFAULT NULL,
  `direp` varchar(10) DEFAULT NULL,
  `dirtemp` varchar(32) DEFAULT NULL,
  `codcon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `diretorios`
--

INSERT INTO `diretorios` (`dircod`, `dirdir`, `direp`, `dirtemp`, `codcon`) VALUES
(19, 'dir/Teste1/1/1.mp4', '1', '1', 21),
(20, 'dir/Teste1/1/2.mp4', '2', '1', 21),
(21, 'dir/Serelepe do lepe/1/1.mp4', '1', '1', 19),
(22, 'dir/Serelepe do lepe/1/2.mp4', '2', '1', 19),
(23, 'dir/Teste1/1/4.mp4', '4', '1', 21),
(24, 'dir/Teste1/1/3.mp4', '3', '1', 21),
(25, 'dir/86 - Anime/1/1.mp4', '1', '1', 25),
(26, 'dir/86 - Anime/1/2.mp4', '2', '1', 25),
(27, 'dir/86 - Anime/1/5.mp4', '5', '1', 25),
(28, 'dir/86 - Anime/1/3.mp4', '3', '1', 25),
(29, 'dir/86 - Anime/1/4.mp4', '4', '1', 25);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `diretorios_de_conteudo`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `diretorios_de_conteudo` (
`concod` int(11)
,`contit` varchar(128)
,`dirdir` varchar(512)
,`dirtemp` varchar(32)
,`direp` varchar(10)
,`dircod` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gencon`
--

CREATE TABLE `gencon` (
  `gctcod` int(11) NOT NULL,
  `codgen` int(11) DEFAULT NULL,
  `codcon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `gencon`
--

INSERT INTO `gencon` (`gctcod`, `codgen`, `codcon`) VALUES
(69, 1, 19),
(70, 3, 20),
(71, 4, 20),
(72, 3, 21),
(74, 4, 18),
(75, 3, 25),
(76, 4, 25),
(77, 1, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `gencod` int(11) NOT NULL,
  `gennom` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`gencod`, `gennom`) VALUES
(1, 'Suspense'),
(3, 'Fantasia'),
(4, 'Romance');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gengost`
--

CREATE TABLE `gengost` (
  `gengcod` int(11) NOT NULL,
  `codper` int(11) DEFAULT NULL,
  `codgen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `gengost`
--

INSERT INTO `gengost` (`gengcod`, `codper`, `codgen`) VALUES
(7, 11, 3),
(8, 11, 1),
(9, 1, 3),
(10, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `percod` int(11) NOT NULL,
  `pernom` varchar(128) DEFAULT NULL,
  `perkid` tinyint(1) DEFAULT 0,
  `perpfp` varchar(256) DEFAULT NULL,
  `codusu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`percod`, `pernom`, `perkid`, `perpfp`, `codusu`) VALUES
(1, 'Otávio', 0, 'dir/perfil/Otávio/1.png', 1),
(2, 'Lydia', 0, 'dir/perfil/Otávio/2.png', 1),
(11, 'Ermequi', 0, 'dir/perfil/Ermequi/11.png', 2),
(14, 'Weeb', 0, 'dir/perfil/Ermequi/14.png', 2),
(15, 'Girafarez', 0, 'dir/perfil/Ermequi/15.png', 2),
(16, 'Josoares', 0, 'img/defaulticon.png', 3),
(18, 'Roberto', 0, 'img/defaulticon.png', 6),
(19, 'Byesexyuau', 0, 'img/defaulticon.png', 7);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `perfils_usuario`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `perfils_usuario` (
`usucod` int(11)
,`usunom` varchar(128)
,`perpfp` varchar(256)
,`perkid` tinyint(1)
,`pernom` varchar(128)
,`percod` int(11)
,`codusu` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resenhas`
--

CREATE TABLE `resenhas` (
  `rencod` int(11) NOT NULL,
  `rentit` varchar(64) DEFAULT NULL,
  `rentex` varchar(512) DEFAULT NULL,
  `rennota` double DEFAULT NULL,
  `codper` int(11) DEFAULT NULL,
  `codcon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `resenhas`
--

INSERT INTO `resenhas` (`rencod`, `rentit`, `rentex`, `rennota`, `codper`, `codcon`) VALUES
(5, 'teste', 'afsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfaafsfa', 5, 1, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usucod` int(11) NOT NULL,
  `usunom` varchar(128) DEFAULT NULL,
  `ususen` varchar(128) DEFAULT NULL,
  `usuemail` varchar(256) DEFAULT NULL,
  `usucel` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usucod`, `usunom`, `ususen`, `usuemail`, `usucel`) VALUES
(1, 'Otávio', '202cb962ac59075b964b07152d234b70', 'otaviomarin@gmail.com', '(14) 99692-3852'),
(2, 'Ermequi', '202cb962ac59075b964b07152d234b70', 'ermec3@gmail.com', '(14) 66666-6666'),
(3, 'Josoares', '202cb962ac59075b964b07152d234b70', 'jose@gmail.com', '(19) 87391-2873'),
(6, 'Roberto', '202cb962ac59075b964b07152d234b70', '3123123@fasda.com', '(14) 99321_7171'),
(7, 'Byesexyuau', 'aa7a9b99f8afcb134c3a4f3edf27c2c0', 'optimusgold@hotmail.com', '(24) 98189-0716');

-- --------------------------------------------------------

--
-- Estrutura para vista `consulta_resenhas`
--
DROP TABLE IF EXISTS `consulta_resenhas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consulta_resenhas`  AS SELECT `r`.`rencod` AS `rencod`, `d`.`pernom` AS `pernom`, `d`.`usunom` AS `usunom`, `c`.`concod` AS `concod`, `c`.`contit` AS `contit`, `r`.`rennota` AS `rennota`, `r`.`rentit` AS `rentit`, `r`.`codper` AS `codper` FROM ((`conteudos` `c` join `resenhas` `r`) join `perfils_usuario` `d`) WHERE `r`.`codper` = `d`.`percod` AND `r`.`codcon` = `c`.`concod` ORDER BY `c`.`concod` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para vista `diretorios_de_conteudo`
--
DROP TABLE IF EXISTS `diretorios_de_conteudo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `diretorios_de_conteudo`  AS SELECT `c`.`concod` AS `concod`, `c`.`contit` AS `contit`, `d`.`dirdir` AS `dirdir`, `d`.`dirtemp` AS `dirtemp`, `d`.`direp` AS `direp`, `d`.`dircod` AS `dircod` FROM (`conteudos` `c` join `diretorios` `d`) WHERE `c`.`concod` = `d`.`codcon` ;

-- --------------------------------------------------------

--
-- Estrutura para vista `perfils_usuario`
--
DROP TABLE IF EXISTS `perfils_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `perfils_usuario`  AS SELECT `u`.`usucod` AS `usucod`, `u`.`usunom` AS `usunom`, `p`.`perpfp` AS `perpfp`, `p`.`perkid` AS `perkid`, `p`.`pernom` AS `pernom`, `p`.`percod` AS `percod`, `p`.`codusu` AS `codusu` FROM (`usuarios` `u` join `perfil` `p`) WHERE `p`.`codusu` = `u`.`usucod` ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`admcod`);

--
-- Índices para tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`concod`);

--
-- Índices para tabela `diretorios`
--
ALTER TABLE `diretorios`
  ADD PRIMARY KEY (`dircod`),
  ADD KEY `fkcodcon03` (`codcon`);

--
-- Índices para tabela `gencon`
--
ALTER TABLE `gencon`
  ADD PRIMARY KEY (`gctcod`),
  ADD KEY `fkcodgen01` (`codgen`),
  ADD KEY `fkcodcon01` (`codcon`);

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`gencod`);

--
-- Índices para tabela `gengost`
--
ALTER TABLE `gengost`
  ADD PRIMARY KEY (`gengcod`),
  ADD KEY `fkcodper02` (`codper`),
  ADD KEY `fkcodgen02` (`codgen`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`percod`),
  ADD KEY `fkcodusu01` (`codusu`);

--
-- Índices para tabela `resenhas`
--
ALTER TABLE `resenhas`
  ADD PRIMARY KEY (`rencod`),
  ADD KEY `fkcodper03` (`codper`),
  ADD KEY `fkcodcon02` (`codcon`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usucod`),
  ADD UNIQUE KEY `usuemail` (`usuemail`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `admcod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `concod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `diretorios`
--
ALTER TABLE `diretorios`
  MODIFY `dircod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `gencon`
--
ALTER TABLE `gencon`
  MODIFY `gctcod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `gencod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `gengost`
--
ALTER TABLE `gengost`
  MODIFY `gengcod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `percod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `resenhas`
--
ALTER TABLE `resenhas`
  MODIFY `rencod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usucod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `diretorios`
--
ALTER TABLE `diretorios`
  ADD CONSTRAINT `fkcodcon03` FOREIGN KEY (`codcon`) REFERENCES `conteudos` (`concod`);

--
-- Limitadores para a tabela `gencon`
--
ALTER TABLE `gencon`
  ADD CONSTRAINT `fkcodcon01` FOREIGN KEY (`codcon`) REFERENCES `conteudos` (`concod`),
  ADD CONSTRAINT `fkcodgen01` FOREIGN KEY (`codgen`) REFERENCES `generos` (`gencod`);

--
-- Limitadores para a tabela `gengost`
--
ALTER TABLE `gengost`
  ADD CONSTRAINT `fkcodgen02` FOREIGN KEY (`codgen`) REFERENCES `generos` (`gencod`),
  ADD CONSTRAINT `fkcodper02` FOREIGN KEY (`codper`) REFERENCES `perfil` (`percod`);

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `fkcodusu01` FOREIGN KEY (`codusu`) REFERENCES `usuarios` (`usucod`);

--
-- Limitadores para a tabela `resenhas`
--
ALTER TABLE `resenhas`
  ADD CONSTRAINT `fkcodcon02` FOREIGN KEY (`codcon`) REFERENCES `conteudos` (`concod`),
  ADD CONSTRAINT `fkcodper03` FOREIGN KEY (`codper`) REFERENCES `perfil` (`percod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
