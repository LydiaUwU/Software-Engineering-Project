# Software Engineering Project
### Team 36: Payment Tracking and Approval

## TODO
- Create code standard
- Create login css

## Design Philosophy

Author: Lydia MacBride

The user interface on the visual side of things is written purely in HTML5 and CSS as I wish to keep the site lightweight and easy to modify. The style sheet is commented to indicate what each section controls and I used variables (all located at the top of the file) to allow the colour scheme to be modified with relative ease.

### Sources

#### Fonts
- Inter, Rasmus Andersson
- Karrik, Jean-Baptiste Morizot

### Design Priorities
- Clean readable design
- Intuitive layout
- Accessibility (will work on colour schemes soon)
- Make it not look like every other website in existence (I do not like bootstrap.js)
- Brutalist design
- Lightweight

## Database Overview

Author: Paul

Editor: Lydia MacBride

### Dependencies
- MongoDB
- node js
- HTML *code is set up to run on local host 8080 by typing "node app.js" when in 'Login' file*

### Overview
`/register` is a simple interface to create new users to login to system
Users are set as either admins or instructors from the register
Also stored is the users: name, email and password

`/login` gives the user access to either the admin or instructor page depending on their title

`/admin` shows "Admin view"

`/instructor` shows "Instructor view"

There are two users in the database from when I am uploading the code.

```json
_id : 603fe3b240f7f74ea4563f3c
name : "paul lee"
email : "leep6@tcd.ie"
password : "password"
admin : "on"
```

```json
_id : 603fe3c640f7f74ea4563f3d
name : "luke collins"
email : "luke123@hotmail.com"
password : "starwars"
admin : null
```
