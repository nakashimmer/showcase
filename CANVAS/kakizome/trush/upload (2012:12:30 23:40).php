<?php
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
	<img src='{$img}'>
	<div>
		<a name="fb_share" type="icon_link" share_url="http://canvasina.com/EVENT/kakizome/gallery/{$user}.html"></a>
		<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
	</div>
	<h1><a href="http://www.facebook.com/{$user}">{$user}さんの書き初め</a></h1>
	<a href="http://apps.facebook.com/kakizome_htmlv">
		<img id=logo src="../img/kakizome75.png">
	</a>
	<iframe style="float:right;width:300px;margin:0 auto;" 
		src="https://www.facebook.com/plugins/like.php?href=http://canvasina.com/EVENT/kakizome/gallery/{$user}.html"
		scrolling="no"
		frameborder="0"
		style="border:1px solid gray;width:300px;">
	</iframe>
</section>
_HTML_;
//個人ページソーステンプレここまで

//画像イメージテンプレ
$galleryImg=<<< _IMG_
<style>
*{margin:0}
img{width:200px;height:250px;}
</style>
<img src='{$img}'>
_IMG_;
//画像イメージテンプレここまで

if(	isset($_REQUEST['img']) && 
	isset($_REQUEST['user'])){
	file_put_contents(dirname(__FILE__) . "/gallery/".$user.".html", $html);
	file_put_contents(dirname(__FILE__) . "/galleryImg/".$user.".html", $galleryImg);
}

header('Location:index.php') ;
?>
