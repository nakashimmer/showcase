function item(url,title,comment){
	let str = 
		'<li onclick=link("'+url+'","'+encodeURI(title)+'","'+comment+'")>'+
		'<a href="'+'?page='+url+'&title='+title+'" class="dummy">'+title+'</a>'+
		'</li>';
		
	document.write(str);
}