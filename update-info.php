<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride. PHP was written by Devin O'Keefe -->
<?php

    session_start();                    // Start session cookies
    include("connect-to-db.php");       // Connect to database
    include("helper-functions.php");    // Access helper functions

    // Declare constants
    define("INVALID_EMAIL", "Unfortunately this email has an invalid format. Please try again.");
    define("EMAIL_TAKEN", "Unfortunately an account already exists with this email. Please choose another.");    
    define("NAME_INVALID", "The inputted name is valid. Please only use letters.");
    define("PASSWORDS_DONT_MATCH", "Your two inputted passwords do not match. Please try again.");

    if (!isLoggedIn()) {                // Page only accessible to logged in users
        changePage("login.php");
    }

    // Check email is valid
    function emailIsValid($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }

    // Make sure this email has not already been taken
    function emailNotTaken ($email, $con) {
        $sqlQuery = "SELECT id FROM accounts WHERE email_ad = ?";
        $stmt = $con->prepare($sqlQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) return true;
        return false;
    }

    // Check that the number doesn't contain numbers or invalid characters
    function nameIsValid ($name) {
        if (preg_match("/^([a-zA-Z' ]+)$/", $name)) return true;
        return false;
    }

    // Make sure that both passwords match
    function passwordsMatch ($pass, $conPass) {
        if ($pass == $conPass) return true;
        return false;
    }


    if (isset($_POST["name"]) && !EMPTY($_POST["name"])) {
        $newName = htmlspecialchars($_POST["name"]);
        $userId = $_SESSION["id"];

        if (nameIsValid($newName)) {
            $sqlQuery = "UPDATE accounts SET name = ? WHERE id = ?";
            $stmt = $con->prepare($sqlQuery);
            $stmt->bind_param("ss", $newName, $userId);
            $stmt->execute();
        }

        else {
            $errorMessage = NAME_INVALID;
        }
    }

    if (isset($_POST["email"]) && !EMPTY($_POST["email"])) {
        $newEmail = htmlspecialchars($_POST["email"]);
        $userId = $_SESSION["id"];

        if (emailIsValid($newEmail)){
            if(emailNotTaken($newEmail, $con)) {
                $sqlQuery = "UPDATE accounts SET email_ad = ? WHERE id = ?";
                $stmt = $con->prepare($sqlQuery);
                $stmt->bind_param("ss", $newEmail, $userId);
                $stmt->execute();
            }

            else {
                $errorMessage = NAME_INVALID;
            }
        }

        else {
            $errorMessage = INVALID_EMAIL;
        }
    }

    if (isset($_POST["password"]) && !EMPTY($_POST["password"])
     && isset($_POST["confirmPassword"]) && !EMPTY($_POST["confirmPassword"])) {
        $pass = $_POST["password"];
        $conPass = $_POST["confirmPassword"];
        $userId = $_SESSION["id"];

        if (passwordsMatch($pass, $conPass)) {
            $newPass = password_hash($pass, PASSWORD_DEFAULT);

            $sqlQuery = "UPDATE accounts SET password = ? WHERE id = ?";
            $stmt = $con->prepare($sqlQuery);
            $stmt->bind_param("ss", $newPass, $userId);
            $stmt->execute();
        }

        else {
            $errorMessage = PASSWORDS_DONT_MATCH;
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
            <li class="nav-li"><a href="index.php" class="nav-link">Home</a> </li>
            <li class="nav-li"><a href="instructor.php" class="nav-link-act">Instructor</a></li> <!-- Current Page! -->
            <li class="nav-li"><a href="admin.php" class="nav-link">Admin</a></li>
            <li class="nav-li"><a href="index.php" class="nav-link">Help</a></li>
        </ul>
    </div>
    <div id="nav-user">
        <!-- TODO: Login page -->
        <a href="login.php" class="nav-link">John Doe</a>
    </div>
</div>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- TODO: Create basic table and button elements -->
<div id="foreground">
    <h1>Update Personal Information</h1>

    <?php
        if (!EMPTY($errorMessage)) {
            echo "<p>" . $errorMessage . "</p>";
        }
    ?>

    <div id="update">
        <form action="#" method="POST">
            <div>
                <label>Name</label>
                <input id="name" name="name" type="text" placeholder="Enter your name..." class="login-field" />
            </div>
    
            <div>
                <label>Email</label>
                <input id="email" name="email" type="text" placeholder="Enter your email..." class="login-field" />
            </div>
    
            <div>
                <label>New password</label>
                <input id="password" name="password" type="password" placeholder="Enter a password..." class="login-field" />
            </div>
    
            <div>
                <label>Confirm new password</label>
                <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm password..." class="login-field" />
            </div>
    
            <div>
                <button type="reject" class="update-button">Cancel</button>
                <button type="submit" class="update-button">Update</button>
            </div>
        </form>
    </div>
</div>
<!-- TODO: Create footer div and populate it. -->
        
</body>
</html>
