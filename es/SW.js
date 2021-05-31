self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('yoc-store').then((cache) => cache.addAll([
      '/webpage-test/',
      '/webpage-test/Index.html',
      '/webpage-test/en/Index.html',
      '/webpage-test/es/Index.html',
      '/webpage-test/Files/404.js',
      '/webpage-test/Files/Scripts.js',
      '/webpage-test/Stylesheets/Auto/Fluent.css',
      '/webpage-test/Stylesheets/Auto/iOS.css',
      '/webpage-test/Stylesheets/Auto/macOS.css',
      '/webpage-test/Stylesheets/Auto/Material Themed.css',
      '/webpage-test/Stylesheets/Auto/Material.css',
      '/webpage-test/Stylesheets/Dark/Fluent.css',
      '/webpage-test/Stylesheets/Dark/iOS.css',
      '/webpage-test/Stylesheets/Dark/macOS.css',
      '/webpage-test/Stylesheets/Dark/Material Themed.css',
      '/webpage-test/Stylesheets/Dark/Material.css',
      '/webpage-test/Stylesheets/Light/Fluent.css',
      '/webpage-test/Stylesheets/Light/iOS.css',
      '/webpage-test/Stylesheets/Light/macOS.css',
      '/webpage-test/Stylesheets/Light/Material Themed.css',
      '/webpage-test/Stylesheets/Light/Material.css',
    ])),
  );
});

self.addEventListener('fetch', (e) => {
  console.log(e.request.url);
  e.respondWith(
    caches.match(e.request).then((response) => response || fetch(e.request)),
  );
});