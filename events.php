<!DOCTYPE html>
<html>

<head>
    <title>Submit Data for Events</title>
    <link rel="icon" type="image/x-icon" href="images/logo2.ico">
    <link rel="stylesheet" type="text/css" href="css/events.css">
    <link rel="stylesheet" href="css/admin-console.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php include 'components/header.php' ?>
    <?php
    // session_start();
    include("connection.php");
    // $session_username = $_SESSION['session_username'];
    // if ($session_username == true) {

        $getEvents = "SELECT * FROM jobList where id=2";
        $result = $conn->query($getEvents);
        if ($result->num_rows > 0) {
            $Events = $result->fetch_assoc();
            // echo print_r($Events) ;
        }
    // } else {
    //     header('location:login');
    // }
    ?>
    <div class="events-profile">
        <div class="user-profile-display">
            <p><?php echo "Logged in as :" ?> <span class="username"><?php
            //  echo $session_username; 
             ?></span></p>
        </div>
        <div>

            <a href="view_contact_us"><button type="button" name="ContactsData" class="logout" value="Contact Data">Contact Data</button></a>

            <a href="logout.php">
                <button type="button" name="Logout" class="logout" value="Logout">Logout</button>
            </a>
        </div>
    </div>

    <form id="myForm" action="#" method="POST">

        <h1 class="events-heading">Events</h1>

        <div class="card-container">
            <div class="card">
                <!-- <img src="https://source.unsplash.com/random/300x200" alt="random"> -->
                <div class="card-content">
         
                    <p class="form-label">Event Date:</p>
                    <input type="date" id="eventDate1" value="<?php echo $Events['eventDate1']; ?>" name="eventDate1" required>
                    <h2>Event Name:</h2>
                    <input type="text" id="eventName1" name="eventName1" value="<?php echo $Events['eventName1']; ?>" placeholder="eg. Hanuman Jayanti" required />
                    <h2>Event Description:</h2>
                    <input type="text" id="eventDescription1" name="eventDescription1" value="<?php echo $Events['eventDescription1']; ?>" placeholder="eg. 9 Am Yagya and puja..." required>
                </div>
            </div>
        </div>

        <input type="submit" id="submitBtn" name="submitBtn" class="publish-btn" value="Publish" />
    </form>

    <?php
    if (isset($_POST['submitBtn'])) {

        $eventDate1 = $_POST['eventDate1'];
        $eventName1 = $_POST['eventName1'];
        $eventDescription1 = $_POST['eventDescription1'];
        $eventDate2 = $_POST['eventDate2'];
        $eventName2 = $_POST['eventName2'];
        $eventDescription2 = $_POST['eventDescription2'];
        $eventDate3 = $_POST['eventDate3'];
        $eventName3 = $_POST['eventName3'];
        $eventDescription3 = $_POST['eventDescription3'];
        $noticeDate = $_POST['noticeDate'];
        $noticeSubject = $_POST['noticeSubject'];
        $noticeDescription = $_POST['noticeDescription'];



        // $notice = $conn->prepare("INSERT INTO `events` (`id`,`eventDate1`,`eventName1`,`eventDescription1`,`eventDate2`,`eventName2`,`eventDescription2`,`eventDate3`,`eventName3`,`eventDescription3`, `noticeDate`,`noticeSubject`,`noticeDescription`,`updatedBy`) VALUES (NULL, '$eventDate1', '$eventName1','$eventDescription1','$eventDate2', '$eventName2','$eventDescription2','$eventDate3', '$eventName3','$eventDescription3', '$noticeDate','$noticeSubject','$noticeDescription', '$session_username'));

        // $notice = $conn->prepare("update events set eventDate1= '$eventDate1', eventName1= '$eventName1', eventDescription1= '$eventDescription1', eventDate2= '$eventDate2', eventName2= '$eventName2', eventDescription2= '$eventDescription2', eventDate3= '$eventDate3', eventName3= '$eventName3', eventDescription3= '$eventDescription3', noticeDate='$noticeDate', noticeSubject= '$noticeSubject', noticeDescription='$noticeDescription', TIME_STAMP= CURRENT_TIMESTAMP ,updatedBy= '$session_username' where id='2'");
        // $result = $notice->execute();

        $sql = "UPDATE events SET eventDate1= '$eventDate1', eventName1= '$eventName1', eventDescription1= '$eventDescription1', eventDate2= '$eventDate2', eventName2= '$eventName2', eventDescription2= '$eventDescription2', eventDate3= '$eventDate3', eventName3= '$eventName3', eventDescription3= '$eventDescription3', noticeDate='$noticeDate', noticeSubject= '$noticeSubject', noticeDescription='$noticeDescription', TIME_STAMP= CURRENT_TIMESTAMP ,updatedBy= '$session_username' where id='2'";

        if ($conn->query($sql) === TRUE) {
            //   echo "Record updated successfully";
        } else {
            //   echo "Error updating record: " . $conn->error;
        }
        // echo ($result);
    }
    ?>

    <?php include 'components/footer.php' ?>
</body>

</html>