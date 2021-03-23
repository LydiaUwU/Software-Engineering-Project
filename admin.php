<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride. This PHP was written by Devin O'Keefe. -->

<?php

    session_start();                    // Start session cookies
    include("connect-to-db.php");       // Connect to database
    include("helper-functions.php");    // Access helper functions

    if (!isLoggedIn()) {                // Page only accessible to logged in users
        changePage("login.php");
    }

    if (!isAdmin($con)) {               // Page only accessible to admins
        changePage("index.php");
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
                    <li class="nav-li"><a href="instructor.php" class="nav-link">Instructor</a></li>
                    <li class="nav-li"><a href="admin.php" class="nav-link-act">Admin</a></li> <!-- Current Page! -->
                    <li class="nav-li"><a href="index.php" class="nav-link">Help</a></li>
                </ul>
            </div>
            <div id="nav-user">
                <!-- TODO: Login page -->
                <a href="index.php" class="nav-link">Admin</a>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- TODO: Create basic table and button elements -->
        <div id="foreground">
            <h1>Admin Control Center</h1>

            <ul>
                <li><a href="manage-inst.php">Manage Demonstrators</a></li>
                <li><a href="manage-inst.php">View Claims</a></li>
                <li><a href="admin.php">Process Logged Claims</a></li>
            </ul>

            <h2>Modules</h2>

            <!-- Module Format -->
            <!-- TODO: Monospace font for course codes -->
            <!-- TODO: Dynamic % width for claim statuses -->

            <?php

                // Select the ID of each module which the admin is involved in
                $sqlQuery = "SELECT module_id FROM admins_modules WHERE account_id = ?";
                $stmt = $con->prepare($sqlQuery);
                $stmt->bind_param("s", $_SESSION["id"]);
                $stmt->execute();

                $modules = $stmt->get_result();
                $modules = $modules->fetch_all();

                // Iterate through each admin module
                foreach ($modules as $module) {
                    $sqlQuery = "SELECT * FROM modules WHERE id = ?"; // Select all data about this module from db
                    $stmt = $con->prepare($sqlQuery);
                    $stmt->bind_param("s", $module[0]);               // parameter is module ID
                    $stmt->execute();
                    $stmt->store_result();
                        
                    $stmt->bind_result($moduleId, $totalHours, $unclaimedHours, $loggedHours, $claimedHours, $submittedHours);
                    $stmt->fetch();

                    // Echo HTML for block, displaying what percentage of total hours are submitted, claimed, logged, or unclaimed
                    echo ' 
                        <div class="module">
                            <p class="mod-code">' . $moduleId . '</p>
                
                            <div class="mod-vis">
                                <div class="mod-sub" style="flex: ' . ($submittedHours/$totalHours)*100 . '%;">
                                    <p>Submitted</p>
                                </div>
                                <div class="mod-claim" style="flex: ' . ($claimedHours/$totalHours)*100 . '%;">
                                    <p>Claimed</p>
                                </div>
                                <div class="mod-log" style="flex: ' . ($loggedHours/$totalHours)*100 . '%;">
                                    <p>Logged</p>
                                </div>
                                <div class="mod-unclaim" style="flex: ' . ($unclaimedHours/$totalHours)*100 . '%;">
                                    <p>Unclaimed</p>
                                </div>
                            </div>
                        </div>';
                }

            ?>

        </div>

        <!-- TODO: Create footer div and populate it. -->
    </body>
</html>
