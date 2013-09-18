<header class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url('admin/dashboard') ?>"><?php echo $site_name_ ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <nav class="collapse navbar-collapse navbar-ex1-collapse">
        <?php echo get_menu($menu_, FALSE, $permissions_); ?>
        <div class="navbar-form navbar-right">
            <input class="form-control" style="display: none; margin-right: 14px;" type="text" placeholder="Search">
            <button type="submit" class="btn btn-inverse hide" ><span class="glyphicon glyphicon-search"></span></button>
            <button type="submit" class="btn btn-inverse hide" ><span class="glyphicon glyphicon-question-sign"></span></button>
            <a href="<?php echo site_url('logout') ?>" class="btn btn-danger"><span class="glyphicon glyphicon-off"></span></a>
        </div>
    </nav><!-- /.navbar-collapse -->

</header><!-- /header -->
