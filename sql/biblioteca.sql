-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 04:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`) VALUES
(7, 'fantasia'),
(8, 'Thriller psicológico'),
(9, 'suspense policial'),
(10, 'romance'),
(11, 'comedia romantica'),
(12, 'aventura'),
(13, 'sobrenatural'),
(14, 'horror'),
(16, 'misterio');

-- --------------------------------------------------------

--
-- Table structure for table `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id_emprestimo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_emprestimo` datetime DEFAULT current_timestamp(),
  `data_devolucao` datetime DEFAULT NULL,
  `status` enum('ativo','devolvido') DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `livro`
--

CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `status` enum('disponivel','reservado') DEFAULT 'disponivel',
  `id_usuario_reserva` int(11) DEFAULT NULL,
  `data_reserva` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livro`
--

INSERT INTO `livro` (`id_livro`, `titulo`, `autor`, `descricao`, `imagem`, `status`, `id_usuario_reserva`, `data_reserva`) VALUES
(22, 'O Jardim das Borboletas', 'Dot Hutchison', 'O FBI encontra um jardim onde mulheres são mantidas presas por um homem obcecado por beleza e controle. As vítimas são tatuadas com asas de borboleta e forçadas a viver sob regras rígidas. Maya, uma das sobreviventes, narra os horrores vividos enquanto os agentes tentam entender sua mente para capturar o criminoso.', '684f52be41cab_jardimborboletas.jpg', 'disponivel', NULL, NULL),
(23, 'O Jogo do Amor(Ódio)', ' Autora: Sally Thorne', 'Lucy e Joshua trabalham juntos e se odeiam intensamente. Quando uma promoção aparece, os dois entram em uma disputa acirrada. No entanto, a tensão entre eles começa a revelar sentimentos inesperados, transformando o \"jogo do ódio\" em algo muito mais complicado... e apaixonante.', '684f52da5111d_amorodio.jpg', 'reservado', 5, '2025-06-15 20:54:56'),
(24, 'O Lar da Srta. Peregrine Para Crianças Peculiares', 'Ransom Riggs', 'Após uma tragédia familiar, Jacob segue pistas que o levam até uma ilha misteriosa, onde encontra o orfanato da Srta. Peregrine. Lá vivem crianças com habilidades sobrenaturais, presas em um looping temporal. Jacob descobre segredos que ligam sua história à daquele lugar peculiar.', '684f561446e48_lardasrta.jpg', 'reservado', 5, '2025-06-15 20:54:41'),
(25, 'Nunca Minta', 'Freida McFadden', 'Trisha e seu marido vão a uma casa isolada de uma psicóloga desaparecida que está a venda. Presos por uma tempestade, eles descobrem gravações antigas das sessões com pacientes... e um segredo obscuro sobre o que aconteceu com a antiga dona da casa.', '684f531f520b4_nuncaminta.jpg', 'reservado', 5, '2025-06-15 20:54:48'),
(26, 'Como Eu Era Antes de Você', 'Jojo Moyes', 'Louisa Clark começa a trabalhar como cuidadora de Will Traynor, um ex-banqueiro tetraplégico e amargurado com a vida. Com o tempo, os dois criam um laço forte, e Lou descobre que seu papel na vida de Will será mais importante — e desafiador — do que imaginava.', '684f536493db1_comoeueraantesdevc.jpg', 'disponivel', NULL, NULL),
(27, 'Amor & Sorte', 'Jenna Evans Welch', 'Addie vai à Irlanda para o casamento do irmão, mas acaba embarcando em uma viagem de carro com seu outro irmão, Ian, e um estranho guia turístico. Entre paisagens incríveis e segredos revelados, ela encontra muito mais do que esperava — talvez até um novo amor.', '684f539d86b67_amoresorte.jpg', 'disponivel', NULL, NULL),
(28, 'A Cinco Passos de Você', 'Rachael Lippincott, Mikki Daughtry e Tobias Iaconis', 'Stella e Will têm fibrose cística e precisam manter distância para evitar infecções. Apesar disso, eles se apaixonam. Entre o desejo de estar juntos e os riscos da doença, os dois vivem uma história intensa e comovente sobre amor e limites.\r\n', '684f53c4ee00e_acincopassos.jpg', 'disponivel', NULL, NULL),
(29, 'O Portal: Filha de Anandi', 'Autora: Amandeep AMR (Amandeep)', 'Hannah Maël, última herdeira de um clã lendário, retorna após dez anos de exílio para impedir uma profecia que pode desencadear uma Grande Guerra. Disfarçada na fortaleza do clã rival — os Rariff —, ela precisa cumprir sua missão, mas se vê inexplicavelmente atraída por Noa Rariff, o herdeiro arrogante. Dividida entre o dever de vingar sua família e a paixão nascida entre inimigos, Hannah precisará decidir se confiar em seu coração vale o risco de trair seu legado  ', '684f53d9cf7f7_oportal.jpg', 'disponivel', NULL, NULL),
(30, 'Mentirosos', 'E. Lockhart', 'A família Sinclair é rica, bela e perfeita — ao menos é isso que eles tentam mostrar. Todo verão, o patriarca, suas filhas e os netos passam férias em uma ilha particular. Nesse ambiente, Cadence, sua prima Mirren, seu primo Johnny e Gat formam o grupo “os Mentirosos”. Durante o verão de seus 15 anos, Cadence sofre um misterioso acidente que causa amnésia, depressão e dores de cabeça intensas. Dois anos depois, ela retorna à ilha para recuperar a memória e desvendar o que realmente aconteceu no fatídico verão — enfrentando segredos e mentiras profundamente enraizados na família.', '684f5d987f096_mentirosos.jpg', 'disponivel', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `livro_categoria`
--

CREATE TABLE `livro_categoria` (
  `id_livro` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livro_categoria`
--

INSERT INTO `livro_categoria` (`id_livro`, `id_categoria`) VALUES
(22, 8),
(22, 9),
(23, 10),
(23, 11),
(24, 7),
(24, 12),
(25, 8),
(26, 10),
(27, 10),
(27, 12),
(28, 10),
(29, 10),
(29, 12),
(29, 13),
(30, 8),
(30, 13);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('admin','leitor') DEFAULT 'leitor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'caua', 'caua@gmail.com', '123', 'leitor'),
(2, 'teste', 'teste@gmail.com', 'teste', 'leitor'),
(3, 'Raiane', 'rai@gmail.com', '123', 'leitor'),
(4, 'adm1', 'adm@gmail.com', '123', 'admin'),
(5, 'raiane nene', 'raiane1@gmail.com', '123', 'leitor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_livro` (`id_livro`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `fk_usuario_reserva` (`id_usuario_reserva`);

--
-- Indexes for table `livro_categoria`
--
ALTER TABLE `livro_categoria`
  ADD PRIMARY KEY (`id_livro`,`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `emprestimo_ibfk_2` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`) ON DELETE CASCADE;

--
-- Constraints for table `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_usuario_reserva` FOREIGN KEY (`id_usuario_reserva`) REFERENCES `usuario` (`id_usuario`) ON DELETE SET NULL;

--
-- Constraints for table `livro_categoria`
--
ALTER TABLE `livro_categoria`
  ADD CONSTRAINT `livro_categoria_ibfk_1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`) ON DELETE CASCADE,
  ADD CONSTRAINT `livro_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
