var CACHE_NAME = 'pwa-sample-caches';
var urlsToCache = [
	'/showcase/pwa/',
	'/showcase/pwa/index.html',
	'/showcase/pwa/icon.png',
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