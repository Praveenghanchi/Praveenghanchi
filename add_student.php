 <?php include 'config.php';

    if (isset($_POST['submit'])) {
        $stu_name = $_POST['stu_name'];
        $stu_class = $_POST['stu_class'];
        $stu_dob = $_POST['stu_dob'];
        $stu_rollno = $_POST['stu_rollno'];
        $sql = "INSERT INTO `students` (`stu_name`, `stu_class`, `stu_rollno`, `stu_dob`) VALUES ( '$stu_name', '$stu_class', '$stu_rollno', '$stu_dob')";

        $res = mysqli_query($conn, $sql);

        if ($res > 0) {
            echo "<script>alert('Student Added Successfully ✔')</script>";
        }
    }

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
                 <li class="breadcrumb-item active">Add Student</li>
             </ol>
         </nav>
     </div>

     <!-- Form -->
     <section class="section dashboard">
         <div class="row">
             <form action="" method="post">
                 <div class="row mb-3">
                     <label class="col-sm-2 col-form-label">Name</label>
                     <div class="col-sm-10">
                         <input type="text" name="stu_name" class="form-control">
                     </div>
                 </div>
                 <div class="row mb-3">
                     <label class="col-sm-2 col-form-label">Class</label>
                     <div class="col-sm-10">
                         <!-- <input type="text" name="stu_class" class="form-control"> -->
                         <select name="stu_class" class="form-control">
                             <option value="" selected disabled>Select Class</option>
                             <?php
                                $sql1 = "SELECT * FROM `class` ORDER BY `cid` ASC ";

                                $res1 = mysqli_query($conn, $sql1);
                                while ($row = mysqli_fetch_assoc($res1)) {
                                ?>
                                 <option value="<?php echo $row['cid']; ?>"><?php echo $row['cname']; ?></option>
                             <?php } ?>
                         </select>
                     </div>
                 </div>
                 <div class="row mb-3">
                     <label class="col-sm-2 col-form-label">Date of Birth</label>
                     <div class="col-sm-10">
                         <input type="date" name="stu_dob" class="form-control">
                         <!-- <input type="date" name="stu_dob" class="form-control" placeholder=" date" > -->
                     </div>
                 </div>
                 <div class="row mb-3">
                     <label class="col-sm-2 col-form-label">Roll No.</label>
                     <div class="col-sm-10">
                         <input type="tel" name="stu_rollno" class="form-control">
                     </div>
                 </div>
                 <div class="row mb-3">
                     <div class="col-sm-10">
                         <button type="submit" name="submit" class="btn btn-primary">ADD STUDENT</button>
                     </div>
                 </div>
             </form>
         </div>
     </section>



 </main>

 <!-- ======= Footer ======= -->
 <?php include 'footer.php' ?>