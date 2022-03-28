<?php
    //importing connection  
    require_once('config.php');

    date_default_timezone_set('Asia/Kolkata');
    $date=date('Y-m-d');
    $time=date('H:i');
    // echo $date.'T'.$time;

    //varibles for data
    $display=$end=$submit=$notice=$link=$head=$file=$hide=$urgent=$review=$result='';

    //varibles for data error
    $display_err=$end_err=$submit_err=$notice_err=$link_err=$head_err=$file_err=$hide_err=$urgent_err=$review_err='';

    if(isset($_POST['insert']))
    {
        //for person submitting
        if(empty(trim($_POST['submitted'])))
        {
            $submit_err='Enter the name of person submitting.';
        }

        else
        {
            $submit=$_POST['submitted'];
        }

        //time of display
        if(empty(trim($_POST['display'])))
        {
            $display_err='Enter the time of displaying the notice.';
        }

        //if display date is set to a previous time
        else if($_POST['display']<date('Y-m-d H-i-s'))
        {
            $display_err='Please choose a later display date.';
        }

        else
        {
            $display=$_POST['display'];
        }

        //time of end
        if(empty(trim($_POST['end'])))
        {
            $end_err='Enter the time of ending the notice.';
        }

        //if end date is set to a previous time
        else if($_POST['end']<date('Y-m-d H-i-s'))
        {
            $end_err='Please choose a later time.';
        }

        else if($_POST['end']<$_POST['display'])
        {
            $end_err='The end date must be after the display date.';
        }

        else
        {
            $end=$_POST['end'];
        }

        //notice
        if(empty(trim($_POST['notice'])))
        {
            $notice_err='Enter the notice.';
        }

        else
        {
            $notice=$_POST['notice'];
        }

        //notice link
        if(empty(trim($_POST['link'])))
        {
            $link_err='Enter the notice link.';
        }

        else
        {
            $link=$_POST['link'];
        }

        //file
        if(empty($_FILES["resource"]["name"]))
        {      
            $file_err="Enter a image";
        }

        //headline
        if(empty(trim($_POST['head'])))
        {
            $head_err='Enter the headline.';
        }

        else
        {
            $head=$_POST['head'];
        }

        //urgent
        if(!isset($_POST['urgent']))
        {
            $urgent_err='Enter the urgency status.';
        }

        else
        {
            $urgent=$_POST['urgent'];
        }

        //hidden
        if(!isset($_POST['hide']))
        {
            $hide_err='Enter the hiding status.';
        }

        else
        {
            $hide=$_POST['hide'];
        }

        //review
        if(!isset($_POST['review']))
        {
            $review_err='Enter the review status.';
        }

        else
        {
            $review=$_POST['review'];
        }

        //checking if none of the required files is empty
        if(empty($display_err) && empty($end_err)  && empty($file_err) && empty($head_err) && empty($notice_err) && empty($submit_err) && empty($urgent_err)  && empty($hide_err) && empty($review_err))
        {   
            
            $file = $_FILES["resource"]["name"];
            $tempname = $_FILES["resource"]["tmp_name"];      
            //when jpeg image is uploaded
            if($_FILES['resource']['type']=='image/jpeg')
            {
                $source=imagecreatefromjpeg($tempname);
                $file=time().'.jpeg';
                imagejpeg($source,'..\Notice Resources/'.$file);
                $sql = "INSERT INTO `tbl_notice` (`display_date`, `end_date`, `content`, `headline`, `urgent`, `reviewed`, `Submitted_by`,`hide`,`file`) VALUES ( '$display', '$end', '$notice', '$head', '$urgent', '$review', '$submit', '$hide', '$file')";

                //query execute
                $stmt=mysqli_query($conn,$sql);

                if($stmt)
                {
                    $result="Notice is uploaded.";
                }
        
                else{
                    $result=mysqli_error($conn);
                }
        
            }

            else if($_FILES['resource']['type']=='application/pdf')
            {
                
                $file=time().'.pdf';
                $sql = "INSERT INTO `tbl_notice` (`display_date`, `end_date`, `content`, `headline`, `urgent`, `reviewed`, `Submitted_by`,`hide`,`file`) VALUES ( '$display', '$end', '$notice', '$head', '$urgent', '$review', '$submit', '$hide', '$file')";
                $stmt=mysqli_query($conn,$sql);

                if($stmt)
                {
                    $upload_file='..\Notice Resources/'.$file;
                    move_uploaded_file($_FILES["resource"]["tmp_name"],$upload_file);
                    $result="Notice is uploaded.";
                }

                else{
                    $result=mysqli_error($conn);
                }
            }

            else{
                $result="Please Upload jpeg or pdf formats";
            }
     
            echo $result;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Noticeboard admin</title>
</head>

<body>
    <div class="container">
        <div class="column">
            <center>
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
                <a class="docs" href="download.php?k=<?php echo $row['file'] ?>"><img src="img/docs.png" alt="docs icon"></a>
                <p class="date"><?php echo 'Date:'.date("d-m-Y",strtotime($row['display_date'])); ?></p>
            </div>        
            <?php } }?>
        </div>
    </div>
    <!-- notice board end-->
    </div>
    <!-- land div end -->
                <div class="notice-container">
                    <h2>Notice</h2>
                    <div class="notice-content">
                        <div class="notice">
                            <p class="headline">
                                Hii !!!! This is to inform that I Himanshu Shishir done the work before the due date...
                            </p>
                                </div>
                                </div>
                            <button type="button" value="hide">Hide</button>
                            <button type="button" value="urgent">Urgent</button>
                            <button type="button" value="review">Review</button>
                            <button type="button" value="Delete">Delete</button>             
            </center>
        </div>
        <script src="js/index.js"></script>
        <div class="column">
            <center>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                <label for="submitted">Submit</label><input type="text" name="submitted">
                <?php echo $submit_err ?><br>
                <label for="display">Display date</label><input type="datetime-local" name="display" >
                <?php echo $display_err ?><br>
                <label for="end">End Date</label><input type="datetime-local" name="end">
                <?php echo $end_err ?><br>
                <label for="head">Headline</label><input type="text" name="head">
                <?php echo $end_err ?><br>
                <label for="notice">Notice</label><input type="text" name="notice">
                <?php echo $end_err ?><br>
                <label for="link">link</label><input type="text" name="link">
                <?php echo $link_err ?><br>
                <label for="file">File</label><input type="file" name="resource">
                <?php echo $file_err ?><br>
                <label for="urgent">Urgent</label>
                YES<input type="radio" name="urgent" value='1'>
                NO<input type="radio" name="urgent" value='0'>
                <br>
                <?php echo $urgent_err ?><br>
                <label for="reviewed">Reviewed</label>
                YES<input type="radio" name="reviewed" value='1'>
                NO<input type="radio" name="reviewed" value='0'>
                <br>
                <?php echo $review_err ?><br>
                <label for="hide">Hide</label>
                YES<input type="radio" name="hide" value='1'>
                NO<input type="radio" name="hide" value='0'>
                <br>
                <?php echo $hide_err ?><br>
                <button type="submit" value="Submit">Submit</button>
                <button type="reset" class="resetbtn" value="reset">Reset</button>
            </form>
            </center>
        </div>
    </div>
</body>
</html>