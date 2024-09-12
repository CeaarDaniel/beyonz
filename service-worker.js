self.addEventListener('install', (event) => {
    console.log('Service Worker installed');
  });
  
  self.addEventListener('activate', (event) => {
    console.log('Service Worker activated');
  });
  
  self.addEventListener('fetch', (event) => {
    event.respondWith(
      caches.match(event.request).then((response) => {
        return response || fetch(event.request);
      })
    );
  });


  self.addEventListener('message', function(event) {
    if (event.data.action === 'showNotification') {
        const title = event.data.title;
        const options = {
            body: event.data.body,
            icon: './S11.png',
            badge: './S11.png' 
        };
        self.registration.showNotification(title, options);
    }
});
