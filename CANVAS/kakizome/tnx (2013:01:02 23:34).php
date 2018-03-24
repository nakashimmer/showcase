<?php
header("Content-type:text/html;charset=UTF-8");
mb_language('Japanese');
$user = htmlspecialchars($_REQUEST['user']);
$r=rand(0,1000);

include_once('include/header.php');
?>
<title>書き初めHTML5｜感謝</title>

<section id=wrap class=tnx>
	<p id=msg><?=$user?>さん！ありがとうございました</p>

	<a id=art href="gallery/<?=$user;?>.html">
		<img src="http://canvasina.com/EVENT/kakizome/galleryImg/<?=$user;?>.png?r=<?=$r;?>">
	</a>

	<div class=right>
		<ol>
			<li>
				※もし画像が投稿されていなかったら、リロードするか、facebookログインを確認してください

			<li><a id=share name="fb_share" type="icon_link" share_url="http://canvasina.com/EVENT/kakizome/gallery/<?=$user;?>.html?r=1"></a>
				ボタンを押して友達と作品をシェアしましょう
				<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

			<li>作品にいいねボタンを押しましょう<br>
				<iframe class=iine src="https://www.facebook.com/plugins/like.php?href=http://canvasina.com/EVENT/kakizome/gallery/<?=$user;?>.html"
				scrolling="no" frameborder="0"></iframe>
				
			<li>「書き初めHTML5」にいいねボタンを押しましょう<br>
				<iframe class=iine src="https://www.facebook.com/plugins/like.php?href=http://canvasina.com/EVENT/kakizome"
				scrolling="no" frameborder="0"></iframe>
				
			
				
			<li><a href="index.php">トップへもどりましょう</a>
		</ol>
	</div>
	<div class=cl></div>
	
</section>

<?php include_once('include/footer.php')?>
