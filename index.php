<?php get_header(); ?>
<div class="hidden-xs top"><a href="#top"><span class="glyphicon glyphicon-chevron-up"></span></a></div>
<div class="container main">
	<?php if (have_posts()): ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('content'); ?>
		<?php endwhile; ?>
	<?php endif; ?>
	<div class="col-sm-12 buttonbox">
		<a href="#" class="btn btn-yellowgreen btn-lg" role="button"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;上一页</a>
		<a class="btn btn-purple hidden-xs btn-lg" href="#" role="button" data-toggle="modal" data-target="#myshang"><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;打赏</a>
		<a class="btn btn-blue hidden-xs btn-lg" href="#" role="button" data-toggle="modal" data-target="#myshare"><i class="glyphicon glyphicon-qrcode"></i>&nbsp;分享</a>
		<a href="#" class="btn btn-orange btn-lg" role="button">下一页&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></a>
	</div>
</div>
<?php get_footer(); ?>