<?php
/**
 * Throughout the site, resources are displayed as table of titles, with (potentially) multiple languages.
 */
?>

<?php $resources = $element['resources_table_data']; ?>
<?php $language_count = $element['available_language_count']; ?>
<table>
    <?php foreach($resources as $key=>$resource): ?>
        <?php $i = 0; ?>
        <tr>
            <td><?php print($key); ?></td>
            <?php foreach($resource as $language=>$data): ?>
                <?php if($data): ?>
                    <td><?php print l($language, $data) ;?></td>
                    <?php else: ?>
                    <td class="disabled"><?php print($language); ?></td>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endforeach; ?>
            <?php while($i < $language_count): ?>
                <td>&nbsp;</td>
                <?php $i++; ?>
            <?php endwhile; ?>
        </tr>
    <?php endforeach; ?>
</table>