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
            <h1>Manage Claim for John Doe</h1>

            <p>Claim submitted on 26/02/2021</p>

            <p>Claim status: <span class="stat-sub">Submitted</span></p>

            <!-- Claim Format -->
            <!-- TODO: Monospace font for course codes -->

            <?php

                $instructorId = $_GET["instructor"]; // Get instructorId

                // Select data from all claims for this instructor where they have not been accepted or rejected and
                $sqlQuery = "SELECT module_id, start_time, duration, claim_id FROM claims WHERE claim_status = 0 AND dem_id = ?";
                $stmt = $con->prepare($sqlQuery);
                $stmt->bind_param("s", $instructorId);
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

                    // echo HTML with data for each specific claim from DB Query response
                    echo "<div class=\"claim\" id=\"" . $claimId . "\">
                            <p>" . $moduleName . " " . $startDay . " " . $startDatetime->format('d-m-Y H:i') . " " . $duration . " Hours </p>

                            <div class=\"claim-buttons\">" . 
                              //<div class=\"claim-edit\">
                              //  <p>Edit</p>
                              //</div>
                              "<div class=\"claim-reject\" onclick=\"rejectClaim('" . $claimId . "')\">
                                <p>Reject</p>
                              </div>
                            </div>
                          </div>";
                }

            ?>

            <!-- Submit and Download Claims -->
            <div id="claim-dl">
                <p>Download Completed Claim</p>
            </div>
        </div>

        <!-- TODO: Create footer div and populate it. -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="reject-claim.js?ver=123"></script>
    </body>
</html>

