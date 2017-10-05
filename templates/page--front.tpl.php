<?php
   /**
    * @file
    * Default theme implementation to display a single Drupal page.
    *
    * Available variables:
    *
    * General utility variables:
    * - $base_path: The base URL path of the Drupal installation. At the very
    *   least, this will always default to /.
    * - $directory: The directory the template is located in, e.g. modules/system
    *   or themes/garland.
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
    * - $page['content']: The main content of the current page.
    * - $page['sidebar_first']: Items for the first sidebar.
    * - $page['sidebar_second']: Items for the second sidebar.
    * - $page['header']: Items for the header region.
    * - $page['footer']: Items for the footer region.
    *
    * @see template_preprocess()
    * @see template_preprocess_page()
    * @see template_process()
    */
   ?>
<div id="main">
<header class="page-header">
   <div class="container">
      <div class="row">
         <div class="col col-2">
            <?php if ($logo): ?>
            <div id="logo">
               <a class="page-logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
            </div>
            <?php endif; ?>
         </div>
         <div class="col col-10">
            <nav id="navigation" class="clearfix global-nav" role="navigation">
               <div id="main-menu ">
                  <?php 
                     if (module_exists('i18n_menu')) {
                       $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
                     } else {
                       $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
                     }
                     print drupal_render($main_menu_tree);
                     ?>
               </div>
            </nav>
            <!-- end main-menu -->
         </div>
      </div>
</header>
<?php if ($page['hero_section']): ?>
<section class="hero-section">
<div class="container">
<div class="row">
<div class="col-12">
<?php print render($page['hero_section']); ?>
</div>
</div>
</div>
</section>
<?php endif; ?>
<?php if ($page['event']): ?>
<section class="featured-section bg-secondary">
<div class="container">
<div class="row">
<?php print render($page['event']); ?>
</div>
</div>
</section>
<?php endif; ?>
<?php if ($page['about']): ?>
<section class="about-section txt-center">
<div class="container">
<div class="row">  
<?php if ($page['about_one'] || $page['about_two'] || $page['about_three']): ?>
<?php print render($page['about']); ?>
<?php if ($page['about_one']): ?>
<div class="col col-4"><?php print render($page['about_one']); ?></div>
<?php endif; ?>
<?php if ($page['about_two']): ?>
<div class="col col-4"><?php print render($page['about_two']); ?></div>
<?php endif; ?>
<?php if ($page['about_three']): ?>
<div class="col col-4"><?php print render($page['about_three']); ?></div>
<?php endif; ?>
<?php endif; ?>
</div>
</div>
</section>
<?php endif; ?>
<?php if ($page['mission_section']): ?>
<section class="mission-section bg-secondary txt-center">
<div class="container">
<div class="row">  
<?php print render($page['mission_section']); ?>
<?php if ($page['mission_one'] || $page['mission_two'] || $page['mission_three']): ?>
<?php if ($page['mission_one']): ?>
<div class="col col-4"><?php print render($page['mission_one']); ?></div>
<?php endif; ?>
<?php if ($page['mission_two']): ?>
<div class="col col-4"><?php print render($page['mission_two']); ?></div>
<?php endif; ?>
<?php if ($page['mission_three']): ?>
<div class="col col-4"><?php print render($page['mission_three']); ?></div>
<?php endif; ?>
<?php endif; ?>
</div>
</div>
</section>
<?php endif; ?>
<?php if ($page['member_slider']): ?>
<section class="member-section bg-secondary txt-center">
<div class="container">
<div class="row">
<h2>Our Members</h2>
<div class="flexslider" id="member-slider">
<?php print render($page['member_slider']); ?>
</div>
</div>
</div>
</section>
<?php endif; ?>
<?php if ($page['blog_section']): ?>
<section class="blog-section">
<div class="container">
<div class="row">
<h2>Blog</h2>
<div class="flexslider" id="blog-slider">
<?php print render($page['blog_section']); ?>
</div>
</div>
</div>
</section>
<?php endif; ?>
<!--END footer -->
<?php print render($page['footer']) ?>
<footer class="page-footer txt-center">
<ul class="social-icon ul-reset">
<li><a href="#" class="fa fa-facebook"></a></li>
<li><a href="#" class="fa fa-twitter"></a></li>
<li><a href="#" class="fa fa-google"></a></li>
</ul>
<p class="copyright">
This site was built as a collaboration between <a href="#">Manifesto Digital </a> and <a href="#">Compucorp</a>
</p>
</footer>
</div>