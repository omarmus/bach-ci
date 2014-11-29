        </div> <!-- /wrap -->
        <footer>
            <ul class="language" id="language">
                <li<?php echo $language == 'spanish' ? ' class="active"' : '' ?>><a data-role="spanish" href="#">Español</a></li>
                <li<?php echo $language == 'english' ? ' class="active"' : '' ?>><a data-role="english" href="#">English</a></li>
            </ul>
            <p class="text-muted credit text-right">&copy; <?php echo $site_name_ ?> <?php echo date('Y') ?> - Disponible en <?php echo anchor('https://github.com/omarmus/bach-ci', 'Github') ?></p>
        </footer>
        <div id="main-modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content"></div>
            </div>
        </div>
        <div id="second-modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content"></div>
            </div>
        </div>
        <div id="alert-modal" class="modal fade"></div>
        <script type="text/tmpl-js" id="tmpl-alert">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">{title}</h4>
                    </div>
                    <div class="modal-body">
                        {message}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default {button_cancel}" data-dismiss="modal" ><span class="glyphicon glyphicon-ban-circle"></span> <?php echo lang('cancel') ?></button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-ok"></span> <?php echo lang('ok') ?></button>
                    </div>
                </div>
            </div>
        </script>
        <script src="<?php echo base_url('assets/lib/jquery.easing/jquery.easing.1.3.js') ?>"></script>
        <script type="text/javascript">      
            $(window).load(function() { 
                $('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){$(this).css('display','none')});  
            });
        </script>
        <script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/lib/datepicker/js/bootstrap-datepicker.js') ?>"></script>
        <script src="<?php echo base_url('assets/lib/timepicker/js/bootstrap-timepicker.js') ?>"></script>
        <script src="<?php echo base_url('assets/lib/jquery.datatables/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/lib/jquery.gritter/js/jquery.gritter.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/main.js') ?>"></script>

        <!--<script src="<?php echo base_url('assets/lib/socket.io/socket.io.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/socket.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/chat.js') ?>"></script>-->
    </body>
</html>