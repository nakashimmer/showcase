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

$i=0;
foreach ($p_data as $tmp) {
	$p_title = split("\,",$tmp);
	$filename=str_replace('.html','',$p_title[1]);

$r=rand(0,1000);
echo <<< EOT
<div class=itemOuter>
	<div class=itemInner >
		<iframe src="http://canvasina.com/EVENT/kakizome/galleryImg/{$filename}.html?r={$r}" width=400 height=500 scrolling=no></iframe>
	</div>
	<a class=itemCover href="http://canvasina.com/EVENT/kakizome/gallery/{$filename}.html" target=_blank></a>
	<a class=itemSign href="http://www.facebook.com/{$filename}" target=_blank style="color:red;">{$filename}</a>
</div>

EOT;

	$i++;
}
?>
</section>