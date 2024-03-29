<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride. PHP was written by Devin O'Keefe-->

<?php

    session_start();
    include("connect-to-db.php");

    function changePage($pageName) {
        header("location: " . $pageName);
    }

    if (!ISSET($_SESSION["id"])) {
        changePage("login.php");
    }

    include("header.php");
?>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- TODO: Create basic table and button elements -->
        <div id="foreground">
            <h1>
                Welcome <?php echo $_SESSION["name"]; ?>
            </h1>

            <ul>
                <li><a href="update-info.php">Update personal information</a></li>
                <li><a href="update-claim.php">Log Activity</a></li>
            </ul>
        </div>

        <!-- TODO: Create footer div and populate it. -->
    </body>
</html>
