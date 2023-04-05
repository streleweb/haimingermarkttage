const staticCacheName = "pwa-v" + new Date().getTime();
const version = 1;
const cacheName = `hm-pwa-cache${version}`
const cacheList = []

var filesToCache = [
  '/',
  // '/css/app.css',
  // '/js/app.js',
  // '/images/icons/icon-72x72.png',
  // '/images/icons/icon-96x96.png',
  // '/images/icons/icon-128x128.png',
  // '/images/icons/icon-144x144.png',
  // '/images/icons/icon-152x152.png',
  // '/images/icons/icon-192x192.png',
  // '/images/icons/icon-384x384.png',
  // '/images/icons/icon-512x512.png',
];

//Cache on install
self.addEventListener("install", event => {
  console.log('serviceworker has been installed')
  this.skipWaiting();
  event.waitUntil(
    caches.open(staticCacheName)
      .then(cache => {
        return cache.addAll(filesToCache);
      })
  )
});

// Clear cache on activate
self.addEventListener('activate', event => {
  console.log('serviceworker has been activated')
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames
          .filter(cacheName => (cacheName.startsWith("pwa-")))
          .filter(cacheName => (cacheName !== staticCacheName))
          .map(cacheName => caches.delete(cacheName))
      );
    })
  );
});

// Vom Cache holen
self.addEventListener("fetch", event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        return response || fetch(event.request);
      })
      .catch(() => {
        return caches.match('offline');
      })
  )
});


