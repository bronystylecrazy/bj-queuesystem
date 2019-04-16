const app = require('express')();
const colors = require('colors');
var http = require('http').Server(app);
const io = require('socket.io')(http);


io.on('connection', function (socket) {
    console.log('A WEBSITE connected');
    console.log(socket.id.green);

    socket.on('disconnect', function(){
        console.log('user disconnected');
        console.log(socket.id.red);
    });
    socket.on('queueView',function(data){
        console.log('qview.php'.yellow + '  ' + data.green);
    });
    socket.on('announcer',function(data){
        console.log('announcer.php'.cyan + '  ' + data.green);
    });
    socket.on('queue',function(data){
        io.emit('queue',data);
        console.log('qview.php'.yellow + '  ' + data.america);
    })
});


http.listen(3000, function () {
    console.log('listening on *:3000');
});