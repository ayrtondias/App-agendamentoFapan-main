-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Maio-2024 às 02:42
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `equipamentoscadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `old_funcao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `id_user`, `old_funcao`) VALUES
(4, 'AYRTON RODRIGUES DIAS', 'ayrton.dias68@gmail.com', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentodatashow`
--

CREATE TABLE `agendamentodatashow` (
  `id` int(11) NOT NULL,
  `solicitante` varchar(100) NOT NULL,
  `dataturno` varchar(30) DEFAULT NULL,
  `equipamento` int(100) NOT NULL,
  `turno` int(1) DEFAULT NULL,
  `ativo` int(1) DEFAULT 1,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `agendamentodatashow`
--

INSERT INTO `agendamentodatashow` (`id`, `solicitante`, `dataturno`, `equipamento`, `turno`, `ativo`, `usuario`) VALUES
(36, 'ayrton', '2024-05-28', 15, 1, 1, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentolaboratorio`
--

CREATE TABLE `agendamentolaboratorio` (
  `id` int(11) NOT NULL,
  `solicitante` varchar(100) NOT NULL,
  `laboratorio` int(100) DEFAULT NULL,
  `dataturno` varchar(30) DEFAULT NULL,
  `turno` int(1) DEFAULT NULL,
  `ativo` int(1) DEFAULT 1,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `agendamentolaboratorio`
--

INSERT INTO `agendamentolaboratorio` (`id`, `solicitante`, `laboratorio`, `dataturno`, `turno`, `ativo`, `usuario`) VALUES
(39, 'ayrton', 15, '2024-05-27', 1, 1, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nasc` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `curso` int(11) NOT NULL,
  `turma` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome`, `cpf`, `data_nasc`, `email`, `curso`, `turma`) VALUES
(1, 'fulano', '12345678901', '2000-01-01', 'fulano@gmail.com', 1, 'CC1'),
(2, 'fulano2', '98765432101', '2002-02-02', 'fulano2@gmail.com', 2, ''),
(3, 'fulano3', '59874515612', '2000-02-01', 'fulano3@gmail.com', 1, 'CC1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendente`
--

CREATE TABLE `atendente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nasc` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `atendente`
--

INSERT INTO `atendente` (`id`, `nome`, `cpf`, `data_nasc`, `email`, `id_user`) VALUES
(1, 'atendente1', '12345678901', '2000-01-20', 'atendente01@gmail.com', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`) VALUES
(1, 'Ciencia da Computação'),
(2, 'Direito'),
(4, 'Medicina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id` int(11) NOT NULL,
  `numero_identificacao` varchar(100) NOT NULL,
  `numero_serie` varchar(100) NOT NULL,
  `disponibilidade` tinyint(1) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `equipamentos`
--

INSERT INTO `equipamentos` (`id`, `numero_identificacao`, `numero_serie`, `disponibilidade`, `marca`) VALUES
(14, '01', '303030', 1, 'EPSON'),
(15, '02', '404040', 1, 'HP'),
(16, '03', '505050', 1, 'CANON'),
(17, '04', '606060', 1, 'TOMATE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE `frequencia` (
  `data` date NOT NULL,
  `idaluno` int(11) NOT NULL,
  `idmat` int(11) NOT NULL,
  `presenca` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `frequencia`
--

INSERT INTO `frequencia` (`data`, `idaluno`, `idmat`, `presenca`, `id`) VALUES
('2024-05-10', 1, 4, 1, 12),
('2024-05-01', 1, 4, 1, 13),
('2024-05-02', 1, 4, 1, 14),
('2024-05-03', 1, 4, 1, 15),
('2024-05-06', 1, 4, 1, 16),
('2024-05-08', 1, 4, 1, 17),
('2024-05-09', 1, 4, 1, 18),
('2024-05-14', 1, 4, 1, 19),
('2024-05-01', 3, 4, 1, 28),
('2024-05-02', 3, 4, 1, 30),
('2024-05-07', 3, 4, 1, 31),
('2024-05-08', 3, 4, 1, 32),
('2024-05-09', 3, 4, 1, 33),
('2024-05-10', 3, 4, 1, 34),
('2024-05-13', 3, 4, 1, 35),
('2024-05-14', 3, 4, 1, 36),
('0000-00-00', 1, 0, 1, 46),
('0000-00-00', 3, 0, 1, 47);

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia_vt`
--

CREATE TABLE `frequencia_vt` (
  `id` int(11) NOT NULL,
  `data_visita` date NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_vt` int(11) NOT NULL,
  `presenca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `frequencia_vt`
--

INSERT INTO `frequencia_vt` (`id`, `data_visita`, `id_aluno`, `id_vt`, `presenca`) VALUES
(21, '2024-05-24', 3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorios`
--

CREATE TABLE `laboratorios` (
  `id` int(11) NOT NULL,
  `nome_sala` varchar(70) DEFAULT NULL,
  `cadeiras` int(11) DEFAULT NULL,
  `disponibilidade` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `laboratorios`
--

INSERT INTO `laboratorios` (`id`, `nome_sala`, `cadeiras`, `disponibilidade`) VALUES
(15, 'Purus', 100, 1),
(16, 'ERPHE', 70, 1),
(17, 'Tucuruí', 50, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`idmateria`, `nome`, `curso`) VALUES
(2, 'Português', 2),
(4, 'Fisica para Computação', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nasc` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idprof` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`nome`, `cpf`, `data_nasc`, `email`, `idprof`, `id_user`) VALUES
('AYRTON RODRIGUES DIAS', '022.562.171', '1994-06-27', 'ayrton.dias68@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof_mat`
--

CREATE TABLE `prof_mat` (
  `id_professor` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `prof_mat`
--

INSERT INTO `prof_mat` (`id_professor`, `id_materia`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `disponivel_m` tinyint(1) NOT NULL,
  `disponivel_t` tinyint(1) NOT NULL,
  `disponivel_n` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `nome`, `disponivel_m`, `disponivel_t`, `disponivel_n`) VALUES
(1, 'Rio Purus', 1, 1, 0),
(2, 'Maracanã', 0, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `nome` varchar(10) NOT NULL,
  `curso` int(100) NOT NULL,
  `serie` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`nome`, `curso`, `serie`, `periodo`, `turno`, `id_sala`) VALUES
('CC1', 1, 8, 1, 'noite', 2),
('DR1', 2, 1, 1, 'noite', 1),
('Md1', 4, 1, 1, 'manha', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(75) DEFAULT NULL,
  `senha` varchar(35) DEFAULT NULL,
  `funcao` tinyint(1) DEFAULT NULL,
  `ativo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `senha`, `funcao`, `ativo`) VALUES
(1, 'ayrton.dias68@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(10, 'atendente01@gmail.com', 'bfd81ee3ed27ad31c95ca75e21365973', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visita_tecnica`
--

CREATE TABLE `visita_tecnica` (
  `id` int(11) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `turma` varchar(20) NOT NULL,
  `data_visita` date NOT NULL,
  `local` varchar(100) NOT NULL,
  `endereco` varchar(500) NOT NULL,
  `inicio` time NOT NULL,
  `fim` time NOT NULL,
  `frequencia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `visita_tecnica`
--

INSERT INTO `visita_tecnica` (`id`, `curso`, `materia`, `turma`, `data_visita`, `local`, `endereco`, `inicio`, `fim`, `frequencia`) VALUES
(1, '1', '4', 'CC1', '2024-05-24', 'fapan', 'Tv. Vileta, 1100 - Pedreira, Belém - PA, 66087-422', '08:00:00', '12:00:00', 1),
(2, '1', '4', 'CC1', '2024-05-27', 'fapan', 'Tv. Vileta, 1100 - Pedreira, Belém - PA, 66087-422', '08:00:00', '12:00:00', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `agendamentodatashow`
--
ALTER TABLE `agendamentodatashow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipamento` (`equipamento`),
  ADD KEY `fk_usuario` (`usuario`);

--
-- Índices para tabela `agendamentolaboratorio`
--
ALTER TABLE `agendamentolaboratorio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboratorio` (`laboratorio`),
  ADD KEY `fk_usuario_lab` (`usuario`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices para tabela `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `frequencia_vt`
--
ALTER TABLE `frequencia_vt`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idmateria`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idprof`);

--
-- Índices para tabela `prof_mat`
--
ALTER TABLE `prof_mat`
  ADD PRIMARY KEY (`id_professor`,`id_materia`);

--
-- Índices para tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`nome`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `visita_tecnica`
--
ALTER TABLE `visita_tecnica`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `agendamentodatashow`
--
ALTER TABLE `agendamentodatashow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `agendamentolaboratorio`
--
ALTER TABLE `agendamentolaboratorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `atendente`
--
ALTER TABLE `atendente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `frequencia`
--
ALTER TABLE `frequencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `frequencia_vt`
--
ALTER TABLE `frequencia_vt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `laboratorios`
--
ALTER TABLE `laboratorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `materia`
--
ALTER TABLE `materia`
  MODIFY `idmateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `visita_tecnica`
--
ALTER TABLE `visita_tecnica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamentodatashow`
--
ALTER TABLE `agendamentodatashow`
  ADD CONSTRAINT `agendamentodatashow_ibfk_1` FOREIGN KEY (`equipamento`) REFERENCES `equipamentos` (`id`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `agendamentolaboratorio`
--
ALTER TABLE `agendamentolaboratorio`
  ADD CONSTRAINT `agendamentolaboratorio_ibfk_1` FOREIGN KEY (`laboratorio`) REFERENCES `laboratorios` (`id`),
  ADD CONSTRAINT `fk_usuario_lab` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
