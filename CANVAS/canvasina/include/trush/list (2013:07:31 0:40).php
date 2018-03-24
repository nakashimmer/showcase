<section id=list>
	<!-- h1>Gallery</h1 -->
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
$i=1;
foreach ($p_data as $tmp) {
	$p_title = split("\,",$tmp);
	$filename=str_replace('.html','',$p_title[1]);
	$artist=substr($filename,0,-3);
	$r=rand(0,1000);

echo <<< EOT
<div class=item>
	<div class=inner>
		<iframe seamless sandbox="allow-same-origin allow-scripts" src="http://canvasina.com/gallery/{$filename}.html?r={$r}" width=500 height=650></iframe>
	</div>
	<a class=cover href="http://canvasina.com/gallery/{$filename}.html">{$artist}</a>
</div>

EOT;
$i++;
}
?>
</section>
