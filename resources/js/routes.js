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
import Impressum from './components/footercomponents/Impressum';
import Login from './components/VorstandAdminComponents/Login';
import Dashboard from './components/VorstandAdminComponents/Dashboard';
import EditNews from './components/VorstandAdminComponents/EditNews';
import AusstellerUebersicht from './components/VorstandAdminComponents/AusstellerUebersicht';
import Register from './components/VorstandAdminComponents/Register';
import AusstellerAendern from './components/VorstandAdminComponents/AusstellerAendern';
import AddPhotos from './components/VorstandAdminComponents/FotogalerieComponents/AddPhotos';
import Karte from './components/Karte';
import Anreise from './components/Anreise';


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
            path: '/app/fotogalerie',
            name: 'Fotogalerie',
            component: Fotogalerie
        },

        {
            path: '/app/news',
            component: News
        },

        {
            path: '/app/karte',
            component: Karte
        },

        {
            path: '/app/anreise',
            component: Anreise
        },

        {
            path: '/app/kontakt',
            component: Kontakt
        },

        {
            path: '/app/datenschutz',
            component: Datenschutz
        },

        {
            path: '/app/impressum',
            component: Impressum
        },
        {
            path: '/app/admin/login',
            component: Login,
            name: 'adminLogin',
        },

        {
            path: '/app/admin/dashboard',
            component: Dashboard,
            name: 'admindashboard',
            meta: { requiresAuth: true } //protected - Login erforderlich
        },

        {
            path: '/app/admin/dashboard/ausstelleranlegen',
            component: Ausstelleranlegen
        },

        {
            path: '/app/admin/dashboard/ausstelleraendern',
            name: 'AusstellerAendern',
            component: AusstellerAendern,
            meta: { requiresAuth: true } //protected - Login erforderlich
        },

        {
            path: '/app/admin/dashboard/news',
            component: EditNews,
            meta: { requiresAuth: true } //protected - Login erforderlich
        },

        {
            path: '/app/admin/dashboard/ausstelleruebersicht',
            component: AusstellerUebersicht,
            name: 'ausstelleruebersicht',
            meta: { requiresAuth: true } //protected - Login erforderlich
        },

        {
            path: '/app/admin/register',
            component: Register
        },


        {
            path: '/app/admin/dashboard/editfotogalerie',
            name: AddPhotos,
            component: AddPhotos
        },



    ]

}