<div id=manual>
	<div class=inner>
	<h2><b>Simple Manual : Canvasina Draw basic</b></h2>
	<table width=100%>
		<tr><td width=40%>Select color: </td><td><b>color(red);</b></td></tr>
		<tr><td>Rectangle:		</td><td><b>box(x,y,wide,high);</b></td></tr>		
		<tr><td>String: </td><td><b>str("str",x,y,size,fontFamily);</b></td></tr>
		<tr><td>Triangle:		</td><td><b>path(); tri(x,y,x1,y1,x2,y2);</b></td></tr>
		<tr><td>Line: 			</td><td><b>path(); line(x,y,x1,y1);</b></td></tr>
		<tr><td>Circle: 	</td><td><b>path(); circle(x,y,radius);</b></td></tr>
		<tr><td>Arc: </td><td><b>path(); circle(x,y,radius,d1,d2);</b></td></tr>
		<tr><td>Paint: </td><td><b>paint();</b></td></tr>
		<tr><td>Outline: </td><td><b>outline(wide);</b></td></tr>
	</table>
	<br>
	<h2>Calculate</h2>
	<table width=100%>
		<tr><td width=40%><i>d</i> degree sin : 	</td><td><b>sin(<i>d</i>)</b></td></tr>
		<tr><td><i>d</i> degree cosin : </td><td><b>cos(<i>d</i>)</b></td></tr>
		<tr><td>Random num untill <i>n</i> : </td><td><b>random(<i>n</i>)</b></td></tr>
		<tr><td>Absolute of <i>n</i> : 	</td><td><b>abs(<i>n</i>)</b></td></tr>
		<tr><td>Floor of <i>n</i> : 	</td><td><b>floor(<i>n</i>)</b></td></tr>
		<tr><td>π(circle ratio) :	   </td><td><b>pi</b></td></tr>
	</table>
	</div>
</div>
	
<button class=btn onclick="openManual()"; style="position:absolute;top:0px;left:370px;background-color:white;color:red;border:1px solid gray;border-radius:20px;width:100px;">manual</button>
	
<script>
	function openManual(){
		if(document.getElementById('manual').style.top=='0px'){
			document.getElementById('manual').style.top='-700px'
		}else{
			document.getElementById('manual').style.top='0px'
		};
	}
</script>