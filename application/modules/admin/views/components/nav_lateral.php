<nav id="nav-lateral">
    <div>
       <a href="<?php echo base_url('dashboard') ?>" <?php echo $title_ == 'Dashboard' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-home"></a>
    </div>
    <?php if (isset($permissions_['realtime/notification']) && $permissions_['realtime/notification']['READ'] == "YES"): ?>
    <div>
        <a href="#" id="button-notifications"><span class="glyphicon glyphicon-globe"></a>
    </div>    
    <?php endif ?>
    <?php if (isset($permissions_['realtime/chat']) && $permissions_['realtime/chat']['READ'] == "YES"): ?>
    <div>
        <a href="#" id="button-chat"><span class="glyphicon glyphicon-comment"></a>
    </div>    
    <?php endif ?>
    <?php if (isset($permissions_['admin/setting']) && $permissions_['admin/setting']['READ'] == "YES"): ?>
    <div>
        <a href="<?php echo base_url('setting') ?>" <?php echo $title_ == 'Settings' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-cog"></a>
    </div>    
    <?php endif ?>
</nav>