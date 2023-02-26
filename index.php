<?php
# db connection
include 'config.php';

//======= Header =======
include 'header.php';

//======= Sidebar ======= 
include 'sidebar.php';
?>


<!-- ======= Main ======= -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <!-- Info boxes -->
  <?php //if($_SESSION['login_type'] == 1): 
  ?>
  <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
      <a href="view_student.php">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="bi bi-person-lines-fill"></i></span>

          <div class="info-box-content dsc">
            <span class="info-box-text">Total Students</span>
            <span class="info-box-number">
              <?php echo $conn->query("SELECT * FROM students")->num_rows; ?>
            </span>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <a href="view_class.php">
        <div class="info-box">
          <span class="info-box-icon bg-secondary elevation-1"><i class="bi bi-journal-text"></i></span>
          <div class="info-box-content dsc">
            <span class="info-box-text">Total Classes</span>
            <span class="info-box-number">
              <?php echo $conn->query("SELECT * FROM class")->num_rows; ?>
            </span>
          </div>
        </div>
      </a>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <a href="view_subject.php">
        <div class="info-box">
          <span class="info-box-icon bg-success elevation-1"><i class="bi bi-book"></i></span>
          <div class="info-box-content dsc">
            <span class="info-box-text">Total Subject</span>
            <span class="info-box-number">
              <?php echo $conn->query("SELECT * FROM subjects")->num_rows; ?>
            </span>
          </div>
        </div>
      </a>
    </div>
  </div>



  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">


          Reports
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Chart</h5>

                <!-- Pie Chart -->
                <canvas id="pieChart" style="max-height: 400px;"></canvas>
                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#pieChart'), {
                      type: 'pie',
                      data: {
                        labels: [
                          'Student',
                          'Class',
                          'Subject'
                        ],
                        datasets: [{
                          label: 'My First Dataset',
                          data: [
                            <?php echo $conn->query("SELECT * FROM students")->num_rows; ?>,
                            <?php echo $conn->query("SELECT * FROM class")->num_rows; ?>,
                            <?php echo $conn->query("SELECT * FROM subjects")->num_rows; ?>
                          ],
                          backgroundColor: [
                            'rgb(13,202,240)',
                            'rgb(108,117,125)',
                            'rgb(25,135,84)'
                          ],
                          hoverOffset: 4
                        }]
                      }
                    });
                  });
                </script>
                <!-- End Pie CHart -->
              </div>

            </div>
          </div><!-- End Reports -->



        </div>
      </div>

      <!-- Right side columns -->
      <div class="col-lg-4">
        <!-- Traffic -->
        <div class="card">


          <div class="card-body pb-0">
            <h5 class="card-title">Traffic Chart</h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: '',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '30',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: <?php echo $conn->query("SELECT * FROM students")->num_rows; ?>,
                        name: 'Student'
                      },
                      {
                        value: <?php echo $conn->query("SELECT * FROM class")->num_rows; ?>,
                        name: 'Class'
                      },
                      {
                        value: <?php echo $conn->query("SELECT * FROM subjects")->num_rows; ?>,
                        name: 'Subject'
                      },
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->
      </div>
  </section>

</main>

<!-- ======= Footer ======= -->
<?php include 'footer.php' ?>