<section id=list>
<h1>ギャラリー</h1>

<?php
$dir = opendir("./gallery{$year}/");
$i=0;
while (($file = readdir($dir)) !== false) {
	if ($file != "." 
	&& $file != ".." 
	&& $file != ".html" 
	&& $file != "sort.php"
	&& $file != "404.html"
	&& $file != ".htaccess"
	&& $file != "undefined.html") {
		$time = filemtime("./gallery{$year}/{$file}");
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
	
	$usr=substr($filename,0,strpos($filename,"_"));
	
echo <<< EOT
<div class=item>
	<a href="gallery{$year}/{$filename}.html">
	<img src="galleryImg{$year}/{$filename}.png?r={$r}">
	</a>
	<div class=hanamaru></div>
	<a class=Sign href="http://www.facebook.com/{$usr}" target=_blank>{$usr}</a>
</div>

EOT;

	$i++;
}
?>
<div class=cl></div>
</section>