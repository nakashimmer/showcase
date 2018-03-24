<?php
header("Content-type:text/html;charset=UTF-8");
mb_language('Japanese');

if(isset($_REQUEST['id'])){	
	$id			= intval($_REQUEST['id']);
	$btn		= htmlspecialchars($_REQUEST['btn']);
	$name		= htmlspecialchars($_REQUEST['name']);
	$link		= htmlspecialchars($_REQUEST['link']);
	$username	= htmlspecialchars($_REQUEST['username']);
	$img 		= htmlspecialchars($_REQUEST['img']);
	$source 	= @file_get_contents(dirname(__FILE__) . "/../data/".$username."_".$no."_js.html");
	$comment 	= @file_get_contents(dirname(__FILE__) . "/../data/".$username."_".$no."_co.html");
	if(isset($_REQUEST['source']))	{$source	=$_REQUEST['source'];}
	if(isset($_REQUEST['comment']))	{$comment	=htmlspecialchars($_REQUEST['comment']);}
	
	$source = str_replace("script>",">",$source);
	
}

if(isset($_REQUEST['source'])){	
//////////////////////////////////////////////////////////
$html = <<< E_O_HTML
<!DOCTYPE html>
<meta charset=utf-8>
<meta name="viewport" content="width=500">
<title>{$comment} created by {$username} | Canvasina is HTML5 art scripting gallery</title>
<meta name=description content="{$comment} created by {$username} | Canvasina.com is HTML5 art scripting gallery">
<link href="../canvasina/canvasina.css" rel=stylesheet>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- for  facebook like button -->
<div id="fb-root"></div>
<script>
(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0];if(d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=141558212660855";
  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));
</script>
<!-- facebook like button -->

<style>
{$source}
</style>

<div id=wrap>

	<main id=outer>
		<div id=divart width=500 height=450>
		</div>
	</main>

	<header>
		{$comment}
	</header>

	<footer>
		<a href="http://www.facebook.com/{$username}" target=_blank>created by {$name}</a>
		<a href="../" ><h1>DIV ART</h1></a>
		
		<a id=share href="https://www.facebook.com/sharer/sharer.php?u=http://canvasina.com/EVENT/devart/gallery/{$username}_{$no}.html" target="_blank">Share</a>
		
		<div id=like style="" class="fb-like" data-href="http://canvasina.com/EVENT/devart/gallery/{$username}_{$no}.html" data-width="100" 
		data-colorscheme="dark" data-layout="button_count" data-show-faces="false" data-send="false"></div>
		
	</footer>	
</div>



<script type="text/javascript">
if (window==parent){
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3233827-64']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
}
</script>

E_O_HTML;
//////////////////////////////////////////////////////////

if($btn=='cancel'){unlink(dirname(__FILE__) . "/../gallery/".$username."_".$no.".html");}
if($btn=='publish'){file_put_contents(dirname(__FILE__) . "/../gallery/".$username."_".$no.".html", $html);}
file_put_contents(dirname(__FILE__) . "/../data/"	.$username."_".$no."_js.html", $source);	
file_put_contents(dirname(__FILE__) . "/../data/"	.$username."_".$no."_co.html", $comment);

//画像作成
$fileURL=str_replace("data:image/png;base64,","",$img);
$fp = fopen(dirname(__FILE__) . "/../galleryImg/".$username."_".$no.".png",w);
fwrite($fp,base64_decode($fileURL));
fclose($fp);
//画像作成ここまで

}
?>