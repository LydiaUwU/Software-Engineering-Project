<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride. This PHP was written by Devin O'Keefe-->
<?php 

    session_start();                    // Start session variables
    include("connect-to-db.php");       // Connect to database
    include("helper-functions.php");    // Include helper functions

    if (!isLoggedIn()) {                // Page only accessible to logged in users
        changePage("login.php");
    }

    if (!isAdmin($con)) {               // Page only accessible to admins
        changePage("index.php");
    }

    include("header.php");
?>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- TODO: Create basic table and button elements -->
        <div id="foreground">
            <h1>View all claims for your modules</h1>

            <!-- Claim Format -->
            <!-- TODO: Monospace font for course codes -->

            <?php

                $adminId = $_SESSION["id"]; // Get adminId

                // Select all modules for the admin
                $sqlQuery = "SELECT module_id FROM admins_modules WHERE account_id = ?";
                $stmt = $con->prepare($sqlQuery);
                $stmt->bind_param("s", $adminId);
                $stmt->execute();

                $modules = $stmt->get_result();
                $modules = $modules->fetch_all();

                foreach ($modules as $module) {
                    
                    // Select data from all claims for this instructor where they have not been accepted or rejected and
                    $sqlQuery = "SELECT module_id, start_time, duration, claim_id, dem_id FROM claims WHERE claim_status = 0 AND module_id = ?";
                    $stmt = $con->prepare($sqlQuery);
                    $stmt->bind_param("s", $module[0]);
                    $stmt->execute();
    
                    $claimData = $stmt->get_result();
                    $claimData = $claimData->fetch_all();
    
                    // Iterate through each claim returned by the query
                    foreach ($claimData as $claim) {
    
                        // Assign variables based on query response
                        $moduleName = $claim[0];
                        $startDatetime = new DateTime($claim[1]);
                        $startDay = $startDatetime->format("D");
                        $duration = $claim[2];
                        $claimId = $claim[3];
                        $demonstratorId = $claim[4];

                        $sqlQuery = "SELECT name FROM accounts WHERE id = ?";
                        $stmt = $con->prepare($sqlQuery);
                        $stmt->bind_param("s", $demonstratorId);
                        $stmt->execute();
    
                        $demName= $stmt->get_result();
                        $demName= $demName->fetch_all();

                        // echo HTML with data for each specific claim from DB Query response
                        echo "<div class=\"claim\" id=\"" . $claimId . "\">
                                <p>" .  $demName[0][0] . " - " . $moduleName . " " . $startDay . " " . $startDatetime->format('d-m-Y H:i') . " " . $duration . " Hours </p>
    
                                <div class=\"claim-buttons\">" . 
                                //<div class=\"claim-edit\">
                                //  <p>Edit</p>
                                //</div>
                                "<div class=\"claim-reject\" onclick=\"rejectClaim('" . $claimId . "')\">
                                    <p>Reject</p>
                                </div>
                                </div>
                            </div>";

                        // Submit and Download Claims
                        echo "<div id=\"claim-dl\">
                                <p onclick=\"window.location='claimform.php?claim=" . $claimId . "';\">Download Completed Claim</p>
                              </div>";
                    }
                }

            ?>
        </div>

        <!-- TODO: Create footer div and populate it. -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="reject-claim.js"></script>
    </body>
</html>


