<?php

$year=2014;

header("Content-type:text/html;charset=UTF-8");
mb_language('Japanese');

$img = htmlspecialchars($_REQUEST['img']);
$user = htmlspecialchars($_REQUEST['user']);
?>
<script>
if(sessionStorage.username != <?=$user;?>)window.close();
</script>

<?php
//個人ページソーステンプレ
$html=<<< _HTML_
<!DOCTYPE html>
<meta charset=utf-8>
<meta name="viewport" content="width=500">
<title>{$user} さんの書き初め</title>
<link href="../galleryItem/style.css" rel="stylesheet">
<section id=wrap>
	<img src="../galleryImg{$year}/{$user}.png">
	<div>
		<a id=share target=_blank href="https://www.facebook.com/sharer/sharer.php?u=http://canvasina.com/family/kakizome/gallery{$year}/{$user}.html">Share</a>
		<!--
		<a style="width:10em;height:1em;" name="fb_share" type="icon_link" share_url="http://canvasina.com/family/kakizome/gallery{$year}/{$user}.html"></a>
		<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
		-->
	</div>
	<h1><a href="http://www.facebook.com/{$user}">{$user}さんの書き初め</a></h1>
	<a href="../index.php">
		<img id=logo src="../img/kakizome75.png">
	</a>
	<iframe style="float:right;width:300px;margin:0 auto;" 
		src="https://www.facebook.com/plugins/like.php?href=http://canvasina.com/family/kakizome/gallery/{$user}.html"
		scrolling="no"
		frameborder="0"
		style="border:1px solid gray;width:300px;">
	</iframe>
</section>
_HTML_;
//個人ページソーステンプレここまで

if(	isset($_REQUEST['img']) && 
	isset($_REQUEST['user'])){
	file_put_contents(dirname(__FILE__) . "/gallery{$year}/{$user}.html", $html);

//画像作成
	$fileURL=str_replace("data:image/png;base64,","",$img);
	$fp = fopen(dirname(__FILE__) . "/galleryImg{$year}/{$user}.png",w);
	fwrite($fp,base64_decode($fileURL));
	fclose($fp);
//画像作成ここまで
}

header('Location:tnx.php?user='.$user) ;
?>
