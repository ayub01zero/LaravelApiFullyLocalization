import './bootstrap';
import 'flowbite';

import { createApp } from 'vue';
import { createI18n } from 'vue-i18n';
import App from './components/app.vue';
import AR from '../js/locale/AR.json';
import KU from '../js/locale/KU.json';
import EN from '../js/locale/EN.json';

// Create I18n instance
const i18n = createI18n({
  locale: 'en', // Default locale
  messages: {
    en: EN,
    ku: KU,
    ar: AR,
  },
});

// Create Vue app
const app = createApp(App);

// Use I18n
app.use(i18n);

// Mount app
app.mount('#app');
