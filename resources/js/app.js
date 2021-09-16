require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

// Font Awesome
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faBasketballBall, faEllipsisH, faHome, faInfoCircle, faKey, faLayerGroup, faLock, faMap, faMapPin, faMapSigns, faPen, faPhone, faPhoneAlt, faRegistered, faShareAlt, faSignInAlt, faStarOfLife, faTimes, faUserPlus } from '@fortawesome/free-solid-svg-icons';
import { faComments, faEdit, faEnvelope, faTrashAlt, faUser } from '@fortawesome/free-regular-svg-icons';
import { faFacebook } from '@fortawesome/free-brands-svg-icons';

library.add(faHome, faInfoCircle, faTimes, faComments, faFacebook, faEdit, faLayerGroup, faBasketballBall, 
    faEllipsisH, faStarOfLife, faShareAlt, faComments, faTrashAlt, faUser, faKey, faSignInAlt, faEnvelope, faUserPlus, faLock, faPhoneAlt, faPhone, faMap, faMapPin, faMapSigns, faPen, faSignInAlt, faRegistered)

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .component('font-awesome', FontAwesomeIcon)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
