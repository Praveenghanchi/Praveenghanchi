
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
         <h1>Student Result</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                 <li class="breadcrumb-item">Result</li>
                 <li class="breadcrumb-item active">Students Result</li>
             </ol>
         </nav>
     </div>

     <!-- Table -->
     <section class="section dashboard">
         <div class="row">
            <h1>Result List</h1>
         <table class="table table-bordered table-info">
        <thead>
        <th width='80';>Sr.no.</th>
        <th>Name</th>
        <th>Result</th>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
            
            ?>
            <tr>
                <td><?php echo $row['stu_id'] ?></td>
                <td><?php echo $row['stu_name'] ?></td>
                <td> <a href="getresult.php?edit=<?php echo $row["stu_rollno"]; ?>">Result</a></td>
            </tr>
            <?php } } ?>
        </tbody>
    </table>
         </div>
     </section>


 </main>

 <!-- ======= Footer ======= -->
 <?php include 'footer.php' ?>