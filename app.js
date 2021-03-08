const express = require('express')
const bodyParser = require('body-parser')
const bcrypt = require('bcrypt')
const MongoClient = require("mongodb").MongoClient
const app = express()

var url = "mongodb+srv://paul2928:d4t4d4t4@cluster0.qhhly.mongodb.net/myFirstDatabase?retryWrites=true&w=majority";

const client = new MongoClient(url, {useUnifiedTopology: true})

const PORT = process.env.PORT || 8080;

app.set('view-engine', 'ejs')
app.use(express.urlencoded({ extended: false},
    bodyParser.json()))

app.get('/', (req, res) => {
    res.sendFile('views/index.html', {root: __dirname })
})

app.get('/login', (req, res) => {
    res.render('login.ejs')
})

app.post('/login', async(req, res) => {
    var emailLogin = req.body.email
    var password = req.body.password
    try{
        await client.connect()
        const database = client.db("database")
        const collection = database.collection("userLogin")
        let result = await collection.find({"email": emailLogin})
        let user = await result.toArray()
        var dbPassword = user[0].password
        var adminAccess = user[0].admin
        if (adminAccess != null){adminAccess = true} else {adminAccess = false}
        if (password == dbPassword){
            console.log('Password Correct!')
            if (adminAccess == true){
                res.redirect('/admin')
            }
            else{
                res.redirect('/instructor')
            }
        }
        else{
            res.redirect('/login')
        }
    } catch {
        res.redirect('/login')
    }
})

app.get('/register', (req, res) => {
    res.render('register.ejs')
})

app.post('/register', async(req, res) => { 
    await client.connect()
    const database = client.db("database")
    const collection = database.collection("userLogin")
    try{
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

app.get('/admin', (req, res) => {
    res.sendFile('views/admin.html', {root: __dirname })
})

app.get('/instructor', (req, res) => {
    res.sendFile('views/instructor.html', {root: __dirname })
})

app.listen(PORT, (req, res) => {
    console.log('Server started at PORT');
})