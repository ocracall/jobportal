<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Temple in Gondia">
  <meta name="keywords" content="Temple, Mandir, Gondia, Gondiya, Gayatri, Gayatri Shaktipeeth, Shaktipeeth, Gayatri Mandir,Gayatri Temple, Shiv Mandir, Shiv Temple">
  <meta name="robots" content="index, follow">
  <title>Sai Rojgar</title>
  <link rel="icon" type="image/x-icon" href="image/sai_rojgar_icon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/login.css" />
  <link rel="stylesheet" href="css/style.css" />
  <script language="JavaScript" type="text/javascript" src="/js/index.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Kumbh+Sans:wght@100..900&family=Mukta:wght@200;300;400;500;600;700;800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poetsen+One&display=swap" rel="stylesheet">
</head>

<body>
<div class="bg-light">
<?php include 'components/header.php' ?>
  <div class="login-form">
    <heading>Login</heading>
    <div class="login-form-space"></div>
    <form action="#" method="POST">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
      <input type="submit" name="login" value="Login">
    </form>
  </div>

  <?php
  include("connection.php");

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $getProfiles = "SELECT * FROM profiles WHERE username='$username' && password='$password'";
    $result = $conn->query($getProfiles);
    $total = $result->num_rows;

    if ($total) {
      session_start();
      $_SESSION['session_username'] = $username;
      header('location:newJob.php');
      // echo $_SESSION['session_username'];
    } else {
      echo "<h1>Retry</h1>";
    }
  }
  ?>

  <?php include 'components/footer.php' ?>
  </div>
</body>

</html>