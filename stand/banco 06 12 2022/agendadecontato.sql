-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jan-2023 às 04:38
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

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
('F', 'Categoria Familia', 0),
('G', 'Categoria Geral', 0),
('T', 'Categoria Trabalho', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `Id_Contato` int(11) NOT NULL,
  `Contato_Nome` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CEP_Contato` decimal(8,0) NOT NULL,
  `Endereco_UF` varchar(45) NOT NULL,
  `Endereco_Cidade` varchar(45) NOT NULL,
  `Endereco_Bairro` varchar(45) NOT NULL,
  `Endereco_Rua` varchar(45) NOT NULL,
  `Endereco_Nro` varchar(20) NOT NULL,
  `Endereco_Compl` varchar(50) NOT NULL,
  `Favorito` tinyint(1) DEFAULT 0,
  `Flag` tinyint(1) DEFAULT 0,
  `Fk_Usuario` varchar(31) NOT NULL,
  `Fk_Categoria` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`Id_Contato`, `Contato_Nome`, `Email`, `CEP_Contato`, `Endereco_UF`, `Endereco_Cidade`, `Endereco_Bairro`, `Endereco_Rua`, `Endereco_Nro`, `Endereco_Compl`, `Favorito`, `Flag`, `Fk_Usuario`, `Fk_Categoria`) VALUES
(1, 'Erich Valarini', 'senac@senac.edu.br', '19100400', 'SP', 'Pres. Prudente', 'Centro', 'Rua da Tecnologia', '2881', 'Predio', 0, 0, 'Erich', 'G'),
(2, 'Vinicius Soares', 'senac@senac.edu.br', '19100400', 'SP', 'Pres. Prudente', 'Centro', 'Rua da Tecnologia', '2881', 'Predio', 0, 0, 'Vinicius', 'G'),
(3, 'Geovana Bicalhu', 'senac@senac.edu.br', '19100400', 'SP', 'Pres. Prudente', 'Centro', 'Rua da Tecnologia', '2881', 'Predio', 0, 0, 'Geovana', 'G'),
(4, 'Luiz Gustavo de Souza123', 'senac@senac.edu.br', '19100400', 'SP', 'Pres. Prudente', 'Centro', 'Rua da Tecnologia', '2881', 'Predio', 0, 0, 'Luiz', 'G ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `Telefone_Nro` decimal(15,0) NOT NULL,
  `Telefone_Tipo` tinyint(1) NOT NULL,
  `Telefone_DDI` int(11) NOT NULL,
  `Telefone_DDD` int(11) NOT NULL,
  `Flag` tinyint(1) DEFAULT 0,
  `Fk_Contato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`Telefone_Nro`, `Telefone_Tipo`, `Telefone_DDI`, `Telefone_DDD`, `Flag`, `Fk_Contato`) VALUES
('11111111', 0, 55, 27, 0, 1),
('921213344', 1, 55, 18, 0, 1),
('921213345', 1, 55, 18, 0, 2),
('921213346', 1, 55, 18, 0, 3),
('921213347', 1, 55, 18, 0, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `Usuario` varchar(31) NOT NULL,
  `Senha` varchar(200) NOT NULL,
  `Administrador` tinyint(4) NOT NULL,
  `UsuarioNome` varchar(255) NOT NULL,
  `Flag` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`Usuario`, `Senha`, `Administrador`, `UsuarioNome`, `Flag`) VALUES
('Erich', '42a58141ebef129c0ec777f92bfc40c1', 1, 'Erich TII T3', 0),
('Geovana', '42a58141ebef129c0ec777f92bfc40c1', 0, 'Geovana TII T3', 0),
('joão', 'senac111', 0, 'joão pereira', 9),
('Luiz', 'senac111', 0, 'Luiz TII T3', 0),
('Vinicius', 'senac111', 0, 'Vinicius TII T3', 0),
('vitorsouza', '12345678', 0, 'vitor souza', 0);

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
  ADD PRIMARY KEY (`Id_Contato`),
  ADD KEY `fk_Contatos_Usuarios_idx` (`Fk_Usuario`),
  ADD KEY `fk_Contatos_Categorias1_idx` (`Fk_Categoria`);

--
-- Índices para tabela `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`Telefone_Nro`,`Telefone_Tipo`,`Telefone_DDI`,`Telefone_DDD`),
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
  MODIFY `Id_Contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_Contatos_Categorias1` FOREIGN KEY (`Fk_Categoria`) REFERENCES `categorias` (`categoria_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Contatos_Usuarios` FOREIGN KEY (`Fk_Usuario`) REFERENCES `usuarios` (`Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `fk_Telefones_Contatos1` FOREIGN KEY (`Fk_Contato`) REFERENCES `contatos` (`Id_Contato`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
