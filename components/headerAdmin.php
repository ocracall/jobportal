
<header id="header" class="section-navbar">
    <div class="container">
      <div class="navbar-brand">
        <a  href="index">
          <img src="./image/sai_rojgar_logo_5.png" alt="" />
        </a>
      </div>

      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a style="font-weight:800; color:#fd9999;margin-bottom:10px" href="#">Hello <?php echo $_SESSION['session_username']?></a>
        <a  style="margin-left:20px" href="document.location.href='./../index.php">Job</a>
        <a style="margin-left:20px" href="document.location.href='./../newJob.php">New Post</a>
        <a style="margin-left:20px" href="document.location.href='./../editJob.php">Edit Post</a>
        <a style="margin-left:20px" href="document.location.href='./../index.php">Company</a>
        <a style="margin-left:20px" href="document.location.href='./../contact.php">Contact</a>
        <a style="margin-left:20px" href="document.location.href='./../logout.php">Logout</a>
      </div>



      <nav class="navbar">

        <ul>
          <li class="nav-item">
            <a class="nav-link" href="document.location.href='./../../index"> Job </a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="document.location.href='./../newJob.php"> New Post </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="document.location.href='./../editJob.php"> Edit Post </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="document.location.href='./../../donation"> Company </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="document.location.href='./../ViewContactData.php"> contact </a>
          </li>
          <li class="nav-item">
            <a class="nav-link login" href="document.location.href='./../logout.php"> Logout </a>
          </li>
        </ul>
      </nav>
      <div id="hamburger" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</div>
    </div>
  </header>

 