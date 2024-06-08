<?php
include 'connect.php';

$class_id = $_POST['class_id'];
$attendance_dates = $_POST['attendance_date'];
$student_ids = $_POST['student_id'];
$statuses = $_POST['status'];
$reasons = $_POST['reason'];

$idgv = $_GET['idgv'];
$semester_id = $_GET['semester_id'];

// Lặp qua danh sách sinh viên để thêm thông tin vào cơ sở dữ liệu
for ($i = 0; $i < count($student_ids); $i++) {
    $student_id = $student_ids[$i];
    $attendance_date = $attendance_dates[$i];
    $status = $statuses[$i];
    $reason = ($status === 'Vắng có phép') ? $reasons[$i] : '';

    // Thêm thông tin vào bảng `attendances`, nếu đã tồn tại, thì cập nhật dữ liệu
    $sql = "INSERT INTO attendances (class_id, student_id, attendance_date, status, lydo) 
            VALUES (?, ?, ?, ?, ?) 
            ON DUPLICATE KEY UPDATE status = ?, lydo = ?";
    $stm = $conn->prepare($sql);
    $stm->execute([$class_id, $student_id, $attendance_date, $status, $reason, $status, $reason]);
}

// Redirect back to previous page
header("Location: danhsachdiemdanh-gv.php?id=$class_id&semester_id=$semester_id&idgv=$idgv");
exit();
?>
