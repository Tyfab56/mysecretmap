// service-worker.js

// Nom du cache
const CACHE_NAME = "v1";

// Liste des fichiers à mettre en cache

const urlsToCache = [
    "/guide_iceland_fr/", // Chemin correct pour l'index
    "/guide_iceland_fr/index.html",
    "/guide_iceland_fr/pages/main.html",
    "/guide_iceland_fr/pages/installicon.html",

    "/guide_iceland_fr/images/logo.png",
];

// Installation du Service Worker
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            console.log("Opened cache");
            return cache.addAll(urlsToCache);
        })
    );
});

// Interception des requêtes et récupération des fichiers en cache
self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches.match(event.request).then((response) => {
            // Si la ressource est dans le cache, on la renvoie
            if (response) {
                return response;
            }
            // Sinon, on la récupère depuis le réseau
            return fetch(event.request);
        })
    );
});

// Mise à jour du Service Worker
self.addEventListener("activate", (event) => {
    const cacheWhitelist = [CACHE_NAME];
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (!cacheWhitelist.includes(cacheName)) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});
