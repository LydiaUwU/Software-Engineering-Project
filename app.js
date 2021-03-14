/*
 * Simple JS application to launch the server.
 *
 * @Authors: Paul, Lydia
 */

//TODO: Add comments

const express = require('express')
const bodyParser = require('body-parser')
const bcrypt = require('bcrypt')
const MongoClient = require("mongodb").MongoClient
const app = express()
const url = "mongodb+srv://paul2928:d4t4d4t4@cluster0.qhhly.mongodb.net/myFirstDatabase?retryWrites=true&w=majority";
const client = new MongoClient(url, {useUnifiedTopology: true})
const PORT = process.env.PORT || 8080;

app.set('view-engine', 'ejs')
app.use(express.urlencoded({ extended: false }, bodyParser.json())) // These types don't match
app.get('/', (req, res) => { res.sendFile('views/index.html', { root: __dirname}) })
app.get('/login', (req, res) => { res.render('login.ejs') })


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| LOGIN |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
app.post('/login', async(req, res) => {
    const emailLogin = req.body.email;
    const password = req.body.password;

    try {
        await client.connect()
        const database = client.db("database")
        const collection = database.collection("userLogin")
        let result = await collection.find({"email": emailLogin})

        // Initialise Admin user and credentials
        let user = await result.toArray()
        const dbPassword = user[0].password;
        let adminAccess = user[0].admin;
        adminAccess = adminAccess != null;

        if (password === dbPassword) {
            console.log('Password Correct!')

            if (adminAccess === true) {
                res.redirect('/admin')
            } else {
                res.redirect('/instructor')
            }
        } else {
            res.redirect('/login')
        }
    } catch {
        res.redirect('/login')
    }
})

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| REGISTER |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
app.get('/register', (req, res) => { res.render('register.ejs') })

app.post('/register', async(req, res) => { 
    await client.connect()
    const database = client.db("database")
    const collection = database.collection("userLogin")

    try {
        const result = await collection.insertOne({
            "name": req.body.name,
            "email": req.body.email,
            "password": req.body.password,
            "admin": req.body.admin
        })

        res.redirect('/login')
    } catch {
        res.redirect('/register')
    }
})

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| ADMIN |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
app.get('/admin', (req, res) => { res.sendFile('views/admin.html', { root: __dirname }) })

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~| INSTRUCTOR |~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
app.get('/instructor', (req, res) => { res.sendFile('views/instructor.html', { root: __dirname }) })

app.listen(PORT, (req, res) => { console.log('Server started at PORT'); })