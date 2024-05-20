
<!DOCTYPE html>
<html>
<head>
<title>List a Job</title>
<link rel="icon" type="image/x-icon" href="image/sai_rojgar_icon.ico">
    <!-- <link rel="stylesheet" type="text/css" href="login.css"> -->
    <link rel="stylesheet" href="css/newJob.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

<?php
    session_start();

    include("connection.php");

    if (isset($_GET['source'])) {
      $source = $_GET['source'];
  } else {
      $source = 2;
  }


    $session_username = $_SESSION['session_username'];
    if ($session_username == true) {
      // echo $session_username ;

      $getJobDetails = "SELECT * FROM jobList where id= $source";
      $result = $conn->query($getJobDetails);
      if ($result->num_rows > 0) {
          $JobDetails = $result->fetch_assoc();
          // echo print_r($Events) ;
      }
        $imageUploadStatus='';
    
    } else {
        header('location:login.php');
    }

    include 'components/header.php';
    ?>


<div class="job-Form-container">
  <div class="title">Edit Job Info</div>
<p><?php $formStatus?></p>
  <form id="myForm" enctype="multipart/form-data" action="#" method="POST">
  <div class="user__details">

      <div class="input__box">
        <span class="details">Job Heading</span>
        <input type="text" name="jobName" id="jobName" value="<?php echo $JobDetails['jobName']; ?>" placeholder="Assistant Manager - Human Resources">
      </div>

      <div class="input__box">
        <span class="details">Company</span>
        <input type="text" name="company" id="company" value="<?php echo $JobDetails['company']; ?>" placeholder="Air India">
      </div>

      <div class="input__box">
        <span class="details">position</span>
        <input type="text" name="position" id="position" value="<?php echo $JobDetails['position']; ?>" placeholder="HR">
      </div>

      <div class="input__box">
        <span class="details">location</span>
        <input type="text" name="jobLocation" id="jobLocation" value="<?php echo $JobDetails['jobLocation']; ?>" placeholder="Delhi">
      </div>

      <div class="input__box">
        <span class="details">Job Type</span>

        <!-- <input type="text" name="jobType" id="jobType" placeholder="Permanent"> -->
          <select  name="jobType" id="jobType" id="cars">
          <option value="<?php echo $JobDetails['jobType']; ?>" selected="selected" hidden="hidden"><?php echo $JobDetails['jobType']; ?></option>
            <option value="Permanent">Permanent</option>
            <option value="Part Time">Part Time</option>
            <option value="Remote">Remote</option>
            <option value="Others">Others</option>
          </select>
      </div>

      <div class="input__box">
        <span class="details">Experience Required</span>
        <input type="text" name="experienceRequired" id="experienceRequired" value="<?php echo $JobDetails['experienceRequired']; ?>" placeholder="2-3 Years">
      </div>

      <div class="input__box">
        <span class="details">Job Description</span>
        <input type="text" name="jobDescription" id="jobDescription" value="<?php echo $JobDetails['jobDescription']; ?>" placeholder="Qualification And Responsibilities">
      </div>

      <div class="input__box">
        <span class="details">Industry</span>
        <input type="text" name="jobIndustry" id="jobIndustry" value="<?php echo $JobDetails['jobIndustry']; ?>" placeholder="IT">
      </div>
<!-- 
      <div class="input__box">
        <span class="details">Skills</span>
        <input type="text" name="jobSkills" id="jobSkills" placeholder="IT">
      </div> -->

      <div class="input__box">
        <span class="details">Order No</span>
        <input type="text" name="orderId" id="orderId" value="<?php echo $JobDetails['orderId']; ?>" placeholder="1">
      </div>

      <div class="input__box">
        <span class="details">Salary</span>
        <input type="text" name="jobSalary" id="jobSalary" value="<?php echo $JobDetails['jobSalary']; ?>" placeholder="50000 ₹/ Month">
      </div>

      <div class="input__box" style="width:100%">
        <span class="details">Job Description</span>
        <textarea name="jobDescription" id="jobDescription" rows="10"  style="width:100%;">value="<?php echo $JobDetails['jobDescription']; ?>"
        </textarea>
      </div>

      <div class="input__box">
        <span class="details"> Change Image:</span>
       

  <input style="margin-left: -15px; " type="file" class="transparent-border" name="fileToUpload" id="fileToUpload" > 
        <p><?php 
        // echo $imageUploadStatus 
        ?></p>

      </div>
  </div>
    <div class="button">
      <input type="submit" id="submitBtn" name="submitBtn" class="publish-btn" value="Publish" />
    </div>

  </form>
</div>

<?php
    if (isset($_POST['submitBtn']) && isset($_POST['jobName']) ) {

      $jobName = $_POST['jobName'];
      $company = $_POST['company'];
      $position = $_POST['position'];
      $jobLocation = $_POST['jobLocation'];
      $jobType = $_POST['jobType'];
      $experienceRequired = $_POST['experienceRequired'];
      $jobDescription = $_POST['jobDescription'];
      $jobPostedDate = date('Y-m-d H:i:s');
      $jobIndustry = $_POST['jobIndustry'];
      $orderId = $_POST['orderId'];
      $jobSalary= $_POST['jobSalary'];
      // $jobSkills= $_POST['jobSkills'];
      $Image = '';



      $target_dir = "./uploads/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $Image= $target_file;
      if(strlen($Image)<9){
        $Image = $JobDetails['jobImage'];
      }
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $imageUploadStatus='';
     
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        // echo $check;
        if($check !== false) {
          $imageUploadStatus= "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          $imageUploadStatus= "File is not an image.";
          $uploadOk = 0;
        }
      }
      
      // Check if file already exists
      if (file_exists($target_file)) {
        $imageUploadStatus= "Sorry, file already exists.";
        $uploadOk = 0;
      }
      
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
        $imageUploadStatus= "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        $imageUploadStatus= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $imageUploadStatus= "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      }

      // $notice  = "INSERT INTO contactform (id, username, email, subject, message)
      // VALUES ('NULL','$username', '$email','$subject','$message')";
  
  // $jobList  = "INSERT INTO jobList(id, jobName, company, position, jobLocation, jobType, experienceRequired, jobPostedDate, jobDescription, jobIndustry, jobSkills, orderId, jobImage, jobSalary) VALUES ('NULL','$JobHeading','$Company','$position','$location','$jobType','$experienceRequired','$date','$jobDescription','$Industry','NULL','$orderNo','$Image', $jobSalary)";


  // $jobList  = "INSERT INTO joblist(id, jobName, company, position, jobLocation, jobType, experienceRequired, jobPostedDate, jobDescription, jobIndustry, jobSkills, orderId, jobImage, jobSalary) VALUES ('NULL','$jobName','$company','$position','$jobLocation','$jobType','$experienceRequired','$jobPostedDate','$jobDescription','$jobIndustry','NULL','$orderId','$Image','$jobSalary')";

  $jobList = "UPDATE joblist SET jobName= '$jobName', company= '$company', jobLocation= '$jobLocation', jobType= '$jobType', experienceRequired= '$experienceRequired', jobPostedDate= '$jobPostedDate', jobDescription= '$jobDescription', jobIndustry= '$jobIndustry', jobSkills= 'NULL', orderId='$orderId', jobImage= '$Image', jobSalary='$jobSalary', TIME_STAMP= CURRENT_TIMESTAMP ,updatedBy= '$session_username' where id='2'";


    if(strlen($jobName)>2){
      // echo strlen($JobHeading);
      if ($conn->query($jobList) === TRUE) {

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          $imageUploadStatus= "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          $Image= "uploads/".htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
          // echo $Image;
          // echo $imageUploadStatus;
        } else {
          $imageUploadStatus= "Sorry, there was an error uploading your file.";
        }

        $formStatus= "New record created successfully";
      } else {
        $formStatus= "Error: " . $sql . "<br>" . $conn->error;
      }

      }
  }
    ?>

</body>
</html>