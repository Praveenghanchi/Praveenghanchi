<?php
//Connection 
include 'config.php';
$subject = '';
$max_marks = "";
$class = '';

$class_id = isset($_POST['select_class']) ? $_POST['select_class'] : '';

if (isset($_POST['submit'])) {
    if ($_POST['class_id'] > 0) {
        $subject = $_POST['subject_id'];
        $r = implode(",", $subject);
        $max_marks = $_POST['max_marks'];
        $v = '';
        foreach ($max_marks as $mmark) {

            if ($mmark != '') {
                $v .= $mmark . ",";
            }
        }

        $class = $_POST['class_id'];
        $created = date('d-m-y H:i:s');
        $updated = date('d-m-y H:i:s');

        '<script>alert("Assign-Student-Subject update successfully.");</script>';
        $sel = "SELECT * FROM assign_sub_mark WHERE class_id='" . $class . "'";
        $exe = mysqli_query($conn, $sel);
        if (mysqli_num_rows($exe) > 0) {
            $fet = mysqli_fetch_array($exe);
            $upd = "UPDATE assign_sub_mark
                    SET class_id='" . $class . "',
                    subject_id='" . $r . "',
                    max_marks='" . $v . "',
                    updated_at='" . $updated . "'
                    where id ='" . $fet['id'] . "'";
            $res_upd = mysqli_query($conn, $upd);
            if ($res_upd) {
                echo '<script>alert("Assign-Student-Subject update successfully.");</script>';
            } else {
                echo '<script>alert(" 1. Something Went Wrong. Pleace try again.");</script>';
            }
        } else {
            $inst = "INSERT INTO assign_sub_mark
            set class_id='" . $class . "',
                        subject_id='" . $r . "',
                        max_marks='" . $v . "',
                        created_at='" . $created . "',
                        updated_at='" . $updated . "'";
            $res = mysqli_query($conn, $inst);
            if ($res) {
                echo '<script>alert("Assign-Student-Subject added successfully.");</script>';
            } else {
                echo '<script>alert("Something Went Wrong. Pleace try again.");</script>';
            }
        }
    } else {
        echo '<script>alret("Pleace Select Class ");</script>';
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
                <li class="breadcrumb-item active">Assign Subject to Class</li>
            </ol>
        </nav>
    </div>

    <!-- Form -->
    <section class="section dashboard">
        <div class="row">
            <form action="" id="classForm" method="post">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Class</label>
                    <div class="col-sm-10">

                        <select name="select_class" onchange="selectClass()" class="form-control">
                            <option value="" selected disabled>Select Class</option>
                            <?php
                            $sql1 = "SELECT * FROM `class` ORDER BY `cid` ASC ";

                            $res1 = mysqli_query($conn, $sql1);
                            while ($row = mysqli_fetch_assoc($res1)) {
                            ?>
                                <option value="<?php echo $row['cid']; ?>" <?php echo ($class_id == $row['cid']) ? 'selected' : ''; ?>><?php echo $row['cname']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </form>
            <div class="col-12">
                <form action="" id="classForm" method="post">
                    <input type="hidden" name="class_id" value="<?php echo $class_id ?>" />
                    <div class="row border-bottom my-2">
                        <div class="col-4">
                            <label>Subject</label>
                        </div>
                        <div class="col-4">
                            <label>Assign</label>
                        </div>
                        <div class="col-4">
                            <label>Max Number</label>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $sql1 = "SELECT * FROM `subjects` ORDER BY `sub_id` ASC";

                        $res1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_assoc($res1)) {
                        ?>
                            <div class="col-4">
                                <small><?php echo $row['sub_name'] ?></small>
                            </div>
                            <div class="col-4">
                                <?php
                                $checked = false;
                                $sel_sub_assign = "SELECT * FROM assign_sub_mark WHERE class_id='" . $class_id . "' ";
                                $exe_sub_assign = mysqli_query($conn, $sel_sub_assign);

                                $maxMarks = array();
                                $selectSubjectIds = array();
                                if (mysqli_num_rows($exe_sub_assign) > 0) {
                                    $fet_sub_assign = mysqli_fetch_array($exe_sub_assign);
                                    $selectSubjectIds = explode(",", $fet_sub_assign['subject_id']);
                                    $maxMarks = explode(",", $fet_sub_assign['max_marks']);
                                    if (in_array($row['sub_id'], $selectSubjectIds)) {
                                        $checked = true;
                                    }
                                }


                                ?>
                                <input type="checkbox" name="subject_id[]" <?php echo $checked ? "checked" : '' ?> value="<?php echo $row['sub_id']  ?>" id="">
                            </div>
                            <div class="col-4">
                                <?php


                                $mm = '';
                                for ($i = 0; $i < sizeof($selectSubjectIds); $i++) {
                                    if (in_array($row['sub_id'], $selectSubjectIds)) {
                                        $mm = $maxMarks[$i];
                                    }
                                }
                                ?>
                                <div> <input class="form-control py-0 my-1" type="text" name="max_marks[]" value="<?php echo $mm; ?>">
                                </div>
                            </div>
                        <?php } ?>
                    </div>


                    <input type="submit" class="btn btn-info py-0 px-5" name="submit">
            </div>
            </form>

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