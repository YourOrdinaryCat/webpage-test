document.addEventListener("load", function() {
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker
      .register('/webpage-test/SW.js')
      .then(() => { console.log('Service Worker Registered'); });
  }
});