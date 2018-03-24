<?php require_once('include/header.php');?>
<title>canvasina search | HTML5 canvas gallery</title>

<section id=search class=wrap>
	<header>
		<a href="/"><h1>Canvasina</h1></a>
	</header>

	<?php require_once('include/nav.php');?>

	<section style="text-align:left;">
<script>
(function() {
	var cx = '002164473709823512993:smyipp96tni';
	var gcse = document.createElement('script');
	gcse.type = 'text/javascript';
	gcse.async = true;
	gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
		'//www.google.co.jp/cse/cse.js?cx=' + cx;
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(gcse, s);
})();
</script>
<gcse:search></gcse:search>

	<?php require_once('include/footer.php');?>
	
</section>