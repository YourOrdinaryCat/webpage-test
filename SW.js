// Add files to cahe
self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('yoc-store').then((cache) => cache.addAll([
      '/webpage-test/Index.html',
      '/webpage-test/en/Index.html',
      '/webpage-test/es/Index.html',
    ])),
  );
});

self.addEventListener('fetch', (e) => {
  console.log(e.request.url);
  e.respondWith(
    caches.match(e.request).then((response) => response || fetch(e.request)),
  );
});