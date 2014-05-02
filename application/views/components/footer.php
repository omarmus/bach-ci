        </div> <!-- /wrap -->
        <footer>
            <div class="container text-center">
                <p>Departamento de investigación, Postgrado e interacción social Coordinación de Proyectos IDH - UMSA</p>
                <p>&copy; Turismo Virtual y Digital <?php echo date('Y') ?></p>
            </div>
        </footer>
        <!-- Modal -->
        <div class="modal fade" id="main-modal" tabindex="-1" role="dialog" aria-labelledby="main-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="main-modal-container"></div>
            </div>
        </div>
        <div id="fb-root"></div>
        <script type="text/js-tmpl" id="article-tmpl">
            <article class="col-md-3 col-sm-4 col-xs-12" data-role="{id_article}">
                <div>
                    <img class="img-responsive" src="<?php echo base_url() ?>{photo}">
                    <div>{body}</div>
                </div>  
            </article>
        </script>
        <script type="text/javascript">
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/lib/masonry.pkgd.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/lib/Lettering.js/jquery.lettering.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/lib/FitVids.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/lib/audiojs/audiojs/audio.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
        <script>
            // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            // g.src='//www.google-analytics.com/ga.js';
            // s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
