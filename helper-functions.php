<?php
    // This PHP was written by Devin O'Keefe.

    // Change Page by changing header to pagename passed as argument
    function changePage($pageName) {
        header("location: " . $pageName);
    }

    // Check User is an Admin with database query
    function isAdmin($con) {
        $sqlQuery = "SELECT is_admin FROM accounts WHERE id = ?";
        $stmt = $con->prepare($sqlQuery);
        $stmt->bind_param("s", $_SESSION["id"]);
        $stmt->execute();

        $result = $stmt->get_result();
        $result = $result->fetch_all();

        $isAdmin = $result[0][0];

        if ($isAdmin) return true;
        return false;
    }

    // Check user is loggedin by chceking session status and ensuring session id variable is set.
    function isLoggedIn() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!ISSET($_SESSION["id"])) return false;
        return true;
    }

?>
