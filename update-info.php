<!-- Thanks for checking out the source! This HTML was written by Lydia MacBride -->

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
    <div id="update">
        <div>
            <label>First Name</label>
            <input id="name" name="name" type="text" placeholder="Enter your name..." class="login-field" required />
        </div>

        <div>
            <label>Email</label>
            <input id="email" name="email" type="text" placeholder="Enter your email..." class="login-field" required />
        </div>

        <div>
            <label>New password</label>
            <input id="password" name="password" type="password" placeholder="Enter a password..." class="login-field" required />
        </div>

        <div>
            <label>Confirm new password</label>
            <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm password..." class="login-field" required />
        </div>

        <div>
            <button type="reject" class="update-button">Cancel</button>
            <button type="submit" class="update-button">Update</button>
        </div>
    </div>
</div>
<!-- TODO: Create footer div and populate it. -->
</body>
</html>