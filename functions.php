<?php
/**
* 函数名称：limiwu_setup
* 函数作用：主题加载时预加载一些wordpress自带的功能
 */
function limiwu_setup() {
  // 开启发表文章时特殊图片功能
  add_theme_support('post-thumbnails');
  // 开启自定义导航功能
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

?>