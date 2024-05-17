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
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100..900&family=Mukta:wght@200;300;400;500;600;700;800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poetsen+One&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  include("connection.php");
  // $getEvents = "SELECT * FROM jobList";
  // $result = $conn->query($getEvents);
  

  $sql = "SELECT * FROM jobList";
  $all_product = $conn->query($sql);

  while($Events = $all_product->fetch_assoc()){
      // echo print_r($Events) ;
    // echo ($Events['position']) ;
    // echo "<h1> Heading</h1><br>" ;
  }

  ?>



  <!-- ========== Start about Section ========== -->
  <div class="bg-light">
    <?php include 'components/header.php' ?>
    <section class="section-about">
      <div class="container">
        <p class="section-common-heading">Find Your <span style="font-family:'Poetsen One'; color:#635147">Dream Job</span> Here !</p>
      </div>

      <div class="search">
      <img class="search1" src="./image/magnifying-glass.png" alt="" />
        <input class="search2" placeholder="Type any Job Title Here"/>
        <div class="search3">Search</div>
      </div>

        <p class="section-subheading">Popular search</p>
 

        <main>

       <?php
    $getContactsData = "SELECT * FROM jobList";
    $result = $conn->query($getContactsData);

    while ($contact = $result->fetch_assoc()) {

      ?>
      <div class="card">

               <p class="product_name" ><?php echo $contact['jobName'];  ?></p>
               <p class="price" ><b> <?php echo $contact['company']; ?></b></p>
               <p class="discount"><b> <?php echo $contact['position']; ?></b></p>


        <a class="green-btn full-width" href="./jobDetails.php?source=<?php echo $contact['id']; ?>">Add Post</a>


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