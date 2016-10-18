<div class="col-md-9 titlebox" id="post-<?php the_ID(); ?>">
	<p class="title"><?php the_title(); ?></p>
	<ul class="list-inline meta">
		<li><i class="glyphicon glyphicon-time"></i>&nbsp;<?php the_time('Y-m-d') ?></li>
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
	<?php comments_template( '', true ); ?>
</div>