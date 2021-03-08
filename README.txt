Login connected to MongoDB Atlas

Code not commented because its short and self explanatory

require:
    - MongoDB
    - node js
    - HTML 
    *code is set up to run on local host 8080 by typing "node app.js" when in 'Login' file*

Overview
I have 4 views set up. 
'/register' is a simple interface to create new users to login to system
    Users are set as either admins or instructors from the register
    Also stored is the users: name, email and password

'/login' gives the user access to either the admin or instructor page depending on their title

'/admin' shows "Admin view"

'/instructor' shows "Instructor view"

There are two users in the database from when I am uploading the code


_id : 603fe3b240f7f74ea4563f3c
name : "paul lee"
email : "leep6@tcd.ie"
password : "password"
admin : "on"


_id : 603fe3c640f7f74ea4563f3d
name : "luke collins"
email : "luke123@hotmail.com"
password : "starwars"
admin : null
