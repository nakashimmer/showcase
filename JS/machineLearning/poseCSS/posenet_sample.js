/** 
* @license
* Copyright Copyright 2018 Google Inc. All Rights Reserved.
* Apache License Version 2.0（「本ライセンス」）に基づいてライセンスされます。
* あなたがこのファイルを使用するためには、本ライセンスに従わなければなりません。
* 本ライセンスのコピーは下記の場所から入手できます。
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* 適用される法律または書面での同意によって命じられない限り、
* 本ライセンスに基づいて頒布されるソフトウェアは、明示黙示を問わず、
* いかなる保証も条件もなしに「現状のまま」頒布されます。
* 本ライセンスでの権利と制限を規定した文言については、本ライセンスを参照してください。
*/
/*
* このプログラムは
* https://github.com/tensorflow/tfjs-models/tree/master/posenet/demos
* および
* https://github.com/tensorflow/tfjs-models/blob/master/posenet/demos/camera.js
* をもとに作成しました。
*/
/*
このファイルは、随時改変しています。
*/



const imageScaleFactor = 0.2;
const outputStride = 16;
const flipHorizontal = false;
const stats = new Stats();
const contentWidth = 800;
const contentHeight = 600;

bindPage();

async function bindPage() {
	const net = await posenet.load();
	let video = await loadVideo();
	detectPoseInRealTime(video, net);
}

async function loadVideo() {
	const video = await setupCamera();
	video.play();
	return video;
}

async function setupCamera() {	
	const video = document.getElementById('video');
	
	if (
		navigator.mediaDevices && 
		navigator.mediaDevices.getUserMedia){
			const stream 
			= await navigator.mediaDevices.getUserMedia({
				'audio': false,
				'video': true
		});
    video.srcObject = stream;
    return new Promise(
			resolve => {
				video.onloadedmetadata = () => {
				resolve(video);
				};
      }
		);
  } else {
		const errorMessage = "ブラウザかカメラがNGです。";
		alert(errorMessage);
		return Promise.reject(errorMessage);
	}
}


const data = document.getElementById('data');

function detectPoseInRealTime(video, net) {
	const head = document.getElementById('head');
	const Leye = document.getElementById('Leye');
	const Reye = document.getElementById('Reye');
	const nose = document.getElementById('nose');
	const Lhand = document.getElementById('Lhand');
	const Rhand = document.getElementById('Rhand');
	const wrap2 = document.getElementById('wrap2');


	const flipHorizontal = true;

  async function poseDetectionFrame() {
    stats.begin();
    let poses = [];
    const pose = await net.estimateSinglePose(
			video, 
			imageScaleFactor, 
			flipHorizontal, 
			outputStride
		);
    poses.push(pose);


		poses.forEach(({ s, keypoints }) => {

			//keypoints[5] keypoints[6];//肩
			sholder.style.left = (800-(keypoints[5].position.x + keypoints[6].position.x) / 2 )+ "px";
			sholder.style.top =  (keypoints[5].position.y + keypoints[6].position.y) / 2 + "px";

			//手 7,8,9,10
			Lhand.style.left = (800-keypoints[9].position.x)+"px";
			Lhand.style.top = keypoints[9].position.y + "px";
			Rhand.style.left = (800-keypoints[10].position.x) + "px";
			Rhand.style.top = keypoints[10].position.y + "px";

			//輪郭3,4
			head.style.left = (800-(keypoints[3].position.x+keypoints[4].position.x)/2)  + "px";
			head.style.top = (keypoints[3].position.y + keypoints[4].position.y) / 2 + "px";

			//右目
			Reye.style.left = 800-keypoints[1].position.x + "px";
			Reye.style.top = keypoints[1].position.y + "px";

			//左目
			Leye.style.left = 800-keypoints[2].position.x + "px";
			Leye.style.top = keypoints[2].position.y + "px";

			//鼻
			nose.style.left = 800-keypoints[0].position.x + "px";
			nose.style.top = keypoints[0].position.y + "px";
	
		});

		stats.end();
		requestAnimationFrame(poseDetectionFrame);
	}
	poseDetectionFrame();
}





