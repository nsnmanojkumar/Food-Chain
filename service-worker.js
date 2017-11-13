var cacheName = 'weatherPWA-step-6-1';
var filesToCache = [
'/',
  '/index.html',
  '/assets/css/font-awesome.min.css',
  '/assets/css/main.css',
  '/assets/css/noscript.css',

  '/assets/fonts/FontAwesome.otf',
  '/assets/fonts/fontawesome-webfont.eot',
   '/assets/fonts/fontawesome-webfont.svg',
'/assets/fonts/fontawesome-webfont.ttf',
   '/assets/fonts/fontawesome-webfont.woff',
'/assets/fonts/fontawesome-webfont.woff2',

'/assets/js/jquery.min.js',
'/assets/js/main.js',
'/assets/js/skel.min.js',  

'/images/brown rice.jpg',
'/images/brown_rice.png',
'/images/dietplan_monthly.jpg',
'/images/mixture.jpg',
'/images/ragi dosa.jpg',
'/images/Ragi soup.jpg',
'/images/ragijava.jpg',
'/images/salat.jpg',
'/images/salatroll.jpg',

'/images1/brown rice.jpg',
'/images1/brown_rice.png',
'/images1/dietplan_monthly.jpg',
'/images1/mixture.jpg',
'/images1/ragi dosa.jpg',
'/images1/Ragi soup.jpg',
'/images1/ragijava.jpg',
'/images1/salat.jpg',
'/images1/salatroll.jpg',
'/app.js',

];

self.addEventListener('install', function(e) {
  console.log('[ServiceWorker] Install');
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      console.log('[ServiceWorker] Caching app shell')
      return cache.addAll(filesToCache);
    })
  );
});
self.addEventListener('activate', function(e) {
  console.log('[ServiceWorker] Activate');
  e.waitUntil(
    caches.keys().then(function(keyList) {
      return Promise.all(keyList.map(function(key) {
        if (key !== cacheName) {
          console.log('[ServiceWorker] Removing old cache', key);
          return caches.delete(key);
        }
      }));
    })
  );
  return self.clients.claim();
});

self.addEventListener('fetch', function(e) {
  console.log('[ServiceWorker] Fetch', e.request.url);
  e.respondWith(
    caches.match(e.request).then(function(response) {
      return response || fetch(e.request);
    })
  );
});