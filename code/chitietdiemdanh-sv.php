<?php
    session_start();
    include 'connect.php';

    $u = $_SESSION['username'];
    $id = $_GET['id'];
    $records_per_page = 5; // Số lượng bản ghi trên mỗi trang

    // Tính tổng số bản ghi
    $sql_count = "SELECT COUNT(*) AS total_records 
                  FROM attendances att
                  INNER JOIN classes c ON c.class_id = att.class_id
                  INNER JOIN student stu ON att.student_id = stu.student_id 
                  WHERE att.class_id = ? AND stu.username = ?";
    $stm_count = $conn->prepare($sql_count);
    $stm_count->execute([$id, $u]);
    $row_count = $stm_count->fetch(PDO::FETCH_ASSOC);
    $total_records = $row_count['total_records'];

    // Tính tổng số trang
    $total_pages = ceil($total_records / $records_per_page);

    // Xác định trang hiện tại và bắt đầu từ bản ghi
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    $start_from = ($page - 1) * $records_per_page;

    // Truy vấn dữ liệu với phân trang
    $sql = "SELECT att.attendance_id, att.class_id, att.student_id, att.attendance_date, att.status, att.lydo, stu.fullname, c.class_name
            FROM attendances att
            INNER JOIN classes c ON c.class_id = att.class_id
            INNER JOIN student stu ON att.student_id = stu.student_id 
            WHERE att.class_id = ? AND stu.username = ?
            LIMIT $start_from, $records_per_page";

    $stm = $conn->prepare($sql);
    $stm->execute([$id, $u]);
    $data = $stm->fetchAll(PDO::FETCH_OBJ);

    $classname = ''; // Biến để lưu tên lớp
    foreach ($data as $item) {
        $classname = $item->class_name; // Lưu tên lớp
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Attendance Details for Class ID: <?php echo htmlspecialchars($classname); ?></h2>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Mã lớp</th>
                    <th>Mã sinh viên</th>
                    <th>Họ và tên</th>
                    <th>Ngày điểm danh</th>
                    <th>Trạng thái</th>
                    <th>Lý do</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $item) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($item->class_id); ?></td>
                    <td><?php echo htmlspecialchars($item->student_id); ?></td>
                    <td><?php echo htmlspecialchars($item->fullname); ?></td>
                    <td><?php echo htmlspecialchars($item->attendance_date); ?></td>
                    <td><?php echo htmlspecialchars($item->status); ?></td>
                    <td><?php echo htmlspecialchars($item->lydo); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <!-- Phân trang -->
        <?php if ($total_pages > 1) { ?>
        <ul class="pagination">
            <?php if ($page > 1) { ?>
                <li class="page-item"><a class="page-link" href="chitietdiemdanh-sv.php?id=<?php echo $id; ?>&page=<?php echo $page - 1; ?>">Previous</a></li>
            <?php } ?>
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="chitietdiemdanh-sv.php?id=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <?php if ($page < $total_pages) { ?>
                <li class="page-item"><a class="page-link" href="chitietdiemdanh-sv.php?id=<?php echo $id; ?>&page=<?php echo $page + 1; ?>">Next</a></li>
            <?php } ?>
        </ul>
        <?php } ?>

        <a href="student.php" class="btn btn-primary mt-3">Back to Classes</a>
        <a href="./logout.php" class="btn btn-danger mt-3">Log Out</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
