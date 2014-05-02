// Start up a Node server with Socket.IO
var io = require('socket.io').listen(8888, {
  'log level' : 1
});

// Let Node know that you want to use Mysql2
var mysql = require('mysql2'),
    connection = mysql.createConnection({ user: 'root', database: 'bach'}),
    PHPUnserialize = require('php-unserialize');

// user which are currently connected to the chat
var users = [];

// Listen for the client connection event
io.sockets.on('connection', function (socket) {
  console.log('Conectado!')
  // Let everyone know it's working
  socket.emit('startup', { message: 'I Am Working!!' });

  /* C H A T */

  // El cliente se une al chat
  socket.on('joinChat', function(cookie){
    var idUser, user;
    cookie = PHPUnserialize.unserialize(urldecode(cookie));
    connection.query('SELECT * FROM sys_sessions WHERE session_id="'+cookie.session_id+'"', function(err, res) {
      if (res) {
        user = PHPUnserialize.unserialize(res[0].user_data);
        idUser = user.id_user;

        // Join a room chat for one 
        console.log('Joining chat user : ', idUser);
        socket.join(idUser);
        socket.room = idUser;

        // add the client's user to the global list
        if (users.indexOf(idUser) == -1) {
          users.push(parseInt(idUser));
        }
        socket.idUser = parseInt(idUser);
        
        io.sockets.emit('userConnect', users);
        // socket.broadcast.to(idUser).emit('usersListConnect', 'holaaaaaa!!!!');
        console.log(users);
      } else {
        console.log('Invalid user');
      }
    });
  });

  socket.on('sendMessageChat', function (id_sender, id_receiver, message, date) {

    // Recibiendo y enviando mensaje de chat de un usuario a otro
    var data = {id_sender : id_sender, id_receiver : id_receiver, message: message, date: date};
    socket.broadcast.to(id_receiver).emit('newMessageChat', data);

  });

  socket.on('disconnect', function () {
    delete users[users.indexOf(socket.idUser)];
    users = users.filter(Boolean);
    io.sockets.emit('userDisconnect', socket.idUser);
    socket.leave(socket.room);
  });

});

function urldecode (str) {
  return decodeURIComponent((str + '').replace(/%(?![\da-f]{2})/gi, function () {
    return '%25';
  }).replace(/\+/g, '%20'));
}
