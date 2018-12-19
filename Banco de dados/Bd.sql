-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2016 às 04:29
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadastro`
--
CREATE DATABASE IF NOT EXISTS `cadastro` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `cadastro`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(20) NOT NULL,
  `comentario` text COLLATE utf8_bin NOT NULL,
  `dono` varchar(500) COLLATE utf8_bin NOT NULL,
  `id_texto` int(11) NOT NULL,
  `nome_dono` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `dono`, `id_texto`, `nome_dono`) VALUES
(1, 'Gostei mto do texto, porém percebi um errinho na linha 5, se corrigir fica perfeito.', '1', 1, 'Andrey Evyk Garrido Rodrigues');

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_cmt`
--

CREATE TABLE `controle_cmt` (
  `id_texto` int(11) NOT NULL,
  `id_coment` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `controle_cmt`
--

INSERT INTO `controle_cmt` (`id_texto`, `id_coment`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `textos`
--

CREATE TABLE `textos` (
  `id` int(11) NOT NULL,
  `texto` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `textos`
--

INSERT INTO `textos` (`id`, `texto`, `titulo`, `id_user`) VALUES
(1, 'Grave problema presente no Brasil é o baixo nível cultural da população devido à falta de leitura de boa qualidade. Segundo o Pisa (Programa internacional de avaliação de alunos), que verifica a capacidade de leitura do jovem, dentre os 32 países envolvidos na pesquisa de 2001, o nosso ficou com a última colocação.\r\nUm dos fatores que provocam a falta de domínio da leitura na avaliação brasileira é a escassez de livrarias: apenas uma para cada 84,4 mil habitantes. Porém, essa não é a única razão: o brasileiro prefere ler futilidades que pouco ou nada acrescentam ao seu intelecto a se dedicar aos grandes nomes da literatura.\r\nOs políticos tentam suavizar a situação do semi-analfabetismo gerada pela falta de leitura com o discurso de que é perfeitamente normal que algumas pessoas alcancem o final do ensino médio sem saber expressar suas idéias por meio da escrita. Obviamente, é “perfeitamente norma”, visto que o sistema de repetência foi indevidamente abolido nas escolas públicas.\r\nÉ imprescindível que a leitura no Brasil seja estimulada desde a infância e que o sistema de ensino sofra uma revisão. Nossa nação não pode aspirar ao desenvolvimento tendo tão deficiente capital humano.', 'Livros desprezados', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `senha` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `sexo` varchar(50) COLLATE utf8_bin NOT NULL,
  `ft_perfil` varchar(250) COLLATE utf8_bin NOT NULL DEFAULT './imagens/uploads/perfil_no_img.gif'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `usuario`, `senha`, `email`, `sexo`, `ft_perfil`) VALUES
(1, 'Andrey Evyk Garrido Rodrigues', 'andreyevyk', 'e68b113439c5f1751a61bf800e99e22f', 'andreyevyk13@gmail.com', 'M', './imagens/uploads/perfil_no_img.gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textos`
--
ALTER TABLE `textos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `textos`
--
ALTER TABLE `textos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
