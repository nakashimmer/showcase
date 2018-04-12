<?php
	if(isset($_REQUEST['no'])){ $no=$_REQUEST['no'];}
	else{$no="00";}
	$r=rand(0,1000);
?>
<?php require_once('include/save.php');?>
<?php require_once('include/header.php');?>
<title>create DIVART | CSS3 art gallery</title>

<script>
	if(sessionStorage.username != "<?=$username;?>"){window.close();}
</script>

<section id=create class=wrap>
	<header>
		<a href="./"><h1>DIV ART</h1> </a>
	</header>
	
	<?php 
		//require_once('include/connect.php');
		require_once('include/nav.php');
		require_once('include/select.php');
		
		if(!isset($_REQUEST['username'])){
			echo "<a href='notice.php'>sorry, you may reload page,now logput.please push for login</a>";
		}else{
	?>
	

	<section id=left>
		<form name=form method=POST>
			<div class=title>
				<?=$name;?>'s JavaScript
			</div>

			<textarea name=source id=maker><?php
				if(@$source){	echo $source;}
				else{			require_once('include/jssample.php');}
			?></textarea>
			
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
		
		<button class="btn push" onclick="window.open('gallery/<?=$username;?>_<?=$no;?>.html')",'new','width=150,height=100');>view</button>	

		<?php	}	?>
			
	</section>

	<section id=right>
	
	<!-- ?php require_once('include/manual.php');? -->
	
	<?php if($source){ ?>
		
		<section id=outer width=500 height=450>
			<div id=divart></div>
		</section>
		
		<style>
			<?= $source;?>
		</style>
	
		<script>
			var img = new Image();
			img.src = canvasina.toDataURL("image/png");
			document.form.img.value=img.src;
		</script>

	<?php }else{ ?>
		<!--<div style="width:500px;height:450px;color:red;overflow:scroll;">Please read manual! -->
	<?php } ?>
	
	

	
	</section>
	
	<?php 
		} 
		require_once('include/footer.php');
	?>
</section>

