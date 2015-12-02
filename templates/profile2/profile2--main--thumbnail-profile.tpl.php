<div class="<?php print $classes; ?> col-xs-6"<?php print $attributes; ?>>
    <div>
        <?php if($content['field_image']): ?>
            <?php print(render($content['field_image'])); ?>
        <?php endif; ?>
    </div>
    <b>
        <?php if($content['field_member_fullname']): ?>
            <?php print(render($content['field_member_fullname'])); ?>
        <?php endif; ?>
    </b>
</div>
