const staticCacheName = "site-static-v1";
const dynamicCache = "site-dynamic-v2";
const assets = [
    '/',
    '/index.html',
    '/js/app.js',
    '/js/ui.js',
    '/js/materialize.min.js',
    '/css/materialize.min.css',
    '/css/styles.css',
    '/img/dish.png',
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    'https://fonts.gstatic.com/s/materialicons/v82/flUhRq6tzZclQEJ-Vdg-IuiaDsNcIhQ8tQ.woff2',
    '/pages/fallbackPage.html'
];

//cache limite de taille
const limitCacheSize = (name,size) =>{
    caches.open(name).then(cache => {
        cache.keys().then(keys => {
            if(keys.lenght > size){
                cache.delete(keys[0]).then(limitCacheSize(name,size));
            }
        })
    })
}

// installer le service worker
self.addEventListener('install', evt => {
    //console.log('install evt ', evt);
    evt.waitUntil(
        caches.open(staticCacheName).then(cache => { //ouvre le cache statique
            console.log('caching shell assets');
            cache.addAll(assets);
        }));
});

// activer le service worker
self.addEventListener('activate', evt =>{
    //console.log('activate evt ', evt);
    evt.waitUntil(
        caches.keys().then(keys =>{
            //pour voir les différents cachename
            //console.log(keys);
            //supprimer tous les cachename sauf celui sélectionnné
            return Promise.all(keys
                .filter(key=> key !== staticCacheName && key !== dynamicCache)
                .map(key => caches.delete(key))
                )
        })
    )
})



// fecth event redirection si pas internet
self.addEventListener('fetch', evt =>{
    evt.respondWith(
        //cache statique
        caches.match(evt.request).then(cacheRes => {
            return cacheRes || fetch(evt.request).then(fetchRes =>{ //cache dynamique
                return caches.open(dynamicCache).then(cache =>{
                    cache.put(evt.request.url, fetchRes.clone());
                    limitCacheSize(dynamicCache, 10);
                    return fetchRes;
                })
            });
            //si aucun cache n'a d'information redirection vers fallbackPage
        }).catch(()=> {
            //Seulement les html pages 
            if(evt.request.url.indexOf('.html') > -1){
                return caches.match('/pages/fallbackPage.html');
            }
        })
    );  
    //console.log('fetch event sur url ', evt);
});