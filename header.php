<?php
/**
 * @package WordPress
 * @subpackage limiwu
 * @since limiwu 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
<?php if ( is_home() ) {
        bloginfo('name'); echo " - "; bloginfo('description');
    } elseif ( is_category() ) {
        single_cat_title(); echo " - "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title();
    } elseif (is_search() ) {
        echo "搜索结果"; echo " - "; bloginfo('name');
    } elseif (is_404() ) {
        echo '页面未找到!';
    } else {
		wp_title( '-', true, 'right' ); 
	}
?>	
	</title>
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico"/>
	<link rel='stylesheet prefetch' href='http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css'>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?v=1.0" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
<!--[if lt IE 9]>
<script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
<script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php echo get_option('limiwu_baidustats'); ?>
</head>
<?php flush(); ?>

<body id="top">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only"><?php bloginfo('name'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
        <img alt="<?php bloginfo('name'); ?>" src="<?php bloginfo('template_url'); ?>/images/logo.png" class="logo">
      </a>
    </div>
    <?php if ( has_nav_menu( 'primary' ) ) : ?>
    <?php
    wp_nav_menu( array(
    	'container' 		=> 'div',
    	'container_class' 	=> 'collapse navbar-collapse',
    	'container_id' 		=> 'bs-example-navbar-collapse-1',
    	'menu_class'		=> 'nav navbar-nav navbar-right',
    	'before'   			=> '',
    	'after'     		=> '',
    	'depth'          	=> 1,
    ) );
    ?>
    <?php endif; ?>
  </div><!-- /.container-fluid -->
</nav>
<div class="hidden-xs top"><a href="#top"><span class="glyphicon glyphicon-chevron-up"></span></a></div>