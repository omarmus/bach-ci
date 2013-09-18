        </div> <!-- /wrap -->
        <footer>
            <p class="text-muted credit">&copy; Bach PHP <?php echo date('Y') ?> - Disponible en <?php echo anchor('https://github.com/ozielmus/bach', 'Github') ?></p>
        </footer>
        <!-- Modal main -->
        <div id="main-modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content"></div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- /Modal main -->
        <script src="<?php echo base_url('lib/jquery.easing/jquery.easing.1.3.js') ?>"></script>
        <script type="text/javascript">      
            $(window).load(function() { 
                $('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){$(this).css('display','none')});  
            });                         
        </script>
        <script src="<?php echo base_url('lib/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('lib/jquery.datatables/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('lib/jquery.gritter/js/jquery.gritter.min.js') ?>"></script>
        <script src="<?php echo base_url('js/main.js') ?>"></script>
    </body>
</html>