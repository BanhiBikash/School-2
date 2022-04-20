<?php
require_once('config.php');
date_default_timezone_set('Asia/Kolkata');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css ">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css ">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Home</title>
</head>

<body>
    <!-- header -->
    <?php include('header.html') ?>

    <!-- banner -->
    <?php include('banner.html') ?>

    <!-- land div -->
    <div id="lander">
        <img src="img/Principal.jpg" alt="">

        <div id="principal">
            <h1>Words of the Principal</h1>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
    <!-- land div end -->

<center>
    <!-- notice board -->
    <div id="notice-container">
        <h2>Notice</h2>
        <div class="notice-content">
            <?php
            $sql = "select * from tbl_notice ORDER BY `created_date`";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($query)) {
                //show the notice if not hidden and display date has reached and not expired && date("Y-m-d H-i-s") <= $row['end_date']
                if (date("Y-m-d H-i-s") >= $row['display_date'] && $row['hide'] == '0' && $row['reviewed'] == '1') {
            ?>
                    <div class="notice">
                        <p class="headline"><?php echo $row['headline']; ?></p>
                        <p><?php echo $row['content']; ?></p>
                        <a class="docs" target="_blank" href="download.php?k=<?php echo $row['file'] ?>"><img src="img/docs.png" alt="docs icon"></a>
                        <p class="date"><?php echo 'Date:' . date("d-m-Y", strtotime($row['display_date'])); ?></p>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    <!-- notice board end-->
</center>
    <!-- achieve start -->
    <div id="achieve">
        <h1>OUR ACHIVERS</h1>


        <div class="list-container">
            <div class="arrow" id="left-arrow"><</div>
                    <ul id="autoWidth" class="cs-hidden">
                        <li class="item">
                            <div class="box">
                                <!-- img-box -->
                                <div class="slide-img">
                                    <img src="img/pic1.png" alt="1">
                                </div>
                                <!-- detail-box -->
                                <div class="detail">
                                    <div class="name">
                                        <h3>Ramesh :<span> 2022 Topper</span> </h3>

                                        <h4>Lorem ipsum dolor sit amet.</h4>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="box">
                                <!-- img-box -->
                                <div class="slide-img">
                                    <img src="img/pic2.png" alt="2">
                                </div>
                                <!-- detail-box -->
                                <div class="detail">
                                    <div class="name">
                                        <h3>Ramesh :<span> 2022 Topper</span> </h3>

                                        <h4>Lorem ipsum dolor sit amet.</h4>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="box">
                                <!-- img-box -->
                                <div class="slide-img">
                                    <img src="img/pic3.png" alt="3">
                                </div>
                                <!-- detail-box -->
                                <div class="detail">
                                    <div class="name">
                                        <h3>Ramesh :<span> 2022 Topper</span> </h3>

                                        <h4>Lorem ipsum dolor sit amet.</h4>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="box">
                                <!-- img-box -->
                                <div class="slide-img">
                                    <img src="img/pic2.png" alt="4">
                                </div>
                                <!-- detail-box -->
                                <div class="detail">
                                    <div class="name">
                                        <h3>Ramesh :<span> 2022 Topper</span> </h3>

                                        <h4>Lorem ipsum dolor sit amet.</h4>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="box">
                                <!-- img-box -->
                                <div class="slide-img">
                                    <img src="img/pic5.png" alt="5">
                                </div>
                                <!-- detail-box -->
                                <div class="detail">
                                    <div class="name">
                                        <h3>Ramesh :<span> 2022 Topper</span> </h3>

                                        <h4>Lorem ipsum dolor sit amet.</h4>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="box">
                                <!-- img-box -->
                                <div class="slide-img">
                                    <img src="img/pic6.png" alt="6">
                                </div>
                                <!-- detail-box -->
                                <div class="detail">
                                    <div class="name">
                                        <h3>Ramesh :<span> 2022 Topper</span> </h3>

                                        <h4>Lorem ipsum dolor sit amet.</h4>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="box">
                                <!-- img-box -->
                                <div class="slide-img">
                                    <img src="img/pic7.png" alt="7">
                                </div>
                                <!-- detail-box -->
                                <div class="detail">
                                    <div class="name">
                                        <h3>Ramesh :<span> 2022 Topper</span> </h3>

                                        <h4>Lorem ipsum dolor sit amet.</h4>
                                    </div>

                                </div>
                            </div>
                        </li>

                    </ul>
                    <div class="arrow" id="right-arrow">></div>
            </div>

        </div>
    </div>
    <!-- achieve end -->

    <!-- vision start -->

    <div id="vision">
        <h1>OUR MISSION</h1>

        <div id="autoWidth" class="cs-hidden">
            <div class="box">
                <!-- img-box -->
                <div class="slide-img">
                    <img src="http://mitracomputers.com/assets/img/values-1.png" alt="1">
                </div>
                <!-- heading -->
                <h2 class="detail-head">Discipline</h2>
                <!-- detail-box -->
                <div class="detail">
                    <p>Discipline is the bridge between your goals and accomplishment.</p>
                </div>
            </div>
            <div class="box">
                <!-- img-box -->
                <div class="slide-img">
                    <img src="http://mitracomputers.com/assets/img/values-2.png" alt="1">
                </div>
                <!-- heading -->
                <h2 class="detail-head">Punctuality</h2>
                <!-- detail-box -->
                <div class="detail">
                    <p>Those who don't value time will most likely won't value others.</p>
                </div>
            </div>
            <div class="box">
                <!-- img-box -->
                <div class="slide-img">
                    <img src="http://mitracomputers.com/assets/img/values-3.png" alt="1">
                </div>
                <!-- heading -->
                <h2 class="detail-head">Smart work</h2>
                <!-- detail-box -->
                <div class="detail">
                    <p>Remember that most successful and men work smart, not hard. </p>
                </div>
            </div>
            <div class="box">
                <!-- img-box -->
                <div class="slide-img">
                    <img src="http://mitracomputers.com/assets/img/values-3.png" alt="1">
                </div>
                <!-- heading -->
                <h2 class="detail-head">Social Ethics</h2>
                <!-- detail-box -->
                <div class="detail">
                    <p>A man without ethics is a wild beast loosed upon this world.</p>
                </div>
            </div>
        </div>
    </div>
    <!--  vision end  -->


    <!-- about start -->
    <div id="about">
            <h1>OUR FACILITIES</h1>

            <div id="container">
                <img class="pics" src="img/[GetPaidStock.com]-625d566f98635.jpg" alt="" class="slides">
                <img class="pics" src="img/[GetPaidStock.com]-625d56ec15e5e.jpg" alt="" class="slides">
                <img class="pics" src="img/[GetPaidStock.com]-625d5739a65bb.jpg" alt="" class="slides">
            </div>
    </div>
    <!-- about end -->


    <!-- contact -->
    <div id="contact">
        <h1>Contact Us</h1>

        <div id="container">
            <!-- map -->
            <div id="googlemap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3631.1360360013687!2d86.68822231494738!3d24.48074298423444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f13d8f69fd117b%3A0xe1b6df389bf699b3!2sMCIT!5e0!3m2!1sen!2sin!4v1639472028566!5m2!1sen!2sin" loading="lazy"></iframe>
            </div>

            <!-- form -->
            <form class="my-form">
                <div class="form-group">
                    <label for="form-name">Name</label>
                    <input type="email" class="form-control" id="form-name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="form-email">Email Address</label>
                    <input type="email" class="form-control" id="form-email" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label for="form-message">Email your Message</label>
                    <textarea class="form-control" id="form-message" placeholder="Message"></textarea>
                </div>
                <button class="btn btn-secondary" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <!-- contact end -->

    <!-- footer -->
    <?php include('footer.php') ?>
</body>
<script src="js/index.js"></script>
<script>
    const pictures = document.getElementsByClassName('pics');
    let i=0;

    function change()
    {
        //stop displaying the current change
        pictures[i].style.display="none";

        if(i==(pictures.length-1))
        i=0;

        else
        i++;

        pictures[i].style.display="block";

        setTimeout(change,2000)
    }

    pictures[i].style.display="block";
    setTimeout(change,2000)
</script>
</html>