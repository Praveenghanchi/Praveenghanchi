<?php include 'config.php';

$stu_id = $_GET['stu_id'];


$sql1 = "SELECT * FROM `students` WHERE stu_id = {$stu_id}";

$res1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($res1) > 0) {

?>



    <!-- ======= Header ======= -->
    <?php include 'header.php'; ?>

    <!-- ======= Sidebar ======= -->
    <?php include 'sidebar.php'; ?>

    <!-- ======= Main ======= -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Student</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Student</li>
                    <li class="breadcrumb-item active">Edit Student</li>
                </ol>
            </nav>
        </div>

        <!-- Form -->
        <section class="section dashboard">
            <div class="row">
                <?php

                $row = mysqli_fetch_array($res1);
                $date = date("Y-m-d", (int)$row['stu_dob']);

                ?>
                <form action="updatestudent.php" method="post">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="hidden" value="<?php echo $row['stu_id']; ?>" name="stu_id" class="form-control">
                            <input type="text" value="<?php echo $row['stu_name']; ?>" name="stu_name" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Class</label>
                        <div class="col-sm-10">
                        <select name="stu_class" class="form-control">
                            <?php
                            $sql2 = "SELECT * FROM `class` ORDER BY `cid` ASC ";

                            $res2 = mysqli_query($conn, $sql2);
                            while ($classRow = mysqli_fetch_assoc($res2)) {
                            ?>
                                <option name="stu_class" value="<?php echo $classRow['cid']; ?>" <?php if ($classRow['cid'] === $row['stu_class']) { ?> selected="selected" <?php } ?> ;?><?php echo $classRow['cname'] ?></option>
                            <?php
                            }
                            ?>

                        </select>
                        </div>
                    </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-10">
                    <input type="date" value="<?php echo $date; ?>" name="stu_dob" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Roll No.</label>
                <div class="col-sm-10">
                    <input type="tel" value="<?php echo $row['stu_rollno']; ?>" name="stu_rollno" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Save Edit</button>
                </div>
            </div>
            </form>
        <?php } ?>
        </div>
        </section>



    </main>

    <!-- ======= Footer ======= -->
    <?php include 'footer.php' ?>