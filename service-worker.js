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
            badge: './S11.png',
            actions: [
                      {
                        action: 'yes',
                        type: 'button',
                        title: '👍 ALLOW',
                      },
                      {
                        action: 'no',
                        type: 'button',
                        title: '👎 DENY',
                      },
                    ],
              vibrate: [
                          500, 110, 500, 110, 450, 110, 200, 110, 170, 40, 450, 110, 200, 110, 170,
                          40, 500,
                       ],
        };
        self.registration.showNotification(title, options);
    }
});
