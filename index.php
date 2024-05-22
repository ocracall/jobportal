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
  <link rel="stylesheet" href="css/style.css" />
  <script src="/js/index.js" async defer></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Kumbh+Sans:wght@100..900&family=Mukta:wght@200;300;400;500;600;700;800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poetsen+One&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  include("connection.php");
  // $getEvents = "SELECT * FROM jobList";
  // $result = $conn->query($getEvents);


  $sql = "SELECT * FROM jobList ORDER BY orderId";
  $all_product = $conn->query($sql);

  while ($Events = $all_product->fetch_assoc()) {
    // echo print_r($Events) ;
    // echo ($Events['position']) ;
    // echo "<h1> Heading</h1><br>" ;
  }

  ?>



  <!-- ========== Start about Section ========== -->
  <div class="bg-light">
    <?php
    session_start();

    $session_username = $_SESSION['session_username'] ?? null;
    // echo $session_username;
    if (isset($session_username)) {
      include 'components/headerAdmin.php';
    } else {
      include 'components/header.php';
    }
    ?>
    <section class="section-about">
      <div class="jobindex-container">
        <p class="section-common-heading">Find Your <span style="font-family:'Poetsen One'; color:#635147">Dream Job</span> Here !</p>
      </div>

      <form id="searchForm" action="#" method="POST">
        <div class="search">
          <img class="search1" src="./image/magnifying-glass.png" alt="" />
          <input class="search2" name="searchText" id="searchText" placeholder="Type any Job Title Here" />
          <!-- <div id="searchBtn" name="searchBtn"  class="search3">Search</div> -->
          <input type="submit" id="searchBtn" name="searchBtn" class="search3" value="Search" />

        </div>
      </form>

      <p class="section-subheading">Popular search</p>


      <main>

        <?php


        $getContactsData = "SELECT * FROM jobList";
        $result = $conn->query($getContactsData);

        if (isset($_POST['searchBtn']) && isset($_POST['searchText'])) {
          // echo $_POST['jobSalary'];
          $searchText = $_POST['searchText'];
          $getSearchData = "SELECT * FROM jobList WHERE jobName LIKE '$searchText%'";
          $result = $conn->query($getSearchData);
        }

        while ($jobDetails = $result->fetch_assoc()) {

        ?>
          <div class="card">


            <div class="index-flex-view">
              <div class="index-imageLogo">
                <img src="<?php echo $jobDetails["jobImage"]; ?>" alt="">
                <!-- <img src="uploads/dummyLogo1.png" alt=""> -->
              </div>
              <div class="index-block-view">
                <p><?php echo $jobDetails['jobName'];  ?></p>
                <p> <?php echo $jobDetails['company']; ?></p>
              </div>
              <div style="width:20%">

                <button type="submit" style="border: 0; background: transparent; cursor:pointer">
                  <img onclick="copyText(<?php echo $jobDetails['id']; ?>)" src="./image/copy.png" width="20" height="20" alt="submit" />

                  <div id="snackbar">Copied Link !!</div>
                </button>
              </div>
            </div>

            <div style="  display: grid;
  grid-template-columns: auto auto auto ; gap: 15px;margin-top:30px; padding: 0 2%">
              <div class="imageIcon colorPlain">
                <div class="Icon">
                  <img src="image/economy.png" alt="">
                </div>
                <p class="tagName"> <?php echo $jobDetails['jobIndustry']; ?></p>
              </div>


              <div class="imageIcon colorPlain">
                <div class="Icon">
                  <img src="image/experience.png" alt="">
                </div>
                <p class="tagName"> <?php echo $jobDetails['experienceRequired']; ?></p>
              </div>

              <div class="imageIcon colorPlain">
                <div class="Icon">
                  <img src="image/id-card.png" alt="">
                </div>
                <p class="tagName"> <?php echo $jobDetails['position']; ?></p>
              </div>


              <div class="imageIcon color1">
                <div class="Icon">
                  <img src="image/map.png" alt="">
                </div>
                <p class="tagName"> <?php echo $jobDetails['jobLocation']; ?></p>
              </div>

              <div class="imageIcon color2">
                <div class="Icon">
                  <img src="image/clock.png" alt="">
                </div>
                <p class="tagName"> <?php include 'timecalculate.php' ?></p>
              </div>

              <div class="imageIcon color3">
                <div class="Icon">
                  <img src="image/data-center.png" alt="">
                </div>
                <p class="tagName"> <?php echo $jobDetails['company']; ?></p>
              </div>
            </div>

            <a class="green-btn full-width" href="./jobDetails.php?source=<?php echo $jobDetails['id']; ?>">Read More</a>


          </div>
        <?php
        }
        ?>

      </main>

      <!-- ========== Start about Section ========== -->

      <!-- ========== End   FOOTER Section ========== -->
      <?php include 'components/footer.php' ?>
      <!-- ========== End   FOOTER Section ========== -->
</body>

</html>