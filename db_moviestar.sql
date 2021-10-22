-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
--
-- Host: localhost:3306
-- Tempo de geração: 22/10/2021 às 17:38
-- Versão do servidor: 10.5.12-MariaDB-0+deb11u1
-- Versão do PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_moviestar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `movies`
--

CREATE TABLE `movies` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `trailer` varchar(150) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `length` varchar(50) DEFAULT NULL,
  `users_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `users_id` int(11) UNSIGNED DEFAULT NULL,
  `MOVIES_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `image`, `token`, `bio`) VALUES
(1, 'Jocimar', 'Roberto Silva', 'jocimar@saojoao.sp.gov.br', '$2y$10$HcIWNOAivUvEv7ymkBgX9OEMSe46FqUL9PZOvwdQ5ISVMOKQhb.5O', NULL, '1d882c1d223ff01d3f971d68adbe44dbbc3bb7faa09b621127dbdbf7e74c7d380fb89ac1bd4d3b6ba3ef2d68c754e9aa06a4', NULL),
(2, 'Jocimar', 'Roberto Silva', 'jocimarweb@gmail.com', '$2y$10$/vnQICTPGum7Ww.aPL3nNuZIAeyn2/U4r0jJZropnnmSdewHU0H42', NULL, '0e24f4adcb36f1973b9faa3f8212b6936f877fbef84b9bc99445aff4f65f18c13bd0bb2156ad1eb3c96fb373247480cc10b6', NULL),
(3, 'Teste', '123', 'teste@teste.com', '$2y$10$wfqFv7y9W74zxTGvkR/nr.wDMmNA13jWVN.urD3mWzOFPnYGtNP6W', NULL, '72a3c48b8bbf619d8b19dbfdbac1ce950cb75d0264ad2ba21fb62cd37368b39de66986ab16cad6a71d71021726850a4417b5', NULL),
(4, 'Teste', '123', 'teste2@teste.com', '$2y$10$DeaneLrYAujB7GpE3eFSdOxB7hdeIrjxCSMCEJYwSKyJE3bUtRZqO', NULL, '712ebdcc7cb5116deffbe413c9bcb0e2c5e0f23fe8480d4ba8505f573c026a9179d187c8dc1a86625adebd6086009d035763', NULL),
(5, 'teste3', '123', 'teste3@teste.com', '$2y$10$auKZ/zWk3qQaA6FqOql39.KTvTApvXABWL./riFjqxKh89oxzaPw6', NULL, 'b4cdd2fb1c06da914723a952a279fba0e7157395fffe3567327bee5a6c0d89bc36e6af7ba0dd99644ebefbe42064d56fca1f', NULL),
(6, 'Teste4', '123', 'teste4@teste.com', '$2y$10$/h2R0xF8SUDOrYA8GlsYh.duTqgcChdtoSyfS5QqYzMi09dQg/C6q', NULL, 'a01193314e2c3690f39caa5966334dffd659238b340a3cbf048e81e1c26414af7a812560e4fbd3a7c9908295823871d85b6f', NULL),
(7, 'Teste5', '123', 'teste5@teste.com', '$2y$10$5uxGuFaE9R1dPt7MY/eY2OhiT4uLD9bRTr2wPYnW9CuHEPuGxq6Wy', NULL, '1cab0bdce422705ea3f9e10908ab3b931e5c912c86240486a7223ae1b5e97fab5641d57f2fdaadc6a3e191fabadee87a4d77', NULL),
(8, 'Teste6', '123', 'teste6@teste.com', '$2y$10$bQ/E2vagPqYf3o.erpMqiehUqtT/Hfq5MSEpX2DyS1iG0MUGMSTcS', NULL, '8ef32853d850c144e9ef2d0823a0b3a5a4a5f60c0873ed35f4b878fc1359130b418b3f325c205fcbd9ac9390f0a210e29f76', NULL),
(9, 'Teste7', '123', 'teste7@teste.com', '$2y$10$8AUQfOX0oBGU8hQ5xRxrveCqhw8o9IyTb77Rc/qWwRFWf4dwPsCTy', NULL, 'a48eb558950c76c6000365e6571a31a7a1423cec8ba1433245bbfa14f84423bd898e488169af02c2ce1b6f1edfa30a0c022c', NULL),
(10, 'Teste8', '123', 'teste8@teste.com', '$2y$10$q2fZ3JnYYkbUYvEXcW.in.5NBd7rszMDme448sRnLAqX1LFANWlt6', NULL, '86af4dabefb901b1c5eac4e32609418f291921ba1884aade4cbabb4b38bcafbe409d0f109beb73214c6f0c5706ca89bd92e3', NULL),
(11, 'Teste9', '123', 'teste9@teste.com', '$2y$10$wPt2jZkKisOjoKlmu0WS/OdkDH5sE1gLlurGciS3VuH13NhkJNqqy', NULL, 'a452029ff4e4aef171200e6b570f8b5271e37c75c8844a63db09341e9e66a4cdf3242367a600468774e1888fe3985c633aba', NULL),
(12, 'Teste10', '123', 'teste10@teste.com', '$2y$10$ZKDpyUtwg3eaYTwOgZBZGemzoWb1KlePlTTF/OWd3qaDY7xaUnwzy', NULL, 'f3f44a8611c86032082e5e44f0e7d1d580df0cd7b4d3b5416eda3e8617a81111dfdbe61554c1fb7e1d5069aee9804e6d51c8', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Índices de tabela `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `MOVIES_id` (`MOVIES_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`MOVIES_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
