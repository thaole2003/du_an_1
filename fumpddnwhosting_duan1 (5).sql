-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2022 at 10:06 AM
-- Server version: 10.2.40-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fumpddnwhosting_duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `id_user`, `name`, `price`, `email`, `address`, `phone`, `status`, `date`, `images`) VALUES
(12, 11, 'abc', 50000, 'a@gmail.com', 'Hà Nội', '0868985927', 1, '12/02/2022 01:18:36 pm', 'su-do-vo-han-va-12-chien-co_1596767172.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(139, ' Hành động'),
(140, ' Kịch'),
(141, ' Võ thuật'),
(142, 'Hài hước'),
(143, 'Kịch tính'),
(144, 'Viễn tưởng'),
(145, 'Trinh Thám'),
(156, 'Lãng mạn');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `number_chapter` int(11) DEFAULT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_comic` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `number_chapter`, `noi_dung`, `date`, `id_comic`) VALUES
(1, 1, 'Tấn công quái vật', '12/02/2022 06:48:41 am', 213),
(2, 2, 'Đứng dậy sau thất bại', '12/02/2022 06:49:48 am', 213),
(3, 3, 'Không chịu khuất phục', '12/02/2022 06:50:08 am', 213),
(4, 1, 'Khởi đầu khó khăn', '12/02/2022 06:54:45 am', 214),
(5, 2, 'Khiêu khích kẻ thù', '12/02/2022 06:55:10 am', 214),
(6, 3, 'Tất cả hãy đầu hàng', '12/02/2022 06:57:42 am', 214),
(7, 1, 'Nổi dậy mạnh mẽ', '12/02/2022 07:02:39 am', 215),
(8, 2, 'Quá sức tưởng tượng', '12/02/2022 07:03:02 am', 215),
(9, 3, 'Thật sự như vậy ư...', '12/02/2022 07:03:20 am', 215),
(10, 1, 'Dũng khí trào dâng', '12/02/2022 07:06:33 am', 216),
(11, 2, 'Chạy mau!!!!', '12/02/2022 07:06:54 am', 216),
(12, 3, 'Hoàng hôn', '12/02/2022 07:07:06 am', 216),
(13, 1, 'Đội quân hùng mạnh', '12/02/2022 07:08:37 am', 217),
(14, 2, 'Thanh gươm đẫm máu', '12/02/2022 07:09:07 am', 217),
(15, 3, 'Cuộc chạy đua', '12/02/2022 07:09:22 am', 217),
(36, 1, 'qưe', '12/02/2022 03:14:40 pm', 235),
(37, 1, 'qưe', '12/02/2022 03:18:59 pm', 236),
(38, 1, 'Ngự lâm quân', '12/02/2022 03:44:55 pm', 237),
(39, 2, 'Trên bầu trời', '12/02/2022 03:45:19 pm', 237),
(40, 3, 'Núi cao', '12/02/2022 03:45:35 pm', 237),
(41, 1, 'Chặm mặt!', '12/02/2022 03:46:49 pm', 238),
(42, 2, 'Lẩn chốn', '12/02/2022 03:47:19 pm', 238),
(43, 3, 'Lôi thiên giáng hạ', '12/02/2022 03:47:45 pm', 238),
(44, 1, 'Trời cao đất dày', '12/02/2022 03:49:20 pm', 239),
(45, 2, 'Yêu cầu rời đi', '12/02/2022 03:49:45 pm', 239),
(46, 3, 'Ô lalala...Tự do rồi', '12/02/2022 03:50:05 pm', 239),
(47, 1, 'Gặp mặt lần đầu', '12/02/2022 03:52:32 pm', 240),
(48, 2, 'Yêu từ cái nhìn đầu tiên', '12/02/2022 03:52:52 pm', 240),
(49, 3, 'Nhớ mong người ấy!', '12/02/2022 03:53:16 pm', 240),
(50, 1, 'Đáng sợ .... QUÁ!', '12/02/2022 03:54:40 pm', 241),
(51, 2, 'Nỗi sợ bất tận', '12/02/2022 03:54:56 pm', 241),
(52, 3, 'Đứng dậy sau nỗi sợ', '12/02/2022 03:55:17 pm', 241),
(53, 1, 'Những thứ nên tránh!', '12/02/2022 03:56:25 pm', 242),
(54, 2, 'Không thấy mặt trăng', '12/02/2022 03:56:55 pm', 242),
(55, 3, 'Khi học giỏi', '12/02/2022 03:57:43 pm', 242),
(56, 1, 'Bóng đêm bí ẩn', '12/02/2022 04:00:57 pm', 243),
(57, 2, 'Hạ màn', '12/02/2022 04:01:16 pm', 243),
(58, 3, 'Giọt nước đã rơi', '12/02/2022 04:01:33 pm', 243),
(59, 1, 'Đối đầu!', '12/02/2022 04:02:34 pm', 244),
(60, 2, 'Gặp mặt!', '12/02/2022 04:02:53 pm', 244),
(61, 3, 'Kungfu tỷ thí', '12/02/2022 04:03:10 pm', 244),
(62, 1, 'Đấu trí', '12/02/2022 04:04:39 pm', 245),
(63, 2, 'Gục ngã!', '12/02/2022 04:04:57 pm', 245),
(64, 3, 'Hạ gục dễ dàng', '12/02/2022 04:05:12 pm', 245),
(65, 1, 'Hội trường quyết liệt', '12/02/2022 04:08:58 pm', 246),
(66, 2, 'Bản năng!', '12/02/2022 04:09:39 pm', 246),
(67, 3, 'Khi mặt trời biến mất', '12/02/2022 04:09:58 pm', 246),
(68, 1, 'Lướt ván', '12/02/2022 04:10:54 pm', 247),
(69, 2, 'Kỹ năng bẩm sinh', '12/02/2022 04:11:14 pm', 247),
(70, 3, 'Kỹ thuật điêu luyện', '12/02/2022 04:11:32 pm', 247),
(71, 1, 'Ký giả bình minh', '12/02/2022 04:12:28 pm', 248),
(72, 2, 'Sứ giả quốc gia', '12/02/2022 04:12:53 pm', 248),
(73, 3, 'Giúp đỡ thần sứ', '12/02/2022 04:13:12 pm', 248),
(74, 1, 'Dung mạo thiên nhân', '12/02/2022 04:14:27 pm', 249),
(75, 2, 'Gặp mặt quán trà', '12/02/2022 04:14:48 pm', 249),
(76, 3, 'Nhớ quê', '12/02/2022 04:15:07 pm', 249),
(77, 1, 'Cú đánh định mệnh', '12/02/2022 04:16:32 pm', 250),
(78, 2, 'Bắt bóng 1 tay', '12/02/2022 04:16:55 pm', 250),
(79, 3, 'Bóng đẹp! GOOD...', '12/02/2022 04:17:19 pm', 250),
(80, 1, 'Trận đấu hay', '12/02/2022 04:18:11 pm', 251),
(81, 2, 'Sút bay tất cả', '12/02/2022 04:18:45 pm', 251),
(82, 3, 'Cản bóng!', '12/02/2022 04:19:21 pm', 251),
(83, 1, 'Đối thủ truyền kiếp', '12/02/2022 04:21:10 pm', 252),
(84, 2, 'K.OOOO!', '12/02/2022 04:21:33 pm', 252),
(85, 3, 'Trả thù', '12/02/2022 04:21:43 pm', 252),
(86, 1, 'Nụ cười', '12/02/2022 04:23:10 pm', 253),
(87, 2, 'Ký ức buồn', '12/02/2022 04:23:37 pm', 253),
(88, 3, 'Tuổi thơ bất hạnh', '12/02/2022 04:23:54 pm', 253),
(89, 1, 'Chiến đấu kiên cường', '12/02/2022 04:25:02 pm', 254),
(90, 2, 'Không bỏ cuộc', '12/02/2022 04:25:17 pm', 254),
(91, 3, 'Bỏ cuộc!', '12/02/2022 04:26:32 pm', 254),
(92, 1, 'Kế hoạch hành động', '12/02/2022 04:27:28 pm', 255),
(93, 2, 'Nỗ lực không ngừng nghỉ!', '12/02/2022 04:27:53 pm', 255),
(94, 3, 'Thành quả cuối cùng', '12/02/2022 04:28:33 pm', 255),
(95, 1, 'Bắn tỉa trên cao', '12/02/2022 04:29:35 pm', 256),
(96, 2, 'Ngắn nhìn bầu trời', '12/02/2022 04:29:56 pm', 256),
(97, 3, 'Bắn trúng mục tiêu', '12/02/2022 04:30:18 pm', 256),
(98, 1, 'Trời xanh', '12/02/2022 04:31:11 pm', 257),
(99, 2, 'Gió trời', '12/02/2022 04:31:25 pm', 257),
(100, 3, 'Không gian vô tận', '12/02/2022 04:31:40 pm', 257),
(101, 1, 'Vô tình!', '12/02/2022 04:32:31 pm', 258),
(102, 2, 'Khoảng không gian tĩnh lặng', '12/02/2022 04:32:56 pm', 258),
(103, 3, 'Thời cơ tốt!', '12/02/2022 04:33:07 pm', 258),
(104, 1, 'Mặt lạ ác mộng', '12/02/2022 04:34:08 pm', 259),
(105, 2, 'Ám ảnh chiếc mặt nạ', '12/02/2022 04:34:26 pm', 259),
(106, 3, 'Bí mật sau lớp mặt nạ', '12/02/2022 04:34:44 pm', 259),
(107, 1, 'Kiếm thần', '12/02/2022 04:35:42 pm', 260),
(108, 2, 'Điều khiển kiếm', '12/02/2022 04:36:01 pm', 260),
(109, 3, 'Kiểm soát sức mạnh', '12/02/2022 04:36:18 pm', 260),
(110, 1, 'Bóng tối!', '12/02/2022 04:37:07 pm', 261),
(111, 2, 'Sự thật sau màn kịch', '12/02/2022 04:37:32 pm', 261),
(112, 3, 'Lời nói từ biệt', '12/02/2022 04:37:53 pm', 261),
(113, 1, 'Cực khổ', '12/02/2022 04:38:48 pm', 262),
(114, 2, 'Đói khát', '12/02/2022 04:39:02 pm', 262),
(115, 3, 'Kết cục', '12/02/2022 04:39:15 pm', 262),
(116, 1, 'Nụ hôn đầu', '12/02/2022 04:40:18 pm', 263),
(117, 2, 'Nhớ chàng!!!', '12/02/2022 04:40:34 pm', 263),
(118, 3, 'Nơi tình yêu bắt đầu', '12/02/2022 04:40:48 pm', 263),
(119, 1, 'Đồ ăn nóng!', '12/02/2022 04:41:55 pm', 264),
(120, 2, 'Nếm thử', '12/02/2022 04:42:14 pm', 264),
(121, 3, 'Món ăn dở tệ', '12/02/2022 04:42:30 pm', 264),
(122, 1, 'Bay vào không gian', '12/02/2022 04:43:37 pm', 265),
(123, 2, 'Không gian hẹp', '12/02/2022 04:43:53 pm', 265),
(124, 3, 'Chạy trốn trên vũ trụ', '12/02/2022 04:44:10 pm', 265),
(125, 1, 'Nói đi ta nghe đây!', '12/02/2022 04:45:47 pm', 266),
(126, 2, 'Không được phép rời đi', '12/02/2022 04:46:08 pm', 266),
(127, 3, 'Vi phạm phép tắc', '12/02/2022 04:46:25 pm', 266),
(128, 1, 'Trên chiếc xe đó', '12/02/2022 04:48:39 pm', 267),
(129, 2, 'Đánh nhau bất bại', '12/02/2022 04:49:02 pm', 267),
(130, 3, 'Nội vụ xung đột', '12/02/2022 04:49:19 pm', 267),
(131, 1, 'Tranh luận!', '12/02/2022 04:50:44 pm', 268),
(132, 2, 'Lời nói dối', '12/02/2022 04:50:58 pm', 268),
(133, 3, 'Sự thật khó ngờ', '12/02/2022 04:51:11 pm', 268),
(134, 1, 'Chạm mặt quái vật', '12/02/2022 04:52:47 pm', 269),
(135, 2, 'Chiến đâu không ngừng', '12/02/2022 04:53:11 pm', 269),
(136, 3, 'Chốt hạ!', '12/02/2022 04:53:24 pm', 269);

-- --------------------------------------------------------

--
-- Table structure for table `comic`
--

CREATE TABLE `comic` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `like_comic` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `poster` int(11) DEFAULT NULL,
  `vip` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comic`
--

INSERT INTO `comic` (`id`, `name`, `cover_image`, `detail`, `author`, `date`, `intro`, `view`, `like_comic`, `category_id`, `status`, `poster`, `vip`, `price`) VALUES
(213, 'Học Viện Anh Hùng', 'main1.jpg', 'Vào tương lai, lúc mà con người với những sức mạnh siêu nhiên là điều thường thấy quanh thế giới. Đây là câu chuyện về Izuku Midoriya, từ một kẻ bất tài trở thành một siêu anh hùng. Tất cả ta cần là mơ ước.', 'Hakimmi', '12/02/2022 06:52:51 am', 'Truyện thịnh hành', 5, 1246, 139, 2, 11, 0, 0),
(214, 'One Piece', 'slider_1559211185.jpg', 'One Piece là câu truyện kể về Luffy và các thuyền viên của mình. Khi còn nhỏ, Luffy ước mơ trở thành Vua Hải Tặc. Cuộc sống của cậu bé thay đổi khi cậu vô tình có được sức mạnh có thể co dãn như cao su, nhưng đổi lại, cậu không bao giờ có thể bơi được nữa. Giờ đây, Luffy cùng những người bạn hải tặc của mình ra khơi tìm kiếm kho báu One Piece, kho báu vĩ đại nhất trên thế giới. Trong One Piece, mỗi nhân vật trong đều mang một nét cá tính đặc sắc kết hợp cùng các tình huống kịch tính, lối dẫn truyện hấp dẫn chứa đầy các bước ngoặt bất ngờ và cũng vô cùng hài hước đã biến One Piece trở thành một trong những bộ truyện nổi tiếng nhất không thể bỏ qua. Hãy đọc One Piece để hòa mình vào một thế giới của những hải tặc rộng lớn, đầy màu sắc, sống động và thú vị, cùng đắm chìm với những nhân vật yêu tự do, trên hành trình đi tìm ước mơ của mình.', 'Eiichiro Oda', '12/02/2022 06:54:45 am', 'Truyện hot', 4, 652, 139, 2, 11, 0, 0),
(215, 'Hội Pháp Sư Nhiệm Vụ Trăm Năm', 'slider_1561609693.jpg', 'Tuyện tiếp nối của Fairy Tail, khi nhóm Natsu đi làm nhiệm vụ trăm năm.', 'Kabuchaki', '12/02/2022 07:02:39 am', 'Truyện hấp dẫn', 8, 654, 141, 2, 11, 0, 0),
(216, 'Thanh Gươm Diệt Quỷ', 'slider_1559213537.jpg', 'Kimetsu no Yaiba – Tanjirou là con cả của gia đình vừa mất cha. Một ngày nọ, Tanjirou đến thăm thị trấn khác để bán than, khi đêm về cậu ở nghỉ tại nhà người khác thay vì về nhà vì lời đồn thổi về ác quỷ luôn rình mò gần núi vào buổi tối. Khi cậu về nhà vào ngày hôm sau, bị kịch đang đợi chờ cậu…', 'Gotouge Koyoharu', '12/02/2022 07:06:33 am', 'Chém nhau, bay nhảy', 0, 658, 140, 2, 11, 0, 0),
(217, 'Ánh Sáng & Bóng Tối', 'slider_1587986979.jpg', 'Bộ truyện tranh đầu tiên của tựa game Liên Quân Mobile chính thức ra mắt\r\nCâu chuyện lấy bối cảnh ở một vùng đất giả tưởng mang tên Athanor, nơi đang bị giày xéo bởi chiến tranh giữa các chủng tộc, giữa thần linh và ác ma.\r\nCùng theo dõi bước chân của hai cô nàng lính đánh thuê Butterfly và Violet trong quá trình truy đuổi một đám pháp sư hắc ám, đã vô tình phát hiện ra một âm mưu vô cùng to lớn như thế nào nhé!', 'Tencent, Garena', '12/02/2022 07:08:37 am', 'Game mô phỏng', 4, 682, 144, 2, 11, 0, 0),
(235, 'Mãi mãi FA', 'than-gui-nang-bach-tuyet_1669254812.jpg', 'qưeqw', 'eqw', '12/02/2022 03:14:40 pm', 'eqw', 0, 0, 144, 3, 19, 0, 0),
(236, 'qưe', 'than-gui-nang-bach-tuyet_1669254812.jpg', 'qưeqw', 'qưeqwe', '12/02/2022 03:18:59 pm', 'qưeqe', 0, 0, 145, 1, 20, 0, 0),
(237, 'Ngự Linh Thế Giới', 'su-do-vo-han-va-12-chien-co_1596767172.jpg', 'Một họa sĩ truyện tranh xuyên qua dị giới\r\nĐến lúc đó, hắn nhận ra 1 vấn đề', 'Inakema', '12/02/2022 03:44:55 pm', 'Truyện hay', 0, 0, 143, 2, 11, 0, 0),
(238, 'Võ Luyện Đỉnh Phong', 'chien-than-tu-sat-hoi-quy_1624846133.jpg', 'Võ đạo đỉnh phong, là cô độc, là tịch mịch, là dài đằng đẵng cầu tác, là cao xử bất thắng hàn\r\n\r\nPhát triển trong nghịch cảnh, cầu sinh nơi tuyệt địa, bất khuất không buông tha, mới có thể có thể phá võ chi cực đạo.\r\n\r\nLăng Tiêu các thí luyện đệ tử kiêm quét rác gã sai vặt Dương Khai ngẫu lấy được một bản vô tự hắc thư, từ nay về sau đạp vào dài đằng đẵng võ đạo.', 'BaSuKiNa', '12/02/2022 03:46:49 pm', 'Truyện nổi tiếng', 0, 0, 142, 2, 11, 1, 20000),
(239, 'Toàn Chức Pháp Sư', 'tu-hong-nguyet-khai-thuy_1660834858.jpg', 'Tỉnh lại sau giấc ngủ, thế giới đại biến. Quen thuộc cao trung truyền thụ chính là phép thuật, nói cho mọi người muốn trở thành một tên xuất sắc Ma Pháp Sư. Ở lại đô thị ở ngoài du đãng tập kích nhân loại ma vật yêu thú, mắt nhìn chằm chằm. Tôn trọng khoa học thế giới đã biến thành tôn trọng phép thuật, một mực có như nhau lấy học tra đối xử giáo viên của chính mình, như nhau ánh mắt dị dạng bạn học, như nhau xã hội tầng dưới chót giãy dụa ba ba, như nhau thuần mỹ nhưng không thể bước đi không phải huyết thống muội muội…\r\n\r\nBất quá, Mạc Phàm phát hiện tuyệt đại đa số người đều chỉ có thể chủ tu nhất hệ phép thuật, chính mình nhưng là toàn hệ toàn năng pháp sư!', 'Jacikami', '12/02/2022 03:49:20 pm', 'King kong bay nhay', 0, 0, 139, 2, 11, 1, 16000),
(240, 'Dịch Vụ Thuê Bạn Gái', 'giet-quai-de-thang-cap_1669350069.jpg', 'Quéo quèo, biết mô tả thế nào đây? Một thằng Zin tên là Kazuya 19 năm mới có bồ không bao lâu thì bị đá, thế là cậu ta phải sử dụng dịch vụ Hẹn hò Thuê, cứ trả xiền là ngày đó bạn sẽ có bạn gái ngay! Cậu ta đã thuê Mizuhara làm bạn gái mình, cô nàng thì cứ công việc (méo có yêu thương gì đâu) mà thả thính, còn chàng ta thì đớp thính vô tội vạ, cho đến khi… Đến khi Kazuya bớt sống ảo, cậu ta ngưng đớp thính và tự sẽ kiếm bạn gái thật cho mình thì mới hớ ra Mizuhara học cùng trường với mình, câu chuyện tình dở khóc dở cười này sẽ ra sao đây? Các bạn đón xem nhé!', 'Miyajima Reiji', '12/02/2022 03:52:32 pm', 'Truyện lãng mạn', 43, 0, 143, 2, 11, 0, 0),
(241, ' Lãnh Chúa Bóng Tối', 'mot-so-mau-truyen-sieu-cung-cua-ngai-kojorin_1669091332.jpg', 'Truyện tranh Lãnh Chúa Bóng Tối được cập nhật nhanh và đầy đủ nhất tại TruyenSvip. Bạn đọc đừng quên để lại bình luận và chia sẻ, ủng hộ TruyenSvip ra các chương mới nhất của truyện Lãnh Chúa Bóng Tối.', 'Minakazu', '12/02/2022 03:54:40 pm', 'Truyện hay', 600, 0, 142, 2, 11, 0, 0),
(242, 'Sự Trở Lại Của Người Chơi Mạnh Nhất', 'ta-la-dai-than-tien_1540132115.jpg', 'Khi bạn thành công ở mọi thứ bạn cố gắng, bạn không còn cách nào khác ngoài tìm kiếm thử thách ở nơi khác, như trong một trò chơi. Bằng cách sử dụng các công việc rác mà không ai chú ý đến, với thái độ đúng đắn, bạn buộc phải hoàn thành mục tiêu của mình! Thậm chí thành công ở những nhiệm vụ bất khả thi nhất, nhân vật chính đặt cược mọi thử anh ta có. Với kĩ năng của mình, tôi sẽ đánh bại trò chơi này !', 'BaChaKiZu', '12/02/2022 03:57:01 pm', 'Truyện thủ lĩnh', 745, 0, 144, 2, 11, 1, 21000),
(243, 'Ranker Mộng Du', 'nguyen-ton_1513349962.jpg', 'Sau khi ngủ một lúc và thức dậy, tôi có một món đồ? Hãy chú ý đến câu chuyện về Đẳng cấp Thần, hậu duệ của Thananos, Hyunsung không thể ngăn cản.', 'MaLiBaCha', '12/02/2022 04:00:57 pm', 'Truyện hấp dẫn', 0, 0, 156, 2, 11, 1, 15000),
(244, 'Thiên Ma Phi Thăng Truyện', 'sieu-than-che-tap-su_1628700281.jpg', 'Bị cấp trên phản bội, trọng sinh nhờ hệ thống, sau khi trọng sinh thì đua top server theo con đường tà ác để trả thù. CUỐN KHỎI BÀN!!!!', 'Hamakiza', '12/02/2022 04:02:34 pm', 'Truyện hành động hay', 252, 0, 141, 2, 11, 1, 16000),
(245, 'Ma Pháp Sư Tại Trường Học Pháp Thuật', 'toi-den-tu-dia-nguc_1668049604.jpg', 'Studio bê ca mếch Bình Dương', 'Bakimane', '12/02/2022 04:04:39 pm', 'Truyện hành động', 523, 0, 141, 2, 11, 1, 31000),
(246, 'Ngã Lão Ma Thần', 'khi-do-chung-ta-con-tre_1664210417.jpg', 'Một trong những Ma thần mạnh nhất lịch sử võ lâm xuất hiện, là kỳ tài võ học kinh người, nhưng khởi nguồn lại là do ... thằng chút chít cách đó cả ngàn năm bay về can thiệp, câu chuyện hư cmn cấu này rồi sẽ đi đâu về đâu', 'Hikamaru', '12/02/2022 04:08:58 pm', 'Truyện kịch tính', 345, 0, 143, 2, 11, 0, 0),
(247, ' Dũng Giả Được Chuyển Sinh', 'anti-gravity-boy_1445477907.jpg', 'August, một dũng giả đã thách thức Quỷ Vương, toàn bộ đồng đội và thế giới của hắn đã bị Quỷ vương hủy diệt. August sau khi chết được chuyển sinh vào một cậu nhóc mẫu giáo ở Trái Đất ,con đường tập hợp những người đồng đội cũ để bảo vệ thế giới một lần nữa bắt đầu!! (Hikkiteam)', 'Jikimanu', '12/02/2022 04:10:54 pm', 'Truyện hay', 0, 0, 144, 2, 11, 0, 0),
(248, 'Bách Luyện Thành Thần', 'than-gui-nang-bach-tuyet_1669254812.jpg', 'Cảnh giới: Luyện nhục cảnh, Luyện cốt cảnh, Luyện tạng cảnh.... La Chính vì gái mà bị đày làm nô bộc. La Bái Nhiên tham vọng đầy mình La Chính lại vì gái mà đâm đầu tu luyện La Gia trong phủ nước sôi lửa bỏng, tranh giành kịch liệt...', 'LaHanKi', '12/02/2022 04:12:28 pm', 'Truyện lãng mạn', 334, 0, 156, 2, 11, 1, 20000),
(249, 'Thần Hồn Võ Đế', 'im-a-shy.jpg', 'Truyện tranh Thần Hồn Võ Đế được cập nhật nhanh và đầy đủ nhất tại TruyenSvip. Bạn đọc đừng quên để lại bình luận và chia sẻ, ủng hộ TruyenSvip ra các chương mới nhất của truyện Thần Hồn Võ Đế.', 'AraKima', '12/02/2022 04:14:27 pm', 'Truyện thần kiếm', 0, 0, 141, 2, 11, 0, 0),
(250, ' Ta Muốn An Tĩnh, Hệ Thống Lại Bắt Ta Tìm Chết', 'vua-bong-chay_1658988357.jpg', 'Leng keng! Hoan nghênh sử dụng toàn trí năng tu chân hệ thống! Trọng yếu nhắc nhở, hệ thống trong lúc tu luyện, ngài sẽ mất đi quyền khống chế thân thể...... Đạt được trí năng tu luyện hệ thống sau, Bùi lăng nghĩ đến âm thầm phi tốc trưởng thành, cẩu thành vương giả. Thẳng đến một ngày nào đó...... Leng keng! Hệ thống kiểm trắc tu luyện thiếu khuyết đạo lữ, hệ thống ngay tại vì ngài tìm kiếm đạo lữ...... Thế là, Bùi lăng trơ mắt nhìn mình đạp ra Thánh nữ môn......', 'Nakasu', '12/02/2022 04:16:32 pm', 'Truyện cổ nhân', 536, 0, 144, 2, 11, 1, 12000),
(251, 'Tuyệt Thế Võ Thần', 'captain-tsubasa.jpg', 'Cửu Tiêu đại lục, tông môn san sát, võ đạo làm đầu, người yếu tầm thường, bị người bắt nạt, cường giả giận dữ, máu chảy thành sông.Võ đạo hoàng giả, càng có thể quan sát thiên địa, ngạo cười non sông, động thì lại ngày kinh thạch phá, phơi thây trăm vạn.Một đời cường nhân Lâm Phong, nghịch thiên xuất thế, đến kinh thế truyền thừa, tu võ đạo, đạp Cửu Tiêu, phá thiên địa, ngạo thương khung!', 'Gamani', '12/02/2022 04:18:11 pm', 'Bóng đã', 81, 0, 139, 2, 11, 0, 0),
(252, 'Ta Có Một Sơn Trại', 'capcom-vs-snk_1593772122.jpg', 'Truyện tranh Ta Có Một Sơn Trại được cập nhật nhanh và đầy đủ nhất tại TruyenSvip. Bạn đọc đừng quên để lại bình luận và chia sẻ, ủng hộ TruyenSvip ra các chương mới nhất của truyện Ta Có Một Sơn Trại.', 'Yamata', '12/02/2022 04:21:10 pm', 'Truyện hot', 432, 0, 141, 2, 11, 1, 18000),
(253, 'Lăng Thiên Thần Đế', 'me-and-roboco_1668755232.jpg', 'Truyện tranh Lăng Thiên Thần Đế được cập nhật nhanh và đầy đủ nhất. Bạn đọc đừng quên để lại bình luận và chia sẻ, ủng hộ ra các chương mới nhất của truyện Lăng Thiên Thần Đế.', 'Tamaki', '12/02/2022 04:23:10 pm', 'Truyện hài', 342, 0, 142, 2, 11, 0, 0),
(254, 'Lâm Binh Đấu Giả', 'hoa-long-vainqueur_1666167689.jpg', 'Truyện tranh Lâm Binh Đấu Giả được cập nhật nhanh và đầy đủ nhất. Bạn đọc đừng quên để lại bình luận và chia sẻ, ủng hộ ra các chương mới nhất của truyện Lâm Binh Đấu Giả.\r\n', 'Fakumi', '12/02/2022 04:25:02 pm', 'Võ thuật', 53, 0, 139, 2, 11, 1, 5000),
(255, 'Chuyển Sinh Thành Tiêu Sư', 'chien-than-bat-tu_1667659075.jpg', 'Truyện tranh Chuyển Sinh Thành Tiêu Sư được cập nhật nhanh và đầy đủ nhất. Bạn đọc đừng quên để lại bình luận và chia sẻ, ủng hộ ra các chương mới nhất của truyện Chuyển Sinh Thành Tiêu Sư.', 'Rakima', '12/02/2022 04:27:28 pm', 'Truyện hành động', 0, 0, 144, 2, 11, 0, 0),
(256, 'Tay bắn thiện xạ', 'tay-sung-ma-thuat-ban-tia-thep_1661340417.jpg', 'Túm lại là một bộ truyện cực kì dễ thương, dành cho các bạn muốn relax sau một ngày dài mệt mỏi. Truyện cho mọi lứa tuổi! Lee Kun Woo người từng muốn trở thành anh hùng trong suốt 11 năm chợt nhận ra con đường đó không phù hợp với bản thân, anh quyết định trở thành một nông dân, sống cuộc đời bình dị, nhưng mọi việc liệu có đơn giản như vậy!', 'Habaxi', '12/02/2022 04:30:26 pm', 'Truyện hot', 235, 0, 143, 2, 11, 1, 15000),
(257, 'Cảm Xúc Ngọt Ngào', 'cuoc-phieu-luu-cua-be-sui_1660280592.jpg', 'Ten vừa trở thành học sinh trung học và chuyển vào sống tại kí túc xá theo lời rủ rê của người bạn thân. Tại đây, cô có dịp gặp gỡ và làm quen được với rất nhiều người tốt bụng và thú vị. Cuộc sống của Ten giờ bỗng tràn ngập những điều mới mẻ, và cả những cảm xúc mà cô chưa bao giờ biết đến.', 'Imasaku', '12/02/2022 04:31:11 pm', 'Truyện lãng mạn', 0, 0, 156, 2, 11, 0, 0),
(258, 'Ngạo Thị Thiên Địa', 'giai-dieu-cua-nhanh-cay-kho-heo_1639812895.jpg', 'Truyện tranh Ngạo Thị Thiên Địa được cập nhật nhanh và đầy đủ nhất. Bạn đọc đừng quên để lại bình luận và chia sẻ, ủng hộ ra các chương mới nhất của truyện Ngạo Thị Thiên Địa.\r\n', 'QuaNiMa', '12/02/2022 04:32:31 pm', 'Sách cực hot', 0, 0, 144, 2, 11, 0, 0),
(259, 'Xếp Hạng Bắt Nạt', 'the-novels-extra_1597483754.jpg', 'Neon mask, một streamer điên khùng không thể bắt giữ được cùng với kênh của mình lập một bảng xếp hạng các tên tội phạm chuyên bắt nạt học sinh khác và treo thưởng cho ai hạ được chúng.', 'Kamaniso', '12/02/2022 04:34:08 pm', 'Truyện kịch', 0, 0, 140, 2, 11, 0, 0),
(260, ' Nàng Kiếm Yandere', 'tu-gio-ta-chinh-la-bac-thay-cua-phap-su_1669091200.jpg', 'Câu chuyện về một anh hùng vô danh muốn có sức mạnh đánh bại quỷ vương nên đã lập giao kèo với một thanh kiếm quyền năng,nhưng cái giá anh ấy phải trả nó lạ lắm...', 'Umitaka', '12/02/2022 04:36:23 pm', 'Kiếm hiệp', 0, 0, 142, 2, 11, 1, 26000),
(261, 'Tu Tiên Phải Dựa Vào Sugar Mommy', 'estio_1667375485.jpg', 'Tu tiên phải dựa vào Sugar mommy, lâm huyền bái nhập làm đệ tử của trưởng lão yếu nhất tiên môn, lại phát hiện sư phụ tùy ý cho pháp bảo, lại là pháp bảo thiên giai. Dùng nước ao tưới cây, không ngờ lại là linh dịch trân quý! Lâm huyền dựa vào tài nguyên nhiều tới nghịch thiên của sugar mommy này, một đường mạnh mẽ thẳng tiến. Một đường mở hack... Đừng GATO với ca, có giỏi các ngươi cũng đi kiếm Sugar mommy đi', 'Omanaki', '12/02/2022 04:37:07 pm', 'Truyện bí ẩn', 0, 0, 142, 2, 11, 0, 0),
(262, 'Tinh Võ Thần Quyết', 'de-ba_1648198417.jpg', 'Quyền toái nhật nguyệt, chưởng thôn sơn hà\r\n\r\nĐạp nghịch thiên cường giả lộ, mỹ nhân làm bạn, tu luyện tinh võ truyền thừa, chấp chưởng quyền hành bát phương, thành tựu thần vương tối cao\r\n\r\nTừ thiếu nữ thiên tài ôn nhu, đáng yêu, quận chúa thân hình nóng bỏng tràn trề đến yêu tộc mỹ nữ thần bí, cao hơn nữa là nữ võ thần trong truyền thuyết tối cao', 'EnMaSu', '12/02/2022 04:38:48 pm', 'Truyện thịnh hành', 0, 0, 145, 2, 11, 0, 0),
(263, 'Hóa Ra Đó Chính Là Tình Yêu', 'ke-rac-ruoi-khong-dang-duoc-yeu_1657001514.jpg', 'Sau khi thống nhất Vương quốc Quỷ và rời khỏi Lâu đài Quỷ được một thời gian, Quỷ vương Eligor (600 tuổi), người đang sống một cuộc sống tẻ nhạt, đã giải cứu một chàng trai khỏi sự xuất hiện của mình khi đang đi dạo. Một khuôn mặt mềm mại và mềm mại, một cậu bé hay cười với một biểu cảm dịu dàng, Jeremy!! Anh ta là một hiệp sĩ, tôi là ác quỷ!', 'LaKaMi', '12/02/2022 04:40:18 pm', 'Truyện lãng mạn', 0, 0, 156, 2, 11, 0, 0),
(264, 'Itsudemo Jitaku Ni Kaerareru Ore Wa', 'toi-se-song-nhu-mot-hoang-tu_1636859317.jpg', 'bị bóc lột sức lao động ở công ty cũ, Amata Shirou quyết định thôi việc và chuyển đến nhà bà để sống. Không ngờ cậu tìm ra được một con đường bí mật đến thế giới khác đằng sau tủ đồ trong nhà bà. Từ đó Shirou quyết định làm giàu bằng cách bán đồ Nhật bản cho thế giới kia. Cùng xem câu chuyện làm giàu của một cậu chàng tay trắng bằng những kĩ năng độc lạ không ai có nhé!', 'MaTeMaSu', '12/02/2022 04:41:55 pm', 'Ẩm thực', 0, 0, 145, 2, 11, 0, 0),
(265, 'Đại Chu Tiên Lại', 'toan-tri-doc-gia_1590622278.jpg', 'Xuyên việt qua thế giới Tiên hiệp, nơi mà yêu mị khắp nơi, quần ma loạn vũ, Lý Mộ ban đầu thực sự chỉ an ổn sống qua ngày, nhưng tiểu hồ ly mà hắn vô tình cứu được lại đột nhiên mở miệng nói tiếng người, rằng nó muốn lấy thân báo đáp...Đây là câu chuyện về một thanh niên hiện đại xuyên việt tới thế giới Tiên hiệp, trảm yêu trừ ma, giúp đỡ chính nghĩa.', 'LiMaCha', '12/02/2022 04:43:37 pm', 'Truyện viễn tưởng hay', 0, 0, 144, 2, 11, 0, 0),
(266, ' Hệ Thống Gánh Con Mạnh Nhất', 'he-thong-ganh-con-manh-nhat_1667117666.jpg', 'Tần Xuyên phát hiện chỉ cần con của mình gây chuyện, hắn liền có thể mạnh lên\r\nThế là kiếp này, hắn bắt đầu troll con của mình đến cùng để tu tiên', 'Jakani', '12/02/2022 04:45:47 pm', 'Truyện hot', 0, 0, 141, 2, 11, 0, 0),
(267, 'Bậc Thầy Thuần Hóa', 'bac-thay-thuan-hoa_1604461416.jpg', 'Mặc dù là một nhân vật Cung thủ cấp 93 trong bảng xếp hạng hàng đầu của Kailan, Ian quyết định xóa nó bất chấp mọi người xung quanh bảo anh không nên làm vậy. Tất cả là để chuyển sang một chức nghiệp ẩn mà anh có được một cách tình cờ.', 'Ganika', '12/02/2022 04:48:39 pm', 'Truyện hay', 0, 0, 143, 2, 11, 1, 5000),
(268, 'Vạn Tướng Chi Vương', 'van-tuong-chi-vuong_1628657017.jpg', 'lại rơi vào nghịch cảnh 5 năm phong hầu , nếu không sẽ chết . \r\nTrong thiên địa , có vạn tướng. Mà lý lạc ta, cuối cùng sẽ trở thành Vạn tướng chi vương .', 'UchaMaNi', '12/02/2022 04:50:44 pm', 'Đánh nhau cực hay', 0, 0, 144, 2, 11, 0, 0),
(269, 'Neet Dakedo Hello Work Ni', 'neet-dakedo-hello-work-ni-ittara-isekai-ni-tsuretekareta_1531966254.jpg', 'Bởi vì bản hợp đồng mà cậu ta đã ký, để sống sót thì cậu ta đã nhận được cheat vì cậu ta đã nghe được một sự thật éo thể tin được: Thế giới này sẽ bị phá hủy sau 20 năm nữa. Liệu một tên NEET có ngăn chặn được việc thế giới bị phá hủy hay không ?!', 'Vachani', '12/02/2022 04:52:47 pm', 'Truyện thịnh hành', 0, 0, 139, 2, 11, 1, 14000);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comic_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `date`, `detail`, `comic_id`, `user_id`) VALUES
(32, '12/02/2022 02:30:42 pm', 'qưe', 217, 11),
(33, '12/02/2022 02:30:44 pm', 'eqwe', 217, 11),
(34, '12/02/2022 02:31:03 pm', 'qưeqwe', 217, 19),
(35, '12/02/2022 02:32:39 pm', 'qưe', 213, 11);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `comment`) VALUES
(4, 'abc', 'a@gmail.com', 'ac'),
(5, 'a', 'coca@gmail.com', 'ádasd');

-- --------------------------------------------------------

--
-- Table structure for table `history_comic_user`
--

CREATE TABLE `history_comic_user` (
  `id` int(11) NOT NULL,
  `id_comic` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `history_comic_user`
--

INSERT INTO `history_comic_user` (`id`, `id_comic`, `id_user`) VALUES
(5, 214, 11),
(6, 213, 11),
(7, 215, 11),
(9, 217, 11);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_chapter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `id_chapter`) VALUES
(266, '0.jpg', 1),
(267, '1.jpg', 1),
(268, '2.jpg', 1),
(269, '0.jpg', 2),
(270, '1.jpg', 2),
(271, '2.jpg', 2),
(272, '3.jpg', 2),
(273, '4.jpg', 3),
(274, '5.jpg', 3),
(275, '6.jpg', 3),
(276, '1.jpg', 4),
(277, '2.jpg', 4),
(278, '3.jpg', 4),
(279, '1.jpg', 5),
(280, '2.jpg', 5),
(281, '3.jpg', 5),
(282, '24.jpg', 6),
(283, '25.jpg', 6),
(284, '26.jpg', 6),
(285, '1.jpg', 7),
(286, '2.jpg', 7),
(287, '3.jpg', 7),
(288, '0.jpg', 8),
(289, '1.jpg', 8),
(290, '2.jpg', 8),
(291, '1.jpg', 9),
(292, '2.jpg', 9),
(293, '3.jpg', 9),
(294, '15.jpg', 10),
(295, '16.jpg', 10),
(296, '17.jpg', 10),
(297, '1.jpg', 11),
(298, '2.jpg', 11),
(299, '3.jpg', 11),
(300, '2.jpg', 12),
(301, '4.jpg', 12),
(302, '6.jpg', 12),
(303, '15.jpg', 13),
(304, '16.jpg', 13),
(305, '17.jpg', 13),
(306, '2.jpg', 14),
(307, '4.jpg', 14),
(308, '6.jpg', 14),
(309, '1_dtbcz.jpg', 15),
(310, '2_sz4fw.jpg', 15),
(311, '4_r5ce8.jpg', 15),
(378, '0.jpg', 36),
(379, '1.jpg', 36),
(380, '2.jpg', 36),
(381, 'than-gui-nang-bach-tuyet_1669254812.jpg', 36),
(382, '0.jpg', 37),
(383, '1.jpg', 37),
(384, '2.jpg', 37),
(385, 'than-gui-nang-bach-tuyet_1669254812.jpg', 37),
(386, '1.jpg', 38),
(387, '2.jpg', 38),
(388, '3.jpg', 38),
(389, '1.jpg', 39),
(390, '2.jpg', 39),
(391, '3.jpg', 39),
(392, '1.jpg', 40),
(393, '2.jpg', 40),
(394, '3.jpg', 40),
(395, '1.jpg', 41),
(396, '2.jpg', 41),
(397, '3.jpg', 41),
(398, '1.jpg', 42),
(399, '2.jpg', 42),
(400, '3.jpg', 42),
(401, '1_kctnu.jpg', 43),
(402, '2_q7nur.jpg', 43),
(403, '3.jpg', 43),
(404, '1.jpg', 44),
(405, '2.jpg', 44),
(406, '3.jpg', 44),
(407, '1_kctnu.jpg', 45),
(408, '2_q7nur.jpg', 45),
(409, '3.jpg', 45),
(410, '0.jpg', 46),
(411, '1.jpg', 46),
(412, '2.jpg', 46),
(413, '1_kctnu.jpg', 47),
(414, '2_q7nur.jpg', 47),
(415, '3.jpg', 47),
(416, '0.jpg', 48),
(417, '1.jpg', 48),
(418, '2.jpg', 48),
(419, '2.jpg', 49),
(420, '4.jpg', 49),
(421, '6.jpg', 49),
(422, '0.jpg', 50),
(423, '1.jpg', 50),
(424, '2.jpg', 50),
(425, '2.jpg', 51),
(426, '4.jpg', 51),
(427, '6.jpg', 51),
(428, '1.jpg', 52),
(429, '2.jpg', 52),
(430, '3.jpg', 52),
(431, '2.jpg', 53),
(432, '4.jpg', 53),
(433, '6.jpg', 53),
(434, '1.jpg', 54),
(435, '2.jpg', 54),
(436, '3.jpg', 54),
(437, '1.jpg', 55),
(438, '2.jpg', 55),
(439, '3.jpg', 55),
(440, '1.jpg', 56),
(441, '2.jpg', 56),
(442, '3.jpg', 56),
(443, '1.jpg', 57),
(444, '2.jpg', 57),
(445, '3.jpg', 57),
(446, '1.jpg', 58),
(447, '2.jpg', 58),
(448, '3.jpg', 58),
(449, '1.jpg', 59),
(450, '2.jpg', 59),
(451, '3.jpg', 59),
(452, '1.jpg', 60),
(453, '2.jpg', 60),
(454, '3.jpg', 60),
(455, '0.jpg', 61),
(456, '1.jpg', 61),
(457, '2.jpg', 61),
(458, '1.jpg', 62),
(459, '2.jpg', 62),
(460, '3.jpg', 62),
(461, '0.jpg', 63),
(462, '1.jpg', 63),
(463, '2.jpg', 63),
(464, '0.jpg', 64),
(465, '1.jpg', 64),
(466, '2.jpg', 64),
(467, '0.jpg', 65),
(468, '1.jpg', 65),
(469, '2.jpg', 65),
(470, '0.jpg', 66),
(471, '1.jpg', 66),
(472, '2.jpg', 66),
(473, '1.jpg', 67),
(474, '2.jpg', 67),
(475, '3.jpg', 67),
(476, '0.jpg', 68),
(477, '1.jpg', 68),
(478, '2.jpg', 68),
(479, '1.jpg', 69),
(480, '2.jpg', 69),
(481, '3.jpg', 69),
(482, '0.jpg', 70),
(483, '1.jpg', 70),
(484, '2.jpg', 70),
(485, '0.jpg', 71),
(486, '1.jpg', 71),
(487, '2.jpg', 71),
(488, '1.jpg', 72),
(489, '2.jpg', 72),
(490, '3.jpg', 72),
(491, '0.jpg', 73),
(492, '1.jpg', 73),
(493, '2.jpg', 73),
(494, '1.jpg', 74),
(495, '2.jpg', 74),
(496, '3.jpg', 74),
(497, '0.jpg', 75),
(498, '1.jpg', 75),
(499, '2.jpg', 75),
(500, '1.jpg', 76),
(501, '9.jpg', 76),
(502, 'capcom-vs-snk_1593772122.jpg', 76),
(503, '0.jpg', 77),
(504, '1.jpg', 77),
(505, '2.jpg', 77),
(506, '1.jpg', 78),
(507, '9.jpg', 78),
(508, 'capcom-vs-snk_1593772122.jpg', 78),
(509, '4.jpg', 79),
(510, '7.jpg', 79),
(511, '9.jpg', 79),
(512, '4.jpg', 80),
(513, '7.jpg', 80),
(514, '9.jpg', 80),
(515, '0.jpg', 81),
(516, '2.jpg', 81),
(517, '3.jpg', 81),
(518, '1.jpg', 82),
(519, '2.jpg', 82),
(520, '3.jpg', 82),
(521, '1.jpg', 83),
(522, '9.jpg', 83),
(523, '4.jpg', 84),
(524, '7.jpg', 84),
(525, '9.jpg', 84),
(526, '0.jpg', 85),
(527, '2.jpg', 85),
(528, '3.jpg', 85),
(529, '0.jpg', 86),
(530, '2.jpg', 86),
(531, '3.jpg', 86),
(532, '1.jpg', 87),
(533, '2.jpg', 87),
(534, '3.jpg', 87),
(535, '1_dtbcz.jpg', 88),
(536, '2_sz4fw.jpg', 88),
(537, '4_r5ce8.jpg', 88),
(538, '1.jpg', 89),
(539, '2.jpg', 89),
(540, '3.jpg', 89),
(541, '1_dtbcz.jpg', 90),
(542, '2_sz4fw.jpg', 90),
(543, '4_r5ce8.jpg', 90),
(544, '1.jpg', 91),
(545, '2.jpg', 91),
(546, '3.jpg', 91),
(547, '1_dtbcz.jpg', 92),
(548, '2_sz4fw.jpg', 92),
(549, '4_r5ce8.jpg', 92),
(550, '1.jpg', 93),
(551, '2.jpg', 93),
(552, '3.jpg', 93),
(553, '0.jpg', 94),
(554, '1.jpg', 94),
(555, '2.jpg', 94),
(556, '1.jpg', 95),
(557, '2.jpg', 95),
(558, '3.jpg', 95),
(559, '0.jpg', 96),
(560, '1.jpg', 96),
(561, '2.jpg', 96),
(562, '1.jpg', 97),
(563, '2.jpg', 97),
(564, '3.jpg', 97),
(565, '0.jpg', 98),
(566, '1.jpg', 98),
(567, '2.jpg', 98),
(568, '1.jpg', 99),
(569, '2.jpg', 99),
(570, '3.jpg', 99),
(571, '1.jpg', 100),
(572, '2.jpg', 100),
(573, '3.jpg', 100),
(574, '1.jpg', 101),
(575, '2.jpg', 101),
(576, '3.jpg', 101),
(577, '1.jpg', 102),
(578, '2.jpg', 102),
(579, '3.jpg', 102),
(580, '0.jpg', 103),
(581, '1.jpg', 103),
(582, '2.jpg', 103),
(583, '1.jpg', 104),
(584, '2.jpg', 104),
(585, '3.jpg', 104),
(586, '0.jpg', 105),
(587, '1.jpg', 105),
(588, '2.jpg', 105),
(589, '2.jpg', 106),
(590, '4.jpg', 106),
(591, '6.jpg', 106),
(592, '0.jpg', 107),
(593, '1.jpg', 107),
(594, '2.jpg', 107),
(595, '2.jpg', 108),
(596, '4.jpg', 108),
(597, '6.jpg', 108),
(598, '15.jpg', 109),
(599, '16.jpg', 109),
(600, '17.jpg', 109),
(601, '2.jpg', 110),
(602, '4.jpg', 110),
(603, '6.jpg', 110),
(604, '15.jpg', 111),
(605, '16.jpg', 111),
(606, '17.jpg', 111),
(607, '21.jpg', 112),
(608, '22.jpg', 112),
(609, '23.jpg', 112),
(610, '15.jpg', 113),
(611, '16.jpg', 113),
(612, '17.jpg', 113),
(613, '21.jpg', 114),
(614, '22.jpg', 114),
(615, '23.jpg', 114),
(616, '4.jpg', 115),
(617, '5.jpg', 115),
(618, '6.jpg', 115),
(619, '21.jpg', 116),
(620, '22.jpg', 116),
(621, '23.jpg', 116),
(622, '4.jpg', 117),
(623, '5.jpg', 117),
(624, '6.jpg', 117),
(625, '1.jpg', 118),
(626, '2.jpg', 118),
(627, '3.jpg', 118),
(628, '1.jpg', 119),
(629, '2.jpg', 119),
(630, '3.jpg', 119),
(631, '0.jpg', 120),
(632, '1.jpg', 120),
(633, '2.jpg', 120),
(634, '3.jpg', 120),
(635, '9.jpg', 121),
(636, '10.jpg', 121),
(637, '11.jpg', 121),
(638, '24.jpg', 122),
(639, '25.jpg', 122),
(640, '26.jpg', 122),
(641, '18.jpg', 123),
(642, '19.jpg', 123),
(643, '20.jpg', 123),
(644, '1.jpg', 124),
(645, '2.jpg', 124),
(646, '3.jpg', 124),
(647, '4.jpg', 125),
(648, '7.jpg', 125),
(649, '9.jpg', 125),
(650, '1.jpg', 126),
(651, '2.jpg', 126),
(652, '3.jpg', 126),
(653, 'im-a-shy.jpg', 126),
(654, '0.jpg', 127),
(655, '1.jpg', 127),
(656, '2.jpg', 127),
(657, '1.jpg', 128),
(658, '2.jpg', 128),
(659, '3.jpg', 128),
(660, '1.jpg', 129),
(661, '2.jpg', 129),
(662, '4.jpg', 129),
(663, '1_kctnu.jpg', 130),
(664, '2_q7nur.jpg', 130),
(665, '3.jpg', 130),
(666, '1_dtbcz.jpg', 131),
(667, '2_sz4fw.jpg', 131),
(668, '4_r5ce8.jpg', 131),
(669, '2.jpg', 132),
(670, '4.jpg', 132),
(671, '6.jpg', 132),
(672, '1_kctnu.jpg', 133),
(673, '2_q7nur.jpg', 133),
(674, '3.jpg', 133),
(675, '1.jpg', 134),
(676, '2.jpg', 134),
(677, '3.jpg', 134),
(678, '0.jpg', 135),
(679, '1.jpg', 135),
(680, '2.jpg', 135),
(681, '15.jpg', 136),
(682, '16.jpg', 136),
(683, '17.jpg', 136);

-- --------------------------------------------------------

--
-- Table structure for table `love`
--

CREATE TABLE `love` (
  `id_comic` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `love`
--

INSERT INTO `love` (`id_comic`, `id_user`) VALUES
(214, 11);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Client'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `coin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `phone`, `address`, `role`, `coin`) VALUES
(11, 'a@gmail.com', '$2y$10$c47ALXMznVabOANu8bNuJ.fsO2Q/z0iqgdLPBahCZ3UP7X8XTzWQ2', 'abc', '0868985927', 'Hà Nội', 1, '395478'),
(19, 'b@gmail.com', '$2y$10$GUnC49thAB8AilB224uqy..gQFqKwFm0kL6jg3lbyOJOWWh90Z1h.', 'ads', '0868985922', 'hà Nội', 3, NULL),
(20, 'c@gmail.com', '$2y$10$echwn6tk8QEq.q9K7Rw1SuyITQQLndy8yMo6IhxyeH3bC7fiTybli', 'gbh', '0868985922', 'Hà Nội', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comic` (`id_comic`);

--
-- Indexes for table `comic`
--
ALTER TABLE `comic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`),
  ADD KEY `fk_comic_poster` (`poster`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comic_comment` (`comic_id`),
  ADD KEY `fk_user_comment` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_comic_user`
--
ALTER TABLE `history_comic_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_user` (`id_user`),
  ADD KEY `fk_history_comic` (`id_comic`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chapter` (`id_chapter`);

--
-- Indexes for table `love`
--
ALTER TABLE `love`
  ADD KEY `fk_comic_love` (`id_comic`),
  ADD KEY `fk_user_love` (`id_user`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role` (`role`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `comic`
--
ALTER TABLE `comic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history_comic_user`
--
ALTER TABLE `history_comic_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=684;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `fk_comic` FOREIGN KEY (`id_comic`) REFERENCES `comic` (`id`);

--
-- Constraints for table `comic`
--
ALTER TABLE `comic`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_comic_poster` FOREIGN KEY (`poster`) REFERENCES `user` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comic_comment` FOREIGN KEY (`comic_id`) REFERENCES `comic` (`id`),
  ADD CONSTRAINT `fk_user_comment` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `history_comic_user`
--
ALTER TABLE `history_comic_user`
  ADD CONSTRAINT `fk_history_comic` FOREIGN KEY (`id_comic`) REFERENCES `comic` (`id`),
  ADD CONSTRAINT `fk_history_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_chapter` FOREIGN KEY (`id_chapter`) REFERENCES `chapter` (`id`);

--
-- Constraints for table `love`
--
ALTER TABLE `love`
  ADD CONSTRAINT `fk_comic_love` FOREIGN KEY (`id_comic`) REFERENCES `comic` (`id`),
  ADD CONSTRAINT `fk_user_love` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
