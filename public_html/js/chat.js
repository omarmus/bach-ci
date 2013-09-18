var users = [],
    _user_current = 0,
    _right_base = 275,
    patterns = [],
    metachars = /[[\]{}()*+?.\\|^$\-,&#\s]/g,
    emoticons = {
        ":)" : "emoticon-smile",
        ":-)" : "emoticon-smile",
        ":(" : "emoticon-frown",
        ":-(" : "emoticon-frown",
        ":P" : "emoticon-tongue",
        ":-P" : "emoticon-tongue",
        "=D" : "emoticon-grin",
        ":D" : "emoticon-grin",
        ":o" : "emoticon-gasp",
        ";)" : "emoticon-wink",
        ";-)" : "emoticon-wink",
        ":v" : "emoticon-pacman",
        "&gt;:(" : "emoticon-grumpy",
        ">:(" : "emoticon-grumpy",
        ":/" : "emoticon-unsure",
        ":'(" : "emoticon-cry",
        "^_^" : "emoticon-kiki",
        "8)" : "emoticon-glasses",
        "B|" : "emoticon-sunglasses",
        "&lt;3"  : "emoticon-heart",
        "<3"  : "emoticon-heart",
        "3:)" : "emoticon-devil",
        "O:)" : "emoticon-angel",
        "-_-" : "emoticon-squint",
        "o.O" : "emoticon-confused",
        ">:o" : "emoticon-upset",
        ":3" : "emoticon-colonthree"
    };

//Templates
var tmpl_message, tmpl_chat_user;

function init_chat() {
    add_chats();

    // Cached templates
    tmpl_message = $('#message-tmpl').html(),
    tmpl_chat_user = $('#chat-user-tmpl').html();

    $('#chat .chat-header').on('click', function () {
        $(this).toggleClass('active').next().toggle();
    });

    //Init my sessión in chat
    MY_Socket.joinChat(); 
}

// Agrega un nuevo chat al tab panel
function add_chats () {
    $('.user').on('click', function () {
        $this = $(this);

        var user = {
            id : $this.children('input').val(),
            image : $this.children('img').prop('src'),
            name : $this.children('div').html(),
            connect : $this.hasClass('connect') ? 'connect' : ''
        }

        var total_views = $('.user-chat:visible').length;

        if (typeof users[user.id] === 'undefined') {
            create_chat(user);
        }

        _user_current = user.id;
        $('#user-' + user.id).show().css({right: (270 * total_views + _right_base) + 'px'}).find('.user-header').addClass('active').next().show();
        $('#send-message-' + user.id).focus();
    });
}

function create_chat (user, prepend) {
    users[user.id] = user;

    $('body').append(nano(tmpl_chat_user, user));

    set_events_chat(user.id);

    //Loading previous chats
    $.post(_base_url + 'admin/chat/loads_chats/' + _my_user.id + '/' + user.id, function (response) {
        var oUser, position;
        for (var i = 0, j = response.length - 1; i < response.length; i++, j--) {
            if (prepend && i == 0) continue;
            position = prepend ? i : j ;
            oUser = response[position].id_sender == _my_user.id ? _my_user : user;
            create_message(user.id, oUser, response[position].message, response[position].created, prepend || 'append' );
        };
    }, 'json');
}

function create_message (id, user, message, date, prepend) {
    var $div = $('#user-' + id + ' .content > div');
    user = $.extend(user, { message : replaceEmoticons(message), date : date });
    $div[prepend || 'append'](nano(tmpl_message, user)).parent().scrollTop($div[0].scrollHeight);
}

function set_events_chat (id) {
    $chat = $('#user-' + id);

    // Toggle chat user

    $chat.find('.user-header').on('click', function () {
        $(this).toggleClass('active').next().toggle();
        _user_current = id;
        $(this).find('.cont').html('').hide();
        $('#send-message-' + _user_current).focus();
    });

    // Close chat

    $chat.find('.close').on('click', function () {
        $(this).parent().parent().parent().hide();
        var i = 0;
        $('.user-chat:visible').each(function () {
            $(this).css({right: (270 * (i++) + _right_base) + 'px'});
        });
    });

    // Send message

    $('#send-message-'+id).on('keyup', function (e) {
        if (e.keyCode == 13 && this.value != null && this.value.length && !/^\s+$/.test(this.value)) {
            var message = this.value;
            $.post(_base_url + 'admin/chat/save', {id_receiver: _user_current, message: message}, function (response) {
                create_message(_user_current, _my_user, message, response.date);

                // Sending message in chat server
                MY_Socket.sendMessageChat(_user_current, message, response.date)
            }, 'json');
            this.value = '';
        }
    }).on('focus', function () {
        $('#emoticons-' + id).next().hide();
        _user_current = id;
    });

    // Emoticons selector

    $('#emoticons-' + id).on('click', function () {
        $(this).next().toggle();
    }).next().find('.emoticon').on('click', function () {
        var text = document.getElementById('send-message-' + id)
        text.value += this.title + ' ';
        text.focus();
    });
}



// build a regex pattern for each defined property
for (var i in emoticons) {
    if (emoticons.hasOwnProperty(i)){ // escape metacharacters
        patterns.push('('+i.replace(metachars, "\\$&")+')');
    }
}

function replaceEmoticons(text) {
    // build the regular expression and replace
    return text.replace(new RegExp(patterns.join('|'),'g'), function (match) {
        return typeof emoticons[match] != 'undefined' ?
        '<span title="' + match + '" class="emoticon ' + emoticons[match] + '"></span>' :
        match;
    });
}