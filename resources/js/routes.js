import App from './components/App';
import Philosophie from './components/Philosophie';

export default {
    mode: 'history', //Browser-Tracking-System benützen, um die Pages zu tracken

    routes: [
        {
            path: '/app', //homepage der app= www.haiminger-markttage.at/app, normale HP wird www.haiminger-markttage.at bleiben
            component: App
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