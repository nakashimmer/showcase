<?php
	if(isset($_REQUEST['no'])){ $no=$_REQUEST['no'];}
	else{$no="00";}
	$r=rand(0,1000);
?>
<?php require_once('include/save.php');?>
<?php require_once('include/header.php');?>
<title>canvasina create | HTML5 canvas art scripting gallery</title>

<script>
	if(sessionStorage.username != "<?=$username;?>"){window.close();}
</script>

<section id=create class=wrap>
	<header>
		<a href="/"><h1>Canvasina</h1> </a>
	</header>
	
	<?php 
		//require_once('include/connect.php');
		require_once('include/nav.php');
		require_once('include/select.php');
		
		if(!isset($_REQUEST['username'])){
			echo "<a href='notice.php'>sorry, you may reload page,now logput.please push for login</a>";
		}else{
	?>
	
	<section id=right>
	<!-- ?php require_once('include/manual.php');? -->
	<?php if($source){ ?>
		<canvas id=canvasina width=500 height=450></canvas>
		<script src="canvasina/canvasina.js"></script>
		<script>
			<?php echo $source; ?>
		</script>
	
		<script>
			var img = new Image();
			img.src = canvasina.toDataURL("image/png");
			document.form.img.value=img.src;
		</script>

	<?php } ?>
	</section>

	<section id=left>
		<form name=form method=POST>
			<div class=title>
				<?=$name;?>'s HTML5
			</div>
			<div style="text-align:left;font-family:sans-serif;font-size:12px;line-height:14px">
				&lt;!DOCTYPE html&gt;<br>
				&lt;meta charset=utf-8&gt;<br>
				&lt;canvas id=canvasina width=500 height=450&gt;&lt;/canvas &gt;<br>
				&lt;script&gt;<br>
				 var canvas=document.getElementById("canvasina");<br>
				 var c=document.getContext("2d");
			</div>
			<div id="edit">
				<div id=lineNo></div>
				<textarea name=source id=maker><?php
					if(@$source){	echo $source;}
					else{			require_once('include/jssample.php');}
				?></textarea>
			</div>
			<div style="text-align:left;font-family:sans-serif;font-size:12px;line-height:14px">
			&lt;/script&gt;
			</div>
			<div class=title>comment</div>

			<textarea id=comment name=comment><?php 
				if(@$comment)echo $comment;
			?></textarea>

			<input type=hidden name=id			value="<?=$id;?>"	>
			<input type=hidden name=name		value="<?=$name;?>"	>
			<input type=hidden name=link		value="<?=$link;?>"	>
			<input type=hidden name=username 	value="<?=$username;?>">
			<input type=hidden name=img>
			<input type=hidden name=no 			value="<?=$no;?>">
			<input class="btn push" name=btn type=submit value="save" style="float:left;">
			<input class="btn push" name=btn type=submit value="publish" style="float:left;">
			<input class="btn push" name=btn type=submit value="cancel" style="float:left;">
		</form>			
		<?php	if($source){	?>
		
		<button class="btn push" onclick="window.open('http://canvasina.com/gallery/<?=$username;?>_<?=$no;?>.html')",'new','width=150,height=100');>view</button>	

		<?php	}	?>


	</section>


	
	<?php 
		} 
		require_once('include/footer.php');
	?>
</section>


<script>
var j=document.getElementById("maker").value.split('\n').length;
for(var i=170;i<j+170+20;i++){
	document.getElementById("lineNo").innerHTML+=i+"<br>";
}
document.getElementById("maker").style.height=(20*j+20)+"px";
document.getElementById("lineNo").style.height=(20*j+20)+"px";
</script>
