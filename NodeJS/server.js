let http = require('http')

let server = http.createServer()

server.on('request', function (request,response){
    response.writeHead(200)
    response.end('salut')

})
server.listen(8080)