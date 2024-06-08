<?php
include 'connect.php';
session_start();

$u = $_POST['username'] ?? '';
$p = $_POST['password'] ?? '';
$c = $_POST['isTeacher'] ?? '';

if ($c == '') {
    $sql = "SELECT * FROM student WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$u, $p]);
    $data = $stmt->fetch(PDO::FETCH_OBJ);

    if ($data == null) {
        $error = "Sai tên đăng nhập hoặc mật khẩu!";
        header("Location: index.php?error=" . urlencode($error));
        exit;
    } else {
        $_SESSION['username'] = $u;
        header("Location: student.php");
        exit;
    }
} else {
    $sql2 = "SELECT * FROM teacher WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql2);
    $stmt->execute([$u, $p]);
    $data2 = $stmt->fetch(PDO::FETCH_OBJ);

    if ($data2 == null) {
        $error = "Sai tên đăng nhập hoặc mật khẩu!";
        header("Location: index.php?error=" . urlencode($error));
        exit;
    } else {
        $_SESSION['username'] = $u;
        header("Location: teacher.php");
        exit;
    }
}
?>
