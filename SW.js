self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('ordinary-store').then((cache) => cache.addAll([
      '/webpage-test/',
      '/webpage-test/index.html',
      '/webpage-test/en/index.html',
      '/webpage-test/es/index.html',
    ])),
  );
});

self.addEventListener('fetch', (e) => {
  console.log(e.request.url);
  e.respondWith(
    caches.match(e.request).then((response) => response || fetch(e.request)),
  );
});
