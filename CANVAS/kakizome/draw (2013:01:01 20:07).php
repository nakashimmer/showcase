<?php include_once('include/header.php')?>
<title>書き初めHTML5｜書く</title>

<section id=wrap class=draw>
	<p id=msg>
		<b>マウスを筆に</b>して<b>ゆっくり</b>と、<b>絵や文字を描いて</b>ください
	</p>

	<canvas id=canvas width=400 height=500></canvas>

	<div class=right>
		
		<button class=btn1 onclick=save()>
			ギャラリへ送信<br>
			<small>
				<b>公序良俗</b>に反する書き初めはご遠慮ください。
				管理者の判断で削除します
			</small>
		</button>
		<button class=btn2 onclick='location.href="draw.php"'>もう一枚書きなおす</button>
		<small>もし投稿しても反映されない時は、facebookにログインしていない可能性があります。
		ポップアップがオンになっていることを確認して再度トップページから試してください</small>

		<form method="post" action="upload.php" name="frm"> 
		<input type="hidden" name="img"> 
		<input type="hidden" name="user"> 
		<input type="hidden" value="submit"> 
		</form> 
	</div>
	
	<div class=cl></div>
</section>

<?php include_once('include/canvas.php')?>

<?php include_once('include/fb.php')?>

<?php include_once('include/footer.php')?>
