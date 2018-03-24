<script>
function $(id){return document.getElementById(id);}
var canvas=$('canvas');var c=canvas.getContext('2d');

var fude={x:0,y:0,d:0};
var fude2={x:0,y:0,d:0};
var draw=false;
c.fillStyle="white";c.fillRect(0,0,canvas.width,canvas.height);

c.fillStyle="black";
c.shadowBlur=5;c.shadowColor="black";

//筆先------
//mouse ---------------------------------------
	canvas.addEventListener("mousedown",function(e){draw=true; c.globalAlpha=1; fudesaki(fude.x,fude.y-5,-8);	savePos();});
	canvas.addEventListener("mouseup",	function(e){draw=false; c.globalAlpha=1; fudesaki(fude.x,fude.y,10);	savePos();});
//touch ----------------------------------------
	canvas.addEventListener("touchstart",	function(e){draw=true;touchPos(e);c.globalAlpha=1;fudesaki(fude.x,fude.y-5,-5);savePos();});
	canvas.addEventListener("touchend",	function(e){draw=false;touchPos(e);c.globalAlpha=1;if(fude.x!=fude2.x)fudesaki(fude.x,fude.y+5,-5);savePos();});

//筆先
	function fudesaki(x,y,d){//x,y,dは20=痩せ具合
		c.save();
			c.translate(x,y);	c.rotate(20/180*Math.PI);	c.scale(1,0.5);
			c.beginPath();	c.arc(0,0,20-d,0,2*Math.PI,false);c.fill();
		c.restore();
	}

//移動中
//mouse ---------------------------------------
canvas.addEventListener("mousemove",function(e){mousePos(e); drw(); savePos();});
canvas.addEventListener("touchmove",function(e){e.preventDefault(); touchPos(e); drw(); savePos();});

function drw(){
	fude.d= Math.abs((fude2.x-fude.x)/3);
	if(fude.d>=20)fude.d=19;
	var j=10;
	if(draw){
		c.globalAlpha=1/j;
		for(var i=1;i<=j;i++){fudesaki(fude.x+Math.floor((fude2.x-fude.x)*i/j),fude.y+Math.floor((fude2.y-fude.y)*i/j),fude.d); }
		c.closePath();
		c.fill();c.stroke();
		// ------------------------
	}
}


// original func
//マウスの位置を取得
function mousePos(e){var rect=e.target.getBoundingClientRect(); fude.x=e.clientX-rect.left; fude.y= e.clientY-rect.top;}
//タッチの位置を取得
function touchPos(e){var rect=e.target.getBoundingClientRect(); fude.x=e.touches[0].clientX-rect.left; fude.y=e.touches[0].clientY-rect.top;}

//移動後の前の位置を保存
function savePos(){fude2.x=fude.x;fude2.y=fude.y;fude2.d=fude.d;}

//画像保存
function save(){
	var img = new Image();
	img.src = canvas.toDataURL("image/png");
	document.frm.img.value=img.src;  
	document.frm.submit();
}
</script>