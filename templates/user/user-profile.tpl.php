<?php
/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 */
?>
<div class="profile"<?php print $attributes; ?>>
  <div class="row">
    <?php print(render($content['field_member_fullname'])); ?>
    <?php if($rscg_member): ?><div class="member-badge"><div><span class="glyphicon glyphicon-certificate"></span><?php print(t('RSG Member')); ?></div></div><?php endif; ?>
  </div>
  <div class="clearfix"></div>
  <div class="container">
    <?php if($content['field_image']): ?>
      <div class="row">
        <div class="col-md-4">
          <?php print(render($content['field_image'])); ?>
        </div>
        <div class="col-md-8">
          <?php print(render($content['field_member_about'])); ?>
          <div class="metadata relationships">
            <div class="row"><?php print(render($content['field_partner_organisation'])); ?></div>
            <div class="row"><?php print(render($content['field_member_job_title'])); ?></div>
            <div class="row"><?php print(render($content['field_country'])); ?></div>
            <div class="row"><?php print(render($content['field_member_working_country'])); ?></div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="row">
        <div class="col-md-12">
          <?php print(render($content['group_content'])); ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
