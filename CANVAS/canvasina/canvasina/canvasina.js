var canvas = document.getElementById('canvasina');
var c=canvas.getContext('2d');

/* old func not use*/
function $cls(color)		{c.fillStyle=color;c.fillRect(0,0,width,height);}
function $1(x,y,r,color)	{c.beginPath();c.arc(x,y,r,0,2*pi,false);c.closePath();c.fillStyle=color;c.fill();}
function $2(x,y,x1,y1,color){c.beginPath();c.moveTo(x,y);c.lineTo(x1,y1);c.closePath();c.strokeStyle=color;c.stroke();}
function $3(x,y,x1,y1,x2,y2,color){c.beginPath();c.moveTo(x,y);c.lineTo(x1,y1);c.lineTo(x2,y2);c.closePath();c.fillStyle=color;c.fill();}
function $4(x,y,w,h,color)	{c.fillStyle=color;c.fillRect(x,y,w,h);}
function $txt(str,x,y,size,color,fontFamily){c.font=size+'px '+fontFamily;c.fillStyle=color;c.textAlign="center";c.fillText(str,x,y);}
function outline(w,color)	{if(w){c.lineWidth=w;}if(color){c.strokeStyle=color;}c.lineCap="round";c.stroke();}
function paint(color)		{if(color){c.fillStyle=color;}c.fill();}
function path()				{c.beginPath();}

/* original func */
function $(id)	{return document.getElementById(id);}
function sin(d)	{return Math.sin(d/180*pi);}
function cos(d)	{return Math.cos(d/180*pi);}
function random(r)	{return Math.floor(Math.random()*r);}
function abs(a)	{return Math.abs(a)};
function floor(a)	{return Math.floor(a)};
function animeLoop(ms){setInterval(anime,ms);}

/* original var */
var pi		=Math.PI;
var width	=canvas.width;
var height	=canvas.height;
var black	="black";
var white	="white";
var red		="red";
var green	="green";
var blue	="blue";
var orange	="orange";
var yellow	="yellow";
var brown	="#800000";

var skyblue	="skyblue"; 
var brown	="brown"; 
var gray	="gray"; 
var pink	="pink";
var arial	="arial";
var serif	="serif";
var sansSerif="sans-serif";

/* original func ver.1 2013/07/13 */
function Id(id)	{return document.getElementById(id);}

function clear()			{c.clearRect(0,0,width,height);}

function color(color)		{c.fillStyle=color;c.strokeStyle=color;}
function box(x,y,w,h)		{c.fillRect(x,y,w,h);}
function str(str,x,y,s,font){c.font=s+'px '+font;c.fillText(str,x,y);}

function circle(x,y,r,a,b)	{c.beginPath();if(a-b){c.arc(x,y,r,a/180*pi,b/180*pi,false);}else{c.arc(x,y,r,0,2*pi,false);}}
function line(x,y,x1,y1)	{c.beginPath();c.moveTo(x,y);c.lineTo(x1,y1);c.lineCap="round";}
function tri(x,y,x1,y1,x2,y2){c.beginPath();c.moveTo(x,y);c.lineTo(x1,y1);c.lineTo(x2,y2);c.closePath();}

function polyline(x,y,x1,y1,x2,y2,x3,y3,x4,y4,x5,y5,x6,y6,x7,y7,x8,y8,x9,y9,x10,y10,x11,y11,x12,y12,x13,y13,x14,y14,x15,y15,x16,y16,x17,y17,x18,y18,x19,y19,x20,y20){
	c.beginPath();
	c.lineCap="round";
	c.moveTo(x,y);
	c.lineTo(x1,y1);
	c.lineTo(x2,y2);
	if(y3){c.lineTo(x3,y3);}
	if(y4){c.lineTo(x4,y4);}
	if(y5){c.lineTo(x5,y5);}
	if(y6){c.lineTo(x6,y6);}
	if(y7){c.lineTo(x7,y7);}
	if(y8){c.lineTo(x8,y8);}
	if(y9){c.lineTo(x9,y9);}
	if(y10){c.lineTo(x10,y10);}
	if(y11){c.lineTo(x11,y11);}
	if(y12){c.lineTo(x12,y12);}
	if(y13){c.lineTo(x13,y13);}
	if(y14){c.lineTo(x14,y14);}
	if(y15){c.lineTo(x15,y15);}
	if(y16){c.lineTo(x16,y16);}
	if(y17){c.lineTo(x17,y17);}
	if(y18){c.lineTo(x18,y18);}
	if(y19){c.lineTo(x19,y19);}
	if(y20){c.lineTo(x20,y20);}
}

function polygon(x,y,x1,y1,x2,y2,x3,y3,x4,y4,x5,y5,x6,y6,x7,y7,x8,y8,x9,y9,x10,y10,x11,y11,x12,y12,x13,y13,x14,y14,x15,y15,x16,y16,x17,y17,x18,y18,x19,y19,x20,y20){
	c.beginPath();
	c.moveTo(x,y);
	c.lineTo(x1,y1);
	c.lineTo(x2,y2);
	if(y3){c.lineTo(x3,y3);}
	if(y4){c.lineTo(x4,y4);}
	if(y5){c.lineTo(x5,y5);}
	if(y6){c.lineTo(x6,y6);}
	if(y7){c.lineTo(x7,y7);}
	if(y8){c.lineTo(x8,y8);}
	if(y9){c.lineTo(x9,y9);}
	if(y10){c.lineTo(x10,y10);}
	if(y11){c.lineTo(x11,y11);}
	if(y12){c.lineTo(x12,y12);}
	if(y13){c.lineTo(x13,y13);}
	if(y14){c.lineTo(x14,y14);}
	if(y15){c.lineTo(x15,y15);}
	if(y16){c.lineTo(x16,y16);}
	if(y17){c.lineTo(x17,y17);}
	if(y18){c.lineTo(x18,y18);}
	if(y19){c.lineTo(x19,y19);}
	if(y20){c.lineTo(x20,y20);}
	c.closePath();
}

function lineWidth(w){c.lineWidth=w;}

function fill(color)		{if(color){c.fillStyle=color;}c.fill();}
function stroke(color)		{if(color){c.strokeStyle=color;}c.stroke();}



 