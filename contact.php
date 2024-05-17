<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>
    <link rel="icon" type="image/x-icon" href="images/logo2.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="css/style.css" />
  <script src="/js/index.js" async defer></script>

  <style>
    footer {
      padding-top: 0;
    }
  </style>
</head>

<body>
  <!-- ========== Start NAVBAR Section ========== -->
  <?php include 'components/header.php' ?>


  <!-- ========== End NAVBAR Section ========== -->

  <!-- ========== Start contact Section ========== -->

  <div class="section-contact">
    <div class="container">
      <h2 class="section-common-heading">Contact Us</h2>
      <p class="section-common-subheading">
        Get in touch with us. We are always here to help you.
      </p>
    </div>

    <div class="container grid grid-two--cols">
      <div class="contact-content">
        <form action="#" method="POST" onpaste="return false;" ondrop="return false;" autocomplete="off">
          <div class="grid grid-two--cols mb-3">
            <div>
              <label for="username">Sender's Name</label>
              <input type="text" name="username" id="username" required autocomplete="off" placeholder="Enter your Name" />
            </div>

            <div>
              <label for="email">enter your email</label>
              <input type="email" name="email" id="email" autocomplete="off" required placeholder="Enter your Email" />
            </div>
          </div>

          <div class="mb-3">
            <label for="subject">subject</label>
            <input type="text" name="subject" id="subject" placeholder="Enter Subject" />
          </div>

          <div class="mb-3">
            <label for="message">message</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your Message"></textarea>
          </div>

          <div>
            <button type="submit" name="messageBtn" class="btn btn-submit">send message</button>
          </div>
        </form>
      </div>

      <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14851.680637643429!2d80.17186769816826!3d21.471649156692532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a2baeaa87cbe0d5%3A0xe4ded73693962db6!2sGayatri%20Mandir!5e0!3m2!1sen!2sin!4v1700976243108!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
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
</body>

</html>