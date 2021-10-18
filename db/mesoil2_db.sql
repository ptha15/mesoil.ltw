-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2021 lúc 12:54 PM
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
-- Cơ sở dữ liệu: `mesoil2_db`
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
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_vietnamese_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

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
(1, 'Tinh dầu Bạc hà', '10ml', 1, 1, '', 125000, 'Còn hàng', 200, 'img/product/Bạc Hà/bhaa.png', '<p><strong>1. M&ocirc; tả sản phẩm </strong></p>\r\n<p>&ndash; Sản phẩm: Tinh dầu Bạc h&agrave;</p>\r\n<p>&ndash; Thương hiệu: Mesoil</p>\r\n<p>&ndash; Dung t&iacute;ch: 10ml</p>\r\n<p>&ndash; HSD: 3 năm từ ng&agrave;y sản xuất</p>\r\n<p>&ndash; Bảo quản nơi kh&ocirc; r&aacute;o tho&aacute;ng m&aacute;t</p>\r\n<p><strong>2. C&ocirc;ng dụng: </strong></p>\r\n<p>&ndash; Giảm t&igrave;nh trạng bồn chồn, lo lắng, giữ t&acirc;m trạng thoải m&aacute;i, thư gi&atilde;n.</p>\r\n<p>&ndash; Hỗ trợ ngừa đầy bụng, kh&oacute; ti&ecirc;u, k&iacute;ch th&iacute;ch ti&ecirc;u h&oacute;a, chống co thắt, cảm c&uacute;m, đau nhức cơ thể, &hellip;</p>\r\n<p>&ndash; Đuổi c&ocirc;n tr&ugrave;ng, đuổi chuột</p>', '2021-10-02 03:22:26', '2021-10-01 17:00:00'),
(2, 'Tinh dầu Bưởi hồng', '10 ml', 1, 1, '', 125000, 'Còn hàng', 299, 'img/product/Bưởi hồng/buoihong.png', '<p><strong>1. M&ocirc; tả sản phẩm </strong></p>\r\n<p>&ndash; Sản phẩm: Tinh dầu bưởi</p>\r\n<p>&ndash; Thương hiệu: Mesoil</p>\r\n<p>&ndash; Dung t&iacute;ch: 10ml</p>\r\n<p>&ndash; HSD: 3 năm từ ng&agrave;y sản xuất</p>\r\n<p>&ndash; Bảo quản nơi kh&ocirc; r&aacute;o tho&aacute;ng m&aacute;t</p>\r\n<p><strong>2. C&ocirc;ng dụng</strong></p>\r\n<p>&ndash; K&iacute;ch th&iacute;ch mọc t&oacute;c, giảm rụng t&oacute;c.</p>\r\n<p>&ndash; Thư gi&atilde;n, giảm căng thẳng, stress, trầm cảm.</p>\r\n<p>&ndash; Giảm ham muốn đối với đồ ngọt.</p>\r\n<p>&ndash; K&iacute;ch th&iacute;ch hệ miễn dịch, lưu th&ocirc;ng m&aacute;u huyết.</p>\r\n<p>&ndash; Giảm đau đầu.</p>', '2021-10-02 03:24:35', '2021-10-01 17:00:00'),
(3, 'Tinh dầu Cam hương', '10 ml', 1, 1, '', 125000, 'Còn hàng', 298, 'img/product/camhuong(2).png', '<p><strong>1. M&ocirc; tả sản phẩm </strong></p>\r\n<p>&ndash; Sản phẩm: Tinh dầu cam hương</p>\r\n<p>&ndash; Thương hiệu: Mesoil</p>\r\n<p>&ndash; Dung t&iacute;ch: 10ml</p>\r\n<p>&ndash; HSD: 3 năm từ ng&agrave;y sản xuất</p>\r\n<p>&ndash; Bảo quản nơi kh&ocirc; r&aacute;o tho&aacute;ng m&aacute;t</p>\r\n<p><strong>2. C&ocirc;ng dụng: </strong></p>\r\n<p>&ndash; Thư gi&atilde;n: Cho tinh dầu cam hương v&agrave;o m&aacute;y khuếch t&aacute;n tinh dầu hoặc đ&egrave;n x&ocirc;ng tinh dầu gi&uacute;p khuếch t&aacute;n hương thơm, giảm mệt mỏi v&agrave; thư gi&atilde;n tinh thần.</p>\r\n<p>&ndash; Giảm đau khớp v&agrave; cơ, chống trầm cảm, hỗ trợ hệ ti&ecirc;u h&oacute;a, ngủ ngon, giảm căng thẳng, l&agrave;m dịu l&agrave;n da bị ch&aacute;y nắng, ngừa sẹo, phục hồi da,&hellip;</p>', '2021-10-02 03:26:21', '2021-10-01 17:00:00'),
(5, 'Tinh dầu Chanh sần Lime', '10ml', 1, 1, '', 130000, 'Còn hàng', 200, 'img/product/Chanh sần Lime/chanh san.PNG', '<h5><strong>M&ocirc; tả sản phẩm</strong></h5>\r\n<p>&ndash; Sản phẩm: Tinh dầu Chanh sần Lime</p>\r\n<p>&ndash; Thương hiệu: Mesoil</p>\r\n<p>&ndash; Dung t&iacute;ch: 10ml</p>\r\n<p>&ndash; HSD: 3 năm từ ng&agrave;y sản xuất</p>\r\n<p>&ndash; Bảo quản nơi kh&ocirc; r&aacute;o tho&aacute;ng m&aacute;t</p>\r\n<p>&nbsp;</p>\r\n<h5><strong>C&ocirc;ng dụng</strong></h5>\r\n<p>&ndash; Giảm căng thẳng, stress, n&acirc;ng cao sự tập trung: Nhỏ một v&agrave;i giọt tinh dầu v&agrave;o m&aacute;y khuếch t&aacute;n hoặc đ&egrave;n x&ocirc;ng tinh dầu để cảm nhận hương thơm.</p>\r\n<p>&ndash; Tăng cường hệ thống miễn dịch: Bạn c&oacute; thể cho tinh dầu v&agrave;o m&aacute;y khuếch t&aacute;n tinh dầu hoặc m&aacute;y x&ocirc;ng. Đặc biệt c&oacute; thể pha với nước ng&acirc;m m&igrave;nh để tinh dầu thẩm thấu tốt hơn.</p>\r\n<p>&ndash; Giảm cảm lạnh, ho, vi&ecirc;m xoang, đau họng: Cho v&agrave;i giọt v&agrave;o một t&ocirc; nước ấm v&agrave; h&iacute;t v&agrave;o bằng mũi sau đ&oacute; trộn một v&agrave;i giọt tinh dầu với dầu nền (dầu oliu, dầu dừa..). D&ugrave;ng hỗn hợp massage cổ họng bạn sẽ thấy đỡ hơn rất nhiều đấy.</p>\r\n<p>&ndash; Giảm đau, vi&ecirc;m khớp: Pha 2-3 giọt tinh dầu chanh sần Lime với 3 giọt dầu nền. D&ugrave;ng hỗn hợp xoa b&oacute;p nhẹ nh&agrave;ng l&ecirc;n v&ugrave;ng bị đau nhức bạn sẽ cảm nhận được hiệu quả sau 1 &ndash; 2 lần sử dụng đấy.</p>\r\n<p>&ndash; Ngừa mụn trứng c&aacute; v&agrave; c&aacute;c vấn đề về da kh&aacute;c: Pha 2 giọt dầu chanh sần với 15 giọt dầu Jojoba v&agrave; thoa l&ecirc;n da gi&uacute;p l&agrave;m sạch tạp chất, th&uacute;c đẩy sự ph&aacute;t triển của c&aacute;c tế b&agrave;o da mới.</p>\r\n<p>&ndash; Ngừa g&agrave;u v&agrave; l&agrave;m mềm t&oacute;c: Pha một v&agrave;i giọt dầu với dầu gội. Tinh chất trong chanh sần c&oacute; thể gi&uacute;p bạn loại bỏ g&agrave;u, dưỡng t&oacute;c từ b&ecirc;n trong.</p>\r\n<p>&ndash; Loại bỏ v&aacute;ng dầu, mỡ thừa: Thấm 1 &ndash; 2 giọt tinh dầu v&agrave;o b&ocirc;ng lau những vật dụng cần l&agrave;m sạch bạn sẽ cảm nhận được hương thơm m&aacute;t.</p>\r\n<p>&ndash; Đuổi c&ocirc;n tr&ugrave;ng: D&ugrave;ng m&aacute;y x&ocirc;ng hoặc đ&egrave;n đốt nhỏ một v&agrave;i giọt tinh dầu v&agrave;o đ&egrave;n x&ocirc;ng vừa thơm m&aacute;t vừa đuổi c&ocirc;n tr&ugrave;ng đi xa.</p>\r\n<p>&nbsp;</p>', '2021-10-01 17:00:00', '2021-10-01 17:00:00'),
(11, 'Máy xông tinh dầu', '', 2, 2, 'Màu trắng', 450000, 'Còn hàng', 20, 'img/product/Máy xông tinh dầu.jpg', '<p>Chiếc m&aacute;y x&ocirc;ng tinh dầu phun sương Flower n&agrave;y nổi bật nhất với thiết kế đẹp, ho&agrave;n thiện tốt, hoạt động ổn định, c&oacute; sẵn bộ đổi nguồn, đ&egrave;n LED nhiều m&agrave;u, l&agrave;m đ&egrave;n ngủ được, chức năng đ&aacute;p ứng đủ nhu cầu cơ bản. Nếu bạn cần một chiếc m&aacute;y khuếch t&aacute;n tinh dầu c&oacute; những đặc điểm tr&ecirc;n th&igrave; m&aacute;y x&ocirc;ng tinh dầu phun sương l&agrave; một lựa chọn tốt. C&oacute; nhiều m&agrave;u đ&egrave;n cho bạn thoải m&aacute;i lựa chọn, thậm ch&iacute; nếu th&iacute;ch bạn c&oacute; thể c&agrave;i đặt n&oacute; tự thay đổi m&agrave;u sắc. C&oacute; khả năng hẹn giờ, tuy chỉ c&oacute; một mức 60 ph&uacute;t nhưng như vậy cũng đủ d&ugrave;ng.</p>\r\n<p><strong>1. Hướng dẫn sử dụng: </strong></p>\r\n<p>- Cắm giắc nguồn v&agrave;o lỗ cắm dưới đế của m&aacute;y.</p>\r\n<p>- Mở phần nắp chụp b&ecirc;n tr&ecirc;n ra, cho nước sạch (tốt nhất l&agrave; nước lọc bạn uống h&agrave;ng ng&agrave;y) v&agrave;o khay chứa. Ch&uacute; &yacute; kh&ocirc;ng cho qu&aacute; vạch Max v&agrave; dưới vạch Min. Kh&ocirc;ng cho nước n&oacute;ng v&agrave;o m&aacute;y v&igrave; sẽ l&agrave;m c&aacute;c bộ phận nhựa bị biến dạng.</p>\r\n<p>- Cho v&agrave;o khay chứa khoảng 5</p>\r\n<p>&ndash; 10 giọt tinh dầu, t&ugrave;y lượng nước trong khay.</p>\r\n<p>- Vặn k&iacute;n nắp đậy, phải vặn k&iacute;n nha! Nếu kh&ocirc;ng k&iacute;n sương phun sẽ kh&ocirc;ng mạnh v&agrave; đều.</p>\r\n<p>- Cắm bộ đổi nguồn v&agrave;o điện 220V. L&uacute;c n&agrave;y bạn sẽ thấy m&aacute;y k&ecirc;u một tiếng &ldquo;t&iacute;t&rdquo; v&agrave; đ&egrave;n xanh chỗ 2 c&ocirc;ng tắc bật s&aacute;ng.</p>\r\n<p>- Bạn c&oacute; thể lựa chọn c&aacute;c chế độ hoạt động bằng c&aacute;ch sau:</p>\r\n<p>+ Nhấn n&uacute;t MIST lần đầu: M&aacute;y hoạt động ở chế độ phun sương nhẹ</p>\r\n<p>+ Nhấn n&uacute;t MIST lần hai: M&aacute;y hoạt động ở chế độ phun sương mạnh</p>\r\n<p>+ Nhấn n&uacute;t MIST lần ba: Tắt chế độ phun sương</p>\r\n<p>+ Nhấn v&agrave; giữ n&uacute;t MIST trong 2 gi&acirc;y: Đ&egrave;n m&agrave;u xanh l&aacute; s&aacute;ng, l&uacute;c n&agrave;y m&aacute;y đang trong chế độ hẹn giờ tự tắt sau 60 ph&uacute;t</p>\r\n<p>- Chọn chế độ đ&egrave;n bằng c&aacute;ch nhấn n&uacute;t LIGHT. Nếu đ&egrave;n đang tắt, nhấn lần đầu n&oacute; sẽ chuyển qua chế độ tự động thay đổi m&agrave;u sắc. Nhấn tiếp đ&egrave;n sẽ s&aacute;ng chỉ 1 m&agrave;u m&agrave; bạn chọn.</p>\r\n<p><strong>2. Một số lưu &yacute; khi sử dụng: </strong></p>\r\n<p>- Để m&aacute;y tr&ecirc;n mặt phẳng, tr&aacute;nh xa &aacute;nh nắng v&agrave; nguồn nhiệt.</p>\r\n<p>- Nếu thay đổi loại tinh dầu bạn cần vệ sinh trước khi cho loại tinh dầu mới v&agrave;o.</p>\r\n<p>- Mỗi tuần h&atilde;y tổng vệ sinh cho m&aacute;y, ch&uacute; &yacute; d&ugrave;ng tăm b&ocirc;ng lau nhẹ phần l&otilde;m b&ecirc;n trong khay chứa (nơi dễ bị đ&oacute;ng cặn).</p>\r\n<p>- Kh&ocirc;ng đưa mũi v&agrave;o luồng sương của m&aacute;y để ngửi.</p>\r\n<p>- Kh&ocirc;ng để nước tr&agrave;n v&agrave;o c&aacute;c bộ phận điện tử dưới đế.</p>\r\n<p>- Kh&ocirc;ng che k&iacute;n lỗ th&ocirc;ng gi&oacute; của quạt.</p>\r\n<p>- Để m&aacute;y tr&aacute;nh xa tầm tay trẻ em.</p>\r\n<p>- Nếu trong qu&aacute; tr&igrave;nh sử dụng bạn thấy cơ thể c&oacute; bất kỳ triệu chứng kh&oacute; chịu n&agrave;o, h&atilde;y ngừng sử dụng ngay!</p>\r\n<p>- Chỉ bật m&aacute;y x&ocirc;ng tinh dầu trong 30 &ndash; 60 ph&uacute;t v&agrave; ph&ograve;ng phải đảm bảo th&ocirc;ng tho&aacute;ng.</p>', '2021-10-02 03:55:02', '2021-10-01 17:00:00'),
(12, 'Máy xông tinh dầu mini', 'Mini Size', 2, 2, 'Màu hồng', 300000, 'Còn hàng', 10, 'img/product/máy xông mini.jpg', '<p>Thời tiết chuyển từ Thu sang Đ&ocirc;ng độ ẩm kh&ocirc;ng kh&iacute; xuống thấp l&agrave;m cho mũi họng của con người bị kh&ocirc; nứt nẻ. Dễ bị vi&ecirc;m mũi dị ứng, vi&ecirc;m tai, vi&ecirc;m họng. Để khắc phục t&igrave;nh trạng n&agrave;y mỗi gia đ&igrave;nh n&ecirc;n c&oacute; &iacute;t nhất 01 m&aacute;y tạo ẩm kh&ocirc;ng kh&iacute; dạng phun sương để cung cấp th&ecirc;m độ ẩm tự nhi&ecirc;n v&agrave;o kh&ocirc;ng kh&iacute;, đảm bảo sức khỏe cả gia đ&igrave;nh</p>\r\n<p><strong>1. C&ocirc;ng dụng: </strong></p>\r\n<p>+ Taọ ẩm cho ph&ograve;ng dưới dạng phun sương</p>\r\n<p>+ gi&uacute;p thư gi&atilde;n tinh thần, hỗ trợ lọc kh&ocirc;ng kh&iacute;</p>\r\n<p>+ Sử dụng k&egrave;m tinh dầu ấn độ gi&uacute;p giảm muỗi, giảm stress, l&agrave;m đẹp da v&agrave; tinh thần thư th&aacute;i</p>\r\n<p>+ Loại bỏ m&ugrave;i v&agrave; giữ ẩm cho l&agrave;n da của bạn.</p>\r\n<p>+ cho &iacute;t tinh dầu lo&atilde;n v&agrave;o để tạo hương thơm nhẹ</p>\r\n<p><strong>2. Th&ocirc;ng tin sản phẩm </strong></p>\r\n<p>- Chất liệu: Nhựa</p>\r\n<p>- Nguồn cấp điện:1V - 5A</p>\r\n<p>- Cổng Sạc: USB c&oacute; thể sạc chung với sạc điện thoại 1v-5a, hoặc sạc qua cổng USB m&aacute;y t&iacute;nh</p>\r\n<p>- C&ocirc;ng suất nước: khoảng 200 ml - Xuất xứ: trung Quốc</p>\r\n<p>- 1 bộ sản phẩm bao gồm: 01 m&aacute;y x&ocirc;ng tinh dầu + 01 d&acirc;y c&aacute;p sạc</p>\r\n<p><strong>3. Hướng dẫn sử dụng: </strong></p>\r\n<p>- Bước 1: C&aacute;c mẹ h&atilde;y đổ nước sạch k&egrave;m v&agrave;i giọt tinh dầu ấn độ v&agrave;o phần chứa nước của m&aacute;y</p>\r\n<p>- Bước 2: Cắm điện v&agrave; bật c&ocirc;ng tắc</p>\r\n<p>- Bước 3: tận hưởng hương thơm dịu nhẹ từ tinh dầu v&agrave; kh&ocirc;ng kh&iacute; m&aacute;t l&agrave;nh</p>\r\n<p><strong>4. QU&Yacute; KH&Aacute;CH LƯU &Yacute;: </strong></p>\r\n<p>- M&aacute;y c&oacute; thể sử dụng kh&ocirc;ng cần tinh dầu trong trường hợp chỉ muốn tạo ẩm.</p>\r\n<p>- Khi sử dụng k&egrave;m tinh dầu ch&uacute;ng t&ocirc;i khuyến c&aacute;o qu&yacute; kh&aacute;ch n&ecirc;n chọn tinh dầu ấn độ để n&acirc;ng cao sức khỏe.</p>', '2021-10-02 07:02:30', '2021-10-01 17:00:00');

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
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

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
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
