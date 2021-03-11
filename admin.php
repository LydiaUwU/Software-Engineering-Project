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
                    <li class="nav-li"><a href="index.html" class="nav-link">Home</a> </li>
                    <li class="nav-li"><a href="instructor.html" class="nav-link">Instructor</a></li>
                    <li class="nav-li"><a href="admin.html" class="nav-link-act">Admin</a></li> <!-- Current Page! -->
                    <li class="nav-li"><a href="index.html" class="nav-link">Help</a></li>
                </ul>
            </div>
            <div id="nav-user">
                <!-- TODO: Login page -->
                <a href="index.html" class="nav-link">Admin</a>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| Page Contents |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- TODO: Create basic table and button elements -->
        <div id="foreground">
            <h1>Admin Control Center</h1>

            <ul>
                <li><a href="manage-inst.html">Manage Demonstrators</a></li>
                <li><a href="manage-inst.html">View Claims</a></li>
                <li><a href="admin.html">Process Logged Claims</a></li>
            </ul>

            <h2>Modules</h2>

            <!-- Module Format -->
            <!-- TODO: Monospace font for course codes -->
            <!-- TODO: Dynamic % width for claim statuses -->
            <div class="module">
                <p class="mod-code">CSU11021</p>

                <div class="mod-vis">
                    <div class="mod-sub" style="flex: 30%;">
                        <p>Submitted</p>
                    </div>
                    <div class="mod-claim" style="flex: 20%;">
                        <p>Claimed</p>
                    </div>
                    <div class="mod-log" style="flex: 20%;">
                        <p>Logged</p>
                    </div>
                    <div class="mod-unclaim" style="flex: 30%;">
                        <p>Unclaimed</p>
                    </div>
                </div>
            </div>

            <div class="module">
                <p class="mod-code">CSU11011</p>

                <div class="mod-vis">
                    <div class="mod-sub" style="flex: 25%;">
                        <p>Submitted</p>
                    </div>
                    <div class="mod-claim" style="flex: 25%;">
                        <p>Claimed</p>
                    </div>
                    <div class="mod-log" style="flex: 25%;">
                        <p>Logged</p>
                    </div>
                    <div class="mod-unclaim" style="flex: 25%;">
                        <p>Unclaimed</p>
                    </div>
                </div>
            </div>

            <div class="module">
                <p class="mod-code">CSU22021</p>

                <div class="mod-vis">
                    <div class="mod-sub" style="flex: 40%;">
                        <p>Submitted</p>
                    </div>
                    <div class="mod-claim" style="flex: 30%;">
                        <p>Claimed</p>
                    </div>
                    <div class="mod-log" style="flex: 10%;">
                        <p>Logged</p>
                    </div>
                    <div class="mod-unclaim" style="flex: 20%;">
                        <p>Unclaimed</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- TODO: Create footer div and populate it. -->
    </body>
</html>