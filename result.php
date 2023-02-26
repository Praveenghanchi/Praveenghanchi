<?php
//Connection 
include 'config.php';

//======= Header =======
include 'header.php';
$class_id = isset($_POST['select_class']) ? $_POST['select_class'] : '';
if (isset($_POST['submit'])) {

    $studentIds = $_POST['student_id'];
    $class = $_POST['class_id'];
    $subjectIds = $_POST['subject_id'];
    $created = date("Y-m-d H:i:s");
    $updated = date("Y-m-d H:i:s");

    $marks = $_POST['marks'];

    for ($i = 0; $i < sizeof($subjectIds); $i++) {
        for ($j = 0; $j < sizeof($studentIds); $j++) {
            $m = $marks[$j][$i];
            $sel_er = "select * from exam_result where student_id='" . $studentIds[$j] . "'
                                                       and subject_id='" . $subjectIds[$i] . "'
                                                       and class_id='" . $class . "' ";
            $exe_er = mysqli_query($conn, $sel_er);
            if (mysqli_num_rows($exe_er) > 0) {
                $fet_er = mysqli_fetch_array($exe_er);
                $upd = "update exam_result set student_id='" . $studentIds[$j] . "',
                                                        subject_id='" . $subjectIds[$i] . "',
                                                        class_id='" . $class . "',
                                                        marks='" . $m . "',
                                                        updated_at='" . $updated . "'
                                                where id='" . $fet_er[0] . "' ";
                $upd_res = mysqli_query($conn, $upd);
                if ($upd_res>0) {
                    echo '<script>alert("Update Successfully.");</script>';
                } else {
                    echo '<script>alert("Update Unsuccessfully.");</script>';
                }
            } else {
             $ins = "insert into exam_result set student_id='" . $studentIds[$j] . "',
                                                        subject_id='" . $subjectIds[$i] . "',
                                                        class_id='" . $class . "',
                                                        marks='" . $m . "',
                                                        created_at='" . $created . "',
                                                        updated_at='" . $updated . "' ";
                $inst_res = mysqli_query($conn, $ins);
                if ($inst_res>0) {
                    echo '<script>alert("Submit Successfully.");</script>';
                } else {
                    echo '<script>alert("Submit Unsuccessfully.");</script>';
                }
            }
        }
    }
}



// ======= Sidebar ======= 
include 'sidebar.php';

?>

<!-- ======= Main ======= -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Create Result</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Result</li>
                <li class="breadcrumb-item active">Create Result</li>
            </ol>
        </nav>
    </div>

    <!-- Form -->
    <section class="section dashboard">
        <div class="row">
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <form  method="POST" action="" id="classForm1">
                        <label for="selector1" class="col-sm-3 control-label">class</label>
                        <div class="col-sm-9">
                            <select onchange="selectClass()" name="select_class" id="selector1" class="form-control">
                                <option disabled selected>Class</option>
                                <?php
                                $sel_class = "select * from class";
                                $exe_class = mysqli_query($conn, $sel_class);
                                if (mysqli_num_rows($exe_class) > 0) {
                                    while ($fet = mysqli_fetch_assoc($exe_class)) {
                                ?>
                                        <option value="<?php echo $fet['cid']; ?>" <?php echo ($class_id == $fet['cid']) ? 'selected' : ''; ?>><?php echo $fet['cname']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                    <form  method="POST" action="">
                        <input type="hidden" name="select_class" value="<?php echo  $class_id ?>" />
                        <input type="hidden" name="class_id" value="<?php echo  $class_id ?>" />
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 250px;">Student</th>
                                    <?php
                                    $as_id = mysqli_query($conn, "select subject_id from assign_sub_mark where class_id = '" . $class_id . "'");
                                    $subjectIds = '0';
                                    if (mysqli_num_rows($as_id) > 0) {
                                        $fet_as_id = mysqli_fetch_array($as_id);
                                        $subjectIds = $fet_as_id[0];
                                    }
                                    $sel_sub = "select * from subjects where sub_id in (" . $subjectIds . ") ";
                                    $exe_sub = mysqli_query($conn, $sel_sub);
                                    if (mysqli_num_rows($exe_sub) > 0) {
                                        while ($fet_sub = mysqli_fetch_array($exe_sub)) {
                                    ?>
                                            <th style="width: 150px;"><?php echo $fet_sub['sub_name']; ?></th>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sel_stu = "select * from students where stu_class='" . $class_id . "'";
                                $exe_stu = mysqli_query($conn, $sel_stu);
                                if (mysqli_num_rows($exe_stu) > 0) {
                                    $i = 0;
                                    while ($fet_stu = mysqli_fetch_assoc($exe_stu)) {

                                ?>
                                        <tr class="active">
                                            <input type="hidden" name="student_id[]" value="<?php echo $fet_stu['stu_id']; ?>" />
                                            <th scope="row"><?php echo $fet_stu['stu_name']; ?></th>

                                            <?php
                                            $as_id = mysqli_query($conn, "select subject_id from assign_sub_mark where class_id = '" . $class_id . "'");
                                            $subjectIds = '0';
                                            if (mysqli_num_rows($as_id) > 0) {
                                                $fet_as_id = mysqli_fetch_array($as_id);
                                                $subjectIds = $fet_as_id[0];
                                            }
                                            $sel_sub = "select * from subjects where sub_id in (" . $subjectIds . ") ";
                                            $exe_sub = mysqli_query($conn, $sel_sub);
                                            if (mysqli_num_rows($exe_sub) > 0) {
                                                $j = 0;
                                                while ($fet_sub = mysqli_fetch_array($exe_sub)) {
                                                    $sel_ex = "select * from exam_result where class_id = '" . $class_id . "' and student_id = '" . $fet_stu['stu_id'] . "' and subject_id='" . $fet_sub['sub_id'] . "' ";
                                                    $exe_ex = mysqli_query($conn, $sel_ex);
                                                    $mObtd = '';
                                                    if (mysqli_num_rows($exe_ex) > 0) {
                                                        $fet_ex = mysqli_fetch_array($exe_ex);
                                                        $mObtd = $fet_ex['marks'];
                                                    }
                                            ?>
                                                    <td>
                                                        <input type="hidden" name="subject_id[<?php echo $j ?>]" value="<?php echo $fet_sub['sub_id']; ?>" />
                                                        <input class="form-control border-1" style="border: 1px solid #999 !important" type="text" name="marks[<?php echo $i; ?>][<?php echo $j ?>]" value='<?php echo $mObtd; ?>' />
                                                    </td>
                                            <?php
                                                    $j++;
                                                }
                                                $i++;
                                            }
                                            ?>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn-success btn" name="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>



</main>
<script>
    function selectClass() {
        $("#classForm1").submit();
    }
</script>
<!-- ======= Footer ======= -->
<?php include 'footer.php' ?>