<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride -->

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
                    <li class="nav-li"><a href="index.php" class="nav-link-act">Home</a> </li> <!-- Current Page! -->
                    <li class="nav-li"><a href="instructor.php" class="nav-link">Instructor</a></li>
                    <li class="nav-li"><a href="admin.php" class="nav-link">Admin</a></li>
                    <li class="nav-li"><a href="index.php" class="nav-link">Help</a></li>
                </ul>
            </div>
            <div id="nav-user">
                <!-- TODO: Login page -->
                <!-- TODO: Text above username saying "logged in as"/"welcome"-->
                <a href="login.php" class="nav-link">Login</a>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- TODO: Create basic table and button elements -->
        <div id="foreground">
            <h1>Welcome to [SITE NAME]</h1>
            <p> <b> FOR ADMIN: </b> </p>
            <p> Please log in using your TCD username and password, once logged in you may: </p>
            <p> - view pay claims submitted by demonstrators. </p>
            <p> - edit calims submitted by demonstrators </p>
            <p> - choose to approve or reject claims </p> 
            <p> - generate and download a pdf of the original pay claim form once claims are approved </p>
            <p> <b> FOR DEMONSTRATORS: </b> </p>
            <p> Please login using your TCD username and password, once logged in you may: </p>
            <p> - submit new pay claims </p>
            <p> - view pevious claims </p>
            <p> - view profile and teaching hours remaining </p>
            <p> - edit submitted claims </p>
        </div>

        <!-- TODO: Create footer div and populate it. -->
    </body>
</html>
