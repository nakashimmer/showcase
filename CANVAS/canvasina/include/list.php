<section id=list>
	
<?php
$dir = opendir("./gallery/");
$i=0;
while (($file = readdir($dir)) !== false) {
	if ($file != "." 
	&& $file != ".." 
	&& $file != ".html" 
	&& $file != "sort.php"
	&& $file != "404.html"
	&& $file != ".htaccess"
	&& $file != "undefined.html") {
		$time = filemtime("./gallery/$file");
		$rcd = ereg_replace(".html", "", $file);
		$p_data[$i]="$time,$file";
		$i++;
	}
}
closedir($dir);
rsort($p_data);


$n=$_REQUEST['n'];


echo "<h1>Gallery (update order ".($n+1)."〜".($n+12).")</h1>";
$j=0;
if(0<=$n){
	foreach ($p_data as $tmp) {
		if($n<=$j && $j<$n+12){
			$p_title = split("\,",$tmp);
			$filename=str_replace('.html','',$p_title[1]);
			$artist=substr($filename,0,-3);
			$r=rand(0,1000);
//-----------------------------------
echo <<< EOT
<div class=item>
	<div class=inner>
		<iframe seamless sandbox="allow-same-origin allow-scripts" src="./gallery/{$filename}.html" width=500 height=480></iframe>
	</div>
	<a class=cover href="./gallery/{$filename}.html">{$artist}</a>
</div>

EOT;
//-----------------------------------
		}
	$j++;
	}
}

echo "<p><a href='gallery.php?n=".($n+12)."'>more</a>";
?>
</section>
