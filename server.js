const express = require('express');

// inicializando:
const app = express();

// acessado o server:
const server = require('http').createServer(app);
const io = require('socket.io')(server);

// iniciando a var dos clientes:
const clients = [];
let messages = [];

io.on('connection', socket => {
    console.log(`Socket conectado: ${socket.id} `);

    socket.emit('previousMessage', messages);

    socket.on('sendMessage', data => {
        console.log(data);
        messages.push(data);

        socket.broadcast.emit('receivedMessage', data);
    });
});

// inicializando o servidor pra valer:
server.listen(3000, function() {
    console.log("Servidor Rodando na Porta 3000");
});

// page de teste:
app.get("/testeTop", function(req, res) {
    res.send("Servidor Rodando...");
});

// recebendo a requisição do Laravel:
app.post("/message", function(req, res) {
    var params = req.body;
    var clients = io.sockets.clients().sockets;

    for (const key in clients) {
        if (key != params.id) clients[key].emit("message", params);
    }

    res.send();
});

// recebendo a conexão dos usuários no servidor:
io.on("connection", function(client) {

    // adicionado mensagens:
    client.emit("welcome", {
        id: client.id
    });

});
