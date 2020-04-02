const express = require('express')
const path = require('path')

const app = express()

const publicDir = path.resolve(__dirname, 'public')

app.use(express.static('public'))
app.use('/libs', express.static(path.join(__dirname, '../node_modules')))
app.use('/dist', express.static(path.join(__dirname, '../dist')))

app.get('/freeze-column', (req, res, next) => {
  res.sendFile(path.join(publicDir, '/freeze-column.html'))
})

app.listen(3000, () => console.log('App listening at 3000'))
