<?php
//Connection 
include 'config.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Student Marksheet - Create & Download Result</title>
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

</head>

<body>

<style>
    th,
    td {
        border: 2px groove black;
    }
</style>
<!-- ======= Main ======= -->
<main>
    <!-- Form -->
    <section class="section dashboard">
        <div class="row">
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">


                    <?php

                    if (isset($_SESSION['roll_no'])) {

                        $sel = "select * from students where stu_rollno = '" . $_SESSION['roll_no'] . "' ";
                        $exe = mysqli_query($conn, $sel);
                        if (mysqli_num_rows($exe) > 0) {
                            $fet = mysqli_fetch_array($exe);
                    ?>
                            <div class="form-group1" >
                                <button class="btn btn-secondary py-0 float-end" onclick="marksheetprnt()"><i class="bi bi-printer"></i> Print Marksheet</button>
                                <div class="col-sm-12" id="result_tb">
                                    <table cellpadding="5px" cellspacing="0" align="center" border="2px">
                                        <tr>
                                            <th colspan="5" style="text-align:center; font-size:30px; font-family:Comic Sans MS;">Student Result</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center"> Name </th>
                                            <th style="text-align:left" colspan="3"><?php echo $fet['stu_name']; ?></th>
                                        </tr>
                                        <tr>
                                            <th width="150" style="text-align:center"> Roll Number </th>
                                            <th style="text-align:left" colspan="3"><?php echo $fet['stu_rollno']; ?></th>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center"> Date of Birth </th>
                                            <th style="text-align:left" colspan="3"><?php echo $fet['stu_dob']; ?></th>
                                        </tr>
                                        <tr>
                                            <?php
                                            $sel_class = "select * from class where cid='" . $fet['stu_class'] . "'";
                                            $exe_class = mysqli_query($conn, $sel_class);
                                            if (mysqli_num_rows($exe_class) > 0) {
                                                $fet_class = mysqli_fetch_array($exe_class);
                                            ?>
                                                <th style="text-align:center"> Class </th>
                                                <th style="text-align:left" colspan="3"><?php echo $fet_class['cname']; ?></th>

                                        </tr>
                                        <tr>
                                            <th colspan="4" style="height: 4px"></th>
                                        </tr>
                                        <tr>
                                            <th width="150" style="text-align:center"> Subject </th><br>
                                            <th width="97" style="text-align:center"> Maximum Marks </th>
                                            <th width="97" style="text-align:center"> Marks obtained </th>
                                            <th width="162" style="text-align:center"> Grade </th>
                                        </tr>
                                        <?php
                                                $sel_ex = "select * from exam_result where student_id='" . $fet[0] . "'";
                                                $exe_ex = mysqli_query($conn, $sel_ex);
                                                $maxMarks = array();
                                                $selectSubjectIds = array();
                                                if (mysqli_num_rows($exe_ex) > 0) {
                                                    $sum = 0;
                                                    $sum_max = 0;
                                                    while ($fet_ex = mysqli_fetch_array($exe_ex)) {



                                                        $sel_sub = "select * from subjects where sub_id='" . $fet_ex['subject_id'] . "'";
                                                        $exe_sub = mysqli_query($conn, $sel_sub);
                                                        $subjectName = '';
                                                        $subId = 0;
                                                        if (mysqli_num_rows($exe_sub) > 0) {
                                                            $fet_sub = mysqli_fetch_array($exe_sub);
                                                            $subjectName = $fet_sub['sub_name'];
                                                            $subId = $fet_sub[0];
                                                        }

                                                        $sel_as = "select * from assign_sub_mark where class_id='" . $fet_ex['class_id'] . "'";
                                                        $exe_as = mysqli_query($conn, $sel_as);
                                                        if (mysqli_num_rows($exe_as) > 0) {
                                                            $fet_as = mysqli_fetch_assoc($exe_as);
                                                            $sum += $fet_ex['marks'];
                                                            $selectSubjectIds = explode(",", $fet_as['subject_id']);
                                                            $maxMarks = explode(",", $fet_as['max_marks']);
                                                        }

                                        ?>

                                                <tr>
                                                    <td style="text-align:center"><?php echo $fet_sub['sub_name']; ?> </td>
                                                    <?php
                                                        $mm = '';
                                                        for ($i = 0; $i < sizeof($selectSubjectIds); $i++) {
                                                            if (in_array($fet_sub['sub_id'], $selectSubjectIds)) {
                                                                if ($fet_ex['subject_id'] == "" || $fet_ex['subject_id'] == null) {
                                                                    $mm = 0;
                                                                } else {
                                                                    $mm = $maxMarks[$i];
                                                                }
                                                            }
                                                        }
                                                        $sum_max += $mm;

                                                    ?>
                                                    <td style="text-align:right; padding-right: 10px; "><?php echo $mm ?> </td>
                                                    <td style="text-align:right; padding-right: 10px;"><?php echo $fet_ex['marks'] ?> </td>
                                                    <td style="text-align:center; ">
                                                        <?php
                                                        $pre = "";
                                                        $marks = (int)$fet_ex['marks'];
                                                        $mmm = (int)$mm;
                                                        if ($mmm != 0) {
                                                            $pre = $marks / $mmm * 100;
                                                        } else {
                                                            $pre = 0;
                                                        }

                                                        if ($pre >= 80 && $pre <= 100) {
                                                            echo "A";
                                                        } else if ($pre >= 60 && $pre <= 80) {
                                                            echo "B";
                                                        } else if ($pre >= 45 && $pre <= 60) {
                                                            echo "C";
                                                        } else if ($pre >= 33 && $pre <= 45) {
                                                            echo "D";
                                                        } else if ($pre < 33) {
                                                            echo "F*";
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>

                                        <?php
                                                    }
                                                }
                                        ?>
                                        <tr>
                                            <th style="text-align:center">Total</th>
                                            <th style="text-align:right; padding-right: 10px; "><?php echo "<b>" . $sum_max . "</b>" ?></th>
                                            <th style="text-align:right; padding-right: 10px;"><?php echo "<b>" . $sum . "</b>" ?></th>
                                            <th style="text-align: center ;">
                                                <?php
                                                $pre_total = "";
                                                $tm = (int)$sum;
                                                $tmm = (int)$sum_max;
                                                if ($tmm != 0) {
                                                    $pre_total = $tm / $tmm * 100;
                                                } else {
                                                    $pre_total = 0;
                                                }

                                                if ($pre_total >= 80 && $pre_total <= 100) {
                                                    echo "$pre_total %   Grade-A";
                                                } else if ($pre_total >= 60 && $pre_total <= 80) {
                                                    echo "$pre_total %   Grade-B";
                                                } else if ($pre_total >= 45 && $pre_total <= 60) {
                                                    echo "$pre_total %   Grade-C";
                                                } else if ($pre_total >= 33 && $pre_total <= 45) {
                                                    echo "$pre_total %   Grade-D";
                                                } else if ($pre_total < 33) {
                                                    echo " $pre_total %  Grade-F";
                                                }
                                                ?>



                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4" style="height: 4px"></th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center;">Result</th>
                                            <th colspan="3" style="text-align: center;">
                                                <?PHP
                                                if ($pre_total >= 75 && $pre_total <= 100) {
                                                    echo "Distinction";
                                                } elseif ($pre_total >= 60 && $pre_total <= 75) {
                                                    echo "1st Division";
                                                } elseif ($pre_total >= 50 && $pre_total <= 60) {
                                                    echo "2nd Division";
                                                } elseif ($pre_total >= 33 && $pre_total <= 50) {
                                                    echo "3rd Division";
                                                } else {
                                                    echo "Fail";
                                                }

                                                ?>
                                            </th>
                                        </tr>
                            <?php
                                            }
                                        }
                                    }

                            ?>

                                    </table>
                                </div>
                            </div>
                </div>
            </div>
        </div>
        <iframe name="print_frame" width="0" height="0" frameborder="2" src="about:blank"></iframe>
    </section>
    <script>
        	 function marksheetprnt() {
         window.frames["print_frame"].document.body.innerHTML = document.getElementById("result_tb").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
       }
    </script>


</main>

<!-- SignOut -->
<div class="position-absolute">
    <form method="post">
      <button class="btn btn-white py-0 my-5" name="logout">
        🔙Back to Login
    </button>
    </form>
    <?php 
    if(isset($_POST['logout'])) {
        session_destroy();
        echo '<script>window.location="admin_login.php"</script>';
        exit();
    } 
    ?>
    </div>

   <!-- ======= Back to Top ======= -->
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
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script type="text/JavaScript" src="assets/js/jQuery.print.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>