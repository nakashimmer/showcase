//再度開いたときのリスト項目の取得
const LIS = document.getElementsByTagName("li");
const IFRAME = document.getElementById("iframe");

//ページを開いたときにパラメータを取得する
const PARAMETER = location.search.substring(1).split('&');
if(PARAMETER[0]){
	IFRAME.src = PARAMETER[0].slice(5,);
	if(PARAMETER[1]){
		document.title = decodeURIComponent(PARAMETER[1].slice(6,)+"|東京アプリ・ワークショップ");
	}
	for(let i=0;i<LIS.length;i++){
		let slice1=LIS[i].innerHTML.indexOf(">",0)+1;
		let str=LIS[i].innerHTML.slice(slice1,-4);
		if(str===decodeURIComponent(PARAMETER[1].slice(6,))){
			LIS[i].style.backgroundColor="lime";
		}
	}
}

//ナビゲーションをクリックしたらJSで開く
const COMMENT=document.getElementById("comment");

function link(href,title,comment){
	if(comment === "undefined"){
		COMMENT.innerHTML="👷説明文作成中";
	}else{
		COMMENT.innerHTML=comment;
	}

	if(href.slice(0,4)==="http"){
		window.open(href,"win"+Math.floor(Math.random()*1000));
		IFRAME.src="title.html";
	}else{
		IFRAME.src=href;
		history.replaceState('','',"?page="+href+"&title="+title);
		document.title = decodeURIComponent(title)+"|東京アプリ・ワークショップ";
	}
}

//リンク項目の取得とクリック時の背景色、今のリンク番号を取得して保存
for(let i=0;i<LIS.length;i++){
	LIS[i].addEventListener("click",()=>{
		for(let i=0;i<LIS.length;i++){
			LIS[i].style.backgroundColor="transparent";
		}
		LIS[i].style.backgroundColor="lime";
	})
}

//リンクをクリックしても動作させない
const DUMMYS=document.getElementsByClassName("dummy");

for(let i=0;i<DUMMYS.length;i++){
	DUMMYS[i].addEventListener("click",(e)=>{
		e.preventDefault();
	});
}
