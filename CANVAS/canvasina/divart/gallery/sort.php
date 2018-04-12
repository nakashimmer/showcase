<?php
$dir = opendir('.');
$i=0;
while(($dt = readdir()) !== FALSE){ 
	if(($dt!='.')&&($dt!='..')&&($dt!='index.php')){
		settype($dfile_size,"double");
		$dfile_size = round(filesize("$dt")/1000,1);
		if($dfile_size == 0) $dfile_size = 0.1;
		$file_size = sprintf("%01.1f",$dfile_size)."KB";
		$time = filemtime("$dt");
		$rcd = ereg_replace(".jpg", "", $dt);
		$p_data[$i]="$time,<a href=$dt>$rcd</a>";
		$i++;
	}
} 
closedir($dir);
$j=1;
rsort($p_data);
foreach ($p_data as $tmp) {
$p_title = split("\,",$tmp);
print "$j/$i<br>$p_title[1]<hr>\n";
$j++;
}
?>