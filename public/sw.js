const version = 11;
const cacheName = `haimingermarkttagecache${version}`;
const cacheList = [
  './',
  './images/background/applebg.jpg',
  './images/icons/icon-144x144.png',
  './images/icons/pngs/7272transparent.png',
  './images/icons/svgs/apple1.svg',
  './images/icons/svgs/aussteller.svg',
  './images/icons/svgs/email.svg',
  './images/icons/svgs/facebook-logo.svg',
  './images/icons/svgs/locationpointer.svg',
  './images/icons/svgs/map.svg',
  './images/icons/svgs/www.svg',
  './js/app.js',
  './mix-manifest.json',
  './css/app.css',
  './.htaccess',
  './images/background/mobilemenubackground3.svg',
  './images/background/newpageturner2.svg',
  './images/background/mailbox-big.jpg',
  './images/background/fotogaleriebackground2.svg',
  './images/background/buch.svg',
  // './js/app.js.LICENSE.txt',
  //   './images/background/404.webp',
  './index.php',
  //   './images/icon-144x144.jpg',
  //   './images/icon-72x72.png',
  //   './images/icon-96x96.jpg',
  //   './images/icon-128x128.jpg',
  //   './images/icon-152x152.jpg',
  //   './images/icon-192x192.jpg',
  //   './images/icon-384x384.jpg',
  //   './images/icon-512x512.jpg',
  './images/anreise/img_lageplan.jpg',
  './images/anreise/lageplan_download.pdf',
  './images/anreise/img_lageplan.webp',
  //   './images/background/apfelplantage1.jpg',
  //   './images/background/apfelplantage1klein.jpg',
  //   './images/background/apples1.jpg',
  //   './images/background/dunkleholztürgroß.jpg',
  //   './images/background/dunkleholztürmittel.jpg',
  //   './images/background/dunkleholztüroriginal.jpg',
  './images/background/fotogaleriebackground.svg',
  './images/background/fruits1.jpg',
  //   './images/background/hb1.jpg',
  //   './images/background/hh1.jpg',
  //   './images/background/hm2016-1.jpg',
  //   './images/background/hm2016-2.jpg',
  //   './images/background/hochkantholz1.jpg',
  //   './images/background/hochkantholz2.jpg',
  //   './images/background/hochkantholz3.jpg',
  //   './images/background/hochkantholz5.jpg',
  //   './images/background/hochkantholz6.jpg',
  //   './images/background/hochkantholz6groß.jpg',
  //   './images/background/hochkantholz6mittel.jpg',
  //   './images/background/holztür.jpg',
  //   './images/background/holztürklein.jpg',
  //   './images/background/holztürmittel.jpg',
  './images/background/ht1.jpg',
  './images/background/mailbox-medium.jpg',
  './images/background/mailbox-small.jpg',
  './images/background/mobilemenubackground.svg',
  './images/background/mobilemenubackground2.svg',
  './images/background/pexelapple.jpg',
  './images/background/produktbackground.svg',
  './images/background/404.webp',
  './images/background/hb1.webp',
  './images/background/mailbox-big.webp',
  './images/fotogalerie/aussteller1.jpg',
  './images/fotogalerie/aussteller2.jpg',
  './images/fotogalerie/aussteller3.jpg',
  './images/fotogalerie/aussteller4.jpg',
  './images/icons/apple-silhouette.eps',
  './images/icons/apple-silhouette.jpg',
  './images/icons/apple-silhouette.png',
  './images/icons/apple.svg',
  './images/icons/icon-96x96.png',
  './images/icons/icon-128x128.png',
  './images/icons/icon-152x152.png',
  './images/icons/icon-192x192.png',
  './images/icons/icon-384x384.png',
  './images/icons/icon-512x512.png',
  './images/icons/icon-72x72.png',
  //   './images/icons/adminicons/user1.svg',
  './images/icons/gifs/loading.gif',
  './images/icons/gifs/loadingtransparent.gif',
  //   './images/icons/pngs/icon-128x128.png',
  //   './images/icons/pngs/icon-144x144.png',
  //   './images/icons/pngs/icon-152x152.png',
  //   './images/icons/pngs/icon-192x192.png',
  //   './images/icons/pngs/icon-384x384.png',
  //   './images/icons/pngs/icon-512x512.png',
  //   './images/icons/pngs/icon-72x72.png',
  //   './images/icons/pngs/icon-96x96.png',
  './images/icons/svgs/back.svg',
  './images/icons/svgs/contact-form.svg',
  './images/icons/svgs/email.png',
  './images/icons/svgs/funnyAussteller.svg',
  './images/icons/svgs/home.svg',
  './images/icons/svgs/image-gallery.svg',
  './images/icons/svgs/next.svg',
  './images/icons/svgs/next1.svg',
  './images/icons/svgs/prev.png',
  './images/icons/svgs/previous.svg',
  './images/icons/svgs/wheels.png',
  './images/icons/svgs/wheelssmall.png',
  './images/partner/agrarmarketing.jpg',
  './images/partner/ffhaiming.jpg',
  './images/partner/gemeindehaiming.jpg',
  './images/partner/genuss_region.jpg',
  './images/partner/oebb.jpg',
  './images/partner/oetztal.jpg',
  './images/partner/raiffeisen.jpg',
  './images/produkte/apples.jpg',
  './images/produkte/img_bekleidung.jpg',
  './images/produkte/img_aepfel.jpg',
  './images/produkte/img_wein.jpg',
  './images/produkte/img_obst.jpg',
  './images/produkte/img_aepfel.jpg',
  './images/produkte/img_wurst.jpg',
  './images/produkte/img_erdaepfel.jpg',
  './images/produkte/img_blume.jpg',
  './images/produkte/img_brot.jpg',
  './images/produkte/img_deko.jpg',
  './images/produkte/gastronomie.jpg',
  './images/produkte/img_kaese.jpg',
  './images/produkte/img_marmelade.jpg',
  './images/produkte/handwerk.jpg',
  './images/produkte/img_tee.jpg',
  './images/produkte/textil.jpg',
  './images/produkte/allerlei.jpg',
  './images/aussteller/homeContentTitle.txt',
  './images/aussteller/homeContentDescription.txt',
  './images/aussteller/public/Alacarte.JPG',
  './images/aussteller/public/Alacarte2.JPG',
  './images/aussteller/public/Anderlahn.JPG',
  './images/aussteller/public/AndreasEssndorfer.JPG',
  './images/aussteller/public/AndreasNagele.JPG',
  './images/aussteller/public/Aronia.JPG',
  './images/aussteller/public/BaeckereiRudigier.JPG',
  './images/aussteller/public/BibliothekHaiming.JPG',
  './images/aussteller/public/BioVomBerg.JPG',
  './images/aussteller/public/BioaepfelWammesRudi.JPG',
  './images/aussteller/public/BioaepfelWammesRudi2.JPG',
  './images/aussteller/public/BioaepfelWammesRudi3.JPG',
  './images/aussteller/public/BioaepfelWammesRudi4.JPG',
  './images/aussteller/public/BiohofGlatzl.JPG',
  './images/aussteller/public/BiohofKoppChristian.JPG',
  './images/aussteller/public/Bonbonbar.JPG',
  './images/aussteller/public/BoussetonSabineKappen.JPG',
  './images/aussteller/public/Bramboeck.JPG',
  './images/aussteller/public/Bramboeck2.JPG',
  './images/aussteller/public/EggerHannes.JPG',
  './images/aussteller/public/ElkeKoenig.JPG',
  './images/aussteller/public/Erdaepfelbauern.JPG',
  './images/aussteller/public/Erlebniswerkstaettl.JPG',
  './images/aussteller/public/FassbindereiPraxmarer.JPG',
  './images/aussteller/public/Freilinger.JPG',
  './images/aussteller/public/GaertnereiNorzTichoff.JPG',
  './images/aussteller/public/GaertnereiNorzTichoff2.JPG',
  './images/aussteller/public/GalerieNeururerJochen.JPG',
  './images/aussteller/public/GalerieThomasKaffee.JPG',
  './images/aussteller/public/GalerieWaltdrautSchuetz.JPG',
  './images/aussteller/public/GalerieZeberer.JPG',
  './images/aussteller/public/GemuesehobelStefanKoehler.JPG',
  './images/aussteller/public/GeorgFederspiel.JPG',
  './images/aussteller/public/GritschTamara.JPG',
  './images/aussteller/public/GstreinRoswita.JPG',
  './images/aussteller/public/HaimingerHof.JPG',
  './images/aussteller/public/HeppkeBlanka.JPG',
  './images/aussteller/public/Integrationskindergarten.JPG',
  './images/aussteller/public/Integrationskindergarten2.JPG',
  './images/aussteller/public/Kartoffelbauern1.JPG',
  './images/aussteller/public/Kartoffelbauern2.JPG',
  './images/aussteller/public/Kartoffelbauern3.JPG',
  './images/aussteller/public/KistlDaniela.JPG',
  './images/aussteller/public/Kneissl.JPG',
  './images/aussteller/public/Kneissl2.JPG',
  './images/aussteller/public/Knoll1.JPG',
  './images/aussteller/public/Knoll2.JPG',
  './images/aussteller/public/KurtSojer1.JPG',
  './images/aussteller/public/KurtSojer2.JPG',
  './images/aussteller/public/LarcherLeo.JPG',
  './images/aussteller/public/LarcherLeo2.JPG',
  './images/aussteller/public/LeitnerHubert.JPG',
  './images/aussteller/public/LoriJosef.JPG',
  './images/aussteller/public/MCPRecording.JPG',
  './images/aussteller/public/MaiersBeerengarten.JPG',
  './images/aussteller/public/MaiersBeerengarten2.JPG',
  './images/aussteller/public/MaiersBeerengarten3.JPG',
  './images/aussteller/public/MetzgereiHoepperger.JPG',
  './images/aussteller/public/MetzgereiHoepperger2.JPG',
  './images/aussteller/public/MetzgereiHoepperger3.JPG',
  './images/aussteller/public/MetzgereiRaffl.JPG',
  './images/aussteller/public/Michalis.JPG',
  './images/aussteller/public/MonikaundGerhardDraxl.JPG',
  './images/aussteller/public/NeurautherFrisch.JPG',
  './images/aussteller/public/NeururerJochen.JPG',
  './images/aussteller/public/ObstbauernHaiming1.JPG',
  './images/aussteller/public/ObstbauernHaiming10.JPG',
  './images/aussteller/public/ObstbauernHaiming11.JPG',
  './images/aussteller/public/ObstbauernHaiming12.JPG',
  './images/aussteller/public/ObstbauernHaiming13.JPG',
  './images/aussteller/public/ObstbauernHaiming16.JPG',
  './images/aussteller/public/ObstbauernHaiming17.JPG',
  './images/aussteller/public/ObstbauernHaiming18.JPG',
  './images/aussteller/public/ObstbauernHaiming2.JPG',
  './images/aussteller/public/ObstbauernHaiming3.JPG',
  './images/aussteller/public/ObstbauernHaiming4.JPG',
  './images/aussteller/public/ObstbauernHaiming5.JPG',
  './images/aussteller/public/ObstbauernHaiming6.JPG',
  './images/aussteller/public/ObstbauernHaiming7.JPG',
  './images/aussteller/public/ObstbauernHaiming8.JPG',
  './images/aussteller/public/ObstbauernHaiming9.JPG',
  './images/aussteller/public/OetztalBaeck1.JPG',
  './images/aussteller/public/OetztalBaeck2.JPG',
  './images/aussteller/public/PeterZoller.JPG',
  './images/aussteller/public/RaiffeisenBank.JPG',
  './images/aussteller/public/SchiechtlAndrea.JPG',
  './images/aussteller/public/SchiechtlAndrea2.JPG',
  './images/aussteller/public/SeiringerFederkielstickerei.JPG',
  './images/aussteller/public/SigurtMarkt.JPG',
  './images/aussteller/public/Speckbacher.JPG',
  './images/aussteller/public/StriglClemensAstri.JPG',
  './images/aussteller/public/ThomasGstreinGastronomie.JPG',
  './images/aussteller/public/ThomasKaffee.JPG',
  './images/aussteller/public/WaltdrautSchuetz.JPG',
  './images/aussteller/public/Zeberer.JPG',
  './images/aussteller/public/funky.jpg',
  './images/aussteller/public/galerieIntegrationskindergarten.JPG',
  './images/aussteller/public/galeriekinder1.JPG',
  './images/aussteller/public/galeriekinder2.JPG',
  './images/aussteller/public/hm.JPG',
  './images/aussteller/public/oberlaender_alpenklang.jpg',
];


self.addEventListener('install', (ev) => {
  console.log('sw has been installed')
  //load the cacheList array into the cache
  ev.waitUntil(
    caches.open(cacheName).then((cache) => {
      cache.addAll(cacheList);
    })
  );
});

self.addEventListener('activate', (event) => {
  console.log('sw has been activated');
  //delete old versions of the cache
  event.waitUntil(
    caches.keys().then((keys) => {
      return Promise.all(
        keys.filter((key) => key != cacheName).map((nm) => caches.delete(nm))
      );
    })
  );
  event.waitUntil(self.clients.claim());
});

self.addEventListener('fetch', (ev) => {
  //handle fetch requests
  //online? external? font? css? img? html? specific folder?
  const isOnline = self.navigator.onLine;
  const url = new URL(ev.request.url);
  const isImage =
    url.pathname.includes('.png') ||
    url.pathname.endsWith('.jpg') ||
    url.pathname.endsWith('.eps') ||
    url.pathname.endsWith('.gif') ||
    url.pathname.endsWith('.webp') ||
    url.pathname.endsWith('.svg');

  const isJSON = url.hostname.includes('random-data-api.com');

  const isCSS =
    url.pathname.endsWith('.css') || url.hostname.includes('googleapis.com');
  const isHTML = ev.request.mode === 'navigate';
  const isFont =
    url.hostname.includes('gstatic') || url.pathname.endsWith('woff2');

  const selfUrl = new URL(self.location);
  const isExternal =
    ev.request.mode == 'cors' || selfUrl.hostname !== url.hostname;

  if (isOnline) {
    ev.respondWith(networkRevalidateAndCache(ev));
  } else {
    ev.respondWith(cacheOnly(ev));
  }
});

function cacheOnly(ev) {
  //only return what is in the cache
  console.log(ev.request);
  return caches.match(ev.request);
}

function networkRevalidateAndCache(ev) {
  //try fetch first and fallback on cache
  //update cache if fetch was successful
  return fetch(ev.request, { mode: 'cors', credentials: 'omit' }).then(
    (fetchResponse) => {
      if (fetchResponse.ok) {
        //put in cache
        return caches.open(cacheName).then((cache) => {
          cache.put(ev.request, fetchResponse.clone());
          return fetchResponse;
        });
      } else {
        return caches.match(ev.request);
      }
    }
  );
}

function cacheFirst(ev) {
  //return from cache or fetch if not in cache
  return caches.match(ev.request).then((cacheResponse) => {
    //return cacheResponse if not null
    return cacheResponse || fetch(ev.request);
  });
}
function networkOnly(ev) {
  //only return fetch response
  return fetch(ev.request);
}
function networkFirst(ev) {
  //try fetch and fallback on cache
  return fetch(ev.request).then((fetchResponse) => {
    if (fetchResponse.ok) return fetchResponse;
    return caches.match(ev.request);
  });
}
function staleWhileRevalidate(ev) {
  //check cache and fallback on fetch for response
  //always attempt to fetch a new copy and update the cache
  return caches.match(ev.request).then((cacheResponse) => {
    let fetchResponse = fetch(ev.request).then((response) => {
      return caches.open(cacheName).then((cache) => {
        cache.put(ev.request, response.clone());
        return response;
      });
    });
    return cacheResponse || fetchResponse;
  });
}

function placeholderImage(ev) {
  //return a specific placeholder image from the cache
  return caches.match('./404.png');
}
function Html404(ev) {
  //return a 404 html file from the cache
  return caches.match('./404.html');
}
function youAreOfflineError(ev) {
  //pretend to have a server-side error
  return new Response('<html><body><h1>You have no Internet-Connection!</h1></body></html>', {
    status: 503,
    statusText: 'You are offline...',
    headers: {
      'content-type': 'text/html',
    },
  });
}
