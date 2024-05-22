<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>
    <link rel="icon" type="image/x-icon" href="images/logo2.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="css/style.css" />
  <script language="JavaScript" type="text/javascript" src="/js/index.js"></script>

  <style>
    footer {
      padding-top: 0;
    }
  </style>
</head>

<body>
<div class="bg-light">
  <!-- ========== Start NAVBAR Section ========== -->
  <?php  
      session_start();
      $session_username =$_SESSION['session_username'] ?? null; 
      // echo $session_username;
    if (isset($session_username)) {
    include 'components/headerAdmin.php';
  } else {
    include 'components/header.php';
  }?>


  <!-- ========== End NAVBAR Section ========== -->

  <!-- ========== Start contact Section ========== -->

  <div class="section-contact">



      <div class="contact-content">
      <label style="margin-bottom: 40px; font-size:18px">Leave a message</label>
        <form action="#" method="POST" onpaste="return false;" ondrop="return false;" autocomplete="off">
          <div class="grid grid-two--cols mb-3">
            <div>
              <label class="contact-label" for="username">Sender's Name</label>
              <input type="text" name="username" id="username" required autocomplete="off" placeholder="Enter your Name" />
            </div>

            <div>
              <label class="contact-label" for="email">enter your email</label>
              <input type="email" name="email" id="email" autocomplete="off" required placeholder="Enter your Email" />
            </div>
          </div>

          <div class="mb-3">
            <label class="contact-label" for="subject">subject</label>
            <input type="text" name="subject" id="subject" placeholder="Enter Subject" />
          </div>

          <div class="mb-3">
            <label class="contact-label" for="message">message</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your Message"></textarea>
          </div>

          <div>

            <input type="submit" id="messageBtn" style="background: #0062FF" name="messageBtn" class="btn btn-submit" value="send message" />

          </div>
        </form>
      </div>

 

  </div>

  <!-- ========== End contact Section ========== -->

  <?php
  include("connection.php");
  if (isset($_POST['messageBtn'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // echo "Button Clicked".$username;

    // $notice = $conn->prepare("INSERT INTO `contactform` ( `id`,`username`,`email`,`subject`,`message`) VALUES ('NULL','$username', '$email','$subject','$message')");
    // $result = $notice->execute();

    $notice  = "INSERT INTO contactform (id, username, email, subject, message)
    VALUES ('NULL','$username', '$email','$subject','$message')";

    if ($conn->query($notice) === TRUE) {
      // echo "New record created successfully";
    } else {
      // echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  ?>
  <!-- ========== Start   FOOTER Section ========== -->

  <?php include 'components/footer.php' ?>
  <!-- ========== End   FOOTER Section ========== -->
  </div>
</body>

</html>