<nav id="nav-lateral">
    <?php if (isset($permissions_['profile']) && $permissions_['profile']['READ'] == "YES"): ?>
    <div class="profile">
        <a href="<?php echo base_url('admin/profile') ?>" class="photo-user" style="<?php echo $userdata_['photo'] != "" ? "background-image: url('" . base_url() . 'files/users/thumbnail/'. thumb_image($userdata_['photo']) . "')" : '' ?>">
            <div class="text-center" style="display: none;">
                <?php echo $userdata_['first_name'] . " " . $userdata_['last_name'] ?>
                <a href="<?php echo base_url('admin/profile') ?>">Editar perfil</a>
            </div>
        <?php if ($userdata_['photo'] == ""): ?>
            <img src="<?php echo base_url('img/profile.png') ?>" class="img-responsive" />
        <?php endif ?>
        </a>
    </div> 
    <?php endif ?>
    <div>
       <a href="<?php echo base_url('admin/dashboard') ?>" <?php echo $title_ == 'Dashboard' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-home"></a>
    </div>
    <?php if (isset($permissions_['notification']) && $permissions_['notification']['READ'] == "YES"): ?>
    <div>
        <a href="#" id="button-notifications"><span class="glyphicon glyphicon-globe"></a>
    </div>    
    <?php endif ?>
    <?php if (isset($permissions_['chat']) && $permissions_['chat']['READ'] == "YES"): ?>
    <div>
        <a href="#" id="button-chat"><span class="glyphicon glyphicon-comment"></a>
    </div>    
    <?php endif ?>
    <?php if (isset($permissions_['setting']) && $permissions_['setting']['READ'] == "YES"): ?>
    <div>
        <a href="<?php echo base_url('admin/setting') ?>" <?php echo $title_ == 'Settings' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-cog"></a>
    </div>    
    <?php endif ?>
</nav>