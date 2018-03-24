<?php
header("Content-type:text/html;charset=UTF-8");
mb_language('Japanese');
$user = htmlspecialchars($_REQUEST['user']);
$r=rand(0,1000);
$year=2014;

include_once('include/header.php');
?>
<title>書き初めHTML5｜感謝</title>

<?php
if(!$user){
?>
<section id=wrap class=tnx>
<p>大変申し訳ありませんが、正常に投稿できませんでした。
再度、トップページからお試しください。なお、
<ol>
<li>ブラウザはsafari、chromeなどモダンブラウザ
<li>JavaScriptはオン
<li>facebookのログインがポップアップウインドウで求められるはずですので、
必ずオン
</ol>
するようお願いします。</p>
<p><a href="index.php">トップへもどりましょう</a></p>
</section>

<?php
}else{
?>

<section id=wrap class=tnx>
	<p id=msg><?=$user?>さん！ありがとうございました</p>

	<a id=art href="gallery<?=$year?>/<?=$user?>.html">
		<img src="http://canvasina.com/family/kakizome/galleryImg<?=$year?>/<?=$user?>.png?r=<?=$r;?>">
	</a>

	<div class=right>
		<ol>
			<li>
				※もし画像が投稿されていなかったら、リロードするか、facebookログインを確認してください

			<li>友達と作品をシェアしましょう　<a style="float:left;" id=share target=_blank href="https://www.facebook.com/sharer/sharer.php?u=http://canvasina.com/family/kakizome/gallery<?=$year?>/<?=$user;?>.html">Share</a>
			<p>もし、作品写真が前のものだったら、<a target=_blank href="https://developers.facebook.com/tools/debug">このページのURLに次のURLを書いてキャッシュをクリアしてください。</a>
			<input type=text style="font-size:9px;width: 100%;" value="http://canvasina.com/family/kakizome/gallery<?=$year?>/<?=$user;?>.html" /></a>

			<li>作品にいいねボタンを押しましょう<br>
				<iframe class=iine src="https://www.facebook.com/plugins/like.php?href=http://canvasina.com/family/kakizome/gallery<?=$year?>/<?=$user;?>.html"
				scrolling="no" frameborder="0"></iframe>
				
			<li>「書き初めHTML5」にいいねボタンを押しましょう<br>
				<iframe class=iine src="https://www.facebook.com/plugins/like.php?href=https://apps.facebook.com/kakizome_htmlv/"
				scrolling="no" frameborder="0"></iframe>
				
			
				
			<li><a href="index.php">トップへもどりましょう</a>
		</ol>
	</div>
	<div class=cl></div>
	
</section>

<?php
}
?>

<?php include_once('include/footer.php')?>
