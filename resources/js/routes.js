import App from './components/App';
import Philosophie from './components/Philosophie';
import Produkte from './components/Produkte';
import HomeContent from './components/HomeContent';
import PageNotFound from './components/PageNotFound';
import Aussteller from './components/Aussteller';
import Ausstelleranlegen from './components/VorstandAdminComponents/Ausstelleranlegen';
import Fotogalerie from './components/Fotogalerie';
import News from './components/News';
import Kontakt from './components/Kontakt';
import Datenschutz from './components/footercomponents/Datenschutz';

export default {
    mode: 'history', //Browser-Tracking-System benützen, um die Pages zu tracken
    //linkActiveClass: 'font-willkommen', für später, falls Router zu Klasse switchen soll
    routes: [

        {
            path: '*',   //Jeder Pfad, den es nicht gibt, führt zum PageNotFound Component
            component: PageNotFound
        },
        {
            path: '/app', //homepage der app= www.haiminger-markttage.at/app, normale HP wird www.haiminger-markttage.at bleiben
            component: HomeContent
        },

        {
            path: '/app/Produkte',
            component: Produkte
        },

        {
            path: '/app/philosophie',
            component: Philosophie
        },

        {
            path: '/app/aussteller',
            component: Aussteller
        },

        {
            path: '/app/ausstelleranlegen',
            component: Ausstelleranlegen
        },

        {
            path: '/app/fotogalerie',
            component: Fotogalerie
        },

        {
            path: '/app/news',
            component: News
        },

        {
            path: '/app/kontakt',
            component: Kontakt
        },

        {
            path: '/app/datenschutz',
            component: Datenschutz
        },

    ]

}