<!-- fb login----------------------------------------------------------- -->
<div id=fb-root></div>
<script>
window.fbAsyncInit = function(){
	FB.init({appId:'217676768368073', status:true, cookie:true, xfbml:true});

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
		document.frm.user.value=user.username;
		sessionStorage.username = user.username;
	});
}

(function(){
	var e = document.createElement('script');
	e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
	e.async = true;
	document.getElementById('fb-root').appendChild(e);
}());
</script>
