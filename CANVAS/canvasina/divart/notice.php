<?php require_once('include/header.php');?>
<title>Notice DIVART | CSS3 art gallery</title>

<section id=notice class=wrap>
	<header>
		<h1>DIV ART</h1> </a>
	</header>
	<!-- ?php require_once('include/connect.php');? -->
	<section>
		<div id=contents style="clear:both;line-height:50px;">
			login on facebook . . .
			<br>Use <b>modern browser</b>.
			<br>Please allow <b>pop up</b> dialog.
			<br>Need <b>facebook account</b> for login.
		</div>
	</section>
	<?php require_once('include/footer.php');?>
</section>

<!-- fb login-->
<div id=fb-root></div>
<script>
window.fbAsyncInit = function(){
	FB.init({appId:'141558212660855', status:true, cookie:true, xfbml:true});

	FB.getLoginStatus(function(response){
		if (response.status==='connected'){
			logined();	// Logged in
		}else {
			FB.login(function(response){
				if (response.authResponse) {
					logined();	// Logged in
				}else {
					alert("Bye.");
				}
			});
		}
	});
};

function logined(){
	FB.api('/me', function(user){
		
	var str ='	<section  style="text-align:center;margin:1em;clear:both;margin-top:50px;line-height:50px;">'
		+'	<h1><span id=name></span> ! Welcome to Canvasina</h1>'
		+'		<ul style="margin:50px 200px;">'
		+'			<li>Canvasina is <b>beta edition</b>.'
		+'			<li><b>No guarantee</b> keeping your data.'
		+'		</ul>'
		+'	</section>'
		+'	<form name=frm method=POST action="create.php">'
		+'		<input type=hidden name=id 			value=""/>'
		+'		<input type=hidden name=name 		value=""/>'
		+'		<input type=hidden name=username 	value=""/>'
		+'		<input type=hidden name=link 		value=""/>'
		+'		<input class="btn push" type=submit value="ok"/>'
		+'	</form>';
		
		$('contents').innerHTML = str;
		document.frm.id.value	=user.id;
		document.frm.name.value	=user.name;
		document.frm.username.value=user.username;
		sessionStorage.username = user.username;
		document.frm.link.value=user.link;
		$('name').innerHTML=user.name;
	});
}

(function(){
	var e = document.createElement('script');
	e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
	e.async = true;
	document.getElementById('fb-root').appendChild(e);
}());
</script>