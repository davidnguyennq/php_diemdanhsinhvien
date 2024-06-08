<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .btn-custom {
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-custom:hover {
            background-color: #007bff;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container mt-5 animate__animated animate__fadeIn">
        <?php 
        include 'connect.php';

        $id = $_GET['id'];
        $idgv = $_GET['idgv'];
        $semester_id = $_GET['semester_id'];

        $sql = "SELECT student.* FROM student
                INNER JOIN student_classes ON student.student_id = student_classes.student_id
                INNER JOIN classes ON student_classes.class_id = classes.class_id
                INNER JOIN teacher ON classes.teacher_id = teacher.teacher_id
                INNER JOIN semesters ON classes.semester_id = semesters.semester_id
                WHERE classes.class_id = ?
                  AND teacher.teacher_id = ?
                  AND semesters.semester_id = ?";
        $arrParam = [$id,$idgv,$semester_id];
        $stm = $conn->prepare($sql);
        $stm->execute($arrParam);
        $data = $stm->fetchAll(PDO::FETCH_OBJ);

        // Create an array to store unique student information
        $unique_students = [];
        foreach ($data as $item) {
            if (!isset($unique_students[$item->student_id])) {
                $unique_students[$item->student_id] = $item;
            }
        }
        ?>

        <form action="./luuthongtindiemdanh.php?idgv=<?php echo htmlspecialchars($idgv); ?>&semester_id=<?php echo htmlspecialchars($semester_id); ?>" method="POST">
            <table class="table table-bordered table-striped table-hover animate__animated animate__zoomIn">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã sinh viên</th>
                        <th>Họ và tên</th>
                        <th>Trạng thái</th>
                        <th>Lý do</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($unique_students as $student): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($student->student_id); ?></td>
                        <td><?php echo htmlspecialchars($student->fullname); ?></td>
                        <td>
                            <input type="hidden" name="attendance_date[]" value="<?php echo date('Y-m-d'); ?>">
                            <input type="hidden" name="student_id[]" value="<?php echo htmlspecialchars($student->student_id); ?>">
                            <select name="status[]" class="form-control" onchange="toggleReason(this)">
                                <option value="Có mặt">Có mặt</option>
                                <option value="Vắng">Vắng</option>
                                <option value="Vắng có phép">Vắng có phép</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="reason[]" class="form-control reason-input" readonly>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <input type="hidden" name="class_id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="text-center">
                <input type="submit" value="Lưu" class="btn btn-success btn-custom">
            </div>
        </form>
        <div class="text-center mt-3">
            <a href="./teacher.php" class="btn btn-secondary btn-custom">Quay lại</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleReason(selectElement) {
            var reasonInput = selectElement.parentElement.nextElementSibling.firstElementChild;
            if (selectElement.value === "Vắng có phép") {
                reasonInput.readOnly = false;
            } else {
                reasonInput.readOnly = true;
                reasonInput.value = "";
            }
        }
    </script>
</body>
</html>
