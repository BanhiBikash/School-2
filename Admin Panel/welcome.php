<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

//message variable
$result = '';

if (isset($_GET['k']))
    $result = $_GET['k'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<center>

    <body>
        <div class="page-header">
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to our site.</h1>
        </div>

        <span class="help-block"><?php echo $result; ?></span>

        <div class="contents">
            <div class="actions">
                <!-- <h2>Actions</h2> -->
                <!-- Admission -->
                <!-- <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Admissions
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="admission.php?class=10" class="btn btn-primary">Class 10</a></li>
                        <li><a href="admission.php?class=9" class="btn btn-primary">Class 9</a></li>
                        <li><a href="admission.php?class=8" class="btn btn-primary">Class 8</a></li>
                    </ul>
                </div> -->

                <!-- Time table -->
                <!-- <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Time-table
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="btn btn-primary">Class 10</a></li>
                        <li><a href="#" class="btn btn-primary">Class 9</a></li>
                        <li><a href="#" class="btn btn-primary">Class 8</a></li>
                    </ul>
                </div> -->

                <!-- Admit card -->
                <!-- <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Admit Card
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="btn btn-primary">Class 10</a></li>
                        <li><a href="#" class="btn btn-primary">Class 9</a></li>
                        <li><a href="#" class="btn btn-primary">Class 8</a></li>
                    </ul>
                </div> -->

                <!-- Results -->
                <!-- <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Results
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="btn btn-primary">Class 10</a></li>
                        <li><a href="#" class="btn btn-primary">Class 9</a></li>
                        <li><a href="#" class="btn btn-primary">Class 8</a></li>
                    </ul>
                </div> -->

                <p>
                    <a href="admin-notice.php" class="btn btn-primary">Add Notice</a>
                    <a href="reset-password.php" class="btn btn-success">Reset Your Password</a>
                    <a href="logout.php" class="btn btn-info">Sign Out of Your Account</a>
                </p>
            </div>
        </div>
    </body>
</center>

</html>