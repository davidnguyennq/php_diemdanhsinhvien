-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 06, 2024 lúc 03:29 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ddsv2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('Có mặt','Vắng','Vắng có phép') NOT NULL,
  `lydo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `class_id`, `student_id`, `attendance_date`, `status`, `lydo`) VALUES
(1, 1, 1, '2024-04-28', 'Có mặt', ''),
(2, 1, 2, '2024-04-28', 'Vắng', ''),
(3, 1, 3, '2024-04-28', 'Có mặt', ''),
(4, 1, 4, '2024-04-28', 'Có mặt', ''),
(5, 1, 5, '2024-04-28', 'Có mặt', ''),
(6, 1, 6, '2024-04-28', 'Vắng', ''),
(7, 1, 7, '2024-04-28', 'Có mặt', ''),
(8, 1, 8, '2024-04-28', 'Vắng', ''),
(9, 1, 9, '2024-04-28', 'Có mặt', ''),
(10, 1, 10, '2024-04-28', 'Có mặt', ''),
(11, 1, 11, '2024-04-28', 'Có mặt', ''),
(12, 1, 12, '2024-04-28', 'Vắng', ''),
(13, 1, 1, '2024-04-29', 'Có mặt', ''),
(14, 1, 2, '2024-04-29', 'Có mặt', ''),
(15, 1, 3, '2024-04-29', 'Có mặt', ''),
(16, 1, 4, '2024-04-29', 'Có mặt', ''),
(17, 1, 5, '2024-04-29', 'Có mặt', ''),
(18, 1, 6, '2024-04-29', 'Có mặt', ''),
(19, 1, 7, '2024-04-29', 'Có mặt', ''),
(20, 1, 8, '2024-04-29', 'Có mặt', ''),
(21, 1, 9, '2024-04-29', 'Có mặt', ''),
(22, 1, 10, '2024-04-29', 'Có mặt', ''),
(23, 1, 11, '2024-04-29', 'Có mặt', ''),
(24, 1, 12, '2024-04-29', 'Có mặt', ''),
(25, 1, 1, '2024-04-30', 'Có mặt', ''),
(26, 1, 2, '2024-04-30', 'Có mặt', ''),
(27, 1, 3, '2024-04-30', 'Có mặt', ''),
(28, 1, 4, '2024-04-30', 'Có mặt', ''),
(29, 1, 5, '2024-04-30', 'Có mặt', ''),
(30, 1, 6, '2024-04-30', 'Có mặt', ''),
(31, 1, 1, '2024-05-01', 'Có mặt', ''),
(32, 1, 2, '2024-05-01', 'Có mặt', ''),
(33, 1, 3, '2024-05-01', 'Có mặt', ''),
(34, 1, 4, '2024-05-01', 'Có mặt', ''),
(35, 1, 5, '2024-05-01', 'Có mặt', ''),
(36, 1, 6, '2024-05-01', 'Có mặt', ''),
(37, 2, 1, '2024-04-28', 'Có mặt', ''),
(38, 2, 2, '2024-04-28', 'Vắng', ''),
(39, 2, 3, '2024-04-28', 'Có mặt', ''),
(40, 2, 4, '2024-04-28', 'Có mặt', ''),
(41, 2, 5, '2024-04-28', 'Có mặt', ''),
(42, 2, 6, '2024-04-28', 'Vắng', NULL),
(43, 5, 1, '2024-04-28', 'Có mặt', NULL),
(44, 5, 2, '2024-04-28', 'Vắng', NULL),
(45, 5, 3, '2024-04-28', 'Có mặt', NULL),
(46, 5, 4, '2024-04-28', 'Có mặt', NULL),
(47, 5, 5, '2024-04-28', 'Vắng có phép', 'Tham gia hội thao'),
(48, 5, 6, '2024-04-28', 'Vắng', NULL),
(49, 5, 7, '2024-04-28', 'Có mặt', NULL),
(50, 5, 8, '2024-04-28', 'Vắng', NULL),
(58, 1, 1, '2024-05-03', 'Có mặt', ''),
(59, 1, 2, '2024-05-03', 'Có mặt', ''),
(60, 1, 3, '2024-05-03', 'Có mặt', ''),
(61, 1, 4, '2024-05-03', 'Có mặt', ''),
(62, 1, 5, '2024-05-03', 'Có mặt', ''),
(63, 1, 6, '2024-05-03', 'Vắng có phép', 'Bận việc gia đình'),
(64, 1, 7, '2024-05-03', 'Có mặt', ''),
(65, 1, 8, '2024-05-03', 'Có mặt', ''),
(66, 1, 9, '2024-05-03', 'Có mặt', ''),
(67, 1, 10, '2024-05-03', 'Có mặt', ''),
(68, 1, 11, '2024-05-03', 'Có mặt', ''),
(69, 1, 12, '2024-05-03', 'Vắng', ''),
(70, 1, 13, '2024-05-03', 'Có mặt', ''),
(71, 1, 14, '2024-05-03', 'Có mặt', ''),
(72, 1, 15, '2024-05-03', 'Có mặt', ''),
(73, 1, 16, '2024-05-03', 'Vắng', ''),
(74, 1, 17, '2024-05-03', 'Có mặt', ''),
(75, 1, 18, '2024-05-03', 'Có mặt', ''),
(148, 2, 1, '2024-05-03', 'Có mặt', ''),
(149, 2, 2, '2024-05-03', 'Có mặt', ''),
(150, 2, 3, '2024-05-03', 'Vắng', ''),
(151, 2, 4, '2024-05-03', 'Có mặt', ''),
(152, 2, 5, '2024-05-03', 'Vắng', ''),
(153, 2, 6, '2024-05-03', 'Có mặt', ''),
(154, 2, 7, '2024-05-03', 'Có mặt', ''),
(155, 2, 8, '2024-05-03', 'Có mặt', ''),
(156, 2, 9, '2024-05-03', 'Có mặt', ''),
(157, 2, 10, '2024-05-03', 'Có mặt', ''),
(158, 2, 11, '2024-05-03', 'Có mặt', ''),
(159, 2, 12, '2024-05-03', 'Có mặt', ''),
(160, 2, 13, '2024-05-03', 'Vắng có phép', 'Đi địa chỉ đỏ'),
(161, 2, 14, '2024-05-03', 'Có mặt', ''),
(162, 2, 15, '2024-05-03', 'Vắng có phép', 'ABCCC'),
(163, 2, 16, '2024-05-03', 'Có mặt', ''),
(164, 2, 17, '2024-05-03', 'Có mặt', ''),
(165, 2, 18, '2024-05-03', 'Có mặt', ''),
(166, 1, 1, '2024-05-23', 'Vắng', NULL),
(167, 1, 2, '2024-05-23', 'Có mặt', ''),
(168, 1, 3, '2024-05-23', 'Có mặt', ''),
(169, 1, 4, '2024-05-23', 'Có mặt', ''),
(170, 1, 5, '2024-05-23', 'Có mặt', ''),
(171, 1, 6, '2024-05-23', 'Có mặt', ''),
(172, 1, 7, '2024-05-23', 'Có mặt', ''),
(173, 1, 8, '2024-05-23', 'Có mặt', ''),
(174, 1, 9, '2024-05-23', 'Vắng có phép', 'Đi khám bệnh'),
(175, 1, 10, '2024-05-23', 'Có mặt', ''),
(176, 1, 11, '2024-05-23', 'Có mặt', ''),
(177, 1, 12, '2024-05-23', 'Có mặt', ''),
(178, 1, 13, '2024-05-23', 'Có mặt', ''),
(179, 1, 14, '2024-05-23', 'Có mặt', ''),
(180, 1, 15, '2024-05-23', 'Có mặt', ''),
(181, 1, 16, '2024-05-23', 'Có mặt', ''),
(182, 1, 17, '2024-05-23', 'Có mặt', ''),
(183, 1, 18, '2024-05-23', 'Có mặt', ''),
(238, 1, 1, '2024-06-05', 'Vắng có phép', 'Om'),
(239, 1, 2, '2024-06-05', 'Vắng có phép', 'Sot'),
(242, 1, 3, '2024-06-05', 'Có mặt', NULL),
(243, 1, 4, '2024-06-05', 'Có mặt', NULL),
(244, 1, 5, '2024-06-05', 'Có mặt', NULL),
(245, 1, 6, '2024-06-05', 'Có mặt', NULL),
(246, 1, 7, '2024-06-05', 'Có mặt', NULL),
(247, 1, 8, '2024-06-05', 'Có mặt', NULL),
(248, 1, 9, '2024-06-05', 'Có mặt', NULL),
(249, 1, 10, '2024-06-05', 'Có mặt', NULL),
(250, 1, 11, '2024-06-05', 'Có mặt', NULL),
(251, 1, 12, '2024-06-05', 'Có mặt', NULL),
(252, 1, 13, '2024-06-05', 'Có mặt', NULL),
(253, 1, 14, '2024-06-05', 'Có mặt', NULL),
(254, 1, 15, '2024-06-05', 'Có mặt', NULL),
(255, 1, 16, '2024-06-05', 'Có mặt', NULL),
(256, 1, 17, '2024-06-05', 'Có mặt', NULL),
(257, 1, 18, '2024-06-05', 'Có mặt', NULL),
(258, 16, 17, '2024-06-05', 'Vắng có phép', 'Có việc gia đình'),
(259, 16, 25, '2024-06-05', 'Có mặt', ''),
(260, 1, 1, '2024-06-04', 'Vắng có phép', 'Bị hư xe'),
(261, 1, 1, '2024-06-01', 'Có mặt', NULL),
(262, 1, 1, '2024-04-06', 'Có mặt', NULL),
(263, 1, 1, '2024-04-15', 'Có mặt', NULL),
(264, 1, 1, '2024-06-06', 'Vắng có phép', 'asdasd'),
(265, 1, 2, '2024-06-06', 'Có mặt', ''),
(266, 1, 3, '2024-06-06', 'Có mặt', ''),
(267, 1, 4, '2024-06-06', 'Có mặt', ''),
(268, 1, 5, '2024-06-06', 'Có mặt', ''),
(269, 1, 6, '2024-06-06', 'Có mặt', ''),
(270, 1, 7, '2024-06-06', 'Có mặt', ''),
(271, 1, 8, '2024-06-06', 'Có mặt', ''),
(272, 1, 9, '2024-06-06', 'Có mặt', ''),
(273, 1, 10, '2024-06-06', 'Có mặt', ''),
(274, 1, 11, '2024-06-06', 'Có mặt', ''),
(275, 1, 12, '2024-06-06', 'Có mặt', ''),
(276, 1, 13, '2024-06-06', 'Có mặt', ''),
(277, 1, 14, '2024-06-06', 'Có mặt', ''),
(278, 1, 15, '2024-06-06', 'Có mặt', ''),
(279, 1, 16, '2024-06-06', 'Có mặt', ''),
(280, 1, 17, '2024-06-06', 'Có mặt', ''),
(281, 1, 18, '2024-06-06', 'Có mặt', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `subject_id`, `semester_id`, `teacher_id`) VALUES
(1, 'Lớp Toán A-1', 1, 1, 1),
(2, 'Lớp Toán B-1', 1, 1, 1),
(3, 'Lớp Toán C', 1, 1, 2),
(4, 'Lớp Toán D', 1, 1, 2),
(5, 'Lớp Vật lý A', 2, 1, 1),
(6, 'Lớp Sinh học A', 3, 1, 1),
(7, 'Lớp Sinh học B', 3, 1, 2),
(8, 'Lớp Sinh học C', 3, 1, 3),
(9, 'Lớp Hóa học A', 4, 1, 4),
(10, 'Lớp Tiếng Anh A', 5, 1, 5),
(11, 'Lớp Lịch sử A', 6, 1, 6),
(12, 'Lớp Khoa học máy tính A', 7, 1, 7),
(13, 'Lớp Mỹ thuật A', 8, 1, 8),
(14, 'Lớp Âm nhạc A', 9, 1, 9),
(15, 'Lớp Giáo dục thể chất A', 10, 1, 10),
(16, 'Lớp Toán A-2', 1, 2, 1),
(17, 'Lớp Toán B-2', 1, 2, 1),
(18, 'Lớp Vật lý B', 2, 2, 1),
(19, 'Lớp Sinh học D', 3, 2, 2),
(20, 'Lớp Hóa học B', 4, 2, 3),
(21, 'Lớp Tiếng Anh B', 5, 2, 4),
(22, 'Lớp Lịch sử B', 6, 2, 5),
(23, 'Lớp Khoa học máy tính B', 7, 2, 6),
(24, 'Lớp Mỹ thuật B', 8, 2, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `semesters`
--

CREATE TABLE `semesters` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `semesters`
--

INSERT INTO `semesters` (`semester_id`, `semester_name`) VALUES
(1, 'KH1 2023'),
(2, 'KH2 2023'),
(3, 'KH1 2024'),
(4, 'KH2 2024'),
(5, 'KH1 2025'),
(6, 'KH2 2025'),
(7, 'KH1 2026'),
(8, 'KH2 2026'),
(9, 'KH1 2027'),
(10, 'KH2 2027');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`student_id`, `username`, `password`, `fullname`, `email`, `phone_number`) VALUES
(1, 'sinhvien1', 'matkhau1', 'Nguyễn Văn A', 'nguyenvana@example.com', '1234567890'),
(2, 'sinhvien2', 'matkhau2', 'Trần Thị Bình', 'binhtran@example.com', '0987654321'),
(3, 'sinhvien3', 'matkhau3', 'Phạm Văn Cường', 'phamcuong@example.com', '2345678901'),
(4, 'sinhvien4', 'matkhau4', 'Hoàng Thị Dung', 'hoangdung@example.com', '9876543210'),
(5, 'sinhvien5', 'matkhau5', 'Lê Văn Đức', 'levanduc@example.com', '3456789012'),
(6, 'sinhvien6', 'matkhau6', 'Nguyễn Thị Hương', 'huongnguyen@example.com', '8765432109'),
(7, 'sinhvien7', 'matkhau7', 'Trần Minh Khánh', 'minhkhanh@example.com', '4567890123'),
(8, 'sinhvien8', 'matkhau8', 'Lê Thị Lan', 'lanle@example.com', '7654321098'),
(9, 'sinhvien9', 'matkhau9', 'Vũ Ngọc Linh', 'linhvungoc@example.com', '5678901234'),
(10, 'sinhvien10', 'matkhau10', 'Nguyễn Hải Nam', 'hainamnguyen@example.com', '6543210987'),
(11, 'sinhvien11', 'matkhau11', 'Trần Văn Anh', 'anhtran@example.com', '1234567890'),
(12, 'sinhvien12', 'matkhau12', 'Phạm Thị Bảo', 'baopham@example.com', '0987654321'),
(13, 'sinhvien13', 'matkhau13', 'Lê Thành Công', 'congle@example.com', '2345678901'),
(14, 'sinhvien14', 'matkhau14', 'Nguyễn Minh Dương', 'duongnguyen@example.com', '9876543210'),
(15, 'sinhvien15', 'matkhau15', 'Vũ Thị Hà', 'havu@example.com', '3456789012'),
(16, 'sinhvien16', 'matkhau16', 'Trần Văn Khải', 'khaitran@example.com', '8765432109'),
(17, 'sinhvien17', 'matkhau17', 'Nguyễn Thị Lan', 'lannguyen@example.com', '4567890123'),
(18, 'sinhvien18', 'matkhau18', 'Lê Minh Ngọc', 'ngocle@example.com', '7654321098'),
(19, 'sinhvien19', 'matkhau19', 'Phạm Văn Quân', 'quanpham@example.com', '5678901234'),
(20, 'sinhvien20', 'matkhau20', 'Hoàng Minh Tâm', 'tamhoang@example.com', '6543210987'),
(21, 'sinhvien21', 'matkhau21', 'Nguyễn Thị Thảo', 'thaonguyen@example.com', '1234567890'),
(22, 'sinhvien22', 'matkhau22', 'Trần Đình Trọng', 'trongtran@example.com', '0987654321'),
(23, 'sinhvien23', 'matkhau23', 'Lê Thị Mai', 'maile@example.com', '2345678901'),
(24, 'sinhvien24', 'matkhau24', 'Nguyễn Văn Long', 'longnguyen@example.com', '9876543210'),
(25, 'sinhvien25', 'matkhau25', 'Trần Thị Thu', 'thutran@example.com', '3456789012');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_classes`
--

CREATE TABLE `student_classes` (
  `student_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `student_classes`
--

INSERT INTO `student_classes` (`student_class_id`, `student_id`, `class_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 1, 2),
(20, 2, 2),
(21, 3, 2),
(22, 4, 2),
(23, 5, 2),
(24, 6, 2),
(25, 7, 2),
(26, 8, 2),
(27, 9, 2),
(28, 10, 2),
(29, 11, 2),
(30, 12, 2),
(31, 13, 2),
(32, 14, 2),
(33, 15, 2),
(34, 16, 2),
(35, 17, 2),
(36, 18, 2),
(37, 1, 3),
(38, 2, 3),
(39, 3, 3),
(40, 4, 3),
(41, 5, 3),
(42, 6, 3),
(43, 7, 3),
(44, 8, 3),
(45, 9, 3),
(46, 10, 3),
(47, 11, 3),
(48, 12, 3),
(49, 13, 3),
(50, 14, 3),
(51, 15, 3),
(52, 16, 3),
(53, 17, 3),
(54, 18, 3),
(55, 1, 4),
(56, 2, 4),
(57, 3, 4),
(58, 4, 4),
(59, 5, 4),
(60, 6, 4),
(61, 7, 4),
(62, 8, 4),
(63, 9, 4),
(64, 10, 4),
(65, 11, 4),
(66, 12, 4),
(67, 13, 4),
(68, 14, 4),
(69, 15, 4),
(70, 16, 4),
(71, 17, 4),
(72, 18, 4),
(73, 1, 5),
(74, 2, 5),
(75, 3, 5),
(76, 4, 5),
(77, 5, 5),
(78, 6, 5),
(79, 7, 5),
(80, 8, 5),
(81, 17, 16),
(82, 25, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(1, 'Toán học'),
(2, 'Vật lý'),
(3, 'Sinh học'),
(4, 'Hóa học'),
(5, 'Tiếng Anh'),
(6, 'Lịch sử'),
(7, 'Khoa học máy tính'),
(8, 'Mỹ thuật'),
(9, 'Âm nhạc'),
(10, 'Giáo dục thể chất'),
(11, 'Ngữ văn'),
(12, 'Địa lý'),
(13, 'Công nghệ thông tin'),
(14, 'Kinh tế'),
(15, 'Tiếng Pháp'),
(16, 'Tiếng Trung'),
(17, 'Tiếng Nhật'),
(18, 'Quản trị kinh doanh'),
(19, 'Thiết kế đồ hoạ'),
(20, 'Đại số'),
(21, 'Hình học'),
(22, 'Văn học'),
(23, 'Văn hóa'),
(24, 'Khoa học xã hội'),
(25, 'Sinh học phân tử');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `fullname`, `email`, `phone_number`) VALUES
(1, 'giaovien1', 'matkhau1', 'Giáo sư Nguyễn Văn A', 'nguyenvana@example.com', '9876543210'),
(2, 'giaovien2', 'matkhau2', 'Giáo sư Trần Thị Bình', 'binhtran@example.com', '0123456789'),
(3, 'giaovien3', 'matkhau3', 'Giáo sư Phạm Văn Cường', 'phamcuong@example.com', '8901234567'),
(4, 'giaovien4', 'matkhau4', 'Giáo sư Hoàng Thị Dung', 'hoangdung@example.com', '4567890123'),
(5, 'giaovien5', 'matkhau5', 'Giáo sư Lê Văn Đức', 'levanduc@example.com', '9012345678'),
(6, 'giaovien6', 'matkhau6', 'Giáo sư Nguyễn Thị Hương', 'huongnguyen@example.com', '3456789012'),
(7, 'giaovien7', 'matkhau7', 'Giáo sư Trần Minh Khánh', 'minhkhanh@example.com', '6789012345'),
(8, 'giaovien8', 'matkhau8', 'Giáo sư Lê Thị Lan', 'lanle@example.com', '1234567890'),
(9, 'giaovien9', 'matkhau9', 'Giáo sư Vũ Ngọc Linh', 'linhvungoc@example.com', '7890123456'),
(10, 'giaovien10', 'matkhau10', 'Giáo sư Nguyễn Hải Nam', 'hainamnguyen@example.com', '2345678901'),
(11, 'giaovien11', 'matkhau11', 'Giáo sư Trần Văn Anh', 'anhtran@example.com', '9876543210'),
(12, 'giaovien12', 'matkhau12', 'Giáo sư Phạm Thị Bảo', 'baopham@example.com', '0123456789'),
(13, 'giaovien13', 'matkhau13', 'Giáo sư Lê Thành Công', 'congle@example.com', '8901234567'),
(14, 'giaovien14', 'matkhau14', 'Giáo sư Nguyễn Minh Dương', 'duongnguyen@example.com', '4567890123'),
(15, 'giaovien15', 'matkhau15', 'Giáo sư Vũ Thị Hà', 'havu@example.com', '9012345678');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`),
  ADD UNIQUE KEY `unique_attendance` (`class_id`,`student_id`,`attendance_date`),
  ADD KEY `student_id` (`student_id`);

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Chỉ mục cho bảng `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`semester_id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`student_class_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `student_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Các ràng buộc cho bảng `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `classes_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`semester_id`),
  ADD CONSTRAINT `classes_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Các ràng buộc cho bảng `student_classes`
--
ALTER TABLE `student_classes`
  ADD CONSTRAINT `student_classes_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_classes_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
