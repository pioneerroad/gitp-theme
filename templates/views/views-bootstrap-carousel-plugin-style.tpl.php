<div id="views-bootstrap-carousel-<?php print $id ?>" class="<?php print $classes ?>" <?php print $attributes ?>>


  <!-- Carousel items -->
  <div class="carousel-inner">
    <?php foreach ($rows as $key => $row): ?>
      <div class="item <?php if ($key === 0) print 'active' ?>">
        <?php print $row ?>
      </div>
    <?php endforeach ?>
  </div>
    <?php if ($indicators): ?>
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <?php foreach ($rows as $key => $value): ?>
                <li data-target="#views-bootstrap-carousel-<?php print $id ?>" data-slide-to="<?php print $key ?>" class="<?php if ($key === 0) print 'active' ?>"></li>
            <?php endforeach ?>
        </ol>
    <?php endif ?>
</div>

