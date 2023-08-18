//imporcion de bootstrap
import 'bootstrap'
import '../../sass/bootstrap.scss'
import '../node_modules/bootstrap-icons/font/bootstrap-icons.css'
import '../node_modules/alertifyjs/build/css/alertify.css'
import '../node_modules/alertifyjs/build/css/themes/bootstrap.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
