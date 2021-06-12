if ('serviceWorker' in navigator) {
  navigator.serviceWorker
    .register('/webpage-test/SW.js')
    .then(() => { console.log('Service Worker Registered'); });
}

// Thanks to MDN for this code! https://github.com/mdn/pwa-examples/blob/master/a2hs/index.js
let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
  // Prevent Chrome 67 and earlier from automatically showing the prompt
  e.preventDefault();

  // Stash the event so it can be triggered later
  deferredPrompt = e;

  // Update UI to notify the user they can add to home screen
  document.querySelector('#pwa').style.display = 'block';

  document.querySelector('#pwa').addEventListener('click', () => {
    // Hide our user interface that shows our A2HS button
    document.querySelector('#pwa').style.display = "none";

    // Show the prompt
    deferredPrompt.prompt();

    // Wait for the user to respond to the prompt
    deferredPrompt.userChoice.then((choiceResult) => {
      if (choiceResult.outcome === 'accepted') {
        console.log('User accepted the A2HS prompt');
      } else {
        console.log('User dismissed the A2HS prompt');
      }
      deferredPrompt = null;
    });
  });
});