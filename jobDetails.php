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

    include 'components/header.php';

    if (isset($_GET['source'])) {
        $source = $_GET['source'];
    } else {
        $source = '';
    }



    ?>

    <div class="wrapper">
        <div class="jobListCardContainer">
            <?php
            $sql = "SELECT * FROM jobList ";
            $getJobList = $conn->query($sql);
            while ($jobDetails = $getJobList->fetch_assoc()) {
            ?>
                <a href="./jobDetails.php?source=<?php echo $jobDetails['id']; ?>" class="card-wrapper">
                    <div class="<?php if ($source == $jobDetails['id']) {
                                    echo "jobListCard Selected";
                                } else {
                                    echo "jobListCard ";
                                } ?>">
                        <div class="flex-view">
                            <div class="imageLogo" style="  background: #d7d7d7;">
                                <img src="<?php echo $jobDetails["jobImage"]; ?>" alt="">
                                <!-- <img src="uploads/dummyLogo1.png" alt=""> -->
                            </div>
                            <div >
                                <p class="Header"><?php echo $jobDetails['jobName'];  ?></p>
                                <p class="tagName"> <?php echo $jobDetails['company']; ?></p>
                            </div>
                        </div>
                        <div style="  display: grid;
                grid-template-columns: auto auto  ; gap: 15px;margin-top:30px">
                            <div class="imageIcon-jobDetails color1">
                                <div class="Icon">
                                    <img src="image/map.png" alt="">
                                </div>
                                <p class="tagName"> <?php echo $jobDetails['jobLocation']; ?></p>
                            </div>

                            <div class="imageIcon-jobDetails color2">
                                <div class="Icon">
                                    <img src="image/distributed.png" alt="">
                                </div>
                                <p class="tagName "> <?php echo $jobDetails['jobType']; ?></p>
                            </div>

                            <div class="imageIcon-jobDetails color3">
                                <div class="Icon">
                                    <img src="image/money.png" alt="">
                                </div>
                                <p class="tagName"> <?php echo $jobDetails['position']; ?></p>
                            </div>

                            <div class="imageIcon-jobDetails color4">
                            <div class="Icon">
                                        <img src="image/experience.png" alt="">
                                    </div>
                                    <p class="tagName"> <?php echo $jobDetails['experienceRequired']; ?></p>
                            </div>

                        </div>



                    </div>
                </a>
            <?php
            }
            ?>
            <div style="margin-right:2vw;"></div>
        </div>

        <div class="detailsCardContainer">
            <span id="sticky-anchor">

            </span>
            <div id="sticky">

                <?php
                $sql = "SELECT * FROM jobList where id=$source";
                $getJobList = $conn->query($sql);
                while ($jobDetails = $getJobList->fetch_assoc()) {
                ?>
                    <div class="detailsCardContent">

                        <div class="JobDescription-CardTop">
                            <div class="flex-view">
                                <div class="imageLogo">
                                    <img src="<?php echo $jobDetails["jobImage"]; ?>" alt="">
                                    <!-- <img src="uploads/dummyLogo1.png" alt=""> -->
                                </div>
                                <div class="block-view">
                                    <p class="Header"><?php echo $jobDetails['jobName'];  ?></p>
                                    <p class="tagName"> <?php echo $jobDetails['company']; ?></p>
                                </div>
                            </div>
                            <div style="  display: grid;
  grid-template-columns: auto auto auto auto; gap: 10px">
                                <div class="imageIcon-jobDetails">
                                    <div class="Icon">
                                        <img src="image/map.png" alt="">
                                    </div>
                                    <p class="tagName"> <?php echo $jobDetails['jobLocation']; ?></p>
                                </div>

                                <div class="imageIcon-jobDetails">
                                    <div class="Icon">
                                        <img src="image/data-center.png" alt="">
                                    </div>
                                    <p class="tagName"> <?php echo $jobDetails['company']; ?></p>
                                </div>

                                <div class="imageIcon-jobDetails">
                                    <div class="Icon">
                                        <img src="image/distributed.png" alt="">
                                    </div>
                                    <p class="tagName"> <?php echo $jobDetails['jobType']; ?></p>
                                </div>

                                <div class="imageIcon-jobDetails">
                                    <div class="Icon">
                                        <img src="image/money.png" alt="">
                                    </div>
                                    <p class="tagName"> <?php echo $jobDetails['jobSalary']; ?></p>
                                </div>

         
                                <div class="imageIcon-jobDetails">
                                    <div class="Icon">
                                        <img src="image/economy.png" alt="">
                                    </div>
                                    <p class="tagName"> <?php echo $jobDetails['jobIndustry']; ?></p>
                                </div>

                                <div class="imageIcon-jobDetails">
                                    <div class="Icon">
                                        <img src="image/experience.png" alt="">
                                    </div>
                                    <p class="tagName"> <?php echo $jobDetails['experienceRequired']; ?></p>
                                </div>

                                <div class="imageIcon-jobDetails">
                                    <div class="Icon">
                                        <img src="image/clock.png" alt="">
                                    </div>
                                    <p class="tagName"> <?php include 'timecalculate.php' ?></p>
                                </div>

                                <div class="imageIcon-jobDetails">
                                    <div class="Icon">
                                        <img src="image/id-card.png" alt="">
                                    </div>
                                    <p class="tagName"> <?php echo $jobDetails['position']; ?></p>
                                </div>

                            </div>
                        </div>

                        <div class="JobDescription-CardMiddle">
                            <div>
                                <p class="JobDescription-CardMiddle-Title"> Job Description</p>
                                <p class="JobDescription-CardMiddle-Description"> <?php echo $jobDetails['jobDescription']; ?></p>
                            </div>

                        </div>


                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php

    include 'components/footer.php'
    ?>

    <script>
        // Start of
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = sessionStorage.getItem('scrollpos');
            if (scrollpos) {
                window.scrollTo(0, scrollpos);
                sessionStorage.removeItem('scrollpos');
            }
        });

        window.addEventListener("beforeunload", function(e) {
            sessionStorage.setItem('scrollpos', window.scrollY);
        });




        // JobDetails Card Stick Start


        function sticky_relocate() {
            const sticky = document.querySelector('#sticky');
            const window_top = window.scrollY;
            const footer_top = document.querySelector('#footer').offsetTop - 40;
            const div_top = document.querySelector('#sticky-anchor').offsetTop;
            const div_height = document.querySelector('#sticky').offsetHeight;
            var padding = 0; // tweak here or get from margins etc

            if (window_top + div_height > footer_top - padding) {
                let negTop = (window_top + div_height - footer_top + padding) * -1;
                if (screen.width > 768) {
                    sticky.style.top = negTop + 'px';
                }
            } else if (window_top > div_top) {
                sticky.classList.add('stick');
                sticky.style.top = 0;
            } else {
                sticky.classList.remove('stick');
            }
        }
        window.addEventListener('scroll', sticky_relocate);

        const staticSidebar = document.querySelector('.static-sidebar');
        const anchorlinks = staticSidebar.querySelectorAll('a[href^="#"]')

        for (const item of anchorlinks) {
            item.addEventListener('click', (e) => {
                const hashval = item.getAttribute('href')
                const target = document.querySelector(hashval)
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                })
                history.pushState(null, null, hashval)
                e.preventDefault()
            })
        };
        // JobDetails Card Stick End

        // Remember scroll location after reload start

        // Remember scroll location after reload end
    </script>
</body>

</html>