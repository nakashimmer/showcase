var CACHE_NAME = 'pwa-sample-caches';
var urlsToCache = [
	'/showcase/pwa/apple-touch-icon.png',
	'/showcase/pwa/favicon.ico',
	'/showcase/pwa/icon57.png',
	'/showcase/pwa/icon180.png',
	'/showcase/pwa/icon192.png',
	'/showcase/pwa/icon512.png',
	'/showcase/pwa/index.html',
	'/showcase/pwa/sound.mp3'
	
];

// インストール処理
self.addEventListener('install', function (event) {
	event.waitUntil(
		caches
			.open(CACHE_NAME)
			.then(function (cache) {
				return cache.addAll(urlsToCache.map(url => new Request(url, {credentials: 'same-origin'})));
			})
	);
});

// リソースフェッチ時のキャッシュロード処理
self.addEventListener('fetch', function (event) {
	event.respondWith(
		caches
			.match(event.request)
			.then(function (response) {
				return response ? response : fetch(event.request);
			})
	);
});