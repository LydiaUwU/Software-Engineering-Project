<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride and Devin O'Keefe. PHP was written by Devin O'Keefe. -->

<?php
    session_start();
    include("ConnectToDb.php");

    // Declare constants
    define("NO_ACCOUNT", "Unfortunately no account exists for this email address.");
    define("INCORRECT_PASSWORD", "Either the email or password for this account is incorrect. Please try again.");

    $errorMessage = "";

    if (ISSET($_POST["email"]) AND ISSET($_POST["password"])) { // Check form has been completed

        $email = $_POST["email"];
        $inputPassword = $_POST["password"];

        $sqlQuery = "SELECT id, name, password FROM accounts WHERE email_ad = ?"; // SQL Query to get id, name, and password for account from db.

        $stmt = $con->prepare($sqlQuery); // Prepared statement for SQL Query
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) { // Check account actually exists for this email address
            $stmt->bind_result($id, $name, $accountPassword); // Set variables id, name, and accountPassword to the three variables returned by SQL.
            $stmt->fetch();

            if (password_verify($inputPassword, $accountPassword)) { // Verify that the passwords match
                // If passwords match, then set session variables to reflect user being logged in to their account
                session_regenerate_id();
                $_SESSION["id"] = $id;
                $_SESSION["name"] = $name;
                header("Location: instructor.php");                
            }

            else {
                $errorMessage = INCORRECT_PASSWORD;
            }
        }

        else {
            $errorMessage = NO_ACCOUNT;
        }
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
                    <li class="nav-li"><a href="index.php" class="nav-link-act">Home</a> </li> <!-- Current Page! -->
                    <li class="nav-li"><a href="instructor.php" class="nav-link">Instructor</a></li>
                    <li class="nav-li"><a href="admin.php" class="nav-link">Admin</a></li>
                    <li class="nav-li"><a href="index.php" class="nav-link">Help</a></li>
                </ul>
            </div>
            <div id="nav-user">
                <!-- TODO: Login page -->
                <!-- TODO: Text above username saying "logged in as"/"welcome"-->
                <a href="index.php" class="nav-link">Login</a>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- TODO: Create basic table and button elements -->
        <div id="foreground">
            <h1>Welcome back</h1>

            <?php
                if (!EMPTY($errorMessage)) {
                    echo "<p>" . $errorMessage . "</p>";
                }
            ?>

            <form action="#" method="POST">
                <div>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" placeholder="Enter your email..." required />
                </div>

                <div>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter your password..." required />
                </div>            

                <button type="submit">Login</button> 
        
                <div>
                    <p>Don't have an account? <a href="register.php">Register now!</a></p>
                </div>
            </form>
        </div>

        <!-- TODO: Create footer div and populate it. -->
    </body>
</html>

