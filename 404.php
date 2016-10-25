<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?>的页面未找到-404页面</title>
</head>
<body>
	<script type="text/javascript" src="http://www.qq.com/404/search_children.js" charset="utf-8" homePageUrl="<?php echo home_url(); ?>" homePageName="返回<?php bloginfo('name'); ?>"></script>
	<script>
		window.onload=function changeURL() {
			if (!document.getElementsByClassName('desc_link')) return true;
			oldUrl=document.getElementsByClassName('desc_link');
			oldUrl[0].setAttribute('href', "<?php echo home_url(); ?>");
			oldUrl[0].firstChild.nodeValue="返回<?php bloginfo('name'); ?>";
		}
	</script>
</body>
</html>