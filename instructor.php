<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride. PHP was written by Devin O'Keefe-->

<?php

    session_start();
    include("ConnectToDb.php");

    function changePage($pageName) {
        header("location: " . $pageName);
    }

    if (!ISSET($_SESSION["id"])) {
        changePage("login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hello World!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Font Imports! |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- Inter -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
        <!-- Karrik -->
        <!-- TODO: Create basic logo concept. -->
        <link href="fonts/karrik/karrik.css" rel="stylesheet">
    </head>
    <body>
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Navigation Bar |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div id="navbar">
            <h1>Logo-Here</h1>
            <div id="nav-links">
                <ul class="nav-ul">
                    <li class="nav-li"><a href="index.php" class="nav-link">Home</a> </li>
                    <li class="nav-li"><a href="instructor.php" class="nav-link-act">Instructor</a></li> <!-- Current Page! -->
                    <li class="nav-li"><a href="admin.php" class="nav-link">Admin</a></li>
                    <li class="nav-li"><a href="index.php" class="nav-link">Help</a></li>
                </ul>
            </div>
            <div id="nav-user">
                <!-- TODO: Login page -->
                <a href="index.html" class="nav-link">
                    <?php echo $_SESSION["name"]; ?>
                </a>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- TODO: Create basic table and button elements -->
        <div id="foreground">
            <h1>
                Welcome <?php echo $_SESSION["name"]; ?>
            </h1>

            <ul>
                <li><a href="instructor.html">Update personal information</a></li>
                <li><a href="instructor.html">Log Activity</a></li>
                <li><a href="instructor.html">View Claims</a></li>
            </ul>
        </div>

        <!-- TODO: Create footer div and populate it. -->
    </body>
</html>
