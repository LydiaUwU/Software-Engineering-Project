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
                    <li class="nav-li"><a href="instructor.php" class="nav-link">Instructor</a></li> <!-- Current Page! -->
                    <li class="nav-li"><a href="admin.php" class="nav-link">Admin</a></li>
                    <li class="nav-li"><a href="index.php" class="nav-link">Help</a></li>
                </ul>
            </div>
            <div id="nav-user">
                <!-- TODO: Login page -->
                <a href="instructor.php" class="nav-link">
                    <?php echo $_SESSION["name"]; ?>
                </a>
                <a href="logout.php" class="nav-link">Logout</a>
            </div>
        </div>
