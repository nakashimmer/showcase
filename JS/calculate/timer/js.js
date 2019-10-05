
	const remain = document.getElementById("remain");
	const buttons = document.getElementsByTagName("button");

	//音
	const sound = new Audio("sound.mp3");

	//スタート＝＝＝＝＝
	let ms = 100;
	let si;
	function timer(i) {
		if (i === 0) {
			clearInterval(si);
			remain.innerHTML = "残り時間：";
			sound.pause(); sound.currentTime = 0;
			for (let i = 0; i < buttons.length - 1; i++) {
				buttons[i].removeAttribute("disabled", "disabled");
				buttons[i].style.backgroundColor = "white";
			}
		} else {
			for (let i = 0; i < buttons.length - 1; i++) {
				buttons[i].setAttribute("disabled", "disabled");
				buttons[i].style.backgroundColor = "gray";
			}
			let maxTime = i * 60 + 3;
			si = setInterval(count, ms);
			sound.play();

			function count() {
				maxTime -= ms / 1000;
				if (Math.floor(maxTime) === 2) { sound.play(); }
				if (Math.floor(maxTime) <= 0) {
					clearInterval(si);
					for (let i = 0; i < buttons.length - 1; i++) {
						buttons[i].removeAttribute("disabled", "disabled");
						buttons[i].style.backgroundColor = "white";
					}
				}
				remain.innerHTML = "残り時間：" + Math.floor(maxTime / 60) + "分" + Math.floor(maxTime % 60) + "秒";
			}
		}
	}
