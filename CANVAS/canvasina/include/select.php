<style>
nav input{color:white;font-size:13px;display:block;background-color:#333;float:left;width:27px;margin:1px 0 0 2px;height:30px}
nav{}
nav b{color:#aaa;}
</style>

<nav style="text-align:center;">
	<div style="width:1000px;margin:0 auto;">
<form name=form1 method=POST>
	<input type=hidden name=id		value="<?=$id;?>"	>
	<input type=hidden name=name	value="<?=$name;?>"	>
	<input type=hidden name=link	value="<?=link;?>"	>
	<input type=hidden name=username value="<?=$username;?>">

<?php
for($i=0;$i<100;$i++){
	$ii=substr("0".$i,-2,2);
	if($ii==$no){$nav='style="background-color:#fff;color:black;"';}else{$nav="";}
?>
	<input type=submit name=no value="<?=$ii;?>" <?=$nav;?>>
<?php
}
?>
	</form>
	<div style="clear:both;"></div>
</nav>
<div style="clear:both;"></div>