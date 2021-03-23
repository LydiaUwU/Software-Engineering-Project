<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride. PHP was written by Devin O'Keefe -->
<?php

    session_start();
    include("connect-to-db.php");
    include("helper-functions.php");

    $instructorTypes = array("UG", "PG1", "PG2", "TA"); // Array of the four types of instructors

    if (!isLoggedIn()) {
        changePage("login.php");
    }

    if (!isAdmin($con)) {
        changePage("index.php");
    }

    // Select each module which the user works in
    $sqlQuery = "SELECT module_id FROM admins_modules WHERE account_id = ?"; 
    $stmt = $con->prepare($sqlQuery);
    $stmt->bind_param("s", $_SESSION["id"]);
    $stmt->execute();

    $modules = $stmt->get_result();
    $modules = $modules->fetch_all();

    $adminInstructors = array(); // Empty array to hold ID of each instructor in modules which admin manages

    // Iterate through each module which the user works in
    foreach ($modules as $module) {

        // Select the account id for each demonstrator who works in this module 
        $sqlQuery = "SELECT account_id FROM dems_modules WHERE module_id = ?";
        $stmt = $con->prepare($sqlQuery);
        $stmt->bind_param("s", $module[0]);
        $stmt->execute();

        $demonstrators = $stmt->get_result();
        $demonstrators = $demonstrators->fetch_all();

        // Add each demonstratorId to the adminInstructors array
        foreach ($demonstrators as $demonstrator) {
            $adminInstructors[] = $demonstrator[0];
        }
    }

    $adminInstructors = array_unique($adminInstructors); // Remove duplicates from the array

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
                    <li class="nav-li"><a href="index.html" class="nav-link">Home</a> </li>
                    <li class="nav-li"><a href="instructor.html" class="nav-link">Instructor</a></li>
                    <li class="nav-li"><a href="admin.html" class="nav-link-act">Admin</a></li> <!-- Current Page! -->
                    <li class="nav-li"><a href="index.html" class="nav-link">Help</a></li>
                </ul>
            </div>
            <div id="nav-user">
                <!-- TODO: Login page -->
                <a href="index.html" class="nav-link">Admin</a>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- TODO: Create basic table and button elements -->
        <div id="foreground">
            <h1>Manage Instructor Payments</h1>

            <p>Viewing claims from 01/02/2021 to 28/02/2021.</p>

            <!-- TODO: Create generic instructor div which links to a new page for reviewing pay claims -->
            <div id="instructor">
                <table id="instructors">
                    <!-- TODO: Make table interactive/sortable -->
                    <tr>
                        <th>Name</th>
                        <th>Level</th>
                    </tr>

                    <?php

                        // Iterate through each demonstrator in the adminInstructor array
                        foreach ($adminInstructors as $instructorId) {
                            
                            // Select the name and demonstrator_type of each demonstrator in the adminInstructor array
                            $sqlQuery = "SELECT name, dem_type FROM accounts WHERE id = ?";
                            $stmt = $con->prepare($sqlQuery);
                            $stmt->bind_param("s", $instructorId);
                            $stmt->execute();

                            $instructorData = $stmt->get_result();
                            $instructorData = $instructorData->fetch_all();

                            $instructorName = $instructorData[0][0]; // Set variable instructorName from db Query response
                            $instructorType = $instructorTypes[$instructorData[0][1]]; // Set variable instructorType from db Query response

                            // echo HTML to show each instructor on User View and let them click to manage instructor
                            echo "<tr onclick=\"window.location='manage-claim.php?instructor=" . $instructorId . "';\">
                                    <td>" . $instructorName . "</td>
                                    <td>" . $instructorType . "</td>
                                  </tr>";
                        }

                    ?>

                </table>
            </div>
        </div>

        <!-- TODO: Create footer div and populate it. -->
    </body>
</html>
