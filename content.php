<div class="col-md-9 titlebox" id="post-<?php the_ID(); ?>">
	<p class="title"><?php the_title(); ?></p>
	<ul class="list-inline meta">
		<li><i class="glyphicon glyphicon-time"></i>&nbsp;<a href="#"><?php the_time('Y-m-d') ?></a></li>
		<li><i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;<?php the_category(',') ?></li>
		<li><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;<?php the_tags('',',') ?></li>
		<li class="hidden-xs"><i class="glyphicon glyphicon-qrcode"></i>&nbsp;<a href="#" class="btn" role="button" data-toggle="modal" data-target="#myshare">网页二维码</a></li>
		<li><i class="glyphicon glyphicon-eye-open"></i>&nbsp;<a href=""><?php post_views(); ?></a></li>
		<li><i class="glyphicon glyphicon-comment"></i>&nbsp;<a href="#comments"><?php echo limiwu_comments_users($post->ID); ?></a></li>
	</ul>
</div>
<div class="col-md-3 visible-lg visible-md erweima">
	<img src="http://api.qrserver.com/v1/create-qr-code/?size=64x64&amp;data=http://www/paipk.com" alt="二维码">
	<p>打开微信，点击底部的“发现”，使用“扫一扫”即可将网页分享至朋友圈</p>
</div>
<div class="col-md-offset-2 col-md-8 article">
	<?php the_content(); ?>
</div>
<div class="clearfix"></div>
<div class="container buttonbox">
	<?php $prev_post = get_adjacent_post('','',ture);$next_post = get_adjacent_post('','',false); ?>
	<a href="<?php echo get_permalink($prev_post); ?>" class="btn btn-yellowgreen btn-lg" role="button"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;上一篇</a>
	<a class="btn btn-purple hidden-xs btn-lg" href="#" role="button" data-toggle="modal" data-target="#myshang"><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;打赏</a>
	<a class="btn btn-blue hidden-xs btn-lg" href="#" role="button" data-toggle="modal" data-target="#myshare"><i class="glyphicon glyphicon-qrcode"></i>&nbsp;分享</a>
	<a href="<?php echo get_permalink($next_post); ?>" class="btn btn-orange btn-lg" role="button">下一篇&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
<?php comments_template( '', true ); ?>