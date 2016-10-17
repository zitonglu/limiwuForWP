<div class="col-md-4 col-sm-6 onepic" id="post-<?php the_ID(); ?>">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php if ( has_post_thumbnail() ) { ?>
		<?php the_post_thumbnail(); ?>
		<?php } else { ?>
<img src="<?php bloginfo('template_url'); ?>/images/nopic.jpg" alt="<?php the_title(); ?>"/>
		<?php } ?> 
		<p><?php the_title(); ?></p>
	</a>
	<span>
		<i class="glyphicon glyphicon-time"></i>&nbsp;<?php the_time('Y-m-d') ?>&nbsp;
		<?php the_category(',') ?>
	</span>
</div>