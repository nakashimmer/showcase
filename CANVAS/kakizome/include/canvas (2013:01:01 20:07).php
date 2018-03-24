<script>
function $(id){return document.getElementById(id);}
var canvas=$('canvas');
var c=canvas.getContext('2d');

var fude={x:0,y:0,d:0};
var fude2={x:0,y:0,d:0};
var draw;
c.fillStyle="white";
c.fillRect(0,0,400,500);
c.fillStyle="black";
c.shadowBlur = 3;
c.shadowColor="black";

//mouse
canvas.onmousedown=function(){
	draw=1;
	c.globalAlpha=1;
	fudesaki(fude.x,fude.y-5,-8);
	savePos();
};
canvas.onmouseup=function(){
	c.globalAlpha=1;
	fudesaki(fude.x,fude.y+5,8);
	draw=0;
	savePos();
};
canvas.onmousemove = function(e){
	var rect = e.target.getBoundingClientRect();
	fude.x = e.clientX - rect.left;			
	fude.y= e.clientY - rect.top;
	fude.d= Math.abs((fude2.x-fude.x)/3);
	c.globalAlpha=0.4;
	if(fude.d>=20)fude.d=19;
	var j=30;
	if(draw==1){
		for(var i=0;i<j;i++){
			fudesaki(
			fude.x+(fude.x-fude2.x)*i/j,
			fude.y+(fude.y-fude2.y)*i/j,
			fude.d+(fude.d-fude2.d)*i/j
			); 
		}	 
	}
 	savePos();
};

//touch
canvas.addEventListener(
	"touchstart",
	function(e){
		fingerPos(e);
		draw=1;
		c.globalAlpha=1;
		fudesaki(fude.x,fude.y-5,-5);
		savePos();
	}
);
canvas.addEventListener(
	"touchend",
	function(e){
		fingerPos(e);
		c.globalAlpha=1;
		if(fude.x!=fude2.x)fudesaki(fude.x,fude.y+5,-5);
		draw=0;
		savePos();
	}
);

canvas.addEventListener(
	"touchmove",function(e){
		fingerPos(e);
		fude.d= Math.abs((fude2.x-fude.x)/3);
		c.globalAlpha=0.6;
		if(fude.d>=20)fude.d=19;
		var j=30;
		if(draw==1){
			for(var i=0;i<j;i++){
				fudesaki(
				fude.x+(fude.x-fude2.x)*i/j,
				fude.y+(fude.y-fude2.y)*i/j,
				fude.d+(fude.d-fude2.d)*i/j
				); 
			}	 
		}
		savePos();
	}
);

// original func
function fingerPos(e){
	e.preventDefault();
	var rect = e.target.getBoundingClientRect();
	fude.x = e.touches[0].clientX - rect.left;			
	fude.y = e.touches[0].clientY - rect.top;
}
function savePos(){
	fude2.x=fude.x;
	fude2.y=fude.y;
	fude2.d=fude.d;
}
function fudesaki(x,y,d){
	c.save();
	c.translate(x,y);
	c.rotate(20/180*Math.PI);
	c.scale(1,0.5);
	c.beginPath();
	c.arc(0,0,20-d,0,2*Math.PI,false);
	c.fill();
	c.restore();
}
function save(){
	var img = new Image();
	img.src = canvas.toDataURL("image/png");
	document.frm.img.value=img.src;  
	document.frm.submit();
}



</script>