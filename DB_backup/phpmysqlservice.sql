-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Iun 2016 la 11:00
-- Versiune server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmysqlservice`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tblfiles`
--

CREATE TABLE `tblfiles` (
  `case_id` int(11) NOT NULL,
  `photo1` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAȚII PENTRU TABEL `tblfiles`:
--

--
-- Salvarea datelor din tabel `tblfiles`
--

INSERT INTO `tblfiles` (`case_id`, `photo1`) VALUES
(2, 0x74657374312e706466),
(3, 0x6a7320666f726d2076616c69646174696f6e2e706e67);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tblservice`
--

CREATE TABLE `tblservice` (
  `id` int(11) NOT NULL,
  `servdays` int(2) NOT NULL,
  `receivedate` varchar(30) NOT NULL,
  `clientname` varchar(30) NOT NULL,
  `clientstreet` varchar(30) NOT NULL,
  `clientbl` varchar(30) NOT NULL,
  `clientsc` varchar(30) NOT NULL,
  `clientap` varchar(30) NOT NULL,
  `clientet` varchar(30) NOT NULL,
  `clientjud` varchar(30) NOT NULL,
  `clientloc` varchar(30) NOT NULL,
  `clientphone` varchar(30) NOT NULL,
  `clientemail` varchar(30) NOT NULL,
  `store` varchar(30) NOT NULL,
  `av` varchar(30) NOT NULL,
  `functia` varchar(30) NOT NULL,
  `storephone` varchar(30) NOT NULL,
  `product` varchar(30) NOT NULL,
  `productbrand` varchar(30) NOT NULL,
  `productmodel` varchar(30) NOT NULL,
  `sn` varchar(30) NOT NULL,
  `aspect` varchar(30) NOT NULL,
  `accesorii` varchar(30) NOT NULL,
  `cgnumber` varchar(30) NOT NULL,
  `cgdate` varchar(30) NOT NULL,
  `invoicenumber` varchar(30) NOT NULL,
  `invoicedate` varchar(30) NOT NULL,
  `defect` varchar(30) NOT NULL,
  `servunit` varchar(30) NOT NULL,
  `servphone` varchar(30) NOT NULL,
  `servadress` varchar(30) NOT NULL,
  `servcontact` varchar(30) NOT NULL,
  `sentdate` varchar(30) NOT NULL,
  `awb` varchar(30) NOT NULL,
  `confdate` varchar(30) NOT NULL,
  `releasedate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAȚII PENTRU TABEL `tblservice`:
--   `id`
--       `tblfiles` -> `case_id`
--

--
-- Salvarea datelor din tabel `tblservice`
--

INSERT INTO `tblservice` (`id`, `servdays`, `receivedate`, `clientname`, `clientstreet`, `clientbl`, `clientsc`, `clientap`, `clientet`, `clientjud`, `clientloc`, `clientphone`, `clientemail`, `store`, `av`, `functia`, `storephone`, `product`, `productbrand`, `productmodel`, `sn`, `aspect`, `accesorii`, `cgnumber`, `cgdate`, `invoicenumber`, `invoicedate`, `defect`, `servunit`, `servphone`, `servadress`, `servcontact`, `sentdate`, `awb`, `confdate`, `releasedate`) VALUES
(3, 0, '2016-06-15', 'Popescu Test', 'Ghioceilor', '4', '2', '9', '2', 'Cluj', 'Cluj Napoca', '0745987658', 'popescu@test.ro', 'Media Galaxy Cluj Polus', 'Adrian Pop', 'BK', '0264275118', 'Laptop', 'Lenovo', 'B590', '895748', 'urme normale de utilizare', 'alimentator, baterie, ambalaj ', '78', '2015-09-03', 'MG8965874', '2015-09-03', 'nu porneste', 'ServSkills', '0264789456', 'Calea Turzii nr. 58', 'Tehnicianu Gigel', '', '', '', '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(250) NOT NULL,
  `store` varchar(10) NOT NULL,
  `codvanzator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELAȚII PENTRU TABEL `utilizatori`:
--

--
-- Salvarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`id`, `username`, `password`, `store`, `codvanzator`) VALUES
(3, 'Adrian', 'ee8d51deb3b703664db00edf0e3181b2', 'MG Cluj Po', 3265809);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblfiles`
--
ALTER TABLE `tblfiles`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `tblservice`
--
ALTER TABLE `tblservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblfiles`
--
ALTER TABLE `tblfiles`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblservice`
--
ALTER TABLE `tblservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `tblservice`
--
ALTER TABLE `tblservice`
  ADD CONSTRAINT `tblservice_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tblfiles` (`case_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
