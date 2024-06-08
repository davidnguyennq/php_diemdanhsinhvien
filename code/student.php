<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Classes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php include 'connect.php'?>

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
        $sql = "SELECT stu.fullname , s.subject_name, c.class_name, c.class_id FROM student_classes sc 
        INNER JOIN classes c ON sc.class_id = c.class_id 
        INNER JOIN subjects s ON c.subject_id = s.subject_id 
        INNER JOIN student stu ON sc.student_id = stu.student_id 
        INNER JOIN semesters sem ON c.semester_id = sem.semester_id
        WHERE stu.username = ? AND sem.semester_id = ?";

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

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Mã lớp</th>
                    <th>Tên môn</th>
                    <th>Tên lớp</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data as $item) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($item->class_id) ?></td>
                    <td><?php echo htmlspecialchars($item->subject_name) ?></td>
                    <td><a href="chitietdiemdanh-sv.php?id=<?php echo htmlspecialchars($item->class_id) ?>"><?php echo htmlspecialchars($item->class_name) ?></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <a href="./logout.php" class="btn btn-danger mt-3">Log Out</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
