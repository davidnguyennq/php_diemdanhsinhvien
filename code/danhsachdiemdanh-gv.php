<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Details</title>
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
        .tooltip-custom {
            position: relative;
        }
        .tooltip-custom .tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: #6c757d;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 10px;
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            margin-left: -100px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .tooltip-custom:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        } 
    </style>
</head>
<body>
    <div class="container mt-5 animate__animated animate__fadeIn">
        <?php include 'connect.php'; ?>
        <?php
        $id = $_GET['id'];
        $idgv = $_GET['idgv'];
        $semester_id = $_GET['semester_id'];
        $search_query = isset($_GET['search']) ? $_GET['search'] : '';

        // Count the number of students in the class
        $sql_count_students = "SELECT COUNT(*) AS student_count FROM student_classes WHERE class_id = ?";
        $stm_count_students = $conn->prepare($sql_count_students);
        $stm_count_students->execute([$id]);
        $row_count_students = $stm_count_students->fetch(PDO::FETCH_ASSOC);
        $student_count = $row_count_students['student_count'];
        ?>

        <div class="d-flex justify-content-between mb-4">
            <a href="./teacher.php" class="btn btn-secondary btn-custom">Quay lại</a>
            <?php if ($student_count > 0) { ?>
                <a href="./diemdanh-gv.php?id=<?php echo htmlspecialchars($id)?>&idgv=<?php echo htmlspecialchars($idgv); ?>&semester_id=<?php echo htmlspecialchars($semester_id); ?>" class="btn btn-primary btn-custom">Điểm danh</a>
                <a href="./maqr.php" class="btn btn-primary btn-custom">Mã QR</a>
            <?php } else { ?>
                <span class="text-danger" style="font-size: 40px;">Lớp hiện tại không có sinh viên.</span>
            <?php } ?>
        </div>

        <?php
        if ($student_count > 0) {
            $sql = "SELECT att.attendance_id, att.class_id, att.student_id, att.attendance_date, att.status, att.lydo, stu.fullname 
                    FROM attendances att
                    INNER JOIN student stu ON att.student_id = stu.student_id 
                    WHERE class_id = ? AND stu.fullname LIKE ?";
            $arrParam = [$id, "%" . $search_query . "%"];
            $stm = $conn->prepare($sql);
            $stm->execute($arrParam);
            $data = $stm->fetchAll(PDO::FETCH_OBJ);

            // Create an array of unique attendance dates
            $attendance_dates = [];
            foreach ($data as $item) {
                $attendance_dates[$item->attendance_date] = true;
            }

            // Create an array to store attendance status and student ID for each student
            $student_attendance = [];
            foreach ($data as $item) {
                $student_attendance[$item->fullname]['id'] = $item->student_id;
                $student_attendance[$item->fullname]['class_id'] = $item->class_id;
                $student_attendance[$item->fullname]['attendance'][$item->attendance_date] = [
                    'status' => $item->status,
                    'reason' => $item->lydo
                ];
            }
            ?>

            <form method="GET" class="mb-4">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <input type="hidden" name="idgv" value="<?php echo htmlspecialchars($idgv); ?>">
                <input type="hidden" name="semester_id" value="<?php echo htmlspecialchars($semester_id); ?>">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên sinh viên" value="<?php echo htmlspecialchars($search_query); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                    </div>
                </div>
            </form>

            <?php if (empty($data)) { ?>
                <p class="text-danger">Không có kết quả.</p>
            <?php } else { ?>

                <table class="table table-bordered table-striped table-hover animate__animated animate__zoomIn">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã lớp</th>
                            <th>Mã sinh viên</th>
                            <th>Họ và tên</th>
                            <?php foreach ($attendance_dates as $date => $value) { ?>
                                <th>Ngày <?php echo htmlspecialchars($date); ?></th>
                            <?php } ?>
                            <th>Chuyên cần</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($student_attendance as $name => $details) { 
                            $attended_count = 0;
                            
                            foreach ($attendance_dates as $date => $value) {
                                if (isset($details['attendance'][$date]['status']) && $details['attendance'][$date]['status'] == 'Có mặt') {
                                    $attended_count++;
                                }
                            }
                            $percentage = ($attended_count / count($attendance_dates)) * 100;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($details['class_id']); ?></td>
                                <td><?php echo htmlspecialchars($details['id']); ?></td>
                                <td><?php echo htmlspecialchars($name); ?></td>
                                <?php foreach ($attendance_dates as $date => $value) { 
                                    $status = isset($details['attendance'][$date]['status']) ? $details['attendance'][$date]['status'] : '-';
                                    $reason = isset($details['attendance'][$date]['reason']) ? $details['attendance'][$date]['reason'] : '';
                                ?>
                                    <td class="tooltip-custom">
                                        <?php echo htmlspecialchars($status); ?>
                                        <?php if ($status === 'Vắng có phép' && $reason) { ?>
                                            <span class="tooltiptext">Lý do vắng: <?php echo htmlspecialchars($reason); ?></span>
                                        <?php } ?>
                                    </td>
                                <?php } ?>
                                <td style="color: <?php echo $percentage >= 50 ? 'green' : 'red'; ?>">
                                    <?php echo round($percentage, 2); ?>%
                                    <?php if ($percentage < 50) echo '<span>Báo động</span>'; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        <?php } ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
