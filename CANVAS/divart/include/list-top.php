<section id=list>
<h1>Access Ranking(last week)</h1>
<?php 
$juni=array(
	"nakashimmer_05",
	"nakashimmer_02",
	"nakashimmer_00",
	"nakashimmer_03",
	"nakashimmer_04",
	"nakashimmer_01"
);


for($i=0;$i<6;$i++){
	$artist=substr($juni[i],0,-3);
//----------------------------------------
echo <<< EOT
<div class=item>
	<div class=inner>
		<iframe seamless sandbox="allow-same-origin allow-scripts" src="gallery/{$juni[$i]}.html" width=500 height=650></iframe>
	</div>
	<a class=cover href="gallery/{$juni[$i]}.html">{$artist}</a>
</div>
EOT;
	}
//-----------------------------------------
?>
<div style="clear;both;"></div>
</section>