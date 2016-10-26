<ul class="list-inline meta">
  <li><i class="glyphicon glyphicon-time"></i>&nbsp;<a href="#"><?php the_time('Y-m-d') ?></a></li>
  <li><i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;<?php the_category(',') ?></li>
  <?php if(has_tag()): ?>
  <li><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;<?php the_tags('',',') ?></li>
  <?php endif ?>
  <li class="hidden-xs"><i class="glyphicon glyphicon-qrcode"></i>&nbsp;<a href="#" class="btn" role="button" data-toggle="modal" data-target="#myshare">文章二维码</a></li>
  <li><i class="glyphicon glyphicon-eye-open"></i>&nbsp;<a href=""><?php post_views(); ?></a></li>
  <li><i class="glyphicon glyphicon-comment"></i>&nbsp;<a href="#comments"><?php echo limiwu_comments_users($post->ID); ?></a></li>
</ul>