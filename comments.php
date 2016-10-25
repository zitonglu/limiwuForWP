<?php if(post_password_required()) {return;} ?>
	<?php if(have_comments()): ?>
<h3><i class="glyphicon glyphicon-comment"></i>&nbsp;评论留言</h3>
		<ul class="media-list">
			<?php wp_list_comments('type=comment&callback=limiwu_comment'); ?>
		</ul>
		<!-- 评论翻页 -->
		<?php if(get_comment_pages_count()>1 && get_option('page_comments')): ?>
		<div class="text-center">
<?php previous_comments_link( __( '&larr; 上一页评论') ); ?>&nbsp;
<?php next_comments_link( __( '下一页评论 &rarr;') ); ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>
<?php if ( !comments_open() ) :
// If registration required and not logged in.
elseif ( get_option('comment_registration') && !is_user_logged_in() ) :
?>
<p>你必须 <a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a> 才能发表评论.</p>
<?php else  : ?>
<!-- Comment Form -->
<form id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="form-horizontal" role="form">
        <?php if ( !is_user_logged_in() ) : ?>
        <h3><i class="glyphicon glyphicon-edit"></i>&nbsp;发表评论</h3>
        <div class="form-group">
			<label for="name" class="col-sm-2 control-label">昵称*</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" placeholder="您的称呼" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
			</div>
			<div class="clearfix"></div>
        </div>
        <div class="form-group">
			<label for="email" class="col-sm-2 control-label">E-mail*</label>
			<div class="col-sm-4">
				<input type="email" class="form-control" placeholder="@" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
			</div>
			<div class="clearfix"></div>
        </div>
        <div class="form-group">
			<label for="url" class="col-sm-2 control-label">博客地址</label>
			<div class="col-sm-4">
				<input type="url" class="form-control" placeholder="http://" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
			</div>
			<div class="clearfix"></div>
        </div>
        <?php else : ?>
        <h3><i class="glyphicon glyphicon-edit"></i>&nbsp;<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>的评论&nbsp;<small><a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录"><i class="glyphicon glyphicon-log-out"></i>&nbsp;退出</a></small></h3>
        <?php endif; ?>
        <div class="form-group" id="respond">
        	<label for="message" class="col-sm-2 control-label">评论内容</label>
			<div class="col-sm-10">
				<textarea type="url" id="message comment" name="comment" tabindex="4" rows="3" cols="40"></textarea>
			</div>
        </div>
        <a href="javascript:void(0);" onClick="Javascript:document.forms['commentform'].submit()" class="col-sm-offset-2 btn btn-purple hidden-xs"><i class="glyphicon glyphicon-check"></i>&nbsp;发表评论</a>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>