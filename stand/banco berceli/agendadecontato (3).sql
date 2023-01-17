-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Set-2022 às 01:05
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agendadecontato`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_Id` varchar(2) NOT NULL,
  `Categoria_Descricao` varchar(51) NOT NULL,
  `Flag` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_Id`, `Categoria_Descricao`, `Flag`) VALUES
('A', 'Categoria Amigos', 0),
('C', 'Categoria Certa', 0),
('F', 'Categoria Familia', 0),
('G', 'Categoria Geral', 0),
('R', 'Categoria Errada', 9),
('T', 'Categoria Trabalho', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `Fk_Categoria` varchar(2) NOT NULL,
  `Id_Contato` int(11) NOT NULL,
  `Contato_Nome` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CEP_Contato` decimal(8,0) NOT NULL,
  `Endereco_UF` varchar(2) NOT NULL,
  `Endereco_Cidade` varchar(100) NOT NULL,
  `Endereco_Bairro` varchar(100) NOT NULL,
  `Endereco_Rua` varchar(100) NOT NULL,
  `Endereco_Nro` varchar(20) NOT NULL,
  `Endereco_Compl` varchar(50) NOT NULL,
  `Favorito` tinyint(1) DEFAULT 0,
  `Flag` tinyint(1) DEFAULT 0,
  `Fk_Usuario` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`Fk_Categoria`, `Id_Contato`, `Contato_Nome`, `Email`, `CEP_Contato`, `Endereco_UF`, `Endereco_Cidade`, `Endereco_Bairro`, `Endereco_Rua`, `Endereco_Nro`, `Endereco_Compl`, `Favorito`, `Flag`, `Fk_Usuario`) VALUES
('G', 12, 'Vinicius ', 'vinicius@gmail.com', '19060000', 'SP', 'Presidente Prudente', 'Vila Santa Helena', 'Avenida Manoel Goulart', '2881', 'casa', 0, 0, 'Geovana'),
('R', 13, 'Matheus', 'vinicius@gmail.com', '19060000', 'SP', 'Presidente Prudente', 'Vila Santa Helena', 'ruaCad', '2881', 'sem com', 1, 1, 'Geovana'),
('A', 14, 'Matheus', 'matheus@gmail.com', '19060000', 'SP', 'Presidente Prudente', 'Vila Santa Helena', 'ruaCad', '2881', 'casa', 0, 0, 'Erich'),
('A', 15, 'Joao', 'joao@gmail.com', '19060000', 'SP', 'Presidente Prudente', 'Vila Santa Helena', 'ruaCad', '2881', 'casa', 0, 0, 'Erich'),
('A', 16, 'TEste', 'teste@gmailc.om', '19060000', 'SP', 'Presidente Prudente', 'Vila Santa Helena', 'ruaCad', '2881', 'sem com', 0, 0, 'Erich'),
('A', 17, 'Joao2', 'joao2@gmail.com', '19060000', 'SP', 'Presidente Prudente', 'Vila Santa Helena', 'Avenida Manoel Goulart', '28811', 'sem com', 0, 1, 'Erich'),
('G', 18, 'Geovana123', 'geovana@gmail.com', '19024310', 'SP', 'Presidente Prudente', 'Jardim Iguaçu', 'Rua Arlindo Luiz Teixeira', '64', 'casa', 0, 0, 'Geovana');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `Fk_Contato` int(11) NOT NULL,
  `Telefone_Tipo` tinyint(1) NOT NULL,
  `Telefone_DDI` int(11) NOT NULL,
  `Telefone_DDD` int(11) NOT NULL,
  `Telefone_Nro` decimal(15,0) NOT NULL,
  `Flag` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`Fk_Contato`, `Telefone_Tipo`, `Telefone_DDI`, `Telefone_DDD`, `Telefone_Nro`, `Flag`) VALUES
(12, 1, 55, 18, '999999999', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `Usuario` varchar(31) NOT NULL,
  `Senha` varchar(20) NOT NULL,
  `Administrador` tinyint(4) NOT NULL,
  `UsuarioNome` varchar(255) NOT NULL,
  `Flag` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`Usuario`, `Senha`, `Administrador`, `UsuarioNome`, `Flag`) VALUES
('Erich', 'senac111', 0, 'Erich TII T3', 0),
('Geovana', 'senac111', 0, 'Geovana TII T3', 0),
('Luiz', 'senac111', 0, 'Luiz TII T3', 0),
('Vinicius', 'senac111', 0, 'Vinicius TII T3', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_Id`);

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`Id_Contato`,`Fk_Categoria`),
  ADD KEY `fk_Contatos_Usuarios1_idx` (`Fk_Usuario`),
  ADD KEY `fk_Contatos_Categorias1_idx` (`Fk_Categoria`);

--
-- Índices para tabela `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`Telefone_Tipo`,`Telefone_DDI`,`Telefone_DDD`,`Telefone_Nro`,`Fk_Contato`),
  ADD KEY `fk_Telefones_Contatos1_idx` (`Fk_Contato`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `Id_Contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_Contatos_Categorias1` FOREIGN KEY (`Fk_Categoria`) REFERENCES `categorias` (`categoria_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Contatos_Usuarios1` FOREIGN KEY (`Fk_Usuario`) REFERENCES `usuarios` (`Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `fk_Telefones_Contatos1` FOREIGN KEY (`Fk_Contato`) REFERENCES `contatos` (`Id_Contato`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
