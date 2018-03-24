<script>
function $(id){return document.getElementById(id);}
var canvas=$('canvas');
var c=canvas.getContext('2d');

var fude={x:0,y:0,d:0};
var fude_temp={x:0,y:0,d:0};
var draw=0;
var log = new Array();
var i=0;

c.fillStyle="white";
c.fillRect(0,0,400,500);
c.fillStyle="black";
c.shadowBlur = 10;

canvas.onmousedown=function(){
    draw=1;
    c.globalAlpha=1;
	fudesaki(fude.x,fude.y-5,-5);
    fude_temp.x=fude.x;
    fude_temp.y=fude.y;
    fude_temp.d=fude.d;
};
canvas.onmouseup=function(){
    c.globalAlpha=1;
    if(fude.x!=fude_temp.x)fudesaki(fude.x,fude.y+5,-5);
    draw=0;
    fude_temp.x=fude.x;
    fude_temp.y=fude.y;
    fude_temp.d=fude.d;
};
function fudesaki(x,y,d){
	c.save();
    c.translate(x,y);
    c.rotate(20/180*Math.PI);
    c.scale(1,0.5);
    c.beginPath();
    c.arc(0,0,20-d,0,2*Math.PI,false);
    c.fill();
    c.restore();
    log={x:fude.x,y:fude.y};
}
function save(){
    
	var img = new Image();
    img.src = canvas.toDataURL("image/png");
    document.frm.img.value=img.src;  
    document.frm.submit();
}

canvas.onmousemove = function(e){
	var rect = e.target.getBoundingClientRect();
	fude.x = e.clientX - rect.left;			
	fude.y= e.clientY - rect.top;
    fude.d= Math.abs((fude_temp.x-fude.x)/3);
    c.globalAlpha=0.6;
    if(fude.d>=20)fude.d=19;
    var j=30;
    if(draw==1){
        for(var i=0;i<j;i++){
		    fudesaki(
            fude.x+(fude.x-fude_temp.x)*i/j,
            fude.y+(fude.y-fude_temp.y)*i/j,
            fude.d+(fude.d-fude_temp.d)*i/j
            ); 
        }     
    }
    fude_temp.x=fude.x;
    fude_temp.y=fude.y;
    fude_temp.d=fude.d;
};
</script>