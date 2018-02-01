-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 01, 2018 lúc 05:24 AM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `onfilm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `passwd` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `passwd`, `status`, `isadmin`) VALUES
(1, 'admin', 'admin', 1, 1),
(2, 'user', 'user', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `theloai` int(11) NOT NULL,
  `link` varchar(2000) NOT NULL,
  `tenphim` varchar(500) NOT NULL,
  `link_image_phim` varchar(20000) NOT NULL,
  `nam_san_xuat` int(11) NOT NULL,
  `thoi_luong_phim` varchar(2000) NOT NULL,
  `quocgia` varchar(2000) NOT NULL,
  `do_phan_giai` varchar(2000) NOT NULL,
  `dao_dien` varchar(5000) NOT NULL,
  `dien_vien` varchar(5000) NOT NULL,
  `noi_dung` varchar(7000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `film`
--

INSERT INTO `film` (`id`, `theloai`, `link`, `tenphim`, `link_image_phim`, `nam_san_xuat`, `thoi_luong_phim`, `quocgia`, `do_phan_giai`, `dao_dien`, `dien_vien`, `noi_dung`) VALUES
(36, 17, 'https://drive.google.com/file/d/13BsPO05HLwrCwymafcMe7gbW9mLzOtmN/view', 'Ná»¯ siÃªu nhÃ¢n (pháº§n 1)', 'http://image.phimmoi.net/film/6135/poster.medium.jpg', 2017, '43 phÃºt', 'Má»¹', 'HD 720p', 'Larry Teng, Allison Adler, Andrew Kreisberg.', 'Chris Wood,  Melissa Benoist,  Mehcad Brooks,  Chyler Leigh,  Jeremy Jordan,  David Harewood,  Calista Flockhart.', 'Phim ká»ƒ vá» cÃ´ gÃ¡i 24 tuá»•i Kara Zor - El, cÃ´ chá»‹ há» cá»§a Superman. CÃ´ nÃ ng Ä‘Ã£ trá»‘n thoÃ¡t khá»i Krypton sau vá»¥ ná»• vÃ  trÃº ngá»¥ táº¡i trÃ¡i Ä‘áº¥t dÆ°á»›i lá»‘t má»™t cÃ´ gÃ¡i bÃ¬nh thÆ°á»ng tÃªn Kara Devengers. NhÆ°ng sau Ä‘Ã³ á»Ÿ tuá»•i 24, Kara quyáº¿t Ä‘á»‹nh sá»­ dá»¥ng kháº£ nÄƒng siÃªu nhiÃªn cá»§a mÃ¬nh Ä‘á»ƒ trá»Ÿ thÃ nh siÃªu anh hÃ¹ng.'),
(37, 18, 'fffff', 'NhÃ¢n cÃ¡ch trong em', 'http://image.phimmoi.net/film/6450/poster.medium.jpg', 0, '', '', '', '', '', ''),
(38, 19, 'gggg', 'TÃ¢n táº§m táº§n kÃ½', 'http://image.phimmoi.net/film/6253/poster.medium.jpg', 0, '', '', '', '', '', ''),
(39, 20, 'hhhh', 'TrÃ² Ä‘Ã¹a Ä‘áº³ng cáº¥p', 'http://image.phimmoi.net/film/6509/poster.medium.jpg', 0, '', '', '', '', '', ''),
(40, 21, 'gggg', 'Thiáº¿u niÃªn cáº©m y vá»‡', 'http://image.phimmoi.net/film/4882/poster.medium.jpg', 0, '', '', '', '', '', ''),
(41, 22, 'gggg', 'PhÆ°á»£ng tÃ¹ hoÃ ng', 'http://image.phimmoi.net/film/6496/poster.medium.jpg', 0, '', '', '', '', '', ''),
(42, 23, 'gggg', 'LÃ¡ch luáº­t (phaafn4)', 'http://image.phimmoi.net/film/6092/poster.medium.jpg', 0, '', '', '', '', '', ''),
(43, 24, 'gggg', 'Báº£y viÃªn ngá»c rá»“ng siÃªu cáº¥p', 'http://image.phimmoi.net/film/2844/poster.medium.jpg', 0, '', '', '', '', '', ''),
(44, 25, 'ggg', 'Sáº¯c Ä‘áº¹p ngÃ n cÃ¢n', 'http://image.phimmoi.net/film/5426/poster.medium.jpg', 0, '', '', '', '', '', ''),
(45, 26, 'sss', 'NgÆ°á»i máº¹', 'http://image.phimmoi.net/film/6527/poster.medium.jpg', 0, '', '', '', '', '', ''),
(46, 27, 'sss', 'Tráº£ Ä‘Å©a (pháº§n 5)', 'http://image.phimmoi.net/film/2857/poster.medium.jpg', 0, '', '', '', '', '', ''),
(47, 28, 'sss', 'CÃ¢u láº¡c bá»™ Mizuki', 'http://image.phimmoi.net/film/5633/poster.medium.jpg', 0, '', '', '', '', '', ''),
(48, 17, 'htk', 'Äiá»ƒm mÃ¹ (pháº§n 3)', 'http://image.phimmoi.net/film/6247/poster.medium.jpg', 0, '', '', '', '', '', ''),
(49, 17, 'ggg', 'NgÆ°á»i sáº¯t 3', 'http://image.phimmoi.net/film/2/poster.medium.jpg', 0, '', '', '', '', '', ''),
(50, 17, 'gggg', 'NgÆ°á»i nhá»‡n 3', 'http://image.phimmoi.net/film/446/poster.medium.jpg', 0, '', '', '', '', '', ''),
(51, 17, 'ggg', 'NgÆ°á»i nhá»‡n trá»Ÿ vá» nhÃ ', 'http://image.phimmoi.net/film/4640/poster.medium.jpg', 0, '', '', '', '', '', ''),
(52, 18, 'hhhh', 'Hoa du kÃ½', 'http://image.phimmoi.net/film/6413/poster.medium.jpg', 0, '', '', '', '', '', ''),
(53, 18, 'gggg', 'Tháº¿ giá»›i giáº£ tÆ°á»Ÿng', 'http://image.phimmoi.net/film/6480/poster.medium.jpg', 0, '', '', '', '', '', ''),
(54, 18, 'gggg', 'Hakumei vÃ  Mikochi', 'http://image.phimmoi.net/film/6487/poster.medium.jpg', 0, '', '', '', '', '', ''),
(55, 17, 'hhhh', 'Diá»…m cá»‘t', 'http://image.phimmoi.net/film/6489/poster.medium.jpg', 0, '', '', '', '', '', ''),
(56, 19, 'gggg', 'Thiáº¿u niÃªn cáº©m y vá»‡', 'http://image.phimmoi.net/film/4882/poster.medium.jpg', 0, '', '', '', '', '', ''),
(57, 19, 'jjjj', 'Äá»™c bá»™ thiÃªn áº¡', 'http://image.phimmoi.net/film/6222/poster.medium.jpg', 0, '', '', '', '', '', ''),
(58, 19, 'kkkk', 'HÃ ng yÃªu ká»³ Ã¡n', 'http://image.phimmoi.net/film/6341/poster.medium.jpg', 0, '', '', '', '', '', ''),
(59, 19, 'nnnn', 'VÆ°Æ¡ng gia bÃ¡ Ä‘áº¡o', 'http://image.phimmoi.net/film/6181/poster.medium.jpg', 0, '', '', '', '', '', ''),
(60, 20, 'gg', 'YÃªu miÃªu truyá»‡n', 'http://image.phimmoi.net/film/6476/poster.medium.jpg', 0, '', '', '', '', '', ''),
(61, 20, 'ss', 'Cá»•ng Ä‘á»‹a ngá»¥c', 'http://image.phimmoi.net/film/6493/poster.medium.jpg', 0, '', '', '', '', '', ''),
(62, 20, 'g', 'Káº» du hÃ nh (pháº§n 2)', 'http://image.phimmoi.net/film/6442/poster.medium.jpg', 0, '', '', '', '', '', ''),
(63, 20, 'g', 'Há»™i phÃ¡p sÆ° (pháº§n 3)', 'http://image.phimmoi.net/film/6491/poster.medium.jpg', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloaiphim`
--

CREATE TABLE `theloaiphim` (
  `id` int(11) NOT NULL,
  `tentheloai` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `theloaiphim`
--

INSERT INTO `theloaiphim` (`id`, `tentheloai`) VALUES
(17, 'Phim hÃ nh Ä‘á»™ng'),
(18, 'Phim hÃ i hÆ°á»›c'),
(19, 'Phim cá»• trang'),
(20, 'Phim viá»…n tÆ°á»Ÿng'),
(21, 'Phim vÃµ thuáº­t'),
(22, 'Phim tháº§n thoáº¡i'),
(23, 'Phim hÃ¬nh sá»±'),
(24, 'Phim hoáº¡t hÃ¬nh'),
(25, 'Video game'),
(26, 'Phim tÃ¢m lÃ½'),
(27, 'Phim kinh dá»‹'),
(28, 'Phim thá»ƒ thao - Ã¢m nháº¡c');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_theloaiphim_film` (`theloai`);

--
-- Chỉ mục cho bảng `theloaiphim`
--
ALTER TABLE `theloaiphim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `theloaiphim`
--
ALTER TABLE `theloaiphim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_theloaiphim_film` FOREIGN KEY (`theloai`) REFERENCES `theloaiphim` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
