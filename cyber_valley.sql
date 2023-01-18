-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 18, 2023 alle 23:10
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyber_valley`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `course`
--

CREATE TABLE `course` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descrizione` text DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `course`
--

INSERT INTO `course` (`id`, `nome`, `descrizione`, `user_id`) VALUES
(1, 'HTML', 'Corso base di HTML', 9),
(2, 'PHP', 'Corso base di php', 1),
(3, 'JavaScript', 'Corso base di JavaScript', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `courseusers`
--

CREATE TABLE `courseusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `courseusers`
--

INSERT INTO `courseusers` (`id`, `user_id`, `course_id`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 3, 3),
(4, 1, 3),
(5, 9, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descrizione` text DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `codice_fiscale` varchar(20) DEFAULT NULL,
  `data_nascita` date NOT NULL,
  `data_registrazione` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `nome`, `cognome`, `email`, `password`, `telefono`, `codice_fiscale`, `data_nascita`, `data_registrazione`, `role`) VALUES
(1, 'Pippo', 'Pluto', 'pippo.pluto@gmail.com', '$2y$10$OI1v/KRMzlAlnXZ3qodPY.KAM2Al7ZVpzamYqxAvYs500Ai5sxoNm', '555-5555-555', '0123456789012345', '2002-01-05', '2022-12-21 08:55:43', 'user'),
(3, 'Samuel', 'Di Giovanni', 'samuel.dgv@gmail.com', '$2y$10$Wbwkt6HZ6tsSrxM9VxYByuUoX1pRKUaGO9JH8lzVPTopj0Ml6YIc2', '333-3333-333', '0123456789012345', '2003-01-10', '2023-01-10 18:51:25', 'admin'),
(9, 'Pluto', 'Pippo', 'pluto.pippo@gmail.com', '$2y$10$9JBMY2zrtK/5lNvZdJuTDOIlyN/2gE212H.EMBOIPvttxrH6RJBdK', '222-2222-222', '0123456789012345', '1998-02-25', '2023-01-17 15:42:18', 'user'),
(11, 'Mario', 'Rossi', 'mario.rossi@gmail.com', '$2y$10$Fg6tEVtyktvlemCW357W7uZ7IURFpA/eTuTh73FN.4nh43y2fw3ke', '', '', '1988-02-05', '2023-01-18 18:37:17', 'user');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `courseusers`
--
ALTER TABLE `courseusers`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `courseusers`
--
ALTER TABLE `courseusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
