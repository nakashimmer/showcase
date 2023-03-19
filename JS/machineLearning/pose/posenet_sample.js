

// global variables
let poses = [];                          // make it global
let myPosenetMultiplierVersion = 0.75   // 0.50, 0.75, 1.00, or 1.01  
let myAlgorithm = 'multi-pose'
let myFacingMode = 'environment'

let myImageScaleFactor = 0.5
let myFlipHorizontal = false
let myOutputStride = 16
let myMaxPoseDetections = 5
let myScoreThreshold = 0.8
let myNmsRadius = 10


let myMinPoseConfidence = 0.1
let myMinPartConfidence = 0.2

let myShowVideo = true
let myShowSkeleton = true
let myShowBoundingBox = false
let myShowPoints = false

let myMobileNetArchitecture = 0.75   //  isMobile() ? '0.50' : '0.75'



//import * as posenet from '@tensorflow-models/posenet';
//import * as tf from '@tensorflow/tfjs';

const color = 'aqua';
const boundingBoxColor = 'red';
const lineWidth = 2;

function toTuple({ y, x }) {
	return [y, x];
}

///export function drawPoint(ctx, y, x, r, color) {
function drawPoint(ctx, y, x, r, color) {
	ctx.beginPath();
	ctx.arc(x, y, r, 0, 2 * Math.PI);
	ctx.fillStyle = color;
	ctx.fill();
}

/**
		* Draws a line on a canvas, i.e. a joint
		*/
///export function drawSegment([ay, ax], [by, bx], color, scale, ctx) {
function drawSegment([ay, ax], [by, bx], color, scale, ctx) {
	ctx.beginPath();
	ctx.moveTo(ax * scale, ay * scale);
	ctx.lineTo(bx * scale, by * scale);
	ctx.lineWidth = lineWidth;
	ctx.strokeStyle = color;
	ctx.stroke();
}

/**
		* Draws a pose skeleton by looking up all adjacent keypoints/joints
		*/
///export function drawSkeleton(keypoints, minConfidence, ctx, scale = 1) {
function drawSkeleton(keypoints, minConfidence, ctx, scale = 1) {
	const adjacentKeyPoints =
		posenet.getAdjacentKeyPoints(keypoints, minConfidence);

	adjacentKeyPoints.forEach((keypoints) => {
		drawSegment(
			toTuple(keypoints[0].position), toTuple(keypoints[1].position), color,
			scale, ctx);
	});
}

/**
		* Draw pose keypoints onto a canvas
		*/
///export function drawKeypoints(keypoints, minConfidence, ctx, scale = 1) {
function drawKeypoints(keypoints, minConfidence, ctx, scale = 1) {
	for (let i = 0; i < keypoints.length; i++) {
		const keypoint = keypoints[i];

		if (keypoint.score < minConfidence) {
			continue;
		}

		const { y, x } = keypoint.position;
		drawPoint(ctx, y * scale, x * scale, 3, color);
	}
}

/**
		* Draw the bounding box of a pose. For example, for a whole person standing
		* in an image, the bounding box will begin at the nose and extend to one of
		* ankles
		*/
///export function drawBoundingBox(keypoints, ctx) {
function drawBoundingBox(keypoints, ctx) {
	const boundingBox = posenet.getBoundingBox(keypoints);

	ctx.rect(
		boundingBox.minX, boundingBox.minY, boundingBox.maxX - boundingBox.minX,
		boundingBox.maxY - boundingBox.minY);

	ctx.strokeStyle = boundingBoxColor;
	ctx.stroke();
}

/**
		* Converts an arary of pixel data into an ImageData object
		*/
///export async function renderToCanvas(a, ctx) {
async function renderToCanvas(a, ctx) {
	const [height, width] = a.shape;
	const imageData = new ImageData(width, height);

	const data = await a.data();

	for (let i = 0; i < height * width; ++i) {
		const j = i * 4;
		const k = i * 3;

		imageData.data[j + 0] = data[k + 0];
		imageData.data[j + 1] = data[k + 1];
		imageData.data[j + 2] = data[k + 2];
		imageData.data[j + 3] = 255;
	}

	ctx.putImageData(imageData, 0, 0);
}

/**
		* Draw an image on a canvas
		*/
///export function renderImageToCanvas(image, size, canvas) {
function renderImageToCanvas(image, size, canvas) {
	canvas.width = size[0];
	canvas.height = size[1];
	const ctx = canvas.getContext('2d');

	ctx.drawImage(image, 0, 0);
}

/**
		* Draw heatmap values, one of the model outputs, on to the canvas
		* Read our blog post for a description of PoseNet's heatmap outputs
		* https://medium.com/tensorflow/real-time-human-pose-estimation-in-the-browser-with-tensorflow-js-7dd0bc881cd5
		*/
///export function drawHeatMapValues(heatMapValues, outputStride, canvas) {
function drawHeatMapValues(heatMapValues, outputStride, canvas) {
	const ctx = canvas.getContext('2d');
	const radius = 5;
	const scaledValues = heatMapValues.mul(tf.scalar(outputStride, 'int32'));

	drawPoints(ctx, scaledValues, radius, color);
}

/**
		* Used by the drawHeatMapValues method to draw heatmap points on to
		* the canvas
		*/
function drawPoints(ctx, points, radius, color) {
	const data = points.buffer().values;

	for (let i = 0; i < data.length; i += 2) {
		const pointY = data[i];
		const pointX = data[i + 1];

		if (pointX !== 0 && pointY !== 0) {
			ctx.beginPath();
			ctx.arc(pointX, pointY, radius, 0, 2 * Math.PI);
			ctx.fillStyle = color;
			ctx.fill();
		}
	}
}

/**
 * Draw offset vector values, one of the model outputs, on to the canvas
 * Read our blog post for a description of PoseNet's offset vector outputs
 * https://medium.com/tensorflow/real-time-human-pose-estimation-in-the-browser-with-tensorflow-js-7dd0bc881cd5
 */
///export function drawOffsetVectors(
function drawOffsetVectors(
	heatMapValues, offsets, outputStride, scale = 1, ctx) {
	const offsetPoints =
		posenet.singlePose.getOffsetPoints(heatMapValues, outputStride, offsets);

	const heatmapData = heatMapValues.buffer().values;
	const offsetPointsData = offsetPoints.buffer().values;

	for (let i = 0; i < heatmapData.length; i += 2) {
		const heatmapY = heatmapData[i] * outputStride;
		const heatmapX = heatmapData[i + 1] * outputStride;
		const offsetPointY = offsetPointsData[i];
		const offsetPointX = offsetPointsData[i + 1];

		drawSegment(
			[heatmapY, heatmapX], [offsetPointY, offsetPointX], color, scale, ctx);
	}
}



















//import * as posenet from '@tensorflow-models/posenet';
//import dat from 'dat.gui';
//import Stats from 'stats.js';

//import {drawBoundingBox, drawKeypoints, drawSkeleton} from './demo_util';

const videoWidth = 600;
const videoHeight = 500;
///const stats = new Stats();

function isAndroid() {
	return /Android/i.test(navigator.userAgent);
}

function isiOS() {
	return /iPhone|iPad|iPod/i.test(navigator.userAgent);
}

function isMobile() {
	return isAndroid() || isiOS();
}

/**
 * Loads a the camera to be used in the demo
 *
 */
async function setupCamera() {
	if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
		throw new Error(
			'Browser API navigator.mediaDevices.getUserMedia not available');
	}

	const video = document.getElementById('video');
	video.width = videoWidth;
	video.height = videoHeight;

	const mobile = isMobile();
	const stream = await navigator.mediaDevices.getUserMedia({
		'audio': false,
		'video': {
			facingMode: myFacingMode,
			width: mobile ? undefined : videoWidth,
			height: mobile ? undefined : videoHeight,
		},
	});
	video.srcObject = stream;

	return new Promise((resolve) => {
		video.onloadedmetadata = () => {
			resolve(video);
		};
	});
}

async function loadVideo() {
	const video = await setupCamera();
	video.play();

	return video;
}








/**
 * Feeds an image to posenet to estimate poses - this is where the magic
 * happens. This function loops with a requestAnimationFrame method.
 */
function detectPoseInRealTime(video, net) {
	const canvas = document.getElementById('output');
	const ctx = canvas.getContext('2d');
	// since images are being fed from a webcam
	/// const flipHorizontal = true;

	canvas.width = videoWidth;
	canvas.height = videoHeight;

	async function poseDetectionFrame() {

		const imageScaleFactor = myImageScaleFactor;
		const outputStride = myOutputStride;

		///let poses = [];

		let minPoseConfidence;
		let minPartConfidence;
		switch (myAlgorithm) {
			case 'single-pose':
				const pose = await net.estimateSinglePose(
					video, myImageScaleFactor, myFlipHorizontal, myOutputStride);

				poses.push(pose);
				myPosesBackup = poses
				// document.getElementById('myPose').innerHTML = JSON.stringify(poses, null, 3) 
				minPoseConfidence = myMinPoseConfidence;
				minPartConfidence = myMinPartConfidence;
				break;
			case 'multi-pose':
				poses = await net.estimateMultiplePoses(
					video, myImageScaleFactor, myFlipHorizontal, myOutputStride,
					myMaxPoseDetections,
					myMinPartConfidence,
					myNmsRadius);
				myPosesBackup = poses
				// document.getElementById('myPose').innerHTML = JSON.stringify(poses, null, 3) 
				minPoseConfidence = myMinPoseConfidence;
				minPartConfidence = myMinPartConfidence;

				break;
		}

		ctx.clearRect(0, 0, videoWidth, videoHeight);

		if (myShowVideo) {
			ctx.save();
			ctx.scale(-1, 1);
			ctx.translate(-videoWidth, 0);
			ctx.drawImage(video, 0, 0, videoWidth, videoHeight);
			ctx.restore();
		}

		// For each pose (i.e. person) detected in an image, loop through the poses
		// and draw the resulting skeleton and keypoints if over certain confidence
		// scores
		poses.forEach(({ score, keypoints }) => {
			if (score >= minPoseConfidence) {
				if (myShowPoints) {
					drawKeypoints(keypoints, minPartConfidence, ctx);
				}
				if (myShowSkeleton) {
					drawSkeleton(keypoints, minPartConfidence, ctx);
				}
				if (myShowBoundingBox) {
					drawBoundingBox(keypoints, ctx);
				}
			}
		});

		// End monitoring code for frames per second
		/// stats.end();

		requestAnimationFrame(poseDetectionFrame);
	}

	poseDetectionFrame();
}

/**
 * Kicks off the demo by loading the posenet model, finding and loading
 * available camera devices, and setting off the detectPoseInRealTime function.
 */
///export async function bindPage() {
async function bindPage() {
	// Load the PoseNet model weights with architecture 0.75
	document.getElementById('info').innerHTML = 'loading....'
	net = await posenet.load(myPosenetMultiplierVersion);   // make it global   0.50, 0.75, 1.00, or 1.01

	document.getElementById('info').innerHTML = ''
	///document.getElementById('loading').style.display = 'none';
	/// document.getElementById('main').style.display = 'block';   

	let video;

	try {
		video = await loadVideo()
	} catch (e) {
		let info = document.getElementById('info');
		info.textContent = 'this browser does not support video capture,' +
			'or this device does not have a camera';
		//info.style.display = 'block';
		throw e;
	}

	/// setupGui([], net);
	///setupFPS();
	detectPoseInRealTime(video, net);
}

navigator.getUserMedia = navigator.getUserMedia ||
	navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
	// kick off the demo
	///bindPage();  


