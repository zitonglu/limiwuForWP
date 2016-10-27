<?php get_header(); ?>
<div class="container main">
	<?php if (have_posts()): ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('content','index'); ?>
		<?php endwhile; ?>
		<?php if(get_option('limiwu_indexAD2')!=''): ?>
			<div class="col-md-3 col-sm-4 indexAD2"><?php echo get_option('limiwu_indexAD2'); ?></div>
		<?php endif ?>
	<?php endif; ?>
	<div class="clearfix"></div>
	<!-- 分享代码 -->
	<?php include (TEMPLATEPATH . '/template-parts/buttonbox-index.php'); ?>
</div>
<?php if(get_option('limiwu_indexAD1')!=''): ?>
	<div class="indexAD1"><?php echo get_option('limiwu_indexAD1'); ?></div>
<?php endif ?>
<?php get_footer(); ?>