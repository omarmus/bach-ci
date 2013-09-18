<div id="chat">
    <div class="chat-header">
        <div class="connects"><i class="icon-user"></i><span></span><strong>Chat (0)</strong></div>
        <div class="options"><strong>Chat</strong></div>
    </div>
    <div class="chat-body">
        <?php foreach ($users_ as $user): ?>
        <?php $pk = $user->getPrimaryKey() ?>
        <div class="user" id="list-user-<?php echo $pk ?>" data-role="<?php echo $pk ?>">
            <img src="<?php echo base_url() ?>files/users/thumbnail/<?php echo thumb_image($user->getSysFiles()->getFileName()) ?>" alt="">
            <div><?php echo $user->getFirstName() ?> <?php echo $user->getLastName() ?></div>
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
