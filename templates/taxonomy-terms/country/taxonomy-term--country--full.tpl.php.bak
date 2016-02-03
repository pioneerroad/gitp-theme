<?php
/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: (deprecated) The unsanitized name of the term. Use $term_name
 *   instead.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct URL of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 *
 * @ingroup themeable
 */
function row_class($value) {
  switch($value) {
    case 'Not Commenced':
          $class = 'danger';
          break;
    case 'Implementation in Progress':
          $class = 'warning';
          break;
    case 'Complete':
          $class = 'success';
  }
  return $class;
}
?>
<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?>">

  <?php if (!$page): ?>
    <h2><a href="<?php print $term_url; ?>"><?php print $term_name; ?></a></h2>
  <?php endif; ?>

  <div class="content">
    <?php print(render($content['description'])); ?>
    <!-- Generate Data Table for country statistics -->
    <h4><?php print(t('Country Statistics'));?></h4>
    <table class="table-responsive table-hover">
      <?php if(isset($content['group_statistics']['field_country_total_pop'])): ?>
      <tr>
        <td><?php print(t('Total Population'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Estimated total population for a country"></span></td><td><?php print(render($content['group_statistics']['field_country_total_pop'])); ?></td>
      </tr>
      <?php endif; ?>
      <tr>
        <?php if(isset($content['group_statistics']['field_country_pop_growth_rate'])): ?>
      <tr>
        <td><?php print(t('Population Growth Rate'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Rate of population growth per annum"></span></td><td><?php print(render($content['group_statistics']['field_country_pop_growth_rate'])); ?><strong>%</strong></td>
      </tr>
      <?php endif; ?>
      <?php if(isset($content['group_statistics']['field_country_crude_birth_rate'])): ?>
        <tr>
          <td><?php print(t('Crude Birth Rate'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Crude Birth Rate"></span></td><td><?php print(render($content['group_statistics']['field_country_crude_birth_rate'])); ?> <strong><?php print(t('Per 1000')); ?></strong></td>
        </tr>
      <?php endif; ?>
      <?php if(isset($content['group_statistics']['field_country_crude_death_rate'])): ?>
        <tr>
          <td><?php print(t('Crude Death Rate'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Crude Death Rate"></span></td><td><?php print(render($content['group_statistics']['field_country_crude_death_rate'])); ?> <strong><?php print(t('Per 1000')); ?></strong></td>
        </tr>
      <?php endif; ?>
      <?php if(isset($content['group_statistics']['field_country_teenage_fertility'])): ?>
        <tr>
          <td><?php print(t('Teenage Fertility Rate'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Teenage Fertility Rate"></span></td><td><?php print(render($content['group_statistics']['field_country_teenage_fertility'])); ?> <strong><?php print(t('Per 1000')); ?></strong></td>
        </tr>
      <?php endif; ?>
      <?php if(isset($content['group_statistics']['field_country_total_fertility'])): ?>
        <tr>
          <td><?php print(t('Total Fertility Rate'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Total Fertility Rate"></span></td><td><?php print(render($content['group_statistics']['field_country_total_fertility'])); ?> <strong>%</strong></td>
        </tr>
      <?php endif; ?>
    </table>
    <p>&nbsp;</p>
    <h4><?php print(t('Implementation Status'));?></h4>
    <table class="table table-responsive">
      <?php if(isset($content['group_implementation_status']['field_country_impl_coordination'])): ?>
        <tr class="<?php print(row_class($content['group_implementation_status']['field_country_impl_coordination'][0]['#markup'])); ?>">
          <td><?php print(t('Coordination'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Establish national CRVS coordination mechanism "></span></td><td><?php print(render($content['group_implementation_status']['field_country_impl_coordination'])); ?></td>
        </tr>
      <?php endif; ?>
      <?php if(isset($content['group_implementation_status']['field_country_impl_assessment'])): ?>
        <tr class="<?php print(row_class($content['group_implementation_status']['field_country_impl_assessment'][0]['#markup'])); ?>">
          <td><?php print(t('Assessment'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Conduct standards-based comprehensive assessment of CRVS system"></span></td><td><?php print(render($content['group_implementation_status']['field_country_impl_assessment'])); ?></td>
        </tr>
      <?php endif; ?>
      <?php if(isset($content['group_implementation_status']['field_country_impl_targets'])): ?>
        <tr class="<?php print(row_class($content['group_implementation_status']['field_country_impl_targets'][0]['#markup'])); ?>">
          <td><?php print(t('Country Targets'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Set national target values"></span></td><td><?php print(render($content['group_implementation_status']['field_country_impl_targets'])); ?></td>
        </tr>
      <?php endif; ?>
      <?php if(isset($content['group_implementation_status']['field_country_impl_monitoring'])): ?>
        <tr class="<?php print(row_class($content['group_implementation_status']['field_country_impl_monitoring'][0]['#markup'])); ?>">
          <td><?php print(t('Monitoring Plan'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Develop and implement monitoring and reporting plan"></span></td><td><?php print(render($content['group_implementation_status']['field_country_impl_monitoring'])); ?></td>
        </tr>
      <?php endif; ?>
      <?php if(isset($content['group_implementation_status']['field_country_impl_inequality'])): ?>
        <tr class="<?php print(row_class($content['group_implementation_status']['field_country_impl_inequality'][0]['#markup'])); ?>">
          <td><?php print(t('Inequality Assessment'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Assess inequalities experienced by subgroups"></span></td><td><?php print(render($content['group_implementation_status']['field_country_impl_inequality'])); ?></td>
        </tr>
      <?php endif; ?>
      <?php if(isset($content['group_implementation_status']['field_country_impl_strategy'])): ?>
        <tr class="<?php print(row_class($content['group_implementation_status']['field_country_impl_strategy'][0]['#markup'])); ?>">
          <td><?php print(t('Strategy'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Develop and implement comprehensive mulitsectoral national CRVS strategy"></span></td><td><?php print(render($content['group_implementation_status']['field_country_impl_strategy'])); ?></td>
        </tr>
      <?php endif; ?>
      <?php if(isset($content['group_implementation_status']['field_country_impl_focal'])): ?>
        <tr class="<?php print(row_class($content['group_implementation_status']['field_country_impl_focal'][0]['#markup'])); ?>">
          <td><?php print(t('Focal Point'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Assign national CRVS focal point"></span></td><td><?php print(render($content['group_implementation_status']['field_country_impl_focal'])); ?></td>
        </tr>
      <?php endif; ?>
      <?php if(isset($content['group_implementation_status']['field_country_impl_report'])): ?>
        <tr class="<?php print(row_class($content['group_implementation_status']['field_country_impl_report'][0]['#markup'])); ?>">
          <td><?php print(t('Report'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Fulfil reporting requirements to ESCAP"></span></td><td><?php print(render($content['group_implementation_status']['field_country_impl_report'])); ?></td>
        </tr>
      <?php endif; ?>
    </table>
    <p></p>
    <h4><?php print(t('National Targets'));?></h4>
    <div id="national-targets">

        <div class="col-xs-4 goal" id="goal-1">
          <h4>Goal 1</h4>
          <?php if(isset($content['group_goals']['group_goal_1'])): ?>
            <?php foreach($content['group_goals']['group_goal_1'] as $index=>$goal): ?>
              <?php if(strpos($goal['#field_name'],'field_target') !== false): ?>
                <div class="item">
                  <p><strong><?php print($goal['#title']); ?></strong> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="<?php print($goal[0]['#markup']); ?>"></span></p>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="col-xs-4 goal" id="goal-2">
          <h4>Goal 2</h4>
          <?php if(isset($content['group_goals']['group_goal_2'])): ?>
            <?php foreach($content['group_goals']['group_goal_2'] as $index=>$goal): ?>
              <?php if(strpos($goal['#field_name'],'field_target') !== false): ?>
                <div class="item">
                  <p><strong><?php print($goal['#title']); ?></strong> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="<?php print($goal[0]['#markup']); ?>"></span></p>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="col-xs-4 goal" id="goal-3">
          <h4>Goal 3</h4>
          <?php if(isset($content['group_goals']['group_goal_3'])): ?>
            <?php foreach($content['group_goals']['group_goal_3'] as $index=>$goal): ?>
              <?php if(strpos($goal['#field_name'],'field_target') !== false): ?>
                <div class="item">
                  <p><strong><?php print($goal['#title']); ?></strong> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="<?php print($goal[0]['#markup']); ?>"></span></p>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
    </div>
  </div>

</div>
