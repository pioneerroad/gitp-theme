<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
hide($content['comments']);
hide($content['links']);
$server = $_SERVER['SERVER_NAME'];
?>
<!-- JS For Facebook Like/Recommend Widget -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- End JS for FB Like/Recommend -->
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

    <div class="content"<?php print $content_attributes; ?>>
        <?php if($author_profile): ?>
            <div class="row">
                <div class="col-md-3">
                    <?php print(render($author_profile)); ?>
                </div>
                <div class="col-md-9">
                    <p><b><?php print(format_date($created, 'long')); ?></b></p>
                    <?php print(render($content['body'])); ?>
                    <?php print(render($content['group_relationships'])); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Share this Blog
                        </div>
                        <div class="panel panel-body social-media-widgets">
                            <div class="share-item twitter">
                                <a href="https://twitter.com/share" class="twitter-share-button"{count}>Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                            </div>
                            <div class="share-item google">
                                <!-- Place this tag in your head or just before your close body tag. -->
                                <script src="https://apis.google.com/js/platform.js" async defer></script>

                                <!-- Place this tag where you want the share button to render. -->
                                <div class="g-plus" data-action="share" data-width="160" data-href="<?php print($server); print($node_url_);?>"></div>
                            </div>
                            <div class="share-item facebook">
                                <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="recommend" data-show-faces="false" data-share="false"></div>
                            </div>
                            <div class="share-item email">
                                <a href="mailto:?Subject=Content Recommendation: <?php print($node->title);?>&amp;Body=http://<?php print($server);print($node_url);?>">
                                    <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" height="20" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-md-12">
                    <p><b><?php print(format_date($created, 'long')); ?></b></p>
                    <?php print(render($content['body'])); ?>
                    <?php print(render($content['group_relationships'])); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Share this Blog
                        </div>
                        <div class="panel panel-body social-media-widgets">

                            <div class="twitter">
                                <a href="https://twitter.com/share" class="twitter-share-button"{count}>Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                            </div>
                            <div class="google">
                                <!-- Place this tag in your head or just before your close body tag. -->
                                <script src="https://apis.google.com/js/platform.js" async defer></script>

                                <!-- Place this tag where you want the share button to render. -->
                                <div class="g-plus" data-action="share" data-href="<?php print($server); print($node_url_);?>"></div>
                            </div>
                            <div class="facebook">
                                <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="recommend" data-show-faces="false" data-share="false"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
