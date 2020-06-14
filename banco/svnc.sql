-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Out-2019 às 09:19
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svnc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `nom_adm` varchar(15) NOT NULL,
  `sen_adm` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id_adm`, `nom_adm`, `sen_adm`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `rm_alu` varchar(5) NOT NULL,
  `nom_alu` varchar(100) NOT NULL,
  `ser_alu` varchar(2) NOT NULL,
  `cur_alu` varchar(30) NOT NULL,
  `tur_alu` varchar(1) NOT NULL,
  `ema_alu` varchar(100) NOT NULL,
  `sen_alu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`rm_alu`, `nom_alu`, `ser_alu`, `cur_alu`, `tur_alu`, `ema_alu`, `sen_alu`) VALUES
('16034', 'Gustavo Lopes Da Silva', '3', 'Informática', 'A', '', '12345'),
('16053', 'Natan Milanez Polly', '3', 'Informática', 'B', '', '12345'),
('17001', 'Amanda Ferreira Da Silva Bortolotti', '3', 'Informática', 'A', '', '12345'),
('17002', 'Ana Luiza Geraldino Silva', '3', 'Informática', 'A', '', '12345'),
('17003', 'Ana Paula Da Silva Matos', '3', 'Informática', 'A', '', '12345'),
('17004', 'Anna Karla Bonifacio Santos', '2', 'Meio Ambiente', 'A', '', '12345'),
('17005', 'Brenda Baptistin Prodi Santos', '3', 'Informática', 'A', '', '12345'),
('17006', 'Bruno Aparecido Barbosa Dos Anjos', '3', 'Informática', 'A', '', '12345'),
('17007', 'Caio De Oliveira Portella', '3', 'Informática', 'A', '', '12345'),
('17008', 'Cesar Augusto Sena Da Silva', '3', 'Informática', 'A', '', '12345'),
('17009', 'Christopher Brendo De Sousa Goncalves', '3', 'Informática', 'A', 'christopher.goncalves2002@hotmail.com.br', '12345'),
('17010', 'Daniel Vieira Da Costa E Silva', '2', 'Informática', 'A', '', '12345'),
('17013', 'Amanda Araujo Nascimento', '3', 'Meio Ambiente', 'A', '', '12345'),
('17014', 'Ana Caroline Nunes Borges Da Silva', '3', 'Meio Ambiente', 'A', '', '12345'),
('17015', 'Enzo Gamberini Alfredo', '3', 'Informática', 'A', '', '12345'),
('17016', 'Guilherme Claro Pavlakis', '3', 'Informática', 'A', '', '12345'),
('17017', 'Guilherme Mello Rossi', '3', 'Informática', 'A', '', '12345'),
('17018', 'Guilherme Oliveira Rocha', '3', 'Informática', 'A', '', '12345'),
('17019', 'Henrique Gabriel Da Silva Ribeiro', '3', 'Informática', 'A', '', '12345'),
('17020', 'Isaac Alves Freitas', '3', 'Informática', 'A', '', '12345'),
('17021', 'Joao Vitor Teixeira De Souza', '3', 'Informática', 'A', '', '12345'),
('17022', 'Larissa Eloi Souza', '3', 'Informática', 'B', '', '12345'),
('17024', 'Leandro De Oliveira Pereira', '3', 'Informática', 'B', '', '12345'),
('17025', 'Lucas Dos Santos Nascimento Dias', '3', 'Informática', 'B', '', '12345'),
('17026', 'Lucas Da Silva Mendes', '3', 'Informática', 'B', '', '12345'),
('17027', 'Lucas Luz Dos Santos', '3', 'Informática', 'B', '', '12345'),
('17028', 'Luccas Cosme Araujo', '3', 'Informática', 'B', 'luccascosme@gmail.com', '12345'),
('17029', 'Marcus Gabriel Araujo Salles', '3', 'Informática', 'B', '', '12345'),
('17030', 'Maria Clara Pontes Da Silva Santos', '3', 'Informática', 'B', '', '12345'),
('17031', 'Mateus Gomes Oliveira', '3', 'Informática', 'B', '', '12345'),
('17032', 'Michael Henrique Teixeira Silva', '3', 'Informática', 'B', '', '12345'),
('17033', 'Manoela Abreu Lopes', '3', 'Informática', 'B', '', '12345'),
('17034', 'Nathalia Dos Santos Bueno', '3', 'Informática', 'B', '', '12345'),
('17035', 'Rian Silva De Oliveira', '3', 'Informática', 'B', '', '12345'),
('17036', 'Samuel Costa Ramos', '3', 'Informática', 'B', '', '12345'),
('17037', 'Samuel Marques Gomes Sarmento', '3', 'Informática', 'B', '', '12345'),
('17039', 'Vinicius Dias Mota De Oliveira', '3', 'Informática', 'B', '', '12345'),
('17040', 'Yuri Serafim De Franca', '3', 'Informática', 'B', '', '12345'),
('17041', 'Anna Carolina Ribeiro Fonseca', '3', 'Informática', 'A', '', '12345'),
('17042', 'Kauan Yuri Mendes De Araujo', '3', 'Informática', 'B', '', '12345'),
('17043', 'Guilherme Silva Fonseca', '3', 'Informática', 'A', '', '12345'),
('17044', 'Caroline Do Espirito Santo Santana', '3', 'Meio Ambiente', 'A', '', '12345'),
('17047', 'Fernando Bosque E Silva', '3', 'Meio Ambiente', 'A', '', '12345'),
('17049', 'Gabriel De Oliveira Costa', '3', 'Meio Ambiente', 'A', '', '12345'),
('17050', 'Gabriel Rodrigues Andrade Lima', '3', 'Meio Ambiente', 'A', '', '12345'),
('17051', 'Geovanna Maria De Souza Hreczynski', '3', 'Meio Ambiente', 'A', '', '12345'),
('17052', 'Giovanna Pumar De Oliveira', '3', 'Meio Ambiente', 'A', '', '12345'),
('17054', 'Guilherme Casagrande Sposito', '3', 'Meio Ambiente', 'A', '', '12345'),
('17056', 'Isabela Barbosa Brito', '3', 'Meio Ambiente', 'A', '', '12345'),
('17057', 'Isabelle Tourinho Beu', '3', 'Meio Ambiente', 'A', '', '12345'),
('17058', 'Joao Lucas Brasil', '3', 'Meio Ambiente', 'A', '', '12345'),
('17059', 'Julia Isabelle Alves Da Silva', '3', 'Meio Ambiente', 'A', '', '12345'),
('17060', 'Juliana Gomes De Oliveira', '3', 'Meio Ambiente', 'B', '', '12345'),
('17061', 'Juliana De Souza Macedo', '3', 'Meio Ambiente', 'A', '', '12345'),
('17062', 'Karine De Oliveira Galdino', '3', 'Meio Ambiente', 'B', '', '12345'),
('17063', 'Kateryne De Menezes Pinto', '3', 'Meio Ambiente', 'B', '', '12345'),
('17064', 'Lucas Cardoso Da Silva', '3', 'Meio Ambiente', 'B', '', '12345'),
('17065', 'Mateus Silva Lima', '3', 'Meio Ambiente', 'B', '', '12345'),
('17066', 'Natanielle Servidoni', '3', 'Meio Ambiente', 'B', '', '12345'),
('17067', 'Polliany Cabral Jesus Dos Santos', '3', 'Meio Ambiente', 'B', '', '12345'),
('17068', 'Rafael Ferreira De Oliveira Borba', '3', 'Meio Ambiente', 'B', '', '12345'),
('17069', 'Rafaela Cristina Da Silva Santos', '3', 'Meio Ambiente', 'B', '', '12345'),
('17070', 'Raquel Bernardo Barra Nova', '3', 'Meio Ambiente', 'B', '', '12345'),
('17071', 'Renan Lisboa Rodrigues', '3', 'Meio Ambiente', 'B', '', '12345'),
('17072', 'Sabrina Alessandra Araujo Drancka', '3', 'Meio Ambiente', 'B', '', '12345'),
('17073', 'Sarah Santos De Meneses', '3', 'Meio Ambiente', 'B', '', '12345'),
('17074', 'Valeria Cristina Yolanda Da Silva', '3', 'Meio Ambiente', 'B', '', '12345'),
('17075', 'Vitoria Rodrigues Santos', '3', 'Meio Ambiente', 'B', '', '12345'),
('17076', 'Vinicius Dos Santos Guimaraes', '3', 'Meio Ambiente', 'B', '', '12345'),
('17146', 'Isabela Vitoria De Melo Leite', '3', 'Meio Ambiente', 'A', '', '12345'),
('17148', 'Katheleen Beanucci Lara', '3', 'Informática', 'A', '', '12345'),
('17149', 'Felipe Mendonca De Sa Lopes', '3', 'Informática', 'A', '', '12345'),
('17251', 'Anna Carolina Ferreira De Barros', '3', 'Meio Ambiente', 'A', '', '12345'),
('17252', 'Bianca Vasconcellos Lopes Silva', '3', 'Meio Ambiente', 'A', '', '12345'),
('18002', 'Alex De Alencar Junior', '2', 'Informática', 'A', '', '12345'),
('18003', 'Bryan Silva Aciole De Oliveira', '2', 'Informática', 'A', '', '12345'),
('18004', 'Camilly Souza Dantas', '2', 'Informática', 'A', '', '12345'),
('18005', 'Carlos Eduardo Cruz Silva', '2', 'Informática', 'A', '', '12345'),
('18007', 'Christian Hitoshi Takayama Hamai', '2', 'Informática', 'A', '', '12345'),
('18008', 'Eric Camargo Santos', '2', 'Informática', 'A', '', '12345'),
('18009', 'Fabricio Luiz Notaro Custodio', '2', 'Informática', 'A', '', '12345'),
('18010', 'Giulia Gomes Sousa Cangueiro', '2', 'Informática', 'A', '', '12345'),
('18011', 'Gustavo Leandro Da Silva', '2', 'Informática', 'A', '', '12345'),
('18012', 'Ian Freitas Coimbra', '2', 'Informática', 'A', '', '12345'),
('18013', 'Igor Zorante De Moura', '2', 'Informática', 'A', '', '12345'),
('18014', 'Jhonattan Massayoshi Porta Sueoka', '2', 'Informática', 'A', '', '12345'),
('18015', 'Julio Cesar Franco Piccolini', '2', 'Informática', 'A', '', '12345'),
('18016', 'Kauã Da Silva Barros', '2', 'Informática', 'B', '', '12345'),
('18017', 'Mateus Gomes Coutinho Rodrigues', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('18019', 'Matheus Nogueira Lemes', '2', 'Informática', 'B', '', '12345'),
('18020', 'Matheus Souza Leal', '2', 'Informática', 'B', '', '12345'),
('18021', 'Nauana Coelho Dos Santos', '2', 'Informática', 'B', '', '12345'),
('18022', 'Pedro Henrique Araujo Terra', '2', 'Informática', 'B', '', '12345'),
('18025', 'Sabrina Pasti Dos Santos', '2', 'Informática', 'B', '', '12345'),
('18026', 'Thais Casemiro Oliveira', '2', 'Informática', 'B', '', '12345'),
('18027', 'Thiago De Oliveira Souza', '2', 'Informática', 'B', '', '12345'),
('18028', 'Victor Costa Lima', '2', 'Informática', 'B', '', '12345'),
('18030', 'Victor Pereira Goncalves', '2', 'Informática', 'B', '', '12345'),
('18031', 'Victoria Diogo De Souza', '2', 'Informática', 'B', '', '12345'),
('18032', 'Victoria Dos Santos Gomes', '2', 'Informática', 'B', '', '12345'),
('18033', 'Vinicius Modesto De Andrade', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('18034', 'Vinicius Prado Valim', '2', 'Informática', 'B', '', '12345'),
('18035', 'Yasmin Gomes Alves', '2', 'Informática', 'B', '', '12345'),
('18036', 'Mayra Dos Santos Ribeiro', '2', 'Informática', 'B', '', '12345'),
('18037', 'Alexandra Domingues Andre', '2', 'Informática', 'A', '', '12345'),
('18039', 'Alexia Da Silva Duarte', '2', 'Meio Ambiente', 'A', '', '12345'),
('18072', 'Anne Souza Barbosa', '2', 'Meio Ambiente', 'A', '', '12345'),
('18093', 'Caique Nascimento Santos', '2', 'Informática', 'A', '', '12345'),
('18111', 'Bruna Heloisa De Souza Oliveira', '2', 'Meio Ambiente', 'A', '', '12345'),
('18114', 'Debora Lidia Barbosa Santiago', '2', 'Meio Ambiente', 'A', '', '12345'),
('18117', 'Eduarda Da Silva Simoes', '2', 'Meio Ambiente', 'A', '', '12345'),
('18120', 'Gabrielle Bom Sabino', '2', 'Meio Ambiente', 'A', '', '12345'),
('18121', 'Gabrielly Silva Nunes', '2', 'Meio Ambiente', 'A', '', '12345'),
('18123', 'Gustavo Alberto Da Silva', '2', 'Meio Ambiente', 'A', '', '12345'),
('18124', 'Havander Goulart Dos Santos', '2', 'Meio Ambiente', 'A', '', '12345'),
('18125', 'Ingrid Ferreira Prado', '2', 'Meio Ambiente', 'A', '', '12345'),
('18126', 'Isabella Rossi Nicodemos', '2', 'Meio Ambiente', 'A', '', '12345'),
('18128', 'Jessica De Souza Gomes', '2', 'Meio Ambiente', 'A', '', '12345'),
('18129', 'Kaua Silva Alves', '2', 'Meio Ambiente', 'A', '', '12345'),
('18130', 'Liliane De Fatima Camargo De Melo', '2', 'Meio Ambiente', 'A', '', '12345'),
('18131', 'Luana Cristina Da Gama Pinheiro', '2', 'Meio Ambiente', 'B', '', '12345'),
('18133', 'Lucca Nascimento De Almeida', '2', 'Meio Ambiente', 'B', '', '12345'),
('18137', 'Marcos Paulo Ferreira Da Silva', '2', 'Meio Ambiente', 'B', '', '12345'),
('18141', 'Maria Vitoria Dos Santos Lima', '2', 'Meio Ambiente', 'B', '', '12345'),
('18144', 'Matheus Silva Kalisak', '2', 'Meio Ambiente', 'B', '', '12345'),
('18146', 'Mayara Ribeiro Escaraboti', '2', 'Meio Ambiente', 'B', '', '12345'),
('18150', 'Nayury Aparecida De Jesus Silva', '2', 'Meio Ambiente', 'B', '', '12345'),
('18151', 'Oseas Paim Frazao', '2', 'Meio Ambiente', 'B', '', '12345'),
('18152', 'Pedro Ribeiro De Alcantara', '2', 'Meio Ambiente', 'B', '', '12345'),
('18153', 'Renan Silva Miranda', '2', 'Meio Ambiente', 'B', '', '12345'),
('18154', 'Robertha De Paula Costa', '2', 'Meio Ambiente', 'B', '', '12345'),
('18155', 'Sabrina De Jesus Dos Reis', '2', 'Meio Ambiente', 'B', '', '12345'),
('18156', 'Samantha Zaghi Sampaio', '2', 'Meio Ambiente', 'B', '', '12345'),
('18157', 'Samuel Dos Santos Silva Junior', '2', 'Meio Ambiente', 'B', '', '12345'),
('18159', 'Tatiane Pereira De Sena', '2', 'Meio Ambiente', 'B', '', '12345'),
('18160', 'Thayane Santos Sousa', '2', 'Meio Ambiente', 'B', '', '12345'),
('18161', 'Vera Fernanda Bispo Dos Santos', '2', 'Meio Ambiente', 'B', '', '12345'),
('18162', 'Victor Raphael De Alcântara Silva', '2', 'Meio Ambiente', 'B', '', '12345'),
('18187', 'Mickaelly Freitas Araujo', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('18191', 'Luan Santos De Souza', '2', 'Informática', 'B', '', '12345'),
('18197', 'Anderson Trindade De Moura', '2', 'Meio Ambiente', 'A', '', '12345'),
('18198', 'Caroline Vitória Rocha Dos Santos', '2', 'Meio Ambiente', 'A', '', '12345'),
('18378', 'David Souza Batista', '2', 'Informática', 'A', '', '12345'),
('19002', 'Ana Clara Targino Carvalho Moreira', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19005', 'Abdhul Felipe Simão', '1', 'Meio Ambiente', 'A', '', '12345'),
('19006', 'Armando Carneiro Da Cunha Filho', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19007', 'Augusto César Rangel Nunes', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19008', 'Bianca De Almeida Lopes', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19009', 'Camila Lordelo Da Silva', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19010', 'Carlos Eduardo De Deus Costa', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19011', 'Carlos Kaique Duarte Pontes', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19012', 'Daniel Rodrigues De Andrade', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19014', 'Diego Rodrigo Da Silva', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19015', 'Douglas Pereira Lourenço', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19016', 'Eloísa Sales Constantino', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19017', 'Felipe Augusto Araújo Ramos Da Silva', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19018', 'Gabriel Belissimo Soares De Lima', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19019', 'Grazielly Gomes De Souza', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19020', 'Guilherme Augusto Guimarães Pereira Da Silva', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19021', 'Guilherme De Oliveira Pacheco', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19022', 'Guilherme De Sousa Moura', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19023', 'Guilherme José Dos Santos Macêdo', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19024', 'Henrique Gomes Da Silva', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('19025', 'José Victor Santos Alves', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19026', 'Júlia Machado Dantas', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19027', 'Lorena Santos Pereira', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19028', 'Lucas Araujo Nicola', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19029', 'Marcos Codo Marques Filho', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19030', 'Matheus Cordeiro', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19031', 'Maurício Ferraz Silva', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19032', 'Murilo Roberto Magalhães Costa', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19033', 'Nicolas Santos De Oliveira', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19034', 'Paulo Henrique Siqueira Santana Filho', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19035', 'Pedro Henrique Lourenço Ferezin', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19036', 'Rafael Miranda De Oliveira', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19037', 'Rogério Eduardo Sarmento Leite', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19038', 'Sophia Evangelista', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19039', 'Vitor Emanuel Dos Santos Silva', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19040', 'Vitor Hugo Da Silva Santos', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19041', 'Yasmim Gabrielle Costa De Siqueira', '1', 'Desenvolvimento de Sistemas', 'B', '', '12345'),
('19042', 'Ana Beatriz Lessa De Noronha', '1', 'Meio Ambiente', 'A', '', '12345'),
('19043', 'Beatriz Cristiny Da Silva', '1', 'Meio Ambiente', 'A', '', '12345'),
('19044', 'Bruna Xavier Do Carmo', '1', 'Meio Ambiente', 'A', '', '12345'),
('19045', 'Bruno Sena Silva', '1', 'Meio Ambiente', 'A', '', '12345'),
('19046', 'Camila Borges Amaral', '1', 'Meio Ambiente', 'A', '', '12345'),
('19047', 'Camilly Vitória Rienda Andrade', '1', 'Meio Ambiente', 'A', '', '12345'),
('19048', 'Danielle Ferreira De Sousa Monteiro', '1', 'Meio Ambiente', 'A', '', '12345'),
('19049', 'Danilo Silva Sousa', '1', 'Meio Ambiente', 'A', '', '12345'),
('19050', 'Eduarda Dantas Azevedo Silva', '1', 'Meio Ambiente', 'A', '', '12345'),
('19051', 'Emily Vitoria Faustino De Lima', '1', 'Meio Ambiente', 'A', '', '12345'),
('19052', 'Gabriel Marques Da Silva', '1', 'Meio Ambiente', 'A', '', '12345'),
('19053', 'Gabriel Nogueira Freitas', '1', 'Meio Ambiente', 'A', '', '12345'),
('19054', 'Gabriela Silva De Sousa', '1', 'Meio Ambiente', 'A', '', '12345'),
('19055', 'Gustavo Henrique Amorim Ferreira', '1', 'Meio Ambiente', 'A', '', '12345'),
('19056', 'Hellen Monique Barbosa Da Silva', '1', 'Meio Ambiente', 'A', '', '12345'),
('19057', 'Henrique De Morais', '1', 'Meio Ambiente', 'A', '', '12345'),
('19058', 'Henrique Ferreira Xavier', '1', 'Meio Ambiente', 'A', '', '12345'),
('19059', 'Henrique Vitoriano De Oliveira', '1', 'Meio Ambiente', 'A', '', '12345'),
('19060', 'Isabella Laurentino Da Silva', '1', 'Meio Ambiente', 'A', '', '12345'),
('19061', 'Jéssica Tainara Da Silva Melo', '1', 'Meio Ambiente', 'B', '', '12345'),
('19062', 'João Victor Nascimento Viana', '1', 'Meio Ambiente', 'B', '', '12345'),
('19063', 'João Vitor De Morais Bellini', '1', 'Meio Ambiente', 'B', '', '12345'),
('19064', 'Júlia Abrahão Alves', '1', 'Meio Ambiente', 'B', '', '12345'),
('19065', 'Kauã Araujo Da Silva', '1', 'Meio Ambiente', 'B', '', '12345'),
('19066', 'Kauê Ferreira Dos Anjos Santos', '1', 'Meio Ambiente', 'B', '', '12345'),
('19067', 'Leticia Penna Da Silva', '1', 'Meio Ambiente', 'B', '', '12345'),
('19068', 'Luana Alves Dos Santos', '1', 'Meio Ambiente', 'B', '', '12345'),
('19069', 'Lucas Dos Passos Crisostomo', '1', 'Meio Ambiente', 'B', '', '12345'),
('19070', 'Maisa Palma Vieira', '1', 'Meio Ambiente', 'B', '', '12345'),
('19071', 'Maria Eduarda Da Paixão Borzani', '1', 'Meio Ambiente', 'B', '', '12345'),
('19072', 'Nayeli Maria De Lima', '1', 'Meio Ambiente', 'B', '', '12345'),
('19073', 'Pedro Da Silva Sousa', '1', 'Meio Ambiente', 'B', '', '12345'),
('19074', 'Pedro Henrique Capoano Gonçalves', '1', 'Meio Ambiente', 'B', '', '12345'),
('19075', 'Ruan Phablo Montoya Da Silva', '1', 'Meio Ambiente', 'B', '', '12345'),
('19076', 'Sabrina Sales Tulio', '1', 'Meio Ambiente', 'B', '', '12345'),
('19077', 'Thamires Firmino Macaúba', '1', 'Meio Ambiente', 'B', '', '12345'),
('19078', 'Vitoria Felipe Macedo', '1', 'Meio Ambiente', 'B', '', '12345'),
('19079', 'Vitoria De Lima Silva', '1', 'Meio Ambiente', 'B', '', '12345'),
('19080', 'Vitória Fernanda Siqueira Silva', '1', 'Meio Ambiente', 'B', '', '12345'),
('19187', 'Leandro Nogueira De Macedo', '1', 'Desenvolvimento de Sistemas', 'A', '', '12345'),
('﻿rm_a', 'nom_alu', 'se', 'cur_alu', 't', 'ema_alu', 'sen_alu');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id_ins` int(11) NOT NULL,
  `id_pales` int(11) DEFAULT NULL,
  `id_res` int(11) DEFAULT NULL,
  `id_vis` varchar(11) DEFAULT NULL,
  `id_alu` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`id_ins`, `id_pales`, `id_res`, `id_vis`, `id_alu`) VALUES
(20, 3, 3, NULL, '17009'),
(21, 3, 3, '12345678912', NULL),
(22, 3, 3, NULL, '17008'),
(23, 3, 3, NULL, '17010'),
(24, 3, 3, NULL, '17001'),
(25, 3, 3, NULL, '17050'),
(26, 3, 3, NULL, '17056'),
(27, 3, 3, NULL, '18002'),
(28, 3, 3, NULL, '18005'),
(29, 4, 4, NULL, '18010'),
(30, 3, 3, NULL, '18010'),
(31, 3, 3, NULL, '18017'),
(32, 3, 3, NULL, '18039'),
(33, 3, 3, NULL, '18072'),
(34, 3, 3, NULL, '18093'),
(35, 3, 3, NULL, '18111'),
(36, 3, 3, NULL, '19007'),
(37, 3, 3, NULL, '19008'),
(38, 3, 3, NULL, '19009'),
(39, 3, 3, NULL, '19010'),
(40, 3, 3, NULL, '19052'),
(41, 3, 3, NULL, '19053'),
(42, 3, 3, NULL, '19054'),
(43, 3, 3, NULL, '19055'),
(44, 3, 3, NULL, '19056'),
(45, 3, 3, NULL, '17028');

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestra`
--

CREATE TABLE `palestra` (
  `id_pales` int(11) NOT NULL,
  `nom_pales` varchar(100) NOT NULL,
  `des_pales` varchar(200) NOT NULL,
  `res_pales` int(11) NOT NULL,
  `car_pales` varchar(10) NOT NULL,
  `dat_pales` varchar(5) NOT NULL,
  `loc_pales` varchar(25) NOT NULL,
  `ini_pales` varchar(5) NOT NULL,
  `ter_pales` varchar(5) NOT NULL,
  `sta_pales` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `palestra`
--

INSERT INTO `palestra` (`id_pales`, `nom_pales`, `des_pales`, `res_pales`, `car_pales`, `dat_pales`, `loc_pales`, `ini_pales`, `ter_pales`, `sta_pales`) VALUES
(1, 'Oficina sobre React', 'Nesta oficina iremos abordar os conceitos básicos acerca da linguagem', 1, '2 horas', '21/10', 'Laboratório 22', '10:00', '12:00', 'Apr'),
(2, 'Roda de conversas sobre a obra \"Vidas Secas\"', 'Nesta roda iremos realizar uma análise da obra discutindo acerca de suas críticas sociais', 2, '1 hora', '22/10', 'Sala 30', '14:00', '15:00', 'Apr'),
(3, 'Palestra sobre Saúde e Bem Estar', 'Nesta palestra abordaremos questionamentos sobre como obter Saúde e Bem Estar', 3, '2 horas', '23/10', 'Anfiteatro', '14:00', '16:00', 'Con'),
(4, 'Palestra sobre Primeiros Socorros', 'Abordaremos os principais fundamentos sobre Primeiros Socorros', 4, '30 minutos', '25/10', 'Sala 30', '10:00', '10:30', 'Apr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `id_res` int(11) NOT NULL,
  `nom_res` varchar(100) NOT NULL,
  `pro_res` varchar(25) NOT NULL,
  `des_res` varchar(100) NOT NULL,
  `sen_res` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `responsavel`
--

INSERT INTO `responsavel` (`id_res`, `nom_res`, `pro_res`, `des_res`, `sen_res`) VALUES
(1, 'Pamela Andrelo', 'Full Stack', 'Leciona matérias do curso de Informática e DS', 'pamelaandrelo'),
(2, 'Thiago Tozi', 'Historiador', 'Leciona as matérias de História e Sociologia para os alunos do Etim', 'thiagotozi'),
(3, 'Gilberto Bassetto', 'Químico', 'Leciona matérias para os alunos do Etim e Técnico', 'gilbertobassetto'),
(4, 'Agnaldo Oliveira', 'Bombeiro', 'Trabalha no corpo de bombeiros de São Paulo', 'agnaldooliveira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id_sta` int(11) NOT NULL,
  `nom_sta` varchar(25) NOT NULL,
  `val_sta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_sta`, `nom_sta`, `val_sta`) VALUES
(1, 'palestra', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitante`
--

CREATE TABLE `visitante` (
  `cpf_vis` varchar(11) NOT NULL,
  `nom_vis` varchar(100) NOT NULL,
  `ema_vis` varchar(100) NOT NULL,
  `des_vis` varchar(50) NOT NULL,
  `sen_vis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `visitante`
--

INSERT INTO `visitante` (`cpf_vis`, `nom_vis`, `ema_vis`, `des_vis`, `sen_vis`) VALUES
('12345678912', 'Amanda Ketellyn de Sousa Gonçalves', 'amanda.ketellyn@gmail.com', 'Familiar de Aluno', 'aaaaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`rm_alu`);

--
-- Indexes for table `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id_ins`),
  ADD KEY `id_pales` (`id_pales`),
  ADD KEY `id_res` (`id_res`),
  ADD KEY `id_vis` (`id_vis`),
  ADD KEY `id_alu` (`id_alu`);

--
-- Indexes for table `palestra`
--
ALTER TABLE `palestra`
  ADD PRIMARY KEY (`id_pales`),
  ADD KEY `res_pales` (`res_pales`);

--
-- Indexes for table `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`id_res`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_sta`);

--
-- Indexes for table `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`cpf_vis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id_ins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `palestra`
--
ALTER TABLE `palestra`
  MODIFY `id_pales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_sta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `inscricao_ibfk_1` FOREIGN KEY (`id_pales`) REFERENCES `palestra` (`id_pales`),
  ADD CONSTRAINT `inscricao_ibfk_2` FOREIGN KEY (`id_res`) REFERENCES `responsavel` (`id_res`),
  ADD CONSTRAINT `inscricao_ibfk_3` FOREIGN KEY (`id_vis`) REFERENCES `visitante` (`cpf_vis`),
  ADD CONSTRAINT `inscricao_ibfk_4` FOREIGN KEY (`id_alu`) REFERENCES `aluno` (`rm_alu`);

--
-- Limitadores para a tabela `palestra`
--
ALTER TABLE `palestra`
  ADD CONSTRAINT `palestra_ibfk_1` FOREIGN KEY (`res_pales`) REFERENCES `responsavel` (`id_res`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
