<?php require_once('include/header.php');?>
<title>canvasina usage | HTML5 canvas art scripting gallery</title>

<section id=howto class=wrap>
	<header>
		<h1>Canvasina</h1>
	</header>
	<!-- ?php require_once('include/connect.php');? -->
	
	<?php require_once('include/nav.php');?>
	
	<section style="text-align:left;">
	
	<section style="margin:10px;">
		<h1>What's Canvasina ?</h1>
		<p>Canvasina is "<b>art scripting</b>" on HTML5 (Canvas 2D API).
	</section>
	
	<section style="margin:10px;">
		<h2>At first,</h2>
		<p>You login with <a href="http://www.facebook.com"><b>facebook account</b></a>.
		Allow "<b>pop up</b>" on your browser.</p>
	</section>
	
	<section style="margin:10px;">
		<h2>Create</h2>
		<p>You can create 100 web pages.</p>
	</section>
	
	<section style="margin:10px;">
		<h2>Write Code</h2>
		<style>
			table{border-collapse:collapse;}
			th,td{border:1px solid gray;padding:5px;}
			th,td,td i,td b{font-size:15px;font-family:serif;background-color:ivory;color:black;}
			th{text-align:center;}
			i{color:#111}
			canvas{border:1px solid gray;margin:5px;box-shadow:2px 2px 2px gray;}
		</style>
		
		<table width=100%>
			<tr><th>You want...</th>
			<!--th>Write canvasina code</th-->
			<th>Sample</th>
			<th>HTML5 Canvas 2D API<br>(context("2D") is c)</th></tr>

			<tr><th>draw Box</th>
				<!--td><b>color(<i>color</i>);<br>box(<i>x,y,width,height</i>);</td-->
				<td><canvas id=box width=200 height=200></canvas>
				c.fillStyle="blue";<br>
				c.fillRect(50,60,70,80);
				</td>
				<td>c.fillStyle="color";<br>c.fillRect(x,y,width,height);</td></tr>

				<script>
					var cBox=document.getElementById("box").getContext("2d");
					cBox.fillStyle="blue";
					cBox.fillRect(50,60,70,80);
					cBox.font="15px sans-serif";cBox.textAlign="center";cBox.fillStyle="black";
					cBox.fillText("(50,60)",50,55);
					cBox.fillText("70px",85,155);
					cBox.fillText("80px",140,100);
					//redPoint
					cBox.fillStyle="red";
					cBox.beginPath();cBox.arc(50,60,4,0,2*Math.PI,false);cBox.fill();
				</script>
				
			<tr><th>write text</th>
				<!--td><b>color(<i>color</i>);<br>str(<i>"hello!",x,y,fontSize,fontFamily</i>);</td-->
				<td><canvas id=text width=200 height=200></canvas>
							c.fillStyle="orange";<br>
							c.font="50px serif";<br>
							c.fillText("hello!",30,100);
				</td>
				<td>c.fillStyle="color";<br>c.font="fontSize fontFamily";<br>c.fillText("hello!",x,y);</td></tr>

				<script>
					var cText=document.getElementById("text").getContext("2d");
					cText.fillStyle="orange";
					cText.font="50px serif";
					cText.fillText("hello!",30,100);
					cText.font="15px sans-serif";cText.textAlign="center";cText.fillStyle="black";
					cText.fillText("(30,100)",30,120);
					cText.fillText("50px serif",100,90);
					
					//redPoint
					cText.fillStyle="red";
					cText.beginPath();cText.arc(30,100,4,0,2*Math.PI,false);cText.fill();
				</script>
				
			<tr><th>draw Triangle</th>
				<!--td><b>tri(<i>x,y,x1,y1,x2,y2</i>);<br>fill(<i>color</i>);</td-->
				<td><canvas id=tri  width=200 height=200></canvas>
							c.fillStyle="green";<br>
							c.beginPath();<br>
							c.moveTo(100,50);<br>
							c.lineTo(60,140);<br>
							c.lineTo(150,160);<br>
							c.closePath();<br>
							c.fill();
				</td>
				<td>c.fillStyle="color";<br>c.beginPath();<br>c.moveTo(x,y);<br>c.lineTo(x1,y1);<br>c.lineTo(x2,y2);<br>c.closePath();<br>c.fill();</td></tr>

				<script>
					var cTri=document.getElementById("tri").getContext("2d");
					cTri.fillStyle="green";
					cTri.beginPath();
					cTri.moveTo(100,50);
					cTri.lineTo(60,140);
					cTri.lineTo(150,160);
					cTri.closePath();
					cTri.fill();
					cTri.font="15px sans-serif";cTri.textAlign="center";cTri.fillStyle="black";
					cTri.fillText("(100,50)",100,50);
					cTri.fillText("(60,140)",60,160);
					cTri.fillText("(150,160)",150,180);
					//redPoint
					cTri.fillStyle="red";
					cTri.beginPath();cTri.arc(100,50,4,0,2*Math.PI,false);cTri.fill();
					cTri.beginPath();cTri.arc(60,140,4,0,2*Math.PI,false);cTri.fill();					
					cTri.beginPath();cTri.arc(150,160,4,0,2*Math.PI,false);cTri.fill();					
				</script>

			<tr><th>draw Line</th>
				<!--td><b>lineWidth(<i>width</i>);<br>line(<i>x1,y1,x2,y2</i>);<br>stroke(<i>color</i>);</td-->
				<td><canvas id=line width=200 height=200></canvas>
							c.strokeStyle="brown";<br>
							c.beginPath();<br>
							c.moveTo(50,60);<br>
							c.lineTo(150,160);<br>
							c.lineWidth=10;<br>
							c.lineCap="round";<br>
							c.stroke();
				</td>
				<td>c.strokeStyle="color";<br>c.beginPath();<br>c.moveTo(x,y);<br>c.lineTo(x1,y1);<br>c.lineCap="round";<br>c.stroke();</td></tr>		

				<script>
					var cLine=document.getElementById("line").getContext("2d");
					cLine.strokeStyle="brown";
					cLine.beginPath();
					cLine.moveTo(50,60);
					cLine.lineTo(150,160);
					cLine.lineWidth=10;
					cLine.lineCap="round";
					cLine.stroke();
					cLine.font="15px sans-serif";cLine.textAlign="center";cLine.fillStyle="black";
					cLine.fillText("(50,60)",50,55);
					cLine.fillText("(150,160)",150,185);
					//redPoint
					cLine.fillStyle="black";
					cLine.beginPath();cLine.arc(50,60,4,0,2*Math.PI,false);cLine.fill();
					cLine.beginPath();cLine.arc(150,160,4,0,2*Math.PI,false);cLine.fill();	
				</script>
				
			<tr><th>draw Circle</th>
				<!--td><b>circle(<i>x,y,radius</i>);<br>fill(<i>color</i>);</td-->
				<td><canvas id=circle width=200 height=200></canvas>
							c.fillStyle="red";<br>
							c.beginPath();<br>
							c.arc(100,90,80,0,2*Math.PI,false);<br>
							c.fill();
				</td>
				<td>c.fillStyle="color";<br>c.beginPath();<br>c.arc(x,y,radius,0,2*Math.PI,false);<br>c.fill();</td></tr>		

				<script>
					var cCircle=document.getElementById("circle").getContext("2d");
					cCircle.fillStyle="red";
					cCircle.beginPath();
					cCircle.arc(100,90,80,0,2*Math.PI,false);
					cCircle.fill();
					cCircle.font="15px sans-serif";cCircle.textAlign="center";cCircle.fillStyle="black";
					cCircle.fillText("(100,90)",100,80);
					//redPoint
					cCircle.fillStyle="black";
					cCircle.beginPath();cCircle.arc(100,90,4,0,2*Math.PI,false);cCircle.fill();				
					
				</script>
				
			<tr><th>draw Polyline</th>
				<!--td><b>lineWidth(<i>width</i>)<br>polyline(<i>x,y,x1,y1,...</i>);<br>stroke(<i>color</i>);</td-->
				<td><canvas id=polyline width=200 height=200></canvas>
							c.strokeStyle="red";<br>
							c.beginPath();<br>
							c.moveTo(10,100);<br>
							c.lineTo(60,50);<br>
							c.lineTo(110,150);<br>
							c.lineTo(160,100);<br>
							c.lineCap="round";<br>
							c.stroke();
				</td>
				<td>c.strokeStyle="color";<br>c.beginPath();<br>c.moveTo(x,y);<br>c.lineTo(x1,y1);<br>c.lineTo(x2,y2);<br>c.lineTo(x3,y3);<br>c.lineCap="round";<br>c.stroke();</td></tr>		

				<script>
					var cPl=document.getElementById("polyline").getContext("2d");
					cPl.strokeStyle="red";
					cPl.beginPath();
					cPl.moveTo(10,100);
					cPl.lineTo(60,50);
					cPl.lineTo(110,150);
					cPl.lineTo(160,100);
					cPl.lineCap="round";
					cPl.stroke();
					cPl.font="15px sans-serif";cPl.textAlign="center";cPl.fillStyle="black";
					cPl.fillText("(10,100)",30,120);
					cPl.fillText("(60,50)",60,30);
					cPl.fillText("(110,150)",110,170);
					cPl.fillText("(160,100)",160,80);

					//redPoint
					cPl.fillStyle="black";
					cPl.beginPath();cPl.arc(10,100,4,0,2*Math.PI,false);cPl.fill();				
					cPl.beginPath();cPl.arc(60,50,4,0,2*Math.PI,false);cPl.fill();	
					cPl.beginPath();cPl.arc(110,150,4,0,2*Math.PI,false);cPl.fill();	
					cPl.beginPath();cPl.arc(160,100,4,0,2*Math.PI,false);cPl.fill();						
				</script>

			<tr><th>draw Polygon</th>
				<!--td><b>polygon(<i>x,y,x1,y1,...</i>);<br>fill(<i>color</i>);</td-->
				<td><canvas id=polygon width=200 height=200></canvas>
							c.fillStyle="red";<br>
							c.beginPath();<br>
							c.moveTo(10,100);<br>
							c.lineTo(60,50);<br>
							c.lineTo(110,60);<br>
							c.lineTo(160,100);<br>
							c.lineCap="round";<br>
							c.fill();
				</td>
				<td>c.fillStyle="color";<br>c.beginPath();<br>c.moveTo(x,y);<br>c.lineTo(x1,y1);<br>c.lineTo(x2,y2);<br>c.lineTo(x3,y3);<br>c.closePath();<br>c.fill();</td></tr>		

				<script>
					var cPg=document.getElementById("polygon").getContext("2d");
					cPg.fillStyle="red";
					cPg.beginPath();
					cPg.moveTo(10,100);
					cPg.lineTo(60,50);
					cPg.lineTo(110,60);
					cPg.lineTo(160,100);
					cPg.lineCap="round";
					cPg.fill();
					cPg.font="15px sans-serif";cPg.textAlign="center";cPg.fillStyle="black";
					cPg.fillText("(10,100)",30,120);
					cPg.fillText("(60,50)",60,30);
					cPg.fillText("(110,60)",130,40);
					cPg.fillText("(160,100)",160,120);

					//redPoint
					cPg.fillStyle="black";
					cPg.beginPath();cPg.arc(10,100,4,0,2*Math.PI,false);cPg.fill();				
					cPg.beginPath();cPg.arc(60,50,4,0,2*Math.PI,false);cPg.fill();	
					cPg.beginPath();cPg.arc(110,60,4,0,2*Math.PI,false);cPg.fill();	
					cPg.beginPath();cPg.arc(160,100,4,0,2*Math.PI,false);cPg.fill();
				</script>

			<!--tr><th>Others</th>
				<td colspan="2"><b>sin(<i>degree</i>);<br>cos(<i>degree</i>);<br>pi<br>red,blue,green,...</td>
				</td>
				<td>Math.sin(radian);<br>Math.cos(radian);<br>Math.PI<br>"red","blue","green",...</td></tr>
			<tr><th>Level</th><th colspan="2">easy</th><th>hard</th></tr -->
		</table>
<!-- ------- -->
<style>

</style>


<!-- ------- -->
	</section>
	
	<section style="margin:10px;">
		<h2>Save</h2>
		<p>Saving your data,click save button.</p>
	</section>
	
	<section style="margin:10px;">
		<h2>Publish</h2>
		<p>Sending to Canvasina gallery,click publish button.</p>
	</section>
	
	<section style="margin:10px;">
		<h2>Share</h2>
		<p>Please share your art scripting.</p>
	</section>
	
	<section style="margin:10px;">
		<h2>View</h2>
		<p>Click view button, you see Gallery page.</p>
	</section>

	<?php require_once('include/footer.php');?>

	
</section>
