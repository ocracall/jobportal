
<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>List a Job</title>
<link rel="icon" type="image/x-icon" href="image/sai_rojgar_icon.ico">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="css/newJob.css" />
</head>

<body>
<ul>
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ul>  
<?php
    // session_start();
    include("connection.php");
    // $session_username = $_SESSION['session_username'];
    // if ($session_username == true) {

        $getEvents = "SELECT * FROM jobList";
        $result = $conn->query($getEvents);
        if ($result->num_rows > 0) {
            $Events = $result->fetch_assoc();
            // echo print_r($Events) ;
        }
    // } else {
    //     header('location:login');
    // }
    ?>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<div class="container">
  <div class="title">Registration</div>

  <form id="myForm" action="#" method="POST">
  <div class="user__details">

      <div class="input__box">
        <span class="details">Job Heading</span>
        <input type="text" name="JobHeading" id="JobHeading" placeholder="Assistant Manager - Human Resources">
      </div>

      <div class="input__box">
        <span class="details">Company</span>
        <input type="text" name="Company" id="Company" placeholder="Adani Ports">
      </div>

      <div class="input__box">
        <span class="details">position</span>
        <input type="text" name="position" id="position" placeholder="HR">
      </div>

      <div class="input__box">
        <span class="details">location</span>
        <input type="text" name="location" id="location" placeholder="Delhi">
      </div>

      <div class="input__box">
        <span class="details">Job Type</span>
        <!-- <input type="text" name="jobType" id="jobType" placeholder="Permanent"> -->
          <select  name="jobType" id="jobType" id="cars">
            <option value="Permanent">Permanent</option>
            <option value="Part Time">Part Time</option>
            <option value="Remote">Remote</option>
            <option value="Others">Others</option>
          </select>
      </div>

      <div class="input__box">
        <span class="details">Experience Required</span>
        <input type="text" name="experienceRequired" id="experienceRequired" placeholder="2-3 Years">
      </div>

      <div class="input__box">
        <span class="details">Job Description</span>
        <input type="text" name="jobDescription" id="jobDescription" placeholder="Qualification And Responsibilities">
      </div>

      <div class="input__box">
        <span class="details">Industry</span>
        <input type="text" name="Industry" id="Industry" placeholder="IT">
      </div>

      <div class="input__box">
        <span class="details">Order No</span>
        <input type="text" name="orderNo" id="orderNo" placeholder="1">
      </div>

      <div class="input__box">
        <span class="details">Salary</span>
        <input type="date" name="jobSalary" id="jobSalary" placeholder="50000 ₹/ Month">
      </div>

      <div class="input__box" style="width:100%">
        <span class="details">Job Description</span>
        <textarea name="jobDescription" id="jobDescription" rows="10"  style="width:100%;">
        </textarea>
      </div>

      <div class="input__box">
        <span class="details">Image</span>
        <input type="file" class="transparent-border" name="Image" id="Image" placeholder="Adani Ports">
      </div>
  </div>
    <div class="button">
      <input type="submit" id="submitBtn" name="submitBtn" class="publish-btn" value="Publish" />
    </div>

  </form>
</div>

<?php
    if (isset($_POST['submitBtn'])) {
echo $_POST['jobSalary'];
      $JobHeading = $_POST['JobHeading'];
      $Company = $_POST['Company'];
      $position = $_POST['position'];
      $location = $_POST['location'];
      $jobType = $_POST['jobType'];
      $experienceRequired = $_POST['experienceRequired'];
      $jobDescription = $_POST['jobDescription'];
      $date = date('Y-m-d H:i:s');
      $Industry = $_POST['Industry'];
      $orderNo = $_POST['orderNo'];
      $Image = $_POST['Image'];

      // $notice  = "INSERT INTO contactform (id, username, email, subject, message)
      // VALUES ('NULL','$username', '$email','$subject','$message')";
  
  $jobList  = "INSERT INTO jobList(id, jobName, company, position, jobLocation, jobType, experienceRequired, jobPostedDate, jobDescription, industry, Skills, orderId, jobImage) VALUES ('NULL','$JobHeading','$Company','$position','$location','$jobType','$experienceRequired','$date','$jobDescription','$Industry','NULL','$orderNo','$Image')";

  if(strlen($JobHeading)>2){
    echo strlen($JobHeading);
      if ($conn->query($jobList) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    }
  }
    ?>

</body>
</html>