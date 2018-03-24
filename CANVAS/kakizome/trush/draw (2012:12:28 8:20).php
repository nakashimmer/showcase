<!DOCTYPE html>
<meta charset=utf-8>
<title>Kakizome</title>
<link href="css.css" rel="stylesheet">

<?php include_once('include/header.php')?>
<canvas id='canvas' width=400 height=500></canvas><br>
<button onclick=save()>save</button>
<button onclick='location.href="draw.php"'>once more</button>
<img id=img />

<form method="post" action="upload.php" name="frm"> 
<input type="hidden" name="img"> 
<input type="hidden" name="user"> 
<input type="hidden" value="submit"> 
</form> 

<?php include_once('include/canvas.php')?>
<?php include_once('include/fb.php')?>

<?php include_once('include/footer.php')?>