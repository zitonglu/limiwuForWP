<?php get_header(); ?>
<div class="hidden-xs top"><a href="#top"><span class="glyphicon glyphicon-chevron-up"></span></a></div>
<div class="container main">
	<?php if (have_posts()): ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('content'); ?>
		<?php endwhile; ?>
	<?php endif; ?>
	<div class="col-sm-12 buttonbox">
		<?php limiwu_get_previous_posts_link(); ?>	
		<a class="btn btn-purple hidden-xs btn-lg" href="#" role="button" data-toggle="modal" data-target="#myshang"><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;打赏</a>
		<a class="btn btn-blue hidden-xs btn-lg" href="#" role="button" data-toggle="modal" data-target="#myshare"><i class="glyphicon glyphicon-qrcode"></i>&nbsp;分享</a>
		<?php limiwu_get_next_posts_link(); ?>
	</div>
</div>
<?php get_footer(); ?>