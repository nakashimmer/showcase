function sind(d) {return Math.sin(d*Math.PI/180) ; }
function cosd(d) {return Math.cos(d*Math.PI/180) ; }
function tand(d) {return Math.tan(d*Math.PI/180) ; }
function getGeo(){
//位置情報の取得
if(typeof(navigator.geolocation)=='undefined'){
	geolocation=google.gears.factory.create('beta.geolocation');
}else{
	geolocation=navigator.geolocation;
}
var option={enableHighAccuracy:true,timeout:10000,maximumAge:0};
geolocation.getCurrentPosition(seiko,shippai,option);
function seiko(position){
	la	= position.coords.latitude;
	lo	= position.coords.longitude;
	alt	= 0;
	main();
}
function shippai(err){alert("失敗"+err.code+err.message);}
//位置情報の取得ここまで
}

function getSerialNatureTime(){
	//自然時間を時・分で取得
	moon=(24*60-sunSet)+sunRize;
	sun=sunSet-sunRize;
	if(now<sunRize){ //未明
		natureTime=(now+24*60-sunSet)/moon*12-6;
		if(natureTime<0)natureTime+=24;
	}else if(sunSet<now){ //夜
		natureTime=(now-sunSet)/moon*12+18;
		if(natureTime>24)natureTime-=24;
	}else{ //昼
		natureTime=(now-sunRize)/sun*12+6;
	}
	hour	=Math.floor(natureTime);
	minite	=Math.floor((natureTime-hour)*60);
}
function getSerialDate(){
	//現在の時間をシリアルで取得
	date= new Date() ;
	yy	= date.getFullYear() ;
	mm	= date.getMonth() + 1 ;
	dd	= date.getDate() ;
	sec = date.getSeconds()+date.getMilliseconds()/1000;
	i	= -date.getTimezoneOffset()/60;
	now	=date.getHours()*60+date.getMinutes();
}
function getSerialSun(){
	//日の出日の入りをシリアルで取得
	t	= jy(yy,mm,dd-1,23,59,0,i) ;
	th	= sh(t,23,59,0,lo,i) ;
	ds	= spds(t) ;
	alp	= spal(t) ;
	dlt	= spdl(t) ;
	pht	= soal(la,th,alp,dlt) ;
	 
	for(hh=0; hh<24; hh++) {
		for(m=0; m<60; m++) {
			t	= jy(yy,mm,dd,hh,m,0,i) ;
			th	= sh(t,hh,m,0,lo,i) ;
			ds	= spds(t) ;
			alp	= spal(t) ;
			dlt	= spdl(t) ;
			ht	= soal(la,th,alp,dlt) ;
			t4	= sa(alt,ds) ;
			if((pht<t4)&&(ht>t4)){sunRize=hh*60+m;}
			if((pht>t4)&&(ht<t4)){sunSet=hh*60+m;}
			pht	= ht ;
		}
	}
}	

function jy(yy,mm,dd,h,m,s,i) { 
	yy -= 2000 ;
	if(mm <= 2) {mm += 12 ;yy-- ; }
	k = 365 * yy + 30 * mm + dd - 33.5 - i / 24 + Math.floor(3 * (mm + 1) / 5) + Math.floor(yy / 4) - Math.floor(yy / 100) + Math.floor(yy / 400);
	k += ((s / 60 + m) / 60 + h) / 24 ; 
	k += (65 + yy) / 86400 ; 
	return k / 365.25 ;
}

function spls(t) { 
	l = 280.4603 + 360.00769 * t 
		+ (1.9146 - 0.00005 * t) * sind(357.538 + 359.991 * t)
		+ 0.0200 * sind(355.05 +  719.981 * t)
		+ 0.0048 * sind(234.95 +   19.341 * t)
		+ 0.0020 * sind(247.1  +  329.640 * t)
		+ 0.0018 * sind(297.8  + 4452.67  * t)
		+ 0.0018 * sind(251.3  +    0.20  * t)
		+ 0.0015 * sind(343.2  +  450.37  * t)
		+ 0.0013 * sind( 81.4  +  225.18  * t)
		+ 0.0008 * sind(132.5  +  659.29  * t)
		+ 0.0007 * sind(153.3  +   90.38  * t)
		+ 0.0007 * sind(206.8  +   30.35  * t)
		+ 0.0006 * sind(29.8  +  337.18  * t)
		+ 0.0005 * sind(207.4  +    1.50  * t)
		+ 0.0005 * sind(291.2  +   22.81  * t)
		+ 0.0004 * sind(234.9  +  315.56  * t)
		+ 0.0004 * sind(157.3  +  299.30  * t)
		+ 0.0004 * sind(21.1  +  720.02  * t)
		+ 0.0003 * sind(352.5  + 1079.97  * t)
		+ 0.0003 * sind(329.7  +   44.43  * t) ;
	while(l >= 360) { l -= 360 ; }
	while(l < 0) { l += 360 ; }
	return l ;
}

function spds(t) { 
	r = (0.007256 - 0.0000002 * t) * sind(267.54 + 359.991 * t)
		+ 0.000091 * sind(265.1 +  719.98 * t)
		+ 0.000030 * sind( 90.0)
		+ 0.000013 * sind( 27.8 + 4452.67 * t)
		+ 0.000007 * sind(254   +  450.4  * t)
		+ 0.000007 * sind(156   +  329.6  * t)
	r = Math.pow(10,r) ;
	return r ;
}

function spal(t) { 
	ls = spls(t) ;
	ep = 23.439291 - 0.000130042 * t ;
	al = Math.atan(tand(ls) * cosd(ep)) * 180 / Math.PI ;
	if((ls >= 0)&&(ls < 180)) {
		while(al < 0) { al += 180 ; }
		while(al >= 180) { al -= 180 ; } }
	else {
		while(al < 180) { al += 180 ; }
 		while(al >= 360) { al -= 180 ; } }
		return al ;
	}
function spdl(t) {
	ls = spls(t) ;
	ep = 23.439291 - 0.000130042 * t ;
	dl = Math.asin(sind(ls) * sind(ep)) * 180 / Math.PI ;
	return dl ;
}

function sh(t,h,m,s,l,i) { 
	d = ((s / 60 + m) / 60 + h) / 24 ; 
	th = 100.4606 + 360.007700536 * t + 0.00000003879 * t * t - 15 * i ;
	th += l + 360 * d ;
	while(th >= 360) { th -= 360 ; }
	while(th < 0) { th += 360 ; }
	return th ;
}

function eandp(alt,ds) { 
	e = 0.035333333 * Math.sqrt(alt) ;
	p = 0.002442818 / ds ;
	return p - e ;
}

function sa(alt,ds) { 
	s = 0.266994444 / ds ;
	r = 0.585555555 ;
	k = eandp(alt,ds) - s - r ;
	return k ;
}

function soal(la,th,al,dl) { 
	h = sind(dl) * sind(la) + cosd(dl) * cosd(la) * cosd(th - al) ;
	h = Math.asin(h) * 180 / Math.PI ;
	return h;
}