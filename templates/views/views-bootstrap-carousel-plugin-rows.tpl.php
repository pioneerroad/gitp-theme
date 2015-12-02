<?php if (!empty($title) || !empty($description)): ?>
  <div class="carousel-caption">
      <div class="col-first">
          <?php print $image ?>
      </div>
      <div class="col-second">
          <?php if (!empty($title)): ?>
              <h3><?php print $title ?></h3>
          <?php endif ?>
          <?php if (!empty($description)): ?>
              <p><?php print $description ?></p>
          <?php endif ?>
      </div>
  </div>
<?php endif ?>