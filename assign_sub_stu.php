<?php
//Connection 
include 'config.php';

$subject = '';
$student = '';
$class = '';

$class_id = isset($_POST['select_class']) ? $_POST['select_class'] : '';
$subject_id = isset($_POST['select_subject']) ? $_POST['select_subject'] : '';
$student_id = isset($_POST['select_student']) ? $_POST['select_student'] : '';

if (isset($_POST['submit'])) {

    $student = isset($_POST['student_id']) ? $_POST['student_id'] : '';
    $subject = $_POST['subject_id'];
    if ($student == "") {
        $r = "";
    } else {
        $r = implode(",", $student); 
    }
    $class = $_POST['class_id'];
    $created = date('d-m-y H:i:s');
    $updated = date('d-m-y H:i:s');

    $sel_s_s_a = "SELECT * FROM assign_stu_sub where class_id = '" . $class . "' and subject_id='" . $subject . "' ";
    $exe_s_s_a = mysqli_query($conn, $sel_s_s_a);
    if (mysqli_num_rows($exe_s_s_a) > 0) {
        $fet_s_s_a = mysqli_fetch_array($exe_s_s_a);
        $upd = "update assign_stu_sub
                    set student_id='" . $r . "',
                    updated_at='" . $updated . "'
                where id='" . $fet_s_s_a['id'] . "'";
        $res = mysqli_query($conn, $upd);
        if ($res) {
            echo '<script>alert("Assign-Student-Subject update successfully.");</script>';
        } else {
            echo '<script>alert("Assign-Student-Subject update Unsuccessfully.");</script>';
        }
    } else {
        $inst = "INSERT INTO `assign_stu_sub`
        set student_id='" . $r . "',
            class_id='" . $class . "',
            subject_id='" . $subject . "',
            created_at='" . $created . "',
            updated_at='" . $updated . "'";
        $res_inst = mysqli_query($conn, $inst);
        if ($res_inst) {
            echo '<script>alert("Assign-Student-Subject successfully.");</script>';
        } else {
        }
    }
}

//======= Header =======
include 'header.php';

// ======= Sidebar ======= 
include 'sidebar.php';

?>

<!-- ======= Main ======= -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Assign</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Assign</li>
                <li class="breadcrumb-item active">Assign Subject to Subjects</li>
            </ol>
        </nav>
    </div>

    <!-- Form -->
    <section class="section dashboard">
        <div class="row">

            <form class="form-horizontal" id="classForm" method="post">
                <div class="form-group">
                    <label for="selector1" class="col-sm-3 control-label">class</label>
                    <div class="col-sm-9">
                        <select onchange="selectClass()" class="form-control" name="select_class" id="selector1" class="form-control1">
                            <option disabled selected>Class</option>
                            <?php
                            $sel_class = "SELECT * FROM `class`";
                            $exe_class = mysqli_query($conn, $sel_class);
                            if (mysqli_num_rows($exe_class) > 0) {
                                while ($row = mysqli_fetch_assoc($exe_class)) {
                            ?>
                                    <option value="<?php echo $row['cid']; ?>" <?php echo ($class_id == $row['cid']) ? 'selected' : ''; ?>><?php echo $row['cname']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <label for="selector1" class="col-sm-3 control-label">Subject</label>
                    <?php
                    $as_id = mysqli_query($conn, "select subject_id from assign_sub_mark where class_id = '" . $class_id . "'");
                    $subjectIds = '0';
                    if (mysqli_num_rows($as_id) > 0) {
                        $fet_as_id = mysqli_fetch_array($as_id);
                        $subjectIds = $fet_as_id[0];
                    }

                    ?>
                    <div class="col-sm-9">
                        <select onchange="selectClass()" class="form-control" name="select_subject" id="selector1" class="form-control1">
                            <option disabled selected>Subject</option>
                            <?php
                            $sel_sub = "SELECT * FROM subjects where sub_id in (" . $subjectIds . ")";
                            $exe_sub = mysqli_query($conn, $sel_sub);
                            if (mysqli_num_rows($exe_sub) > 0) {
                                while ($row1 = mysqli_fetch_array($exe_sub)) {
                            ?>
                                    <option value="<?php echo $row1['sub_id']; ?>" <?php echo ($subject_id == $row1['sub_id']) ? 'selected' : ''; ?>><?php echo $row1['sub_name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </form>
            <form class="form-horizontal" action="" method="POST">

                <input type="hidden" name="class_id" value="<?php echo $class_id ?>" />
                <input type="hidden" name="subject_id" value="<?php echo $subject_id ?>" />

                <div class="form-group">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 m-5">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Student</th>
                                            <th>Assign</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sel_stu = "SELECT * FROM students WHERE stu_class='" . $class_id . "' AND deleted_at is null";
                                        $exe_stu = mysqli_query($conn, $sel_stu);
                                        if (mysqli_num_rows($exe_stu) > 0) {
                                            $sr = 1;
                                            while ($row3 = mysqli_fetch_assoc($exe_stu)) {
                                        ?>
                                                <tr class="active">
                                                    <th scope="row"><?php echo  $sr++  ?></th>
                                                    <td> <?php echo $row3['stu_name']; ?></td>
                                                    <td>

                                                        <?php
                                                        $checked = false;
                                                        $sel_assign = "SELECT * FROM assign_stu_sub WHERE subject_id='" . $subject_id . "' ";
                                                        $exe_assign = mysqli_query($conn, $sel_assign);

                                                        if (mysqli_num_rows($exe_assign) > 0) {
                                                            $fet_assign = mysqli_fetch_array($exe_assign);
                                                            if (in_array($row3['stu_id'], explode(",", $fet_assign['student_id']))) {
                                                                $checked = true;
                                                            }
                                                        }


                                                        ?>
                                                        <label><input type="checkbox" <?php echo $checked ? "checked" : '' ?> value="<?php echo $row3['stu_id']; ?>" name="student_id[]"></label>

                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-2">
                                        <button class="btn-primary btn" name="submit">Assign</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </section>

</main>

<script>
    function selectClass() {
        $('#classForm').submit();
    }
</script>
<!-- ======= Footer ======= -->
<?php include 'footer.php' ?>