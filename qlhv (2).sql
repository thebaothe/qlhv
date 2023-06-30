-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th6 22, 2023 lúc 08:16 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlhv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `tenfile` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaydang` date NOT NULL,
  `id_nguoidung` int(11) NOT NULL,
  `name_file` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_monhoc` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_file`),
  UNIQUE KEY `name_file` (`name_file`),
  KEY `id_nguoidung` (`id_nguoidung`),
  KEY `id_monhoc` (`id_monhoc`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `file`
--

INSERT INTO `file` (`id_file`, `tenfile`, `ngaydang`, `id_nguoidung`, `name_file`, `id_monhoc`) VALUES
(58, 'nopbai', '2023-04-06', 7, '7_7_7_19476841_Ver2 (1).zip', '4'),
(59, 'nopbai', '2023-04-06', 7, '7_17_19485451_NguyenThiHang.rar', '4'),
(62, 'nộp bài ', '2023-04-22', 7, '7_VuLeTuLuong_19476841_PhanQuyenuser_THT1.zip', ''),
(66, 'Bài tập môn mạng máy tính ', '2023-04-22', 8, '8_20113401_NgyenTuanKiet_Role_code.rar', ''),
(67, 'Bài tập môn mạng máy tính ', '2023-04-22', 8, '8_19527701-LeHoangPhiThong.rar', ''),
(68, 'nopbai', '2023-04-22', 8, '8_BaoCao_CNMoi_Tuan3.rar', ''),
(69, 'aaa', '2023-04-22', 7, '7_dulieuxettuyendaihoc.rar', ''),
(71, 'Bài tập môn mạng máy tính ', '2023-05-27', 7, '7_vuletuluong-19476841.rar', '4'),
(72, 'nopbai', '2023-05-27', 7, '7_Baitap.rar', '6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

DROP TABLE IF EXISTS `giangvien`;
CREATE TABLE IF NOT EXISTS `giangvien` (
  `id_giangvien` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  PRIMARY KEY (`id_giangvien`),
  UNIQUE KEY `id_taikhoan_2` (`id_taikhoan`),
  KEY `id_taikhoan` (`id_taikhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`id_giangvien`, `hoten`, `diachi`, `sdt`, `email`, `id_taikhoan`) VALUES
(8, 'Nguyễn Văn A', '12 Nguyễn Văn Bảo', 123456789, 'A@gmail.com', 8),
(9, 'Bùi Mạnh Tùng', 'Thủ Đức', 783483768, 'tung123@gmail.com', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

DROP TABLE IF EXISTS `lophoc`;
CREATE TABLE IF NOT EXISTS `lophoc` (
  `id_lophoc` int(11) NOT NULL AUTO_INCREMENT,
  `id_sinhvien` int(11) NOT NULL,
  `id_monhoc` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id_lophoc`),
  UNIQUE KEY `unique_sinhvien_monhoc` (`id_sinhvien`,`id_monhoc`),
  KEY `id_sinhvien` (`id_sinhvien`),
  KEY `id_monhoc` (`id_monhoc`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`id_lophoc`, `id_sinhvien`, `id_monhoc`, `id`) VALUES
(20, 3, 4, 18),
(22, 8, 4, 18),
(24, 3, 5, 19),
(26, 6, 5, 23),
(27, 6, 4, 21),
(28, 3, 6, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc_gv`
--

DROP TABLE IF EXISTS `lophoc_gv`;
CREATE TABLE IF NOT EXISTS `lophoc_gv` (
  `id_giangvien` int(11) NOT NULL,
  `id_monhoc` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_lop_hoc` (`id_monhoc`,`id_giangvien`),
  KEY `id_giangvien` (`id_giangvien`),
  KEY `id_monhoc` (`id_monhoc`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc_gv`
--

INSERT INTO `lophoc_gv` (`id_giangvien`, `id_monhoc`, `id`) VALUES
(8, 4, 18),
(9, 4, 25),
(8, 5, 19),
(8, 6, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

DROP TABLE IF EXISTS `monhoc`;
CREATE TABLE IF NOT EXISTS `monhoc` (
  `id_monhoc` int(11) NOT NULL AUTO_INCREMENT,
  `tenmh` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigianhoc` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `namhoc` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_monhoc`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`id_monhoc`, `tenmh`, `thoigianhoc`, `namhoc`) VALUES
(4, 'Công nghệ mới', 'Thứ 2 tiết 1-3', '2022-2023'),
(5, 'Phát triển ứng dụng', 'Thứ 3 tiết 7-9', '2022-2023'),
(6, 'Mạng máy tính', 'Thứ 6 tiết 7-9', '2022-2023'),
(11, ' Tự Nhiên Xã Hội', ' Thứ 7 tiết 1-3', '2022-2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoiquantri`
--

DROP TABLE IF EXISTS `nguoiquantri`;
CREATE TABLE IF NOT EXISTS `nguoiquantri` (
  `id_nguoiquantri` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  PRIMARY KEY (`id_nguoiquantri`),
  KEY `id_taikhoan` (`id_taikhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nguoiquantri`
--

INSERT INTO `nguoiquantri` (`id_nguoiquantri`, `hoten`, `diachi`, `sdt`, `email`, `id_taikhoan`) VALUES
(4, 'Nguyẽn Văn A', '12 Nguyễn Văn Bảo', 123456789, 'A@gmail.com', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

DROP TABLE IF EXISTS `sinhvien`;
CREATE TABLE IF NOT EXISTS `sinhvien` (
  `id_sinhvien` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lop` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  PRIMARY KEY (`id_sinhvien`),
  UNIQUE KEY `id_taikhoan_2` (`id_taikhoan`),
  KEY `id_taikhoan` (`id_taikhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id_sinhvien`, `hoten`, `diachi`, `email`, `lop`, `id_taikhoan`) VALUES
(3, 'Vũ Lê Tự Lương', '12 Nguyễn Văn Bảo', 'luong@gmail.com', 'DHTH15C', 7),
(6, 'Nguyễn Văn Nam', '12 Nguyễn Văn Bảo ', 'vuluong594@gmail.com', 'DHTH15C', 10),
(8, 'Nguyễn Văn Quí', '12 nguyen van bao ', 'vuluong594@gmail.com', 'HTTT15C', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phanquyen` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tennguoidung` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_taikhoan`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `username`, `password`, `phanquyen`, `tennguoidung`) VALUES
(5, 'bao', '202cb962ac59075b964b07152d234b70', 'sinh viên', 'Nguyễn Thế Bảo'),
(6, 'admin', '15e745c6848efa1825134e2f1921747e', 'người quản trị', 'Nguyễn Văn A'),
(7, 'luong', '15e745c6848efa1825134e2f1921747e', 'sinh viên', 'Vũ Lê Tự Lương'),
(8, 'giangvien', '15e745c6848efa1825134e2f1921747e', 'giảng viên', 'Thầy giáo A'),
(10, 'nam', 'c4ca4238a0b923820dcc509a6f75849b', 'sinh viên ', 'Nguyễn Văn Nam '),
(11, 'hoang', 'c4ca4238a0b923820dcc509a6f75849b', 'sinh viên ', 'Nguyễn Văn Hoàng '),
(12, 'qui', '5b90b0b35f1a601ef0e5d294a5c7e3ce', 'sinh viên ', 'Nguyễn Văn Quí '),
(13, 'tung', 'e10adc3949ba59abbe56e057f20f883e', 'sinh viên ', 'Bùi Mạnh Tùng '),
(151, 'sinhvien1', '15e745c6848efa1825134e2f1921747e', 'sinh viên', 'Nguyễn Văn A'),
(152, 'sinhvien2', '15e745c6848efa1825134e2f1921747e', 'sinh viên', 'Nguyễn Văn B'),
(153, 'sinhvien3', '15e745c6848efa1825134e2f1921747e', 'sinh viên', 'Nguyễn Văn C'),
(154, 'sinhvien4', '15e745c6848efa1825134e2f1921747e', 'sinh viên', 'Nguyễn Văn D'),
(155, 'sinhvien5', '15e745c6848efa1825134e2f1921747e', 'sinh viên', 'Nguyễn Văn E'),
(156, 'giangvien1', '15e745c6848efa1825134e2f1921747e', 'giảng viên', 'Nguyễn Thị A'),
(157, 'giangvien2', '15e745c6848efa1825134e2f1921747e', 'giảng viên', 'Nguyễn Thị B'),
(158, 'giangvien3', '15e745c6848efa1825134e2f1921747e', 'giảng viên', 'Nguyễn Thị C'),
(159, 'giangvien4', '15e745c6848efa1825134e2f1921747e', 'giảng viên', 'Nguyễn Thị D'),
(160, 'giangvien5', '15e745c6848efa1825134e2f1921747e', 'giảng viên', 'Nguyễn Thị E');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thaoluan`
--

DROP TABLE IF EXISTS `thaoluan`;
CREATE TABLE IF NOT EXISTS `thaoluan` (
  `id_binhluan` int(11) NOT NULL AUTO_INCREMENT,
  `ten_binhluan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `binhluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `id_traloi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_binhluan`),
  KEY `id_taikhoan` (`id_taikhoan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thaoluan`
--

INSERT INTO `thaoluan` (`id_binhluan`, `ten_binhluan`, `binhluan`, `id_taikhoan`, `id_traloi`) VALUES
(54, 'sinh viên-Vũ Lê Tự Lương', 'EM Chao thay a', 7, NULL),
(55, 'giảng viên-Thầy giáo A', 'thay chao em', 8, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `traloi`
--

DROP TABLE IF EXISTS `traloi`;
CREATE TABLE IF NOT EXISTS `traloi` (
  `id_traloi` int(11) NOT NULL AUTO_INCREMENT,
  `noidung` varchar(450) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `id_binhluan` int(11) NOT NULL,
  PRIMARY KEY (`id_traloi`),
  UNIQUE KEY `id_binhluan_2` (`id_binhluan`),
  KEY `id_giangvien` (`id_giangvien`),
  KEY `id_binhluan` (`id_binhluan`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `traloi`
--

INSERT INTO `traloi` (`id_traloi`, `noidung`, `id_giangvien`, `id_binhluan`) VALUES
(23, 'EM Chao thay a', 8, 54);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_2` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_1` FOREIGN KEY (`id_monhoc`) REFERENCES `monhoc` (`id_monhoc`),
  ADD CONSTRAINT `lophoc_ibfk_2` FOREIGN KEY (`id_sinhvien`) REFERENCES `sinhvien` (`id_sinhvien`);

--
-- Các ràng buộc cho bảng `lophoc_gv`
--
ALTER TABLE `lophoc_gv`
  ADD CONSTRAINT `lophoc_gv_ibfk_1` FOREIGN KEY (`id_monhoc`) REFERENCES `monhoc` (`id_monhoc`),
  ADD CONSTRAINT `lophoc_gv_ibfk_2` FOREIGN KEY (`id_giangvien`) REFERENCES `giangvien` (`id_giangvien`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguoiquantri`
--
ALTER TABLE `nguoiquantri`
  ADD CONSTRAINT `nguoiquantri_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_3` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `thaoluan`
--
ALTER TABLE `thaoluan`
  ADD CONSTRAINT `thaoluan_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `traloi`
--
ALTER TABLE `traloi`
  ADD CONSTRAINT `traloi_ibfk_1` FOREIGN KEY (`id_giangvien`) REFERENCES `giangvien` (`id_giangvien`),
  ADD CONSTRAINT `traloi_ibfk_2` FOREIGN KEY (`id_binhluan`) REFERENCES `thaoluan` (`id_binhluan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
