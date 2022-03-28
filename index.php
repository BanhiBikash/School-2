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
    <title>Home</title>
</head>
<body>
    <!-- header -->
    
    <!-- land div -->
    <div style="background-image:url('img/land.jpg');" id="lander">

    <div id="principal">
        <img src="img/Principal.jpg" alt="">

        <h1>Words of the Principal</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>

    <!-- notice board -->
    <div class="notice-container">
        <h2>Notice</h2>
        <div class="notice-content">                    
            <?php
            $sql = "select * from tbl_notice ORDER BY `created_date`";
            $query = mysqli_query($conn,$sql);
            
            while($row = mysqli_fetch_assoc($query)){
                
                //show the notice if not hidden and display date has reached and not expired
                if(date("Y-m-d H-i-s")>=$row['display_date'] && date("Y-m-d H-i-s")<=$row['end_date'] && $row['hide']=='0' && $row['reviewed']=='1')
                {
            ?>
            <div class="notice">
                <p class="headline" ><?php echo $row['headline'];?></p>
                <p><?php echo $row['content'];?></p>
                <a class="docs" target="_blank" href="download.php?k=<?php echo $row['file'] ?>"><img src="img/docs.png" alt="docs icon"></a>
                <p class="date"><?php echo 'Date:'.date("d-m-Y",strtotime($row['display_date'])); ?></p>
            </div>        
            <?php } }?>
        </div>
    </div>
    <!-- notice board end-->
    </div>
    <!-- land div end -->

   
    <div id="about">
        <div id="checklist">
        <h1>GET TO KNOW US</h1>
        <p><i class="fa-solid fa-check"></i>Founded in _ _ _ _.</p>
        <p><i class="fa-solid fa-check"></i> Affilated.</p>
        <p><i class="fa-solid fa-check"></i> Qualified Teachers. </p>
        <p><i class="fa-solid fa-check"></i> Practical Labs, Library, Playground, etc.</p>
        <p><i class="fa-solid fa-check"></i> Varsity Sports.</p>
        <p><i class="fa-solid fa-check"></i> Seperate Property.</p>
        </div>

        <img src="img/land.jpg" alt="pic" id="pic">
    </div>

    <!-- footer -->
</body>
<script src="js/index.js"></script>
</html>