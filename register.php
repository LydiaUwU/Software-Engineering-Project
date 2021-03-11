<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride and Devin O'Keefe. PHP was written by Devin O'Keefe. -->

<?php
    session_start();
    include("ConnectToDb.php");

    // Declare constants
    define("FORM_INCOMPLETE", "Unfortunately the form is not complete.");
    define("INVALID_EMAIL", "Unfortunately this email has an invalid format. Please try again.");
    define("EMAIL_TAKEN", "Unfortunately an account already exists with this email. Please choose another.");    
    define("NAME_INVALID", "The inputted name is valid. Please only use letters.");
    define("PASSWORDS_DONT_MATCH", "Your two inputted passwords do not match. Please try again.");

    $errorMessage = "";

    if (!EMPTY($_POST)) { // Check form has been completed
        if (formIsCompleted($_POST["name"], $_POST["email"], $_POST["password"], $_POST["confirmPassword"], $_POST["admin"])) {
            $nameToBind = htmlspecialchars($_POST["name"]); // Remove special characters to avoid XSS attacks
            $emailToBind = htmlspecialchars($_POST["email"]);

            if (emailIsValid($emailToBind)) {
                if (emailNotTaken($emailToBind, $con)) {
                    if (nameIsValid($nameToBind)) {
                        if (passwordsMatch($_POST["password"], $_POST["confirmPassword"])) {
     
                            $userId = uniqid(); // Generate unique ID For users
                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Create password hash to store in db.
                            $admin = $_POST["admin"];
    
                            $sqlQuery = "INSERT INTO accounts (id, email_ad, password, name, is_admin) VALUES (?, ?, ?, ?, ?)";
                            $stmt = $con->prepare($sqlQuery); // Prepared statement for inserting new entry into accounts table.
                            $stmt->bind_param("ssssi", $userId, $emailToBind, $password, $nameToBind, $admin);
                            $stmt->execute();

                            //Set session variables to reflect that the user is now logged into their new account.
                            session_regenerate_id(); 
                            $_SESSION["id"] = $userId;
                            $_SESSION["name"] = $name;
                            header("Location: instructor.php");
                        }
    
                        else {
                            $errorMessage = PASSWORDS_DONT_MATCH;
                        }
                    }
    
                    else {
                        $errorMessage = NAME_INVALID;
                    }
                }
    
                else {
                    $errorMessage = EMAIL_TAKEN;
                }
            }

            else {
                $errorMessage = INVALID_EMAIL;
            }
        }

        else {
            $errorMessage = FORM_INCOMPLETE;
        }
    }

    function formIsCompleted ($name, $email, $password, $conPassword, $admin) {
        if (ISSET($name) AND ISSET($email) AND ISSET($password) AND ISSET($conPassword) AND ISSET($admin)) return true;
        return false;
    }

    function emailIsValid($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }

    function emailNotTaken ($email, $con) {
        $sqlQuery = "SELECT id FROM accounts WHERE email_ad = ?";
        $stmt = $con->prepare($sqlQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) return true;
        return false;
    }

    function nameIsValid ($name) {
        if (preg_match("/^([a-zA-Z' ]+)$/", $name)) return true;
        return false;
    }

    function passwordsMatch ($pass, $conPass) {
        if ($pass == $conPass) return true;
        return false;
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
                <a href="index.html" class="nav-link">Login</a>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- TODO: Create basic table and button elements -->
        <div id="foreground">
            <h1>Register your account</h1>

            <?php
                if (!EMPTY($errorMessage)) {
                    echo "<p>" . $errorMessage . "</p>";
                }
            ?>

            <form action="#" method="POST">
                
                <div>
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter your name..." required />
                </div>
                
                <div>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" placeholder="Enter your email..." required />
                </div>
                
                <div>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter a password..." required />
                </div>

                <div>
                    <label for="confirmPassword">Confirm password</label>
                    <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm password..." required />
                </div>
                
                <div> 
                    <label for="admin">Are you an admin?</label>
                    <input type="hidden" id="admin" name="admin" value=0 />
                    <input type="checkbox" id="admin" name="admin" value=1>
                </div>

                <button type="submit">Register</button> 
        
                <div>
                    <p>Already have an account? <a href="login.php">Login here!</a></p>
                </div>
            </form>
        </div>

        <!-- TODO: Create footer div and populate it. -->
    </body>
</html>


