<div class="col-md-9 titlebox" id="post-<?php the_ID(); ?>">
	<p class="title"><?php the_title(); ?><a href="" class="visible-xs" role="button" data-toggle="modal" data-target="#myshare"><i class="glyphicon glyphicon-share"></i>&nbsp;分享</a></p>
	<!-- 文章小标签 -->
	<?php include (TEMPLATEPATH . '/template-parts/meta.php'); ?>
</div>
<div class="col-md-3 visible-lg visible-md erweima">
	<img src="http://api.qrserver.com/v1/create-qr-code/?size=64x64&amp;data=<?php echo get_permalink(); ?>" alt="二维码">
	<p>打开微信，点击底部的“发现”，使用“扫一扫”即可将网页分享至朋友圈</p>
</div>
<?php if(get_option('limiwu_postAD2')!=''): ?>
	<div class="postAD2"><?php echo get_option('limiwu_postAD2'); ?></div>
<?php endif ?>
<div class="col-md-offset-2 col-md-8 article">
<?php $embed = get_post_meta(get_the_ID(), 'limiwu_video_embed', TRUE);
    if($embed){ ?>
	<div class="video-480x360">
	<?php echo stripslashes(htmlspecialchars_decode($embed));?>
	</div><!-- .entry-embed -->
<?php } ?>
	<?php the_content(); ?>
	<?php echo get_option('limiwu_postAD1'); ?>
</div>
<div class="clearfix"></div>
<!-- 分享代码 -->
<?php include (TEMPLATEPATH . '/template-parts/buttonbox-single.php'); ?>
<!-- 相同分类相关文章4图 -->
<?php if(get_option('limiwu_if_relatedarticles')==''){
	include (TEMPLATEPATH . '/template-parts/relatedarticles.php');
} ?>
<!-- 评论列表 -->
<div class="col-md-offset-2 col-md-8 container Commentbox" id="comments">
	<?php comments_template( '', true ); ?>
</div>
<div class="clearfix"></div>