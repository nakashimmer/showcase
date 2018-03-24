<?php require_once('include/header.php');?>
<title>Welcome to canvasina | HTML5 canvas art scripting gallery</title>

<div id=top class=wrap>

	<header><h1>Canvasina</h1></header>

	<div id="fb-root"></div>
	<script>
		(function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=141558212660855";
			fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));
	</script>

	<div id="like" class="fb-like-box" data-href="https://www.facebook.com/canvasina" 
	data-width="500" data-height="350" data-show-faces="true" data-stream="false" 
	data-show-border="false" data-header="false"></div>
	
	<?php require_once('include/firstView.php');?>

	<div style="clear;both;"></div>

	<?php require_once('include/nav.php');?>

	<main>
		<?php require_once('include/list-top.php');?>
	</main>

	<aside>
		<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fcanvasina&amp;width=250&amp;height=500&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;stream=true&amp;show_border=true&amp;appId=430431017065499" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:500px;" allowTransparency="true"></iframe>
	
	</aside>
	
	<?php require_once('include/footer.php');?>
	
</div>