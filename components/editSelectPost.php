

<p class="section-subheading">Select Post to Edit</p><main>

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
<div>
<button type="submit" style="float:right; border: 0; background: transparent; cursor:pointer">
  <img onclick="copyText(<?php echo $jobDetails['id']; ?>)" src="./image/copy.png" width="20" height="20" alt="submit" />

  <div id="snackbar">Copied Link !!</div>
</button>
</div>
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

    <a class="pink-btn full-width" href="./editJob.php?source=<?php echo $jobDetails['id']; ?>">Edit Post</a>


  </div>
<?php
}
?>

</main>
