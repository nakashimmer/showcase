<?php 
include_once('include/header.php');
$year=2015;
?>

<title>書き初めHTML5｜トップ</title>

<section id=wrap class=index>
	<div id=header2>
		<div id=msg>
			
			<p><b>書き初め</b>は、年があけて<b>初めて毛筆で書や絵を書く</b>行事<br>
			さぁ、<strong>HTML5</strong>でWebに<b>書き初め</b>をしましょう！</p>
			<ul style="text-align:left">
				<li>書き初め期間：1月1日から12日まで
			</ul>
		
			<!--
			<p>2013年新春、多数の書き初めをありがとうございました。
			次回は今年末の<b>書き納め</b>と2014年<b>HTML5元年の書き初め</b>にお会いしましょう。</p>
			-->
		</div>
		<nav>
			<button id=btn1 onclick='location.href="draw.php#draw"'>
				<b>書き初め</b>をはじめる<br>
				<small>facebookログイン(ポップアップをオンのこと）</small>
			</button>
			
			<button id=btn2 onclick='location.href="support.php"'>	使い方・免責・FAQ</button>
			
		</nav>
		<div class="cl"></div>
	</div>

	<?php include_once('include/list.php')?>
</section>

<?php include_once('include/footer.php')?>

<audio autoplay src='http://springreen.jp/INDEX/themes/ShunsuiKobo/bg/harunoumi.mp3'></audio>
<small>音楽提供：<a href="http://ww.tam-music.com">Tam Music Factorory</a></small>
