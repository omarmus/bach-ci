<header class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('admin/dashboard') ?>"><?php echo $site_name_ ?></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <nav class="collapse navbar-collapse navbar-ex1-collapse">
        <?php echo get_menu_admin($menu_, FALSE, $permissions_); ?>
        <div class="navbar-form navbar-left">
            <div class="input-group" id="button-search">
                <input type="search" class="form-control" style="width: 400px;" placeholder="Buscar artículos">
                <button class="btn btn-primary input-group-addon"><span class="glyphicon glyphicon-search"></span></button>
            </div>
        </div>
        <div class="navbar-form navbar-right">
            <button type="submit" class="btn btn-inverse hide" ><span class="glyphicon glyphicon-search"></span></button>
            <button type="submit" class="btn btn-inverse hide" ><span class="glyphicon glyphicon-question-sign"></span></button>
            <ul class="nav navbar-nav navbar-right" id="link-profile">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" >
                        <div id="photo-user-menu" style="<?php echo $userdata_['photo'] != "" ? "background-image: url('" . base_url() . 'assets/files/users/thumbnail/'. thumb_image($userdata_['photo']) . "')" : '' ?>">
                            <?php if ($userdata_['photo'] == ""): ?>
                                <img src="<?php echo base_url('assets/img/'. ($userdata_['gender'] == 'M' ? 'profile-m.jpg' : 'profile.png')) ?>" class="img-responsive" style="background-color: #ffffff;"/>
                            <?php endif ?>
                        </div>
                        <?php echo $userdata_['first_name'] . ' ' . $userdata_['last_name'] ?>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <?php if (isset($permissions_['admin/profile']) && $permissions_['admin/profile']['READ'] == "YES"): ?>
                        <li>
                            <a href="<?php echo base_url('profile') ?>">
                                <div class="btn btn-default logout"><span class="glyphicon glyphicon-user"></span></div> <?php echo lang('my_profile') ?>
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if (isset($permissions_['admin/setting']) && $permissions_['admin/setting']['READ'] == "YES"): ?>
                        <li>
                            <a href="<?php echo base_url('setting') ?>">
                                <div class="btn btn-default logout"><span class="glyphicon glyphicon-cog"></span></div> <?php echo lang('settings') ?>
                            </a>
                        </li>
                        <?php endif ?>
                        <li>
                            <a href="<?php echo base_url('logout') ?>">
                                <div class="btn btn-danger logout"><span class="glyphicon glyphicon-off"></span></div> <?php echo lang('logout') ?>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav><!-- /.navbar-collapse -->

</header><!-- /header -->
