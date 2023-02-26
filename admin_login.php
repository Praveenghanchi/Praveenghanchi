<?php
include 'config.php';

if (isset($_POST['result'])) {
  $rollno .= $_POST['stu_rollno'];

  $resqry = "SELECT * FROM students where stu_rollno='" . $rollno . "'";
  $result = mysqli_query($conn, $resqry);
  if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_assoc($result)) {

      session_start();
      $_SESSION['roll_no'] = $row['stu_rollno'];
      header("location:marksheet.php");
    }
  } else {
    echo '<script>alert("Pleace Enter valid Roll No");</script>';
    echo '<script>window.location="admin_login.php"</script>';
  }
}

if (isset($_POST['signin'])) {
  $username = $_POST['username'];
  $password = sha1($_POST['password']);
  
  $sql = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
  $res = mysqli_query($conn, $sql);

  if (mysqli_num_rows($res) == 1) {
    session_start();
    $_SESSION['admin'] = $_POST['username'];
    header('location:index.php');
  } else {
    echo "<script>alert('Incorrect Password!')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    body {
      background-image: url('assets/img/background.jpg');
      background-repeat: no-repeat;
      background-size: 100% 100%;
    }
  </style>
</head>

<body>
  <div id="preloader"></div>
  <main>

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center" style="background: #9A9A9A;border: 20px groove;border-radius: 40px;">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo1.png" alt="">
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <form class="row g-3 needs-validation" method="post">
                  <div class="col-12">
                    <h5 class="card-title text-center pb-0 fs-4">For Student Result Download </h5>
                    <label class="form-label">Student Roll no.</label>
                    <input type="text" name="stu_rollno" class="form-control">
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="result" type="submit">Result</button>
                  </div>
                </form>
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">For Admin Login</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" method="post" novalidate>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="signin" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="admin_register.php">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>

            <div class="credits py-1">
              Designed by <a href="#">R2Logics</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    var loader = document.getElementById('preloader');
    window.addEventListener('load', function() {
      loader.style.display = "none";
    });
  </script>
</body>

</html>