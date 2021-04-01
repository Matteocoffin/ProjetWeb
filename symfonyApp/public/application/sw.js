const staticCacheName = "site-static-v1";
const dynamicCache = "site-dynamic-v2";
const assets = [
    'index.html',
    'img/fond.jpg',
	'img/log.png',
	'css/style.css',
	'https://code.jquery.com/jquery-1.12.3.js',
	'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css',
	'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js',
	'js/app.js',
	'js/materialize.min.js',
    '/application/pages/fallbackPage.html',
	'http://localhost:8000/apip/offres',
	'main.js'
	
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


//return cacheRes || 
// fecth event redirection si pas internet
self.addEventListener('fetch', (evt) =>{
    evt.respondWith(
        //cache statique
        caches.match(evt.request).then(cacheRes => {
            return cacheRes || fetch(evt.request).then(fetchRes =>{//cache dynamique
                return caches.open(dynamicCache).then(cache =>{
                    cache.put(evt.request.url, fetchRes.clone());
                    return fetchRes;
                })
            });
            //si aucun cache n'a d'information redirection vers fallbackPage
        }).catch(()=> {
            //Seulement les html pages
            if(evt.request.url.indexOf('.html') > -1){
                return caches.match('/application/pages/fallbackPage.html');
            }
        })
    );  
    //console.log('fetch event sur url ', evt);
});

