<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- Students -->
    <li class="nav-item">
    <li class="nav-heading">Student</li>
    <a class="nav-link collapsed" data-bs-target="#student-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-lines-fill"></i><span>Student</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="student-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="add_student.php">
          <i class="bi bi-circle"></i><span>Add Students</span>
        </a>
      </li>
      <li>
        <a href="view_student.php">
          <i class="bi bi-circle"></i><span>View Students</span>
        </a>
      </li>
    </ul>
    </li><!-- End Forms Nav -->

    <!-- Class -->
    <li class="nav-item">
    <li class="nav-heading">Class</li>
    <a class="nav-link collapsed" data-bs-target="#class-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Class</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="class-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="add_class.php">
          <i class="bi bi-circle"></i><span>Add Class</span>
        </a>
      </li>
      <li>
        <a href="view_class.php">
          <i class="bi bi-circle"></i><span>View Class</span>
        </a>
      </li>
    </ul>
    </li><!-- End Forms Nav -->

    <!-- Subject -->
    <li class="nav-item">
    <li class="nav-heading">Subject</li>
    <a class="nav-link collapsed" data-bs-target="#subject-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-book"></i><span>Subject</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="subject-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="add_subject.php">
          <i class="bi bi-circle"></i><span>Add Subject</span>
        </a>
      </li>
      <li>
        <a href="view_subject.php">
          <i class="bi bi-circle"></i><span>View Subject</span>
        </a>
      </li>
    </ul>
    </li><!-- End Forms Nav -->

    <!-- Assign -->
    <li class="nav-item">
    <li class="nav-heading">Assign</li>
    <a class="nav-link collapsed" data-bs-target="#assign-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Assign</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="assign-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="assign_sub_class.php">
          <i class="bi bi-circle"></i><span>Assign Class to Subjects</span>
        </a>
      </li>
      <li>
        <a href="assign_sub_stu.php">
          <i class="bi bi-circle"></i><span>Assign Subject to Students</span>
        </a>
      </li>
    </ul>
    </li><!-- End Tables Nav -->

    <!-- Result -->
    <li class="nav-item">
    <li class="nav-heading">Result</li>
    <a class="nav-link collapsed" data-bs-target="#result-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Result</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="result-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="result.php">
          <i class="bi bi-circle"></i><span>Create Result</span>
        </a>
      </li>
      <li>
        <a href="view_result.php">
          <i class="bi bi-circle"></i><span>Students Result</span>
        </a>
      </li>
    </ul>
    </li><!-- End Tables Nav -->



    <!-- Admin -->
    <li class="nav-heading">Admin</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="admin_register.php">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
      </a>
    </li>
    <!-- End Register Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="admin_login.php">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
      </a>
    </li>
    <!-- End Login Page Nav -->
  </ul>

  <!-- SignOut -->
  <div class="position-absolute">
    <form method="post">
      <button class="btn btn-danger py-0 my-5" name="logout">
        Sign Out
      </button>
    </form>
    <?php if (isset($_POST['logout'])) {
      session_destroy();
      header('location:admin_login.php');
    } ?>
    </div>
</aside>