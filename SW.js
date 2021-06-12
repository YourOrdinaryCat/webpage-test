self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open('ordinary-store').then((cache) => cache.addAll([
      '/webpage-test/',
      '/webpage-test/Index.html',
      '/webpage-test/en/Index.html',
      '/webpage-test/es/Index.html',
      '/webpage-test/Files/404.js',
      '/webpage-test/Files/Scripts.js',
      '/webpage-test/Files/Stylesheets/General.css',
      '/webpage-test/Files/Stylesheets/MediaQueries.css',
      '/webpage-test/Files/Stylesheets/Normalize.css',
      '/webpage-test/Files/Stylesheets/Style.css',
      '/webpage-test/Files/Stylesheets/Auto/Fluent.css',
      '/webpage-test/Files/Stylesheets/Auto/iOS.css',
      '/webpage-test/Files/Stylesheets/Auto/macOS.css',
      '/webpage-test/Files/Stylesheets/Auto/Material Themed.css',
      '/webpage-test/Files/Stylesheets/Auto/Material.css',
      '/webpage-test/Files/Stylesheets/Dark/Fluent.css',
      '/webpage-test/Files/Stylesheets/Dark/iOS.css',
      '/webpage-test/Files/Stylesheets/Dark/macOS.css',
      '/webpage-test/Files/Stylesheets/Dark/Material Themed.css',
      '/webpage-test/Files/Stylesheets/Dark/Material.css',
      '/webpage-test/Files/Stylesheets/Light/Fluent.css',
      '/webpage-test/Files/Stylesheets/Light/iOS.css',
      '/webpage-test/Files/Stylesheets/Light/macOS.css',
      '/webpage-test/Files/Stylesheets/Light/Material Themed.css',
      '/webpage-test/Files/Stylesheets/Light/Material.css',
    ])),
  );
});

self.addEventListener('fetch', (e) => {
  console.log(e.request.url);
  e.respondWith(
    caches.match(e.request).then((response) => response || fetch(e.request)),
  );
});