<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride. PHP was written by Liam O'Lionaird and Devin O'Keefe -->
<?php

    session_start();                    // Start session cookies
    include("connect-to-db.php");       // Connect to database
    include("helper-functions.php");    // Access helper functions
    include("header.php");

    if (!isLoggedIn()) {                // Page only accessible to logged in users
        changePage("login.php");
    }

    if (isset($_POST["code"]) && !EMPTY($_POST["code"]) &&
        isset($_POST["date"]) && !EMPTY($_POST["date"]) &&
        isset($_POST["duration"]) && !EMPTY($_POST["duration"])) {

        $demonstrator = $_SESSION["id"];
        $code = $_POST["code"];
        $date = $_POST["date"];
        $date=date("Y-m-d H:i:s",strtotime($date));
        $duration = $_POST["duration"];
        $id = uniqid();
        $claimtype = 0; // Submit as unprocessed claim (so it shows up on admin page)

        $sqlQuery = "INSERT INTO `claims` (`claim_id`, `dem_id`, `module_id`, `start_time`, `duration`, `claim_status`) VALUES
            (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sqlQuery);
        $stmt->bind_param("ssssdi", $id, $demonstrator, $code, $date, $duration, $claimtype);
        $stmt->execute();

    }

?>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- TODO: Create basic table and button elements -->
<div id="foreground">
    <h1>Submit a claim</h1>

    <?php
        if (!EMPTY($errorMessage)) {
            echo "<p>" . $errorMessage . "</p>";
        }
    ?>

    <div id="update">
        <form action="#" method="POST">
            <div>
                <label>Module Code</label>
                <input id="code" name="code" type="text" placeholder="Module Code" class="login-field" />
            </div>

            <div>
                <label>Date of Claim</label>
                <input id="date" name="date" type="date" class="login-field" />
            </div>

            <div>
                <label>Duration (Hours)</label>
                <input id="duration" name="duration" type="text" placeholder="Duration (Hours)" class="login-field" />
            </div>

            <div>
                <button type="reject" class="update-button">Cancel</button>
                <button type="submit" class="update-button">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- TODO: Create footer div and populate it. -->
        
</body>
</html>
