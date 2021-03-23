<?php

    $claimId = $_GET["claimId"];

    session_start();
    include("connect-to-db.php");

    // Update this claim's status to 2
    //
    // 0 = submitted
    // 1 = accepted
    // 2 = rejected
    
    $sqlQuery = "UPDATE claims SET claim_status = 2 WHERE claim_id = ?";
    $stmt = $con->prepare($sqlQuery);
    $stmt->bind_param("s", $claimId);
    $stmt->execute();

?>
