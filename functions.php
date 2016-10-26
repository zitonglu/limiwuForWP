<?php
//检测主题更新主题
require_once(TEMPLATEPATH . '/theme-updates/theme-update-checker.php'); 
  $wpdaxue_update_checker = new ThemeUpdateChecker(
  'limiwu', //主题名字
  'http://www.paipk.com/theme/limiwu/info.json'  //info.json 的访问地址
);
/**
* 函数名称：limiwu_setup
* 函数作用：主题加载时预加载一些wordpress自带的功能
 */
function limiwu_setup() {
  // 开启发表文章时特殊图片功能
  add_theme_support('post-thumbnails');
  // 开启发表文章时形式功能
  add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
  ) );
  // 开启自定义导航功能
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'limiwu' )
  ) );
}
add_action( 'after_setup_theme', 'limiwu_setup' );
/**
* 函数名称：limiwu_post_thumbnail_url
* 函数作用：输出特殊图片中的图片链接地址(未使用)
 */
function limiwu_post_thumbnail_url(){
	global $post, $posts;
	if (has_post_thumbnail()) {
		$html = get_the_post_thumbnail();
		preg_match_all("/<img.*src\s*=\s*[\"|\']?\s*([^>\"\'\s]*)/i", $html, $matches);
		$imgsrc=$matches[1][0];
	}else{
		$content = $post->post_content;
        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content,$matches);
        $imgsrc=$matches[1][0];
        if($imgsrc==""){ 
        // 如果无图片则显示none，当然也可以自定义个URL地址
            $imgsrc="none";
        }
	}
	echo "$imgsrc";
}
/**
* 函数名称：record_visitors
* 函数作用：post_views的预定义函数
* 函数名称：post_views
* 函数作用：取得文章的阅读次数
 */
function record_visitors(){
    if (is_singular()){
      global $post;
      $post_ID = $post->ID;
      if($post_ID){
          $post_views = (int)get_post_meta($post_ID, 'views', true);
          if(!update_post_meta($post_ID, 'views', ($post_views+1))){add_post_meta($post_ID, 'views', 1, true);}
      }
    }
}
add_action('wp_head', 'record_visitors');
function post_views($before = '', $after = '', $echo = 1){
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}
/**
* 函数名称：limiwu_comments_users();
* 函数作用：获取文章评论次数
* 用法：文章页面模版调用:<?php echo limiwu_comments_users($post->ID); ?>
*       总评论数调用:<?php echo limiwu_comments_users($postid, 1); ?>
*/
function limiwu_comments_users($postid=0,$which=0) {
  $comments = get_comments('status=approve&type=comment&post_id='.$postid);
  if ($comments) {
    $i=0; $j=0; $commentusers=array();
    foreach ($comments as $comment) {
      ++$i;
      if ($i==1) { $commentusers[] = $comment->comment_author_email; ++$j; }
      if ( !in_array($comment->comment_author_email, $commentusers) ) {
        $commentusers[] = $comment->comment_author_email;
        ++$j;
      }
    }
    $output = array($j,$i);
    $which = ($which == 0) ? 0 : 1;
    return $output[$which]; 
  }
  return '发表评论';
}
/**
* 函数名称：limiwu_get_previous_posts_link();
* 函数作用：输出文章列表的上一页
 */
function limiwu_get_previous_posts_link( $label = null ) {
  global $paged;

  if ( null === $label )
    $label = __('<i class="glyphicon glyphicon-chevron-left"></i>&nbsp;上一页');

  if ( !is_single() && $paged > 1 ) {
    $attr = apply_filters( 'previous_posts_link_attributes', '' );
    echo '<a href="' . previous_posts( false ) . "\" $attr  class=\"btn btn-yellowgreen btn-lg\" role=\"button\">". preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) .'</a>';
  }
}
/**
* 函数名称：limiwu_get_next_posts_link();
* 函数作用：输出文章列表的下一页
 */
function limiwu_get_next_posts_link( $label = null, $max_page = 0 ) {
  global $paged, $wp_query;
  if ( !$max_page )
    $max_page = $wp_query->max_num_pages;
  if ( !$paged )
    $paged = 1;
  $nextpage = intval($paged) + 1;
  if ( null === $label )
    $label = __( '下一页&nbsp;<i class="glyphicon glyphicon-chevron-right"></i>' );
  if ( !is_single() && ( $nextpage <= $max_page ) ) {
  $attr = apply_filters( 'next_posts_link_attributes', '' );
    echo '<a href="' . next_posts( $max_page, false ) . "\" $attr class=\"btn btn-orange btn-lg\" role=\"button\">" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label) . '</a>';
  }
}
/**
* 函数名称：limiwu_comment();
* 函数作用：输出评论的内容
 */
function limiwu_comment($comment, $args, $depth){
   $GLOBALS['comment'] = $comment; ?>
   <li class="media" id="li-comment-<?php comment_ID(); ?>">
      <!-- 头像 -->
      <a class="media-left" href="" rel="nofollow">
        <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 64); } ?>
      </a>
      <div class="media-body">
        <!-- 评论者名字 -->
        <?php printf(__('<h4 class="media-heading">%s</h4>'), get_comment_author_link()); ?>
        <!-- 评论内容 -->
        <?php if ($comment->comment_approved == '0') : ?>
          <P>你的评论正在审核，稍后会显示出来！</P>
        <?php endif; ?>
        <?php comment_text(); ?>
        <p class="text-right">发表于：<?php echo get_comment_time('Y-m-d H:i'); ?>&nbsp;&nbsp;<?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>&nbsp;&nbsp;<?php edit_comment_link('修改'); ?></p>
      </div>
    </li>
<?php }

/**
* 函数名称：limiwu_ad_theme_setting();
* 函数作用：后台主题页面增加一个设置项，随主题一起开启
 */
function limiwu_ad_theme_setting(){
  if($_POST['limiwu_update_themeoptions']=='true') {limiwu_themeoptions_update();}
  add_theme_page('theme_setting', '主题设置', 'administrator', 'theme_setting','limiwu_theme_setting'); 
}   
add_action('admin_menu', 'limiwu_ad_theme_setting');
// 后台中的定义函数
function limiwu_themeoptions_update(){
  update_option('limiwu_indexAD1', stripslashes($_POST['indexAD1']));
  update_option('limiwu_indexAD2', stripslashes($_POST['indexAD2']));
  update_option('limiwu_postAD1', stripslashes($_POST['postAD1']));
  update_option('limiwu_postAD2', stripslashes($_POST['postAD2']));
  update_option('limiwu_postAD3', stripslashes($_POST['postAD3']));
  update_option('limiwu_baidustats', stripslashes($_POST['baidustats']));
  update_option('limiwu_statscode', stripslashes($_POST['statscode']));
  update_option('limiwu_baidushare', stripslashes($_POST['baidushare']));
  if ($_POST['if_relatedarticles']=='on'){$_POST['if_relatedarticles']='checked';} else {$_POST['if_relatedarticles']='';}
  update_option('limiwu_if_relatedarticles', $_POST['if_relatedarticles']);
}
// 定义主题设置页面
function limiwu_theme_setting(){ ?>  
<div class="wrap">
  <h1>主题设置</h1>
  <hr>
  <form method="POST" action="">
    <input type="hidden" name="limiwu_update_themeoptions" value="true" /><!-- 隐藏判断 -->
    <h3>广告设置</h3>
    <table width="70%" style="text-align:center;">
      <tr style="background:#8BC34A;color:#fff">
        <th>广告位置</th>
        <th>插入代码</th>
        <th>使用说明</th>
      </tr>
      <tr>
        <td>文章列表页：内容最后</td>
        <td><textarea type="text" name="indexAD2" cols="60" rows="2"><?php echo get_option('limiwu_indexAD2'); ?></textarea></td>
        <td>文章列表页面最底部，在底栏上面一点</td>
      </tr>
      <tr>
        <td>文章列表页：底部</td>
        <td><textarea type="text" name="indexAD1" cols="60" rows="2"><?php echo get_option('limiwu_indexAD1'); ?></textarea></td>
        <td>文章列表页面最底部，在底栏上面一点</td>
      </tr>
      <tr>
        <td>文章页面：顶部</td>
        <td><textarea type="text" name="postAD2" cols="60" rows="2"><?php echo get_option('limiwu_postAD2'); ?></textarea></td>
        <td>文章标题栏下方，正文上方，<br>可插入代码</td>
      </tr>
      <tr>
        <td>文章页面：内容底部</td>
        <td><textarea type="text" name="postAD1" cols="60" rows="2"><?php echo get_option('limiwu_postAD1'); ?></textarea></td>
        <td>该代码显示在文章页面上下翻页上方，<br>在移动端口可浏览</td>
      </tr>
      <tr>
        <td>文章页面：最底部</td>
        <td><textarea type="text" name="postAD3" cols="60" rows="2"><?php echo get_option('limiwu_postAD3'); ?></textarea></td>
        <td>文章页面最底部，在底栏上面一点。</td>
      </tr>
    </table>
    <hr>
    <h3>底部自定义代码：</h3>
    <p><textarea type="text" name="statscode" cols="60" rows="3"><?php echo get_option('limiwu_statscode'); ?></textarea></p>
    <p>可设置底部统计代码，用于统计页面浏览次数。也可以插入其他需要插入的备注说明等。</p>
    <hr>
    <h3>百度统计代码：</h3>
    <p><textarea type="text" name="baidustats" cols="60" rows="3"><?php echo get_option('limiwu_baidustats'); ?></textarea></p>
    <p>代码会添加到网站全部页面的/head标签前。</p>
    <hr>
    <h3>百度分享代码：</h3>
    <p><textarea type="text" name="baidushare" cols="60" rows="3"><?php echo get_option('limiwu_baidushare'); ?></textarea></p>
    <p>显示在文章"打赏"和"分享"按钮的弹出对话框中。</p>
    <hr>
    <h4><input type="checkbox" name="if_relatedarticles" <?php echo get_option('limiwu_if_relatedarticles'); ?> /> 关闭更多文章</h4>
    <select name ="colour">
    <?php $colour = get_option('mytheme_colour'); ?>
    <option value="gray" <?php if ($colour=='gray') { echo 'selected'; } ?>>灰色</option>
    <option value="blue" <?php if ($colour=='blue') { echo 'selected'; } ?>>浅蓝</option>
    <option value="pink" <?php if ($colour=='pink') { echo 'selected'; } ?>>粉红</option>
    </select>
    <p><input type="submit" name="submit" id="submit" class="button button-primary" value="保存更改"></p>
  </form>
</div>  
<?php }   

?>