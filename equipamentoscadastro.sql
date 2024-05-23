-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Maio-2024 às 11:25
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
-- Estrutura da tabela `agendamentodatashow`
--

CREATE TABLE `agendamentodatashow` (
  `id` int(11) NOT NULL,
  `dataturno` varchar(30) DEFAULT NULL,
  `equipamento` int(100) NOT NULL,
  `turno` int(1) DEFAULT NULL,
  `ativo` int(1) DEFAULT 1,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `agendamentodatashow`
--

INSERT INTO `agendamentodatashow` (`id`, `dataturno`, `equipamento`, `turno`, `ativo`, `usuario`) VALUES
(33, '2023-12-06', 14, 2, 1, 5),
(34, '2023-12-08', 14, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentolaboratorio`
--

CREATE TABLE `agendamentolaboratorio` (
  `id` int(11) NOT NULL,
  `laboratorio` int(100) DEFAULT NULL,
  `dataturno` varchar(30) DEFAULT NULL,
  `turno` int(1) DEFAULT NULL,
  `ativo` int(1) DEFAULT 1,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `agendamentolaboratorio`
--

INSERT INTO `agendamentolaboratorio` (`id`, `laboratorio`, `dataturno`, `turno`, `ativo`, `usuario`) VALUES
(36, 16, '2023-12-16', 1, 0, 5),
(37, 17, '2023-12-17', 3, 1, 3),
(38, 17, '2023-12-16', 1, 1, 1);

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
-- Estrutura da tabela `aluno_turma`
--

CREATE TABLE `aluno_turma` (
  `id_aluno` int(11) NOT NULL,
  `nome_turma` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendente`
--

CREATE TABLE `atendente` (
  `idaten` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nasc` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `presenca` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `frequencia`
--

INSERT INTO `frequencia` (`data`, `idaluno`, `idmat`, `presenca`) VALUES
('2024-05-10', 1, 4, 1),
('2024-05-10', 3, 4, 1),
('2024-05-09', 1, 4, 1);

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
  `idprof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`nome`, `cpf`, `data_nasc`, `email`, `idprof`) VALUES
('AYRTON RODRIGUES DIAS', '022.562.171', '1994-06-27', 'ayrton.dias68@gmail.com', 1);

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
  `nome` varchar(35) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `senha` varchar(35) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `ativo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `admin`, `ativo`) VALUES
(1, 'Kajin', 'admin@gmail.com', 'admin123', 1, 1),
(3, 'Jorge', 'salesjorge10@gmail.com', '12345678', 0, 1),
(4, 'professores', 'professoresteste@gmail.com', 'teste1234', 0, 1),
(5, 'Felipe Carlos', 'exper15gamer@gmail.com', 'felipe123', 0, 1),
(6, 'Carlos', 'carlos@gmail.com', '123456', 0, 1),
(7, 'AYRTON RODRIGUES DIAS', 'ayrton.dias68@gmail.com', '123456', 1, 1);

--
-- Índices para tabelas despejadas
--

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
-- Índices para tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`id_aluno`,`nome_turma`);

--
-- Índices para tabela `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`idaten`);

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
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentodatashow`
--
ALTER TABLE `agendamentodatashow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `agendamentolaboratorio`
--
ALTER TABLE `agendamentolaboratorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `atendente`
--
ALTER TABLE `atendente`
  MODIFY `idaten` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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