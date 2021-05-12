// Add files to cache
self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('yoc-store').then((cache) => cache.addAll([
      '../Index.html',
      '../en/Index.html',
      '../es/Index.html',
    ])),
  );
});

self.addEventListener('fetch', (e) => {
  console.log(e.request.url);
  e.respondWith(
    caches.match(e.request).then((response) => response || fetch(e.request)),
  );
});