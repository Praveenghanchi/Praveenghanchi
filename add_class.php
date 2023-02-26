<?php 
//Connection 
include 'config.php';

$cname = $_POST['cname'];

$sql = "INSERT INTO `class` (`cname`) VALUES ('$cname')" ;



if(isset($_POST['submit'])){

    $res = mysqli_query($conn,$sql);

    if($res  > 0){
        echo "<script>alert('Submit Successfully')</script>";
    }
}


//======= Header =======
include 'header.php' ;

// ======= Sidebar ======= 
 include 'sidebar.php'; 
 
 ?>

<!-- ======= Main ======= -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Class</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Class</li>
                <li class="breadcrumb-item active">Add Class</li>
            </ol>
        </nav>
    </div>

    <!-- Form -->
    <section class="section dashboard">
        <div class="row">
            <form action="" method="post">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Class</label>
                    <div class="col-sm-10">
                        <input type="text" name="cname" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">ADD CLASS</button>
                    </div>
                </div>
            </form>
        </div>
    </section>



</main>

<!-- ======= Footer ======= -->
<?php include 'footer.php' ?>