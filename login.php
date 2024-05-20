
<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
  <link rel="icon" type="image/x-icon" href="images/logo2.ico">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php include 'components/header.php' ?>
    <div class="login-form">
        <h2>Login</h2>
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

  if(isset($_POST['login']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $getProfiles = "SELECT * FROM profiles WHERE username='$username' && password='$password'";
    $result = $conn->query($getProfiles);
    $total= $result->num_rows;

    if($total){
        $_SESSION['session_username'] = $username;
        header('location:newJob.php');
    }else{
        echo "<h1>Retry</h1>";
    }
  }
?>
    
    <?php include 'components/footer.php' ?>

</body>
</html>