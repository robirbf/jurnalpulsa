-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 10:23 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jurnalpulsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`) VALUES
(24, 'Barrack ', 'Obama ', 'male', 'Pahang', '2016-05-04'),
(25, NULL, 'sdf', 'female', 'sdf', NULL),
(26, NULL, 'Basa', 'male', 'Jl. Hangtuah No. 211', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_pelanggan`
--

CREATE TABLE `t_pelanggan` (
  `kd_pel` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`kd_pel`, `nama`, `no_hp`) VALUES
('hrb001', 'robi', '081374790724'),
('test', 'hrb', '3241434');

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE `t_produk` (
  `id` int(11) UNSIGNED NOT NULL,
  `kd_produk` varchar(100) DEFAULT NULL,
  `nm_prdk` varchar(100) DEFAULT NULL,
  `hrg_server` int(100) DEFAULT NULL,
  `hrg_jual` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_produk`
--

INSERT INTO `t_produk` (`id`, `kd_produk`, `nm_prdk`, `hrg_server`, `hrg_jual`) VALUES
(24, 'PLN20', 'Token PLN 20 Ribuu', 20225, 22000),
(27, 'S10', 'Telkomsel 10 Ribu', 10195, 12000),
(29, 'STG25', 'Paket Data Telkomsel 25 Ribu', 24275, 27000),
(30, 'PLN50', 'Token PLN 50 Ribu', 0, 52000),
(31, 'S20', 'Telkomsel 20 Ribu', 0, 22000),
(32, 'S5', 'Telkomsel 5 Ribu', 0, 7000),
(33, 'S50', 'Telkomsel 50 Ribu', 0, 52000),
(34, 'PLN100', 'Token PLN 100 Ribu', 0, 102000);

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `trxid` int(100) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `sn` varchar(100) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `via` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id`, `tanggal`, `trxid`, `kode`, `tujuan`, `status`, `harga`, `sn`, `pengirim`, `via`) VALUES
(42, '01/04/2018 10:53', 2147483647, 'I5', '81534046770', 'SUKSES', '5725', '1148091096', 'serverbisa@jabbim.com', 'xmpp'),
(43, '02/04/2018 10:45', 2147483647, 'S10', '81374893979', 'SUKSES', '10195', '8040241002305790000', 'serverbisa@jabbim.com', 'xmpp'),
(44, '02/04/2018 17:56', 2147483647, 'TD2', '8998707559', 'SUKSES', '34150', 'RPM2-987075', 'serverbisa@jabbim.com', 'xmpp'),
(45, '02/04/2018 18:13', 2147483647, 'TD1', '89693632465', 'SUKSES', '19750', 'RPM1-693632', 'serverbisa@jabbim.com', 'xmpp'),
(46, '03/04/2018 9:22', 2147483647, 'S10', '81363346152', 'SUKSES', '10195', '8040341002308770000', 'serverbisa@jabbim.com', 'xmpp'),
(47, '03/04/2018 13:32', 2147483647, 'S5', '85263870738', 'SUKSES', '5345', '8040313323721850000', 'serverbisa@jabbim.com', 'xmpp'),
(48, '03/04/2018 15:05', 2147483647, 'PLN20', '86024903774', 'SUKSES', '20300', '5158-4356-8195-6003-5156/HENDRA GUNAWAN/R1/1300/12.4', 'serverbisa@jabbim.com', 'xmpp'),
(49, '05/04/2018 7:44', 2147483647, 'S10', '81277769956', 'SUKSES', '10195', '41002315042959', 'serverbisa@jabbim.com', 'xmpp'),
(50, '05/04/2018 9:31', 2147483647, 'S10', '81374739505', 'SUKSES', '10195', '41002315458598', 'serverbisa@jabbim.com', 'xmpp'),
(51, '05/04/2018 10:02', 2147483647, 'S25', '82172216717', 'SUKSES', '24595', '41002315582576', 'serverbisa@jabbim.com', 'xmpp'),
(52, '05/04/2018 10:11', 2147483647, 'S10', '81374893979', 'SUKSES', '10195', '41002315614389', 'serverbisa@jabbim.com', 'xmpp'),
(53, '05/04/2018 20:05', 2147483647, 'S10', '81266276957', 'SUKSES', '10195', '41002317480683', 'serverbisa@jabbim.com', 'xmpp'),
(54, '05/04/2018 20:06', 2147483647, 'I5', '85760940910', 'SUKSES', '5725', '1186064241', 'serverbisa@jabbim.com', 'xmpp'),
(55, '06/04/2018 11:40', 2147483647, 'S10', '82174403243', 'SUKSES', '10195', '41002319111915', 'serverbisa@jabbim.com', 'xmpp'),
(56, '08/04/2018 7:31', 2147483647, 'S50', '81275110025', 'SUKSES', '48845', '41002324470842', 'serverbisa@jabbim.com', 'xmpp'),
(57, '08/04/2018 9:00', 2147483647, 'I5', '85760940910', 'SUKSES', '5725', '1206067771', 'serverbisa@jabbim.com', 'xmpp'),
(58, '08/04/2018 18:54', 2147483647, 'TD3', '895383290276', 'SUKSES', '48325', 'RPM3', 'serverbisa@jabbim.com', 'xmpp'),
(59, '09/04/2018 7:08', 2147483647, 'X50', '8197585504', 'SUKSES', '49175', '9709040925646', 'serverbisa@jabbim.com', 'xmpp'),
(60, '09/04/2018 7:32', 2147483647, 'PLN50', '45015079150', 'SUKSES', '50220', '4533-5249-4552-7693-2929/HENDRISON/R1/1300VA/31,0', 'serverbisa@jabbim.com', 'xmpp'),
(61, '09/04/2018 8:31', 2147483647, 'S10', '81374790724', 'SUKSES', '10195', '8040908311201380000', 'serverbisa@jabbim.com', 'xmpp'),
(62, '09/04/2018 15:05', 2147483647, 'S10', '82288295164', 'SUKSES', '10195', '41002329038274', 'serverbisa@jabbim.com', 'xmpp'),
(63, '09/04/2018 15:10', 2147483647, 'S10', '81277234211', 'SUKSES', '10195', '41002329051726', 'serverbisa@jabbim.com', 'xmpp'),
(64, '09/04/2018 20:01', 2147483647, 'STG25', '82170248584', 'SUKSES', '24275', '1804092002112090000', 'serverbisa@jabbim.com', 'xmpp'),
(65, '10/04/2018 14:46', 2147483647, 'S10', '82174403243', 'SUKSES', '10195', '41002332095822', 'serverbisa@jabbim.com', 'xmpp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1523692615, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
