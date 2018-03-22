-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 22-Mar-2018 às 20:42
-- Versão do servidor: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caraguagosto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Carnes e Aves', '2018-03-21 23:44:10', '2018-03-20 23:20:03', NULL),
(2, 'Frutos do Mar', '2018-03-21 23:44:17', '2018-03-21 19:11:29', NULL),
(3, 'Sabor de Praia', '2018-03-21 23:45:20', '2018-03-21 21:54:45', NULL),
(4, 'Comida de Boteco', '2018-03-21 23:45:57', '2018-03-21 23:45:57', NULL),
(5, 'Lanches Artesanais', '2018-03-21 23:46:15', '2018-03-21 23:46:15', NULL),
(6, 'Sobremesas', '2018-03-21 23:46:35', '2018-03-21 23:46:35', NULL),
(7, 'Pizzas', '2018-03-21 23:46:50', '2018-03-21 23:46:50', NULL),
(8, 'Culinária Internacional', '2018-03-21 23:47:00', '2018-03-21 23:47:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_03_16_195512_create_restaurantes_table', 1),
(3, '2018_03_18_230814_create_pratos_table', 1),
(4, '2018_03_18_230823_create_categorias_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `deleted_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `updated_at`, `created_at`, `deleted_at`) VALUES
('wiatan.o.s@outlook.com', '$2y$10$aBPR7gkPSGqh22l.g3P5JezzX9pW2VfEUFnve.RYiAZ7lsjcFn9M2', NULL, '2018-03-21 22:30:36.000000', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pratos`
--

CREATE TABLE `pratos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `restaurante_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pratos`
--

INSERT INTO `pratos` (`id`, `nome`, `categoria_id`, `restaurante_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Batata', 2, 1, '2018-03-21 19:54:03', '2018-03-21 19:54:03', NULL),
(2, 'Brocolis', 5, 4, '2018-03-22 23:24:40', '2018-03-21 21:44:27', NULL),
(3, 'Pão', 2, 3, '2018-03-22 23:24:13', '2018-03-21 21:55:13', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `nome`, `codigo`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Tapera Branca', 10, '2018-03-21 21:22:32', '2018-03-21 19:52:38', NULL),
(3, 'Le chefe', 12, '2018-03-21 21:25:29', '2018-03-21 21:24:14', NULL),
(4, 'Point do joão', 145, '2018-03-22 23:16:10', '2018-03-21 21:54:24', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wiatan', 'wiatan.o.s@outlook.com', '$2y$10$xjZDdfmz/OAeiy1eGA4b/OTVkFrXb/tNNm.04wfM77wn0kjfjtyg2', 'HxPv3yjUuRiu6NxqgsKG8MFL9tVarGdkGbYN0AzaEZhcHocu8cCEp9sGxLB2', '2018-03-21 22:11:43', '2018-03-21 22:11:43'),
(2, 'adm', 'adm@adm.com', '$2y$10$tVovUsGVQH7GwoTylAwqIuhGaLgNMYngcmIM1BLAtkjAR0CaFsK2.', NULL, '2018-03-22 23:26:47', '2018-03-22 23:26:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pratos`
--
ALTER TABLE `pratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prato_categoria_idx` (`categoria_id`),
  ADD KEY `fk_prato_restaurante1_idx` (`restaurante_id`);

--
-- Indexes for table `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pratos`
--
ALTER TABLE `pratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pratos`
--
ALTER TABLE `pratos`
  ADD CONSTRAINT `fk_prato_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prato_restaurante1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
