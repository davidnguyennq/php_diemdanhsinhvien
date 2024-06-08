<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes List</title>
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
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s;
        }
        .btn-custom {
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-custom:hover {
            background-color: #007bff;
            transform: translateY(-2px);
        }
        .welcome-message {
            animation: fadeInDown 1s;
        }
        .table-animation {
            animation: zoomIn 1s;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5 animate__animated animate__fadeIn">
        <?php include 'connect.php'; ?>
        <?php
        session_start();
        $u = $_SESSION['username'];

        // Fetch all semesters
        $semesterSql = "SELECT * FROM semesters";
        $semesterStm = $conn->prepare($semesterSql);
        $semesterStm->execute();
        $semesters = $semesterStm->fetchAll(PDO::FETCH_OBJ);

        // Get selected semester ID from the form, default to the first semester if not set
        $selectedSemesterId = $_POST['semester_id'] ?? $semesters[0]->semester_id;

        // Fetch classes for the selected semester
        $sql = "SELECT t.fullname, t.teacher_id, s.subject_name, c.class_id, c.class_name, (SELECT COUNT(*) FROM student_classes sc WHERE sc.class_id = c.class_id) as si_so FROM classes c 
                INNER JOIN subjects s ON c.subject_id = s.subject_id 
                INNER JOIN teacher t ON c.teacher_id = t.teacher_id 
                INNER JOIN semesters sem ON c.semester_id = sem.semester_id 
                WHERE t.username = ? AND sem.semester_id = ?";
        $arrParam = [$u, $selectedSemesterId];
        $stm = $conn->prepare($sql);
        $stm->execute($arrParam);
        $data = $stm->fetchAll(PDO::FETCH_OBJ);

        $welcomeDisplayed = false;
        ?>

        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="semester_id">Chọn học kỳ:</label>
                <select name="semester_id" id="semester_id" class="form-control" onchange="this.form.submit()">
                    <?php foreach($semesters as $semester) { ?>
                        <option value="<?php echo htmlspecialchars($semester->semester_id) ?>"
                            <?php if ($semester->semester_id == $selectedSemesterId) echo 'selected' ?>>
                            <?php echo htmlspecialchars($semester->semester_name) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </form>

        <?php if (!$welcomeDisplayed && !empty($data)) { 
            echo "<h2 class='mb-4 welcome-message'>Welcome, " . htmlspecialchars($data[0]->fullname) . "</h2>";
            $welcomeDisplayed = true;
        } ?>

        <table class="table table-bordered table-striped table-hover table-animation">
            <thead class="thead-dark">
                <tr>
                    <th>Mã lớp</th>
                    <th>Tên môn</th>
                    <th>Tên lớp</th>
                    <th>Sĩ số</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $item) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($item->class_id); ?></td>
                    <td><?php echo htmlspecialchars($item->subject_name); ?></td>
                    <td><a href="./danhsachdiemdanh-gv.php?id=<?php echo htmlspecialchars($item->class_id) ?>&idgv=<?php echo htmlspecialchars($item->teacher_id) ?>&semester_id=<?php echo htmlspecialchars($selectedSemesterId) ?>" class="btn btn-link"><?php echo htmlspecialchars($item->class_name); ?></a></td>
                    <td><?php echo htmlspecialchars($item->si_so); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <a href="./logout.php" class="btn btn-danger mt-3 btn-custom">Log Out</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
