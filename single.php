<?php get_header(); ?>
<div class="container single">
	<?php if (have_posts()): ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php if(get_option('limiwu_postAD3')!=''): ?>
	<div class="postAD3"><?php echo get_option('limiwu_postAD3'); ?></div>
<?php endif ?>
<?php get_footer(); ?>