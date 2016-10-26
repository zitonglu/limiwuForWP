<div class="container buttonbox">
	<?php $prev_post = get_adjacent_post('','',ture);$next_post = get_adjacent_post('','',false);if(get_previous_post()): ?>
	<a href="<?php echo get_permalink($prev_post); ?>" class="btn btn-yellowgreen" role="button" rel="prev"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;上一篇</a>
	<?php endif ?>
	<a class="btn btn-purple hidden-xs" href="#" role="button" data-toggle="modal" data-target="#myshang"><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;打赏</a>
	<a class="btn btn-blue" href="#" role="button" data-toggle="modal" data-target="#myshare"><i class="glyphicon glyphicon-qrcode"></i>&nbsp;分享</a>
	<?php if(get_next_post()): ?>
	<a href="<?php echo get_permalink($next_post); ?>" class="btn btn-orange" role="button" rel="next">下一篇&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></a>
	<?php endif ?>
</div>