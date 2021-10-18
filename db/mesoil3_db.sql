-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2021 lúc 05:25 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mesoil3_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `name`, `description`, `image`) VALUES
(1, 'Tinh dầu - Essential oil', NULL, 'img/category/2.jpg'),
(2, 'Máy xông tinh dầu', NULL, 'img/category/Máy xông tinh dầu.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `message` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `phone`, `email`, `message`) VALUES
(3, 'Trang Trần', '0354600697', 'trang@gmail.com', 'Sản phẩm thơm, gói hàng cẩn thận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `password`, `name`, `email`, `phone`, `birthday`, `image`) VALUES
(1, 'ptha15', 'e10adc3949ba59abbe56e057f20f883e', 'Hà Phí', 'phithuha@gmail.com', '354600697', '2000-10-15', 'img/ava/nền.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `content` text COLLATE utf8_vietnamese_ci NOT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `name`, `image`, `content`, `date_added`, `date_modified`) VALUES
(1, 'Tinh dầu hữu cơ Mesoil 100% nguyên chất', 'img/news/1.jpg', '<p>- Thương hiệu Mesoil 3 năm tuổi với trên 10.000 khách hàng đã sử dụng và trải nghiệm.\r\n</p><p>- Mùi thơm tự nhiên dịu nhẹ, không chất bảo quản.\r\n</p><p>- SP chính hãng có tem chống hàng giả và mã số mã vạch.</p>', '2021-10-02 03:15:30', '2021-10-02 19:54:05'),
(2, 'Mesoil – Tinh dầu thiên nhiên', 'img/news/3.jpg', '<p>- Sản phẩm chính hãng có tem chống hàng giả và mã số mã vạch.\r\n</p><p>- Độc quyền là sản phẩm tinh dầu hữu cơ làm đẹp đầu tiên và duy nhất trên thị trường.\r\n</p><p>- Có giấy phép lưu hành và giấy chứng nhận chất lượng của bộ y tế, đủ điều kiện và chất lượng bày bán tại các cửa hàng</p>', '2021-10-02 03:16:29', '2021-10-02 19:54:21'),
(3, 'Mesoil cam kết', 'img/news/4.jpg', '<p></p><p>• Cam kết đổi trả, hoàn tiền nếu giao sai, nhầm, thiếu hàng\r\n</p><p>\r\n• Date mới nhất\r\n</p><p>\r\n• SP chính hãng độc quyền có tem chống hàng\r\n</p><p>\r\n• Hỗ trợ tư vấn giải đáp mọi thắc mắc của khách hàng\r\n</p><p>\r\n• Gửi hàng nhanh chóng</p><p></p>', '2021-10-02 03:17:14', '2021-10-02 19:54:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `payment_email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `payment_phone` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `total` float NOT NULL,
  `order_status` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `date_added` date NOT NULL,
  `comment` text COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `payment_name`, `payment_email`, `payment_phone`, `total`, `order_status`, `date_added`, `comment`) VALUES
(1, 1, 'Phí Hà', '12 Chùa Bộc', '0364968759', 125000, '1', '2021-10-02', ''),
(2, 1, 'Phí Hà', '12 Chùa Bộc', '0364968759', 125000, '1', '2021-10-02', ''),
(3, 1, 'Phí Hà', '12 Chùa Bộc', '0364968759', 125000, '0', '2021-10-02', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `order_id`, `product_id`, `quantity`, `price`, `total`) VALUES
(1, 1, 2, 1, 125000, 125000),
(2, 2, 3, 1, 125000, 125000),
(3, 3, 3, 1, 125000, 125000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `size` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `color` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `price` float NOT NULL,
  `status` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `description` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `name`, `size`, `category_id`, `supplier_id`, `color`, `price`, `status`, `quantity`, `image`, `description`, `date_added`, `date_modified`) VALUES
(1, 'Tinh dầu Bạc hà', '10ml', 1, 1, '', 125000, 'Còn hàng', 200, 'img/product/Bạc Hà/bhaa.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu Bạc hà\r\n- Thương hiệu: Mesoil\r\n- Dung tích: 10ml\r\n- HSD: 3 năm từ ngày sản xuất\r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng:\r\n- Giảm tình trạng bồn chồn, lo lắng, giữ tâm trạng thoải mái, thư giãn. \r\n- Hỗ trợ ngừa đầy bụng, khó tiêu, kích thích tiêu hóa, chống co thắt, cảm cúm, đau nhức cơ thể, … \r\n- Đuổi côn trùng, đuổi chuột\"', '2021-10-02 03:22:26', '2021-10-01 17:00:00'),
(2, 'Tinh dầu Bưởi hồng', '10 ml', 1, 1, '', 125000, 'Còn hàng', 299, 'img/product/Bưởi hồng/buoihong.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu bưởi\r\n- Thương hiệu: Mesoil\r\n- Dung tích: 10ml\r\n- HSD: 3 năm từ ngày sản xuất\r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng:\r\n- Kích thích mọc tóc, giảm rụng tóc.\r\n- Thư giãn, giảm căng thẳng, stress, trầm cảm.\r\n- Giảm ham muốn đối với đồ ngọt.\r\n- Kích thích hệ miễn dịch, lưu thông máu huyết.\r\n- Giảm đau đầu.', '2021-10-02 03:24:35', '2021-10-01 17:00:00'),
(3, 'Tinh dầu Cam hương', '10 ml', 1, 1, '', 125000, 'Còn hàng', 298, 'img/product/camhuong(2).png', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu cam hương\r\n- Thương hiệu: Mesoil\r\n- Dung tích: 10ml\r\n- HSD: 3 năm từ ngày sản xuất\r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng:\r\n- Thư giãn: Cho tinh dầu cam hương vào máy khuếch tán tinh dầu hoặc đèn xông tinh dầu giúp khuếch tán hương thơm, giảm mệt mỏi và thư giãn tinh thần.\r\n- Giảm đau khớp và cơ, chống trầm cảm, hỗ trợ hệ tiêu hóa, ngủ ngon, giảm căng thẳng, làm dịu làn da bị cháy nắng, ngừa sẹo, phục hồi da,...', '2021-10-02 03:26:21', '2021-10-01 17:00:00'),
(4, 'Tinh dầu Cam ngọt', '10 ml', 1, 1, '', 125000, 'Còn hàng', 255, 'img/product/Cam ngọt/camngot.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu cam ngọt\r\n- Thương hiệu: Mesoil\r\n- Dung tích: 10ml\r\n- HSD: 3 năm từ ngày sản xuất\r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng: Tinh dầu cam ngọt Orange hương thơm ngọt ngào, thơm mát rất dễ chịu với nhiều tác dụng tốt như thư giãn, giảm stress, chống trầm cảm, kích thích hệ miễn dịch khỏe mạnh', '2021-10-08 03:39:49', '2021-10-08 03:39:49'),
(5, 'Tinh dầu Chanh sần Lime', '10ml', 1, 1, '', 130000, 'Còn hàng', 200, 'img/product/Chanh sần Lime/chanh san.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu Chanh sần Lime \r\n- Thương hiệu: Mesoil \r\n- Dung tích: 10ml \r\n- HSD: 3 năm từ ngày sản xuất \r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng: \r\n- Giảm căng thẳng, stress, nâng cao sự tập trung: Nhỏ một vài giọt tinh dầu vào máy khuếch tán hoặc đèn xông tinh dầu để cảm nhận hương thơm.\r\n- Tăng cường hệ thống miễn dịch: Bạn có thể cho tinh dầu vào máy khuếch tán tinh dầu hoặc máy xông. Đặc biệt có thể pha với nước ngâm mình để tinh dầu thẩm thấu tốt hơn.\r\n- Giảm cảm lạnh, ho, viêm xoang, đau họng: Cho vài giọt vào một tô nước ấm và hít vào bằng mũi sau đó trộn một vài giọt tinh dầu với dầu nền (dầu oliu, dầu dừa..). Dùng hỗn hợp massage cổ họng bạn sẽ thấy đỡ hơn rất nhiều đấy.\r\n- Giảm đau, viêm khớp: Pha 2-3 giọt tinh dầu chanh sần Lime với 3 giọt dầu nền. Dùng hỗn hợp xoa bóp nhẹ nhàng lên vùng bị đau nhức bạn sẽ cảm nhận được hiệu quả sau 1 – 2 lần sử dụng đấy.\r\n- Ngừa mụn trứng cá và các vấn đề về da khác: Pha 2 giọt dầu chanh sần với 15 giọt dầu Jojoba và thoa lên da giúp làm sạch tạp chất, thúc đẩy sự phát triển của các tế bào da mới.\r\n- Ngừa gàu và làm mềm tóc: Pha một vài giọt dầu với dầu gội. Tinh chất trong chanh sần có thể giúp bạn loại bỏ gàu, dưỡng tóc từ bên trong.\r\n- Loại bỉ ván dầu, mỡ thừa: Thấm 1 – 2 giọt tinh dầu vào bông lau những vật dụng cần làm sạch bạn sẽ cảm nhận được hương thơm mát.\r\n- Đuổi côn trùng: Dùng máy xông hoặc đèn đốt nhỏ một vài giọt tinh dầu vào đèn xông vừa thơm mát vừa đuổi côn trùng đi xa.', '2021-10-01 17:00:00', '2021-10-01 17:00:00'),
(6, 'Tinh dầu Chanh vàng', '10 ml', 1, 1, '', 95000, 'Còn hàng', 200, 'img/product/chanh vang.PNG', '<p>M&ocirc; tả sản phẩm - Sản phẩm: Tinh dầu Chanh v&agrave;ng - Thương hiệu: Mesoil - Dung t&iacute;ch: 10ml - HSD: 3 năm từ ng&agrave;y sản xuất - Bảo quản nơi kh&ocirc; r&aacute;o tho&aacute;ng m&aacute;t C&ocirc;ng dụng: - S&aacute;t tr&ugrave;ng v&agrave; kiểm so&aacute;t tốt c&aacute;c bệnh về da. - Thấm s&acirc;u v&agrave;o da, đốt ch&aacute;y c&aacute;c tế b&agrave;o da chết, hỗ trợ tốt nhất sự trao đổi chất, đồng thời gi&uacute;p da tươi s&aacute;ng hơn. - Ngừa mụn trứng c&aacute;, chăm s&oacute;c da dầu cho bạn một l&agrave;n da sạch sẽ, mịn m&agrave;ng. - Điều h&ograve;a c&aacute;c tuyến nhờn tr&ecirc;n da, tạo sự th&ocirc;ng tho&aacute;ng tốt cho l&agrave;n da dầu. - Hương thơm của tinh dầu trong chanh gi&uacute;p k&iacute;ch th&iacute;ch c&aacute;c tế b&agrave;o thần kinh n&atilde;o hoạt động tốt hơn, tạo sự c&acirc;n bằng, gi&uacute;p giải tỏa sự căng thẳng, mệt mỏi.\"</p>', '2021-10-08 03:46:54', '2021-10-07 17:00:00'),
(7, 'Tinh dầu Đinh hương', '10 ml', 1, 1, '   ', 125000, 'Còn hàng', 267, 'img/product/Đinh hương/đinh hương.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu Đinh hương \r\n- Thương hiệu: Mesoil \r\n- Dung tích: 10ml \r\n- HSD: 3 năm từ ngày sản xuất \r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng: \r\n-Thư giãn: Cho tinh dầu đinh hương vào máy khuếch tán tinh dầu hoặc đèn xông tinh dầu. Giúp khuếch tán hương thơm, giảm mệt mỏi và thư giãn tinh thần.\r\n- Cải thiện tình trạng rụng tóc, kích thích mọc tóc: Cho khoảng 5 –7 giọt tinh dầu đinh hương với 2 giọt dầu dừa massage nhẹ nhàng chân tóc khoảng 5 phút cho tinh dầu thẩm thấu vào tóc.\r\n- Chăm sóc da, giảm mụn: Tinh dầu hương thảo còn được biết đến với là một nguyên liệu làm đẹp từ thiên nhiên. Nhỏ vài giọt tinh dầu vào tô nước nóng, dùng khăn trùm kín đầu sau đó xông mặt sẽ giúp se khít lỗ chân lông, loại bỏ bã nhờn và giảm mụn hiệu quả.', '2021-10-08 03:51:42', '2021-10-08 03:51:42'),
(8, 'Tinh dầu Gỗ hồng', '10 ml', 1, 1, '', 165000, 'Còn hàng', 200, 'img/product/Gỗ hồng/gohong.png', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu gỗ hồng\r\n- Thương hiệu: Mesoil\r\n- Dung tích: 10ml\r\n- HSD: 3 năm từ ngày sản xuất\r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng:\r\n- Ngừa mụn trứng cá: Pha 3 giọt tinh dầu Gỗ Hồng, 1 giọt tinh dầu Chanh, 2 giọt tinh dầu Oải Hương, 1 muỗng sữa chua không đường,1 giọt mật ong. \r\nTrộn đều, đắp lên mặt khoảng 20 phút, sau đó rửa mặt sạch bằng nước ấm\r\n- Trẻ hóa làn da: Pha dầu gỗ hồng với dầu cây rum hoặc dầu nền (dấu Oli, dầu dừa…) massage vòng tròn từ lòng bàn chân đến các cơ quan khác\r\n- Giảm đau đầu, buồn nôn, đau nhức cơ thể: nhỏ vài giọt tinh dầu ở mỗi góc của một cái gối, và tận hưởng những hương thơm khi bạn đang nằm.\r\n- Kem dưỡng da: Cho 50 giọt tinh dầu vào 500ml kem dưỡng không mùi trộn đều nên sử dụng mỗi ngày, tinh dầu Gỗ Hồng hiệu quả nhất để kích thích \r\ncác tế bào và tái tạo mô, giúp trẻ hóa làn da và đặc biệt hấp dẫn cho những người có làn nhăn nheo lão hóa', '2021-10-08 03:57:30', '2021-10-08 03:57:30'),
(9, 'Tinh dầu Hoắc hương', '10 ml', 1, 1, '', 165000, 'Còn hàng', 100, 'img/product/Hoắc hương/hoachuong.png', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu hoắc hương\r\n- Thương hiệu: Mesoil\r\n- Dung tích: 10ml\r\n- HSD: 3 năm từ ngày sản xuất\r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng:\r\n- Tăng cường hệ miễn dịch\r\n- Khử mùi hiệu quả, ngưng sự phát triển nấm mốc\r\n- Giảm viêm\r\n- Giảm stress, giúp tâm trạng thư giãn, nâng cao tinh thần tập trung làm việc.\r\n- Giảm rụng, kích thích mọc tóc, giảm gàu\r\n- Giảm mụn trứng cá, dưỡng  da\r\n- Hỗ trợ hạ sốt\r\n- Hỗ trợ hệ tiêu hóa hiệu quả.\r\n- Tốt cho túi mật, gan.', '2021-10-08 03:59:18', '2021-10-08 03:59:18'),
(10, 'Tinh dầu Hương nhu trắng', '10 ml', 1, 1, '', 105000, 'Còn hàng', 255, 'img/product/Hương nhu trắng/hn trắng.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu Hương nhu trắng \r\n- Thương hiệu: Mesoil \r\n- Dung tích: 10ml \r\n- HSD: 3 năm từ ngày sản xuất \r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng: \r\n- Thư giãn: Cho tinh dầu đinh hương vào máy khuếch tán tinh dầu hoặc đèn xông tinh dầu. Giúp khuếch tán hương thơm, giảm mệt mỏi và thư giãn tinh thần.\r\n- Cải thiện tình trạng rụng tóc, kích thích mọc tóc: Cho khoảng 5 –7 giọt tinh dầu đinh hương với 2 giọt dầu dừa massage nhẹ nhàng chân tóc khoảng 5 phút cho tinh dầu thẩm thấu vào tóc.\r\n- Chăm sóc da, giảm mụn: Tinh dầu hương thảo còn được biết đến với là một nguyên liệu làm đẹp từ thiên nhiên. Nhỏ vài giọt tinh dầu vào tô nước nóng, dùng khăn trùm kín đầu sau đó xông mặt sẽ giúp se khít lỗ chân lông, loại bỏ bã nhờn và giảm mụn hiệu quả.\r\n', '2021-10-08 04:04:43', '2021-10-08 04:04:43'),
(11, 'Tinh dầu Hương thảo', '10 ml', 1, 2, 'Màu trắng', 115000, 'Còn hàng', 200, 'img/product/Hương Thảo/hương thảo.PNG', '<p>M&ocirc; tả sản phẩm - Sản phẩm: Tinh dầu Hương thảo - Thương hiệu: Mesoil - Dung t&iacute;ch: 10ml - HSD: 3 năm từ ng&agrave;y sản xuất - Bảo quản nơi kh&ocirc; r&aacute;o tho&aacute;ng m&aacute;t C&ocirc;ng dụng: - Gi&uacute;p bạn thư gi&atilde;n, giảm Stress, mệt mỏi. - Cải thiện t&igrave;nh trạng rụng t&oacute;c, k&iacute;ch th&iacute;ch mọc t&oacute;c. - K&iacute;ch th&iacute;ch chức năng của t&uacute;i mật, giải độc gan. - Giảm đau bắp cơ, xương khớp. - K&iacute;ch th&iacute;ch thần kinh ph&aacute;t triển</p>', '2021-10-02 03:55:02', '2021-10-07 17:00:00'),
(12, 'Tinh dầu Khuynh diệp', '10 ml', 1, 1, '', 95000, 'Còn hàng', 230, 'img/product/Khuynh Diệp/khuynh.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu Khuynh Diệp \r\n- Thương hiệu: Mesoil \r\n- Dung tích: 10ml \r\n- HSD: 3 năm từ ngày sản xuất \r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng: \r\n- Giúp tinh thần thư thái, thoải mái và dễ chịu.\r\n- Nhanh lành vết trầy xước da.\r\n- Hỗ trợ ngừa bệnh hệ hô hấp như cảm cúm, cảm lạnh, ho, chảy nước mũi,..\r\n- Kháng khuẩn, phòng chống mầm bệnh, nhiễm trùng.\r\n- Giảm đau bụng, cảm gió, đầy hơi hoặc ăn quá no.\r\n- Dùng ngừa vết côn trùng có nọc độc cắn như: ong, kiến ba khoang, kiến,..', '2021-10-02 07:02:30', '2021-10-01 17:00:00'),
(13, 'Tinh dầu Ngọc Lan Tây', '10 ml', 1, 1, '', 165000, 'Còn hàng', 200, 'img/product/Ngọc Lan Tây/ngoclantay.png', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu ngọc lan tây\r\n- Thương hiệu: Mesoil\r\n- Dung tích: 10ml\r\n- HSD: 3 năm từ ngày sản xuất\r\n- Bảo quản nơi khô dáo thoáng mát\r\nCông dụng:\r\n- Làm đẹp: dưỡng da mềm mại, kiểm soát nhờn.\r\n- Thư giãn: giảm căng thẳng, tâm trạng thư thái, thoải mái và tạo cảm giác yên bình, trấn tĩnh.\r\n- Kích thích cảm giác hứng khởi, tăng cảm giác yêu.\r\n- Dùng cho đèn xông tinh dầu tạo không khí thơm phòng', '2021-10-08 04:12:06', '2021-10-08 04:12:06'),
(14, 'Tinh dầu Oải hương', '10 ml', 1, 1, '', 125000, 'Còn hàng', 255, 'img/product/Oải hương/oai.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu Oải hương \r\n- Thương hiệu: Mesoil \r\n-Dung tích: 10ml \r\n- HSD: 3 năm từ ngày sản xuất \r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng: - Thư giãn: Cho tinh dầu oải hương vào máy khuếch tán tinh dầu hoặc đèn xông tinh dầu. Chúng giúp khuếch tán hương thơm, giảm mệt mỏi và thư giãn tinh thần.\r\n- Giảm đau khớp và cơ, Hỗ trợ hệ tiêu hóa, Giảm căng thẳng, Làm dịu làn da bị cháy nắng, lành sẹo, phục hồi da,...\r\n', '2021-10-08 04:15:00', '2021-10-08 04:15:00'),
(15, 'Tinh dầu Quế', '10 ml', 1, 1, '', 105000, 'Còn hàng', 200, 'img/product/Quế/quế.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu Quế \r\n- Thương hiệu: Mesoil \r\n- Dung tích: 10ml \r\n- HSD: 3 năm từ ngày sản xuất \r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng:Tinh dầu quế thơm ngọt, ấm áp có nhiều tác dụng tốt cho sức khỏe như thư giãn,  kích thích tiêu hóa, kích thích hệ tuần hoàn,… xoa bóp giảm đau nhức cơ, xương khớp.', '2021-10-08 04:20:46', '2021-10-08 04:20:46'),
(16, 'Tinh dầu Quýt', '10 ml', 1, 1, '', 125000, 'Còn hàng', 255, 'img/product/Quýt/quýtt.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu Quýt\r\n- Thương hiệu: Mesoil\r\n- Dung tích: 10ml\r\n- HSD: 3 năm từ ngày sản xuất\r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng: \r\n- Tinh dầu Quýt giúp tinh thần thư giãn, làm dịu đi các căng thẳng thần kinh. \r\n- Giúp diệt khuẩn, làm sạch, khử mùi hôi, thanh lọc không khí.  \r\n-Ngăn ngừa các vết thương và xua đuổi côn trùng hiệu quả. \r\n- Thư giãn tinh thần giúp ngủ ngon, ngủ sâu. \r\n- Tác dụng ngừa gàu, giúp tóc bóng mượt và mềm mại. \r\n- Chống béo phì\r\n - Ngăn ngừa bệnh tiểu đường \r\n-Chống co thắt cơn ho hay bệnh ruột rút\r\n - Giúp dễ tiêu, chống đầy hơi', '2021-10-08 04:24:54', '2021-10-08 04:24:54'),
(17, 'Tinh dầu Sả chanh', '10 ml', 1, 1, '', 125000, 'Còn hàng', 150, 'img/product/Sả chanh/sachanh.png', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu sả chanh\r\n- Thương hiệu: Mesoil\r\n- Dung tích: 10ml\r\n- HSD: 3 năm từ ngày sản xuất\r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng:\r\n- Tinh dầu sả chanh tự nhiên giúp thanh lọc không khí, làm dịu thần kinh, thư giãn tinh thần, đuổi muỗi và côn trùng,… \r\n- Tinh dầu sả chanh nổi trội với đặc tính giảm đau, ngừa viêm, ngừa nấm giúp phòng và hỗ trợ, đau nhức xương khớp\r\n- Dùng trong sản phẩm chăm sóc da và tóc,….\r\n\"', '2021-10-08 04:24:54', '2021-10-08 04:24:54'),
(18, 'Tinh dầu Tràm gió', '10 ml', 1, 1, '', 95000, 'Còn hàng', 100, 'img/product/Tràm gió/tràm gió.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu Tràm gió \r\n- Thương hiệu: Mesoil \r\n- Dung tích: 10ml \r\n- HSD: 3 năm từ ngày sản xuất \r\n- Bảo quản nơi khô ráo thoáng mát \r\nCông dụng:\r\n- Làm đẹp: nhờ tính sát khuẩn, tinh dầu tràm giúp ngừa mụn trứng cá, mụn mủ,… \r\n- Phòng bệnh: với đặc tính kháng khuẩn, sát trùng, tinh dầu tràm có tác dụng tuyệt vời trong việc chống nhiễm trùng do virus, vi khuẩn và nấm. Một số bệnh như: cảm cúm, viêm họng, bệnh uốn ván,… \r\n- Giảm triệu chứng, hỗ trợ ngừa bệnh đường hô hấp: tinh dầu tràm có tính long đàm, sát khuẩn làm giảm triệu trứng nghẹt mũi, viêm họng, ho có đờm, viêm phế quản, viêm thanh quản. \r\n- Tăng tiết mồ hôi: Với đặc tính nóng, ấm giúp kích thích hệ tuần hoàn, tăng tiết mồ hôi giúp thải độc, giải cảm. \r\n- Xông hương xua đuổi côn trùng\"', '2021-10-08 04:28:36', '2021-10-08 04:28:36'),
(19, 'Tinh dầu Tràm trà', '10 ml', 1, 1, '', 165000, 'Còn hàng', 180, 'img/product/Tràm trà/tramtra.png', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu tràm trà \r\n- Thương hiệu: Mesoil\r\n- Dung tích: 10ml\r\n- HSD: 3 năm từ ngày sản xuất\r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng:\r\n- Làm đẹp: ngừa mụn trứng cá, làm mềm da, cho tóc bóng khỏe, sạch gàu,…\r\n- Chống nhiễm trùng, giảm viêm, ngứa vết côn trùng cắn, vết loét.\r\n- Bảo vệ răng miệng.\r\n- Diệt khuẩn, khử mùi.\r\n\"', '2021-10-08 04:28:36', '2021-10-08 04:28:36'),
(20, 'Tinh dầu Vỏ bưởi', '10 ml', 1, 1, '', 115000, 'Còn hàng', 200, 'img/product/Vỏ bưởi/bưởi.PNG', 'Mô tả sản phẩm\r\n- Sản phẩm: Tinh dầu Vỏ bưởi \r\n- Thương hiệu: Mesoil \r\n- Dung tích: 10ml \r\n- HSD: 3 năm từ ngày sản xuất \r\n- Bảo quản nơi khô ráo thoáng mát\r\nCông dụng:\r\n- Chăm sóc da, chăm sóc tóc.\r\n -Ngoài ra, tinh dầu vỏ bưởi còn được sử dụng làm hương liệu xông phòng giúp khử mùi hôi và mang lại hương thơm dịu mát, xả stress và thư giãn hiệu quả.', '2021-10-08 04:32:41', '2021-10-08 04:32:41'),
(21, 'Máy xông tinh dầu', NULL, 2, 2, 'Trắng', 450000, 'Còn hàng', 50, 'img/product/máy xông tinh dầu.jpg', 'Chiếc máy xông tinh dầu phun sương Flower này nổi bật nhất với thiết kế đẹp, hoàn thiện tốt, hoạt động ổn định, có sẵn bộ đổi nguồn, đèn LED nhiều màu, làm đèn ngủ được, chức năng đáp ứng đủ nhu cầu cơ bản. Nếu bạn cần một chiếc máy khuếch tán tinh dầu có những đặc điểm trên thì máy xông tinh dầu phun sương là một lựa chọn tốt. Có nhiều màu đèn cho bạn thoải mái lựa chọn, thậm chí nếu thích bạn có thể cài đặt nó tự thay đổi màu sắc. Có khả năng hẹn giờ, tuy chỉ có một mức 60 phút nhưng như vậy cũng đủ dùng.\r\n\r\n1. Hướng dẫn sử dụng:\r\n\r\n– Cắm giắc nguồn vào lỗ cắm dưới đế của máy.\r\n\r\n– Mở phần nắp chụp bên trên ra, cho nước sạch (tốt nhất là nước lọc bạn uống hàng ngày) vào khay chứa. Chú ý không cho quá vạch Max và dưới vạch Min. Không cho nước nóng vào máy vì sẽ làm các bộ phận nhựa bị biến dạng.\r\n\r\n– Cho vào khay chứa khoảng 5\r\n\r\n– 10 giọt tinh dầu, tùy lượng nước trong khay.\r\n\r\n– Vặn kín nắp đậy, phải vặn kín nha! Nếu không kín sương phun sẽ không mạnh và đều.\r\n\r\n– Cắm bộ đổi nguồn vào điện 220V. Lúc này bạn sẽ thấy máy kêu một tiếng “tít” và đèn xanh chỗ 2 công tắc bật sáng.\r\n\r\n– Bạn có thể lựa chọn các chế độ hoạt động bằng cách sau:\r\n\r\n+ Nhấn nút MIST lần đầu: Máy hoạt động ở chế độ phun sương nhẹ\r\n\r\n+ Nhấn nút MIST lần hai: Máy hoạt động ở chế độ phun sương mạnh\r\n\r\n+ Nhấn nút MIST lần ba: Tắt chế độ phun sương\r\n\r\n+ Nhấn và giữ nút MIST trong 2 giây: Đèn màu xanh lá sáng, lúc này máy đang trong chế độ hẹn giờ tự tắt sau 60 phút\r\n\r\n– Chọn chế độ đèn bằng cách nhấn nút LIGHT. Nếu đèn đang tắt, nhấn lần đầu nó sẽ chuyển qua chế độ tự động thay đổi màu sắc. Nhấn tiếp đèn sẽ sáng chỉ 1 màu mà bạn chọn.\r\n\r\n2. Một số lưu ý khi sử dụng:\r\n\r\n– Để máy trên mặt phẳng, tránh xa ánh nắng và nguồn nhiệt.\r\n\r\n– Nếu thay đổi loại tinh dầu bạn cần vệ sinh trước khi cho loại tinh dầu mới vào.\r\n\r\n– Mỗi tuần hãy tổng vệ sinh cho máy, chú ý dùng tăm bông lau nhẹ phần lõm bên trong khay chứa (nơi dễ bị đóng cặn).\r\n\r\n– Không đưa mũi vào luồng sương của máy để ngửi.\r\n\r\n– Không để nước tràn vào các bộ phận điện tử dưới đế.\r\n\r\n– Không che kín lỗ thông gió của quạt.\r\n\r\n– Để máy tránh xa tầm tay trẻ em.\r\n\r\n– Nếu trong quá trình sử dụng bạn thấy cơ thể có bất kỳ triệu chứng khó chịu nào, hãy ngừng sử dụng ngay!\r\n\r\n– Chỉ bật máy xông tinh dầu trong 30 – 60 phút và phòng phải đảm bảo thông thoáng.', '2021-10-08 08:16:52', '2021-10-08 08:16:52'),
(22, 'Máy xông tinh dầu mini', '', 2, 2, 'Hồng', 300000, 'Còn hàng', 60, 'img/product/máy xông mini.jpg', '<p>Thời tiết chuyển từ Thu sang Đ&ocirc;ng độ ẩm kh&ocirc;ng kh&iacute; xuống thấp l&agrave;m cho mũi họng của con người bị kh&ocirc; nứt nẻ. Dễ bị vi&ecirc;m mũi dị ứng, vi&ecirc;m tai, vi&ecirc;m họng. Để khắc phục t&igrave;nh trạng n&agrave;y mỗi gia đ&igrave;nh n&ecirc;n c&oacute; &iacute;t nhất 01 m&aacute;y tạo ẩm kh&ocirc;ng kh&iacute; dạng phun sương để cung cấp th&ecirc;m độ ẩm tự nhi&ecirc;n v&agrave;o kh&ocirc;ng kh&iacute;, đảm bảo sức khỏe cả gia đ&igrave;nh 1. C&ocirc;ng dụng: + Taọ ẩm cho ph&ograve;ng dưới dạng phun sương + gi&uacute;p thư gi&atilde;n tinh thần, hỗ trợ lọc kh&ocirc;ng kh&iacute; + Sử dụng k&egrave;m tinh dầu ấn độ gi&uacute;p giảm muỗi, giảm stress, l&agrave;m đẹp da v&agrave; tinh thần thư th&aacute;i + Loại bỏ m&ugrave;i v&agrave; giữ ẩm cho l&agrave;n da của bạn. + cho &iacute;t tinh dầu lo&atilde;n v&agrave;o để tạo hương thơm nhẹ 2. Th&ocirc;ng tin sản phẩm &ndash; Chất liệu: Nhựa &ndash; Nguồn cấp điện:1V &ndash; 5A &ndash; Cổng Sạc: USB c&oacute; thể sạc chung với sạc điện thoại 1v-5a, hoặc sạc qua cổng USB m&aacute;y t&iacute;nh &ndash; C&ocirc;ng suất nước: khoảng 200 ml &ndash; Xuất xứ: trung Quốc &ndash; 1 bộ sản phẩm bao gồm: 01 m&aacute;y x&ocirc;ng tinh dầu + 01 d&acirc;y c&aacute;p sạc 3. Hướng dẫn sử dụng: &ndash; Bước 1: C&aacute;c mẹ h&atilde;y đổ nước sạch k&egrave;m v&agrave;i giọt tinh dầu ấn độ v&agrave;o phần chứa nước của m&aacute;y &ndash; Bước 2: Cắm điện v&agrave; bật c&ocirc;ng tắc &ndash; Bước 3: tận hưởng hương thơm dịu nhẹ từ tinh dầu v&agrave; kh&ocirc;ng kh&iacute; m&aacute;t l&agrave;nh 4. QU&Yacute; KH&Aacute;CH LƯU &Yacute;: &ndash; M&aacute;y c&oacute; thể sử dụng kh&ocirc;ng cần tinh dầu trong trường hợp chỉ muốn tạo ẩm. &ndash; Khi sử dụng k&egrave;m tinh dầu ch&uacute;ng t&ocirc;i khuyến c&aacute;o qu&yacute; kh&aacute;ch n&ecirc;n chọn tinh dầu ấn độ để n&acirc;ng cao sức khỏe.</p>', '2021-10-08 08:18:00', '2021-10-07 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'Phí Hà', 'phiha@gmail.com', '0968789658', '12 Chùa Bộc, Quang Trung, Hà Nội'),
(2, 'Ha', 'thuha@gmail.com', '0968789957', '12 Chùa Bộc, Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `email`, `phone`, `admin`, `birthday`, `date_added`) VALUES
(1, 'ha', '123456', 'Phí Hà', 'phiha@gmail.com', '0968789658', 1, '2000-11-15', '2021-10-02 03:11:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
