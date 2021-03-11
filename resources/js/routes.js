import App from './components/App';
import Philosophie from './components/Philosophie';
import Produkte from './components/Produkte';
import HomeContent from './components/HomeContent';

export default {
    mode: 'history', //Browser-Tracking-System benützen, um die Pages zu tracken
    //linkActiveClass: 'font-willkommen', für später, falls Router zu Klasse switchen soll
    routes: [
        {
            path: '/app', //homepage der app= www.haiminger-markttage.at/app, normale HP wird www.haiminger-markttage.at bleiben
            component: HomeContent
        }/*,

        {
            path: '/app/pagenotfound',
            component: PageNotFound
        }*/,

        {
            path: '/app/Produkte',
            component: Produkte
        },

        {
            path: '/app/philosophie',
            component: Philosophie
        }]/*,

        {
            path: '/app/produkte',
            component: Produkte
        }

    ]*/

}