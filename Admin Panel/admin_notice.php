<?php
//importing connection  
require_once('config.php');

date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i');

//varibles for data
$display = $end = $submit = $notice = $link = $head = $file = $hide = $urgent = $review = $result = '';

//varibles for data error
$display_err = $end_err = $submit_err = $notice_err = $link_err = $head_err = $file_err = $hide_err = $urgent_err = $review_err = '';

if (isset($_POST['submit'])) {
    //for person submitting
    if (empty(trim($_POST['submitted']))) {
        $submit_err = 'Enter the name of person submitting.';
    } else {
        $submit = $_POST['submitted'];
    }

    //time of display
    if (empty(trim($_POST['display']))) {
        $display_err = 'Enter the time of displaying the notice.';
    }

    //if display date is set to a previous time
    else if ($_POST['display'] < date('Y-m-d H-i-s')) {
        $display_err = 'Please choose a later display date.';
    } else {
        $display = $_POST['display'];
    }

    //time of end
    if (empty(trim($_POST['end']))) {
        $end_err = 'Enter the time of ending the notice.';
    }

    //if end date is set to a previous time
    else if ($_POST['end'] < date('Y-m-d H-i-s')) {
        $end_err = 'Please choose a later time.';
    } else if ($_POST['end'] < $_POST['display']) {
        $end_err = 'The end date must be after the display date.';
    } else {
        $end = $_POST['end'];
    }

    //notice
    if (empty(trim($_POST['notice']))) {
        $notice_err = 'Enter the notice.';
    } else {
        $notice = $_POST['notice'];
    }

    //notice link
    if (empty(trim($_POST['link']))) {
        $link_err = 'Enter the notice link.';
    } else {
        $link = $_POST['link'];
    }

    //file
    if (empty($_FILES["resource"]["name"])) {
        $file_err = "Enter a image";
    }

    //headline
    if (empty(trim($_POST['head']))) {
        $head_err = 'Enter the headline.';
    } else {
        $head = $_POST['head'];
    }

    //urgent
    if (!isset($_POST['urgent'])) {
        $urgent_err = 'Enter the urgency status.';
    } else {
        $urgent = $_POST['urgent'];
    }

    //hidden
    if (!isset($_POST['hide'])) {
        $hide_err = 'Enter the hiding status.';
    } else {
        $hide = $_POST['hide'];
    }

    //review
    if (!isset($_POST['review'])) {
        $review_err = 'Enter the review status.';
    } else {
        $review = $_POST['review'];
    }

    //checking if none of the files is empty
    if (empty($display_err) && empty($end_err)  && empty($file_err) && empty($head_err) && empty($notice_err) && empty($submit_err) && empty($urgent_err)  && empty($hide_err) && empty($review_err)) {

        $file = $_FILES["resource"]["name"];
        $tempname = $_FILES["resource"]["tmp_name"];
        //when jpeg image is uploaded
        if ($_FILES['resource']['type'] == 'image/jpeg') {
            $source = imagecreatefromjpeg($tempname);
            $file = time() . '.jpeg';
            imagejpeg($source, '..\Notice Resources/' . $file);
            $sql = "INSERT INTO `tbl_notice` (`display_date`, `end_date`, `content`, `headline`, `urgent`, `reviewed`, `Submitted_by`,`hide`,`file`) VALUES ( '$display', '$end', '$notice', '$head', '$urgent', '$review', '$submit', '$hide', '$file')";

            //query execute
            $stmt = mysqli_query($conn, $sql);

            if ($stmt) {
                $result = "Notice is uploaded.";
            } else {
                $result = mysqli_error($conn);
            }
        } else if ($_FILES['resource']['type'] == 'application/pdf') {

            $file = time() . '.pdf';
            $sql = "INSERT INTO `tbl_notice` (`display_date`, `end_date`, `content`, `headline`, `urgent`, `reviewed`, `Submitted_by`,`hide`,`file`) VALUES ( '$display', '$end', '$notice', '$head', '$urgent', '$review', '$submit', '$hide', '$file')";
            $stmt = mysqli_query($conn, $sql);

            if ($stmt) {
                $upload_file = '..\Notice Resources/' . $file;
                move_uploaded_file($_FILES["resource"]["tmp_name"], $upload_file);
                $result = "Notice is uploaded.";
            } else {
                $result = mysqli_error($conn);
            }
        } else {
            $result = "Please Upload jpeg or pdf formats";
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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="big-container">
        <div class="container">
            <!-- notice board -->
            <div class="notice-container">
                <h2>Notice</h2>
                <div class="notice-content">
                    <?php
                    $sql = "select * from tbl_notice ORDER BY `created_date`";
                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($query)) {
                        if(date('Y-m-d H-i-s')<=$row['display_date']){echo date('Y-m-d H-i-s').",".$row['display_date'].$row['headline'];};
                        //show the notice if not hidden and display date has reached and not expired and reviewed
                        if (date("Y-m-d H-i-s") >= $row['display_date'] && date("Y-m-d H-i-s") <= $row['end_date'] && $row['hide'] == '0' && $row['reviewed'] == '1') {
                    
                    ?>
                            <div class="notice">
                                <p class="headline"><?php echo $row['Notice no.'] . ": " . $row['headline']; ?></p>
                                <p><?php echo $row['content']; ?></p>
                                <a class="docs" target="_blank" href="download.php?k=<?php echo $row['file'] ?>"><img src="img/docs.png" alt="docs icon"></a>
                                <p class="date"><?php echo 'Date:' . date("d-m-Y", strtotime($row['display_date'])); ?></p>
                                <div class="bttn-group">
                                    <button class="btn btn-primary" type="submit" name="submit">Review</button>
                                    <button class="btn btn-warning" type="submit" name="submit">Urgent</button>
                                    <button class="btn btn-info" type="submit" name="submit">Hide</button>
                                    <button class="btn btn-danger" type="submit" name="submit">Delete</button>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>

        <div class="container">
            <form class="needs-validation" id="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                
            <!-- heading -->
            <h2>Notice Form</h2><div class="form-row">

                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Submitted By</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Name of person submitting" name="submitted" value="<?php echo $submit ?>">
                        <p class="error"><?php echo $submit_err ?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Date of display</label>
                        <input type="datetime-local" class="form-control" id="validationCustom01" name="display" value="<?php echo $display ?>">
                        <p class="error"><?php echo $display_err ?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">End date</label>
                        <input type="datetime-local" class="form-control" id="validationCustom02" name="end" value="<?php echo $end ?>">
                        <p class="error"><?php echo $end_err ?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Headline</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Headline of notice" name="head" value="<?php echo $head ?>">
                        <p class="error"><?php echo $head_err ?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Notice</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Notice content" name="notice" value="<?php echo $notice ?>">
                        <p class="error"><?php echo $notice_err ?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Link</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Link to forward" name="link" value="<?php echo $link ?>">
                        <p class="error"><?php echo $link_err ?></p>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="exampleFormControlFile1">Resource</label>
                        <input type="file" class="form-control-file" name="resource" id="exampleFormControlFile1">
                        <p class="error"><?php echo $file_err ?></p>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="exampleFormControlFile1">Reviewed</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="review" id="exampleRadios2" value="1">
                            <label class="form-check-label" for="exampleRadios2">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="review" id="exampleRadios2" value="0">
                            <label class="form-check-label" for="exampleRadios2">
                                No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="exampleFormControlFile1">Urgent</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="urgent" id="exampleRadios2" value="1">
                            <label class="form-check-label" for="exampleRadios2">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="urgent" id="exampleRadios2" value="0">
                            <label class="form-check-label" for="exampleRadios2">
                                No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="exampleFormControlFile1">Hidden</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hide" id="exampleRadios2" value="1">
                            <label class="form-check-label" for="exampleRadios2">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hide" id="exampleRadios2" value="0">
                            <label class="form-check-label" for="exampleRadios2">
                                No
                            </label>
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</body>
<script src="index.js"></script>

<script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</html>