$(function() {

  window.Chat = {

    // Instantiate the Socket.IO client and connect to the server
    socket : io.connect('http://localhost:8888'),

    // Set up the initial event handlers for the Socket.IO client
    bindEvents : function() {
      this.socket.on('startup',Chat.startupMessage);
      this.socket.on('userConnect', Chat.userConnect);
      //this.socket.on('usersListConnect', Chat.usersListConnect);
      this.socket.on('userDisconnect', Chat.userDisconnect);
      this.socket.on('newMessageChat', Chat.newMessageChat);
    },

    // This just indicates that a Socket.IO connection has begun.
    startupMessage : function(data) {
      console.log(data.message);
    },

    /* C H A T */

    joinChat : function () {
      console.log('iniciando chat');
      // get the CodeIgniter sessionID from the cookie
      var sessionId = readCookie('bcsession');

      if(sessionId) {
        // Send the sessionID to the Node server in an effort to join a 'room'
        Chat.socket.emit('joinChat',sessionId);
      } else {
        // If no sessionID exists, don't try to join a room.
        console.log('No session id found. Broadcast disabled.');
        //forward to logout url?
      }
    },

    // Indica que el usuario se a conectado al chat
    userConnect : function (users) {
      for (var i = 0; i < users.length; i++) {
        $('#list-user-' + users[i]).addClass('connect');
      }; 
      $header = $('.chat-header');
      $header.find('.connects strong').html('Chat (' + (users.length - 1) + ')');
      $header[users.length > 1 ? 'addClass' : 'removeClass']('connect');
    },


    // Indica que el usuario se a desconectado del chat
    userDisconnect : function (idUser, users_length) {
      console.log('user %s connect ', idUser)
      $('#list-user-' + idUser).removeClass('connect');
      var total = $('.chat-body .connect').length;
      $header = $('.chat-header');
      $header.find('.connects strong').html('Chat (' + total + ')');
      $header[total > 0 ? 'addClass' : 'removeClass']('connect');
    },

    //Dibujando mensaje que le llegó al usuario
    newMessageChat : function (data) {

      var total_views = $('.user-chat:visible').length;
      // Creando panel de chat del usuario si no existe el panel
      if (typeof users[data.id_sender] === 'undefined') {
        var $user = $('#list-user-' + data.id_sender);
        var user = {
            id : data.id_sender,
            image : $user.children('img').prop('src'),
            name : $user.children('div').html(),
            connect : $user.hasClass('connect') ? 'connect' : ''
        }
        create_chat(user, 'prepend');
        _user_current = user.id;
        $('#user-' + _user_current).show().css({right: (270 * total_views + _right_base) + 'px'}).find('.user-header').addClass('active').next().show();
      } else {
        var cont = $('#user-' + data.id_sender).find('.cont')[0];
        cont = parseInt($(cont).html());
        cont = isNaN(cont) ? 0 : cont;
        console.log(cont);

        $(cont).html(cont++);
      }
      create_message(data.id_sender, users[data.id_sender], data.message, data.date);
      
    },

    // Enviando mensaje al servidor del chat
    sendMessageChat : function (id_receiver, message, date) {
      Chat.socket.emit('sendMessageChat', _my_user.id, id_receiver, message, date);
    }

  } // end window.Chat

  // Start it up!
  Chat.bindEvents();

  // Read a cookie. http://www.quirksmode.org/js/cookies.html#script
  function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
  }

});