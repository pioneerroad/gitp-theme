<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<div id="region-top" class="region">
    <div class="container">
        <?php if($tabs && $logged_in): ?>
            <div id="tabs">
                <?php print(render($tabs)); ?>
            </div>
        <?php endif; ?>
        <?php if($page['top']): ?>
            <?php print(render($page['top'])); ?>
        <?php endif; ?>
    </div>
</div>
<div id="region-header"  class="region">
    <div class="container">
        <div class="row">
            <?php if($page['header']): ?>
                <?php print(render($page['header'])); ?>
            <?php endif; ?>
            <div class="logo-container">
                <div class="col col-xs-12 col-sm-4 logo">
                    <?php if ($logo): ?>
                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="hidden-xs" />
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col col-sm-8 site-title">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                        <img src="/sites/default/files/ui-files/gitp-site-title.svg" alt="<?php print t('Home'); ?>" />
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php if($page['main_menu']): ?>
    <div id="region-main-menu" class="region">
        <div class="container">
            <div class="row">
                <?php print theme('links__custom_main_menu', array('attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Main menu'))); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<div id="region-content-wrapper">
    <?php if($breadcrumb): ?>
        <?php print(render($breadcrumb)); ?>
    <?php endif; ?>
    <?php if($page['sidebar_first'] || $page['content'] || $page['sidebar_second']): ?>
        <div id="region-content" class="region">
            <div class="container">
                <?php if($messages): ?>
                    <?php print(render($messages)); ?>
                <?php endif; ?>
                <div class="row">
                    <?php if($page['sidebar_first']): ?>
                        <div class="sidebar-first">
                            <?php print(render($page['sidebar_first'])); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($page['content']): ?>
                        <div class="main-content">
                            <?php print(render($page['content'])); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($page['sidebar_second']): ?>
                        <div class="sidebar-second">
                            <?php print(render($page['sidebar_second'])); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($page['content_bottom']): ?>
        <div id="region-content-bottom" class="region">
            <div class="container content-wrapper">
                <?php print(render($page['content_bottom'])); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<div id="region-footer"  class="region">
    <div class="container">
        <div class="row">
            <div class="footer-col" id="footer-col-1"">
                <?php if($page['footer_col1']): ?>
                    <?php print(render($page['footer_col1'])); ?>
                <?php endif; ?>
            </div>
            <div class="footer-col"  id="footer-col-2">
                <?php if($page['footer_col2']): ?>
                    <?php print(render($page['footer_col2'])); ?>
                <?php endif; ?>
            </div>
            <div class="footer-col" id="footer-col-3">
                <?php if($page['footer_col3']): ?>
                    <?php print(render($page['footer_col3'])); ?>
                <?php endif; ?>
            </div>
            <div class="footer-col" id="footer-col-4">
                <?php if($page['footer_col4']): ?>
                    <?php print(render($page['footer_col4'])); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <p class="col-md-11">&copy; United Nations Economic and Social Commission for Asia and the Pacific <?php print(date('Y')); ?></p>
                <?php if(!$logged_in): ?><a href="/user"><p class="col-md-1 login"><span class="glyphicon glyphicon-lock"></span> <?php print(t('Log In')); ?></p></a><?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php if($page['development']): ?>
    <div id="region-development">
        <?php print(render($page['development'])); ?>
    </div>
<?php endif; ?>
