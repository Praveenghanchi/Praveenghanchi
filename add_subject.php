<?php 
//Connection 
include 'config.php';



if(isset($_POST['submit'])){
    
    $sub_code = $_POST['sub_code'];
    $sub_name = $_POST['sub_name'];
    
    $sql = "INSERT INTO `subjects` (`sub_code`,`sub_name`) VALUES ('$sub_code','$sub_name')" ;
    
    
    
    if(mysqli_query($conn,$sql)  > 0){
        echo "<script>alert('Submit Successfully')</script>";
    }
}


//======= Header =======
include 'header.php'; 

//======= Sidebar =======
 include 'sidebar.php'; 
 
 ?>

<!-- ======= Main ======= -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Subject</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Subject</li>
                <li class="breadcrumb-item active">Add Subject</li>
            </ol>
        </nav>
    </div>

    <!-- Form -->
    <section class="section dashboard">
        <div class="row">
            <form action="#" method="post">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Subject Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="sub_code" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                        <input type="text" name="sub_name" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">ADD SUBJECT</button>
                    </div>
                </div>
            </form>
        </div>
    </section>



</main>

<!-- ======= Footer ======= -->
<?php include 'footer.php' ?>