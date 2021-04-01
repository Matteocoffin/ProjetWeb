if('serviceWorker' in navigator){
    navigator.serviceWorker.register('/application/sw.js')
    .then((reg) =>console.log('service worker', reg))
    .catch((err) => console.log('service worker not registered', err))
}