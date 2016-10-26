<div class="footer">
	<p class="container text-center">Copyright&nbsp;©&nbsp;<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>-<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?>-<?php bloginfo('description'); ?></a>&nbsp;&nbsp;<?php echo get_option( 'zh_cn_l10n_icp_num' ); ?>&nbsp;
	<!-- 站长统计代码 -->
	<?php echo get_option('limiwu_statscode'); ?>
	&nbsp;Powered By <a href="http://www.wordpress.org/" target="_blank" rel="nofollow">Wordpress</a>.Theme by <a href="http://www.paipk.com" target="_blank">Paipk.com</a></p>
</div>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- 分享和打赏对话框 -->
<?php include (TEMPLATEPATH . '/template-parts/share.php'); ?>
<?php wp_footer(); ?>
</body>
</html>