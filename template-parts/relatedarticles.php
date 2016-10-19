<div class="container RelatedArticlesbox">
  <ul class="list-inline">
<?php
global $post;
$cats = wp_get_post_categories($post->ID);
if ($cats) {
    $args = array(
          'category__in' => array( $cats[0] ),
          'post__not_in' => array( $post->ID ),
          'showposts' => 4,
          'caller_get_posts' => 1
      );
  query_posts($args);
  if (have_posts()) {
    while (have_posts()) {
      the_post(); update_post_caches($posts); ?>
  <li class="col-md-3 col-sm-6 col-xs-12"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
    <?php if ( has_post_thumbnail() ) { ?>
    <?php the_post_thumbnail(); ?>
    <?php } else { ?>
<img src="<?php bloginfo('template_url'); ?>/images/nopic.jpg" alt="<?php the_title_attribute(); ?>"/>
    <?php } ?>
  <p><?php the_title(); ?></p></a></li>
<?php
    }
  }
  wp_reset_query();
}
?>
  </ul>
</div>