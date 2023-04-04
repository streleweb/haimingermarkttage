import Philosophie from './components/BenutzerAnsichtComponents/Philosophie';
import Produkte from './components/BenutzerAnsichtComponents/Produkte';
import HomeContent from './components/BenutzerAnsichtComponents/HomeContent';
import PageNotFound from './components/BenutzerAnsichtComponents/PageNotFound';
import Aussteller from './components/BenutzerAnsichtComponents/Aussteller';
import Ausstelleranlegen from './components/VorstandAdminComponents/Ausstelleranlegen';
import Fotogalerie from './components/BenutzerAnsichtComponents/Fotogalerie';
import News from './components/BenutzerAnsichtComponents/News';
import Kontakt from './components/BenutzerAnsichtComponents/Kontakt';
import Datenschutz from './components/footercomponents/Datenschutz';
import Impressum from './components/footercomponents/Impressum';
import Login from './components/VorstandAdminComponents/Login';
import Dashboard from './components/VorstandAdminComponents/Dashboard';
import NewsAnlegen from './components/VorstandAdminComponents/NewsAnlegen';
import AusstellerUebersicht from './components/VorstandAdminComponents/AusstellerUebersicht';
import Register from './components/VorstandAdminComponents/Register';
import AusstellerAendern from './components/VorstandAdminComponents/AusstellerAendern';
import AddPhotos from './components/VorstandAdminComponents/FotogalerieComponents/AddPhotos';
import Karte from './components/BenutzerAnsichtComponents/Karte';
import Anreise from './components/BenutzerAnsichtComponents/Anreise';
import Sponsoren from './components/BenutzerAnsichtComponents/Sponsoren';
import Programm from './components/BenutzerAnsichtComponents/Programm';
import ProgrammAnlegen from './components/VorstandAdminComponents/ProgrammAnlegen';
import ProduktReiter from './components/BenutzerAnsichtComponents/ProduktReiter';
import Lebensmittel from './components/BenutzerAnsichtComponents/Detailansicht Produkte/Lebensmittel';
import Gastronomie from './components/BenutzerAnsichtComponents/Detailansicht Produkte/Gastronomie';
import Handwerk from './components/BenutzerAnsichtComponents/Detailansicht Produkte/Handwerk';
import Textil from './components/BenutzerAnsichtComponents/Detailansicht Produkte/Textil';
import Allerlei from './components/BenutzerAnsichtComponents/Detailansicht Produkte/Allerlei';
import HomeContentAnlegen from './components/VorstandAdminComponents/HomeContentAnlegen.vue';


export default {
  mode: 'history', //Browser-Tracking-System benützen, um die Pages zu tracken
  //linkActiveClass: 'font-willkommen', für später, falls Router zu Klasse switchen soll
  routes: [

    {
      path: '*',   //Jeder Pfad, den es nicht gibt, führt zum PageNotFound Component
      component: PageNotFound
    },
    {
      path: '/', //homepage der app= www.haiminger-markttage.at, normale HP wird www.haiminger-markttage.at bleiben
      component: HomeContent,
      name: 'Home'
    },

    {
      path: '/produktreiter',
      component: ProduktReiter
    },

    {
      path: '/produkte',
      component: Produkte
    },
    {
      path: '/lebensmittel',
      component: Lebensmittel,
      name: 'Lebensmittel'
    },
    {
      path: '/gastronomie',
      component: Gastronomie,
      name: 'Gastronomie'
    },
    {
      path: '/handwerk',
      component: Handwerk,
      name: 'Handwerk'
    },
    {
      path: '/textil',
      component: Textil,
      name: 'Textil'
    },
    {
      path: '/allerlei',
      component: Allerlei,
      name: 'Allerlei'
    },

    {
      path: '/programm',
      component: Programm
    },

    {
      path: '/admin/dashboard/programmanlegen',
      component: ProgrammAnlegen
    },

    {
      path: '/philosophie',
      component: Philosophie
    },

    {
      path: '/aussteller',
      component: Aussteller
    },

    {
      path: '/fotogalerie',
      name: 'Fotogalerie',
      component: Fotogalerie
    },

    {
      path: '/news',
      component: News
    },

    {
      path: '/karte',
      component: Karte
    },

    {
      path: '/anreise',
      component: Anreise
    },

    {
      path: '/kontakt',
      component: Kontakt
    },

    {
      path: '/sponsoren',
      component: Sponsoren
    },


    {
      path: '/datenschutz',
      component: Datenschutz
    },

    {
      path: '/impressum',
      component: Impressum
    },
    {
      path: '/admin/login',
      component: Login,
      name: 'adminLogin',
    },

    {
      path: '/admin/dashboard',
      component: Dashboard,
      name: 'admindashboard',
    },

    {
      path: '/admin/dashboard/ausstelleranlegen',
      component: Ausstelleranlegen
    },

    {
      path: '/admin/dashboard/ausstelleraendern',
      name: 'AusstellerAendern',
      component: AusstellerAendern,
    },

    {
      path: '/admin/dashboard/news',
      component: NewsAnlegen,
    },

    {
      path: '/admin/dashboard/hometext',
      component: HomeContentAnlegen,
    },

    {
      path: '/admin/dashboard/ausstelleruebersicht',
      component: AusstellerUebersicht,
      name: 'ausstelleruebersicht',
    },

    {
      path: '/admin/register',
      component: Register
    },


    {
      path: '/admin/dashboard/editfotogalerie',
      name: AddPhotos,
      component: AddPhotos
    },



  ]

}
