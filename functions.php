<?php
/**
* 函数名称：limiwu_setup
* 函数作用：主题加载时预加载一些wordpress自带的功能
 */
function limiwu_setup() {
  // 发表文章时特殊图片功能
  add_theme_support('post-thumbnails');
  // 自定义导航功能
  // 这里可以定义多个，详见twentysixteen主题
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'limiwu' )
  ) );
}
add_action( 'after_setup_theme', 'limiwu_setup' );
/**
* 函数名称：limiwu_post_thumbnail_url
* 函数作用：输出特殊图片中的图片链接地址
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
/**
* 函数名称：post_views
* 函数作用：取得文章的阅读次数
 */
function post_views($before = '', $after = '', $echo = 1){
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}

?>