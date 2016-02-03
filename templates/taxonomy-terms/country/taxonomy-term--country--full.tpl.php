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
function select_icon($value) {
    switch($value) {
        case 'Not Commenced':
            $ext = 'red';
            break;
        case 'Implementation in Progress':
            $ext = 'blue';
            break;
        case 'Complete':
            $ext = 'green';
            break;
        default:
            $ext = 'grey';
    }
    return $ext;
}

$path_to_icons = '/sites/all/themes/custom/gitp/assets/img/ui-icons/';

?>
<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?>">

  <?php if (!$page): ?>
    <h2><a href="<?php print $term_url; ?>"><?php print $term_name; ?></a></h2>
  <?php endif; ?>

  <div class="content">
    <div class="data-box row">
        <div class="col-sm-4">
            <div class="content-summary-box news-summary">
                <div class="wrapper">
                    <a href="#"><h4 class="item-header">Contact Information</h4></a>
                    <div class="item-body">
                        <?php if(isset($content['group_country_contacts']['field_country_crvs_focal_point'])): ?>
                            <?php print(render($content['group_country_contacts']['field_country_crvs_focal_point'])); ?>
                            <br/>
                        <?php endif; ?>
                        <?php if(isset($content['group_country_contacts']['field_country_rsg_member'])): ?>
                            <?php print(render($content['group_country_contacts']['field_country_rsg_member'])); ?>
                            <br/>
                        <?php endif; ?>
                        <?php if(isset($content['group_country_contacts']['field_country_website'])): ?>
                            <?php print(render($content['group_country_contacts']['field_country_website'])); ?>
                            <br/>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="content-summary-box blog-summary">
                <div class="wrapper">
                    <a href="#"><h4 class="item-header">Key Indicators</h4></a>
                    <div class="item-body row">
                        <div class="col-xs-6">
                            <?php if(isset($content['group_statistics']['field_country_total_pop'])): ?>
                                <strong><?php print(t('Total Population'));?></strong> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Estimated total population for a country"></span>
                                <br/>
                                <?php print(render($content['group_statistics']['field_country_total_pop'])); ?>
                            <?php endif; ?>
                                <br/>
                                <br/>
                            <?php if(isset($content['group_statistics']['field_country_teenage_fertility'])): ?>
                                <strong><?php print(t('Teenage Fertility Rate'));?></strong> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Teenage Fertility Rate"></span>
                                <br/>
                                <?php print(render($content['group_statistics']['field_country_teenage_fertility'])); ?> <strong><?php print(t('Per 1000')); ?>
                            <?php endif; ?>
                                    <br/>
                                    <br/>
                            <?php if(isset($content['group_statistics']['field_country_total_fertility'])): ?>
                                <strong><?php print(t('Total Fertility Rate'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Total Fertility Rate"></span>
                                    <br/>
                                    <?php print(render($content['group_statistics']['field_country_total_fertility'])); ?> <strong>%</strong>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-6">
                            <?php if(isset($content['group_statistics']['field_country_pop_growth_rate'])): ?>
                                <?php print(t('Population Growth Rate'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Rate of population growth per annum"></span>
                                <br/>
                                <?php print(render($content['group_statistics']['field_country_pop_growth_rate'])); ?><strong>%</strong>
                            <?php endif; ?>
                                <br/>
                                <br/>
                            <?php if(isset($content['group_statistics']['field_country_crude_birth_rate'])): ?>
                                <?php print(t('Crude Birth Rate'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Crude Birth Rate"></span>
                                <br/>
                                <?php print(render($content['group_statistics']['field_country_crude_birth_rate'])); ?> <strong><?php print(t('Per 1000')); ?></strong>
                                <br/>
                                <br/>
                            <?php endif; ?>
                                <br/>
                            <?php if(isset($content['group_statistics']['field_country_crude_death_rate'])): ?>
                                <?php print(t('Crude Death Rate'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Crude Death Rate"></span>
                                <br/>
                                <?php print(render($content['group_statistics']['field_country_crude_death_rate'])); ?> <strong><?php print(t('Per 1000')); ?></strong>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="implementation">
        <div class="content-summary-box publication-summary">
            <div class="wrapper">
                <a href="#"><h4 class="item-header">Implementation Status</h4></a>
                <div class="item-body">
                    <div class="col-xs-6">
                        <div class="col-xs-1 icon">
                            <img src="<?php print($path_to_icons); ?>hex-icons-lg-<?php print(select_icon($content['group_implementation_status']['field_country_impl_coordination'][0]['#markup'])); ?>.svg" />
                        </div>
                        <div class="col-xs-11">
                            <?php print(t('National CRVS Coordination Mechanism'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Establish national CRVS coordination mechanism "></span>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <div class="col-xs-1 icon">
                            <img src="<?php print($path_to_icons); ?>hex-icons-lg-<?php print(select_icon($content['group_implementation_status']['field_country_impl_assessment'][0]['#markup'])); ?>.svg" />
                        </div>
                        <div class="col-xs-11">
                            <?php print(t('Comprehensive Assessment'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Conduct standards-based comprehensive assessment of CRVS system "></span>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <div class="col-xs-1 icon">
                            <img src="<?php print($path_to_icons); ?>hex-icons-lg-<?php print(select_icon($content['group_implementation_status']['field_country_impl_targets'][0]['#markup'])); ?>.svg" />
                        </div>
                        <div class="col-xs-11">
                            <?php print(t('National Targets'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Set national target values "></span>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <div class="col-xs-1 icon">
                            <img src="<?php print($path_to_icons); ?>hex-icons-lg-<?php print(select_icon($content['group_implementation_status']['field_country_impl_monitoring'][0]['#markup'])); ?>.svg" />
                        </div>
                        <div class="col-xs-11">
                            <?php print(t('Monitoring and reporting plan'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Develop and implement monitoring and reporting plan "></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="col-xs-1 icon">
                            <img src="<?php print($path_to_icons); ?>hex-icons-lg-<?php print(select_icon($content['group_implementation_status']['field_country_impl_inequality'][0]['#markup'])); ?>.svg" />
                        </div>
                        <div class="col-xs-11">
                            <?php print(t('Inequality Assessment'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Assess inequalities experienced by subgroups "></span>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <div class="col-xs-1 icon">
                            <img src="<?php print($path_to_icons); ?>hex-icons-lg-<?php print(select_icon($content['group_implementation_status']['field_country_impl_strategy'][0]['#markup'])); ?>.svg" />
                        </div>
                        <div class="col-xs-11">
                            <?php print(t('National CRVS strategy'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Develop and implement comprehensive mulitsectoral  "></span>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <div class="col-xs-1 icon">
                            <img src="<?php print($path_to_icons); ?>hex-icons-lg-<?php print(select_icon($content['group_implementation_status']['field_country_impl_focal'][0]['#markup'])); ?>.svg" />
                        </div>
                        <div class="col-xs-11">
                            <?php print(t('National CRVS Focal Point'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Assign national CRVS focal point  "></span>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <div class="col-xs-1 icon">
                            <img src="<?php print($path_to_icons); ?>hex-icons-lg-<?php print(select_icon($content['group_implementation_status']['field_country_impl_report'][0]['#markup'])); ?>.svg" />
                        </div>
                        <div class="col-xs-11">
                            <?php print(t('Reporting to ESCAP'));?> <span class="glyphicon glyphicon-info-sign" data-toggle="popover" data-placement="right" data-content="Fulfil reporting requirements to ESCAP "></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="legend" style="background-color: white; padding-top:10px; padding-bottom: 10px; border-top:1px solid #ededed">
            <div class="col-xs-3">
                <div class="col-xs-3">
                    <img src="<?php print($path_to_icons); ?>hex-icons-lg-green.svg" alt=""/>
                </div>
                <div class="col-xs-9">
                    Complete
                </div>
            </div>
            <div class="col-xs-3">
                <div class="col-xs-3">
                    <img src="<?php print($path_to_icons); ?>hex-icons-lg-blue.svg" alt=""/>
                </div>
                <div class="col-xs-9">
                    In Progress
                </div>
            </div>
            <div class="col-xs-3">
                <div class="col-xs-3">
                    <img src="<?php print($path_to_icons); ?>hex-icons-lg-red.svg" alt=""/>
                </div>
                <div class="col-xs-9">
                    Not Started
                </div>
            </div>
            <div class="col-xs-3">
                <div class="col-xs-3">
                    <img src="<?php print($path_to_icons); ?>hex-icons-lg-grey.svg" alt=""/>
                </div>
                <div class="col-xs-9">
                    No Information
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
      <div id="national-targets">
          <div class="content-summary-box blog-summary">
              <div class="wrapper">
                  <a href="#"><h4 class="item-header">National Targets</h4></a>

              <!--<div class="item-body">-->
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
  </div>
</div>
