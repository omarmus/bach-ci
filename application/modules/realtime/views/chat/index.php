<div id="chat">
    <div class="header">
        <strong>Chat</strong>
        <!-- <div class="options"><strong>Chat</strong></div> -->
    </div>
    <div class="chat-body">
        <?php foreach ($users_ as $user): ?>
        <?php $pk = $user->id_user ?>
        <div class="user" id="list-user-<?php echo $pk ?>" data-role="<?php echo $pk ?>">
            <?php $image = count($user->image) ? 'assets/files/users/thumbnail/' . thumb_image($user->image) : ('assets/img/' . ($user->gender == 'M' ? 'profile-m.jpg' : 'profile.png')) ?>
            <img src="<?php echo base_url() . $image ?>" alt="">
            <div><?php echo $user->first_name ?> <?php echo $user->last_name ?></div>
            <span></span>
            <input type="hidden" value="<?php echo $pk ?>" name="id">
        </div>    
        <?php endforeach ?>
    </div>
</div>

<script id="chat-user-tmpl" type="text/tmpl-js">
    <div id="user-{id}" class="user-chat">
        <div class="user-header active">
            <div class="connects {connect}">
                <span></span> <strong>{name}</strong>
                <div class="cont"></div>
                <button type="button" class="close">&times;</button>
            </div>
            <div class="options">
                <a href="#" class="{connect}" data-role="{id}">
                    <span></span> <strong>{name}</strong>   
                </a>
                <button type="button" class="close">&times;</button>
            </div>
        </div>
        <div class="user-body">
            <div class="content">
                <div></div>
            </div>
            <textarea id="send-message-{id}"></textarea>
            <div class="btn-emoticons" id="emoticons-{id}"><div></div></div>
            <div class="emoticons">
                <span title=":)" class="emoticon emoticon-smile"></span>
                <span title=":(" class="emoticon emoticon-frown"></span>
                <span title=":P" class="emoticon emoticon-tongue"></span>
                <span title="=D" class="emoticon emoticon-grin"></span>
                <span title=":o" class="emoticon emoticon-gasp"></span>
                <span title=";)" class="emoticon emoticon-wink"></span>
                <span title=":v" class="emoticon emoticon-pacman"></span>
                <span title="&gt;:(" class="emoticon emoticon-grumpy"></span>
                <span title=":/" class="emoticon emoticon-unsure"></span>
                <span title=":'(" class="emoticon emoticon-cry"></span>
                <span title="^_^" class="emoticon emoticon-kiki"></span>
                <span title="8)" class="emoticon emoticon-glasses"></span>
                <span title="B|" class="emoticon emoticon-sunglasses"></span>
                <span title="&lt;3"  class="emoticon emoticon-heart"></span>
                <span title="3:)" class="emoticon emoticon-devil"></span>
                <span title="O:)" class="emoticon emoticon-angel"></span>
                <span title="-_-" class="emoticon emoticon-squint"></span>
                <span title="o.O" class="emoticon emoticon-confused"></span>
                <span title="&gt;:o" class="emoticon emoticon-upset"></span>
                <span title=":3" class="emoticon emoticon-colonthree"></span>
            </div>
        </div>
    </div>
</script>

<script id="message-tmpl" type="text/tmpl-js">
    <div class="message">
        <img src="{image}">
        <div>{message}</div>
        <strong>{date}</strong>
    </div>
</script>

<style type="text/css">
/* ==========================================================================
                                    C H A T
    ========================================================================== */
    #chat {height: 50%; width: 100%;}
    #chat .chat-body > div {padding: 2px 5px 3px; margin-top: 2px; cursor: pointer; margin-bottom: 1px;}
    #chat .chat-body > div:hover {background-color: #E7E7E7;}
    #chat .chat-body > div:hover:before {
        content: "";
        width: 100%;
        border-bottom: 1px solid #DDDDDD;
        position: absolute;
        bottom: 0;
        left: 0;
    }
    #chat .chat-body > div:hover:after {
        content: "";
        width: 100%;
        border-bottom: 1px solid #DDDDDD;
        position: absolute;
        top: -1px;
        left: 0;
    }
    #chat .chat-body span {position: absolute; height: 8px; right: 10px; top: 14px; width: 8px; border-radius: 50%; background-color: #ccc;}
    #chat .connect span {background-color: #5CB85C;}
    #chat .connects > span {margin-top: 9px;}
    #chat img, .message > img {height: 30px; float: left; margin-right: 5px; width: 30px;}
    .user-chat {bottom: 0; position: fixed; right: 310px; width: 260px; z-index: 1030;}
    .user-chat a {padding-right: 25px; color: #ffffff;}
    .user-chat .user-body {background-color: #ffffff; position: relative; border: 1px solid #DDDDDD; border-top: none;}
    .user-chat textarea {-moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; border: none; border-top: 1px solid #ddd; width: 100%; height: 30px; resize: none; box-shadow: none; border-radius: 0; font-size: 12px; margin: 0; padding-right: 30px; padding-left: 10px; line-height: 30px;}
    .user-chat .empty {background-color: #FAFAFA; line-height: 280px; text-align: center;}
    .user-chat .close {position: absolute; margin-left: 5px; right: 10px; top: 3px;}
    .user-chat .content {height: 250px; overflow: auto; padding-top: 10px;}
    .user-chat .cont:before {border-left: 1px solid transparent; border-right: 3px solid transparent; border-top: 5px solid #D2322D; bottom: -5px; content: ""; height: 0; position: absolute; right: 4px; width: 0;}
    .user-chat .cont {display: none; background-color: #D2322D; border-radius: 4px 4px 4px 4px; color: #FFFFFF; height: 16px; position: absolute; right: 26px; top: -7px; width: 18px;}
    .connects i {float: left;margin: 6px 0 0;}
    .chat-header, .user-header {cursor: pointer; height: 24px; line-height: 24px;}
    .chat-header > div, .user-header > div {padding: 0 10px; font-size: 12px;}
    .chat-header .connects, .user-header .connects {box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.4); background-color: #FFFFFF; border-color: #CCCCCC; color: #333333;display: block;}
    .chat-header .connects:hover, .user-header .connects:hover {background: #f0f0f0;}
    .chat-header .options, .user-header .options {background-color: #428BCA; border-color: #357EBD; color: #FFFFFF;}
    .user-header .options {display: none;}
    .user-header.active .connects {display: none;}
    .user-header.active .options {display: block;}
    .chat-body {height: 100%; overflow: auto;}
    .user-header .connect span, .chat-header.connect .connects > span {float: left; height: 8px; width: 8px; border-radius: 50%; background-color: #5CB85C; margin: 9px 5px 0 0;}
    .user {position: relative;}
    .user > div { line-height: 30px;}
    .message {border-top: 1px solid #EEEEEE; margin: 3px 10px 0; padding: 5px 0; position: relative;}
    .message strong {position: absolute; color: #777; right: 10px; display: none; top: -9px; background-color: #fff; font-size: 10px; padding: 0 3px;}
    .message:hover strong {display: block;}
    .message > div {min-height: 30px; font-size: 12px;}
    .btn-emoticons {right: 0; bottom: 0; position: absolute; width: 30px; height: 30px; cursor: pointer;}
    .btn-emoticons div, .emoticon {background: url(../img/emoticons.jpg) 0 0 no-repeat; height: 16px; width: 16px;}
    .btn-emoticons div {margin: 7px auto 0;}
    .emoticons:before {border-left: 12px solid transparent; border-right: 12px solid transparent; border-top: 9px solid #D0D0D0; bottom: -9px; content: ""; height: 0; position: absolute; right: 0; width: 0;}
    .emoticons {background-color: #FAFAFA; border: 1px solid #DDDDDD; bottom: 34px; box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.2); display: none; height: 86px; padding: 5px; position: absolute; right: 3px; width: 220px;}
    .emoticon {display: inline-block; vertical-align: top;}
    .emoticons > .emoticon {cursor: pointer; margin: 5px;}
    .emoticon.emoticon-smile {background-position: 0 0;}
    .emoticon.emoticon-frown {background-position: -16px 0;}
    .emoticon.emoticon-tongue {background-position: -32px 0;}
    .emoticon.emoticon-grin {background-position: -48px 0;}
    .emoticon.emoticon-gasp {background-position: -64px 0;}
    .emoticon.emoticon-wink {background-position: -80px 0;}
    .emoticon.emoticon-pacman {background-position: -304px 0;}
    .emoticon.emoticon-grumpy {background-position: -128px 0;}
    .emoticon.emoticon-unsure {background-position: -144px 0;}
    .emoticon.emoticon-cry {background-position: -160px 0;}
    .emoticon.emoticon-kiki {background-position: -240px 0;}
    .emoticon.emoticon-glasses {background-position:-96px 0;}
    .emoticon.emoticon-sunglasses {background-position: -112px 0;}
    .emoticon.emoticon-heart {background-position:-224px 0;}
    .emoticon.emoticon-devil {background-position: -176px 0;}
    .emoticon.emoticon-angel {background-position: -192px 0;}
    .emoticon.emoticon-squint {background-position: -256px 0;}
    .emoticon.emoticon-confused {background-position: -272px 0;}
    .emoticon.emoticon-upset {background-position: -288px 0;}
    .emoticon.emoticon-colonthree {background-position: -320px 0;}
</style>
