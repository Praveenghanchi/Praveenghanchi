
 <?php
//DB connection
include 'config.php';


$sql = "SELECT * FROM students JOIN class WHERE students.stu_class = class.cid";

$res = mysqli_query($conn,$sql);


 //======= Header ======= 
 include 'header.php'; 


 // ====== Sidebar ========
  include 'sidebar.php'; ?>

 <!-- ======= Main ======= -->
 <main id="main" class="main">

     <div class="pagetitle">
         <h1>Student</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                 <li class="breadcrumb-item">Student</li>
                 <li class="breadcrumb-item active">View Student</li>
             </ol>
         </nav>
     </div>

     <!-- Table -->
     <section class="section dashboard">
         <div class="row">
            <h1>Students List</h1>
         <table class="table table-bordered table-info">
        <thead>
        <th width='80';>Roll No.</th>
        <th>Name</th>
        <th>Class</th>
        <th>Result</th>
        <th>Date of Birth</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
            
            ?>
            <tr>
                <td><?php echo $row['stu_rollno'] ?></td>
                <td><?php echo $row['stu_name'] ?></td>
                <td><?php echo $row['cname'] ?></td>
                <td> <a href="getresult.php?edit=<?php echo $row["stu_rollno"]; ?>">Result</a></td>
                <td><?php echo $row['stu_dob'] ?></td>
                <td width='120'>
                    <a class="mx-2" href='student_edit.php?stu_id=<?php echo $row['stu_id'];?>' ><i class="bi bi-pencil-square"></i></a>
                    <a href='deletestu.php?stu_id=<?php echo $row['stu_id']; ?>'><i class="bi bi-trash3-fill"></i></a>
                </td>
            </tr>
            <?php } } ?>
        </tbody>
    </table>
         </div>
     </section>


 </main>

 <!-- ======= Footer ======= -->
 <?php include 'footer.php' ?>