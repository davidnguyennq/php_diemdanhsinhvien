<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Optional CSS for custom styling */
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 100px;
        }
        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Đăng nhập</h1>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars($_GET['error']); ?>
                        </div>
                        <?php } ?>
                        <form id="loginForm" action="login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="toggle-password">Hiện</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="isTeacher" id="isTeacher">
                                <label class="form-check-label" for="isTeacher">Giáo viên</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('toggle-password').addEventListener('click', function () {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.textContent = 'Ẩn';
            } else {
                passwordInput.type = 'password';
                this.textContent = 'Hiện';
            }
        });

        // Listen for "Enter" key press
        document.getElementById("loginForm").addEventListener("keypress", function(event) {
            if (event.keyCode === 13) { // 13 is the Enter key
                event.preventDefault(); // Prevent form submission
                document.getElementById("loginForm").submit(); // Submit the form
            }
        });
    </script>
</body>
</html>
