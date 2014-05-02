<div id="carousel-gallery" class="gallery carousel slide" data-ride="carousel">
  <button type="button" class="btn btn-danger btn-xs" title="Cerrar" data-toggle="tooltip" data-placement="bottom" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php for ($i=0; $i < count($photos); $i++): ?>
      <li data-target="#carousel-gallery" data-slide-to="<?php echo $i ?>" class="<?php echo $id_file == $photos[$i]->id_file ? 'active' : '' ?>"></li>
    <?php endfor ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php foreach ($photos as $photo): ?>
      <div class="item <?php echo $id_file == $photo->id_file ? 'active' : '' ?>">
        <img src="<?php echo base_url() . 'assets/files/' . $url . '/' . $photo->filename ?>" alt="">
        <?php if (strlen($photo->description)): ?>
          <div class="carousel-caption">
            <h3><?php echo $photo->description ?></h3>
          </div>
        <?php endif ?>
      </div>  
    <?php endforeach ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-gallery" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-gallery" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
