<section id=list>
<h1>ギャラリー</h1>

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

$i=0;
foreach ($p_data as $tmp) {
	$p_title = split("\,",$tmp);
	$filename=str_replace('.html','',$p_title[1]);
	$r=rand(0,1000);
	
echo <<< EOT
<div class=item>
	<a href="gallery/{$filename}.html">
	<img src="http://canvasina.com/EVENT/kakizome/galleryImg/{$filename}.png?r={$r}">
	</a>
	<a class=Sign href="http://www.facebook.com/{$filename}" target=_blank>{$filename}</a>
</div>

EOT;

	$i++;
}
?>
<div class=cl></div>
</section>