<?php
$msg2 = file_get_contents("ajax.txt");

$msg1=@$_GET['msg1'];
if($msg1){
$msg1=mb_substr($msg1,0,140,"utf-8");
$msg2 = "<li>".$msg1."</li><!--".$_SERVER['REMOTE_ADDR']."-->".$msg2;
$msg2=mb_substr($msg2,0,140*10,"utf-8");
file_put_contents("ajax.txt", $msg2);
}

header("Content-type:text/javascript;charset=utf-8");
echo $msg2;

?>